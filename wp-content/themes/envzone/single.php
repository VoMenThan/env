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
                        <a href="<?php echo get_home_url().'/category/'.get_the_category($post->ID)[0]->slug;?>" class="current-category"><?php echo get_the_category($post->ID)[0]->name;?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-lg-block d-none">
            <div class="row">
                <div class="col-12 mb-lg-5">
                    <div class="box-breadcrumb no-print">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>/blog">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container <?php if(get_field('theme_custom', $post->ID) == 'review_company_blog') {echo 'layout-none-sidebar';}?>">

            <div class="row mb-lg-5 justify-content-center">
                <figure class="wp-block-image mb-lg-5 mb-3 w-100 d-lg-none d-block">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" class="img-fluid w-100" alt="">
                    <figcaption>
                        <?php if ( the_post_thumbnail_caption($post->ID) != ''):
                            the_post_thumbnail_caption($post->ID);
                        endif;?>
                    </figcaption>
                </figure>
                <div class="col-12 mb-lg-3">
                    <h1>
                        <?php echo $post->post_title;?>
                    </h1>
                </div>
                <div class="col-lg-8">
                    <article class="content-blog">
                        <div class="excerpt-news">
                            <?php echo $post->post_excerpt;?>
                        </div>
                        <div class="audit">
                            <span>By </span>
                            <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>"> <?php echo get_the_author_meta('display_name', $post->post_author);?></a> <span>| <?php echo get_field('staff', 'user_'.$post->post_author);?></span>
                            <div class="date">on <?php echo get_the_date( 'F d, Y', $post->ID );?> | <?php echo get_field('estimate_reading', $post->ID);?> min read</div>
                        </div>

                        <div class="box-share no-print d-lg-block d-none">
                            <ul class="nav list-social d-flex justify-content-end">
                                <li class="nav-item">
                                    SHARE THIS ARTICLE:
                                </li>
                                <li class="nav-item">
                                    <a class="link-twitter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title().' '.get_permalink();?>', '_blank', 'width = 700, height = 500')">
                                        <svg width="35" height="35" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M45 0H5C2.25 0 0 2.25 0 5V45C0 47.75 2.25 50 5 50H45C47.75 50 50 47.75 50 45V5C50 2.25 47.75 0 45 0ZM39.25 18.25C39 29.75 31.75 37.75 20.75 38.25C16.25 38.5 13 37 10 35.25C13.25 35.7501 17.5 34.5001 19.75 32.5C16.5 32.25 14.5 30.5 13.5 27.75C14.5 28 15.5 27.75 16.25 27.75C13.25 26.75 11.25 25 11 21C11.75 21.5 12.75 21.75 13.75 21.75C11.5 20.5 10 15.75 11.75 12.75C15 16.25 19 19.25 25.5 19.75C23.75 12.75 33.2501 9 37.0001 13.75C38.7501 13.5 40.0001 12.75 41.2501 12.25C40.7501 14 39.7501 15 38.5001 16C39.7501 15.75 41.0001 15.5 42.0001 15C41.75 16.25 40.5 17.25 39.25 18.25Z" fill="#8DC63F"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>', '_blank', 'width = 700, height = 500')" >
                                        <svg width="35" height="35" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M50 8.33389C50 3.955 46.0467 0 41.6667 0H8.33333C3.95333 0 0 3.955 0 8.33389V41.6661C0 46.045 3.95333 50 8.33389 50H25V31.1111H18.8889V22.7778H25V19.5311C25 13.9317 29.2044 8.88889 34.375 8.88889H41.1111V17.2222H34.375C33.6378 17.2222 32.7778 18.1172 32.7778 19.4578V22.7778H41.1111V31.1111H32.7778V50H41.6667C46.0467 50 50 46.045 50 41.6661V8.33389Z" fill="#8DC63F"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="50" height="50" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-linkedin" onclick="window.open('https://www.linkedin.com/shareArticle?url=<?php echo get_permalink();?>', '_blank', 'width = 700, height = 500')" >
                                        <svg width="35" height="35" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M42.6758 0H7.32422C3.28598 0 0 3.28598 0 7.32422V42.6758C0 46.714 3.28598 50 7.32422 50H42.6758C46.714 50 50 46.714 50 42.6758V7.32422C50 3.28598 46.714 0 42.6758 0ZM17.6758 39.6484H11.8164V19.1406H17.6758V39.6484ZM17.6758 16.2109H11.8164V10.3516H17.6758V16.2109ZM38.1836 39.6484H32.3242V27.9297C32.3242 26.3145 31.0097 25 29.3945 25C27.7794 25 26.4648 26.3145 26.4648 27.9297V39.6484H20.6055V19.1406H26.4648V20.245C27.9999 19.7678 28.997 19.1406 30.8594 19.1406C34.8331 19.1448 38.1836 22.7097 38.1836 26.9226V39.6484Z" fill="#8DC63F"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-print" href="javascript:window.print()">
                                        <svg width="35" height="35" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M11.2502 2.81262H33.75V8.43757H36.5627V2.81262C36.5627 1.26084 35.3049 0 33.75 0H11.2502C9.69856 0 8.43762 1.26084 8.43762 2.81262V8.43757H11.2502V2.81262Z" fill="#8DC63F"/>
                                                <path d="M42.1879 11.2501H2.81274C1.26106 11.2501 0.00012207 12.5106 0.00012207 14.0624V28.125C0.00012207 29.6797 1.26096 30.9376 2.81274 30.9376H8.43769V42.1875C8.43769 43.7422 9.69853 45 11.2503 45H33.7501C35.305 45 36.5627 43.7422 36.5627 42.1875V30.9376H42.1879C43.7422 30.9376 45 29.6797 45 28.125V14.0624C45 12.5106 43.7421 11.2501 42.1879 11.2501ZM33.75 42.1875H11.2502V22.5H33.75V42.1875ZM39.3752 19.6877C37.8204 19.6877 36.5626 18.4297 36.5626 16.875C36.5626 15.3234 37.8204 14.0624 39.3752 14.0624C40.93 14.0624 42.1878 15.3233 42.1878 16.875C42.1879 18.4296 40.93 19.6877 39.3752 19.6877Z" fill="#8DC63F"/>
                                                <path d="M25.3127 25.3123H14.0626V28.1249H25.3127V25.3123Z" fill="#8DC63F"/>
                                                <path d="M30.9379 30.9376H14.0626V33.7496H30.9379V30.9376Z" fill="#8DC63F"/>
                                                <path d="M30.9379 36.5627H14.0626V39.3749H30.9379V36.5627Z" fill="#8DC63F"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="45.0001" height="45" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="main-content">
                            <figure class="wp-block-image d-none d-lg-block mb-lg-5 mb-3 w-100">
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" class="img-fluid w-100" alt="">
                                <figcaption>
                                    <?php if ( the_post_thumbnail_caption($post->ID) != ''):
                                         the_post_thumbnail_caption($post->ID);
                                    endif;?>
                                </figcaption>
                            </figure>


                            <?php
                                echo $post->post_content;
                                // If comments are open or we have at least one comment, load up the comment template.
                            ?>
                            <div class="box-info-footer">
                                <div class="box-tag">
                                    TAGS:
                                    <?php
                                    if (get_the_tags() != ''):
                                    foreach (get_the_tags() as $tag):?>
                                    <a href="<?php echo home_url('tag/'.$tag->slug);?>"><?php echo $tag->name;?></a>
                                    <?php endforeach; else: echo 'No- tags!'; endif;?>
                                </div>
                                <div class="box-author-blog">

                                    <?php
                                        if (get_field('avatar', 'user_'.$post->post_author)== ''){
                                            $avatar = ASSET_URL.'images/avatar-default.png';
                                        }
                                        else{
                                            $avatar = get_field('avatar', 'user_'.$post->post_author);
                                        }

                                        ?>
                                    <div class="box-info-author-footer float-left float-lg-none">
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" class="img-fluid avatar-icon mb-3" alt="">
                                    </div>
                                    <div class="box-info">
                                        <a href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>" class="author-name"><?php echo get_the_author_meta('display_name');?></a>
                                        <div class="author-bio">
                                            <?php echo wp_trim_words(get_the_author_meta( 'description' ), 40);?>
                                        </div>
                                        <div class="connect-author no-print d-none d-lg-block">
                                            <a href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>">About</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="no-print">
                                <?php
                                    if ( comments_open() || get_comments_number() ) {
                                        comments_template();
                                    }
                                ?>
                            </div>

                        </div>
                    </article>


                    <?php

                        $args_cpn = array(
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'post_type' => 'companies',
                            'meta_query' => array(
                                'relation'      => 'AND',
                                array(
                                    'key' => 'article_for_company',
                                    'value' => $post->ID,
                                    'compare' => 'LIKE'
                                )
                            )
                        );
                        $get_company = get_posts($args_cpn);
                        if (count($get_company)>=1):
                    ?>
                    <div class="rate-blog section-companies-homepage">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="title-company">RATE THIS COMPANY</div>
                            </div>
                        </div>
                        <?php
                        foreach ($get_company as $item):
                        $star = get_field('rating_star', $item->ID);
                        $total_vote_star = $star['1_star'] + $star['2_stars'] + $star['3_stars'] + $star['4_stars'] + $star['5_stars'];
                        if ($total_vote_star == 0){
                            $average_rating = 0;
                        }else{
                            $average_rating = round(($star['1_star']*1 + $star['2_stars']*2 + $star['3_stars']*3 + $star['4_stars']*4 + $star['5_stars']*5)/$total_vote_star, 1);
                        }
                        ?>
                        <div class="row item-company">
                            <div class="col-lg-4 order-lg-0 order-1 justify-content-center align-items-center justify-content-center d-flex">
                                <a href="<?php echo home_url('companies/').$item->post_name;?>" class="btn btn-green-env">RATE NOW</a>
                            </div>
                            <div class="col-lg-8 order-lg-1 order-0">
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
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>

                <!-- /*============SUBCRIBE HOME=================*/ -->
                <div class="col-12 d-lg-none d-none">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-parallax no-print">
                                <div class="bg-green-home">
                                    <div class="content-subcribe">
                                        <div class="box-head-subcribe text-center">
                                            <h2>SUBSCRIBE FOR THREE THINGS</h2>
                                            <p>
                                                Three links or tips of interest curated about offshore outsourcing every
                                                week by the experts at ENVZONE Consulting.
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
                    </div>
                </div>
                <!-- /*============END SUBCRIBE HOME=================*/ -->

                <div class="col-lg-4 sidebar-advert no-print">

                    <?php if (get_the_category($post->ID)[0]->slug != 'small-business'):?>
                    <div class="box-analaze-blog d-lg-block d-none">
                        <div class="title-sub">
                            Find a Verified Team to Build Your Software
                        </div>
                        <p>
                            Hey, I’am <?php echo get_the_author_meta('display_name', $post->post_author);?>.
                            I am determined to make your business success in
                            <?php
                            $cat_name = get_the_category($post->ID)[0]->name;
                                    echo ($cat_name == 'News' or $cat_name == 'Team Activities'or $cat_name == 'Outsourcing Insights' or $cat_name == 'Uncategorized') ? 'your' : $cat_name;

                            ?>
                            industry.
                            My only question is, will it be yours?
                        </p>
                        <div class="analyze-form">
                            <?php
                            echo do_shortcode('[gravityform id=12 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                    <?php else:?>
                    <div class="box-analaze-blog d-lg-block d-none">
                            <div class="title-sub">
                                Get a Dedicated Online Presence Manager
                            </div>

                            <p>
                                Hey, I’am <?php echo get_the_author_meta('display_name', $post->post_author);?>. I love small business. My job is  to help small business owners overcome the challenges in this digital era.
                            </p>
                            <p>My only question is, will you let me?</p>
                            <div class="analyze-form">
                                <?php
                                echo do_shortcode('[gravityform id=26 title=false description=false ajax=false]');
                                ?>
                            </div>
                        </div>
                    <?php endif;?>

                    <?php if (get_the_category($post->ID)[0]->slug != 'small-business'):?>
                    <div class="box-free-ebook d-lg-block d-none">
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
                    <?php endif;?>

                    <?php if (get_the_category($post->ID)[0]->slug != 'small-business'):?>
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
                    <?php endif;?>

                    <div class="box-related-article no-print d-lg-block d-none">
                        <div class="title-article">
                            Latest from Experts

                        </div>
                        <?php

                            $post_isset = array();

                            $args = array(
                                'posts_per_page' => 5,
                                'offset'=> 0,
                                'post_type' => 'post',
                                'orderby' => 'id',
                                'order' =>'desc',
                                'post__not_in' => array($post->ID),
                                'meta_query' => array(
                                    'relation' => 'OR',
                                    array(
                                        'key' => 'post_show',
                                        'value' => 'lastest-from-experts',
                                        'compare' => 'LIKE',
                                    )
                                )
                            );
                            $news_relate = get_posts( $args );
                            ?>
                        <div class="item-special-relate clearfix">
                            <a href="<?php echo get_home_url().'/blog/'.$news_relate[0]->post_name;?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_relate[0]->ID);?>">
                            </a>
                            <a href="<?php echo get_home_url().'/blog/'.$news_relate[0]->post_name;?>">
                                <h2><?php echo $news_relate[0]->post_title;?></h2>
                            </a>
                            <div class="date">on <?php echo get_the_date( 'F d, Y', $news_relate[0]->ID );?></div>
                        </div>

                            <?php
                            foreach ($news_relate as $k => $item):
                                array_push($post_isset, $item->ID);

                                if ($k == 0) continue;
                        ?>
                        <div class="item-relate clearfix">
                            <a href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>">
                            </a>
                            <a href="<?php echo get_home_url().'/blog/'.$item->post_name;?>">
                                <h2><?php echo $item->post_title;?></h2>
                            </a>
                            <div class="date">on <?php echo get_the_date( 'F d, Y', $item->ID );?></div>

                        </div>
                        <?php endforeach;?>


                    </div>

                    <?php if (get_the_category($post->ID)[0]->slug == 'small-business'):?>
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
                    <?php endif;?>

                    <?php if (get_the_category($post->ID)[0]->slug == 'small-business'):?>
                        <div class="box-advert">
                            <p>
                                <span class="fz-big-green">90%</span>
                                of small businesses fail to build online presence due to the lack of diverse support from in-house resources.
                            </p>
                            <div class="sub-title">
                                Do Not Get Struggled!
                            </div>
                            <a href="<?php echo home_url("plans-and-pricing");?>" class="btn btn-green-env">
                                GET A DEDICATED SITE MANAGER
                            </a>
                        </div>
                    <?php else:?>
                        <div class="box-advert">
                            <p>
                                <span class="fz-big-green">80%</span>
                                of outsourcing relationships fail due to responsiveness & communication factors
                            </p>
                            <div class="sub-title">
                                Do Not Let Your Projects Go South!
                            </div>
                            <a href="<?php echo home_url("process-framework");?>" class="btn btn-green-env">
                                SEE OUR UNIQUE APPROACH FOR SUCCESS
                            </a>
                        </div>
                    <?php endif;?>

                    <div class="list-archived-events">
                        <div class="title">ARCHIVES</div>
                        <ul class="box-year">
                            <li class="year">2019</li>
                        </ul>
                        <ul class="list-month">
                            <li class="month">
                                <a href="<?php echo home_url('archived-articles').'?date=2019-03'?>">Mar</a>
                            </li>
                            <li class="month">
                                <a href="<?php echo home_url('archived-articles').'?date=2019-04'?>">Apr</a>
                            </li>
                            <li class="month">
                                <a href="<?php echo home_url('archived-articles').'?date=2019-05'?>">May</a>
                            </li>
                            <li class="month">
                                <a href="<?php echo home_url('archived-articles').'?date=2019-06'?>">Jun</a>
                            </li>
                            <li class="month">
                                <a href="<?php echo home_url('archived-articles').'?date=2019-07'?>">Jul</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
        <!-- /*============SUBCRIBE HOME=================*/ -->
        <div class="container-fluild section-parallax no-print">
            <div class="bg-green-home">
                <div class="container content-subcribe">
                    <div class="row">
                        <div class="col-12 box-head-subcribe text-center">
                            <?php if (get_the_category($post->ID)[0]->slug == 'small-business'):?>
                                <h2>SUBSCRIBE FOR THREE TIPS</h2>
                                <p>
                                    Three tips or links to improve small business presence every week. <br>
                                    P.S.: This is your “University” to solve small business challenges.
                                </p>
                                <div class="form-subscribe">
                                    <?php
                                        echo do_shortcode('[gravityform id=27 title=false description=false ajax=false]');
                                    ?>
                                </div>
                            <?php else:?>
                                <h2>SUBSCRIBE FOR THREE THINGS</h2>
                                <p>
                                    Three links or tips of interest curated about offshore outsourcing every week by the experts at ENVZONE Consulting.
                                </p>
                                <div class="form-subscribe">
                                    <?php
                                    echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                                    ?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->

        <div class="container">
            <div class="row section-trending no-print">
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

    <?php
        if (get_the_category($post->ID)[0]->slug == 'small-business'){
            require_once "inc/popup-small-business.php";
        }else{
            require_once "inc/popup-discovery.php";
        }
    ?>

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

        $(".box-subscriber-blog #subscribe-small-business .gform_button").val('SUBSCRIBE NOW');

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
