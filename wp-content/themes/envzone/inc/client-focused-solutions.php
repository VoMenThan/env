<?php
/* Template Name: CPY - Client focused solutions*/
get_header();
?>
<main class="main-content">
    <section class="banner-top banner-company bg-blue">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>">
        <h1><?php echo get_the_title();?></h1>
        <?php require_once "form-banner.php";?>
    </section>
    <div class="container">
        <div class="row">
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
    </div>
    <section class="artical-page client-focused-solutions-page">
        <div class="container">

            <div class="row box-green">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="title-blue-center">
                        <?php echo get_field('title_we_takes_the_stress', $post->ID);?>
                    </div>
                </div>
                <div class="col-lg-6 box-info">
                    <h3>
                        <?php echo get_field('title_cost_effective', $post->ID);?>
                    </h3>
                    <?php echo get_field('description_cost_affective', $post->ID);?>
                    <h3>
                        <?php echo get_field('title_eliminating', $post->ID);?>
                    </h3>
                    <?php echo get_field('description_eliminating', $post->ID);?>
                </div>
            </div>

            <div class="row box-staff">
                <div class="col-lg-6 col-md-6 order-lg-0 order-md-0 order-1 box-paragraph d-flex align-items-center">
                    <article class="paragraph">
                        <?php echo get_field('content_staff_augmentation', $post->ID);?>
                        <a href="<?php echo get_field('url_staff_augmentation', $post->ID);?>" class="learn-more mr-2">
                            <?php echo get_field('url_name_staff_augmentation', $post->ID);?>
                        </a>
                    </article>

                </div>
                <div class="col-lg-6 col-md-6 order-lg-1 order-md-1 order-0 box-img">
                    <h3><?php echo get_field('title_staff_augmentation', $post->ID);?></h3>
                    <img class="img-fluid" src="<?php echo get_field('image_staff_augmentation', $post->ID);?>" alt="">
                </div>
            </div>

            <div class="row box-staff">
                <div class="col-lg-6 col-md-6 box-img">
                    <h3><?php echo get_field('title_dedicated_team', $post->ID);?></h3>
                    <img class="img-fluid" src="<?php echo get_field('image_dedicated_team', $post->ID);?>" alt="">
                </div>
                <div class="col-lg-6 col-md-6 box-paragraph d-flex align-items-center">
                    <article class="paragraph">
                        <?php echo get_field('content_dedicated_team', $post->ID);?>
                        <a href="<?php echo get_field('url_dedicated_team', $post->ID);?>" class="learn-more">
                            <?php echo get_field('url_name_dedicated_team', $post->ID);?>
                        </a>
                    </article>

                </div>

            </div>

            <div class="row box-staff">
                <div class="col-lg-6 col-md-6 order-lg-0 order-md-0 order-1 box-paragraph d-flex align-items-center">
                    <article class="paragraph">
                        <?php echo get_field('content_project_based', $post->ID);?>
                        <a href="<?php echo get_field('url_project_based', $post->ID);?>" class="learn-more">
                            <?php echo get_field('url_name_project_based_model', $post->ID);?>
                        </a>
                    </article>
                </div>
                <div class="col-lg-6 col-md-6 order-lg-1 order-md-1 order-0 box-img">
                    <h3><?php echo get_field('title_project_based', $post->ID);?> </h3>
                    <img class="img-fluid" src="<?php echo get_field('image_project_based', $post->ID);?>" alt="">
                </div>
            </div>
        </div>
    </section>
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

    <?php require_once "popup-services.php";?>
</main>
<?php get_footer();?>