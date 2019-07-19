<?php
/* Template Name: DIS - Knowledge center*/
global $wp_query;
get_header();
?>

<main class="main-content video-home-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Knowledge Center</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-knowledge-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h2 class="title-head-blue">
                        KNOWLEDGE CENTER
                    </h2>

                </div>

                <div class="col-lg-12 pd-lr-0">
                    <?php
                    $isset_video = array();
                    $args = array(
                        'posts_per_page' => 1,
                        'offset'=> 0,
                        'post_type' => 'knowledge_center',
                        'orderby' => 'post_modified',
                        'order' =>'desc',
                        'meta_query' => array(
                            'relation' => 'OR',
                            array(
                                'key' => 'video_show',
                                'value' => 'knowledge-center',
                                'compare' => 'LIKE',
                            )
                        )
                    );
                    $video_main = get_posts( $args );

                    array_push($isset_video, $video_main[0]->ID);
                    ?>
                    <article class="box-knowledge clearfix">
                        <div class="box-video-special">
                            <div class="embed-video">
                                <iframe src="<?php echo get_field('embed', $video_main[0]->ID, false);?>" frameborder="0" title="<?php echo $video_main[0]->post_title;?>" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="box-info-video">
                            <a href="<?php echo home_url('category/').get_the_category($video_main[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($video_main[0]->ID)[0]->cat_name;?></a>
                            <a href="<?php echo get_permalink($video_main[0]->ID);?>">
                                <h1>
                                    <?php echo $video_main[0]->post_title;?>
                                </h1>
                            </a>
                            <p class="d-lg-block d-none">
                                <?php
                                $title = $video_main[0]->post_excerpt;
                                $title = (mb_strlen($title,'utf-8')<170) ? $title : mb_substr($title,0,170,'utf-8')."...";
                                echo $title;
                                ?>
                            </p>

                            <div class="audit">
                                <?php
                                if (get_field('avatar', 'user_'.$video_main[0]->post_author)== ''){
                                    $avatar = ASSET_URL.'images/avatar-default.png';
                                }
                                else{
                                    $avatar = get_field('avatar', 'user_'.$video_main[0]->post_author);
                                }
                                ?>
                                <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $video_main[0]->post_author);?>">
                                    By <?php echo get_the_author_meta('display_name', $video_main[0]->post_author);?>
                                </a>
                                <div class="date-public">on <?php echo get_the_date( 'F d, Y', $video_main[0]->ID );?></div>
                            </div>
                        </div>
                    </article>


                </div>
                <div class="col-lg-8">
                    <h3 class="title-head-blue have-border">FEATURED VIDEOS</h3>
                </div>

                <div class="col-lg-8 knowledge-pt-30">
                    <div class="row">
                        <?php
                        $args = array(
                            'posts_per_page' => 10,
                            'offset'=> 0,
                            'post_type' => 'knowledge_center',
                            'post__not_in' => $isset_video,
                            'orderby' => 'post_modified',
                            'order' =>'desc',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'video_show',
                                    'value' => 'featured-videos',
                                    'compare' => 'LIKE',
                                )
                            )
                        );
                        $video_list = get_posts( $args );
                        foreach ($video_list as $k => $item):
                            ?>
                            <div class="col-lg-6 pd-lr-0">
                                <article class="highlight-news-right img-center clearfix">
                                    <a class="thumbnail-news" href="<?php echo get_permalink($item->ID);?>">
                                        <?php
                                        $vimeo = get_post_meta($item->ID, 'embed', true);
                                        ?>
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
                                            <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                            <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                                By <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                            </a>
                                            <div class="date-public">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach;
                        $isset_video = '';
                        ?>

                    </div>
                    <!--                    <a href="#" class="btn btn-blue-env btn-show-more">Show more</a>-->
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

    <?php require_once "popup-discovery.php";?>
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
<?php get_footer();?>
