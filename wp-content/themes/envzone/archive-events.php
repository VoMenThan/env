<?php
$date_now = date('Y-m-d');
$args_event = array(
    'posts_per_page' => 10,
    'post_type' => 'events',
    'orderby' => 'meta_value',
    'order' => 'asc',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key'			=> 'date',
            'compare'		=> '>=',
            'value'			=> $date_now,
            'type'			=> 'DATETIME'
        )
    )
);
$the_query = new WP_Query( $args_event );

get_header();
?>

<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-events-page blog-detail-page">
        <div class="container">
            <div class="row mb-lg-5">
                <div class="col-lg-8 border-header">
                    <h3 class="title-head-blue have-border">EVENTS</h3>
                </div>
                <div class="col-lg-8 mb-5 pd-lr-0">
                    <?php if( $the_query->have_posts() ): ?>


                        <?php while( $the_query->have_posts() ) : $the_query->the_post();

                            get_template_part( 'template-parts/content', 'event' );

                        endwhile;

                        if (  $the_query->max_num_pages > 1 ){
                            echo '<div class="misha_loadmore btn-show-event btn btn-blue-env w-100 my-5">Show more</div>'; // you can use <a> as well
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
                            SEE OUR UNIQUE APPROACH FOR SUCCESS
                        </a>
                    </div>

                    <div class="list-archived-events">
                        <div class="title">Archived Events</div>
                        <ul class="box-year">
                            <li class="year">2019</li>
                        </ul>
                        <ul class="list-month">
                            <li class="month"><a href="<?php echo home_url('archived-events').'?date=2019-04'?>">April</a></li>
                            <li class="month"><a href="<?php echo home_url('archived-events').'?date=2019-05'?>">May</a></li>
                        </ul>
                    </div>
                </div>





            </div>

        </div>
        <!-- /*============SUBCRIBE HOME=================*/ -->
        <div class="container-fluild section-parallax">
            <div class="bg-green-home">
                <div class="container content-subcribe">
                    <div class="row">
                        <div class="col-12 box-head-subcribe text-center">
                            <h2>SUBSCRIBE FOR THREE THINGS</h2>
                            <p>
                                Three links or tips of interest curated about offshore outsourcing every week by the experts at ENVZONE Consulting.
                            </p>
                            <div class="form-subscribe">
                                <?php
                                echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->
    </section>
</main>
<script>
    $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');
</script>

<?php get_footer();?>