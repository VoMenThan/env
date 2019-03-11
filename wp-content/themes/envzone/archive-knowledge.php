<?php
global $wp_query;
get_header();
?>

<main class="main-content">
    <section class="artical-page blog-page blog-knowledge-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Knowledge Center</li>
                        </ol>
                    </div>
                    <h1 class="title-head-blue">
                        KNOWLEDGE CENTER
                    </h1>

                </div>

                <div class="col-12">
                    <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'offset'=> 0,
                        'post_type' => 'knowledge',
                        'orderby' => 'id',
                        'order' =>'desc'
                    );
                    $video_list = get_posts( $args );
                    ?>
                    <article class="box-knowledge clearfix">
                        <div class="box-video-special">
                            <div class="embed-video">
                                <?php echo get_field('embed', $video_list[0]->ID);?>
                            </div>
                        </div>
                        <div class="box-info-video">
                            <a href="<?php echo home_url('category/').get_the_category($video_list[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($video_list[0]->ID)[0]->cat_name;?></a>
                            <a href="<?php echo get_permalink($video_list[0]->ID);?>">
                            <h2>
                                <?php echo $video_list[0]->post_title;?>
                            </h2>
                            </a>
                            <p>
                                <?php echo $video_list[0]->post_excerpt;?>
                            </p>

                            <div class="audit position-static"><span>By:</span>
                                <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $video_list[0]->post_author);?>">
                                    <?php echo get_the_author_meta('display_name', $video_list[0]->post_author);?>
                                </a>
                                <span class="date-public">Updated <?php echo get_the_date( 'M d,Y', $video_list[0]->ID );?></span>
                            </div>
                        </div>
                    </article>


                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <?php
                        foreach ($video_list as $k => $item):
                            if ($k == 0) continue;
                        ?>
                        <div class="col-lg-6">
                            <article class="highlight-news-right img-center">
                                <a class="thumbnail-news" href="<?php echo get_permalink($item->ID);?>">
                                    <?php
                                        $vimeo = get_post_meta($item->ID, 'embed', true);
                                    ?>
                                    <img class="img-fluid" src="<?php echo grab_vimeo_thumbnail($vimeo);?>">
                                </a>
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                    <a href="<?php echo get_permalink($item->ID);?>">
                                        <h2>
                                            <?php echo $item->post_title;?>
                                        </h2>
                                    </a>
                                    <div class="audit position-static"><span>By:</span>
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <span class="date-public">Updated <?php echo get_the_date( 'M d,Y', $item->ID );?></span>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php endforeach;?>

                    </div>
<!--                    <a href="#" class="btn btn-blue-env btn-show-more">Show more</a>-->
                </div>

                <div class="col-lg-4">
                    <div class="popup-hack-me">
                        <h3>
                            Every month, we release a video of in-depth C-Level in offshore outsroucing resources <br>
                            We would like to keep you updated too!
                        </h3>
<!--                        <input type="text" placeholder="your email address">-->
<!--                        <a href="#" class="btn btn-blue-env btn-show-more">KEEP ME UPDATED</a>-->
                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                            ?>
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
