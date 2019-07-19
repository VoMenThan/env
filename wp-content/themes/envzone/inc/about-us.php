<?php
/* Template Name: CPY - About Us*/
get_header();
?>
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

    <section class="artical-page about-us-page">

        <div class="container section-represent">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-head-about-us">
                        <h2>
                            <?php echo get_field('title_represent_us', $post->ID);?>
                        </h2>
                        <p>
                            <?php echo get_field('description_represent_us', $post->ID);?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 justify-content-center align-items-center d-flex">
                    <img class="img-fluid" src="<?php echo get_field('image_represent_us', $post->ID);?>" alt="">
                </div>
                <div class="col-lg-5">
                    <div class="get-started-form">
                        <div class="title-form">Talk to the team.</div>
                        <?php
                            echo do_shortcode('[gravityform id="19" title="false" description="false"]');
                        ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid section-think-boundlessly">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-6 box-head-about-us">
                        <h2>
                            <?php echo get_field('title_think_boundlessly', $post->ID);?>
                        </h2>
                    </div>
                    <div class="col-lg-8 col-6 text-center box-things-you-love">
                        <img class="img-fluid" src="<?php echo get_field('image_think_boundlessly', $post->ID);?>" alt="">
                    </div>
                    <div class="col-lg-8 offset-lg-4 text-center">
                        <p>
                            <?php echo get_field('description_think_boundlessly', $post->ID);?>
                        </p>
                        <a href="<?php echo get_field('url_button_think_boundlessly', $post->ID);?>" class="btn btn-green-env">
                            <?php echo get_field('button_name_think_boundlessly', $post->ID);?>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container section-mission-vision">
            <div class="row box-vision">
                <div class="col-lg-6 justify-content-center align-items-center d-flex">
                    <img class="img-fluid" src="<?php echo get_field('image_vision', $post->ID);?>" alt="">
                </div>

                <div class="col-lg-6">
                    <div class="item-vision">
                        <h2><?php echo get_field('title_vision', $post->ID);?></h2>
                        <?php echo get_field('description_vision', $post->ID);?>
                    </div>
                </div>
            </div>

            <div class="row box-vision">
                <div class="col-lg-6 order-lg-0 order-1">
                    <div class="item-vision">
                        <h2><?php echo get_field('title_our_mission', $post->ID);?></h2>
                        <?php echo get_field('description_our_mission', $post->ID);?>
                    </div>
                </div>

                <div class="col-lg-6 order-lg-1 order-0 justify-content-center align-items-center d-flex">
                    <img class="img-fluid" src="<?php echo get_field('image_our_mission', $post->ID);?>" alt="">
                </div>

            </div>
        </div>

        <div class="container-fluid section-headquarters">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <?php echo get_field('information_headquarters', $post->ID);?>
                    </div>
                    <div class="col-lg-7">
                        <img class="img-fluid" src="<?php echo get_field('image_headquarters', $post->ID);?>" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-video-knowledge">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="embed-video">
                        <?php
                            $id_video = get_field('video_knowledge', $post->ID)->ID;
                            echo get_field('embed', $id_video);
                        ?>
                    </div>
                    <h3 class="title-video">
                        <?php echo get_field('video_knowledge', $post->ID)->post_title;?>
                    </h3>
                </div>
            </div>
        </div>

        <div class="container-fluid section-find-your-team">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2>
                            Now, it’s time to find your team.
                        </h2>
                        <div class="get-started-form">
                            <?php echo do_shortcode('[gravityform id="12" title="false" description="false"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container section-more-about-envzone">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?php echo get_field('title_learn_more_about_envzone', $post->ID);?></h2>
                </div>
                <?php $list_more = get_field('list_learn_more', $post->ID);
                    foreach ($list_more as $item):
                ?>
                <div class="col-lg-4">
                    <a href="<?php echo $item['url'];?>" class="item-about-envzone">
                        <img src="<?php echo $item['icon'];?>" alt="">
                        <h3><?php echo $item['title'];?></h3>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="container-fluid section-careers-footer">
            <div class="container">
                <div class="row">
                    <?php $list_relate = get_field('list_relationship', $post->ID);
                    foreach ($list_relate as $item):
                    ?>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?php echo $item['url'];?>" class="item-contact-us">
                            <div class="note-tag"><?php echo $item['tag_note'];?></div>
                            <h3><?php echo $item['title'];?></h3>
                        </a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <?php require_once "popup-company.php";?>
    </section>
</main>
<?php get_footer();?>