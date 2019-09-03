<?php
/* Template Name: CPY - Process framework*/
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
    <section class="artical-page process-framework-page">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="box-introduct">
                        <h2 class="title-head-blue"><?php echo get_field('title_we_work', $post->ID);?></h2>
                        <?php echo get_field('content_we_work', $post->ID);?>
                         <div class="col-lg-12 text-center order-2">
                            <a href="<?php echo get_field('url_connect_me', $post->ID);?>" class="btn btn-blue-env mt-5">
                                <?php echo get_field('button_name_connect_me', $post->ID);?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container">
                <div class="row box-development-process">
                    <div class="col-12">
                        <h2 class="title-head-blue title-top"><?php echo get_field('title_our_development_process', $post->ID);?></h2>
                    </div>
                    <div class="col-lg-4 order-lg-0 order-1 pb-3">
                        <p>
                            <?php echo get_field('description_our_development', $post->ID);?>
                        </p>
                    </div>
                    <div class="col-lg-8 order-lg-1 order-0 pb-3">
                        <img src="<?php echo get_field('image_our_development', $post->ID);?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-12 order-2">
                        <a href="<?php echo get_field('url_button_implement', $post->ID);?>" class="btn btn-blue-env">
                            <?php echo get_field('button_name_implement', $post->ID);?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-head-blue title-top">
                        <?php echo get_field('title_discovery', $post->ID);?>
                    </h2>
                </div>
            </div>
            <div class="row box-list-deliverables">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4>
                        <?php echo get_field('subtitle_discovery', $post->ID);?>
                    </h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <p class="p-header">
                        <?php echo get_field('description_discovery', $post->ID);?>
                    </p>
                </div>

                <?php $list_discovery = get_field('list_discovery', $post->ID);
                foreach ($list_discovery as $item):
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-lg-0 mb-4">
                        <article class="item-discovery">
                            <img src="<?php echo $item['icon'];?>" alt="">
                            <h6><?php echo $item['title'];?></h6>
                            <p>
                                <?php echo $item['description'];?>
                            </p>
                        </article>
                    </div>
                <?php endforeach;?>

                <div class="col-lg-12 text-right py-lg-5">
                    <a href="<?php echo get_field('url_button_discovery', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('button_name_discovery', $post->ID);?>
                    </a>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="title-head-blue title-top"><?php echo get_field('title_initial_engagement', $post->ID);?></h2>
                </div>
            </div>
            <div class="row box-list-deliverables">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4><?php echo get_field('subtitle_initial_engagement', $post->ID);?></h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <p class="p-header">
                        <?php echo get_field('description_initial_engagement', $post->ID);?>
                    </p>
                </div>

                <?php $list_initial_engagement = get_field('list_initial_engagement', $post->ID);
                foreach ($list_initial_engagement as $item):
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-lg-0 mb-4">
                        <article class="item-discovery">
                            <img src="<?php echo $item['icon'];?>" alt="">
                            <h6><?php echo $item['title'];?></h6>
                            <p>
                                <?php echo $item['description'];?>
                            </p>
                        </article>
                    </div>
                <?php endforeach;?>

                <div class="col-lg-12 text-right py-lg-5">
                    <a href="<?php echo get_field('url_initial_engagement', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('button_name_initial_engagement', $post->ID);?>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="title-head-blue title-top"><?php echo get_field('title_development_process', $post->ID);?></h2>
                </div>
            </div>
            <div class="box-list-deliverables">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-4">
                        <h4><?php echo get_field('title_development_process', $post->ID);?></h4>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-8">
                        <p class="p-header">
                            <?php echo get_field('description_development_process', $post->ID);?>
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php $list_development_process = get_field('list_development_process', $post->ID);
                    foreach ($list_development_process as $item):
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 mb-lg-0 mb-4">
                            <article class="item-discovery">
                                <img src="<?php echo $item['icon'];?>" alt="">
                                <h6><?php echo $item['title'];?></h6>
                                <p>
                                    <?php echo $item['description'];?>
                                </p>
                            </article>
                        </div>
                    <?php endforeach;?>
                    <div class="col-lg-12 text-right py-lg-5">
                        <a href="<?php echo get_field('url_development_process', $post->ID);?>" class="btn btn-blue-env">
                            <?php echo get_field('button_name_development_process', $post->ID);?>
                        </a>
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

        <?php require_once "popup-services.php";?>
    </section>
</main>
<?php get_footer();?>