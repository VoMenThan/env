<?php
global $wp_query;
get_header();
?>

<main class="main-content">
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
                <div class="col-12">
                    <h1 class="title-head-blue">
                        KNOWLEDGE CENTER
                    </h1>

                </div>

                <div class="col-12">
                    <?php
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
                            <h2>
                                <?php echo $video_main[0]->post_title;?>
                            </h2>
                            </a>
                            <p>
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
                            'posts_per_page' => -1,
                            'offset'=> 0,
                            'post_type' => 'knowledge_center',
                            'orderby' => 'id',
                            'order' =>'desc'
                        );
                        $video_list = get_posts( $args );
                        foreach ($video_list as $k => $item):
                            if ($item->ID == $video_main[0]->ID) continue;
                        ?>
                        <div class="col-lg-6">
                            <article class="highlight-news-right img-center">
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
                        <?php endforeach;?>

                    </div>
<!--                    <a href="#" class="btn btn-blue-env btn-show-more">Show more</a>-->
                </div>

                <div class="col-lg-4 blog-detail-page">
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

                        <div class="ebook-top">
                            <h4 class="title-ebook">
                                The All-In-One Cheatsheet For A Strategic Outsourcing Decision
                            </h4>
                            <div class="box-img">
                                <img class="img-fluild" src="<?php echo ASSET_URL;?>images/cover-ebook-all-in-one.png" alt="">
                            </div>

                            <a href="#" class="btn btn-blue-env btn-download">DOWNLOAD</a>
                        </div>

                        <div class="ebook">
                            <div class="box-img">
                                <img class="img-fluild" src="<?php echo ASSET_URL;?>images/cover-ebook-report-software.png" alt="">
                            </div>
                            <div class="info">
                                <h4 class="title-ebook">
                                    Report on Software Outsourcing Needs and Content Preferences
                                </h4>
                                <a href="#" class="btn btn-blue-env">DOWNLOAD</a>
                            </div>
                        </div>
                        <div class="ebook">
                            <div class="box-img">
                                <img class="img-fluild" src="<?php echo ASSET_URL;?>images/cover-ebook-3quick-tips.png" alt="">
                            </div>
                            <div class="info">
                                <h4 class="title-ebook">
                                    3 Quick Tips to Have a Successful Outsourcing Experience
                                </h4>
                                <a href="#" class="btn btn-blue-env">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</main>

<script type="text/javascript">
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {

            $('.blog-knowledge-page .highlight-news-right .info-news h2').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });

    })(jQuery);
</script>

<?php get_footer(); ?>
