<?php get_header();?>
<main class="main-content home-page -two">

    <!--SECTION YOUR ORGANIZATION-->
    <?php $thrive_and_grow = get_field('thrive_and_grow', $post->ID);?>
    <div class="container section-organization">
        <div class="row">
            <div class="col-lg-12 box-head-organization">
                <h2 class="title-head-blue title-organization">
                    <?php echo $thrive_and_grow['title'];?>
                </h2>
                <p>
                    <?php echo $thrive_and_grow['description'];?>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="box-item-organization box-business">
                    <div class="item-organization item-small-business">
                        <img src="<?php echo $thrive_and_grow['icon_small_business'];?>" alt="">
                        <h3><?php echo $thrive_and_grow['title_small_business'];?></h3>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo $thrive_and_grow['url_learn_more'];?>" class="btn btn-blue-env">
                            <?php echo $thrive_and_grow['button_name_learn_more'];?>
                        </a>
                        <a href="<?php echo $thrive_and_grow['url_see_pricing'];?>" class="btn btn-blue-env">
                            <?php echo $thrive_and_grow['button_name_see_pricing'];?>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="box-item-organization box-startups">
                    <div class="item-organization item-enterprises">
                        <img src="<?php echo $thrive_and_grow['icon_emterprise'];?>" alt="">
                        <h3><?php echo $thrive_and_grow['title_enterprises'];?></h3>
                    </div>
                    <a href="<?php echo $thrive_and_grow['url_verified_team'];?>" class="btn btn-blue-env">
                        <?php echo $thrive_and_grow['button_name_verified_team'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--END SECTION YOUR ORGANIZATION-->

    <!-- /*============BLOG HOME=================*/ -->
    <?php
    $args = array(
        'posts_per_page' => 1,
        'offset'=> 0,
        'post_type' => 'post',
        'orderby' => 'post_modified',
        'order' =>'desc',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'post_show',
                'value' => 'home-article',
                'compare' => 'LIKE',
            )
        )
    );
    $news_main = get_posts( $args );
    ?>
    <div id="blog-figurative" class="container background-gray-mobile section-blog">
        <div class="content-blog define-headline">
            <div class="row">
                <div class="col-12 box-head-blog">
                    <h2 class="title-head-blue underline-head"><span>FEATURED INSIGHTS</span></h2>
                    <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 col-px-0">
                    <div class="item-special">
                        <div class="row">

                            <div class="col-lg-7 img-special ">
                                <a href="<?php echo get_the_permalink($news_main[0]->ID);?>">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_main[0]->ID);?>" class="job-openings">
                                </a>
                            </div>
                            <div class="col-lg-5 d-flex info-special flex-column align-items-start">
                                <div class="box-info">
                                    <a href="<?php echo home_url('category/').get_the_category($news_main[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_main[0]->ID)[0]->cat_name;?></a>

                                    <a href="<?php echo get_the_permalink($news_main[0]->ID);?>">
                                        <h3 class="title-special"><?php echo $news_main[0]->post_title;?></h3>
                                    </a>

                                    <div class="excerpt">
                                        <p>
                                            <?php echo $news_main[0]->post_excerpt;?>
                                        </p>
                                        <a href="<?php echo get_the_permalink($news_main[0]->ID);?>" class="read-more">Read more</a>
                                    </div>
                                </div>

                                <div class="box-author mt-auto">
                                    <?php
                                    if (get_field('avatar', 'user_'.$news_main[0]->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$news_main[0]->post_author, 'thumbnail');
                                    }

                                    ?>
                                    <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                    <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_main[0]->post_author);?>" class="author-by">By <?php echo get_the_author_meta('display_name', $news_main[0]->post_author);?></a>
                                    <div class="date-by">on <?php echo get_the_date( 'F d, Y', $news_main[0]->ID );?></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 box-item-scroll">
                    <div class="owl-carousel owl-theme d-lg-flex d-flex flex-row slider-news">
                        <?php
                        $args = array(
                            'posts_per_page' => 6,
                            'offset'=> 0,
                            'post_type' => 'post',
                            'post__not_in' => array($news_main[0]->ID),
                            'orderby' => 'post_modified',
                            'order' =>'desc',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'post_show',
                                    'value' => 'home-featured-insights',
                                    'compare' => 'LIKE',
                                )
                            )
                        );
                        $news_special = get_posts( $args );
                        foreach($news_special as $k => $item):
                            if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                $avatar = ASSET_URL.'images/avatar-default.png';
                            }
                            else{
                                $avatar = get_field('avatar', 'user_'.$item->post_author);
                            }

                            ?>
                            <div class="box-item-special item">
                                <div class="item-blog">
                                    <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                    <div class="info">
                                        <div class="info-news">
                                            <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                            <a href="<?php echo get_the_permalink($item->ID);?>">
                                                <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                            </a>
                                        </div>
                                        <div class="info-author">
                                            <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                            <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                                By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                            </a>
                                            <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END BLOG HOME=================*/ -->

    <!-- /*============Small Business=================*/ -->
    <div id="section-small-business" class="container-fluild section-small-business bg-greenish-home blog-detail-page blog-page">
        <div class="container">
            <div class="row section-head-blog content-blog">
                <div class="col-12 box-head-blog">
                    <h2>Small Business</h2>
                </div>
                <div class="col-12 box-item-scroll">
                    <div class="row d-flex reset-row-wrap flex-row">
                        <?php
                        $args = array(
                            'posts_per_page' => 6,
                            'offset'=> 0,
                            'post_type' => 'post',
                            'category_name' => 'small-business',
                            'orderby' => 'post_modified',
                            'order' =>'desc'
                        );
                        $news_special = get_posts( $args );

                        foreach($news_special as $item):

                            if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                $avatar = ASSET_URL.'images/avatar-default.png';
                            }
                            else{
                                $avatar = get_field('avatar', 'user_'.$item->post_author);
                            }

                            ?>
                            <div class="col-lg-4 box-item-special item">
                                <div class="item-blog">
                                    <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                    <div class="info">
                                        <div class="info-news">
                                            <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                            <a href="<?php echo get_the_permalink($item->ID);?>">
                                                <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                            </a>
                                        </div>
                                        <div class="info-author">
                                            <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                            <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                                By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                            </a>
                                            <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        <?php endforeach;?>
                    </div>
                </div>

                <div class="col-lg-12 box-view-all text-right">
                    <a class="view-all" href="<?php echo home_url('category/small-business');?>">ALL SMALL BUSINESS <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>

                <div class="col-lg-8 box-product">
                    <h3>Explore products for SMBs</h3>
                    <div class="list-products">
                        <div class="item-product">
                            <a href="<?php echo home_url('plans-and-pricing');?>">High Growth</a>
                        </div>
                        <div class="item-product">
                            <a href="<?php echo home_url('plans-and-pricing');?>">Main-Street</a>
                        </div>
                        <div class="item-product">
                            <a href="<?php echo home_url('plans-and-pricing');?>">Growing Business</a>
                        </div>
                        <div class="item-product">
                            <a href="<?php echo home_url('plans-and-pricing');?>">Learn more product details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-advert">
                    <div class="box-subscriber-blog d-lg-block d-none">
                        <div class="box-border">
                            <div class="title-sub">
                                Join Over 1,000 of Other Small Business Owners in United States Who Receive Insights and Updates to Improve Your Online Presence.
                            </div>
                            <div id="subscribe-small-business" class="form-subscribe">
                                <?php
                                echo do_shortcode('[gravityform id=27 title=false description=false ajax=false]');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /*============END Small Business=================*/ -->

    <!-- /*============Meet the featured contributors=================*/ -->
    <div class="container section-featured-contributors">
        <div class="row">
            <div class="col-lg-12 box-header">
                <h2>Meet the featured contributors</h2>
            </div>
            <?php
            $param = array(
                'role__in'         => array('editor', 'former_staff_env')
            );
            $users = get_users($param);
            foreach ($users as $k =>  $user):
                if ($k == 3) break;
            ?>
            <div class="col-lg-4">
                <div class="item-author clearfix">
                    <img src="<?php echo get_field('avatar', 'user_'. $user->ID )['sizes']['medium'];?>" alt="" class="img-fluid avatar-author">
                    <h3><?php echo $user->display_name;?></h3>
                    <div class="position"><?php echo get_field('position', 'user_'. $user->ID );?></div>
                    <a href="<?php echo home_url('author/').$user->nickname;?>">About </a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <!-- /*============END Meet the featured contributors=================*/ -->

    <!-- /*============OUTSOURCING INSIGHTS HOME=================*/ -->
    <div id="section-outsourcing-insights" class="container section-outsourcing-insights artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">OUTSOURCING INSIGHTS</h3>
                <a class="view-all" href="<?php echo home_url('category/outsourcing-insights');?>">ALL OUTSOURCING INSIGHTS <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-8 pd-lr-0">
                <?php
                $args_recent = array(
                    'posts_per_page' => 4,
                    'post_type' => 'post',
                    'category_name' => 'outsourcing-insights',
                    'orderby' => 'id',
                    'order' =>'desc'
                );
                $the_query = new WP_Query( $args_recent );
                if ($the_query->have_posts()):
                    while( $the_query->have_posts() ) : $the_query->the_post();
                        get_template_part( 'template-parts/content', 'blog' );
                    endwhile;
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
            </div>
        </div>
    </div>
    <!-- /*============END OUTSOURCING INSIGHTS HOME=================*/ -->

    <!-- /*============KNOWLEDGE HOME=================*/ -->
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
    <div class="container-fluild bg-gray-home section-knowledge">
        <div class="container content-knowledge define-headline">
            <div class="row">
                <div class="col-12 box-head-blog">
                    <h2>KNOWLEDGE CENTER</h2>
                    <a class="view-all" href="<?php echo get_home_url();?>/knowledge-center">View all videos <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 video-play">
                    <div class="embed-video">
                        <?php echo get_field('embed', $video_main[0]->ID);?>
                    </div>
                    <a href="<?php echo get_permalink($video_main[0]->ID);?>">
                        <h3>
                            <?php echo $video_main[0]->post_title;?>
                        </h3>
                    </a>
                </div>
                <div class="col-lg-4 d-lg-block d-none">
                    <article class="list-item">
                        <div class="label-headline">LEARNING RESOURCES</div>
                        <div class="box-list-scroll mCustomScrollbar content-scroll" data-mcs-theme="dark">
                            <?php

                            $args = array(
                                'posts_per_page' => 10,
                                'offset'=> 0,
                                'post_type' => 'knowledge_center',
                                'post__not_in' => array($video_main[0]->ID),
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
                                $vimeo = get_post_meta($item->ID, 'embed', true);
                                ?>
                            <div class="item-detail clearfix">
                                <a href="<?php echo get_permalink($item->ID);?>">
                                    <img class="img-fluid" src="<?php echo grab_vimeo_thumbnail($vimeo);?>" alt="">
                                    <h5><?php echo $item->post_title;?></h5>
                                </a>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END KNOWLEDGE HOME=================*/ -->

    <!-- /*============REVIEW COMPANIES HOME=================*/ -->
    <?php $recommendation_platform = get_field('recommendation_platform', $post->ID);?>
    <div class="container section-companies-homepage">
        <!-- /*============COMPANY HOME=================*/ -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title-section-companies"><?php echo $recommendation_platform['title'];?></h2>
            </div>
            <div class="col-lg-7 d-lg-flex flex-column justify-content-center">
                <div class="excerpt-companies">
                    <?php echo $recommendation_platform['description'];?>
                </div>

            </div>
            <div class="col-lg-5 pd-lr-0">
                <?php
                $args_companies = array(
                    'posts_per_page' => 2,
                    'offset'=> 0,
                    'post_type' => 'companies',
                    'orderby' => 'post_modified',
                    'order' =>'desc',
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => 'homepage_location',
                            'value' => 'show-homepage',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $list_companies = get_posts( $args_companies );

                foreach ($list_companies as $item):
                    $star = get_field('rating_star', $item->ID);
                    $total_vote_star = $star['1_star'] + $star['2_stars'] + $star['3_stars'] + $star['4_stars'] + $star['5_stars'];
                    if ($total_vote_star == 0){
                        $average_rating = 0;
                    }else{
                        $average_rating = round(($star['1_star']*1 + $star['2_stars']*2 + $star['3_stars']*3 + $star['4_stars']*4 + $star['5_stars']*5)/$total_vote_star, 1);
                    }
                    ?>
                    <div class="box-item-company clearfix">
                        <div class="box-logo">
                            <a href="<?php echo home_url('companies/').$item->post_name;?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                            </a>
                        </div>
                        <div class="box-info">
                            <a href="<?php echo home_url('companies/').$item->post_name;?>">
                                <h2><?php echo $item->post_title;?></h2>
                            </a>
                            <ul class="list-industries list-inline">

                                <?php
                                $category_industries = get_the_terms( $item->ID, 'industries' );
                                if ($category_industries != ''):
                                    foreach ($category_industries as $industry):
                                        ?>
                                        <li class="item list-inline-item">
                                            <?php echo $industry->name;?>
                                        </li>
                                    <?php endforeach; endif;?>

                            </ul>

                            <div class="box-rating resize clearfix">
                                <div class="rate">
                                    <input class="nohover" type="radio" id="star5<?php echo $item->ID;?>" name="rate<?php echo $item->ID;?>" value="5" disabled <?php echo (round($average_rating)==5) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star5<?php echo $item->ID;?>" title="5 stars">5 stars</label>
                                    <input class="nohover" type="radio" id="star4<?php echo $item->ID;?>" name="rate<?php echo $item->ID;?>" value="4" disabled <?php echo (round($average_rating)==4) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star4<?php echo $item->ID;?>" title="4 star">4 stars</label>
                                    <input class="nohover" type="radio" id="star3<?php echo $item->ID;?>" name="rate<?php echo $item->ID;?>" value="3" disabled <?php echo (round($average_rating)==3) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star3<?php echo $item->ID;?>" title="3 stars">3 stars</label>
                                    <input class="nohover" type="radio" id="star2<?php echo $item->ID;?>" name="rate<?php echo $item->ID;?>" value="2" disabled <?php echo (round($average_rating)==2) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star2<?php echo $item->ID;?>" title="2 stars">2 stars</label>
                                    <input class="nohover" type="radio" id="star1<?php echo $item->ID;?>" name="rate<?php echo $item->ID;?>" value="1" disabled <?php echo (round($average_rating)==1) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star1<?php echo $item->ID;?>" title="1 star">1 star</label>
                                </div>
                            </div>


                            <div class="description-rating">
                                <p>(Average rating <?php echo $average_rating;?>. Vote count: <?php echo $total_vote_star;?>)</p>
                            </div>

                        </div>
                    </div>

                <?php endforeach;?>
            </div>

            <div class="col-lg-12 content-connect">
                <div class="subtitle-companies">
                    <?php echo $recommendation_platform['subtitle'];?>
                </div>
                <a href="<?php echo $recommendation_platform['button_url'];?>" class="btn btn-green-env">
                    <?php echo $recommendation_platform['button_name'];?>
                </a>
            </div>
        </div>
        <!-- /*============END COMPANY HOME=================*/ -->
    </div>
    <!-- /*============END REVIEW COMPANIES HOME=================*/ -->

    <!-- /*============Healthcare=================*/ -->
    <div id="section-healthcare" class="container section-healthcare artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Healthcare</h3>
                <a class="view-all" href="<?php echo home_url('category/healthcare');?>">All Healthcare <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row content-blog">
            <div class="col-12 box-item-scroll">
                <div class="row d-flex reset-row-wrap flex-row">
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'offset'=> 0,
                        'post_type' => 'post',
                        'category_name' => 'healthcare',
                        'orderby' => 'post_modified',
                        'order' =>'desc'
                    );
                    $news_special = get_posts( $args );

                    foreach($news_special as $item):

                        if (get_field('avatar', 'user_'.$item->post_author)== ''){
                            $avatar = ASSET_URL.'images/avatar-default.png';
                        }
                        else{
                            $avatar = get_field('avatar', 'user_'.$item->post_author);
                        }

                        ?>
                        <div class="col-lg-4 box-item-special item">
                            <div class="item-blog">
                                <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                <div class="info">
                                    <div class="info-news">
                                        <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                        <a href="<?php echo get_the_permalink($item->ID);?>">
                                            <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                        </a>
                                    </div>
                                    <div class="info-author">
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                            By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                        </a>
                                        <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END Healthcare=================*/ -->

    <!-- /*============Ecommerce & Retail=================*/ -->
    <div id="section-ecommerce-and-retail"  class="container-fluild bg-gray-home" >
        <div class="container section-ecommerce-and-retail artical-page blog-page blog-detail-page">
            <div class="row define-headline">
                <div class="col-12 box-head-blog">
                    <h3 class="title-head-blue have-border">Ecommerce & Retail</h3>
                    <a class="view-all" href="<?php echo home_url('category/ecommerce-and-retail');?>">All Ecommerce & Retail <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row content-blog">
                <div class="col-12 box-item-scroll">
                    <div class="row d-flex reset-row-wrap flex-row">
                        <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'offset'=> 0,
                            'post_type' => 'post',
                            'category_name' => 'ecommerce-and-retail',
                            'orderby' => 'post_modified',
                            'order' =>'desc'
                        );
                        $news_special = get_posts( $args );

                        foreach($news_special as $item):

                            if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                $avatar = ASSET_URL.'images/avatar-default.png';
                            }
                            else{
                                $avatar = get_field('avatar', 'user_'.$item->post_author);
                            }

                            ?>
                            <div class="col-lg-4 box-item-special item">
                                <div class="item-blog">
                                    <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                    <div class="info">
                                        <div class="info-news">
                                            <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                            <a href="<?php echo get_the_permalink($item->ID);?>">
                                                <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                            </a>
                                        </div>
                                        <div class="info-author">
                                            <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                            <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                                By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                            </a>
                                            <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END Ecommerce & Retail=================*/ -->

    <!-- /*============FORM executive insights=================*/ -->
    <div class="container section-get-executive-insights">
        <div class="row">
            <div class="col-lg-12 box-executive">
                <div class="title-executive">
                    Get executive insights to take your organanization to the next level with our resources
                </div>
                <div class="subscribe-form text-right">
                    <?php
                    echo do_shortcode('[gravityform id="3" title="false" description="false"]');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END FORM executive insights=================*/ -->

    <!-- /*============Real Estate & Property=================*/ -->
    <div id="section-real-estate" class="container section-real-estate artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Real Estate & Property</h3>
                <a class="view-all" href="<?php echo home_url('category/real-estate-and-property');?>">All Real Estate & Property <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row content-blog">
            <div class="col-12 box-item-scroll">
                <div class="row d-flex reset-row-wrap flex-row">
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'offset'=> 0,
                        'post_type' => 'post',
                        'category_name' => 'real-estate-and-property',
                        'orderby' => 'post_modified',
                        'order' =>'desc'
                    );
                    $news_special = get_posts( $args );

                    foreach($news_special as $item):

                        if (get_field('avatar', 'user_'.$item->post_author)== ''){
                            $avatar = ASSET_URL.'images/avatar-default.png';
                        }
                        else{
                            $avatar = get_field('avatar', 'user_'.$item->post_author);
                        }

                        ?>
                        <div class="col-lg-4 box-item-special item">
                            <div class="item-blog">
                                <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                <div class="info">
                                    <div class="info-news">
                                        <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                        <a href="<?php echo get_the_permalink($item->ID);?>">
                                            <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                        </a>
                                    </div>
                                    <div class="info-author">
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                            By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                        </a>
                                        <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END Real Estate & Property=================*/ -->

    <!-- /*============EVENTS HOME=================*/ -->
    <?php
    $date_now = date('Y-m-d');
    $args_event = array(
        'posts_per_page' => 3,
        'post_type' => 'events',
        'meta_query'	=> array(
            'relation' 			=> 'AND',
            array(
                'key'			=> 'date',
                'compare'		=> '>=',
                'value'			=> $date_now,
                'type'			=> 'DATETIME'
            )
        ),
        'orderby'	=> 'meta_value',
        'order'     => 'asc'
    );
    $event_all = get_posts( $args_event );
    ?>
    <div class="container content-envent define-headline">
        <div class="row">
            <div class="col-lg-8 box-head-blog">
                <h2 class="title-head-blue underline-head"><span>EVENTS</span></h2>
                <a class="view-all" href="<?php echo get_home_url();?>/events">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                <?php foreach ($event_all as $item):?>
                    <div class="box-item-event clearfix">
                        <div class="box-date"><?php echo get_field('date',$item->ID);?></div>
                        <div class="box-info">
                            <a href="<?php echo get_permalink($item->ID);?>"><h2><?php echo $item->post_title;?></h2></a>
                            <div class="location-1"><?php echo get_field('location', $item->ID);?></div>
                            <div class="location"><i class="icon-location"></i><?php echo get_field('address', $item->ID);?></div>
                        </div>
                    </div>
                <?php endforeach;?>

            </div>
            <div class="col-lg-4 box-head-blog d-lg-block d-none">
                <h2 class="title-head-blue text-inherit tweet-env">
                    Tweets <span class="by">by</span> <a target="_blank" href="https://twitter.com/envzone">@EnvZone</a>
                </h2>
                <a class="twitter-timeline" data-chrome="noheader nofooter noborders"  data-lang="en" data-height="calc(100% - 88px)" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/envzone?ref_src=twsrc%5Etfw">Tweets by envzone</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
    <!-- /*============END EVENTS HOME=================*/ -->

    <!-- /*============Hospitality and Travel=================*/ -->
    <div id="section-hospitality-travel" class="container section-hospitality-travel artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Hospitality and Travel</h3>
                <a class="view-all" href="<?php echo home_url('category/hospitality-and-travel');?>">All Hospitality and Travel <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row content-blog">
            <div class="col-12 box-item-scroll">
                <div class="row d-flex reset-row-wrap flex-row">
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'offset'=> 0,
                        'post_type' => 'post',
                        'category_name' => 'hospitality-and-travel',
                        'orderby' => 'post_modified',
                        'order' =>'desc'
                    );
                    $news_special = get_posts( $args );

                    foreach($news_special as $item):

                        if (get_field('avatar', 'user_'.$item->post_author)== ''){
                            $avatar = ASSET_URL.'images/avatar-default.png';
                        }
                        else{
                            $avatar = get_field('avatar', 'user_'.$item->post_author);
                        }

                        ?>
                        <div class="col-lg-4 box-item-special item">
                            <div class="item-blog">
                                <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                <div class="info">
                                    <div class="info-news">
                                        <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                        <a href="<?php echo get_the_permalink($item->ID);?>">
                                            <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                        </a>
                                    </div>
                                    <div class="info-author">
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                            By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                        </a>
                                        <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END Hospitality and Travel=================*/ -->

    <!-- /*============Resources=================*/ -->
    <div class="container-fluild section-resources-home bg-greenish-home blog-detail-page blog-page resources-ebook-page">
        <div class="container">
            <div class="row define-headline">
                <div class="col-12 box-head-blog">
                    <h3 class="title-head-blue have-border">Resources</h3>
                    <a class="view-all" href="<?php echo home_url('category/hospitality-and-travel');?>">All Resources <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'offset'=> 0,
                    'post_type' => 'resources',
                    'orderby' => 'ID',
                    'order' =>'desc'
                );
                $ebook_resources = get_posts( $args );

                foreach($ebook_resources as $item):
                ?>
                <div class="col-lg-4">
                    <article class="box-ebook">
                        <img class="img-fluid cover-ebook" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                        <h2>
                            <?php echo $item->post_title;?>
                        </h2>
                        <a href="<?php echo get_permalink($item->ID);?>" class="btn-download-ebook btn btn-blue-env">DOWNLOAD</a>
                        <div class="box-category">
                            <a href="<?php echo wp_get_post_terms( $item->ID, 'resources_cat')[0]->slug;?>"><?php echo wp_get_post_terms( $item->ID, 'resources_cat')[0]->name?></a>
                        </div>
                    </article>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- /*============END Resources=================*/ -->

    <!-- /*============Financial Services=================*/ -->
    <div id="section-financial-services" class="container section-financial-services artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Financial Services</h3>
                <a class="view-all" href="<?php echo home_url('category/financial-services');?>">All Financial Services <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row content-blog">
            <div class="col-12 box-item-scroll">
                <div class="row d-flex reset-row-wrap flex-row">
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'offset'=> 0,
                        'post_type' => 'post',
                        'category_name' => 'financial-services',
                        'orderby' => 'post_modified',
                        'order' =>'desc'
                    );
                    $news_special = get_posts( $args );

                    foreach($news_special as $item):

                        if (get_field('avatar', 'user_'.$item->post_author)== ''){
                            $avatar = ASSET_URL.'images/avatar-default.png';
                        }
                        else{
                            $avatar = get_field('avatar', 'user_'.$item->post_author);
                        }

                        ?>
                        <div class="col-lg-4 box-item-special item">
                            <div class="item-blog">
                                <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                <div class="info">
                                    <div class="info-news">
                                        <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                        <a href="<?php echo get_the_permalink($item->ID);?>">
                                            <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                        </a>
                                    </div>
                                    <div class="info-author">
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                            By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                        </a>
                                        <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END Financial Services=================*/ -->

    <!-- /*============STUDIO HOME=================*/ -->
    <?php
    $args = array(
        'posts_per_page' => 5,
        'offset'=> 0,
        'post_type' => 'studio_gallery',
        'orderby' => 'id',
        'order' =>'desc'
    );
    $photo_studio = get_posts( $args );
    ?>
    <div class="container-fluild bg-gray-home section-studio">
        <div class="container content-studio define-headline">
            <div class="row">
                <div class="col-12 box-head-blog">
                    <h2>ENVZONE <b>STUDIO</b></h2>
                    <a class="view-all" href="<?php echo home_url('studio');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="item-studio">
                        <a href="<?php echo get_permalink($photo_studio[0]->ID); ?>">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($photo_studio[0]->ID); ?>" align="">
                        <h5 class="large-item"><?php echo $photo_studio[0]->post_title; ?></h5>
                            <i class="icon-photo-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <?php
                            foreach ($photo_studio as $k=>$item):
                            if ($k==0) continue;
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 col-mbx-100">
                            <div class="item-studio">
                                <a href="<?php echo get_permalink($item->ID);?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" align="">
                                <h5><?php echo $item->post_title;?></h5>
                                    <i class="icon-photo-play small"></i>
                                </a>
                            </div>
                        </div>

                        <?php endforeach;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END STUDIO HOME=================*/ -->

    <!-- /*============Logistics and Supply Chain=================*/ -->
    <div id="section-logistics-and-supply-chain" class="container section-logistics-and-supply-chain artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Logistics and Supply Chain</h3>
                <a class="view-all" href="<?php echo home_url('category/logistics-and-supply-chain');?>">All Logistics and Supply Chain <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row content-blog">
            <div class="col-12 box-item-scroll">
                <div class="row d-flex reset-row-wrap flex-row">
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'offset'=> 0,
                        'post_type' => 'post',
                        'orderby' => 'post_modified',
                        'order' =>'desc'
                    );
                    $news_special = get_posts( $args );

                    foreach($news_special as $item):

                        if (get_field('avatar', 'user_'.$item->post_author)== ''){
                            $avatar = ASSET_URL.'images/avatar-default.png';
                        }
                        else{
                            $avatar = get_field('avatar', 'user_'.$item->post_author);
                        }

                        ?>
                        <div class="col-lg-4 box-item-special item">
                            <div class="item-blog">
                                <a href="<?php echo get_the_permalink($item->ID);?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings"></a>
                                <div class="info">
                                    <div class="info-news">
                                        <a href="<?php echo home_url('category/').get_the_category($item->ID)[0]->slug;?>" class="category"><?php echo get_the_category($item->ID)[0]->cat_name;?></a>
                                        <a href="<?php echo get_the_permalink($item->ID);?>">
                                            <h4 class="title-list-special"><?php echo $item->post_title;?></h4>
                                        </a>
                                    </div>
                                    <div class="info-author">
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
                                        <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $item->post_author);?>" class="author-by">
                                            By <b><?php echo get_the_author_meta('display_name', $item->post_author);?></b>
                                        </a>
                                        <div class="date-by">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END Logistics and Supply Chain=================*/ -->
</main>
<script>

    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {

            $('.content-blog .box-item-special .item-blog h4').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });

    })(jQuery);
    /*============ slide news =================*/

    $(document).ready(function() {

        $(".box-subscriber-blog #subscribe-small-business .gform_button").val('SUBSCRIBE NOW');
        $(".section-get-executive-insights .gform_button").val('SUBSCRIBE');

        $('.list-video').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            autoplay: false,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 4
                }
            }
        });


        if ( $(window).width() > 768 ) {
            startCarousel();

        } else {
            $('.slider-news').addClass('off');
        }
    });

    /*============ custom scroll =================*/


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
<?php get_footer();?>
