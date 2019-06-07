<main class="main-content">
    <section class="banner-top banner-industries bg-blue">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>">
        <h1><?php echo get_the_title();?></h1>
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
    <section class="artical-page industries-page real-estate-page">
        <div class="container">

            <div class="row justify-content-md-center mb-5">
                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_fully_aware', $post->ID);?></h2>
                </div>
            </div>

            <?php $list_aware = get_field('list_aware', $post->ID);
                foreach ($list_aware as $item):
            ?>
            <div class="row mb-3">
                <div class="col-lg-3 text-lg-center">
                    <img class="img-fluid" src="<?php echo $item['image_aware'];?>" alt="">
                </div>
                <div class="col-lg-9 info-fully">
                    <?php echo $item['description_aware'];?>
                </div>
            </div>
            <?php endforeach;?>

            <div class="row">
                <div class="col-12 info-note"><?php echo get_field('note_aware', $post->ID);?></div>
            </div>


            <div class="col-12 text-center btn-learn-more">
                <a href="<?php echo get_field('link_button_learn_more', $post->ID);?>" class="btn btn-blue-env">
                    <?php echo get_field('name_button_learn_more', $post->ID);?>
                </a>
            </div>
        </div>
        <div class="container-fluid bg-gray-process real-estate-article">
            <div class="container">
                <div class="row justify-content-md-center mb-5">
                    <div class="col-lg-6">
                        <h2 class="title-head-blue text-center"><?php echo get_field('title_we_offer', $post->ID);?></h2>
                        <div class="description-offer">
                            <?php echo get_field('description_we_offer', $post->ID);?>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-lg-10">
                        <div class="row justify-content-md-center">
                            <?php $list_we_offer = get_field('list_we_offer', $post->ID);
                            foreach ($list_we_offer as $item):
                            ?>
                            <div class="col-xl-4 col-lg-4 ">
                                <div class="item-offer">
                                    <img class="img-fluid m-auto d-block" src="<?php echo $item['icon_offer']?>" alt="">
                                    <p>
                                        <?php echo $item['description_offer']?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <div class="col-12 text-center">
                                <h3 class="pb-4 pt-4"><?php echo get_field('subtitle_offer', $post->ID);?></h3>
                                <a href="<?php echo get_field('link_button_schedule_an_appointment', $post->ID);?>" class="btn btn-blue-env mb-4">
                                    <?php echo get_field('name_button_schedule_an_appointment', $post->ID);?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bar-chart-industries.png" alt="">
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
</main>