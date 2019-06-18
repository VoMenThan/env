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
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Full Cycle Development</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page service-page full-cycle-development-page">
        <div class="container">

            <div class="row justify-content-md-center">
                <div class="col-lg-5">
                    <h2 class="title-head-blue text-center pt-4"><?php echo get_field('title_software_protyping', $post->ID);?></h2>
                </div>
                <div class="col-lg-7">
                    <div class="description-overhead">
                        <?php echo get_field('description_software_protyping', $post->ID);?>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <img class="img-fluid" src="<?php echo get_field('image_we_help_deliver', $post->ID);?>" alt="">
                </div>
                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_button_certified', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_certified', $post->ID);?>
                    </a>
                </div>

            </div>

            <div class="row justify-content-md-center box-development">
                <div class="col-lg-5">
                    <h2 class="title-head-blue text-center">
                        <?php echo get_field('title_custom_software_development', $post->ID);?>
                    </h2>
                </div>
                <div class="col-lg-7">
                    <div class="description-overhead">
                        <?php echo get_field('description_custom_software_development', $post->ID);?>
                    </div>
                </div>

                <?php $list_software =  get_field('list_software_development', $post->ID);
                    foreach ($list_software as $item):
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="item-custom-software d-flex align-items-center justify-content-center">
                        <h3>
                            <?php echo $item['name_software_development'];?>
                        </h3>
                    </div>
                </div>
                <?php endforeach;?>


                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_button_custom_software', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_custom_software', $post->ID);?>
                    </a>
                </div>
            </div>


            <div class="row justify-content-md-center mb-5">
                <div class="col-lg-5">
                    <h2 class="title-head-blue title-head-blue-3  text-center pt-3">
                        <?php echo get_field('title_product_development', $post->ID);?>
                    </h2>
                </div>
                <div class="col-lg-7">
                    <div class="description-overhead">
                        <?php echo get_field('description_product_development', $post->ID);?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="title-blue"><?php echo get_field('subtitle_product_development', $post->ID);?></div>
                    <div class="row justify-content-center">
                        <?php $list_product =  get_field('list_product_development', $post->ID);
                        foreach ($list_product as $item):
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="item-product-development full-cycle-pt">
                                <?php echo $item['name_product'];?>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>

                </div>

                <div class="col-12 text-center btn-learn-more">
                    <a href="<?php echo get_field('link_button_requirement', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_requirement', $post->ID);?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-full-cycle-development-services.png" alt="">
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

    <?php require_once "popup-services.php";?>
</main>