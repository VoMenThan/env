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
                        <?php echo get_field('title_corporate_partners', $post->ID);?>
                    </h2>
                    <img class="img-fluid d-lg-none d-block mb-center" src="<?php echo get_field('image_corporate_partners', $post->ID);?>" alt="">
                    <?php echo get_field('description_corporate_partners', $post->ID);?>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <img class="img-fluid d-none d-lg-block" src="<?php echo get_field('image_corporate_partners', $post->ID);?>" alt="">
                </div>
            </div>
        </div>

        <div class="container-fluid section-what-you-get">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                        <img class="img-fluid d-lg-block d-none" src="<?php echo get_field('image_what_you_get', $post->ID);?>" alt="">
                    </div>
                    <div class="col-lg-8">
                        <h2 class="title-head-blue">
                            <?php echo get_field('title_what_you_get', $post->ID);?>
                        </h2>
                        <img class="img-fluid d-lg-none d-block mb-center" src="<?php echo get_field('image_what_you_get', $post->ID);?>" alt="">
                        <?php echo get_field('description_what_you_get', $post->ID);?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-become-partners">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="title-head-blue">
                        <?php echo get_field('title_become_a_corporate_partner', $post->ID);?>
                    </h2>
                    <p>
                        <?php echo get_field('description_become_a_corporate_partner', $post->ID);?>
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

        <?php require_once "popup-company.php";?>
    </section>
</main>