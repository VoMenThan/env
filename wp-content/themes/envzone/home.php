<?php
global $wp_query;

$paged = get_query_var( 'paged' );
get_header();

$taxonomies = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => true
) );

?>

    <main class="main-content">

        <section class="artical-page blog-page blog-detail-page">

            <div class="container-fluid box-map-skyrocket bg-gray-process d-lg-block d-none">
                <div class="row position-relative">
                    <div class="col-12 p-0">
                    <div id="map" style="width: 100%; min-height: 550px;"></div>
                    <div class="box-input-search">
                        <h2>YOUR RESOURCES TO SKYROCKET</h2>
                        <p>Find valuable guides and tips to solve your business problems</p>
                        <form action="<?php echo home_url();?>" method="get" id="search-page" name="search-page" class="position-relative">
                            <input class="input-search" name="s" type="text" placeholder="Search by resources, insights...">
                            <a onclick="document.getElementById('search-page').submit()" href="#" class="btn-search">
                                <i class="icon-search"></i>
                            </a>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="container list-highlight-categories">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Highlight categories</h4>
                            <?php if ( !empty($taxonomies) ) :
                                ?>
                            <ul class="list-category clearfix">
                                <?php
                                foreach( $taxonomies as $category ) {
                                if( $category->parent == 0 ) {
                                ?>
                                <li class="item-category"><a href="<?php echo home_url('category/').$category->slug;?>"><?php echo $category->name;?></a></li>

                                <?php }}?>
                            </ul>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /*============SMALL BUSINESS=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">SMALL BUSINESS</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/small-business');?>">All Small Business<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'small-business',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                    ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                <?php else:?>
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

                                <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END SMALL BUSINESS=================*/ -->


            <!-- /*============OUTSOURCING INSIGHTS=================*/ -->
            <div class="container-fluild section-blog-home bg-greenish-bloghome" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">OUTSOURCING INSIGHTS</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/outsourcing-insights');?>">All OUTSOURCING INSIGHTS<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'outsourcing-insights',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END OUTSOURCING INSIGHTS=================*/ -->

            <!-- /*============Healthcare=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">Healthcare</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/Healthcare');?>">All Healthcare<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'healthcare',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END Healthcare=================*/ -->

            <!-- /*============Ecommerce & Retail=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">Ecommerce & Retail</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/ecommerce-and-retail');?>">All Ecommerce & Retail<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'ecommerce-and-retail',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END Ecommerce & Retail=================*/ -->


            <!-- /*============Real Estate & Property=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">Real Estate & Property</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/real-estate-and-property');?>">All Real Estate & Property<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'real-estate-and-property',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END Ecommerce & Retail=================*/ -->

            <!-- /*============FORM executive insights=================*/ -->
            <div class="container section-get-executive-insights">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-executive">
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
            </div>
            <!-- /*============END FORM executive insights=================*/ -->

            <!-- /*============Logistics & Supply Chain=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">Logistics & Supply Chain</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/logistics-and-supply-chain');?>">All Logistics & Supply Chain<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'logistics-and-supply-chain',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END Logistics & Supply Chain=================*/ -->

            <!-- /*============Financial services=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">Financial services</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/financial-services');?>">All Financial services<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'financial-services',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END Financial services=================*/ -->


            <!-- /*============Education=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">Education</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/education');?>">All Education<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'education',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END Education=================*/ -->

            <!-- /*============Non-Profit Organizations=================*/ -->
            <div class="container-fluild section-blog-home" >
                <div class="container blog-page blog-detail-page">
                    <div class="row define-headline">
                        <div class="col-12 box-head-blog">
                            <h3 class="title-head-blue have-border">Non-Profit Organizations</h3>
                            <a class="view-all d-lg-block d-none" href="<?php echo home_url('category/non-profit-orgranizations');?>">All Non-Profit Organizations<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row content-blog">
                        <div class="col-12 box-item-scroll">
                            <div class="row d-flex reset-row-wrap flex-row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'offset'=> 0,
                                    'post_type' => 'post',
                                    'category_name' => 'non-profit-orgranizations',
                                    'orderby' => 'ID',
                                    'order' =>'desc'
                                );
                                $news_special = get_posts( $args );

                                foreach($news_special as $k => $item):

                                    if (get_field('avatar', 'user_'.$item->post_author)== ''){
                                        $avatar = ASSET_URL.'images/avatar-default.png';
                                    }
                                    else{
                                        $avatar = get_field('avatar', 'user_'.$item->post_author);
                                    }
                                    if ($k == 0 or $k == 1):
                                        ?>

                                        <div class="col-lg-6 box-item-special item-blue-pc item">
                                            <div class="item-blog">
                                                <a class="link-post" href="<?php echo get_the_permalink($item->ID);?>">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="<?php echo $item->post_title;?>">
                                                    <h4 class="title-list-special title-white d-lg-block d-none"><?php echo $item->post_title;?></h4>
                                                </a>
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

                                    <?php else:?>
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

                                    <?php

                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /*============END Non-Profit Organizations=================*/ -->


            <section class="artical-page lead-contact-form-page system-page employee-login-page">
                <div class="container">
                    <div class="row box-head">
                        <div class="col-lg-12 text-center">
                            <h2>Content Contributors</h2>
                            <p>Share your insights and expertise to the world</p>
                        </div>

                    </div>
                    <div class="row box-list-employee justify-content-center">
                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="<?php echo home_url('write-for-us')?>">
                                <article class="item-employee">
                                    <img src="<?php echo ASSET_URL;?>images/icon-write-for-us-green.png" alt="">
                                    <h3>Write for us</h3>
                                </article>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="<?php echo home_url('submit-a-press-release')?>">
                                <article class="item-employee">
                                    <img src="<?php echo ASSET_URL;?>images/icon-press-release-green.png" alt="">
                                    <h3>Press release</h3>
                                </article>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="<?php echo home_url('get-media-coverage')?>">
                                <article class="item-employee">
                                    <img src="<?php echo ASSET_URL;?>images/icon-join-featured-interview-green.png" alt="">
                                    <h3>Join featured interview</h3>
                                </article>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </section>
        <?php require_once "inc/popup-discovery.php";?>
    </main>

    <script type="text/javascript">
        function initMap() {
            var location = {lat: 41.711236, lng: -87.767736};
            var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 5,
                disableDefaultUI: true,
                styles:
                    [
                        {
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ebe3cd"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#523735"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#f5f1e6"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#c9b2a6"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#dcd2be"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#ae9e90"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dfd2ae"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dfd2ae"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#93817c"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.attraction",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.business",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.government",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.medical",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#a5b076"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#447530"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.place_of_worship",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.school",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.sports_complex",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f1e6"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#fdfcf8"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#004080"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f8c967"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#e9bc62"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway.controlled_access",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e98d58"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway.controlled_access",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#db8555"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway.controlled_access",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#004080"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#004080"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dfd2ae"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "color": "#ee4d6c"
                                },
                                {
                                    "weight": 1
                                }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#8f7d77"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#ebe3cd"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dfd2ae"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#b9d3c2"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#92998d"
                                }
                            ]
                        }
                    ]
            });

            var marker = new google.maps.Marker({
                position: {lat: 39.751564, lng: -104.997852},
                icon: 'https://www.envzone.com/wp-content/uploads/2019/07/icon-envzone-marker.png',
                map: map
            });

            var env_coverage = [
                <?php $list_coordinates = get_field('featured_coordinates', 10609);
                foreach ($list_coordinates as $key => $item):
                foreach ($item['list_coordinate'] as $k => $coordinate):
                ?>
                [<?php echo $coordinate['latitude'].','.$coordinate['longitude'].','.$coordinate['seo_impact'];?>],
                <?php endforeach; endforeach;?>
            ];



            infowindow = new google.maps.InfoWindow();

            for (var i = 0; i < env_coverage.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(env_coverage[i][0], env_coverage[i][1]),
                    icon: 'https://www.envzone.com/wp-content/uploads/2019/07/icon-envzone-service-coverage.png',
                    map: map
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA30dbRkg2p-cBX9ceyJlK2zg9Zm_h3Zj4&callback=initMap"
            async defer></script>

<?php get_footer();?>