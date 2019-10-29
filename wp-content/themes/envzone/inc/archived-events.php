<?php
/* Template Name: DIS - Archived Events*/
get_header();
?>
<?php
$date_now = date('Y-m-d');

$get_date = $_GET['date'];
$get_date_max = $get_date.'-31';
$get_date_min = $get_date.'-01';

$paged = get_query_var( 'paged' );
if (count($get_date) >= 1){
    $args_event = array(
        'posts_per_page' => 10,
        'post_type' => 'events',
        'meta_query'	=> array(
            'relation' 			=> 'AND',
            array(
                'key'			=> 'date',
                'compare'		=> '<=',
                'value'			=> $date_now,
                'type'			=> 'DATETIME'
            ),
            array(
                'key'			=> 'date',
                'compare'		=> '<=',
                'value'			=> $get_date_max,
                'type'			=> 'DATETIME'
            ),
            array(
                'key'			=> 'date',
                'compare'		=> '>=',
                'value'			=> $get_date_min,
                'type'			=> 'DATETIME'
            )
        ),
        'orderby'	=> 'meta_value',
        'order' => 'asc',
        'paged' => $paged
    );
}else{
    $args_event = array(
        'posts_per_page' => 10,
        'post_type' => 'events',
        'meta_query'	=> array(
            'relation' 			=> 'AND',
            array(
                'key'			=> 'date',
                'compare'		=> '<=',
                'value'			=> $date_now,
                'type'			=> 'DATETIME'
            )
        ),
        'orderby'	=> 'meta_value',
        'order' => 'asc',
        'paged' => $paged
    );
}

$the_query = new WP_Query( $args_event );

if (count($get_date) >= 1){
    $date = $get_date;
    $date =  new DateTime($date);
    $date = $date->format('M Y');
}else{
    $date = 'ALL';
}

?>

    <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('archived-events');?>">Archived Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $date;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="artical-page blog-page blog-events-page blog-detail-page archive-events-page">
            <div class="container">
                <div class="row mb-lg-5">
                    <div class="col-lg-8 border-header">
                        <h3 class="title-head-blue have-border">ARCHIVED EVENTS: <?php echo $date;?></h3>
                    </div>
                    <div class="col-lg-8 mb-5 pd-lr-0">
                        <?php if( $the_query->have_posts() ): ?>


                            <?php while( $the_query->have_posts() ) : $the_query->the_post();

                                get_template_part( 'template-parts/content', 'event' );

                            endwhile;

                            if (  $the_query->max_num_pages > 1 ){

                                //echo '<div class="misha_loadmore btn-show-event btn btn-blue-env w-100 my-5">Show more</div>'; // you can use <a> as well

                                if (  $the_query->max_num_pages > 1 ){

                                    $big = 999999999; // need an unlikely integer

                                    echo '<div class="box-pagination">';
                                    echo paginate_links( array(
                                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format' => '?paged=%#%',
                                        'end_size'           => 4,
                                        'mid_size'           => 1,
                                        'current'            => max( 1, $paged ),
                                        'total'              => $the_query->max_num_pages,
                                        'prev_next'          => true,
                                        'prev_text'          => __('Previous'),
                                        'next_text'          => __('Next')
                                    ) );
                                    echo '</div>';
                                };
                            };

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                    </div>
                    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


                    <div class="col-lg-4 pd-lr-0">
                        <div class="box-subscriber-blog d-lg-block d-none">
                            <div class="box-border">
                                <div class="title-sub">
                                    Join Over 5,000 of Your Industry Peers in Colorado Who Receive Software Outsourcing Insights and Updates.
                                </div>
                                <div class="form-subscribe">
                                    <?php
                                    echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="box-advert">
                            <p>
                                <span class="fz-big-green">80%</span> of outsourcing relationships fail due to responsiveness & communication factors
                            </p>
                            <div class="sub-title">
                                Do Not Let Your Projects Go South!
                            </div>
                            <a href="<?php echo home_url("process-framework");?>" class="btn btn-green-env">
                                FIX MY SOFTWARE PROJECT
                            </a>
                        </div>

                        <div class="upcoming-events">
                            <a class="btn" href="<?php echo home_url('events')?>">Upcoming Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');
    </script>
<?php get_footer();?>