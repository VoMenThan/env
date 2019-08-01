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
                <div class="col-lg-12 mt-lg-5 mt-3">
                    <a href="<?php echo home_url('blog');?>" class="btn btn-blue-env w-100 d-lg-none d-block">VIEW ALL ARTICLES</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END BLOG HOME=================*/ -->

    <!-- /*============Small Business=================*/ -->
    <div class="container-fluild bg-greenish-home section-small-business artical-page blog-page blog-detail-page">
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

                <div class="col-lg-12">
                    <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>

                <div class="col-lg-8">
                    <h3>Explore products for SMBs</h3>
                    <div class="list-products">
                        <div class="item-product">
                            <a href="">High Growth</a>
                        </div>
                        <div class="item-product">
                            <a href="">Main-Street</a>
                        </div>
                        <div class="item-product">
                            <a href="">Growing Business</a>
                        </div>
                        <div class="item-product">
                            <a href="">Learn more product details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-advert">
                    <div class="box-subscriber-blog d-lg-block d-none">
                        <div class="box-border">
                            <div class="title-sub">
                                Join Over 1,000 of Other Small Business Owners in United States Who Receive Insights and Updates to Improve Your Online Presence.
                            </div>
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
    </div>
    <!-- /*============END Small Business=================*/ -->

    <!-- /*============Meet the featured contributors=================*/ -->
    <div class="container section-featured-contributors">
        <div class="row">
            <div class="col-lg-12">
                <h2>Meet the featured contributors</h2>
            </div>
            <div class="col-lg-4">
                <div class="item-author">
                    <img src="http://localhost/envzone/wp-content/uploads/2019/05/Anna-Gravatar-150x150.jpg" alt="" class="img-fluid avatar-author">
                    <h3>Alina Vo</h3>
                    <div class="position">Influencer Marketing Opeartions</div>
                    <a href="">About </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item-author">
                    <img src="http://localhost/envzone/wp-content/uploads/2019/05/Anna-Gravatar-150x150.jpg" alt="" class="img-fluid avatar-author">
                    <h3>Alina Vo</h3>
                    <div class="position">Influencer Marketing Opeartions</div>
                    <a href="">About </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item-author">
                    <img src="http://localhost/envzone/wp-content/uploads/2019/05/Anna-Gravatar-150x150.jpg" alt="" class="img-fluid avatar-author">
                    <h3>Alina Vo</h3>
                    <div class="position">Influencer Marketing Opeartions</div>
                    <a href="">About </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END Meet the featured contributors=================*/ -->

    <!-- /*============OUTSOURCING INSIGHTS HOME=================*/ -->
    <div class="container section-outsourcing-insights artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">RECENT ARTICLES</h3>
                <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-8 pd-lr-0">
                <?php
                $args_recent = array(
                    'posts_per_page' => 4,
                    'post_type' => 'post',
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
    <div class="container section-small-business artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">RECENT ARTICLES</h3>
                <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
    <!-- /*============END Healthcare=================*/ -->

    <!-- /*============Ecommerce & Retail=================*/ -->
    <div class="container-fluild bg-gray-home">
        <div class="container section-small-business artical-page blog-page blog-detail-page">
            <div class="row define-headline">
                <div class="col-12 box-head-blog">
                    <h3 class="title-head-blue have-border">Ecommerce & Retail</h3>
                    <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
    </div>
    <!-- /*============END Ecommerce & Retail=================*/ -->

    <!-- /*============Real Estate & Property=================*/ -->
    <div class="container section-small-business artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Real Estate & Property</h3>
                <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
    <div class="container section-small-business artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Hospitality and Travel</h3>
                <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
    <!-- /*============END Hospitality and Travel=================*/ -->

    <!-- /*============Financial Services=================*/ -->
    <div class="container section-small-business artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Financial Services</h3>
                <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
    <div class="container section-small-business artical-page blog-page blog-detail-page">
        <div class="row define-headline">
            <div class="col-12 box-head-blog">
                <h3 class="title-head-blue have-border">Logistics and Supply Chain</h3>
                <a class="view-all" href="<?php echo home_url('blog');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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

    <!-- Modal -->
    <div class="modal fade book-advert box-subscribe" id="modal-advert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 1.5L13.5 0L7.5 6L1.5 0L0 1.5L6 7.5L0 13.5L1.5 15L7.5 9L13.5 15L15 13.5L9 7.5L15 1.5Z" fill="#0D3153"/>
                        </svg>
                    </button>
                    <div class="title-subscriber">
                        SUBSCRIBE TO:
                    </div>
                    <h3>
                        EXECUTIVE INSIGHTS
                    </h3>
                    <div class="info-subscriber clearfix">
                        <div class="description">
                            Join over 5,000 of your peers who recieve the most valuable industry updates business leaders, CEOs, CTOs, COOs, need to know, operation, development hacking and tactics to get a head of the competition.
                        </div>
                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                            ?>
                        </div>

                        <div class="tip">
                            ENVZONE will use the information you provide to send you insights, development hacking tips. You may unsubscribe from these communications at any time. For more information, check out our Privacy Policy.
                        </div>

                    </div>

                    <div class="text-center">
                        <div class="note">No thanks, I don’t want insights to reduce costs of business.</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

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

        $('.slider-home').owlCarousel({
            animateOut: 'slideOutRight',
            animateIn: 'slideInLeft',
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            lazyLoad:true,
            autoplay: true,
            autoplayTimeout: 8000,
            smartSpeed:450,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1,
                    dots: false
                },
                768: {
                    items: 1,
                    dots: false
                },
                1024: {
                    items: 1
                }
            }
        });

        $('.slider-partners').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 4
                }
            }
        });


        $('.box-industries').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            autoplay: false,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 4
                }
            }
        });

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
