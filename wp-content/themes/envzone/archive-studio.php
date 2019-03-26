<?php

$args = array(
    'posts_per_page' => 7,
    'offset'=> 0,
    'post_type' => 'studio',
    'orderby' => 'id',
    'order' =>'desc'
);
$photo_studio = get_posts( $args );

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
                        <li class="breadcrumb-item active" aria-current="page">Studio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page studio-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <article class="box-studio d-flex clearfix">
                        <a href="<?php echo get_permalink($photo_studio[0]->ID);?>" class="box-photo-special">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($photo_studio[0]->ID);?>" alt="">
                            <i class="icon-photo-play"></i>
                        </a>
                        <div class="box-info-photo d-flex align-items-start flex-column">
                            <div class="info-photo">
                                <a href="<?php echo home_url('category/').get_the_category($photo_studio[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($photo_studio[0]->ID)[0]->cat_name;?></a>
                                <a href="<?php echo get_permalink($photo_studio[0]->ID);?>">
                                <h1>
                                    <?php echo $photo_studio[0]->post_title;?>
                                </h1>
                                </a>
                            </div>

                            <div class="extent-info mt-auto">
                                <div class="audit position-static">
                                    <?php
                                    if (get_field('avatar', 'user_'.$photo_studio[0]->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$photo_studio[0]->post_author);
                                    }

                                    ?>
                                    <img src="<?php echo $avatar;?>" class="img-fluid avatar" alt="">
                                    <span>Edited by</span>
                                    <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $photo_studio[0]->post_author);?>"> <?php echo get_the_author_meta('display_name', $photo_studio[0]->post_author);?></a>
                                    <div class="date-public">On <?php echo get_the_date( 'M d,Y', $photo_studio[0]->ID );?></div>
                                </div>
                            </div>
                        </div>
                    </article>


                </div>

                <div class="col-lg-12 mt-5">
                    <div class="title-highlight-activities title-head-blue have-border">
                        OUR HIGHLIGHT ACTIVITIES
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                <?php
                    foreach ($photo_studio as $k => $item):
                        if($k == 0) continue;
                ?>
                <div class="item studio-highlight">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="<?php echo get_permalink($item->ID);?>">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>">
                            <i class="icon-photo-play"></i>
                        </a>
                        <div class="info-news">
                            <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                            <a href="<?php echo get_permalink($item->ID);?>">
                                <h2>
                                    <?php echo $item->post_title;?>
                                </h2>
                            </a>
                            <div class="audit position-static">
                                <?php
                                if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                    $avatar = ASSET_URL.'images/avatar-default.png';
                                }
                                else{
                                    $avatar = get_field('avatar', 'user_'.$item->post_author);
                                }

                                ?>
                                <img src="<?php echo $avatar;?>" class="img-fluid avatar" alt="">
                                <span>By</span>
                                <a class="author" href="<?php echo home_url('author/').get_the_author_meta('display_name', $item->post_author);?>"> <?php echo get_the_author_meta('display_name', $item->post_author);?></a>
                                <div class="date-public">On <?php echo get_the_date( 'M d,Y', $item->ID )?></div>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach;?>
                    </div>
                </div>

                <div class="col-lg-12 mt-5">
                    <div class="title-highlight-activities title-head-blue have-border">
                        ENVZONE ROCKSTARS <b>ON DISRUPTIVE EVENTS</b>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 7,
                            'offset'=> 0,
                            'post_type' => 'knowledge',
                            'orderby' => 'id',
                            'order' =>'desc'
                        );
                        $video = get_posts( $args );
                        foreach ($video as $item):
                            $vimeo = get_post_meta($item->ID, 'embed', true);
                            ?>
                            <article class="highlight-news-right img-center item">
                                <a class="thumbnail-news" href="#">
                                    <img class="img-fluid" src="<?php echo grab_vimeo_thumbnail($vimeo);?>">
                                    <i class="icon-video-play"></i>
                                </a>
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                    <a href="<?php echo get_permalink($item->ID);?>">
                                        <h2>
                                            <?php echo $item->post_title;?>
                                        </h2>
                                    </a>
                                    <div class="audit position-static">
                                        <?php
                                        if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                            $avatar = ASSET_URL.'images/avatar-default.png';
                                        }
                                        else{
                                            $avatar = get_field('avatar', 'user_'.$item->post_author);
                                        }

                                        ?>
                                        <img src="<?php echo $avatar;?>" class="img-fluid avatar" alt="">
                                        <span>By </span>
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>"> <?php echo get_the_author_meta('display_name', $item->post_author);?></a>
                                        <div class="date-public">On <?php echo get_the_date( 'M d,Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>

                        <?php endforeach; ?>
                    </div>
                </div>


                <!--<div class="col-lg-12">
                    <a href="#" class="btn btn-blue-env btn-show-more">Show more</a>
                </div>-->

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

<script type="text/javascript">
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {

            $('.studio-page .highlight-news-right .info-news h2').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });

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


        });

    })(jQuery);
</script>
<?php get_footer(); ?>
