<?php
global $wp_query;
?>

<main class="main-content video-home-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Discussion Board</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page discussion-board-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8">
                    <h3 class="title-head-blue">DISCUSSION BOARD</h3>
                </div>

                <div class="col-lg-8 knowledge-pt-30 pd-lr-0">

                    <!-- Button trigger modal -->
                    <div class="box-ask-question" data-toggle="modal" data-target="#modalAskQuestion">
                        What is your question?

                        <img src="<?php echo ASSET_URL;?>images/icon-question-green.png" alt="">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalAskQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 1.5L13.5 0L7.5 6L1.5 0L0 1.5L6 7.5L0 13.5L1.5 15L7.5 9L13.5 15L15 13.5L9 7.5L15 1.5Z" fill="#0D3153"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <?php
                                        echo do_shortcode('[gravityform id=17 title=false description=false ajax=true]');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>

                    <div class="box-list-question">


                        <?php
                        $args = array(
                            'posts_per_page' => 5,
                            'offset'=> 0,
                            'post_type' => 'discussion_board',
                            'orderby' => 'ID',
                            'order' =>'desc'
                        );
                        $the_query = new WP_Query( $args );

                        if( $the_query->have_posts() ): ?>


                            <?php while( $the_query->have_posts() ) : $the_query->the_post();

                                get_template_part( 'template-parts/content', 'discussion' );

                            endwhile;

                            if (  $the_query->max_num_pages > 1 ){
                                echo '<div class="misha_loadmore btn-show-event btn btn-blue-env w-100 my-5">Load more</div>'; // you can use <a> as well
                            };

                        else :

                            echo '<p>No Post Display Recently</p>';

                        endif;
                        ?>

                    </div>
                </div>

                <div class="col-lg-4 blog-detail-page d-lg-block d-none">
                    <div class="box-subscriber-blog">
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

                    <div class="box-free-ebook">
                        <div class="title-free-book">
                            Free eBooks
                        </div>

                        <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'offset'=> 0,
                            'post_type' => 'resources',
                            'orderby' => 'post_modified',
                            'order' =>'desc',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'lead_magnet_mode',
                                    'value' => 'highlight',
                                    'compare' => 'LIKE',
                                )
                            )

                        );
                        $ebook_resources = get_posts( $args );
                        ?>
                        <div class="ebook-top">
                            <h4 class="title-ebook">
                                <?php echo $ebook_resources[0]->post_title;?>
                            </h4>
                            <div class="box-img">
                                <img class="img-fluild" src="<?php echo get_the_post_thumbnail_url($ebook_resources[0]->ID);?>" alt="">
                            </div>

                            <a href="<?php echo get_permalink($ebook_resources[0]->ID); ?>" class="btn btn-blue-env btn-download">DOWNLOAD</a>
                        </div>

                        <?php
                        foreach($ebook_resources as $k => $item):
                            if ($k == 0) continue;
                            ?>
                            <div class="ebook">
                                <div class="box-img">
                                    <img class="img-fluild" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                                </div>
                                <div class="info">
                                    <h4 class="title-ebook">
                                        <?php echo $item->post_title;?>
                                    </h4>
                                    <a href="<?php echo get_permalink($item->ID);?>" class="btn btn-blue-env">DOWNLOAD</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="subscriber">
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

<script type="text/javascript">
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {

            $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');

            $('.blog-knowledge-page .highlight-news-right .info-news h2').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });

    })(jQuery);
</script>
