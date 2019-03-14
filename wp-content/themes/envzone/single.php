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
    <section class="artical-page blog-page blog-detail-page">
        <div class="container-fluid bg-blue-home">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="<?php echo get_home_url().'/category/'.get_the_category($post->ID)[0]->slug;?>" class="current-category">CATERGORY NAME HERE - <?php echo get_the_category($post->ID)[0]->name;?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>/blog">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>
                </div>
                <div class="col-12 mb-lg-3">
                    <h1>
                        <?php echo $post->post_title;?>
                    </h1>
                </div>
                <div class="col-8">
                    <article class="content-blog">
                        <div class="excerpt-news">
                            <?php echo $post->post_excerpt;?>
                        </div>
                        <div class="audit">
                            <span>By:</span>
                            <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>"> <?php echo get_the_author_meta('display_name', $post->post_author);?></a> <span>| ENVZONE Staff</span>
                            <div class="date">PUBLISHED: <?php echo get_the_date( 'M d,Y', $item->ID );?> | UPDATED: <?php echo get_the_date( 'M d,Y', $item->ID );?></div>
                        </div>

                        <div class="box-share">
                            <ul class="nav list-social d-flex justify-content-end">
                                <li class="nav-item">
                                    SHARE THIS ARTICLE:
                                </li>
                                <li class="nav-item">
                                    <a class="link-twitter" href="https://twitter.com/Envzone">
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-facebook" href="https://www.facebook.com/envzone/">
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-linkedin"  href="https://www.linkedin.com/company/evnzone-inc.?trk=top_nav_home">
                                        <i class="icon-linkedin"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-google" href="https://plus.google.com/+EnvZoneWashington">
                                        <i class="icon-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="main-content">
                            <?php echo $post->post_content;

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                            ?>
                        </div>
                    </article>
                </div>

                <div class="col-4">
                    <div class="box-advert">
                        <p>
                            <span class="fz-big-green">80%</span> of outsourcing relationships fail due to responsiveness & communication factors
                        </p>
                        <div class="sub-title">
                            Do Not Let Your Projects Go South!
                        </div>
                        <a href="<?php echo home_url("process-framework");?>" class="btn btn-green-env">
                            SEE OUR UNIQUE APPROACH FOR SUCCESS
                        </a>
                    </div>

                    <div class="box-related-article">
                        <div class="title-article">
                            Related articles
                        </div>
                        <?php
                            $args = array(
                                'posts_per_page' => 4,
                                'offset'=> 0,
                                'post_type' => 'post',
                                'orderby' => 'id',
                                'order' =>'desc'
                            );
                            $news_relate = get_posts( $args );
                            foreach ($news_relate as $item):
                        ?>
                        <div class="item-relate clearfix">
                            <a href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>">
                            </a>
                            <a href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                <h2><?php echo $item->post_title;?></h2>
                            </a>
                        </div>
                        <?php endforeach;?>


                    </div>

                </div>

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


        <div class="container">
            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue">READ MORE FROM EXPERTS</h3>
                    <a href="<?php echo home_url('blog')?>" class="view-all">VIEW ALL</a>
                </div>


                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'offset'=> 0,
                    'post_type' => 'post',
                    'orderby' => 'id',
                    'order' =>'asc'
                );
                $news_expert = get_posts( $args );

                foreach ($news_expert as $item):
                ?>
                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
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
                            <div class="audit"><span>By:</span>
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

            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue">LEARN MORE ABOUT C-LEVEL ADVICES</h3>
                    <a href="<?php echo home_url('blog')?>" class="view-all">VIEW ALL</a>
                </div>

                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'offset'=> 0,
                    'post_type' => 'post',
                    'orderby' => 'id',
                    'order' =>'desc'
                );
                $news_expert = get_posts( $args );
                foreach ($news_expert as $item):
                    ?>
                    <div class="col-lg-4">
                        <article class="highlight-news-right img-center">
                            <a class="thumbnail-news" href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>">
                            </a>
                            <div class="info-news">
                                <a href="<?php echo home_url('category/').get_the_category($item->ID)->slug;?>" class="category">
                                    <?php echo get_the_category($item->ID)->cat_name;?>
                                </a>
                                <a href="<?php echo get_permalink($item->ID);?>">
                                    <h2>
                                        <?php echo $item->post_title;?>
                                    </h2>
                                </a>
                                <div class="audit"><span>By:</span>
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

            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue">WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS</h3>
                    <a href="<?php echo home_url('events')?>" class="view-all">VIEW ALL</a>
                </div>

                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'offset'=> 0,
                    'post_type' => 'list_events',
                    'orderby' => 'id',
                    'order' =>'desc'
                );
                $news_expert = get_posts( $args );
                foreach ($news_expert as $item):
                    ?>
                    <div class="col-lg-4">
                        <article class="highlight-news-right img-center">
                            <div class="info-news">
                                <a href="<?php echo get_permalink($item->ID);?>">
                                    <h2>
                                        <?php echo $item->post_title;?>
                                    </h2>
                                </a>
                                <div class="audit"><span>By:</span>
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
<?php
get_footer();
?>
