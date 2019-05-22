<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */

get_header();
?>

<main class="main-content">
    <section class="artical-page blog-page blog-detail-page">
        <div class="container d-lg-block d-none">
            <div class="row">
                <div class="col-12 mb-lg-5">
                    <div class="box-breadcrumb no-print">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('companies');?>">Companies</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row mb-lg-5">
                <div class="col-12 mb-lg-3">
                    <h1>
                        <?php echo $post->post_title;?>
                    </h1>
                </div>
                <div class="col-lg-8">
                    <article class="content-blog">

                        <div class="main-content">
                            <?php
                                echo $post->post_content;
                            ?>
                            <div class="no-print">
                                <?php
                                    if ( comments_open() || get_comments_number() ) {
                                        comments_template();
                                    }
                                ?>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- /*============SUBCRIBE HOME=================*/ -->
                <div class="col-12 d-lg-none d-none">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-parallax no-print">
                                <div class="bg-green-home">
                                    <div class="content-subcribe">
                                        <div class="box-head-subcribe text-center">
                                            <h2>SUBSCRIBE FOR THREE THINGS</h2>
                                            <p>
                                                Three links or tips of interest curated about offshore outsourcing every
                                                week by the experts at ENVZONE Consulting.
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
                    </div>
                </div>
                <!-- /*============END SUBCRIBE HOME=================*/ -->

                <div class="col-lg-4 sidebar-advert no-print">

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

                    <div class="box-free-ebook d-lg-block d-none">
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
        <!-- /*============SUBCRIBE HOME=================*/ -->
        <div class="container-fluild section-parallax no-print">
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
    $(document).ready(function () {

        $('.blog-page .highlight-news-right .info-news h2').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });

        $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');

        $(".box-analaze-blog .analyze-form #gform_submit_button_12").val('ANALYZE FOR CHANCE OF SUCCESS');


        if ( $(window).width() > 768 ) {
            startCarousel();

        } else {
            $('.slider-news').addClass('off');
        }

    });

    $(window).resize(function() {
        if ( $(window).width() > 768 ) {
            startCarousel();
        } else {
            stopCarousel();
        }
    });

    function startCarousel() {
        $('.slider-news').owlCarousel({
            loop: false,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    }

    function stopCarousel() {
        var owl = $('.slider-news');
        owl.trigger('destroy.owl.carousel');
        owl.addClass('off');
    }
</script>
<?php
get_footer();
?>
