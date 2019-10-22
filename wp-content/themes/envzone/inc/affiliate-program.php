<?php
    /* Template Name: QUICK - Affiliate Program*/
get_header();
?>
<main class="main-content">
    <section class="banner-top bg-blue  banner-industries banner-small-business banner-affiliate-program">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-info-small-business">
                        <?php echo get_the_content();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="artical-page affiliate-program-page legals-page">
        <?php $how_it_works = get_field('how_it_works'); ?>
        <div class="container section-how-it-works">
            <div class="row justify-content-center">
                <div class="col-md-12 col-12 box-head">
                    <h2><?php echo $how_it_works['title'];?></h2>
                    <p><?php echo $how_it_works['description'];?></p>
                </div>
                <?php foreach ($how_it_works['list_item'] as $item):?>
                <div class="col-lg-4">
                    <div class="item-it-work item-shadow">
                        <h3><?php echo $item['title'];?></h3>
                        <img src="<?php echo $item['icon'];?>" alt="">
                        <p>
                            <?php echo $item['description'];?>
                        </p>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <?php $what_in_it_for_you = get_field('what_in_it_for_you');?>
        <div class="container-fluid section-it-for-you">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><?php echo $what_in_it_for_you['title'];?></h2>
                    </div>
                    <?php foreach ($what_in_it_for_you['list_item'] as $item):?>
                    <div class="col-lg-4">
                        <div class="item-it-for-you item-shadow">
                            <h3><?php echo $item['title'];?></h3>
                            <p>
                                <?php echo $item['description'];?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <?php $a_saas_professional = get_field('a_saas_professional');?>
        <div class="container section-sass-professional">
            <div class="row">
                <div class="col-lg-6">
                    <h2>
                        <?php echo $a_saas_professional['title'];?>
                    </h2>
                    <p>
                        <?php echo $a_saas_professional['description'];?>
                    </p>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="<?php echo $a_saas_professional['image'];?>" alt="">
                </div>
            </div>
        </div>

        <?php $it_easy_to_get_started = get_field('it_easy_to_get_started');?>
        <div class="container-fluid section-easy-started">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-lg-0 order-1 d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="<?php echo $it_easy_to_get_started['image'];?>" alt="">
                    </div>
                    <div class="col-lg-6 order-lg-1 order-0">
                        <h2>
                            <?php echo $it_easy_to_get_started['title'];?>
                        </h2>
                        <p>
                            <?php echo $it_easy_to_get_started['description'];?>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <?php $resources_designed = get_field('resources_designed');?>
        <div class="container section-resources-designed">
            <div class="row">
                <div class="col-lg-6">
                    <h2>
                        <?php echo $resources_designed['title'];?>
                    </h2>
                    <img class="img-fluid d-lg-none d-block img-mb" src="<?php echo $resources_designed['image'];?>" alt="">
                    <?php echo $resources_designed['description'];?>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <img class="img-fluid d-lg-block d-none" src="<?php echo $resources_designed['image'];?>" alt="">
                </div>
            </div>
        </div>


        <?php $earn_45_for_every_sale = get_field('earn_45_for_every_sale');?>
        <div class="container-fluid section-every-sale">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>
                            <?php echo $earn_45_for_every_sale['title'];?>
                        </h2>
                        <p>
                            <?php echo $earn_45_for_every_sale['description'];?>
                        </p>
                        <a href="<?php echo $earn_45_for_every_sale['url_button'];?>" target="_blank" class="btn btn-green-env"><?php echo $earn_45_for_every_sale['button_name'];?></a>
                    </div>
                </div>
            </div>
        </div>

        <?php $join_the_envzone = get_field('join_the_envzone');?>
        <div class="container section-join-affiliate-program">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $join_the_envzone['title'];?></h2>
                </div>
                <div class="col-lg-6 box-content-join">
                    <?php echo $join_the_envzone['description'];?>
                </div>
            </div>
            <div class="row justify-content-center box-already-affiliate">
                <div class="col-lg-8 text-center">
                    <h3><?php echo $join_the_envzone['title_already'];?></h3>
                    <a href="<?php echo $join_the_envzone['url_button_already'];?>" target="_blank" class="btn btn-blue-env"><?php echo $join_the_envzone['button_name_already'];?></a>
                    <p>
                        <?php echo $join_the_envzone['description_already'];?>
                    </p>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer();?>
