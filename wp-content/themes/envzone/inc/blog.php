<?php
    global $wp_query;

    get_header();
?>

<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb mt-50">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-detail-page">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="title-page">BLOG</div>
                </div>
            </div>
            <div class="row section-head-blog content-blog">
                <?php
                $post_isset = array();
                $args = array(
                    'posts_per_page' => 1,
                    'offset'=> 0,
                    'post_type' => 'post',
                    'orderby' => 'post_modified',
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => 'post_show',
                            'value' => 'main-article',
                            'compare' => 'LIKE',
                        )
                    )
                );
                $news_main = get_posts( $args );

                array_push($post_isset, $news_main[0]->ID);
                ?>
                <div class="col-lg-12 item-blog-mb-80">
                    <div class="item-special">
                        <div class="row">

                            <div class="col-lg-7 img-special">
                                <a href="#">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_main[0]->ID);?>" align="job-openings">
                                </a>
                            </div>
                            <div class="col-lg-5 d-flex info-special flex-column align-items-start">
                                <div class="box-info">
                                    <a href="<?php echo home_url('category/').get_the_category($news_main[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_main[0]->ID)[0]->cat_name;?></a>

                                    <a href="<?php echo get_home_url().'/blog/'.$news_main[0]->post_name;?>">
                                        <h3 class="title-special"><?php echo $news_main[0]->post_title;?></h3>
                                    </a>

                                    <div class="excerpt">
                                        <p>
                                            <?php
                                                $title = $news_main[0]->post_excerpt;
                                                $title = (mb_strlen($title,'utf-8')<170) ? $title : mb_substr($title,0,170,'utf-8')."...";
                                                echo $title;
                                            ?>
                                        </p>

                                        <a href="<?php echo get_home_url().'/blog/'.$news_main[0]->post_name;?>" class="read-more">Read more</a>
                                    </div>
                                </div>

                                <div class="box-author mt-auto">
                                    <?php
                                    if (get_field('avatar', 'user_'.$news_main[0]->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$news_main[0]->post_author);
                                    }

                                    ?>
                                    <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                    <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_main[0]->post_author);?>" class="author-by">By <?php echo get_the_author_meta('display_name', $news_main[0]->post_author);?></a>
                                    <div class="date-by">on <?php echo get_the_date( 'M d, Y', $news_main[0]->ID );?></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <h3 class="title-head-blue have-border">FEATURED INSIGHTS</h3>
                </div>
                <?php
                $args = array(
                    'posts_per_page' => 6,
                    'offset'=> 0,
                    'post_type' => 'post',
                    'orderby' => 'post_modified',
                    'order' =>'desc',
                    'post__not_in' => array($news_main[0]->ID),
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => 'post_show',
                            'value' => 'featured-insights',
                            'compare' => 'LIKE',
                        )
                    )
                );
                $news_special = get_posts( $args );

                foreach($news_special as $item):

                    array_push($post_isset, $item->ID);

                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                        $avatar = ASSET_URL.'images/avatar-default.png';
                    }
                    else{
                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                    }

                    ?>
                <div class="col-lg-4 item-blog-mb-30">
                    <div class="box-item-special item">
                        <div class="item-blog">
                            <a href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" align="job-openings">
                            </a>
                            <div class="info">
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                    <a href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                        <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                    </a>
                                </div>
                                <div class="info-author">
                                    <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                    <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                        By <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                    </a>
                                    <div class="date-by">on <?php echo get_the_date( 'M d, Y', $item->ID );?></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <?php endforeach;?>

            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="title-head-blue have-border">RECENT ARTICLES</h3>
                </div>

                <div class="col-lg-8">
                    <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'offset'=> 0,
                        'post_type' => 'post',
                        'orderby' => 'id',
                        'post__not_in' => $post_isset,
                        'order' =>'desc'
                    );
                    $news_recent = get_posts( $args );
                    foreach($news_recent as $item):?>
                    <article class="highlight-news-right clearfix">
                        <a class="thumbnail-news" href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                            <?php echo get_the_post_thumbnail( $item->ID, 'medium');?>
                        </a>
                        <div class="info-news">
                            <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                            <a href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
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
                                <a class="author" href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>">
                                    By <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                </a>
                                <div class="date-public">on <?php echo get_the_date( 'M d, Y', $item->ID );?></div>
                            </div>
                        </div>
                    </article>
                    <?php
                        endforeach;
                        $post_isset = ''; //reset array post isset
                    ?>
                    <!--<a href="#" class="btn btn-blue-env btn-show-more">Show more</a>-->
                </div>

                <div class="col-lg-4">
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
    /*============ slide news =================*/
    $(document).ready(function() {

        $(".form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');

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

    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {
            $('.content-blog .box-item-special .item-blog').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });

            $('.blog-page .highlight-news-right .info-news h2').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });

    })(jQuery);
</script>

<?php get_footer();?>