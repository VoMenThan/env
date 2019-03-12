<?php
/**
 * The Redirections Form
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Redirections
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Redirections;

use RankMath\Helper;
use RankMath\Traits\Hooker;
use RankMath\Modules\Monitor\DB as Monitor_DB;

defined( 'ABSPATH' ) || exit;

/**
 * Form class.
 */
class Form {

	use Hooker;

	/**
	 * The hooks.
	 *
	 * @codeCoverageIgnore
	 */
	public function hooks() {
		$this->action( 'cmb2_admin_init', 'register_form' );
		$this->filter( 'cmb2_override_option_get_rank-math-redirections', 'set_options' );
		$this->action( 'admin_post_rank_math_save_redirections', 'save' );
	}

	/**
	 * Display form.
	 *
	 * @codeCoverageIgnore
	 */
	public function display() {
		?>
		<h2><strong><?php echo ( $this->is_editing() ? esc_html__( 'Update', 'rank-math' ) : esc_html__( 'Add', 'rank-math' ) ) . ' ' . esc_html( get_admin_page_title() ); ?></strong></h2>

		<form class="cmb-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="rank_math_save_redirections">
			<?php
				wp_nonce_field( 'rank-math-save-redirections', 'security' );
				$cmb = cmb2_get_metabox( 'rank-math-redirections', 'rank-math-redirections' );
				$cmb->show_form();
			?>
			<footer class="form-footer rank-math-ui">
				<button type="button" class="button button-link-delete button-xlarge alignleft"><?php esc_html_e( 'Cancel', 'rank-math' ); ?></button>
				<button type="submit" class="button button-primary button-xlarge"><?php echo $this->is_editing() ? esc_html__( 'Update Redirection', 'rank-math' ) : esc_html__( 'Add Redirection', 'rank-math' ); ?></button>
			</footer>
		</form>

		<?php
	}

	/**
	 * Register form for Add New Record.
	 */
	public function register_form() {

		$cmb = new_cmb2_box( array(
			'id'           => 'rank-math-redirections',
			'object_types' => array( 'options-page' ),
			'option_key'   => 'rank-math-redirections',
			'hookup'       => false,
			'save_fields'  => false,
		) );

		$cmb->add_field( array(
			'id'      => 'sources',
			'type'    => 'group',
			'name'    => esc_html__( 'Source URLs', 'rank-math' ),
			'options' => array(
				'add_button'    => esc_html__( 'Add another', 'rank-math' ),
				'remove_button' => esc_html__( 'Remove', 'rank-math' ),
			),
			'classes' => 'cmb-group-text-only',
			'fields'  => array(
				array(
					'id'   => 'pattern',
					'type' => 'text',
				),
				array(
					'id'      => 'comparison',
					'type'    => 'select',
					'options' => Helper::choices_comparison_types(),
				),
			),
		) );

		$cmb->add_field( array(
			'id'   => 'url_to',
			'type' => 'text',
			'name' => esc_html__( 'Destination URL', 'rank-math' ),
		) );

		$cmb->add_field( array(
			'id'      => 'header_code',
			'type'    => 'radio_inline',
			'name'    => esc_html__( 'Redirection Type', 'rank-math' ),
			'options' => Helper::choices_redirection_types(),
			'default' => Helper::get_settings( 'general.redirections_header_code' ),
		) );

		$cmb->add_field( array(
			'id'      => 'status',
			'type'    => 'radio_inline',
			'name'    => esc_html__( 'Status', 'rank-math' ),
			'options' => array(
				'active'   => esc_html__( 'Activate', 'rank-math' ),
				'inactive' => esc_html__( 'Deactivate', 'rank-math' ),
			),
			'default' => 'active',
		) );

		$cmb->add_field( array(
			'id'   => 'id',
			'type' => 'hidden',
		) );
	}

	/**
	 * Set option handler for form.
	 *
	 * @param array $opts Array of options.
	 */
	public function set_options( $opts ) {
		// If editing previous record.
		if ( $redirection_id = $this->is_editing() ) { // @codingStandardsIgnoreLine
			return DB::get_redirection_by_id( $redirection_id );
		}

		if ( $url = Helper::param_get( 'url' ) ) { // @codingStandardsIgnoreLine
			return array( 'sources' => array( array( 'pattern' => $url ) ) );
		}

		if ( ! empty( $_REQUEST['log'] ) && is_array( $_REQUEST['log'] ) ) {
			return array(
				'sources' => $this->get_sources_for_log(),
				'url_to'  => home_url( '/' ),
			);
		}

		return $opts;
	}

