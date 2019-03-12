<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Frontend
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath;

use stdClass;
use RankMath\Post;
use RankMath\Traits\Hooker;
use RankMath\OpenGraph\Facebook;
use RankMath\OpenGraph\Twitter;

defined( 'ABSPATH' ) || exit;

/**
 * Frontend class.
 */
class Frontend {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->includes();
		$this->hooks();

		/**
		 * Fires when frontend is included/loaded.
		 */
		$this->do_action( 'frontend/loaded' );
	}

	/**
	 * Include required files.
	 */
	private function includes() {

		rank_math()->shortcodes = new Shortcodes;

		if ( Helper::get_settings( 'general.breadcrumbs' ) ) {
			rank_math()->breadcrumbs = new Breadcrumbs;
		}

		// This code handles the removal of replytocom.
		if ( $this->clean_reply_to_com() ) {
			$this->filter( 'comment_reply_link', 'remove_reply_to_com' );
			$this->action( 'template_redirect', 'replytocom_redirect', 1 );
		}
	}

	/**
	 * Hook into actions and filters.
	 */
	private function hooks() {

		$this->action( 'wp_enqueue_scripts', 'enqueue' );
		$this->action( 'template_redirect', 'integrations' );
		$this->filter( 'the_content_feed', 'embed_rssfooter' );
		$this->filter( 'the_excerpt_rss', 'embed_rssfooter_excerpt' );

		// Reorder categories listing: put primary at the beginning.
		$this->filter( 'get_the_terms', 'reorder_get_the_terms', 10, 3 );

		// Redirect attachment page to parent post.
		if ( Helper::get_settings( 'general.attachment_redirect_urls', true ) ) {
			$this->action( 'wp', 'attachment_redirect_urls' );
		}

		// Redirect archives.
		if ( Helper::get_settings( 'titles.disable_author_archives' ) || Helper::get_settings( 'titles.disable_date_archives' ) ) {
			$this->action( 'wp', 'archive_redirect' );
		}

		// Custom robots text.
		if ( Helper::get_settings( 'titles.robots_txt_content' ) ) {
			$this->action( 'robots_txt', 'robots_txt', 10, 2 );
		}

		$this->action( 'wp_head', 'add_attributes', 99 );
	}

	/**
	 * Initialize integrations.
	 */
	public function integrations() {
		$type = get_query_var( 'sitemap' );
		if ( ! empty( $type ) || is_customize_preview() ) {
			return;
		}

		new Facebook;
		new Twitter;
		rank_math()->head = new Head;
	}

	/**
	 * Enqueue Styles and Scripts required by plugin.
	 */
	public function enqueue() {
		if ( ! is_user_logged_in() || ! Helper::has_cap( 'admin_bar' ) ) {
			return;
		}

		wp_enqueue_style( 'rank-math', rank_math()->assets() . 'css/rank-math.css', null, rank_math()->get_version() );
		wp_enqueue_script( 'rank-math', rank_math()->assets() . 'js/rank-math.js', array( 'jquery' ), rank_math()->get_version(), true );

		if ( is_singular() ) {
			rank_math()->add_json( 'objectID', Post::get_simple_page_id() );
			rank_math()->add_json( 'objectType', 'post' );
		} elseif ( is_category() || is_tag() || is_tax() ) {
			rank_math()->add_json( 'objectID', get_queried_object_id() );
			rank_math()->add_json( 'objectType', 'term' );
		} elseif ( is_author() ) {
			rank_math()->add_json( 'objectID', get_queried_object_id() );
			rank_math()->add_json( 'objectType', 'user' );
		}
	}

	/**
	 * Redirects attachment to its parent post if it has one.
	 */
	public function attachment_redirect_urls() {
		global $post;

		// Early bail.
		if ( ! is_attachment() ) {
			return;
		}

		$redirect = ! empty( $post->post_parent ) ? get_permalink( $post->post_parent ) : Helper::get_settings( 'general.attachment_redirect_default' );

		/**
		 * Redirect atachment to its parent post.
		 *
		 * @param string $redirect URL as calculated for redirection.
		 */
		Helper::redirect( $this->do_filter( 'frontend/attachment/redirect_url', $redirect ), 301 );
		exit;
	}

	/**
	 * When certain archives are disabled, this redirects those to the homepage.
	 */
	public function archive_redirect() {
		global $wp_query;

		if (
			( Helper::get_settings( 'titles.disable_date_archives' ) && $wp_query->is_date ) ||
			( true === Helper::get_settings( 'titles.disable_author_archives' ) && $wp_query->is_author )
		) {
			Helper::redirect( get_bloginfo( 'url' ), 301 );
			exit;
		}
	}

	/**
	 * Replace robots.txt content.
	 *
	 * @param  string $content Robots.txt file content.
	 * @param  bool   $public  Whether the site is considered "public".
	 * @return string New robots.txt content.
	 */
	public function robots_txt( $content, $public ) {
		if ( is_admin() ) {
			return $content;
		}

		return '0' == $public ? $content : Helper::get_settings( 'titles.robots_txt_content' );
	}

	/**
	 * Replaces the possible RSS variables with their actual values.
	 *
	 * @param string $content The RSS content that should have the variables replaced.
	 *
	 * @return string
	 */
	public function rss_replace_vars( $content ) {
		global $post;

		/**
		 * Allow the developer to determine whether or not to follow the links in the bits Yoast SEO adds to the RSS feed, defaults to true.
		 *
		 * @param bool $unsigned Whether or not to follow the links in RSS feed, defaults to true.
		 */
		$no_follow = $this->do_filter( 'frontend/rss/nofollow_links', true );
		$no_follow = true === $no_follow ? 'rel="nofollow" ' : '';

		$author_link = '';
		if ( is_object( $post ) ) {
			$author_link = '<a ' . $no_follow . 'href="' . esc_url( get_author_posts_url( $post->post_author ) ) . '">' . esc_html( get_the_author() ) . '</a>';
		}
		$post_link      = '<a ' . $no_follow . 'href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
		$blog_link      = '<a ' . $no_follow . 'href="' . esc_url( get_bloginfo( 'url' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
		$blog_desc_link = '<a ' . $no_follow . 'href="' . esc_url( get_bloginfo( 'url' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . ' - ' . esc_html( get_bloginfo( 'description' ) ) . '</a>';

		// Featured image.
		$image = Helper::get_thumbnail_with_fallback( $post->ID, 'full' );
		$image = isset( $image[0] ) ? '<img src="' . $image[0] . '" style="display: block; margin: 1em auto">' : '';

		$content = stripslashes( trim( $content ) );
		$content = str_replace( '%AUTHORLINK%', $author_link, $content );
		$content = str_replace( '%POSTLINK%', $post_link, $content );
		$content = str_replace( '%BLOGLINK%', $blog_link, $content );
		$content = str_replace( '%BLOGDESCLINK%', $blog_desc_link, $content );
		$content = str_replace( '%FEATUREDIMAGE%', $image, $content );

		return $content;
	}

	/**
	 * Adds the RSS footer (or header) to the full RSS feed item.
	 *
	 * @param  string $content Feed item content.
	 * @return string
	 */
	public function embed_rssfooter( $content ) {
		return $this->embed_rss( $content, 'full' );
	}

	/**
	 * Adds the RSS footer (or header) to the excerpt RSS feed item.
	 *
	 * @param  string $content Feed item excerpt.
	 * @return string
	 */
	public function embed_rssfooter_excerpt( $content ) {
		return $this->embed_rss( $content, 'excerpt' );
	}

	/**
	 * Adds the RSS footer and/or header to an RSS feed item.
	 *
	 * @param  string $content Feed item content.
	 * @param  string $context Feed item context, either 'excerpt' or 'full'.
	 * @return string
	 */
	public function embed_rss( $content, $context = 'full' ) {
		/**
		 * Allow the RSS footer to be dynamically shown/hidden.
		 *
		 * @param bool   $show_embed Indicates if the RSS footer should be shown or not.
		 * @param string $context    The context of the RSS content - 'full' or 'excerpt'.
		 */
		if ( ! $this->do_filter( 'frontend/rss/include_footer', true, $context ) ) {
			return $content;
		}

		if ( ! is_feed() ) {
			return $content;
		}

		$before = $this->do_filter( 'frontend/rss/before_content', Helper::get_settings( 'general.rss_before_content' ) );
		$after  = $this->do_filter( 'frontend/rss/after_content', Helper::get_settings( 'general.rss_after_content' ) );

		if ( '' !== $before ) {
			$before = wpautop( $this->rss_replace_vars( $before ) );
		}

		if ( '' !== $after ) {
			$after = wpautop( $this->rss_replace_vars( $after ) );
		}

		if ( '' !== $before || '' !== $after ) {
			if ( 'excerpt' === $context && '' !== trim( $content ) ) {
				$content = wpautop( $content );
			}
			$content = $before . $content . $after;
		}

		return $content;
	}

	/**
	 * Add nofollow, target, title and alt attributes to link and images.
	 */
	public function add_attributes() {
		// Add rel="nofollow" & target="_blank" for external links.
		if (
			Helper::get_settings( 'general.nofollow_external_links' ) ||
			Helper::get_settings( 'general.new_window_external_links' ) ||
			Helper::get_settings( 'general.nofollow_image_links' )
		) {
			$this->filter( 'the_content', 'add_link_attributes', 11 );
		}

		// Add image title and alt.
		if (
			Helper::get_settings( 'general.add_img_alt' ) ||
			Helper::get_settings( 'general.add_img_title' )
		) {
			$this->filter( 'the_content', 'add_img_attributes', 11 );
			$this->filter( 'post_thumbnail_html', 'add_img_attributes', 11 );
			$this->filter( 'woocommerce_single_product_image_thumbnail_html', 'add_img_attributes', 11 );
		}
	}

	/**
	 * Add nofollow and target attributes to link.
	 *
	 * @param  string $content Post content.
	 * @return string
	 */
	public function add_link_attributes( $content ) {

		preg_match_all( '/<(a\s[^>]+)>/', $content, $matches );
		if ( empty( $matches ) || empty( $matches[0] ) ) {
			return $content;
		}

		$nofollow_link   = Helper::get_settings( 'general.nofollow_external_links' );
		$nofollow_image  = Helper::get_settings( 'general.nofollow_image_links' );
		$new_window_link = Helper::get_settings( 'general.new_window_external_links' );

		foreach ( $matches[0] as $link ) {
			$is_dirty = false;
			$attrs    = Helper::html_extract_attributes( $link );

			// If link has no href attribute then we don't need to do anything.
			if ( empty( $attrs['href'] ) || Helper::str_start_with( 'javascript:', $attrs['href'] ) ) {
				continue;
			}

			$is_external = Helper::is_external_url( $attrs['href'] );
			// Skip if there is no href or it's a hash link like "#id".
			// Skip if relative link.
			// Skip for same domain ignoring sub-domain if any.
			if ( ! $is_external ) {
				continue;
			}

			if ( ( $nofollow_link || $nofollow_image ) && $this->should_add_nofollow( $attrs['href'] ) ) {
				if ( $nofollow_link ) {
					$is_dirty = true;
				}

				if ( $nofollow_image ) {
					foreach ( array( '.jpg', '.jpeg', '.png', '.gif' ) as $ext ) {
						if ( Helper::str_end_with( $ext, $attrs['href'] ) ) {
							$is_dirty = true;
							break;
						}
					}
				}

				// Check if rel is already added and has no dofollow.
				if ( $is_dirty ) {
					if ( empty( $attrs['rel'] ) ) {
						$attrs['rel'] = 'nofollow';
					} elseif ( ! Helper::str_contains( 'dofollow', $attrs['rel'] ) && ! Helper::str_contains( 'nofollow', $attrs['rel'] ) ) {
						$attrs['rel'] .= ' nofollow';
					}
				}
			}

			if ( $new_window_link && ! isset( $attrs['target'] ) ) {
				$is_dirty        = true;
				$attrs['target'] = '_blank';
			}

			if ( $is_dirty ) {
				$new     = '<a' . Helper::html_generate_attributes( $attrs ) . '>';
				$content = str_replace( $link, $new, $content );
			}
		}

		return $content;
	}

	/**
	 * Check if we need to add nofollow for this link, based on "nofollow_domains" & "nofollow_exclude_domains"
	 *
	 * @param  string $url Link URL.
	 * @return bool
	 */
	public function should_add_nofollow( $url ) {
		$include_domains = $this->get_nofollow_domains( 'include' );
		$exclude_domains = $this->get_nofollow_domains( 'exclude' );
		$parent_domain   = Helper::get_parent_domain( $url );

		// Check if domain is in list.
		if ( ! empty( $include_domains ) ) {
			if ( Helper::str_contains( $parent_domain, $include_domains ) ) {
				return true;
			}

			return false;
		}

		// Check if domains is NOT in list.
		if ( ! empty( $exclude_domains ) ) {
			if ( Helper::str_contains( $parent_domain, $exclude_domains ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Get domain for nofollow
	 *
	 * @param  string $type Type either include or exclude.
	 * @return array
	 */
	private function get_nofollow_domains( $type ) {
		static $rank_math_nofollow_domains;

		if ( isset( $rank_math_nofollow_domains[ $type ] ) ) {
			return $rank_math_nofollow_domains[ $type ];
		}

		$setting = 'include' === $type ? 'nofollow_domains' : 'nofollow_exclude_domains';
		$domains = Helper::get_settings( "general.{$setting}" );
		$domains = Helper::str_to_arr_no_empty( $domains );

		$rank_math_nofollow_domains[ $type ] = empty( $domains ) ? false : join( ';', $domains );

		return $rank_math_nofollow_domains[ $type ];
	}

	/**
	 * Add 'title' and 'alt' attribute to image.
	 *
	 * @param  string $content Post content.
	 * @return string
	 */
	public function add_img_attributes( $content ) {
		if ( empty( $content ) ) {
			return $content;
		}

		$stripped_content = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $content );
		preg_match_all( '/<img ([^>]+)\/?>/iU', $stripped_content, $matches, PREG_SET_ORDER );
		if ( empty( $matches ) ) {
			return $content;
		}

		$is_alt   = Helper::get_settings( 'general.add_img_alt' ) && Helper::get_settings( 'general.img_alt_format' ) ? trim( Helper::get_settings( 'general.img_alt_format' ) ) : false;
		$is_title = Helper::get_settings( 'general.add_img_title' ) && Helper::get_settings( 'general.img_title_format' ) ? trim( Helper::get_settings( 'general.img_title_format' ) ) : false;

		$post = \get_post();
		if ( empty( $post ) ) {
			$post = new stdClass;
		}
		foreach ( $matches as $image ) {
			$is_dirty = false;
			$attrs    = Helper::html_extract_attributes( $image[0] );

			if ( ! isset( $attrs['src'] ) ) {
				continue;
			}

			$post->filename = $attrs['src'];

			if ( $is_alt && empty( $attrs['alt'] ) ) {
				$is_dirty     = true;
				$attrs['alt'] = trim( Helper::replace_vars( $is_alt, $post ) );
			}

			if ( $is_title && empty( $attrs['title'] ) ) {
				$is_dirty       = true;
				$attrs['title'] = trim( Helper::replace_vars( $is_title, $post ) );
			}

			if ( $is_dirty ) {
				$new     = '<img' . Helper::html_generate_attributes( $attrs ) . '>';
				$content = str_replace( $image[0], $new, $content );
			}
		}

		return $content;
	}

	/**
	 * Reorder terms for a post to put primary category to the beginning.
	 *
	 * @param  array|WP_Error $terms    List of attached terms, or WP_Error on failure.
	 * @param  int            $post_id  Post ID.
	 * @param  string         $taxonomy Name of the taxonomy.
	 * @return array
	 */
	public function reorder_get_the_terms( $terms, $post_id, $taxonomy ) {
		/**
		 * Filter: Allow disabling the primary term feature.
		 *
		 * @param bool $return True to disable.
		 */
		if ( true === $this->do_filter( 'primary_term', false ) ) {
			return $terms;
		}

		$post_id = empty( $post_id ) ? $GLOBALS['post']->ID : $post_id;

		// Get Primary Term.
		$primary = Helper::get_post_meta( "primary_{$taxonomy}", $post_id );
		if ( ! $primary ) {
			return $terms;
		}

		if ( empty( $terms ) || is_wp_error( $terms ) ) {
			return array( $primary );
		}

		$primary_term = null;
		foreach ( $terms as $index => $term ) {
			if ( $primary == $term->term_id ) {
				$primary_term = $term;
				unset( $terms[ $index ] );
				array_unshift( $terms, $primary_term );
				break;
			}
		}

		return $terms;
	}

	/**
	 * Checks whether we can allow the feature that removes ?replytocom query parameters.
	 *
	 * @return bool True to remove, false not to remove.
	 */
	private function clean_reply_to_com() {
		/**
		 * Filter: 'rank_math_remove_reply_to_com' - Allow disabling the feature that removes ?replytocom query parameters.
		 *
		 * @param bool $return True to remove, false not to remove.
		 */
		return (bool) $this->do_filter( 'frontend/remove_reply_to_com', true );
	}

	/**
	 * Removes the ?replytocom variable from the link, replacing it with a #comment-<number> anchor.
	 *
	 * @param  string $link The comment link as a string.
	 * @return string The modified link.
	 */
	public function remove_reply_to_com( $link ) {
		return preg_replace( '`href=(["\'])(?:.*(?:\?|&|&#038;)replytocom=(\d+)#respond)`', 'href=$1#comment-$2', $link );
	}

	/**
	 * Redirects out the ?replytocom variables.
	 *
	 * @return bool True when redirect has been done.
	 */
	public function replytocom_redirect() {

		if ( isset( $_GET['replytocom'] ) && is_singular() ) {
			$url          = get_permalink( $GLOBALS['post']->ID );
			$query_string = remove_query_arg( 'replytocom', sanitize_text_field( $_SERVER['QUERY_STRING'] ) );
			if ( ! empty( $query_string ) ) {
				$url .= '?' . $query_string;
			}
			$url .= '#comment-' . sanitize_text_field( $_GET['replytocom'] );
			Helper::redirect( $url, 301 );
			return true;
		}

		return false;
	}
}
