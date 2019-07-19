<?php
/* Template Name: SER - Testing*/
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
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Testing</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page service-page testing-page">
        <div class="container">

            <div class="row justify-content-md-center">
                <div class="col-12">
                    <h2 class="title-head-blue text-center">
                        <?php echo get_field('title_deliver', $post->ID);?>
                    </h2>
                </div>

                <div class="col-lg-6 col-md-6 order-md-0 order-1 info-step d-flex align-items-center">
                    <p>
                        <?php echo get_field('description_test_smarter', $post->ID);?>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 order-md-1 order-0 text-center item-test bg-green">
                    <img class="img-fluid" src="<?php echo get_field('icon_test_smarter', $post->ID);?>" alt="">
                    <h3>
                        <?php echo get_field('title_test_smarter', $post->ID);?>
                    </h3>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6 text-center item-test bg-blue">
                    <img class="img-fluid" src="<?php echo get_field('icon_test_faster', $post->ID);?>" alt="">
                    <h3 class="title-green"><?php echo get_field('title_test_faster', $post->ID);?></h3>
                </div>
                <div class="col-lg-6 col-md-6 info-step d-flex align-items-center">
                    <p>
                        <?php echo get_field('description_test_faster', $post->ID);?>
                    </p>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6 order-md-0 order-1 info-step d-flex align-items-center">
                    <p>
                        <?php echo get_field('description_test_at_scale', $post->ID);?>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 order-md-1 order-0 text-center item-test bg-green">
                    <img class="img-fluid" src="<?php echo get_field('icon_test_at_scale', $post->ID);?>" alt="">
                    <h3><?php echo get_field('title_at_scale', $post->ID);?></h3>
                </div>

                <div class="col-12 text-center btn-submit order-2">
                    <a href="<?php echo get_field('link_connect_me', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_connect_me', $post->ID);?>
                    </a>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-12">
                    <h2 class="title-head-blue text-center">
                        <?php echo get_field('title_deploy', $post->ID);?>
                    </h2>
                </div>
                <?php
                    $list_deploy = get_field('list_deploy_with_confidence', $post->ID);
                    foreach ($list_deploy as $item):
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="item-deploy-confidence d-flex justify-content-between align-items-center">
                        <p>
                            <?php echo $item['description_deploy']?>
                        </p>
                        <img src="<?php echo $item['icon_deploy']?>" alt="">
                    </div>
                </div>
                <?php endforeach;?>



                <div class="col-12 mb-5">
                    <div class="title-blue">
                        <?php echo get_field('description_deploy_with_confidence', $post->ID);?>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-around">
                    <?php
                    $list_qa = get_field('list_qa', $post->ID);
                    foreach ($list_qa as $item):
                    ?>
                    <div class="item-qa d-flex align-items-center"><?php echo $item['name_qa']?></div>
                    <?php endforeach;?>
                </div>

                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_button_submit_requirement', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_submit_requirement', $post->ID);?>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-testing-services.png" alt="">
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
<?php get_footer();?>