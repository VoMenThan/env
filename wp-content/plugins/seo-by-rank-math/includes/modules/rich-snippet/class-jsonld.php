<?php
/**
 * Outputs schema code specific for Google's JSON LD stuff
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\RichSnippet
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\RichSnippet;

use RankMath\Helper;
use RankMath\Traits\Hooker;
use RankMath\Admin\Helper as Admin_Helper;

defined( 'ABSPATH' ) || exit;

/**
 * JsonLD class.
 */
class JsonLD {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {

		$this->action( 'rank_math/head', 'json_ld', 90 );
		$this->filter( 'rank_math/json_ld', 'website', 10 );

		if ( is_search() ) {
			$this->filter( 'rank_math/json_ld', 'search_results_page', 20 );
		} elseif ( is_author() ) {
			$this->filter( 'rank_math/json_ld', 'profile_page', 20 );
		} elseif ( Helper::is_woocommerce_active() && ( ( is_tax() && in_array( get_query_var( 'taxonomy' ), get_object_taxonomies( 'product' ) ) ) || is_shop() ) ) {
			$this->filter( 'rank_math/json_ld', 'products_page', 20 );
		} elseif ( is_category() || is_tag() || is_tax() ) {
			$this->filter( 'rank_math/json_ld', 'collection_page', 20 );
		} elseif ( is_home() ) {
			$this->filter( 'rank_math/json_ld', 'blog', 20 );
		} elseif ( is_singular() ) {
			$this->filter( 'rank_math/json_ld', 'rich_snippet', 20 );
		}

		/**
		 * Allow developer to disable the breadcrumb json-ld output.
		 *
		 * @param bool $unsigned Default: true
		 */
		if ( Helper::get_settings( 'general.breadcrumbs' ) && $this->do_filter( 'json_ld/breadcrumbs_enabled', true ) ) {
			$this->filter( 'rank_math/json_ld', 'breadcrumbs', 20 );
		}
	}

	/**
	 * JSON LD output function that the functions for specific code can hook into.
	 */
	public function json_ld() {
		/**
		 * Collect data to output in JSON-LD.
		 *
		 * @param array  $unsigned An array of data to output in json-ld.
		 * @param JsonLD $unsigned JsonLD instance.
		 */
		$data = $this->do_filter( 'json_ld', array(), $this );
		if ( is_array( $data ) && ! empty( $data ) ) {
			echo '<script type="application/ld+json">' . wp_json_encode( array_values( array_filter( $data ) ) ) . '</script>' . "\n";
		}
	}

	/**
	 * Outputs code to allow recognition of the internal search engine.
	 *
	 * @link https://developers.google.com/structured-data/site-name
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	public function website( $data ) {

		$data['WebSite'] = array(
			'@context' => 'https://schema.org',
			'@type'    => 'WebSite',
			'@id'      => home_url( '/#website' ),
			'url'      => get_home_url(),
			'name'     => $this->get_website_name(),
		);

		/**
		 * Allow disabling of the json+ld output.
		 *
		 * @param boolean Whether or not to display json+ld search on the frontend
		 */
		if ( ! $this->do_filter( 'json_ld/disable_search', false ) ) {
			/**
			 * Allows filtering of the search URL.
			 *
			 * @param string $search_url The search URL for this site with a `{search_term_string}` variable.
			 */
			$search_url = $this->do_filter( 'json_ld/search_url', home_url( '/?s={search_term_string}' ) );

			$data['WebSite']['potentialAction'] = array(
				'@type'       => 'SearchAction',
				'target'      => $search_url,
				'query-input' => 'required name=search_term_string',
			);
		}

