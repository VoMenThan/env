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
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">IT Outsourcing</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page service-page it-outsourcing-page">
        <div class="container">

            <div class="row justify-content-md-center mb-5">
                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_why_choose_envzone', $post->ID);?></h2>
                </div>
                <div class="col-lg-8">
                    <div class="description-overhead">
                        <ul>
                            <?php
                                $list_why_choose = get_field('list_reason_choose_envzone', $post->ID);
                                foreach ($list_why_choose as $item):
                            ?>
                            <li class="list-choose">
                                <?php echo $item['name_reason'];?>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_dedicated_team', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_dedicated_team', $post->ID);?>
                    </a>
                </div>
            </div>

            <div class="row justify-content-md-center mb-5">
                <div class="col-12">
                    <h2 class="title-head-blue text-center">
                        <?php echo get_field('title_services_offered', $post->ID);?>
                    </h2>
                </div>

                <div class="col-lg-9 col-md-10">
                    <div class="row">

                        <?php
                        $list_services = get_field('list_services_offered', $post->ID);
                        for($i = 0; $i < 3; $i++):
                        ?>
                        <div class="col-lg-4 col-md-4 col-6">
                            <div class="item-service-offered d-flex align-items-center justify-content-center flex-column text-center">
                                <img src="<?php echo $list_services[$i]['icon_service']?>" alt="">
                                <p>
                                    <?php echo $list_services[$i]['name_service']?>
                                </p>
                            </div>
                        </div>
                        <?php endfor;?>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 box-mb-120">
                    <div class="row">

                        <?php

                        for($i = 3; $i < count($list_services); $i++):
                        ?>
                        <div class="col-lg-3 col-md-3 col-6 text-center">
                            <div class="item-service-offered d-flex align-items-center justify-content-center flex-column text-center">
                                <img src="<?php echo $list_services[$i]['icon_service']?>" alt="">
                                <p>
                                    <?php echo $list_services[$i]['name_service']?>
                                </p>
                            </div>
                        </div>
                        <?php endfor;?>
                    </div>
                </div>

                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_button_requirement', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_requirement', $post->ID);?>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-it-outsourcing-services.png" alt="">
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