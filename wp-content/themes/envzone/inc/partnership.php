<main class="main-content">
    <section class="banner-top banner-company bg-blue">
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
    <section class="artical-page partnership-page">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 box-header">
                    <h2 class="title-head-blue text-center title-top"><?php echo get_field('title_provide_partnership', $post->ID);?></h2>
                    <p>
                        <?php echo get_field('description_provide_partnership', $post->ID);?>
                    </p>
                </div>

                <div class="col-lg-12 info-partnership clearfix d-sm-block d-flex flex-nowrap flex-column">
                    <div class="box-info order-2 order-sm-1">
                        <?php echo get_field('content_partnership_channel', $post->ID);?>
                    </div>
                    <div class="box-title order-sm-2 order-1 d-flex justify-content-center align-items-center">
                        <h2>
                            <?php echo get_field('title_partnership_channel', $post->ID);?>
                        </h2>
                    </div>
                </div>

                <div class="col-lg-12 col-12 box-header text-lg-center">
                    <h2 class="title-head-blue title-top mt-5"><?php echo get_field('title_this_program', $post->ID);?></h2>
                </div>

                <div class="col-12 box-two-col clearfix">
                    <div class="box-green">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h4>
                            <?php echo get_field('title_support_you', $post->ID);?>
                        </h4>
                        <p>
                            <?php echo get_field('description_support_you', $post->ID);?>
                        </p>
                    </div>
                    <div class="box-blue">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h4>
                            <?php echo get_field('title_always_open', $post->ID);?>
                        </h4>
                        <p>
                            <?php echo get_field('description_always_open', $post->ID);?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 text-center py-5">
                    <p class="description-sign-me-up"><?php echo get_field('title_button_sign_me_up', $post->ID);?></p>
                    <a href="<?php echo get_field('url_sign_me_up', $post->ID);?>" class="btn btn-green-env">
                        <?php echo get_field('button_name_sign_me_up', $post->ID);?>
                    </a>
                </div>
            </div>
        </div>


        <div class="box-why-business">
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
                        <a  <?php echo (get_field('button_direct', $post->ID) == '')? 'onclick="Calendly.showPopupWidget(\'https://calendly.com/envzone/discovery-session\');return false;"': 'href="'.get_field('button_direct', $post->ID).'"';?> class="btn btn-white-env"><?php echo get_field('button_name', $post->ID)?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "subscribe.php";?>

        <?php require_once "popup-company.php";?>
    </section>
</main>