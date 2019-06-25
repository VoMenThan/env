
<?php
/* Template Name: NGOs*/
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
    <section class="artical-page industries-page none-profit-page">
        <div class="container">


            <div class="row justify-content-md-center fully-aware">
                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_fully_aware', $post->ID);?></h2>
                </div>
                <?php
                    $list_aware = get_field('list_fully_aware', $post->ID);
                    foreach ($list_aware as $item):
                    ?>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-center align-items-center item-different">
                            <img src="<?php echo $item['icon_item'];?>" alt="" class="icon-different">
                            <h4><?php echo $item['title_item'];?></h4>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>

        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-5 title-blue">
                        <?php echo get_field('title_understand', $post->ID);?>
                    </div>
                    <div class="col-lg-7">
                        <p>
                            <?php echo get_field('description_understand', $post->ID);?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center my-lg-5 my-3">
                        <a href="<?php echo get_field('url_learn_more', $post->ID);?>" class="btn btn-blue-env">
                            <?php echo get_field('button_name_learn_more', $post->ID);?>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center fully-aware">

                <div class="col-12">
                    <h2 class="title-head-blue text-center">
                        <?php echo get_field('title_we_offer', $post->ID);?>
                    </h2>
                </div>

                <div class="col-lg-8">
                    <div class="row">

                        <?php
                            $list_we_offer = get_field('list_we_offer', $post->ID);
                            foreach ($list_we_offer as $item):
                        ?>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center align-items-center item-different">
                                    <img src="<?php echo $item['icon_item'];?>" alt="" class="icon-different">
                                    <h4><?php echo $item['title_item'];?></h4>
                                </div>
                            </div>
                        <?php endforeach;?>

                    </div>
                </div>

                <div class="col-12 text-center">
                    <a href="<?php echo get_field('url_button_discover', $post->ID);?>" class="btn btn-blue-env mt-3">
                        <?php echo get_field('button_name_discover', $post->ID);?>
                    </a>
                </div>
            </div>



        </div>

    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-ngo-industries.png" alt="">
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
<?php get_footer();?>
