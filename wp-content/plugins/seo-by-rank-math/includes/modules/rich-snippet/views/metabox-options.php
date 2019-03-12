<?php
/**
 * Metabox - Rich Snippet Tab
 *
 * @package    RankMath
 * @subpackage RankMath\Modules\RichSnippet
 */

use RankMath\Helper;

if ( ! Helper::has_cap( 'onpage_snippet' ) ) {
	return;
}

$post_type = \RankMath\Admin\Helper::get_post_type();

if ( ( class_exists( 'WooCommerce' ) && 'product' === $post_type ) || ( class_exists( 'Easy_Digital_Downloads' ) && 'download' === $post_type ) ) {

	$cmb->add_field( array(
		'id'      => 'rank_math_woocommerce_notice',
		'type'    => 'notice',
		'what'    => 'info',
		'content' => '<span class="dashicons dashicons-yes"></span> ' . esc_html__( 'Rank Math automatically inserts additional Rich Snippet meta data for WooCommerce products. You can set the Rich Snippet Type to "None" to disable this feature and just use the default data added by WooCommerce.', 'rank-math' ),
	) );

	$cmb->add_field( array(
		'id'      => 'rank_math_rich_snippet',
		'type'    => 'radio_inline',
		'name'    => esc_html__( 'Rich Snippet Type', 'rank-math' ),
		/* translators: link to title setting screen */
		'desc'    => sprintf( wp_kses_post( __( 'Rich Snippets help you stand out in SERPs. <a href="%s" target="_blank">Learn more</a>.', 'rank-math' ) ), 'https://mythemeshop.com/kb/wordpress-seo-plugin-rank-math/rich-snippets/?utm_source=Rank+Math+Plugin+Options&utm_medium=LP+CPC&utm_content=Rank+Math+KB&utm_campaign=Rank+Math' ),
		'options' => array(
			'off'     => esc_html__( 'None', 'rank-math' ),
			'product' => esc_html__( 'Product', 'rank-math' ),
		),
		'default' => Helper::get_settings( "titles.pt_{$post_type}_default_rich_snippet" ),
	) );

	return;
}

$cmb->add_field( array(
	'id'      => 'rank_math_rich_snippet',
	'type'    => 'select',
	'name'    => esc_html__( 'Rich Snippet Type', 'rank-math' ),
	/* translators: link to title setting screen */
	'desc'    => sprintf( wp_kses_post( __( 'Rich Snippets help you stand out in SERPs. <a href="%s" target="_blank">Learn more</a>.', 'rank-math' ) ), 'https://mythemeshop.com/kb/wordpress-seo-plugin-rank-math/rich-snippets/?utm_source=Rank+Math+Plugin+Options&utm_medium=LP+CPC&utm_content=Rank+Math+KB&utm_campaign=Rank+Math' ),
	'options' => Helper::choices_rich_snippet_types( esc_html__( 'None', 'rank-math' ) ),
	'default' => Helper::get_settings( "titles.pt_{$post_type}_default_rich_snippet" ),
) );

$headline = Helper::get_settings( "titles.pt_{$post_type}_default_snippet_name" );
$headline = $headline ? $headline : '';

// Common fields.
$cmb->add_field( array(
	'id'         => 'rank_math_snippet_name',
	'type'       => 'text',
	'name'       => esc_html__( 'Headline', 'rank-math' ),
	'dep'        => array( array( 'rank_math_rich_snippet', 'off', '!=' ) ),
	'attributes' => array(
		'placeholder' => $headline,
	),
	'classes'    => 'rank-math-supports-variables',
) );

$description = Helper::get_settings( "titles.pt_{$post_type}_default_snippet_desc" );
$description = $description ? $description : '';

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_desc',
	'type'       => 'textarea',
	'name'       => esc_html__( 'Description', 'rank-math' ),
	'attributes' => array(
		'rows'            => 3,
		'data-autoresize' => true,
		'placeholder'     => $description,
	),
	'classes'    => 'rank-math-supports-variables',
	'dep'        => array( array( 'rank_math_rich_snippet', 'off,book,local', '!=' ) ),
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_url',
	'type'       => 'text_url',
	'name'       => esc_html__( 'Url', 'rank-math' ),
	'attributes' => array(
		'rows'            => 3,
		'data-autoresize' => true,
	),
	'dep'        => array( array( 'rank_math_rich_snippet', 'book,event,local,music' ) ),
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_author',
	'type'       => 'text',
	'name'       => esc_html__( 'Author', 'rank-math' ),
	'attributes' => array(
		'rows'            => 3,
		'data-autoresize' => true,
	),
	'dep'        => array( array( 'rank_math_rich_snippet', 'book' ) ),
) );

