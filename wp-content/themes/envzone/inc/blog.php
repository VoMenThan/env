<?php
    global $wp_query;

    $terms = get_terms(array(
        'taxonomy' => 'category',
        'hide_empty' => false,
        'orderby' => 'id',
        'order' => 'asc',
        'parent' => 0
    ));

    foreach ( $terms as $k => $v) {
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'post',
            'order' => 'desc',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'orderby' => 'id',
                    'order' => 'desc',
                    'terms' => $v->term_id
                )
            )
        );
        $terms[$k]->list = get_posts($args);

    }

    $args = array(
        'posts_per_page' => 12,
        'offset'=> 0,
        'post_type' => 'post',
        'orderby' => 'id',
        'order' =>'desc'
    );
    $news_all = get_posts( $args );

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
                $args = array(
                    'posts_per_page' => 7,
                    'offset'=> 0,
                    'post_type' => 'post',
                    'orderby' => 'id',
                    'order' =>'desc'
                );
                $news_special = get_posts( $args );
                ?>
                <div class="col-lg-12 item-blog-mb-80">
                    <div class="item-special">
                        <div class="row">

                            <div class="col-lg-7 img-special">
                                <a href="#">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_special[0]->ID);?>" align="job-openings">
                                </a>
                            </div>
                            <div class="col-lg-5 d-flex info-special flex-column align-items-start">
                                <div class="box-info">
                                    <a href="<?php echo home_url('category/').get_the_category($news_special[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_special[0]->ID)[0]->cat_name;?></a>

                                    <a href="<?php echo get_home_url().'/blog/'.$news_special[0]->post_name;?>">
                                        <h3 class="title-special"><?php echo $news_special[0]->post_title;?></h3>
                                    </a>

                                    <div class="excerpt">
                                        <p>
                                            <?php echo $news_special[0]->post_excerpt;?>
                                        </p>
                                        <a href="<?php echo get_home_url().'/blog/'.$news_special[0]->post_name;?>" class="read-more">Read more</a>
                                    </div>
                                </div>

                                <div class="box-author mt-auto">
                                    <?php
                                    if (get_field('avatar', 'user_'.$news_special[0]->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$news_special[0]->post_author);
                                    }

                                    ?>
                                    <img src="<?php echo $avatar;?>" alt="" class="img-fluid avatar">
                                    <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_special[0]->post_author);?>" class="author-by">By <?php echo get_the_author_meta('display_name', $news_special[0]->post_author);?></a>
                                    <div class="date-by">on <?php echo get_the_date( 'M d, Y', $news_special[0]->ID );?></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <h3 class="title-head-blue have-border">FEATURED INSIGHTS</h3>
                </div>
                <?php for($i=1; $i<count($news_special); $i++):

                    if (get_field('avatar', 'user_'.$news_special[$i]->post_author)== ''){
                        $avatar = ASSET_URL.'images/avatar-default.png';
                    }
                    else{
                        $avatar = get_field('avatar', 'user_'.$news_special[$i]->post_author);
                    }

                    ?>
                <div class="col-lg-4 item-blog-mb-30">
                    <div class="box-item-special item">
                        <div class="item-blog">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_special[$i]->ID);?>" align="job-openings">
                            <div class="info">
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category($news_special[$i]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_special[$i]->ID)[0]->cat_name;?></a>
                                    <a href="<?php echo get_home_url().'/blog/'.$news_special[$i]->post_name;?>">
                                        <h4 class="title-list-special"><?php echo $news_special[$i]->post_title;?></h4>
                                    </a>
                                </div>
                                <div class="info-author">
                                    <img src="<?php echo $avatar;?>" alt="" class="img-fluid avatar">
                                    <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[$i]->post_author);?>" class="author-by">
                                        By <b><?php echo get_the_author_meta('display_name', $news_all[$i]->post_author);?></b>
                                    </a>
                                    <div class="date-by">on <?php echo get_the_date( 'M d, Y', $news_special[$i]->ID );?></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <?php endfor;?>

            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="title-head-blue have-border">RECENT ARTICLES</h3>
                </div>

                <div class="col-lg-8">
                    <?php for($i=7; $i<12; $i++):?>
                    <article class="highlight-news-right clearfix">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_all[$i]->ID);?>">
                        </a>
                        <div class="info-news">
                            <a href="<?php echo home_url('category/').get_the_category($news_all[$i]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_all[$i]->ID)[0]->cat_name;?></a>
                            <a href="<?php echo get_home_url().'/blog/'.$news_all[$i]->post_name;?>">
                                <h2>
                                    <?php echo $news_all[$i]->post_title;?>
                                </h2>
                            </a>
                            <div class="audit">
                                <?php
                                if (get_field('avatar', 'user_'.$news_all[$i]->post_author)== ''){
                                    $avatar = ASSET_URL.'images/avatar-default.png';
                                }
                                else{
                                    $avatar = get_field('avatar', 'user_'.$news_all[$i]->post_author);
                                }
                                ?>
                                <img src="<?php echo $avatar;?>" alt="" class="img-fluid avatar">
                                <span>By </span>
                                <a class="author" href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[$i]->post_author);?>">
                                    <b><?php echo get_the_author_meta('display_name', $news_all[$i]->post_author);?></b>
                                </a>
                                <div class="date-public">On <?php echo get_the_date( 'M d, Y', $news_all[$i]->ID );?></div>
                            </div>
                        </div>
                    </article>
                    <?php endfor;?>
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