	/**
	 * Get sources for 404 log items
	 *
	 * @return array
	 */
	private function get_sources_for_log() {
		$logs = array_map( 'absint', $_REQUEST['log'] );
		$logs = Monitor_DB::get_logs( array(
			'ids'     => $logs,
			'orderby' => '',
		) );

		$sources = array();
		foreach ( $logs['logs'] as $log ) {
			if ( empty( $log['uri'] ) ) {
				continue;
			}
			$sources[] = array(
				'pattern' => $log['uri'],
			);
		}

		return $sources;
	}

	/**
	 * Save new record form submit handler.
	 */
	public function save() {
		// If no form submission, bail!
		if ( empty( $_POST ) ) {
			return false;
		}

		check_admin_referer( 'rank-math-save-redirections', 'security' );

		$cmb    = cmb2_get_metabox( 'rank-math-redirections' );
		$values = $cmb->get_sanitized_values( $_POST );

		if ( false === $this->save_redirection( $values ) ) {
			rank_math()->add_deferred_error( __( 'Please add at least one valid source URL.', 'rank-math' ) );
			wp_safe_redirect( wp_unslash( $_POST['_wp_http_referer'] ) );
			exit;
		}

		wp_safe_redirect( Helper::get_admin_url( 'redirections' ) );
		exit;
	}

	/**
	 * Save single redirection
	 *
	 * @param array $redirection Single redirection item.
	 * @param bool  $nocache     Don't save cache.
	 */
	public function save_redirection( $redirection, $nocache = false ) {
		$this->cache = array();

		$redirection = $this->sanitize_redirection( $redirection, $nocache );
		if ( empty( $redirection['sources'] ) || ! is_array( $redirection['sources'] ) ) { // WPCS: sanitization ok.
			return false;
		}

		$redirection['url_to'] = $this->sanitize_destination( $redirection['url_to'] );
		$redirection_id        = DB::update_iff( $redirection );

		return $nocache ? $redirection_id : $this->save_redirection_cache( $redirection_id );
	}

	/**
	 * Sanitize redirection sources
	 *
	 * @param  array $redirection Current redirection to sanitize.
	 * @param  bool  $nocache     Don't save cache.
	 * @return array
	 */
	private function sanitize_redirection( $redirection, $nocache ) {
		foreach ( $redirection['sources'] as $key => &$value ) { // WPCS: sanitization ok.
			if ( empty( trim( $value['pattern'] ) ) ) {
				unset( $redirection['sources'][ $key ] );
				continue;
			}

			if ( empty( $value['comparison'] ) ) {
				$value['comparison'] = 'exact';
			}

			$processed_url = $this->sanitize_source( $value, $nocache );
			if ( ! $processed_url ) {
				unset( $redirection['sources'][ $key ] );
				continue;
			}

			$value['pattern'] = $processed_url;
		}

		return $redirection;
	}

	/**
	 * Save redirection caches
	 *
	 * @param integer $redirection_id Redirection id to create cache for.
	 */
	private function save_redirection_cache( $redirection_id ) {
		if ( ! $redirection_id || empty( $this->cache ) ) {
			return true;
		}

		foreach ( $this->cache as $item ) {
			$item['redirection_id'] = $redirection_id;
			Cache::add( $item );
		}

		return true;
	}

	/**
	 * Sanitize source
	 *
	 * @param  array $source  Source to process.
	 * @param  bool  $nocache Don't save cache.
	 * @return string
	 */
	private function sanitize_source( $source, $nocache = false ) {
		$processed = trim( $source['pattern'] );
		if ( 'regex' === $source['comparison'] ) {
			$processed = $this->sanitize_source_regex( $processed );
		} else {
			$processed = $this->sanitize_source_url( $processed );
			$processed = \urldecode( $processed );
			if ( 'exact' === $source['comparison'] && false === $nocache ) {
				$this->pre_redirection_cache( $processed );
			}
		}

		return $this->do_filter( 'modules/redirection/sanitize_source', $processed, $source );
	}