// Article fields.
$article_dep = array( array( 'rank_math_rich_snippet', 'article' ) );
/* translators: Google article snippet doc link */
$article_desc = 'person' === Helper::get_settings( 'titles.knowledgegraph_type' ) ? '<div class="notice notice-warning inline"><p>' . sprintf( __( 'Google does not allow Person as the Publisher for articles. Organization will be used instead. You can read more about this <a href="%s" target="_blank">here</a>.', 'rank-math' ), 'https://developers.google.com/search/docs/data-types/article' ) . '</p></div>' : '';
$cmb->add_field( array(
	'id'      => 'rank_math_snippet_article_type',
	'type'    => 'radio_inline',
	'name'    => esc_html__( 'Article Type', 'rank-math' ),
	'options' => array(
		'Article'     => esc_html__( 'Article', 'rank-math' ),
		'BlogPosting' => esc_html__( 'Blog Post', 'rank-math' ),
		'NewsArticle' => esc_html__( 'News Article', 'rank-math' ),
	),
	'default' => Helper::get_settings( "titles.pt_{$post_type}_default_article_type" ),
	'classes' => 'nob',
	'desc'    => $article_desc,
	'dep'     => $article_dep,
) );

// Book fields.
$book_dep = array( array( 'rank_math_rich_snippet', 'book' ) );
$cmb->add_field( array(
	'id'      => 'rank_math_snippet_book_editions',
	'type'    => 'group',
	'name'    => esc_html__( 'Book Editions', 'rank-math' ),
	'desc'    => esc_html__( 'Either a specific edition of the written work, or the volume of the work.', 'rank-math' ),
	'options' => array(
		'closed'        => true,
		'sortable'      => true,
		'add_button'    => esc_html__( 'Add New', 'rank-math' ),
		'group_title'   => esc_html__( 'Book Edition {#}', 'rank-math' ),
		'remove_button' => esc_html__( 'Remove', 'rank-math' ),
	),
	'classes' => 'cmb-group-fix-me nob',
	'dep'     => $book_dep,
	'fields'  => array(
		array(
			'id'   => 'name',
			'type' => 'text',
			'name' => esc_html__( 'Title', 'rank-math' ),
			'desc' => __( 'The title of the tome. Use for the title of the tome if it differs from the book.<br>*Optional when tome has the same title as the book.', 'rank-math' ),
		),

		array(
			'id'   => 'book_edition',
			'type' => 'text',
			'name' => esc_html__( 'Edition', 'rank-math' ),
			'desc' => esc_html__( 'The edition of the book.', 'rank-math' ),
		),

		array(
			'id'   => 'isbn',
			'type' => 'text',
			'name' => esc_html__( 'ISBN', 'rank-math' ),
			'desc' => esc_html__( 'The ISBN of the print book.', 'rank-math' ),
		),

		array(
			'id'   => 'url',
			'type' => 'text_url',
			'name' => esc_html__( 'Url', 'rank-math' ),
			'desc' => esc_html__( 'URL specific to this edition if one exists.', 'rank-math' ),
		),

		array(
			'id'   => 'author',
			'type' => 'text',
			'name' => esc_html__( 'Author(s)', 'rank-math' ),
			'desc' => __( 'The author(s) of the tome. Use if the author(s) of the tome differ from the related book. Provide one Person entity per author.<br>*Optional when the tome has the same set of authors as the book.', 'rank-math' ),
		),

		array(
			'id'   => 'date_published',
			'type' => 'text_date',
			'name' => esc_html__( 'Date Published', 'rank-math' ),
			'desc' => esc_html__( 'Date of first publication of this tome.', 'rank-math' ),
		),

		array(
			'id'      => 'book_format',
			'type'    => 'radio_inline',
			'name'    => esc_html__( 'Book Format', 'rank-math' ),
			'desc'    => esc_html__( 'The format of the book.', 'rank-math' ),
			'options' => array(
				'EBook'     => esc_html__( 'EBook', 'rank-math' ),
				'Hardcover' => esc_html__( 'Hardcover', 'rank-math' ),
				'Paperback' => esc_html__( 'Paperback', 'rank-math' ),
				'AudioBook' => esc_html__( 'Audio Book', 'rank-math' ),
			),
			'default' => 'Hardcover',
		),
	),
) );

// Course fields.
$course_dep = array( array( 'rank_math_rich_snippet', 'course' ) );
$cmb->add_field( array(
	'id'   => 'rank_math_snippet_course_provider',
	'type' => 'text',
	'name' => esc_html__( 'Course Provider', 'rank-math' ),
	'dep'  => $course_dep,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_course_provider_url',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Course Provider URL', 'rank-math' ),
	'dep'     => $course_dep,
	'classes' => 'nob',
) );

