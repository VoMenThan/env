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
    <section class="artical-page blog-page blog-detail-page companies-page company-detail-page">
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

        <div class="container-fluid box-info-company">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 infomation-company clearfix">
                        <div class="box-logo">
                            <a href="">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                            </a>
                        </div>
                        <div class="box-info">
                            <h1>ABC COMPANY</h1>
                            <div class="box-industries">
                                <span>Industry:</span>
                                <ul class="list-industries list-inline">

                                    <?php
                                    $category_industries = get_the_terms( get_the_ID(), 'industries' );
                                    foreach ($category_industries as $item):
                                        ?>
                                        <li class="item list-inline-item">
                                            <?php echo $item->name;?>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>

                        <a href="" class="btn btn-green-env">VIEW WEBSITE</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <article class="section-overview">
                        <h2 class="label-heading">OVERVIEW</h2>
                        <div class="content-overview">
                            <p>
                                Drud is a suite of integrated, automated, Open Source, enterprise-grade development tools, DevOps workflows, and hosting platform. We have a rich history of experience and have strong investors that share our vision. Drud Technology, LLC. was formed in January 2017, but we have been working collaboratively over the past 5 years.
                            </p>
                            <img src="<?php echo ASSET_URL;?>images/image-overview-company.png" alt="">
                        </div>
                    </article>

                    <article class="section-screenshots box-gallery-detail">
                        <div class="carousel-photo-detail owl-carousel owl-theme">
                                <?php
                                $album = get_field('screenshots', $post->ID);
                                foreach ($album as $k => $item):
                                    ?>
                                    <div class="item"  data-hash="<?php echo $k; ?>">
                                        <img title="<?php echo $item['title'];?>" src="<?php echo $item['url'];?>" alt="<?php echo $item['alt'];?>">
                                        <?php if (($item['description']) != ''):?>
                                            <div class="description-photo">
                                                <?php echo $item['description'];?>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                <?php endforeach;?>

                            </div>

                            <div id="box-thumbnail-photo" class="box-icon-mini owl-carousel owl-theme">
                                <?php
                                foreach ($album as $k => $item):
                                    ?>
                                    <div class="item">
                                        <a href="#<?php echo $k;?>"><img title="<?php echo $item['title']?>" src="<?php echo $item['sizes']['medium'];?>" alt="<?php echo $item['alt']?>"></a>
                                    </div>
                                <?php endforeach;?>


                            </div>
                    </article>
                </div>

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

        /*slider product detail*/
        $(".carousel-photo-detail").owlCarousel({
            items:1,
            margin:0,
            stagePadding: 0,
            smartSpeed: 500,
            loop: false,
            nav: true,
            dots: false,
            autoplay: true,
            slideBy: 1,
            autoplayTimeout:5000,
            URLhashListener:true,
            autoplayHoverPause:true,
            startPosition: 'URLHash',
            navText: [
                '<i class="btn-next-slide"></i>',
                '<i class="btn-prev-slide"></i>'
            ]
        });

        $(".box-icon-mini").owlCarousel({
            center: false,
            items:6,
            margin:10,
            stagePadding: 0,
            smartSpeed: 300,
            loop: false,
            nav: true,
            dots: false,
            slideBy: 3,
            navText: [
                '<i class="btn-next-slide"></i>',
                '<i class="btn-prev-slide"></i>'
            ]
        });
        /* end slider product detail*/

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
