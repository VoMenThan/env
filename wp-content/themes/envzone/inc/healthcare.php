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
    <section class="artical-page industries-page healthcare-page">
        <div class="container">


            <div class="row justify-content-md-center">
                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_fully_aware', $post->ID);?></h2>
                </div>
                <div class="col-lg-8 description-fully">
                    <?php echo get_field('description_fully_aware', $post->ID);?>
                </div>
            </div>
        </div>
            <div class="col-12 text-center btn-learn-more">
                <a href="<?php echo get_field('url_learn_more', $post->ID);?>" class="btn btn-blue-env">
                    <?php echo get_field('button_name_learn_more', $post->ID);?>
                </a>
            </div>
            <div class="bg-gray-process">
                <div class="container">
            <div class="row justify-content-md-center mb-5">
                <div class="col-lg-8">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_we_offer', $post->ID);?></h2>
                    <div class="description-offer">
                        <p>
                            <?php echo get_field('description_we_offer', $post->ID);?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center mb-lg-5">
                <div class="col-lg-4">
                    <div class="item-offer">
                        <img class="img-fluid m-auto d-block" src="<?php echo get_field('icon_patient_management', $post->ID);?>" alt="">
                        <h3>
                            <?php echo get_field('title_patient_management', $post->ID);?>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-8 content-offer">
                    <?php echo get_field('description_patient_management', $post->ID);?>
                </div>
            </div>

            <div class="row justify-content-md-center mb-lg-5">
                <div class="col-lg-8 order-lg-0 order-1 content-offer">
                    <?php echo get_field('description_employee_management', $post->ID);?>
                </div>

                <div class="col-lg-4 order-lg-1 order-0">
                    <div class="item-offer">
                        <img class="img-fluid m-auto d-block" src="<?php echo get_field('icon_employee_management', $post->ID);?>" alt="">
                        <h3>
                            <?php echo get_field('title_employee_management', $post->ID);?>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center mb-lg-5">
                <div class="col-lg-4">
                    <div class="item-offer">
                        <img class="img-fluid m-auto d-block" src="<?php echo get_field('icon_administration', $post->ID);?>" alt="">
                        <h3>
                            <?php echo get_field('title_administration', $post->ID);?>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-8 content-offer">
                    <?php echo get_field('description_administration', $post->ID);?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="pb-4 font-weight-bold"><?php echo get_field('title_beautiful_day', $post->ID);?></h3>
                    <a href="<?php echo get_field('url_button_join_us', $post->ID);?>" class="btn btn-blue-env mb-5">
                        <?php echo get_field('button_name_join_us', $post->ID);?>
                    </a>
                </div>
            </div>
         </div>
       </div> 
    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-healthcare-industries.png" alt="">
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