// Event fields.
$event = array( array( 'rank_math_rich_snippet', 'event' ) );
$cmb->add_field( array(
	'id'      => 'rank_math_snippet_event_type',
	'type'    => 'select',
	'name'    => esc_html__( 'Event Type', 'rank-math' ),
	'desc'    => esc_html__( 'Type of the event.', 'rank-math' ),
	'options' => array(
		'Event'            => esc_html__( 'Event', 'rank-math' ),
		'BusinessEvent'    => esc_html__( 'Business Event', 'rank-math' ),
		'ChildrensEvent'   => esc_html__( 'Childrens Event', 'rank-math' ),
		'ComedyEvent'      => esc_html__( 'Comedy Event', 'rank-math' ),
		'DanceEvent'       => esc_html__( 'Dance Event', 'rank-math' ),
		'DeliveryEvent'    => esc_html__( 'Delivery Event', 'rank-math' ),
		'EducationEvent'   => esc_html__( 'Education Event', 'rank-math' ),
		'ExhibitionEvent'  => esc_html__( 'Exhibition Event', 'rank-math' ),
		'Festival'         => esc_html__( 'Festival', 'rank-math' ),
		'FoodEvent'        => esc_html__( 'Food Event', 'rank-math' ),
		'LiteraryEvent'    => esc_html__( 'Literary Event', 'rank-math' ),
		'MusicEvent'       => esc_html__( 'Music Event', 'rank-math' ),
		'PublicationEvent' => esc_html__( 'Publication Event', 'rank-math' ),
		'SaleEvent'        => esc_html__( 'Sale Event', 'rank-math' ),
		'ScreeningEvent'   => esc_html__( 'Screening Event', 'rank-math' ),
		'SocialEvent'      => esc_html__( 'Social Event', 'rank-math' ),
		'SportsEvent'      => esc_html__( 'Sports Event', 'rank-math' ),
		'TheaterEvent'     => esc_html__( 'Theater Event', 'rank-math' ),
		'VisualArtsEvent'  => esc_html__( 'Visual Arts Event', 'rank-math' ),
	),
	'default' => 'Event',
	'classes' => 'cmb-row-33',
	'dep'     => $event,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_event_venue',
	'type'    => 'text',
	'name'    => esc_html__( 'Venue Name', 'rank-math' ),
	'desc'    => esc_html__( 'The venue name.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $event,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_event_venue_url',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Venue URL', 'rank-math' ),
	'desc'    => esc_html__( 'Website URL of the venue', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $event,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_event_address',
	'type' => 'address',
	'name' => esc_html__( 'Address', 'rank-math' ),
	'dep'  => $event,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_event_performer',
	'type' => 'text',
	'name' => esc_html__( 'Performer', 'rank-math' ),
	'desc' => esc_html__( 'A performer at the event', 'rank-math' ),
	'dep'  => $event,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_event_status',
	'type'    => 'select',
	'name'    => esc_html__( 'Event Status', 'rank-math' ),
	'desc'    => esc_html__( 'Current status of the event (optional)', 'rank-math' ),
	'options' => array(
		''                 => esc_html__( 'None', 'rank-math' ),
		'EventScheduled'   => esc_html__( 'Scheduled', 'rank-math' ),
		'EventCancelled'   => esc_html__( 'Cancelled', 'rank-math' ),
		'EventPostponed'   => esc_html__( 'Postponed', 'rank-math' ),
		'EventRescheduled' => esc_html__( 'Rescheduled', 'rank-math' ),
	),
	'classes' => 'cmb-row-33',
	'dep'     => $event,
) );

$cmb->add_field( array(
	'id'          => 'rank_math_snippet_event_startdate',
	'type'        => 'text_datetime_timestamp',
	'date_format' => 'Y-m-d',
	'name'        => esc_html__( 'Start Date', 'rank-math' ),
	'desc'        => esc_html__( 'Date and time of the event.', 'rank-math' ),
	'classes'     => 'cmb-row-33',
	'dep'         => $event,
) );

$cmb->add_field( array(
	'id'          => 'rank_math_snippet_event_enddate',
	'type'        => 'text_datetime_timestamp',
	'date_format' => 'Y-m-d',
	'name'        => esc_html__( 'End Date', 'rank-math' ),
	'desc'        => esc_html__( 'End date and time of the event.', 'rank-math' ),
	'classes'     => 'cmb-row-33',
	'dep'         => $event,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_event_ticketurl',
	'type'    => 'text',
	'name'    => esc_html__( 'Ticket URL', 'rank-math' ),
	'desc'    => esc_html__( 'A URL where visitors can purchase tickets for the event.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $event,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_event_price',
	'type'       => 'text',
	'name'       => esc_html__( 'Entry Price', 'rank-math' ),
	'desc'       => esc_html__( 'Entry price of the event (optional)', 'rank-math' ),
	'classes'    => 'cmb-row-33',
	'dep'        => $event,
	'attributes' => array(
		'type' => 'number',
	),
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_event_currency',
	'type'    => 'text',
	'name'    => esc_html__( 'Currency', 'rank-math' ),
	'desc'    => esc_html__( 'ISO 4217 Currency Code', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $event,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_event_availability',
	'type'    => 'select',
	'name'    => esc_html__( 'Availability', 'rank-math' ),
	'desc'    => esc_html__( 'Offer availability', 'rank-math' ),
	'options' => array(
		''         => esc_html__( 'None', 'rank-math' ),
		'InStock'  => esc_html__( 'In Stock', 'rank-math' ),
		'SoldOut'  => esc_html__( 'Sold Out', 'rank-math' ),
		'PreOrder' => esc_html__( 'Preorder', 'rank-math' ),
	),
	'classes' => 'cmb-row-33 nob',
	'dep'     => $event,
) );

$cmb->add_field( array(
	'id'          => 'rank_math_snippet_event_availability_starts',
	'type'        => 'text_datetime_timestamp',
	'date_format' => 'Y-m-d',
	'name'        => esc_html__( 'Availability Starts', 'rank-math' ),
	'desc'        => esc_html__( 'Date and time when offer is made available. (optional)', 'rank-math' ),
	'classes'     => 'cmb-row-33 nob',
	'dep'         => $event,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_event_inventory',
	'type'       => 'text',
	'name'       => esc_html__( 'Stock Inventory', 'rank-math' ),
	'desc'       => esc_html__( 'Number of tickets (optional)', 'rank-math' ),
	'classes'    => 'cmb-row-33 nob',
	'dep'        => $event,
	'attributes' => array(
		'type' => 'number',
	),
) );

// Job Posting fields.
$jobposting = array( array( 'rank_math_rich_snippet', 'jobposting' ) );
$cmb->add_field( array(
	'id'         => 'rank_math_snippet_jobposting_salary',
	'type'       => 'text',
	'name'       => esc_html__( 'Salary (Recommended)', 'rank-math' ),
	'desc'       => esc_html__( 'Insert amount, e.g. "50.00", or a salary range, e.g. "40.00-50.00".', 'rank-math' ),
	'classes'    => 'cmb-row-33',
	'dep'        => $jobposting,
	'attributes' => array(
		'type' => 'number',
	),
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_jobposting_currency',
	'type'    => 'text',
	'name'    => esc_html__( 'Salary Currency', 'rank-math' ),
	'desc'    => esc_html__( 'ISO 4217 Currency Code', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $jobposting,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_jobposting_payroll',
	'type'    => 'select',
	'name'    => esc_html__( 'Payroll (Recommended)', 'rank-math' ),
	'desc'    => esc_html__( 'Salary amount is for', 'rank-math' ),
	'options' => array(
		''      => esc_html__( 'None', 'rank-math' ),
		'YEAR'  => esc_html__( 'Yearly', 'rank-math' ),
		'MONTH' => esc_html__( 'Monthly', 'rank-math' ),
		'WEEK'  => esc_html__( 'Weekly', 'rank-math' ),
		'DAY'   => esc_html__( 'Daily', 'rank-math' ),
		'HOUR'  => esc_html__( 'Hourly', 'rank-math' ),
	),
	'classes' => 'cmb-row-33',
	'dep'     => $jobposting,
) );

$cmb->add_field( array(
	'id'          => 'rank_math_snippet_jobposting_startdate',
	'type'        => 'text_datetime_timestamp',
	'date_format' => 'Y-m-d',
	'name'        => esc_html__( 'Date Posted', 'rank-math' ),
	'desc'        => wp_kses_post( __( 'The original date on which employer posted the job. You can leave it empty to use the post publication date as job posted date.', 'rank-math' ) ),
	'classes'     => 'cmb-row-33',
	'dep'         => $jobposting,
) );

$cmb->add_field( array(
	'id'          => 'rank_math_snippet_jobposting_expirydate',
	'type'        => 'text_datetime_timestamp',
	'date_format' => 'Y-m-d',
	'name'        => esc_html__( 'Expiry Posted', 'rank-math' ),
	'desc'        => esc_html__( 'The date when the job posting will expire. If a job posting never expires, or you do not know when the job will expire, do not include this property.', 'rank-math' ),
	'classes'     => 'cmb-row-33',
	'dep'         => $jobposting,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_jobposting_unpublish',
	'type'    => 'switch',
	'name'    => esc_html__( 'Unpublish when expired', 'rank-math' ),
	'desc'    => esc_html__( 'If checked, post status will be changed to Draft and its URL will return a 404 error, as required by the Rich Result guidelines.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'default' => 'on',
	'dep'     => $jobposting,
) );

$cmb->add_field( array(
	'id'                => 'rank_math_snippet_jobposting_employment_type',
	'type'              => 'multicheck_inline',
	'name'              => esc_html__( 'Employment Type (Recommended)', 'rank-math' ),
	'desc'              => esc_html__( 'Type of employment. You can choose more than one value.', 'rank-math' ),
	'options'           => array(
		'FULL_TIME'  => esc_html__( 'Full Time', 'rank-math' ),
		'PART_TIME'  => esc_html__( 'Part Time', 'rank-math' ),
		'CONTRACTOR' => esc_html__( 'Contractor', 'rank-math' ),
		'TEMPORARY'  => esc_html__( 'Temporary', 'rank-math' ),
		'INTERN'     => esc_html__( 'Intern', 'rank-math' ),
		'VOLUNTEER'  => esc_html__( 'Volunteer', 'rank-math' ),
		'PER_DIEM'   => esc_html__( 'Per Diem', 'rank-math' ),
		'OTHER'      => esc_html__( 'Other', 'rank-math' ),
	),
	'dep'               => $jobposting,
	'select_all_button' => false,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_jobposting_organization',
	'type'       => 'text',
	'name'       => esc_html__( 'Hiring Organization', 'rank-math' ),
	'desc'       => esc_html__( 'The name of the company. Leave empty to use your own company information.', 'rank-math' ),
	'attributes' => array(
		'placeholder' => 'company' === Helper::get_settings( 'titles.knowledgegraph_type' ) ? Helper::get_settings( 'titles.knowledgegraph_name' ) : get_bloginfo( 'name' ),
	),
	'dep'        => $jobposting,
	'classes'    => 'cmb-row-50',
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_jobposting_id',
	'type'    => 'text',
	'name'    => esc_html__( 'Posting ID (Recommended)', 'rank-math' ),
	'desc'    => esc_html__( 'The hiring organization\'s unique identifier for the job. Leave empty to use the post ID.', 'rank-math' ),
	'classes' => 'cmb-row-50',
	'dep'     => $jobposting,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_jobposting_url',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Organization URL (Recommended)', 'rank-math' ),
	'desc'    => esc_html__( 'The URL of the organization offering the job position. Leave empty to use your own company information.', 'rank-math' ),
	'classes' => 'cmb-row-50',
	'dep'     => $jobposting,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_jobposting_logo',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Organization Logo (Recommended)', 'rank-math' ),
	'desc'    => esc_html__( 'Logo URL of the organization offering the job position. Leave empty to use your own company information.', 'rank-math' ),
	'classes' => 'cmb-row-50',
	'dep'     => $jobposting,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_jobposting_address',
	'type'    => 'address',
	'name'    => esc_html__( 'Location', 'rank-math' ),
	'classes' => 'nob',
	'dep'     => $jobposting,
) );

// Local fields.
$local = array( array( 'rank_math_rich_snippet', 'local,restaurant' ) );
$cmb->add_field( array(
	'id'   => 'rank_math_snippet_local_address',
	'type' => 'address',
	'name' => esc_html__( 'Address', 'rank-math' ),
	'dep'  => $local,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_local_geo',
	'type'    => 'text',
	'name'    => esc_html__( 'Geo Coordinates', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $local,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_local_phone',
	'type'    => 'text',
	'name'    => esc_html__( 'Phone Number', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $local,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_local_price_range',
	'type'    => 'text',
	'name'    => esc_html__( 'Price Range', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $local,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_local_opens',
	'type'    => 'text_time',
	'name'    => esc_html__( 'Opening Time', 'rank-math' ),
	'classes' => 'cmb-row-50',
	'dep'     => $local,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_local_closes',
	'type'    => 'text_time',
	'name'    => esc_html__( 'Closing Time', 'rank-math' ),
	'classes' => 'cmb-row-50',
	'dep'     => $local,
) );

$cmb->add_field( array(
	'id'                => 'rank_math_snippet_local_opendays',
	'type'              => 'multicheck_inline',
	'name'              => esc_html__( 'Open Days', 'rank-math' ),
	'options'           => array(
		'monday'    => esc_html__( 'Monday', 'rank-math' ),
		'tuesday'   => esc_html__( 'Tuesday', 'rank-math' ),
		'wednesday' => esc_html__( 'Wednesday', 'rank-math' ),
		'thursday'  => esc_html__( 'Thursday', 'rank-math' ),
		'friday'    => esc_html__( 'Friday', 'rank-math' ),
		'saturday'  => esc_html__( 'Saturday', 'rank-math' ),
		'sunday'    => esc_html__( 'Sunday', 'rank-math' ),
	),
	'select_all_button' => false,
	'dep'               => $local,
) );

// Music fields.
$music = array( array( 'rank_math_rich_snippet', 'music' ) );
$cmb->add_field( array(
	'id'      => 'rank_math_snippet_music_type',
	'type'    => 'radio_inline',
	'name'    => esc_html__( 'Type', 'rank-math' ),
	'options' => array(
		'MusicGroup' => esc_html__( 'MusicGroup', 'rank-math' ),
		'MusicAlbum' => esc_html__( 'MusicAlbum', 'rank-math' ),
	),
	'classes' => 'cmb-row-33 nob',
	'default' => 'MusicGroup',
	'dep'     => $music,
) );

// Product fields.
$product = array( array( 'rank_math_rich_snippet', 'product' ) );
$cmb->add_field( array(
	'id'   => 'rank_math_snippet_product_sku',
	'type' => 'text',
	'name' => esc_html__( 'Product SKU', 'rank-math' ),
	'dep'  => $product,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_product_brand',
	'type' => 'text',
	'name' => esc_html__( 'Product Brand', 'rank-math' ),
	'dep'  => $product,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_product_currency',
	'type' => 'text',
	'name' => esc_html__( 'Product Currency', 'rank-math' ),
	'desc' => esc_html__( 'ISO 4217 Currency Code', 'rank-math' ),
	'dep'  => $product,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_product_price',
	'type'       => 'text',
	'name'       => esc_html__( 'Product Price', 'rank-math' ),
	'dep'        => $product,
	'attributes' => array(
		'type' => 'number',
	),
) );

$cmb->add_field( array(
	'id'          => 'rank_math_snippet_product_price_valid',
	'type'        => 'text_date',
	'date_format' => 'Y-m-d',
	'name'        => esc_html__( 'Price Valid Until', 'rank-math' ),
	'desc'        => esc_html__( 'The date after which the price will no longer be available.', 'rank-math' ),
	'dep'         => $product,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_product_instock',
	'type'    => 'switch',
	'name'    => esc_html__( 'Product In-Stock', 'rank-math' ),
	'dep'     => $product,
	'classes' => 'nob',
	'default' => 'on',
) );

// Recipe fields.
$recipe = array( array( 'rank_math_rich_snippet', 'recipe' ) );
$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_type',
	'type'    => 'text',
	'name'    => esc_html__( 'Type', 'rank-math' ),
	'desc'    => esc_html__( 'Type of dish, for example "appetizer", or "dessert".', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_cuisine',
	'type'    => 'text',
	'name'    => esc_html__( 'Cuisine', 'rank-math' ),
	'desc'    => esc_html__( 'The cuisine of the recipe (for example, French or Ethiopian).', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_keywords',
	'type'    => 'text',
	'name'    => esc_html__( 'Keywords', 'rank-math' ),
	'desc'    => esc_html__( 'Other terms for your recipe such as the season, the holiday, or other descriptors. Separate multiple entries with commas.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_yield',
	'type'    => 'text',
	'name'    => esc_html__( 'Recipe Yield', 'rank-math' ),
	'desc'    => esc_html__( 'Quantity produced by the recipe, for example "4 servings"', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_calories',
	'type'    => 'text',
	'name'    => esc_html__( 'Calories', 'rank-math' ),
	'desc'    => esc_html__( 'The number of calories in the recipe.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_preptime',
	'type'    => 'text',
	'name'    => esc_html__( 'Preparation Time', 'rank-math' ),
	'desc'    => esc_html__( 'Example: 1H30M', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_cooktime',
	'type'    => 'text',
	'name'    => esc_html__( 'Cooking Time', 'rank-math' ),
	'desc'    => esc_html__( 'Example: 1H30M', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_totaltime',
	'type'    => 'text',
	'name'    => esc_html__( 'Total Time', 'rank-math' ),
	'desc'    => esc_html__( 'Example: 1H30M', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_rating',
	'type'    => 'text',
	'name'    => esc_html__( 'Rating', 'rank-math' ),
	'desc'    => esc_html__( 'Rating score of the recipe.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_rating_min',
	'type'    => 'text',
	'name'    => esc_html__( 'Rating Minimum', 'rank-math' ),
	'desc'    => esc_html__( 'Rating minimum score of the recipe.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_rating_max',
	'type'    => 'text',
	'name'    => esc_html__( 'Rating Maximum', 'rank-math' ),
	'desc'    => esc_html__( 'Rating maximum score of the recipe.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_video',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Recipe Video', 'rank-math' ),
	'desc'    => esc_html__( 'A recipe video URL.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_video_thumbnail',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Recipe Video Thumbnail', 'rank-math' ),
	'desc'    => esc_html__( 'A recipe video thumbnail URL.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_video_name',
	'type'    => 'text',
	'name'    => esc_html__( 'Recipe Video Name', 'rank-math' ),
	'desc'    => esc_html__( 'A recipe video Name.', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_video_date',
	'type'    => 'text_date',
	'name'    => esc_html__( 'Video Upload Date', 'rank-math' ),
	'classes' => 'cmb-row-33',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_recipe_video_description',
	'type'       => 'textarea',
	'name'       => esc_html__( 'Recipe Video Description', 'rank-math' ),
	'desc'       => esc_html__( 'A recipe video Description.', 'rank-math' ),
	'classes'    => 'cmb-row-50',
	'attributes' => array(
		'rows'            => 4,
		'data-autoresize' => true,
	),
	'dep'        => $recipe,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_recipe_ingredients',
	'type'       => 'textarea',
	'name'       => esc_html__( 'Recipe Ingredients', 'rank-math' ),
	'desc'       => esc_html__( 'Recipe ingredients, add one item per line', 'rank-math' ),
	'attributes' => array(
		'rows'            => 4,
		'data-autoresize' => true,
	),
	'classes'    => 'cmb-row-50',
	'dep'        => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_instruction_type',
	'type'    => 'radio_inline',
	'name'    => esc_html__( 'Instruction Type', 'rank-math' ),
	'options' => array(
		'SingleField'  => esc_html__( 'Single Field', 'rank-math' ),
		'HowToStep'    => esc_html__( 'How To Step', 'rank-math' ),
		'HowToSection' => esc_html__( 'How To Section', 'rank-math' ),
	),
	'classes' => 'recipe-instruction-type',
	'default' => 'SingleField',
	'dep'     => $recipe,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_instruction_name',
	'type'    => 'text',
	'name'    => esc_html__( 'Recipe Instruction Name', 'rank-math' ),
	'desc'    => esc_html__( 'Instruction name of the recipe.', 'rank-math' ),
	'classes' => 'nob',
	'dep'     => array(
		'relation' => 'and',
		array( 'rank_math_rich_snippet', 'recipe' ),
		array( 'rank_math_snippet_recipe_instruction_type', 'HowToStep' ),
	),
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_recipe_single_instructions',
	'type'       => 'textarea',
	'name'       => esc_html__( 'Recipe Instructions', 'rank-math' ),
	'attributes' => array(
		'rows'            => 4,
		'data-autoresize' => true,
	),
	'classes'    => 'nob',
	'dep'        => array(
		'relation' => 'and',
		array( 'rank_math_rich_snippet', 'recipe' ),
		array( 'rank_math_snippet_recipe_instruction_type', 'HowToStep,SingleField' ),
	),
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_recipe_instructions',
	'type'    => 'group',
	'name'    => esc_html__( 'Recipe Instructions', 'rank-math' ),
	'desc'    => esc_html__( 'Steps to take, add one instruction per line', 'rank-math' ),
	'options' => array(
		'closed'        => true,
		'sortable'      => true,
		'add_button'    => esc_html__( 'Add New Instruction', 'rank-math' ),
		'group_title'   => esc_html__( 'Instruction {#}', 'rank-math' ),
		'remove_button' => esc_html__( 'Remove', 'rank-math' ),
	),
	'classes' => 'cmb-group-fix-me nob',
	'dep'     => array(
		'relation' => 'and',
		array( 'rank_math_rich_snippet', 'recipe' ),
		array( 'rank_math_snippet_recipe_instruction_type', 'HowToSection' ),
	),
	'fields'  => array(
		array(
			'id'   => 'name',
			'type' => 'text',
			'name' => esc_html__( 'Name', 'rank-math' ),
			'desc' => esc_html__( 'Instruction name of the recipe.', 'rank-math' ),
		),
		array(
			'id'         => 'text',
			'type'       => 'textarea',
			'name'       => esc_html__( 'Text', 'rank-math' ),
			'attributes' => array(
				'rows'            => 4,
				'data-autoresize' => true,
			),
			'desc'       => esc_html__( 'Steps to take, add one instruction per line', 'rank-math' ),
		),
	),
) );

// Restaurant fields.
$restaurant = array( array( 'rank_math_rich_snippet', 'restaurant' ) );
$cmb->add_field( array(
	'id'      => 'rank_math_snippet_restaurant_serves_cuisine',
	'type'    => 'text',
	'name'    => esc_html__( 'Serves Cuisine', 'rank-math' ),
	'desc'    => esc_html__( 'The type of cuisine we serve. separated by comma.', 'rank-math' ),
	'classes' => 'cmb-row-50 nob',
	'dep'     => $restaurant,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_restaurant_menu',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Menu URL', 'rank-math' ),
	'desc'    => esc_html__( 'The menu url of the restaurant.', 'rank-math' ),
	'classes' => 'cmb-row-50 nob',
	'dep'     => $restaurant,
) );

// Video fields.
$video = array( array( 'rank_math_rich_snippet', 'video' ) );
$cmb->add_field( array(
	'id'      => 'rank_math_snippet_video_url',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Content URL', 'rank-math' ),
	'desc'    => esc_html__( 'A URL pointing to the actual video media file.', 'rank-math' ),
	'classes' => 'cmb-row-50',
	'dep'     => $video,
) );

$cmb->add_field( array(
	'id'      => 'rank_math_snippet_video_embed_url',
	'type'    => 'text_url',
	'name'    => esc_html__( 'Embed URL', 'rank-math' ),
	'desc'    => esc_html__( 'A URL pointing to the embeddable player for the video.', 'rank-math' ),
	'classes' => 'cmb-row-50',
	'dep'     => $video,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_video_duration',
	'type'       => 'text',
	'name'       => esc_html__( 'Duration', 'rank-math' ),
	'desc'       => esc_html__( 'Duration of the video', 'rank-math' ),
	'classes'    => 'cmb-row-50 nob',
	'attributes' => array( 'placeholder' => 'Example: 12M30S' ),
	'dep'        => $video,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_video_views',
	'type'       => 'text',
	'name'       => esc_html__( 'Views', 'rank-math' ),
	'desc'       => esc_html__( 'Number of views', 'rank-math' ),
	'classes'    => 'cmb-row-50 nob',
	'dep'        => $video,
	'attributes' => array(
		'type' => 'number',
	),
) );

// Person fields.
$person = array( array( 'rank_math_rich_snippet', 'person' ) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_person_email',
	'type'       => 'text',
	'attributes' => array( 'type' => 'email' ),
	'name'       => esc_html__( 'Email', 'rank-math' ),
	'dep'        => $person,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_person_address',
	'type' => 'address',
	'name' => esc_html__( 'Address', 'rank-math' ),
	'dep'  => $person,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_person_gender',
	'type' => 'text',
	'name' => esc_html__( 'Gender', 'rank-math' ),
	'dep'  => $person,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_person_job_title',
	'type' => 'text',
	'name' => esc_html__( 'Job title', 'rank-math' ),
	'dep'  => $person,
) );

// Review fields.
$review = array( array( 'rank_math_rich_snippet', 'review' ) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_review_worst_rating',
	'name'       => esc_html__( 'Worst Rating', 'rank-math' ),
	'type'       => 'text',
	'default'    => 1,
	'dep'        => $review,
	'attributes' => array(
		'type' => 'number',
	),
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_review_best_rating',
	'name'       => esc_html__( 'Best Rating', 'rank-math' ),
	'type'       => 'text',
	'default'    => 5,
	'dep'        => $review,
	'attributes' => array(
		'type' => 'number',
	),
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_review_rating_value',
	'name'       => esc_html__( 'Rating Value', 'rank-math' ),
	'type'       => 'text',
	'dep'        => $review,
	'attributes' => array(
		'type' => 'number',
		'min'  => 1,
		'max'  => 5,
	),
) );

// Software Application fields.
$software = array( array( 'rank_math_rich_snippet', 'software' ) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_software_price',
	'type'       => 'text',
	'name'       => esc_html__( 'Price', 'rank-math' ),
	'dep'        => $software,
	'attributes' => array(
		'type' => 'number',
	),
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_software_price_currency',
	'type' => 'text',
	'name' => esc_html__( 'Price Currency', 'rank-math' ),
	'dep'  => $software,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_software_operating_system',
	'name' => esc_html__( 'Operating System', 'rank-math' ),
	'type' => 'text',
	'desc' => esc_html__( 'For example, "Windows 7", "OSX 10.6", "Android 1.6"', 'rank-math' ),
	'dep'  => $software,
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_software_application_category',
	'name' => esc_html__( 'Application Category', 'rank-math' ),
	'type' => 'text',
	'desc' => esc_html__( 'For example, "Game", "Multimedia"', 'rank-math' ),
	'dep'  => $software,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_software_rating_value',
	'name'       => esc_html__( 'Rating Value', 'rank-math' ),
	'type'       => 'text',
	'dep'        => $software,
	'attributes' => array(
		'type' => 'number',
		'min'  => 1,
		'max'  => 5,
	),
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_software_rating_count',
	'name'       => esc_html__( 'Rating Count', 'rank-math' ),
	'type'       => 'text',
	'dep'        => $software,
	'attributes' => array(
		'type' => 'number',
	),
) );

// Service fields.
$service = array( array( 'rank_math_rich_snippet', 'service' ) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_service_type',
	'name' => esc_html__( 'Service Type', 'rank-math' ),
	'type' => 'text',
	'desc' => esc_html__( 'The type of service being offered, e.g. veterans\' benefits, emergency relief, etc.', 'rank-math' ),
	'dep'  => $service,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_service_price',
	'type'       => 'text',
	'name'       => esc_html__( 'Price', 'rank-math' ),
	'dep'        => $service,
	'attributes' => array(
		'type' => 'number',
	),
) );

$cmb->add_field( array(
	'id'   => 'rank_math_snippet_service_price_currency',
	'type' => 'text',
	'name' => esc_html__( 'Price Currency', 'rank-math' ),
	'dep'  => $service,
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_service_rating_value',
	'name'       => esc_html__( 'Rating Value', 'rank-math' ),
	'type'       => 'text',
	'dep'        => $service,
	'attributes' => array(
		'type' => 'number',
		'min'  => 1,
		'max'  => 5,
	),
) );

$cmb->add_field( array(
	'id'         => 'rank_math_snippet_service_rating_count',
	'name'       => esc_html__( 'Rating Count', 'rank-math' ),
	'type'       => 'text',
	'dep'        => $service,
	'attributes' => array(
		'type' => 'number',
	),
) );
