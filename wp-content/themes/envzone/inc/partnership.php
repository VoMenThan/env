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

        <div class="container section-corporate-partners">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="title-head-blue">
                        Corporate partners
                    </h2>
                    <img class="img-fluid d-lg-none d-block mb-center" src="<?php echo ASSET_URL?>images/img-network-green.png" alt="">
                    <p>
                        As a corporate partner, you will have access to the benefits from our channel partner program including resources from our pool of IT and software development expert partners. EnvZone works closely with a number of software development providers, across various industries, hence giving them the option to expand their service capabilities.
                    </p>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <img class="img-fluid d-none d-lg-block" src="<?php echo ASSET_URL?>images/img-network-green.png" alt="">
                </div>
            </div>
        </div>

        <div class="container-fluid section-what-you-get">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                        <img class="img-fluid d-lg-block d-none" src="<?php echo ASSET_URL?>images/img-diagram-green.png" alt="">
                    </div>
                    <div class="col-lg-8">
                        <h2 class="title-head-blue">
                            What you get
                        </h2>
                        <img class="img-fluid d-lg-none d-block mb-center" src="<?php echo ASSET_URL?>images/img-diagram-green.png" alt="">
                        <ul>
                            <li>
                                Ability to expand your business capability
                            </li>
                            <li>
                                Collaborate with you and your customers on your behalf
                            </li>
                            <li>
                                Ability to extend your services to solve bigger customer needs
                            </li>
                            <li>
                                Access to EnvZone developer and integration resources with competitive pricing
                            </li>
                            <li>
                                Access to a dedicated business and partner support team
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-become-partners">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="title-head-blue">
                        Become a coporate partner
                    </h2>
                    <p>
                        If you’re a sofware services company, you’ll love partnering with EnvZone. Once you complete the steps to become a partner, you’ll get access to the program’s many benefits. Including a dedicated account manager, support resources, and free advisor tools. Let’s get started!
                    </p>
                </div>
            </div>
            <div class="row justify-content-center box-form-process">
                <div class="col-lg-6">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-progress-bar-subscription-partnership.png" alt="">
                    <div class="box-form-have-title">
                        <div class="title">Tell us about yourself.</div>
                        <div class="get-started-form">
                            <?php echo do_shortcode('[gravityform id="28" title="false" description="false" ajax="true"]'); ?>
                        </div>
                    </div>
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