	/**
	 * Sanitize redirection source URL.
	 *
	 * Following urls converted to URI:
	 *    http://website.com/URI => URI
	 *    http://www.website.com/URI => URI
	 *    http://website.com/URI/ => URI
	 *    http://www.website.com/URI/ => URI
	 *    https://website.com/URI => URI
	 *    https://www.website.com/URI => URI
	 *    https://website.com/URI/ => URI
	 *    https://www.website.com/URI/ => URI
	 *    website.com/URI => URI
	 *    www.website.com/URI => URI
	 *    website.com/URI/ => URI
	 *    www.website.com/URI/ => URI
	 *    http://external.com/URI => false
	 *    http://sub.website.com/URI => false
	 *    https://website.com/#URI/ => #URI
	 *    https://website.com#URI/ => #URI
	 *    #URI => URI
	 *    /URI => URI
	 *    URI => URI
	 *    website.com => false
	 *    www.website.com => false
	 *
	 * @param  string $url User-input source URL.
	 * @return string|false
	 */
	private function sanitize_source_url( $url ) {
		if ( empty( $url ) || '/' === $url ) {
			return false;
		}

		$url = strtolower( $url );
		if ( '#' === $url[0] || '/' === $url[0] ) {
			return ltrim( $url, '/' );
		}

		$domain       = $this->get_home_domain();
		$url          = trailingslashit( $url );
		$url          = str_replace( $domain . '#', $domain . '/#', $url ); // For website.com#URI link.
		$domain_regex = preg_quote( $domain ) . '\/';
		$regex        = sprintf(
			'/^((http:\/\/www\.%s)|(http:\/\/%s)|(https:\/\/www\.%s)|(https:\/\/%s)|(www\.%s)|(%s))/',
			$domain_regex,
			$domain_regex,
			$domain_regex,
			$domain_regex,
			$domain_regex,
			$domain_regex
		);

		$url = preg_replace( $regex, '', $url ); // Strip protocol, www. and domain.

		// EMpty url.
		// External domain.
		if ( empty( $url ) || 0 === strpos( $url, 'http://' ) || 0 === strpos( $url, 'https://' ) ) {
			return false;
		}

		return untrailingslashit( $url );
	}

	/**
	 * Sanitize redirection source for regex
	 *
	 * @param  string $pattern Pattern to process.
	 * @return string
	 */
	private function sanitize_source_regex( $pattern ) {

		// Add delimiters if user didn't add them.
		// Regex-ception.
		if ( ! preg_match( '/^[^a-zA-Z0-9\s](.*)[^a-zA-Z0-9\s][imsxeADSUXJu]*$/', $pattern ) || preg_match( '/^\^.*\$$/', $pattern ) ) {
			$pattern = '[' . $pattern . ']';
		}

		// Check if it's a valid pattern.
		if ( @preg_match( $pattern, null ) === false ) { // @codingStandardsIgnoreLine
			/* translators: source pattern */
			rank_math()->add_deferred_error( sprintf( __( 'Invalid regex pattern: %s', 'rank-math' ), $pattern ) );
			return false;
		}

		return $pattern;
	}

	/**
	 * Sanitize destination url
	 *
	 * @param  string $url Url to process.
	 * @return string
	 */
	private function sanitize_destination( $url ) {
		$processed = trim( $url );

		// If beginning looks like a domain but without protocol then let's add home_url().
		if (
			! empty( $processed ) &&
			! Helper::str_start_with( 'http://', $processed ) &&
			! Helper::str_start_with( 'https://', $processed ) &&
			! Helper::str_start_with( '//', $processed )
		) {
			$processed = home_url( $processed );
		}

		return $this->do_filter( 'modules/redirection/sanitize_destination_url', \urldecode( $processed ), $url );
	}

	/**
	 * Collect WordPress Entity if any to add redirection cache.
	 *
	 * @param string $slug Url to search for.
	 */
	private function pre_redirection_cache( $slug ) {
		global $wpdb;

		// Check for post.
		$post_id = url_to_postid( home_url( $slug ) );
		if ( $post_id ) {
			$this->cache[] = array(
				'from_url'    => $slug,
				'object_id'   => $post_id,
				'object_type' => 'post',
			);
		}

		// Check for term.
		$terms = $wpdb->get_results( $wpdb->prepare( "SELECT term_id FROM $wpdb->terms WHERE slug = %s", $slug ) );
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$this->cache[] = array(
					'from_url'    => $slug,
					'object_id'   => $term->term_id,
					'object_type' => 'term',
				);
			}
		}

		// Check for user.
		$user = get_user_by( 'slug', $slug );
		if ( $user ) {
			$this->cache[] = array(
				'from_url'    => $slug,
				'object_id'   => $user->ID,
				'object_type' => 'user',
			);
		}
	}

	/**
	 * Get the domain, without www. and protocol.
	 *
	 * @return string
	 */
	private function get_home_domain() {
		if ( isset( $this->domain ) ) {
			return $this->domain;
		}

		$this->domain = str_replace( array( 'http://', 'https://', 'www.' ), '', home_url() );

		return $this->domain;
	}

	/**
	 * Is editing a record.
	 *
	 * @return int|boolean
	 */
	public function is_editing() {

		if ( isset( $_GET['action'] ) && 'edit' !== $_GET['action'] ) {
			return false;
		}

		return isset( $_GET['redirection'] ) ? absint( $_GET['redirection'] ) : false;
	}
}
