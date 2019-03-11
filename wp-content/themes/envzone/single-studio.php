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
    <section class="artical-page blog-page blog-knowledge-page blog-knowledge-detail-page studio-detail-page">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('studio');?>">Studio</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>

                </div>

                <div class="col-8">
                    <div class="carousel-photo-detail owl-carousel owl-theme">
                        <?php
                            $album = get_field('album', $post->ID);
                            foreach ($album as $k => $item):
                        ?>
                        <div class="item"  data-hash="<?php echo $k; ?>">
                            <a data-fancybox="gallery-detail" href="<?php echo $item['photo'];?>">
                                <img src="<?php echo $item['photo'];?>" alt="">
                            </a>
                            <?php if (($item['description']) != ''):?>
                            <div class="description-photo">
                                <?php echo $item['description'];?>
                            </div>
                            <?php endif;?>
                        </div>
                        <?php endforeach;?>

                    </div>
                </div>

                <div class="col-4">
                    <article class="info-video">
                        <h2>
                            <?php echo $post->post_title;?>
                        </h2>
                        <div class="edit-by">
                            By:
                            <span class="author">
                                <?php echo get_the_author_meta('display_name', $post->post_author);?> | ENVZONE Staff
                            </span>
                        </div>
                        <div class="public-on">
                            Published on:
                            <span class="date">
                                <?php echo get_the_date( 'M d,Y', $item->ID ); ?>
                            </span>
                        </div>
                        <div class="description">
                            <div class="photo">1/<?php echo count($album);?></div>
                            <?php echo $post->post_excerpt;?>

                        </div>
                        <div class="box-share-social">
                            <div class="share-share-social">
                                SHARE THIS VIDEO TO MY FAVORITES
                            </div>
                            <ul class="nav list-social justify-content-end">
                                <li class="nav-item px-1">
                                    <a target="_blank" class="nav-link link-twitter" href="#"><i class="icon-twitter-green"></i></a>
                                </li>
                                <li class="nav-item px-1">
                                    <a target="_blank" class="nav-link link-facebook" href="#"><i class="icon-facebook-green"></i></a>
                                </li>
                                <li class="nav-item px-1">
                                    <a target="_blank" class="nav-link link-linkedin" href="#"><i class="icon-linkedin-green"></i></a>
                                </li>
                                <li class="nav-item px-1">
                                    <a target="_blank" class="nav-link link-google" href="#"><i class="icon-google-plus-green"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>

                </div>

                <div class="col-lg-12">
                    <div id="box-thumbnail-photo" class="box-icon-mini owl-carousel owl-theme">
                        <?php
                            foreach ($album as $k => $item):
                        ?>
                        <div class="item">
                            <a href="#<?php echo $k;?>"><img src="<?php echo $item['photo'];?>" alt=""></a>
                        </div>
                        <?php endforeach;?>


                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="blog-comment pt-3">
        <div class="container">
            <div class="row">
                <div class="col-8 px-2">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                </div>

                <div class="col-4">
                    <div class="box-advert">
                        <p>
                            ENVZONE team members are known being very active across disruptive events. Surely, they will be proactive and innovative on your projects too.
                        </p>
                        <div class="sub-title">
                            Interested in working with the team?
                        </div>
                        <a href="<?php echo home_url('contact-us')?>" class="btn btn-green-env">
                            SCHEDULE ME WITH THE TEAM
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subscriber">
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
                            <form action="" method="get">
                                <input type="text" class="input-search d-block" placeholder="Enter your email adress">
                                <input type="submit" hidden>
                                <a class="btn btn-blue-env btn-search" href="#">SIGN ME UP FOR THREE THINGS</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->
    </section>


</main>

<script>
    /*============ slide news =================*/
    $(document).ready(function() {

        /*slider product detail*/
        $(".carousel-photo-detail").owlCarousel({
            items:1,
            margin:0,
            stagePadding: 0,
            smartSpeed: 500,
            loop: false,
            nav: false,
            dots: false,
            autoplay: true,
            slideBy: 1,
            autoplayTimeout:5000,
            URLhashListener:true,
            autoplayHoverPause:true,
            startPosition: 'URLHash'
        });

        $(".box-icon-mini").owlCarousel({
            center: false,
            items:6,
            margin:10,
            stagePadding: 0,
            smartSpeed: 1000,
            loop: false,
            nav: true,
            dots: false,
            slideBy: 1
        });
        /* end slider product detail*/

    });
</script>

<?php
get_footer();
?>
