<?php
$date_now = date('Y-m-d');
$args_event = array(
    'posts_per_page' => -1,
    'post_type' => 'companies',
    'orderby'	=> 'meta_value',
    'order'     => 'desc'
);
$the_query = new WP_Query( $args_event );


$terms_companies = get_terms( array(
    'taxonomy' => 'industries',
    'hide_empty' => false
) );
?>

    <main class="main-content">
        <div class="container-fluid filter-companies-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 box-filter">
                        <div class="box-sort-industries">
                            <div class="title" data-toggle="collapse" data-target="#collapseFilterIndustries" aria-expanded="false" aria-controls="collapseExample">
                                SORT BY: <span class="default-title">Industry (0)</span>
                            </div>
                            <div class="arrow-right"></div>
                        </div>
                        <div class="collapse list-sort-industries" id="collapseFilterIndustries">
                            <div class="wrap">
                                <?php foreach ($terms_companies as $item):?>
                                <div class="item-industry">
                                    <a href="">
                                        <span class="">
                                            <?php echo $item->name;?>
                                        </span>
                                    </a>
                                </div>
                                <?php endforeach;?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="artical-page blog-page blog-detail-page companies-page">
            <div class="container">
                <div class="row mb-lg-5">
                    <div class="col-lg-8 mb-5 pd-lr-0">
                        <?php if( $the_query->have_posts() ): ?>


                            <?php while( $the_query->have_posts() ) : $the_query->the_post();

                                get_template_part( 'template-parts/content', 'companies' );

                            endwhile;

                            if (  $the_query->max_num_pages > 1 ){
                                echo '<div class="misha_loadmore btn-show-event btn btn-blue-env w-100 my-5">Load more</div>'; // you can use <a> as well
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