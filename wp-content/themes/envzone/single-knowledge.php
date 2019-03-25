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
    <section class="artical-page blog-page blog-knowledge-page blog-knowledge-detail-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('knowledge');?>">Knowledge</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>

                </div>
                <div class="col-lg-12">
                    <h1>
                        <?php echo $post->post_title;?>
                    </h1>
                </div>
                <div class="col-8">
                    <div class="box-video">
                        <div class="embed-video">
                            <iframe src="<?php echo get_field('embed', $post->ID, false);?>" frameborder="0" title="<?php echo $post->post_title;?>" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
                        </div>
                        <div class="info-video">
                            <?php echo $post->post_content;?>
                            <!--<div class="text-center">
                                <a href="#" class="show-more">SHOW MORE</a>
                            </div>-->
                        </div>

                    </div>

                </div>
                <div class="col-4">
                    <article class="info-video">
                        <div class="edit-by">
                            EDITED BY
                            <div class="author">
                                <?php echo get_the_author_meta('display_name', $post->post_author);?>
                            </div>
                        </div>
                        <div class="public-on">
                            PUBLISED ON
                            <div class="date">
                                <?php echo get_the_date( 'M d,Y', $post->ID ); ?>
                            </div>
                        </div>

                        <div class="public-on">
                            TAGS
                            <div class="tags">

                                <?php
                                if (get_the_tags() != ''):
                                    foreach (get_the_tags() as $tag):?>
                                        <a href="<?php echo home_url('tag/'.$tag->slug);?>"><?php echo $tag->name;?></a>
                                    <?php endforeach; else: echo 'No tags!'; endif;?>
                            </div>
                        </div>

                        <div class="box-share-social">
                            <div class="label-share-socials">
                                SHARE THIS VIDEO TO MY FAVORITES
                            </div>
                            <ul class="nav list-social justify-content-end">
                                <li class="nav-item px-3">
                                    <a class="nav-link link-twitter" href="#"><i class="icon-embed-video"></i></a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link link-twitter" href="#"><i class="icon-twitter-green"></i></a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link link-facebook" href="#"><i class="icon-facebook-green"></i></a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link link-linkedin" href="#"><i class="icon-linkedin-green"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>

                </div>

            </div>

        </div>

    </section>
    <section class="blog-comment pt-3">
        <div class="container">
            <div class="row">
                <div class="col-8 px-2">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                </div>

                <div class="col-4 blog-detail-page">
                    <div class="box-advert">
                        <p>
                            <span class="fz-big-green">80%</span> of outsourcing relationships fail due to responsiveness &amp; communication factors
                        </p>
                        <div class="sub-title">
                            Do Not Let Your Projects Go South!
                        </div>
                        <a href="<?php echo home_url('process-framework');?>" class="btn btn-green-env">
                            FIX MY SOFTWARE PROJECT
                        </a>
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
                            <form action="" method="get">
                                <input type="text" class="input-search d-block" placeholder="Enter your email adress">
                                <input type="submit" hidden>
                                <a class="btn btn-blue-env btn-search" href="#">SIGN ME UP FOR THREE THINGS</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->
    </section>

    <div class="artical-page blog-page blog-detail-page">

        <div class="container">
            <!-- /*============WATCH MORE FROM C-LEVEL ADVICES=================*/ -->
            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS</h3>
                    <a href="<?php echo home_url('knowledge')?>" class="view-all">VIEW ALL</a>
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
                        $news_expert = get_posts( $args );
                        foreach ($news_expert as $item):
                            if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                $avatar = ASSET_URL.'images/avatar-default.png';
                            }
                            else{
                                $avatar = get_field('avatar', 'user_'.$item->post_author);
                            }
                            ?>
                            <article class="highlight-news-right img-center item">
                                <?php
                                $vimeo = get_post_meta($item->ID, 'embed', true);
                                ?>
                                <a class="thumbnail-news" href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                    <img class="img-fluid" src="<?php echo grab_vimeo_thumbnail($vimeo);?>">
                                    <i class="icon-video-play"></i>
                                </a>
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category">
                                        <?php echo get_the_category($item->ID)[0]->name;?>
                                    </a>
                                    <a href="<?php echo get_permalink($item->ID);?>">
                                        <h2>
                                            <?php echo $item->post_title;?>
                                        </h2>
                                    </a>
                                    <div class="audit">

                                        <span>By:</span>
                                        <img src="<?php echo $avatar;?>" alt="" class="img-fluid avatar">
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">Updated <?php echo get_the_date( 'M d,Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- /*============END WATCH MORE FROM C-LEVEL ADVICES=================*/ -->

            <!-- /*============READ MORE FEATURED INSIGHTS=================*/ -->
            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">READ MORE FEATURED INSIGHTS</h3>
                    <a href="<?php echo home_url('blog')?>" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 7,
                            'offset'=> 0,
                            'post_type' => 'post',
                            'orderby' => 'id',
                            'order' =>'desc'
                        );
                        $news_expert = get_posts( $args );

                        foreach ($news_expert as $item):
                            ?>
                            <article class="highlight-news-right img-center item">
                                <a class="thumbnail-news" href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>">
                                </a>
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category">
                                        <?php echo get_the_category($item->ID)[0]->cat_name;?>
                                    </a>
                                    <a href="<?php echo get_permalink($item->ID);?>">
                                        <h2>
                                            <?php echo $item->post_title;?>
                                        </h2>
                                    </a>
                                    <div class="audit">
                                        <?php
                                        if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                            $avatar = ASSET_URL.'images/avatar-default.png';
                                        }
                                        else{
                                            $avatar = get_field('avatar', 'user_'.$item->post_author);
                                        }
                                        ?>
                                        <img src="<?php echo $avatar;?>" alt="" class="img-fluid avatar">
                                        <span>By:</span>
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">Updated <?php echo get_the_date( 'M d,Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- /*============END READ MORE FEATURED INSIGHTS=================*/ -->

            <!-- /*============WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS=================*/ -->
            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS</h3>
                    <a href="<?php echo home_url('knowledge')?>" class="view-all">VIEW ALL</a>
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
                        $news_expert = get_posts( $args );
                        foreach ($news_expert as $item):
                            if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                $avatar = ASSET_URL.'images/avatar-default.png';
                            }
                            else{
                                $avatar = get_field('avatar', 'user_'.$item->post_author);
                            }
                            ?>
                            <article class="highlight-news-right img-center item">
                                <?php
                                $vimeo = get_post_meta($item->ID, 'embed', true);
                                ?>
                                <a class="thumbnail-news" href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                    <img class="img-fluid" src="<?php echo grab_vimeo_thumbnail($vimeo);?>">
                                    <i class="icon-video-play"></i>
                                </a>
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category">
                                        <?php echo get_the_category($item->ID)[0]->name;?>
                                    </a>
                                    <a href="<?php echo get_permalink($item->ID);?>">
                                        <h2>
                                            <?php echo $item->post_title;?>
                                        </h2>
                                    </a>
                                    <div class="audit">

                                        <span>By:</span>
                                        <img src="<?php echo $avatar;?>" alt="" class="img-fluid avatar">
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">Updated <?php echo get_the_date( 'M d,Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- /*============END WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS=================*/ -->
        </div>

    </div>
</main>
<script>
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {

            $('.blog-page .highlight-news-right .info-news h2').matchHeight({
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
<?php
get_footer();
?>
