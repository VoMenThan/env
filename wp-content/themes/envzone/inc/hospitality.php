<?php
/* Template Name: IND - Hospitality and Travel */

get_header();
?>
<main class="main-content">
    <section class="banner-top banner-industries bg-blue">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>">
        <h1><?php echo get_the_title();?></h1>
        <?php require_once "form-banner.php";?>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page industries-page hospitality-page">
        <div class="container">

            <div class="row justify-content-md-center">

                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_fully_aware', $post->ID);?></h2>
                </div>

                <div class="col-lg-5">
                    <div class="item-reason">
                        <h3>
                            <?php echo get_field('title_customer_satisfaction', $post->ID);?>
                        </h3>
                        <p>
                            <?php echo get_field('description_customer_satisfaction', $post->ID);?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="item-reason">
                        <h3>
                            <?php echo get_field('title_lastest_technology', $post->ID);?>
                        </h3>
                        <p>
                            <?php echo get_field('description_lastest_technology', $post->ID);?>
                        </p>
                    </div>
                </div>
                <div class="col-12 text-center btn-learn-more">
                    <a href="<?php echo get_field('url_button_learn_more', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('button_name_learn_more', $post->ID);?>
                    </a>
                </div>
            </div>

        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="title-head-blue text-center">
                            <?php echo get_field('title_provide_solutions', $post->ID);?>
                        </h2>
                    </div>

                    <?php $list_provide_solution = get_field('list_provide_solution', $post->ID);
                    foreach ($list_provide_solution as $item):
                        ?>
                    <div class="col-lg-5">
                        <div class="item-solution">
                            <h3>
                                <?php echo $item['title_solution']?>
                            </h3>
                            <p>
                                <?php echo $item['description_solution']?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div>


            </div>
        </div>

        <div class="container">
            <div class="row justify-content-md-center mt-5">

                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_offer_different', $post->ID)?></h2>
                </div>

                <?php
                    $list_offer_different = get_field('list_offer_different', $post->ID);
                    foreach ($list_offer_different as $item):
                ?>
                <div class="col-lg-4">
                    <div class="d-flex justify-content-center align-items-center item-different">
                        <img src="<?php echo $item['icon_offer']?>" alt="" class="icon-different">
                        <h4><?php echo $item['offer_name']?></h4>
                    </div>
                </div>
                <?php endforeach;?>

                <div class="col-12 text-center btn-learn-more">
                    <a href="<?php echo get_field('url_button_our_process', $post->ID)?>" class="btn btn-blue-env mt-4">
                        <?php echo get_field('button_name_our_process', $post->ID)?>
                    </a>
                </div>
            </div>
        </div>

    </section>


    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-location-industries.png" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-lg-center text-left">
                    <h2>
                        <?php echo get_field('title_reasons', $post->ID)?>
                    </h2>
                    <div class="description-business">
                        <?php echo get_field('description_reasons', $post->ID)?>
                    </div>
                </div>

                <?php
                $list_reasons = get_field('list_reasons', $post->ID);
                foreach ($list_reasons as $item):
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-lg-0 mb-3">
                        <div class="item-reason">
                            <i class="fa fa-check-circle"></i>
                            <p>
                                <?php echo $item['reason'];?>
                            </p>
                        </div>
                    </div>
                <?php endforeach;?>

                <div class="col-lg-5 col-md-6 mb-lg-0 mb-3">
                    <div class="box-dedicated">
                        <h4><?php echo get_field('teams_title', $post->ID)?></h4>
                        <p>
                            <?php echo get_field('teams_description', $post->ID)?>
                        </p>
                    </div>

                </div>
                <div class="col-lg-5 col-md-6 mb-lg-0 mb-3">
                    <div class="box-dedicated">
                        <h4><?php echo get_field('talent_title', $post->ID)?></h4>
                        <p>
                            <?php echo get_field('talent_description', $post->ID)?>
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <a href="<?php echo (get_field('button_direct', $post->ID) == '')? home_url('contact-us'): get_field('button_direct', $post->ID);?>" class="btn btn-green-env"><?php echo get_field('button_name', $post->ID)?></a>
                </div>
            </div>
        </div>
    </div>
    <!--END WHY BUSINESS-->

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

    <?php require_once "popup-industries.php";?>
</main>
<?php get_footer();?>