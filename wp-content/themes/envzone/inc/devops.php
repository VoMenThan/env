<?php
/* Template Name: SER - Devops*/
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
                        <li class="breadcrumb-item active" aria-current="page">DevOPS</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page service-page devops-page">
        <div class="container">

            <div class="row justify-content-md-center">
                <div class="col-lg-9">
                    <div class="description-overhead title-blue text-left">
                        <?php echo get_the_content();?>
                    </div>
                </div>
                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_our_process', $post->ID);?></h2>
                </div>
                <div class="col-12 text-center d-sm-block d-none">
                    <img class="img-fluid" src="<?php echo get_field('image_process', $post->ID);?>" alt="">
                </div>
                <div class="col-12 d-sm-none d-block">

                    <?php
                        $list_our_process = get_field('list_our_process', $post->ID);
                        foreach ($list_our_process as $item):
                    ?>
                    <div class="item-our-process clearfix">
                        <div class="box-img">
                            <img class="img-fluid" src="<?php echo $item['image_process']?>" alt="">
                            <div class="title-our-process">
                                <?php echo $item['title_process']?>
                            </div>
                        </div>
                        <p>
                            <?php echo $item['description_process']?>
                        </p>
                    </div>
                    <?php endforeach;?>

                </div>
                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_button_process', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_process', $post->ID);?>
                    </a>
                </div>
            </div>

            <div class="row justify-content-md-center mb-lg-5">
                <div class="col-12">
                    <h2 class="title-head-blue text-center"><?php echo get_field('title_we_offer', $post->ID);?></h2>
                </div>

                <div class="col-lg-12">
                    <div class="item-offer-experience">
                        <div class="topic-left">
                            <h3>
                                <?php echo get_field('title_broad_experience', $post->ID);?>
                            </h3>
                            <p>
                                <?php echo get_field('description_broad_experience', $post->ID);?>
                            </p>
                        </div>
                        <div class="topic-right">
                            <h3>
                                <?php echo get_field('title_niche_skills', $post->ID);?>
                            </h3>
                            <p>
                                <?php echo get_field('description_niche_skills', $post->ID);?>
                            </p>
                        </div>
                    </div>
                    <div class="item-offer-experience">
                        <div class="topic-left">
                            <h3>
                                <?php echo get_field('title_flexibility', $post->ID);?>
                            </h3>
                            <p>
                                <?php echo get_field('description_holistic_approach', $post->ID);?>
                            </p>
                        </div>
                        <div class="topic-right">
                            <h3>
                                <?php echo get_field('title_holistic_approach', $post->ID);?>
                            </h3>
                            <p>
                                <?php echo get_field('description_holistic_approach', $post->ID);?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_button_requirement', $post->ID);?>" class="btn btn-blue-env"><?php echo get_field('name_button_requirement', $post->ID);?></a>
                </div>
            </div>

        </div>
    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-devops-services.png" alt="">
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
    <script src="//code.tidio.co/ljas59smx8hit2eissvid4hjv10sit8t.js"></script>
<?php get_footer();?>