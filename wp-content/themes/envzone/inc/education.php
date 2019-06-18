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
    <section class="artical-page education-page">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-12">
                    <h2><?php echo get_field('title_fully_aware', $post->ID);?></h2>
                    <div class="description-industries">
                        <?php echo get_field('description_fully_aware', $post->ID);?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <section class="col-12 text-center box-question-education">
                            <img class="img-fluid" src="<?php echo get_field('image_question', $post->ID);?>" alt="">

                            <div class="question-1">
                                <?php echo get_field('question_1', $post->ID);?>
                            </div>
                            <div class="question-2">
                                <?php echo get_field('question_2', $post->ID);?>
                            </div>
                            <div class="question-3">
                                <?php echo get_field('question_3', $post->ID);?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        </div>

        <div class="container section-offer">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center"><?php echo get_field('title_we_offer', $post->ID);?></h2>
                </div>
                <section class="col-12 text-left box-offer-education">

                    <div class="circle-offer">
                        <img class="img-fluid" src="<?php echo get_field('image_we_offer', $post->ID);?>" alt="">
                        <div class="main-offer">
                            <?php echo get_field('center_offer', $post->ID);?>
                        </div>
                    </div>

                    <div class="offer-1">
                        <?php echo get_field('offer_1', $post->ID);?>
                    </div>
                    <div class="offer-2 pl-5">
                        <?php echo get_field('offer_2', $post->ID);?>
                    </div>
                    <div class="offer-3">
                        <?php echo get_field('offer_3', $post->ID);?>
                    </div>

                    <div class="text-center">
                        <a href="<?php echo get_field('url_more_question', $post->ID);?>" class="btn btn-blue-env mt-4">
                            <?php echo get_field('button_name_more_question', $post->ID);?>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-education-industries.png" alt="">
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

    <?php require_once "subscribe.php";?>


    <?php require_once "popup-industries.php";?>
</main>