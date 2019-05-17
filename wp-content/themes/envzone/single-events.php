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
    <section class="artical-page blog-page blog-detail-page event-detail-page">
        <div class="container d-lg-block d-none">
            <div class="row">
                <div class="col-12 mb-lg-5">
                    <div class="box-breadcrumb no-print">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>/events">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row mb-lg-5">


                <div class="col-lg-12">
                    <h2 class="title-head-blue">
                        EVENTS
                    </h2>
                </div>

                <div class="col-lg-4 order-lg-0 order-1 sidebar-advert">

                    <div class="meeting-envzone-staff">
                        <div class="title">Meet with EnvZone Staff</div>

                        <?php
                        $available = get_field('staff_join', $post->ID);
                        if ($available ==  true):?>
                        <article class="status-availible text-center">
                            <img src="<?php echo ASSET_URL;?>images/icon-available-green.png" alt="">
                            <div class="status">Available</div>
                            <div class="form-connect">
                                <?php
                                echo do_shortcode('[gravityform id=16 title=false description=false ajax=false]');
                                ?>
                            </div>
                            <p>No, I attend alone</p>
                        </article>
                        <?php else:?>
                        <article class="status-unavailible text-center">
                            <img src="<?php echo ASSET_URL;?>images/icon-unavailable-gray.png" alt="">
                            <div class="status">Unavailable</div>
                            <p>We will see you at next event.</p>
                        </article>
                        <?php endif;?>
                    </div>


                    <div class="box-subscriber-blog d-lg-block d-none">
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


                </div>

                <div class="col-lg-8 order-lg-1 order-0 box-info-event-0">
                    <article class="content-event">
                        <div class="box-head">
                            <h1>
                                <?php echo $post->post_title;?>
                            </h1>
                            <div class="host-name">
                                <?php echo get_field('location', $post->ID);?>
                            </div>
                        </div>


                        <div class="event-time clearfix">
                            <span class="date"><?php echo get_field('date', $post->ID);?></span>
                            <div class="time">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 0C6.729 0 0 6.729 0 15C0 23.271 6.729 30 15 30C23.271 30 30 23.271 30 15C30 6.729 23.271 0 15 0ZM15 29C7.2805 29 1 22.7195 1 15C1 7.2805 7.2805 1 15 1C22.7195 1 29 7.2805 29 15C29 22.7195 22.7195 29 15 29Z" fill="#8DC63F"/>
                                    <path d="M15 3C14.724 3 14.5 3.2235 14.5 3.5V15H7C6.724 15 6.5 15.2235 6.5 15.5C6.5 15.7765 6.724 16 7 16H15C15.276 16 15.5 15.7765 15.5 15.5V3.5C15.5 3.2235 15.276 3 15 3Z" fill="#8DC63F"/>
                                </svg>
                                <?php echo get_field('time_duration', $post->ID);?>
                            </div>
                            <div class="tag">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M29.4558 13.2382L24.321 6.23397C23.6446 5.31155 22.2732 4.61667 21.1356 4.61667H2.41058C1.0823 4.61667 0 5.69897 0 7.02725V22.9727C0 24.301 1.0823 25.3833 2.41058 25.3833H21.1356C22.2794 25.3833 23.6507 24.6884 24.321 23.766L29.4558 16.7618C30.1814 15.7779 30.1814 14.2282 29.4558 13.2382ZM28.1152 15.7902L22.9804 22.7944C22.6238 23.2863 21.7382 23.7291 21.1294 23.7291H2.41058C1.99857 23.7291 1.66035 23.3909 1.66035 22.9789V7.02725C1.66035 6.61523 1.99857 6.27702 2.41058 6.27702H21.1356C21.7444 6.27702 22.6238 6.72592 22.9866 7.21173L28.1213 14.2159C28.4165 14.6279 28.4165 15.3782 28.1152 15.7902Z" fill="#8DC63F"/>
                                </svg>
                                    <?php
                                        if (get_the_tags($post->ID) != ''):
                                            foreach (get_the_tags($post->ID) as $tag):
                                    ?>
                                                <a href="<?php echo home_url('tag/'.$tag->slug);?>"><?php echo $tag->name;?></a>,

                                    <?php endforeach;
                                        else:
                                            echo 'No Efficiency';
                                        endif;

                                    ?>

                            </div>
                        </div>

                        <div class="post-content">
                            <?php
                                echo $post->post_content;
                            ?>
                        </div>

                        <div class="box-direct">
                            <a target="_blank" rel="nofollow" href="<?php echo get_field('url_event', $post->ID);?>" class="btn btn-blue-env btn-make-direct">MAKE RSVP</a>
                        </div>

                    </article>

                    <div class="location-event d-lg-block d-none">
                        <div class="title-local">Location of Event</div>
                        <p>
                            <?php echo get_field('address', $post->ID);?>
                        </p>
                    </div>

                    <div class="box-comments">
                    <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                    </div>
                </div>

            </div>

        </div>


        <div class="container">
            <div class="row section-trending no-print d-lg-block d-none">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">WATCH MORE OUR HIGHLIGHT ACTIVITIES</h3>
                    <a href="<?php echo home_url('studio')?>" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 10,
                            'offset'=> 0,
                            'post_type' => 'studio_gallery',
                            'orderby' => 'post_modified',
                            'order' =>'desc',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'album_show',
                                    'value' => 'watch-more',
                                    'compare' => 'LIKE',
                                )
                            )

                        );
                        $photo_studio = get_posts( $args );

                        foreach ($photo_studio as $item):
                            ?>
                            <article class="highlight-news-right img-center item">
                                <a class="thumbnail-news" href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>">
                                    <i class="icon-photo-play"></i>
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
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            By <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>

            <div class="row section-trending no-print d-lg-block d-none">
                <div class="col-12 border-header">
                    <a href="<?php echo home_url('blog')?>"><h3 class="title-head-blue have-border">READ MORE FROM EXPERTS</h3></a>
                    <a href="<?php echo home_url('blog')?>" class="view-all d-lg-inline-block d-none">VIEW ALL</a>
                </div>
                <div class="col-lg-12 box-item-horizontal-mb">
                    <div class="owl-carousel owl-theme d-lg-flex d-block slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 10,
                            'offset'=> 0,
                            'post_type' => 'post',
                            'post__not_in' => $post_isset,
                            'orderby' => 'id',
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
                            <article class="highlight-news-right img-center clearfix item">
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
                                    <div class="audit d-lg-block d-none">
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
                        <?php
                        endforeach;
                        $post_isset = '';
                        ?>
                    </div>
                </div>
            </div>

            <div class="row section-trending no-print d-lg-block d-none">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">LEARN MORE ABOUT C-LEVEL ADVICES</h3>
                    <a href="<?php echo home_url('knowledge-center')?>" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 7,
                            'offset'=> 0,
                            'post_type' => 'knowledge_center',
                            'orderby' => 'id',
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
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            By <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>

            <div class="row section-trending no-print d-lg-block d-none">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue have-border">WATCH OUR ROCKSTARS ON DISRUPTIVE EVENTS</h3>
                    <a href="<?php echo home_url('studio')?>" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme d-flex slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 7,
                            'offset'=> 0,
                            'post_type' => 'studio_motion',
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
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $item->post_author);?>">
                                            By <?php echo get_the_author_meta('display_name', $item->post_author);?>
                                        </a>
                                        <div class="date-public">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>
<script type="text/javascript">
    $(document).ready(function () {

        $('.blog-page .highlight-news-right .info-news h2').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });

        $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');

        $(".box-analaze-blog .analyze-form #gform_submit_button_12").val('ANALYZE FOR CHANCE OF SUCCESS');


        if ( $(window).width() > 768 ) {
            startCarousel();

        } else {
            $('.slider-news').addClass('off');
        }

    });

    $(window).resize(function() {
        if ( $(window).width() > 768 ) {
            startCarousel();
        } else {
            stopCarousel();
        }
    });

    function startCarousel() {
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
    }

    function stopCarousel() {
        var owl = $('.slider-news');
        owl.trigger('destroy.owl.carousel');
        owl.addClass('off');
    }
</script>
<?php
get_footer();
?>
