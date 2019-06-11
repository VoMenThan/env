<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */

get_header();



$result = new stdClass();
$star = get_field('rating_star');
$poll = get_field('list_vote');
$error_msg = '';
if (count($_POST) >= 1){

    if (count($_POST) >= 2){
        if (isset($_POST['rating_star'])){

            $post_id = $post->post_ID;
            switch ($_POST['rating_star']):
                case 1:
                    $star['1_star'] += 1;
                    break;
                case 2:
                    $star['2_stars'] += 1;
                    break;
                case 3:
                    $star['3_stars'] += 1;
                    break;
                case 4:
                    $star['4_stars'] += 1;
                    break;
                case 5:
                    $star['5_stars'] += 1;
                    break;
                default:
                    break;
            endswitch;
            update_field( 'rating_star', $star, $post_id );

            $number_poll =  count($poll);
            for ($i = 0; $i < $number_poll; $i++):
                if ($_POST['poll'.$i] == 'on'){
                    $poll[$i]['count_vote'] += 1;
                }
            endfor;
            update_field( 'list_vote', $poll, $post_id );

            $result->st = 1;

        }
        else{
            $error_msg = 'Please rate us!';
        }
    }else{
        $error_msg = 'Please rate us and choose the poll!';
    }
}


$total_vote_star = $star['1_star'] + $star['2_stars'] + $star['3_stars'] + $star['4_stars'] + $star['5_stars'];
if ($total_vote_star == 0){
    $average_rating = 0;
}else{
    $average_rating = round(($star['1_star']*1 + $star['2_stars']*2 + $star['3_stars']*3 + $star['4_stars']*4 + $star['5_stars']*5)/$total_vote_star, 1);
}

?>

