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

    <section class="artical-page blog-page blog-detail-page blog-knowledge-page blog-knowledge-detail-page">

        <div class="container-fluid bg-blue-home">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="<?php echo get_home_url().'/category/'.get_the_category($post->ID)[0]->slug;?>" class="current-category"><?php echo get_the_category($post->ID)[0]->name;?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('studio');?>">Studio</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h1>
                        <?php echo $post->post_title;?>
                    </h1>
                </div>
                <div class="col-8">
                    <div class="box-video">
                        <div class="embed-video">
                            <?php echo get_field('embed', $post->ID);?>
                        </div>
                        <div class="box-author d-flex justify-content-between">
                            <div class="info-author">
                                <?php
                                if (get_field('avatar', 'user_'.$post->post_author)== ''){
                                    $avatar = ASSET_URL.'images/avatar-default.png';
                                }
                                else{
                                    $avatar = get_field('avatar', 'user_'.$post->post_author);
                                }
                                ?>
                                <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                <div class="edit-by">
                                    By <a href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>"><b><?php echo get_the_author_meta('display_name', $post->post_author);?></b></a> | <?php echo get_field('staff', 'user_'.$post->post_author);?>
                                </div>
                                <div class="public-on">
                                    on <?php echo get_the_date( 'F d, Y', $post->ID ); ?>
                                </div>

                                <div class="tags">
                                    TAGS:
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
                                    <li class="nav-item">
                                        <a class="nav-link link-twitter" >
                                            <svg width="30" height="30" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 0L0 22.5L12 45H18L6.00003 22.5L18 0H12ZM33 0H27L39 22.5L27 45H33L45 22.5L33 0Z" fill="#8DC63F"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link-twitter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title().' '.get_permalink();?>', '_blank', 'width = 700, height = 500')" >
                                            <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M45 0H5C2.25 0 0 2.25 0 5V45C0 47.75 2.25 50 5 50H45C47.75 50 50 47.75 50 45V5C50 2.25 47.75 0 45 0ZM39.25 18.25C39 29.75 31.75 37.75 20.75 38.25C16.25 38.5 13 37 10 35.25C13.25 35.7501 17.5 34.5001 19.75 32.5C16.5 32.25 14.5 30.5 13.5 27.75C14.5 28 15.5 27.75 16.25 27.75C13.25 26.75 11.25 25 11 21C11.75 21.5 12.75 21.75 13.75 21.75C11.5 20.5 10 15.75 11.75 12.75C15 16.25 19 19.25 25.5 19.75C23.75 12.75 33.2501 9 37.0001 13.75C38.7501 13.5 40.0001 12.75 41.2501 12.25C40.7501 14 39.7501 15 38.5001 16C39.7501 15.75 41.0001 15.5 42.0001 15C41.75 16.25 40.5 17.25 39.25 18.25Z" fill="#8DC63F"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link-facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>', '_blank', 'width = 700, height = 500')">
                                            <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M50 8.33389C50 3.955 46.0467 0 41.6667 0H8.33333C3.95333 0 0 3.955 0 8.33389V41.6661C0 46.045 3.95333 50 8.33389 50H25V31.1111H18.8889V22.7778H25V19.5311C25 13.9317 29.2044 8.88889 34.375 8.88889H41.1111V17.2222H34.375C33.6378 17.2222 32.7778 18.1172 32.7778 19.4578V22.7778H41.1111V31.1111H32.7778V50H41.6667C46.0467 50 50 46.045 50 41.6661V8.33389Z" fill="#8DC63F"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="50" height="50" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link-linkedin" onclick="window.open('https://www.linkedin.com/shareArticle?url=<?php echo get_permalink();?>', '_blank', 'width = 700, height = 500')">
                                            <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M42.6758 0H7.32422C3.28598 0 0 3.28598 0 7.32422V42.6758C0 46.714 3.28598 50 7.32422 50H42.6758C46.714 50 50 46.714 50 42.6758V7.32422C50 3.28598 46.714 0 42.6758 0ZM17.6758 39.6484H11.8164V19.1406H17.6758V39.6484ZM17.6758 16.2109H11.8164V10.3516H17.6758V16.2109ZM38.1836 39.6484H32.3242V27.9297C32.3242 26.3145 31.0097 25 29.3945 25C27.7794 25 26.4648 26.3145 26.4648 27.9297V39.6484H20.6055V19.1406H26.4648V20.245C27.9999 19.7678 28.997 19.1406 30.8594 19.1406C34.8331 19.1448 38.1836 22.7097 38.1836 26.9226V39.6484Z" fill="#8DC63F"/>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-description-video">

                            <a href="#show-more" class="show-more" id="show-more">SHOW MORE</a>
                            <a href="#hide-less" class="hide-less" id="hide-less">HIDE LESS</a>
                            <div class="content-description">
                                <?php echo $post->post_content;?>
                            </div>

                            <!--<div class="text-center">
                                <a href="#" class="show-more">SHOW MORE</a>
                            </div>-->
                        </div>

                    </div>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </div>
                <div class="col-4 blog-detail-page">

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


                    <div class="box-free-ebook">
                        <div class="title-free-book">
                            Free eBooks
                        </div>

                        <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'offset'=> 0,
                            'post_type' => 'resources',
                            'orderby' => 'ID',
                            'order' =>'desc'
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

    <div class="artical-page blog-page blog-detail-page">

        <div class="container">


            <!-- /*============READ MORE FROM EXPERTS=================*/ -->
            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">READ MORE FROM EXPERTS</h3>
                    <a href="<?php echo home_url('blog')?>" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 10,
                            'offset'=> 0,
                            'post_type' => 'post',
                            'orderby' => 'post_modified',
                            'order' =>'desc',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'post_show',
                                    'value' => 'read-more-from-experts',
                                    'compare' => 'LIKE',
                                )
                            )
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
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <span>By</span>
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- /*============END READ MORE FROM EXPERTS=================*/ -->


            <!-- /*============WATCH MORE FROM C-LEVEL ADVICES=================*/ -->
            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">WATCH MORE FROM C-LEVEL ADVICES</h3>
                    <a href="<?php echo home_url('knowledge_center')?>" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 7,
                            'offset'=> 0,
                            'post_type' => 'knowledge_center',
                            'orderby' => 'post_modified',
                            'order' =>'desc',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'video_show',
                                    'value' => 'clevel-advice',
                                    'compare' => 'LIKE',
                                )
                            )
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

                                        <span>By</span>
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- /*============END WATCH MORE FROM C-LEVEL ADVICES=================*/ -->


            <!-- /*============WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS=================*/ -->
            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS</h3>
                    <a href="<?php echo home_url('studio')?>" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 10,
                            'offset'=> 0,
                            'post_type' => 'studio_motion',
                            'post__not_in' => array($post->ID),
                            'orderby' => 'post_modified',
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
                                <a class="thumbnail-news" href="<?php echo get_permalink($item->ID);?>">
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

                                        <span>By</span>
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
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


            $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');

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