		return $data;
	}

	/**
	 * Outputs code to allow recognition of the SearchResultsPage.
	 *
	 * @link https://schema.org/SearchResultsPage
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	public function search_results_page( $data ) {

		$data['SearchResultsPage'] = array(
			'@context' => 'https://schema.org',
			'@type'    => 'SearchResultsPage',
		);

		return $data;
	}

	/**
	 * Outputs code to allow recognition of the ProfilePage.
	 *
	 * @link https://schema.org/ProfilePage
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	public function profile_page( $data ) {

		$data['ProfilePage'] = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'ProfilePage',
			'headline'      => sprintf( 'About %s', get_the_author() ),
			'datePublished' => get_the_date( 'Y-m-d' ),
			'dateModified'  => get_the_modified_date( 'Y-m-d' ),
			'about'         => $this->get_author(),
		);

		return $data;
	}

	/**
	 * Outputs code to allow recognition of the CollectionPage.
	 *
	 * @link https://schema.org/CollectionPage
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	public function products_page( $data ) {

		$parts = array();
		while ( have_posts() ) :
			the_post();

			// Title.
			$title = Helper::get_post_meta( 'snippet_name', get_the_ID() );
			$title = $title ? $title : get_the_title();

			// URL.
			$url = Helper::get_post_meta( 'snippet_url', get_the_ID() );
			$url = $url ? $url : get_the_permalink();

			$part = array(
				'@type' => 'Product',
				'name'  => $title,
				'url'   => $url,
				'@id'   => $url,
			);

			$parts[] = $part;
		endwhile;

		wp_reset_query();

		$data['ProductsPage'] = array(
			'@context' => 'https://schema.org/',
			'@graph'   => $parts,
		);

		return $data;
	}

	/**
	 * Outputs code to allow recognition of the CollectionPage.
	 *
	 * @link https://schema.org/CollectionPage
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	public function collection_page( $data ) {

		$queried_object = get_queried_object();
		/**
		 * Allow developer to remove snippet data.
		 *
		 * @param bool $unsigned Default: false
		 * @param string $unsigned Taxonomy Name
		 */
		if ( true === Helper::get_settings( 'titles.remove_' . $queried_object->taxonomy . '_snippet_data' ) || true === $this->do_filter( 'snippet/remove_taxonomy_data', false, $queried_object->taxonomy ) ) {
			return $data;
		}

		$data['CollectionPage'] = array(
			'@context'    => 'https://schema.org/',
			'@type'       => 'CollectionPage',
			'headline'    => single_term_title( '', false ),
			'description' => strip_tags( term_description() ),
			'url'         => get_term_link( get_queried_object() ),
			'hasPart'     => $this->get_post_parts( $data ),
		);

		return $data;
	}

	/**
	 * Outputs code to allow recognition of the Blog.
	 *
	 * @link https://schema.org/CollectionPage
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	public function blog( $data ) {
		$is_front       = is_front_page() && is_home() || is_front_page();
		$data['schema'] = 'BlogPosting';
		$data['Blog']   = array(
			'@context'    => 'https://schema.org/',
			'@type'       => 'Blog',
			'url'         => $is_front ? home_url() : get_permalink( get_option( 'page_for_posts' ) ),
			'headline'    => $is_front ? $this->get_website_name() : get_the_title( get_option( 'page_for_posts' ) ),
			'description' => get_bloginfo( 'description' ),
			'blogPost'    => $this->get_post_parts( $data ),
		);

		return $data;
	}

	/**
	 * Generate rich snippet.
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	public function rich_snippet( $data ) {
		global $post;

		$schema = Helper::get_post_meta( 'rich_snippet' );
		if ( ! $schema && Helper::is_woocommerce_active() && is_product() && ! metadata_exists( 'post', $post->ID, 'rank_math_rich_snippet' ) ) {
			$schema = Helper::get_settings( 'titles.pt_product_default_rich_snippet' );
		}

		if ( false === $schema ) {
			return $data;
		}

		$method = 'rich_snippet_' . $schema;
		$parts  = array(
			'canonical' => rank_math()->head->canonical( false ),
			'modified'  => get_post_modified_time( 'Y-m-d\TH:i:sP', true ),
			'published' => get_post_time( 'Y-m-d\TH:i:sP', true ),
			'excerpt'   => wp_strip_all_tags( get_the_excerpt(), true ),
		);

		// Title.
		$title          = Helper::get_post_meta( 'snippet_name' );
		$parts['title'] = $title ? $title : rank_math()->head->title( '' );

		// Description.
		$desc          = Helper::get_post_meta( 'snippet_desc' );
		$parts['desc'] = $desc ? $desc : ( $parts['excerpt'] ? $parts['excerpt'] : Helper::get_post_meta( 'description' ) );

		// URL.
		$url          = Helper::get_post_meta( 'snippet_url' );
		$parts['url'] = $url ? $url : $parts['canonical'];

		// Author.
		$author          = Helper::get_post_meta( 'snippet_author' );
		$parts['author'] = $author ? $author : get_the_author_meta( 'display_name', $post->post_author );

		/**
		 * Short-circuit if 3rd party is interested generating his own data.
		 */
		$pre = $this->do_filter( 'snippet/' . $method, false, $parts, $data );
		if ( false !== $pre ) {
			$data['richSnippet'] = $this->do_filter( 'snippet/' . $method . '_entity', $pre );
			return $data;
		}

		if ( ! method_exists( $this, $method ) ) {
			return $data;
		}

		$entity = $this->$method( $parts, $data );

		// Images.
		$this->add_prop( 'thumbnail', $entity );
		if ( ! empty( $entity['image'] ) && 'video' === $schema ) {
			$entity['thumbnailUrl'] = $entity['image']['url'];
			unset( $entity['image'] );
		}

		$data['richSnippet'] = $this->do_filter( 'snippet/' . $method . '_entity', $entity );

		return $data;
	}

	/**
	 * Article rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_article( $parts, &$data ) {
		$entity = array(
			'@context'         => 'https://schema.org',
			'@type'            => Helper::get_post_meta( 'snippet_article_type' ),
			'headline'         => $parts['title'],
			'description'      => $parts['desc'],
			'datePublished'    => $parts['published'],
			'dateModified'     => $parts['modified'],
			'publisher'        => $this->get_publisher( $data ),
			'mainEntityOfPage' => array(
				'@type' => 'WebPage',
				'@id'   => $parts['canonical'],
			),
			'author'           => array(
				'@type' => 'Person',
				'name'  => $parts['author'],
			),
		);

		if ( isset( $data['Organization'] ) ) {
			unset( $data['Organization'] );
		}

		return $entity;
	}

	/**
	 * Book rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_book( $parts, &$data ) {
		$editions = array_filter( (array) Helper::get_post_meta( 'snippet_book_editions' ) );
		$entity   = array(
			'@context' => 'https://schema.org',
			'@type'    => 'Book',
			'name'     => $parts['title'],
			'author'   => array(
				'@type' => 'Person',
				'name'  => $parts['author'],
			),
			'url'      => $parts['url'],
			'hasPart'  => array(),
		);

		foreach ( \array_reverse( $editions ) as $edition ) {

			if ( empty( $edition['name'] ) ) {
				continue;
			}

			$work = array(
				'@type'         => 'Book',
				'bookEdition'   => $edition['book_edition'],
				'bookFormat'    => 'https://schema.org/' . $edition['book_format'],
				'datePublished' => $edition['date_published'],
			);

			$fields = array( 'isbn', 'name', 'author' );
			foreach ( $fields as $field ) {
				if ( ! empty( $edition[ $field ] ) ) {
					$work[ $field ] = $edition[ $field ];
				}
			}

			if ( ! empty( $edition['url'] ) ) {
				$work['@id'] = $edition['url'];
				$work['url'] = $edition['url'];
			}

			$entity['hasPart'][] = $work;
		}

		return $entity;
	}

	/**
	 * Course rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_course( $parts, &$data ) {
		$entity = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Course',
			'name'        => $parts['title'],
			'description' => $parts['desc'],
			'provider'    => array(
				'@type'  => 'Organization',
				'name'   => Helper::get_post_meta( 'snippet_course_provider' ),
				'sameAs' => Helper::get_post_meta( 'snippet_course_provider_url' ),
			),
		);

		if ( isset( $data['Organization'] ) ) {
			unset( $data['Organization'] );
		}

		return $entity;
	}

	/**
	 * Event rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_event( $parts, &$data ) {
		$entity = array(
			'@context'    => 'https://schema.org',
			'@type'       => Helper::get_post_meta( 'snippet_event_type' ),
			'name'        => $parts['title'],
			'description' => $parts['desc'],
			'url'         => $parts['url'],
			'eventStatus' => Helper::get_post_meta( 'snippet_event_status' ),
			'location'    => array(
				'@type' => 'Place',
				'name'  => Helper::get_post_meta( 'snippet_event_venue' ),
				'url'   => Helper::get_post_meta( 'snippet_event_venueurl' ),
			),
			'offers'      => array(
				'@type'    => 'Offer',
				'name'     => 'General Admission',
				'category' => 'primary',
			),
		);

		if ( $start_date = Helper::get_post_meta( 'snippet_event_startdate' ) ) { // @codingStandardsIgnoreLine
			$entity['startDate'] = str_replace( ' ', 'T', date( 'Y-m-d H:i', $start_date ) );
		}
		if ( $end_date = Helper::get_post_meta( 'snippet_event_enddate' ) ) { // @codingStandardsIgnoreLine
			$entity['endDate'] = str_replace( ' ', 'T', date( 'Y-m-d H:i', $end_date ) );
		}

		$this->set_address( 'event', $entity['location'] );

		$this->set_data( array(
			'snippet_event_price'               => 'price',
			'snippet_event_currency'            => 'priceCurrency',
			'snippet_event_ticketurl'           => 'url',
			'snippet_event_inventory'           => 'inventoryLevel',
			'snippet_event_availability'        => 'availability',
			'snippet_event_availability_starts' => 'validFrom',
		), $entity['offers'] );

		if ( ! empty( $entity['offers']['validFrom'] ) ) {
			$entity['offers']['validFrom'] = str_replace( ' ', 'T', date( 'Y-m-d H:i', $entity['offers']['validFrom'] ) );
		}
		if ( $performer = Helper::get_post_meta( 'snippet_event_performer' ) ) { // @codingStandardsIgnoreLine
			$entity['performer'] = array(
				'@type' => 'Person',
				'name'  => $performer,
			);
		}

		return $entity;
	}

	/**
	 * Job Posting rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_jobposting( $parts, &$data ) {
		global $post;

		$posted = $parts['published'];
		if ( $start_date = Helper::get_post_meta( 'snippet_jobposting_startdate' ) ) { // @codingStandardsIgnoreLine
			$posted = str_replace( ' ', 'T', date( 'Y-m-d H:i', $start_date ) );
		}

		$entity = array(
			'@context'       => 'https://schema.org',
			'@type'          => 'JobPosting',
			'title'          => $parts['title'],
			'description'    => $parts['desc'] ? $parts['desc'] : get_the_content(),
			'identifier'     => array(
				'@type' => 'PropertyValue',
				'name'  => '',
				'value' => '',
			),
			'datePosted'     => $posted,
			'validThrough'   => '',
			'employmentType' => Helper::get_post_meta( 'snippet_jobposting_employment_type' ),
			'jobLocation'    => array( '@type' => 'Place' ),
			'baseSalary'     => array(
				'@type'    => 'MonetaryAmount',
				'currency' => Helper::get_post_meta( 'snippet_jobposting_currency' ),
				'value'    => array(
					'@type'    => 'QuantitativeValue',
					'value'    => absint( Helper::get_post_meta( 'snippet_jobposting_salary' ) ),
					'unitText' => Helper::get_post_meta( 'snippet_jobposting_payroll' ),
				),
			),
		);

		$this->add_prop( 'thumbnail', $entity );
		$this->set_address( 'jobposting', $entity['jobLocation'] );

		// Publisher.
		if ( $organization = Helper::get_post_meta( 'snippet_jobposting_organization' ) ) { // @codingStandardsIgnoreLine
			$entity['hiringOrganization'] = array(
				'@type'  => 'Organization',
				'name'   => $organization,
				'sameAs' => Helper::get_post_meta( 'snippet_jobposting_url' ),
				'logo'   => Helper::get_post_meta( 'snippet_jobposting_logo' ),
			);
		} elseif ( isset( $data['Organization'] ) ) {
			$this->set_publisher( $entity['hiringOrganization'], $data['Organization'] );
		}

		if ( $end_date = Helper::get_post_meta( 'snippet_jobposting_expirydate' ) ) { // @codingStandardsIgnoreLine
			$entity['validThrough'] = str_replace( ' ', 'T', date( 'Y-m-d H:i', $end_date ) );

			// Unpublish job posting when expired.
			if ( Helper::get_post_meta( 'snippet_jobposting_unpublish' ) ) {
				if ( date_create( 'now' )->getTimestamp() > $end_date ) {
					wp_update_post( array(
						'ID'          => $post->ID,
						'post_status' => 'draft',
					) );
				}
			}
		}

		return $entity;
	}

	/**
	 * Local Business rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_local( $parts, &$data ) {

		$entity = array(
			'@context'                  => 'https://schema.org',
			'@type'                     => 'LocalBusiness',
			'@id'                       => rank_math()->head->canonical( false ),
			'name'                      => $parts['title'],
			'url'                       => $parts['url'],
			'telephone'                 => Helper::get_post_meta( 'snippet_local_phone' ),
			'geo'                       => array( '@type' => 'GeoCoordinates' ),
			'priceRange'                => Helper::get_post_meta( 'snippet_local_price_range' ),
			'openingHoursSpecification' => array( '@type' => 'OpeningHoursSpecification' ),
		);

		$this->set_address( 'local', $entity );

		$this->set_data( array(
			'snippet_local_opendays' => 'dayOfWeek',
			'snippet_local_opens'    => 'opens',
			'snippet_local_closes'   => 'closes',
		), $entity['openingHoursSpecification'] );

		// GPS.
		if ( $geo = Helper::get_post_meta( 'snippet_local_geo' ) ) { // @codingStandardsIgnoreLine
			$parts = explode( ' ', $geo );
			if ( count( $parts ) > 1 ) {
				$entity['geo']['latitude']  = $parts[0];
				$entity['geo']['longitude'] = $parts[1];
			}
		}

		if ( isset( $data['Organization'] ) ) {
			unset( $data['Organization'] );
		}

		return $entity;
	}

	/**
	 * Music rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_music( $parts, &$data ) {
		$entity = array(
			'@context'    => 'https://schema.org',
			'@type'       => Helper::get_post_meta( 'snippet_music_type' ),
			'name'        => $parts['title'],
			'description' => $parts['desc'],
			'url'         => $parts['url'],
		);
		return $entity;
	}

	/**
	 * Product rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_product( $parts, &$data ) {
		$sku    = Helper::get_post_meta( 'snippet_product_sku' );
		$entity = array(
			'@context'    => 'https://schema.org/',
			'@type'       => 'Product',
			'@id'         => get_the_permalink(),
			'sku'         => $sku ? $sku : '',
			'name'        => $parts['title'],
			'description' => $parts['desc'],
			'releaseDate' => $parts['published'],
			'offers'      => array(
				'@type'           => 'Offer',
				'priceCurrency'   => Helper::get_post_meta( 'snippet_product_currency' ),
				'price'           => Helper::get_post_meta( 'snippet_product_price' ),
				'url'             => get_the_permalink(),
				'priceValidUntil' => Helper::get_post_meta( 'snippet_product_price_valid' ),
				'availability'    => Helper::get_post_meta( 'snippet_product_instock' ) ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
			),
		);

		$brand = Helper::get_post_meta( 'snippet_product_brand' );
		if ( $brand ) {
			$entity['mpn']   = $brand;
			$entity['brand'] = array(
				'@type' => 'Thing',
				'name'  => $brand,
			);
		}

		if ( Helper::is_woocommerce_active() && is_product() ) {
			remove_action( 'wp_footer', array( WC()->structured_data, 'output_structured_data' ), 10 );
			remove_action( 'woocommerce_email_order_details', array( WC()->structured_data, 'output_email_structured_data' ), 30 );
			$this->set_product( $entity );
		}

		if ( Helper::is_edd_active() && is_singular( 'download' ) ) {
			remove_action( 'edd_purchase_link_top', 'edd_purchase_link_single_pricing_schema', 10 );
			remove_action( 'loop_start', 'edd_microdata_wrapper_open', 10 );
			$this->set_edd( $entity );
		}

		return $entity;
	}

	/**
	 * Recipe rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_recipe( $parts, &$data ) {
		$entity = array(
			'@context'         => 'https://schema.org/',
			'@type'            => 'Recipe',
			'name'             => $parts['title'],
			'description'      => $parts['desc'],
			'datePublished'    => $parts['published'],
			'author'           => array(
				'@type' => 'Person',
				'name'  => $parts['author'],
			),
			'prepTime'         => 'PT' . Helper::get_post_meta( 'snippet_recipe_preptime' ),
			'cookTime'         => 'PT' . Helper::get_post_meta( 'snippet_recipe_cooktime' ),
			'totalTime'        => 'PT' . Helper::get_post_meta( 'snippet_recipe_totaltime' ),
			'recipeCategory'   => Helper::get_post_meta( 'snippet_recipe_type' ),
			'recipeCuisine'    => Helper::get_post_meta( 'snippet_recipe_cuisine' ),
			'keywords'         => Helper::get_post_meta( 'snippet_recipe_keywords' ),
			'recipeYield'      => Helper::get_post_meta( 'snippet_recipe_yield' ),
			'recipeIngredient' => Helper::str_to_arr_no_empty( Helper::get_post_meta( 'snippet_recipe_ingredients' ) ),
		);

		$instruction_type = Helper::get_post_meta( 'snippet_recipe_instruction_type' );

		switch ( $instruction_type ) {
			case 'HowToSection':
				$instructions = Helper::get_post_meta( 'snippet_recipe_instructions' );

				if ( is_array( $instructions ) ) {
					foreach ( $instructions as $instruction ) {
						if ( empty( $instruction['name'] ) ) {
							continue;
						}

						$steps = Helper::str_to_arr_no_empty( $instruction['text'] );
						if ( empty( $steps ) ) {
							continue;
						}

						$list = $steps;
						if ( 1 < count( $steps ) ) {
							$list = array();
							foreach ( $steps as $step ) {
								$list[] = array(
									'type' => 'HowtoStep',
									'text' => $step,
								);
							}
						}

						$entity['recipeInstructions'][] = array(
							'type'            => 'HowToSection',
							'name'            => $instruction['name'],
							'itemListElement' => $list,
						);
					}
				}
				break;

			case 'HowToStep':
				$instructions = Helper::str_to_arr_no_empty( Helper::get_post_meta( 'snippet_recipe_single_instructions' ) );
				if ( empty( $instructions ) ) {
					break;
				}

				if ( 1 < count( $instructions ) ) {
					$entity['recipeInstructions']['type'] = 'HowToSection';
					$entity['recipeInstructions']['name'] = Helper::get_post_meta( 'snippet_recipe_instruction_name' );
					foreach ( $instructions as $instruction ) {
						$entity['recipeInstructions']['itemListElement'][] = array(
							'type' => 'HowtoStep',
							'text' => $instruction,
						);
					}
				} else {
					$entity['recipeInstructions'] = $instructions;
				}
				break;

			default:
				$entity['recipeInstructions'] = Helper::get_post_meta( 'snippet_recipe_single_instructions' );
				break;
		}

		if ( $calories = Helper::get_post_meta( 'snippet_recipe_calories' ) ) { // @codingStandardsIgnoreLine
			$entity['nutrition'] = array(
				'@type'    => 'NutritionInformation',
				'calories' => $calories,
			);
		}

		if ( $rating = Helper::get_post_meta( 'snippet_recipe_rating' ) ) { // @codingStandardsIgnoreLine
			$entity['aggregateRating'] = array(
				'@type'       => 'AggregateRating',
				'ratingValue' => $rating,
				'bestRating'  => Helper::get_post_meta( 'snippet_recipe_rating_max' ),
				'worstRating' => Helper::get_post_meta( 'snippet_recipe_rating_min' ),
				'ratingCount' => '1',
			);
		}

		if ( $video = Helper::get_post_meta( 'snippet_recipe_video' ) ) { // @codingStandardsIgnoreLine
			$entity['video'] = array(
				'@type'        => 'VideoObject',
				'embedUrl'     => $video,
				'description'  => Helper::get_post_meta( 'snippet_recipe_video_description' ),
				'name'         => Helper::get_post_meta( 'snippet_recipe_video_name' ),
				'thumbnailUrl' => Helper::get_post_meta( 'snippet_recipe_video_thumbnail' ),
				'uploadDate'   => Helper::get_post_meta( 'snippet_recipe_video_date' ),
			);
		}

		return $entity;
	}

	/**
	 * Restaurant rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_restaurant( $parts, &$data ) {
		$entity = $this->rich_snippet_local( $parts, $data );

		$entity['@type']       = 'Restaurant';
		$entity['description'] = $parts['desc'];
		$entity['hasMenu']     = Helper::get_post_meta( 'snippet_restaurant_menu' );

		$serves_cuisine = trim( Helper::get_post_meta( 'snippet_restaurant_serves_cuisine' ) );
		if ( $serves_cuisine ) {
			$entity['servesCuisine'] = explode( ',', $serves_cuisine );
		}

		return $entity;
	}

	/**
	 * Video rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_video( $parts, &$data ) {
		$entity = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'VideoObject',
			'name'        => $parts['title'],
			'description' => $parts['desc'],
			'uploadDate'  => $parts['published'],
			'duration'    => 'PT' . Helper::get_post_meta( 'snippet_video_duration' ),
		);

		$this->set_data( array(
			'snippet_video_url'       => 'contentUrl',
			'snippet_video_embed_url' => 'embedUrl',
			'snippet_video_views'     => 'interactionCount',
		), $entity );

		if ( isset( $data['Organization'] ) ) {
			$this->set_publisher( $entity, $data['Organization'] );
			unset( $data['Organization'] );
		}

		return $entity;
	}

	/**
	 * Person rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data  Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_person( $parts, &$data ) {
		$entity = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Person',
			'name'        => $parts['title'],
			'description' => $parts['desc'],
			'email'       => Helper::get_post_meta( 'snippet_person_email' ),
			'gender'      => Helper::get_post_meta( 'snippet_person_gender' ),
			'jobTitle'    => Helper::get_post_meta( 'snippet_person_job_title' ),
		);

		$this->set_address( 'person', $entity );

		return $entity;
	}

	/**
	 * Review rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data  Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_review( $parts, &$data ) {
		$entity = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'Review',
			'author'        => array(
				'@type' => 'Person',
				'name'  => $parts['author'],
			),
			'datePublished' => $parts['published'],
			'description'   => $parts['desc'],
			'itemReviewed'  => array(
				'@type' => 'Thing',
				'name'  => $parts['title'],
			),
			'reviewRating'  => array(
				'@type'       => 'Rating',
				'worstRating' => Helper::get_post_meta( 'snippet_review_worst_rating' ),
				'bestRating'  => Helper::get_post_meta( 'snippet_review_best_rating' ),
				'ratingValue' => Helper::get_post_meta( 'snippet_review_rating_value' ),
			),
		);

		$this->add_prop( 'thumbnail', $entity['itemReviewed'] );

		return $entity;
	}

	/**
	 * Service rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data  Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_service( $parts, &$data ) {
		$entity = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'Service',
			'name'            => $parts['title'],
			'description'     => $parts['desc'],
			'serviceType'     => Helper::get_post_meta( 'snippet_service_type' ),
			'offers'          => array(
				'@type'         => 'Offer',
				'price'         => Helper::get_post_meta( 'snippet_service_price' ),
				'priceCurrency' => Helper::get_post_meta( 'snippet_service_price_currency' ),
			),
			'aggregateRating' => array(
				'@type'       => 'AggregateRating',
				'ratingValue' => Helper::get_post_meta( 'snippet_service_rating_value' ),
				'ratingCount' => Helper::get_post_meta( 'snippet_service_rating_count' ),
			),
		);

		return $entity;
	}

	/**
	 * SoftwareApplication rich snippet.
	 *
	 * @param array $parts Array of global parts for snippet.
	 * @param array $data  Array of json-ld data.
	 * @return array
	 */
	private function rich_snippet_software( $parts, &$data ) {
		$entity = array(
			'@context'            => 'https://schema.org',
			'@type'               => 'SoftwareApplication',
			'name'                => $parts['title'],
			'description'         => $parts['desc'],
			'operatingSystem'     => Helper::get_post_meta( 'snippet_software_operating_system' ),
			'applicationCategory' => Helper::get_post_meta( 'snippet_software_application_category' ),
			'offers'              => array(
				'@type'         => 'Offer',
				'price'         => Helper::get_post_meta( 'snippet_software_price' ),
				'priceCurrency' => Helper::get_post_meta( 'snippet_software_price_currency' ),
			),
			'aggregateRating'     => array(
				'@type'       => 'AggregateRating',
				'ratingValue' => Helper::get_post_meta( 'snippet_software_rating_value' ),
				'ratingCount' => Helper::get_post_meta( 'snippet_software_rating_count' ),
			),
		);

		return $entity;
	}

	/**
	 * Set product data for rich snippet.
	 *
	 * @param array $entity Array of json-ld entity.
	 */
	private function set_product( &$entity ) {
		global $post;
		$product_id = get_the_ID();
		$permalink  = get_permalink();
		$product    = wc_get_product( $product_id );
		$attributes = new WC_Attributes( $product );

		if ( Helper::is_module_active( 'woocommerce' ) ) {
			$wc    = new \RankMath\Modules\WooCommerce\Woocommerce;
			$brand = $wc->get_product_var_brand();

			// Brand.
			if ( $brand ) {
				$entity['mpn']   = $brand;
				$entity['brand'] = array(
					'@type' => 'Thing',
					'name'  => $brand,
				);
			}
		}

		$entity['name']        = $product->get_title();
		$entity['description'] = strip_shortcodes( $post->post_excerpt );
		$entity['url']         = $permalink;
		$entity['sku']         = $product->get_sku() ? $product->get_sku() : '';

		// Categories.
		$categories = get_the_terms( $product_id, 'product_cat' );
		if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
			$category = '';
			if ( 0 === $categories[0]->parent ) {
				$category = $categories[0]->name;
			} else {
				$category  = array();
				$ancestors = get_ancestors( $categories[0]->term_id, 'product_cat' );
				foreach ( $ancestors as $parent ) {
					$term       = get_term( $parent, 'product_cat' );
					$category[] = $term->name;
				}
				$category[] = $categories[0]->name;
				$category   = join( ' > ', $category );
			}
			$entity['category'] = $category;
		}

		$related_products = wc_get_related_products( $product_id, 5 );
		if ( ! empty( $related_products ) ) {
			foreach ( $related_products as $related_id ) {
				$entity['isRelatedTo'][] = array(
					'@type' => 'Product',
					'url'   => get_permalink( $related_id ),
					'name'  => get_the_title( $related_id ),
				);
			}
		}

		$upsells = $product->get_upsell_ids();
		if ( ! empty( $upsells ) ) {
			foreach ( $upsells as $upsell_id ) {
				$entity['isSimilarTo'][] = array(
					'@type' => 'Product',
					'url'   => get_permalink( $upsell_id ),
					'name'  => get_the_title( $upsell_id ),
				);
			}
		}

		if ( $product->has_weight() ) {
			$hash = array(
				'lbs' => 'LBR',
				'kg'  => 'KGM',
				'g'   => 'GRM',
				'oz'  => 'ONZ',
			);
			$unit = get_option( 'woocommerce_weight_unit' );

			$entity['weight'] = array(
				'@type'    => 'QuantitativeValue',
				'unitCode' => isset( $hash[ $unit ] ) ? $hash[ $unit ] : 'LBR',
				'value'    => $product->get_weight(),
			);
		}

		if ( $product->has_dimensions() ) {
			$hash = array(
				'in' => 'INH',
				'm'  => 'MTR',
				'cm' => 'CMT',
				'mm' => 'MMT',
				'yd' => 'YRD',
			);
			$unit = get_option( 'woocommerce_dimension_unit' );
			$code = isset( $hash[ $unit ] ) ? $hash[ $unit ] : '';

			$entity['height'] = array(
				'@type'    => 'QuantitativeValue',
				'unitCode' => $code,
				'value'    => $product->get_height(),
			);

			$entity['width'] = array(
				'@type'    => 'QuantitativeValue',
				'unitCode' => $code,
				'value'    => $product->get_width(),
			);

			$entity['depth'] = array(
				'@type'    => 'QuantitativeValue',
				'unitCode' => $code,
				'value'    => $product->get_length(),
			);
		}

		if ( $product->get_image_id() ) {
			$wpimage           = wp_get_attachment_image_src( $product->get_image_id(), 'single-post-thumbnail' );
			$entity['image'][] = array(
				'@type'  => 'ImageObject',
				'url'    => $wpimage[0],
				'height' => $wpimage[2],
				'width'  => $wpimage[1],
			);

			$gallery = $product->get_gallery_image_ids();
			foreach ( $gallery as $image_id ) {
				$wpimage           = wp_get_attachment_image_src( $image_id, 'single-post-thumbnail' );
				$entity['image'][] = array(
					'@type'  => 'ImageObject',
					'url'    => $wpimage[0],
					'height' => $wpimage[2],
					'width'  => $wpimage[1],
				);
			}
		}

		// Offers.
		$do_single_offer = true;
		$seller          = $this->get_seller();
		if ( $product->is_type( 'variable' ) ) {
			$variations = $product->get_available_variations();

			if ( ! empty( $variations ) ) {
				$do_single_offer  = false;
				$entity['offers'] = array();

				foreach ( $variations as $variation ) {

					// Offers are only for public products.
					if ( $variation['variation_is_visible'] && $variation['variation_is_active'] ) {
						$price_valid_until = get_post_meta( $variation['variation_id'], '_sale_price_dates_to', true );

						$offer = array(
							'@type'           => 'Offer',
							'description'     => strip_tags( $variation['variation_description'] ),
							'price'           => $variation['display_price'],
							'priceCurrency'   => get_woocommerce_currency(),
							'availability'    => $variation['is_in_stock'] ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
							'itemCondition'   => 'NewCondition',
							'seller'          => $seller,
							'priceValidUntil' => $price_valid_until ? date( 'Y-m-d', $price_valid_until ) : '',
						);

						// Generate a unique variation ID.
						if ( '' !== $variation['sku'] ) {
							$offer['sku'] = $variation['sku'];
							$offer['@id'] = $permalink . '#' . $variation['sku'];
						} else {
							foreach ( $variation['attributes'] as $key => $value ) {
								if ( '' !== $value ) {
									$offer['@id'] = $permalink . '#' . substr( $key, 10 ) . '-' . filter_var( $value, FILTER_SANITIZE_URL );
								}
							}
						}

						// Look for itemCondition override by variation.
						foreach ( $variation['attributes'] as $key => $value ) {
							if ( stristr( $key, 'itemCondition' ) ) {
								$offer['itemCondition'] = $value;
							}
						}
						$entity['offers'][] = $offer;
					}
				}
			}
		}

		if ( $do_single_offer ) {
			$offer = array(
				'@type'           => 'Offer',
				'price'           => $product->get_price() ? $product->get_price() : '0',
				'priceCurrency'   => get_woocommerce_currency(),
				'availability'    => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
				'itemCondition'   => 'NewCondition',
				'seller'          => $seller,
				'url'             => $permalink,
				'priceValidUntil' => ! empty( $product->get_date_on_sale_to() ) ? date( 'Y-m-d', strtotime( $product->get_date_on_sale_to() ) ) : '',
			);

			$attributes->assign_property( $offer, 'itemCondition' );
			$entity['offers'] = $offer;
		}

		// Ratings.
		if ( $product->get_rating_count() > 0 ) {
			// Aggregate Rating.
			$entity['aggregateRating'] = array(
				'@type'       => 'AggregateRating',
				'ratingValue' => $product->get_average_rating(),
				'bestRating'  => '5',
				'ratingCount' => (string) $product->get_rating_count(),
				'reviewCount' => $product->get_review_count(),
			);

			// Reviews.
			$comments = get_comments(array(
				'post_type' => 'product',
				'post_id'   => get_the_ID(),
				'status'    => 'approve',
			));
			foreach ( $comments as $comment ) {
				$entity['review'][] = array(
					'@type'         => 'Review',
					'@id'           => $permalink . '#li-comment-' . $comment->comment_ID,
					'description'   => $comment->comment_content,
					'datePublished' => $comment->comment_date,
					'reviewRating'  => array(
						'@type'       => 'Rating',
						'ratingValue' => intval( get_comment_meta( $comment->comment_ID, 'rating', true ) ),
					),
					'author'        => array(
						'@type' => 'Person',
						'name'  => $comment->comment_author,
						'url'   => $comment->comment_author_url,
					),
				);
			}
		}

		// GTIN numbers need product attributes.
		$attributes->assign_property( $entity, 'gtin8' );
		$attributes->assign_property( $entity, 'gtin12' );
		$attributes->assign_property( $entity, 'gtin13' );
		$attributes->assign_property( $entity, 'gtin14' );

		// Color.
		$attributes->assign_property( $entity, 'color' );

		// Remaining Attributes.
		$attributes->assign_remaining( $entity );
	}

	/**
	 * Set EDD data for rich snippet.
	 *
	 * @param array $entity Array of json-ld entity.
	 */
	private function set_edd( &$entity ) {
		global $post;

		$product_id = get_the_ID();
		$permalink  = get_permalink();
		$product    = new \EDD_Download( $product_id );

		$entity['name']        = $post->post_title;
		$entity['description'] = strip_shortcodes( $post->post_content );
		$entity['url']         = $permalink;

		// Sku?
		if ( $product->get_sku() ) {
			$entity['sku'] = $product->get_sku();
		}

		// Categories.
		$categories = get_the_terms( $product_id, 'download_category' );
		if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
			$category = '';
			if ( 0 === $categories[0]->parent ) {
				$category = $categories[0]->name;
			} else {
				$ancestors = get_ancestors( $categories[0]->term_id, 'download_category' );
				foreach ( $ancestors as $parent ) {
					$term       = get_term( $parent, 'download_category' );
					$category[] = $term->name;
				}
				$category[] = $categories[0]->name;
				$category   = join( ' > ', $category );
			}
			$entity['category'] = $category;
		}

		// Offers.
		$do_single_offer = true;
		$seller          = $this->get_seller();

		if ( $product->has_variable_prices() ) {
			$variations = $product->get_prices();

			if ( ! empty( $variations ) ) {
				$do_single_offer  = false;
				$entity['offers'] = array();
				foreach ( $variations as $variation ) {
					// Offers are only for public products.
					$offer = array(
						'@type'         => 'Offer',
						'description'   => $variation['name'],
						'price'         => $variation['amount'],
						'priceCurrency' => edd_get_currency(),
						'seller'        => $seller,
						'url'           => $permalink,
					);

					$entity['offers'][] = $offer;
				}
			}
		}

		if ( $do_single_offer ) {

			$offer = array(
				'@type'         => 'Offer',
				'price'         => $product->get_price() ? $product->get_price() : '0',
				'priceCurrency' => edd_get_currency(),
				'seller'        => $seller,
				'url'           => $permalink,
			);

			$entity['offers'] = $offer;
		}

	}

	/**
	 * Get seller
	 *
	 * @return array
	 */
	public function get_seller() {

		$site_url = site_url();
		$type     = Helper::get_settings( 'titles.knowledgegraph_type' );

		$seller = array(
			'@type' => 'person' === $type ? 'Person' : 'Organization',
			'@id'   => $site_url . '/',
			'name'  => $this->get_website_name(),
			'url'   => $site_url,
		);

		if ( 'company' === $type ) {
			$seller['logo'] = Helper::get_settings( 'titles.knowledgegraph_logo' );
		}

		return $seller;
	}

	/**
	 * Generate breadcrumbs JSON-LD.
	 *
	 * @param array $data Array of json-ld data.
	 */
	public function breadcrumbs( $data ) {
		$breadcrumbs = rank_math()->breadcrumbs;
		$crumbs      = $breadcrumbs ? $breadcrumbs->get_crumbs() : false;
		if ( empty( $crumbs ) ) {
			return $data;
		}

		$entity = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => array(),
		);

		foreach ( $crumbs as $index => $crumb ) {
			if ( ! empty( $crumb['hide_in_schema'] ) ) {
				continue;
			}

			$entity['itemListElement'][] = array(
				'@type'    => 'ListItem',
				'position' => $index + 1,
				'item'     => array(
					'@id'  => $crumb[1],
					'name' => $crumb[0],
				),
			);
		}

		$data['BreadcrumbList'] = $entity;

		return $data;
	}

	/**
	 * Add property to entity.
	 *
	 * @param string $prop   Name of the property to add into entity.
	 * @param array  $entity Array of json-ld entity.
	 */
	public function add_prop( $prop, &$entity ) {

		if ( empty( $prop ) ) {
			return;
		}

		// @codingStandardsIgnoreStart
		if ( 'email' === $prop && $email = Helper::get_settings( 'titles.email' ) ) {
			$entity['email'] = $email;
			return;
		}

		if ( 'url' === $prop && $url = Helper::get_settings( 'titles.url' ) ) {
			$entity['url'] = Helper::str_start_with( 'http://', $url ) || Helper::str_start_with( 'https://', $url ) ? $url : 'http://' . $url;
			return;
		}

		if ( 'address' === $prop && $address = Helper::get_settings( 'titles.local_address' ) ) {
			$entity['address'] = array( '@type' => 'PostalAddress' ) + $address;
			return;
		}

		if ( 'image' === $prop && $logo = Helper::get_settings( 'titles.knowledgegraph_logo' ) ) {
			$entity['logo'] = $logo;
			return;
		}

		if ( 'phone' === $prop && $phone = Helper::get_settings( 'titles.phone' ) ) {
			$entity['telephone'] = $phone;
			return;
		}
		// @codingStandardsIgnoreEnd

		if ( 'thumbnail' === $prop ) {
			$image = Helper::get_thumbnail_with_fallback( get_the_ID(), 'full' );
			if ( ! empty( $image ) ) {
				$entity['image'] = array(
					'@type'  => 'ImageObject',
					'url'    => $image[0],
					'width'  => $image[1],
					'height' => $image[2],
				);
			}

			return;
		}
	}

	/**
	 * Get website name with a fallback to bloginfo( 'name' ).
	 *
	 * @return string
	 */
	private function get_website_name() {
		$name = Helper::get_settings( 'titles.knowledgegraph_name' );

		return $name ? $name : get_bloginfo( 'name' );
	}

	/**
	 * Get post parts
	 *
	 * @param array $data Array of json-ld data.
	 * @return array
	 */
	private function get_post_parts( $data ) {
		$parts = array();

		while ( have_posts() ) :
			the_post();

			$schema = Helper::get_post_meta( 'rich_snippet', get_the_ID() );
			if ( ! $schema ) {
				continue;
			}

			// Title.
			$title = Helper::get_post_meta( 'snippet_name', get_the_ID() );
			$title = $title ? $title : get_the_title();

			// URL.
			$url = Helper::get_post_meta( 'snippet_url', get_the_ID() );
			$url = $url ? $url : get_the_permalink();

			$part = array(
				'@type'            => isset( $data['schema'] ) ? $data['schema'] : $schema,
				'headline'         => $title,
				'name'             => $title,
				'url'              => $url,
				'dateModified'     => get_post_modified_time( 'Y-m-d\TH:i:sP', true ),
				'datePublished'    => get_post_time( 'Y-m-d\TH:i:sP', true ),
				'mainEntityOfPage' => $url,
				'author'           => $this->get_author(),
				'publisher'        => $this->get_publisher( $data ),
				'image'            => $this->get_post_image(),
				'keywords'         => $this->get_post_terms(),
				'commentCount'     => get_comments_number(),
				'comment'          => $this->get_comments(),
			);

			if ( 'article' === $schema ) {
				$part['wordCount'] = str_word_count( get_the_content() );
			}

			$parts[] = $part;
		endwhile;

		wp_reset_query();

		return $parts;
	}

	/**
	 * Get publisher
	 *
	 * @param  array $data Entity.
	 * @return array
	 */
	private function get_publisher( $data ) {

		if ( ! isset( $data['Organization'] ) && ! isset( $data['Person'] ) ) {
			return array(
				'@type' => 'Organization',
				'name'  => $this->get_website_name(),
				'logo'  => array(
					'@type' => 'ImageObject',
					'url'   => Helper::get_settings( 'titles.knowledgegraph_logo' ),
				),
			);
		}

		$entity = array();
		if ( isset( $data['Organization'] ) ) {
			$this->set_publisher( $entity, $data['Organization'] );
			$logo = isset( $entity['publisher']['logo']['url'] ) ? $entity['publisher']['logo']['url'] : '';
		}

		if ( isset( $data['Person'] ) ) {
			$this->set_publisher( $entity, $data['Person'] );
			$logo                        = Helper::get_settings( 'titles.knowledgegraph_logo' );
			$entity['publisher']['logo'] = array(
				'@type' => 'ImageObject',
				'url'   => $logo,
			);
		}

		$entity['publisher']['@type'] = 'Organization';

		return $entity['publisher'];
	}

	/**
	 * Get post thumbnail if any
	 *
	 * @return array
	 */
	private function get_post_image() {
		if ( ! has_post_thumbnail() ) {
			return false;
		}

		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

		return array(
			'@type'  => 'ImageObject',
			'url'    => $image[0],
			'height' => $image[2],
			'width'  => $image[1],
		);
	}

	/**
	 * Get post terms
	 *
	 * @param string $taxonomy Taxonomy name.
	 * @return array
	 */
	private function get_post_terms( $taxonomy = false ) {
		if ( false === $taxonomy ) {
			$taxonomy = get_queried_object();
			if ( ! is_object( $taxonomy ) ) {
				return array();
			}
			$taxonomy = $taxonomy->taxonomy;
		}

		$tags = wp_get_post_terms( get_the_ID(), $taxonomy, array( 'fields' => 'names' ) );
		if ( $tags && ! is_wp_error( $tags ) ) {
			return $tags;
		}
	}

	/**
	 * Get comments data
	 *
	 * @return array
	 */
	private function get_comments() {
		global $post;

		$comments      = array();
		$post_comments = get_comments(array(
			'post_id' => $post->ID,
			'number'  => 10,
			'status'  => 'approve',
			'type'    => 'comment',
		));

		if ( empty( $post_comments ) ) {
			return '';
		}

		foreach ( $post_comments as $comment ) {
			$comments[] = array(
				'@type'       => 'Comment',
				'dateCreated' => $comment->comment_date,
				'description' => $comment->comment_content,
				'author'      => array(
					'@type' => 'Person',
					'name'  => $comment->comment_author,
					'url'   => $comment->comment_author_url,
				),
			);
		}

		return $comments;
	}

	/**
	 * Get author data
	 *
	 * @return array
	 */
	private function get_author() {
		$author = array(
			'@type' => 'Person',
			'name'  => get_the_author_meta( 'display_name' ),
			'url'   => esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		);

		if ( get_the_author_meta( 'description' ) ) {
			$author['description'] = get_the_author_meta( 'description' );
		}

		if ( version_compare( get_bloginfo( 'version' ), '4.2', '>=' ) ) {
			$image = get_avatar_url( get_the_author_meta( 'user_email' ), 96 );
			if ( $image ) {
				$author['image'] = array(
					'@type'  => 'ImageObject',
					'url'    => $image,
					'height' => 96,
					'width'  => 96,
				);
			}
		}

		return $author;
	}

	/**
	 * Set publisher/provider data for JSON-LD.
	 *
	 * @param array  $entity Array of json-ld entity.
	 * @param array  $organization Organization data.
	 * @param string $type         Type data set to. Default: 'publisher'.
	 */
	private function set_publisher( &$entity, $organization, $type = 'publisher' ) {
		$keys = array( '@context', '@type', 'url', 'name', 'logo', 'image', 'contactPoint', 'sameAs' );
		foreach ( $keys as $key ) {
			if ( ! isset( $organization[ $key ] ) ) {
				continue;
			}

			$entity[ $type ][ $key ] = 'logo' !== $key ? $organization[ $key ] : array(
				'@type' => 'ImageObject',
				'url'   => $organization[ $key ],
			);
		}
	}

	/**
	 * Set address for JSON-LD.
	 *
	 * @param string $schema Schema to get data for.
	 * @param array  $entity Array of json-ld entity to attach data to.
	 */
	private function set_address( $schema, &$entity ) {
		$address = Helper::get_post_meta( "snippet_{$schema}_address" );

		if ( is_array( $address ) && ! empty( $address ) ) {
			$entity['address'] = array( '@type' => 'PostalAddress' );
			foreach ( $address as $key => $value ) {
				$entity['address'][ $key ] = $value;
			}
		}
	}

	/**
	 * Set data to entity.
	 *
	 * Loop through post meta value grab data and attache it to the entity.
	 *
	 * @param array $hash   Key to get data and Value to save as.
	 * @param array $entity Array of json-ld entity to attach data to.
	 */
	private function set_data( $hash, &$entity ) {
		foreach ( $hash as $metakey => $dest ) {
			$entity[ $dest ] = Helper::get_post_meta( $metakey );
		}
	}
}
