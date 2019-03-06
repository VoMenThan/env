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
    <section class="artical-page blog-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <h1 class="title-head-blue">BLOG</h1>
                </div>
            </div>
            <div class="row section-head-blog">
                <div class="col-lg-6">
                    <article class="highlight-news">

                        <a href="#">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_all[0]->ID);?>">
                        </a>
                        <div class="info-news">
                            <a href="<?php echo home_url('category/').get_the_category($news_all[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_all[0]->ID)[0]->cat_name;?></a>
                            <a href="<?php echo get_home_url().'/blog/'.$news_all[0]->post_name;?>">
                                <h2>
                                    <?php echo $news_all[0]->post_title;?>
                                </h2>
                            </a>
                            <div class="audit">
                                <span>By:</span>
                                <a class="author" href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[0]->post_author);?>">
                                    <?php echo get_the_author_meta('display_name', $news_all[0]->post_author);?>
                                </a>
                                <span class="date-public">Updated <?php echo get_the_date( 'M d, Y', $news_all[0]->ID );?></span>
                            </div>
                        </div>

                    </article>
                </div>

                <div class="col-lg-6 d-lg-flex align-items-lg-start flex-lg-column">

                    <?php for($i=1; $i<4; $i++):?>
                    <article class="highlight-news-right clearfix <?php if ($i!=1){echo "mt-lg-auto";}?>">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_all[$i]->ID);?>">
                        </a>
                        <div class="info-news">
                            <a href="<?php echo home_url('category/').get_the_category($news_all[$i]->ID)[0]->slug;?>" class="category">
                                <?php echo get_the_category($news_all[$i]->ID)[0]->cat_name;?>
                            </a>
                            <a href="<?php echo get_home_url().'/blog/'.$news_all[$i]->post_name;?>">
                                <h2>
                                    <?php echo $news_all[$i]->post_title;?>
                                </h2>
                            </a>
                            <div class="audit">
                                <span>By:</span>
                                <a class="author" href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[$i]->post_author);?>">
                                    <?php echo get_the_author_meta('display_name', $news_all[$i]->post_author);?>
                                </a>
                                <span class="date-public">Updated <?php echo get_the_date( 'M d, Y', $news_all[$i]->ID );?></span>
                            </div>
                        </div>
                    </article>
                    <?php endfor;?>

                </div>
            </div>

            <div class="row section-trending">
                <div class="col-12">
                    <h3 class="title-head-blue">TRENDING</h3>
                </div>
                <?php for($i=4; $i<7; $i++):?>
                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
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
                            <div class="audit"><span>By:</span>
                                <a class="author" href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[$i]->post_author);?>">
                                    <?php echo get_the_author_meta('display_name', $news_all[$i]->post_author);?>
                                </a>
                                <span class="date-public">Updated <?php echo get_the_date( 'M d, Y', $news_all[$i]->ID );?></span>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endfor;?>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="title-head-blue">HIGHLIGHTS</h3>
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
                            <div class="audit"><span>By:</span>
                                <a class="author" href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[$i]->post_author);?>">
                                    <?php echo get_the_author_meta('display_name', $news_all[$i]->post_author);?>
                                </a>
                                <span class="date-public">Updated <?php echo get_the_date( 'M d, Y', $news_all[$i]->ID );?></span>
                            </div>
                        </div>
                    </article>
                    <?php endfor;?>
                    <a href="#" class="btn btn-blue-env btn-show-more">Show more</a>
                </div>

                <div class="col-lg-4">
                    <div class="popup-hack-me">
                        <h3>
                            Hacking your mind with 5 mins daily digest!
                        </h3>
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