<main class="main-content">
    <section class="artical-page blog-page blog-detail-page companies-page company-detail-page">
        <div class="container d-lg-block d-none">
            <div class="row">
                <div class="col-12 mb-lg-5">
                    <div class="box-breadcrumb no-print">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('companies');?>">Companies</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid box-info-company">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 infomation-company clearfix">
                        <div class="box-logo">
                            <a href="">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                            </a>
                        </div>
                        <div class="box-info">
                            <h1><?php echo get_the_title();?></h1>
                            <div class="box-industries">
                                <span>Industry:</span>
                                <ul class="list-industries list-inline">

                                    <?php
                                    $category_industries = get_the_terms( get_the_ID(), 'industries' );
                                    if ($category_industries != ''):
                                    foreach ($category_industries as $item):
                                        ?>
                                        <li class="item list-inline-item">
                                            <?php echo $item->name;?>
                                        </li>
                                    <?php endforeach; endif;?>
                                </ul>
                            </div>
                            <div class="box-rating clearfix">
                                <div class="rate">
                                    <input class="nohover" type="radio" id="star5" name="rate" value="5" disabled <?php echo (round($average_rating)==5) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star5" title="5 stars">5 stars</label>
                                    <input class="nohover" type="radio" id="star4" name="rate" value="4" disabled <?php echo (round($average_rating)==4) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star4" title="4 star">4 stars</label>
                                    <input class="nohover" type="radio" id="star3" name="rate" value="3" disabled <?php echo (round($average_rating)==3) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star3" title="3 stars">3 stars</label>
                                    <input class="nohover" type="radio" id="star2" name="rate" value="2" disabled <?php echo (round($average_rating)==2) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star2" title="2 stars">2 stars</label>
                                    <input class="nohover" type="radio" id="star1" name="rate" value="1" disabled <?php echo (round($average_rating)==1) ? 'checked' : '';?>/>
                                    <label class="nohover" for="star1" title="1 star">1 star</label>
                                </div>
                            </div>
                            <p>(Average rating <?php echo $average_rating;?>. Vote count: <?php echo $total_vote_star;?>)</p>
                        </div>

                        <a target="_blank" href="<?php echo get_field('link_website', $post->ID);?>" rel="nofollow" class="btn btn-green-env">VIEW WEBSITE</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-8 pd-lr-0">
                    <article class="box-section section-overview">
                        <h2 class="label-heading">OVERVIEW</h2>
                        <div class="content-overview">
                            <?php echo get_the_content();?>
                        </div>
                    </article>

                    <?php $album = get_field('screenshots', get_the_ID());
                    if ($album != ''):
                    ?>
                    <article class="box-section section-screenshots box-gallery-detail">
                        <h2 class="label-heading"><?php echo get_the_title();?> SCREENSHOTS</h2>

                        <div class="carousel-photo-detail owl-carousel owl-theme">
                            <?php
                            foreach ($album as $k => $item):
                                ?>
                                <div class="item"  data-hash="<?php echo $k; ?>">
                                    <img title="<?php echo $item['title'];?>" src="<?php echo $item['url'];?>" alt="<?php echo $item['alt'];?>">
                                    <?php if (($item['description']) != ''):?>
                                        <div class="description-photo">
                                            <?php echo $item['description'];?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            <?php endforeach;?>

                        </div>
                        <hr>
                        <div id="box-thumbnail-photo" class="box-icon-mini owl-carousel owl-theme">
                            <?php
                            foreach ($album as $k => $item):
                                ?>
                                <div class="item">
                                    <a href="#<?php echo $k;?>"><img title="<?php echo $item['title']?>" src="<?php echo $item['sizes']['medium'];?>" alt="<?php echo $item['alt']?>"></a>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </article>
                    <?php endif;?>

                    <article class="box-section section-voice">
                        <h2 class="label-heading">LET YOUR VOICE BE HEARD BY LEADERSHIP AT <?php echo get_the_title();?></h2>
                        <div class="content-voice">
                            <div class="description-voice">
                                This poll is updated periodically every quarter based on the input data for best best recommendation practices.
                            </div>
                            <form action="" id="formVoice" name="form-voice" method="post">
                                <div class="section-rating">
                                    <div class="title-rating">Overall Rating</div>
                                    <div class="box-rating clearfix">
                                        <div class="rate">
                                            <input type="radio" id="rating_star_5" name="rating_star" value="5" />
                                            <label for="rating_star_5" title="5 stars">5 stars</label>
                                            <input type="radio" id="rating_star_4" name="rating_star" value="4" />
                                            <label for="rating_star_4" title="4 star">4 stars</label>
                                            <input type="radio" id="rating_star_3" name="rating_star" value="3" />
                                            <label for="rating_star_3" title="3 stars">3 stars</label>
                                            <input type="radio" id="rating_star_2" name="rating_star" value="2" />
                                            <label for="rating_star_2" title="2 stars">2 stars</label>
                                            <input type="radio" id="rating_star_1" name="rating_star" value="1" />
                                            <label for="rating_star_1" title="1 star">1 star</label>
                                        </div>
                                    </div>
                                    <p>(Average rating <?php echo $average_rating;?>. Vote count: <?php echo $total_vote_star;?>)</p>
                                </div>
                                <?php if ($poll!=''):?>
                                <div class="section-poll">
                                    <div class="title-poll">Poll</div>
                                    <div class="subtitle-poll">
                                        <?php echo get_field('question_vote');?>
                                    </div>

                                    <?php
                                        foreach ($poll as $k => $item):
                                            $percent = 0;
                                            if ($total_vote_star != 0){
                                                $percent = ceil(($item['count_vote']/$total_vote_star)*100);
                                            }

                                    ?>
                                    <div class="article-poll clearfix">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="poll<?php echo $k;?>" class="custom-control-input" id="pollCheck<?php echo $k;?>">
                                            <label class="custom-control-label" for="pollCheck<?php echo $k;?>">
                                                <?php echo $item['recommend'];?>
                                            </label>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $percent;?>%" aria-valuenow="<?php echo $percent;?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span>(<?php echo $percent;?>%, <?php echo $total_vote_star;?> votes)</span>
                                    </div>
                                    <?php endforeach;?>
                                    <div class="recommend-poll">
                                        or share your recommendations in the comments below
                                    </div>
                                </div>
                                <?php endif;?>

                                <div class="box-error my-lg-3 my-1 text-danger">
                                    <?php echo $error_msg;?>
                                </div>
                                <div class="text-center  mt-lg-5 mt-3">
                                    <button type="submit" class="btn btn-green-env">VOTE</button>
                                </div>

                            </form>

                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modalVoteStar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 1.5L13.5 0L7.5 6L1.5 0L0 1.5L6 7.5L0 13.5L1.5 15L7.5 9L13.5 15L15 13.5L9 7.5L15 1.5Z" fill="#0D3153"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center p-5">
                                        <img class="alignnone size-full wp-image-3030" src="https://www.envzone.com/wp-content/uploads/2019/04/icon-verified.png" alt="" width="50" height="50" />
                                        <h2>THANK YOU!</h2>
                                        Your vote has been submitted successfully!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Model -->
                    </article>


                    <article class="box-section section-profile-report">
                        <h2 class="label-heading">GET THIS FREE PROFILE REPORT</h2>
                        <div class="form-profile-report">
                            <?php
                            echo do_shortcode('[gravityform id=18 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </article>

                    <?php $article_relate = get_field('article_for_company', $post->ID);
                    if ($article_relate != ''):
                    ?>
                    <article class="box-section section-article-relate">
                        <h2 class="label-heading"><?php echo get_the_title();?> COMPANY IS FEATURED IN</h2>
                        <div class="section-blog py-0">
                            <div class="content-blog my-0 box-item-scroll">
                                <div class="owl-carousel owl-theme d-lg-flex d-flex flex-row slider-news">
                                    <?php

                                    $news_special = $article_relate;
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
                                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="" align="job-openings">
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
                    </article>
                    <?php endif;?>

                    <div class="box-comments">
                        <?php
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                        ?>
                    </div>

                </div>

                <div class="col-lg-4 sidebar-advert no-print">

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

                </div>

            </div>

        </div>

        <!-- /*============SUBCRIBE HOME=================*/ -->
        <div class="container-fluild section-parallax no-print">
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

    </section>
</main>

<script type="text/javascript">
    $(document).ready(function () {
        <?php if ($result->st == 1):?>
        $('#modalVoteStar').modal('show');
        <?php endif;
        $result->st = 0;
        ?>
        /*slider product detail*/
        $(".carousel-photo-detail").owlCarousel({
            items:1,
            margin:0,
            stagePadding: 0,
            smartSpeed: 500,
            loop: false,
            nav: true,
            dots: false,
            autoplay: true,
            slideBy: 1,
            autoplayTimeout:5000,
            URLhashListener:true,
            startPosition: 'URLHash',
            navText: [
                '<i class="btn-next-slide"></i>',
                '<i class="btn-prev-slide"></i>'
            ]
        });

        $(".box-icon-mini").owlCarousel({
            center: false,
            items:4,
            margin:10,
            stagePadding: 0,
            smartSpeed: 300,
            loop: false,
            nav: true,
            dots: false,
            slideBy: 1,
            navText: [
                '<i class="btn-next-slide"></i>',
                '<i class="btn-prev-slide"></i>'
            ]
        });
        /* end slider product detail*/

        $('.blog-page .highlight-news-right .info-news h2').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });

        $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');

        $(".box-analaze-blog .analyze-form #gform_submit_button_12").val('ANALYZE FOR CHANCE OF SUCCESS');


        if ( $(window).width() > 425 ) {
            startCarousel();

        } else {
            $('.slider-news').addClass('off');
        }

    });

    $(window).resize(function() {
        if ( $(window).width() > 425 ) {
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
                    items: 2
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
