<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */

global $wp_query;
get_header();

$cat = get_the_terms( $post->ID, 'resources_cat' );
$link = get_field('link_share');
$email = do_shortcode('[mepr-account-info field="user_email"]');
?>
<main class="main-content">
    <div class="container d-lg-block d-none">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb no-print">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo home_url('resources');?>">Resources</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-detail-page resources-ebook-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <a class="btn-back-to-list" href="<?php echo home_url('resources');?>">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.8332 20L16.1665 17.6667L8.49984 10L16.1665 2.33333L13.8332 -1.90735e-06L3.83317 10L13.8332 20Z" fill="#4F4F4F"/>
                        </svg>
                        BACK TO LIST
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="box-info-ebook">
                        <h1><?php echo $post->post_title;?></h1>
                        <div class="cover-ebook">
                            <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="img-fluid image-cover-detail">
                        </div>
                        <div class="excerpt-ebook">
                            <?php the_content();?>
                        </div>
                        <div class="box-download">
                            <?php
                                if (is_user_logged_in()):

                                    echo do_shortcode('[gravityform id=32 title=false description=false ajax=true]');


                                else:?>
                                <div class="btn btn-blue-env">
                                    DOWNLOAD
                                    <svg width="25" height="25" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M63.7038 29.797V21.4815C63.7038 9.63704 53.0697 0 40.0001 0C26.9304 0 16.2964 9.63704 16.2964 21.4815V29.797C11.2578 30.6652 7.40747 35.0563 7.40747 40.3407V69.2918C7.40747 75.1955 12.2119 80 18.1171 80H61.883C67.7882 80 72.5926 75.1956 72.5926 69.2904V40.3393C72.5926 35.0563 68.7423 30.6652 63.7038 29.797ZM19.2593 21.4815C19.2593 11.2696 28.563 2.96296 40.0001 2.96296C51.4371 2.96296 60.7408 11.2696 60.7408 21.4815V29.6296H19.2593V21.4815ZM69.6297 69.2904C69.6297 73.5615 66.1541 77.037 61.883 77.037H18.1171C13.846 77.037 10.3704 73.5615 10.3704 69.2904V40.3393C10.3704 36.0681 13.846 32.5926 18.1171 32.5926H61.883C66.1541 32.5926 69.6297 36.0681 69.6297 40.3393V69.2904Z" fill="#BDBDBD"/>
                                        <path d="M40 41.4815C36.7319 41.4815 34.0741 44.1393 34.0741 47.4074V56.2963C34.0741 59.5644 36.7319 62.2222 40 62.2222C43.2682 62.2222 45.9259 59.5644 45.9259 56.2963V47.4074C45.9259 44.1393 43.2682 41.4815 40 41.4815ZM42.963 56.2963C42.963 57.9304 41.6341 59.2593 40 59.2593C38.3659 59.2593 37.0371 57.9304 37.0371 56.2963V47.4074C37.0371 45.7733 38.3659 44.4444 40 44.4444C41.6341 44.4444 42.963 45.7733 42.963 47.4074V56.2963Z" fill="#BDBDBD"/>
                                    </svg>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-login-memberpress">
                        <?php echo do_shortcode('[mepr-login-form use_redirect="false"]');?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="box-overall-rating">
                        <div class="box-border">
                            <div class="title">Overall Rating</div>
                            <form id="form-overall-rating" action="" method="POST">
                                <div class="box-rating resize clearfix">
                                    <div class="rate">
                                        <input type="radio" id="rate-star5" name="rating_star" class="rate rating_star" value="5"/>
                                        <label for="rate-star5" title="5 stars">5 stars</label>
                                        <input type="radio" id="rate-star4" name="rating_star" class="rate rating_star" value="4"/>
                                        <label for="rate-star4" title="4 star">4 stars</label>
                                        <input type="radio" id="rate-star3" name="rating_star" class="rate rating_star" value="3"/>
                                        <label for="rate-star3" title="3 stars">3 stars</label>
                                        <input type="radio" id="rate-star2" name="rating_star" class="rate rating_star" value="2"/>
                                        <label for="rate-star2" title="2 stars">2 stars</label>
                                        <input type="radio" id="rate-star1" name="rating_star" class="rate rating_star" value="1"/>
                                        <label for="rate-star1" title="1 star">1 star</label>
                                    </div>
                                </div>
                                <input id="post_id" name="post_id" type="hidden" value="<?php echo $post->ID;?>">
                                <div class="box-average-star"></div>
                            </form>
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
            </div>
        </div>

    </section>
</main>

<script>
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {

            var link = <?php echo json_encode($link);?>;
            var email = <?php echo json_encode($email);?>;
            $("#gform_32 #input_32_4").val(email);
            $("#gform_32 #input_32_12").val(link);

        });

    })(jQuery);
</script>
<?php
get_footer();
?>
