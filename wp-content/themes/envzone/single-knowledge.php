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
    <section class="artical-page blog-page blog-knowledge-page blog-knowledge-detail-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('knowledge');?>">Knowledge</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>

                </div>
                <div class="col-lg-12">
                    <h1>
                        <?php echo $post->post_title;?>
                    </h1>
                </div>
                <div class="col-8">
                    <div class="box-video">
                        <div class="embed-video">
                            <?php echo get_field('embed', $post->ID);?>
                        </div>
                        <div class="info-video">
                            <?php echo $post->post_content;?>
                            <!--<div class="text-center">
                                <a href="#" class="show-more">SHOW MORE</a>
                            </div>-->
                        </div>

                    </div>

                </div>
                <div class="col-4">
                    <article class="info-video">
                        <div class="edit-by">
                            EDITED BY
                            <div class="author">
                                <?php echo get_the_author_meta('display_name', $post->post_author);?>
                            </div>
                        </div>
                        <div class="public-on">
                            PUBLISED ON
                            <div class="date">
                                <?php echo get_the_date( 'M d,Y', $post->ID ); ?>
                            </div>
                        </div>
                        <div class="box-share-social">
                            <div class="share-share-social">
                                SHARE THIS VIDEO TO MY FAVORITES
                            </div>
                            <ul class="nav list-social">
                                <li class="nav-item px-1">
                                    <a class="nav-link link-twitter" href="#"><i class="icon-twitter-green"></i></a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link link-facebook" href="#"><i class="icon-facebook-green"></i></a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link link-linkedin" href="#"><i class="icon-linkedin-green"></i></a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link link-google" href="#"><i class="icon-google-plus-green"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>

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
                    <div class="box-advert text-center">
                        <p>
                            Do Not Let Your Outsourcing Projects Go South!
                        </p>
                        <div class="sub-title">
                            We can help you
                        </div>
                        <a href="<?php echo home_url('process-framework')?>" class="btn btn-green-env">
                            SEE THIS UNIQUE APPROACH FOR SUCCESS
                        </a>
                    </div>

                    <div class="box-advert bg-green">
                        <p>
                            ENVZONE team members are known being very active across disruptive events. Surely, they will be proactive and innovative on your projects too.
                        </p>
                        <div class="sub-title">
                            Interested in working with the team?
                        </div>
                        <a href="<?php echo home_url('contact-us')?>" class="btn btn-blue-env">
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

<?php
get_footer();
?>
