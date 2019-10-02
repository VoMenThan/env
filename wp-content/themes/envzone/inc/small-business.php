<?php
/* Template Name: SER - Small business*/
get_header();
?>
<main class="main-content">
    <div class="container-fluid nav-small-business">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="#" class="active">
                        Small Business
                    </a>
                    <a href="<?php echo home_url('coverage-locations')?>">
                        Coverage Locations
                    </a>
                    <a href="<?php echo home_url('plans-and-pricing')?>">
                        Pricing
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="banner-top bg-blue  banner-industries banner-small-business">
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


    <?php $trusted_by_hundreds = get_field('trusted_by_hundreds');?>
    <section class="artical-page service-page small-business-page">
        <div class="container-fluid section-top-customer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3><?php echo $trusted_by_hundreds['headline'];?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-customers justify-content-around d-flex flex-wrap">
                        <?php foreach ($trusted_by_hundreds['logo_company'] as $item):?>
                        <img class="img-fluid" src="<?php echo $item['url'];?>">
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>



        <div class="container box-list-digital-world">
            <?php $digital_world = get_field('digital_world');?>
            <div class="row section-digital-world">
                <div class="col-lg-6 order-lg-0 order-1">
                    <h2><?php echo $digital_world['title'];?></h2>
                    <p>
                        <?php echo $digital_world['description'];?>
                    </p>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $digital_world['image'];?>" alt="">
                </div>
            </div>
            <?php $online_presence = get_field('online_presence');?>
            <div class="row section-digital-world">
                <div class="col-lg-6">
                    <img class="img-fluid" src="<?php echo $online_presence['image'];?>" alt="">
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $online_presence['title'];?></h2>
                    <p>
                        <?php echo $online_presence['description'];?>
                    </p>
                </div>
            </div>
            <?php $get_a_manager = get_field('get_a_manager');?>
            <div class="row section-digital-world">
                <div class="col-lg-6 order-lg-0 order-1">
                    <h2><?php echo $get_a_manager['title'];?></h2>
                    <p>
                        <?php echo $get_a_manager['description'];?>
                    </p>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $get_a_manager['image'];?>" alt="">
                </div>
            </div>
            <?php $only_actual = get_field('only_actual');?>
            <div class="row section-digital-world">
                <div class="col-lg-6">
                    <img class="img-fluid" src="<?php echo $only_actual['image'];?>" alt="">
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $only_actual['title'];?></h2>
                    <p>
                        <?php echo $only_actual['description'];?>
                    </p>
                </div>
            </div>
            <?php $work_smarter = get_field('work_smarter');?>
            <div class="row section-digital-world">
                <div class="col-lg-6 order-lg-0 order-1">
                    <h2><?php echo $work_smarter['title'];?></h2>
                    <p>
                        <?php echo $work_smarter['description'];?>
                    </p>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $work_smarter['image'];?>" alt="">
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container section-your-business">
                <div class="row box-peace-of-mind">
                    <div class="col-lg-8">
                        <?php echo get_field('really_frustrated');?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php $offer_your_small_business = get_field('offer_your_small_business');?>
            <div class="row box-originally-hard">
                <div class="col-lg-12">
                    <h2><?php echo $offer_your_small_business['title'];?></h2>
                </div>

                <?php foreach ($offer_your_small_business['item'] as $item):?>
                <div class="col-lg-4 d-flex">
                    <div class="item-originally-hard">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M56 40C56 44.2435 54.3143 48.3131 51.3137 51.3137C48.3131 54.3143 44.2435 56 40 56C35.7565 56 31.6869 54.3143 28.6863 51.3137C25.6857 48.3131 24 44.2435 24 40C24 35.7565 25.6857 31.6869 28.6863 28.6863C31.6869 25.6857 35.7565 24 40 24C41.52 24 43 24.22 44.4 24.62L47.54 21.48C45.22 20.52 42.68 20 40 20C37.3736 20 34.7728 20.5173 32.3463 21.5224C29.9198 22.5275 27.715 24.0007 25.8579 25.8579C22.1071 29.6086 20 34.6957 20 40C20 45.3043 22.1071 50.3914 25.8579 54.1421C27.715 55.9993 29.9198 57.4725 32.3463 58.4776C34.7728 59.4827 37.3736 60 40 60C45.3043 60 50.3914 57.8929 54.1421 54.1421C57.8929 50.3914 60 45.3043 60 40H56ZM31.82 36.16L29 39L38 48L58 28L55.18 25.16L38 42.34L31.82 36.16Z" fill="#AEE366"/>
                        </svg>
                        <p>
                            <?php echo $item['content'];?>
                        </p>
                    </div>
                </div>
                <?php endforeach;?>


            </div>

            <?php $easy_onboarding_plan = get_field('easy_onboarding_plan');?>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="box-header text-center">
                        <h2><?php echo $easy_onboarding_plan['title'];?></h2>
                        <p>
                            <?php echo $easy_onboarding_plan['description'];?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($easy_onboarding_plan['item'] as $item):?>
                <div class="col-lg-4 item-build text-center">
                    <div class="block-expanded clearfix">
                        <img src="<?php echo $item['image'];?>" alt="">
                        <h3><?php echo $item['title'];?></h3>
                    </div>
                    <div class="content-expanded">
                        <?php echo $item['list'];?>
                    </div>
                </div>
                <?php endforeach;?>

                <div class="col-lg-12 text-right box-button">
                    <a href="<?php echo $easy_onboarding_plan['link_button'];?>" class="btn btn-blue-env"><?php echo $easy_onboarding_plan['button_name'];?></a>
                </div>
            </div>

            <?php $success_takes_team = get_field('success_takes_team');?>
            <div class="row section-support-experience">
                <div class="col-lg-8 box-support-experience">
                    <h2><?php echo $success_takes_team['title'];?></h2>
                </div>
                <div class="col-lg-12 text-center flow-how-it-work">
                    <img class="img-fluid d-lg-block d-none" src="<?php echo $success_takes_team['image_pc'];?>" alt="">
                    <img class="img-fluid d-lg-none d-block" src="<?php echo $success_takes_team['image_mb'];?>" alt="">
                </div>
            </div>
        </div>

        <?php $solution_that_helps = get_field('solution_that_helps');?>
        <div class="container-fluid bg-green-solution">
            <div class="container section-your-business">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2>
                            <?php echo $solution_that_helps['title'];?>
                        </h2>
                    </div>
                    <div class="col-lg-10">
                        <?php echo $solution_that_helps['description'];?>
                    </div>
                </div>
            </div>
        </div>


        <div class="container section-the-success-business">
            <?php $the_success_business = get_field('the_success_business');?>
            <div class="row">
                <div class="col-lg-8">
                    <h2><?php echo $the_success_business['title'];?></h2>
                </div>
            </div>
            <div class="row section-digital-world section-your-business pt-0">
                <div class="col-lg-6 order-lg-0 order-1">
                    <?php echo $the_success_business['description'];?>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $the_success_business['image'];?>" alt="">
                </div>
            </div>
            <?php $premium_access = get_field('premium_access');?>
            <div class="row section-digital-world">
                <div class="col-lg-6">
                    <img class="img-fluid" src="<?php echo $premium_access['image'];?>" alt="">
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $premium_access['title'];?></h2>
                    <p>
                        <?php echo $premium_access['description'];?>
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container section-your-business">
                <div class="row">
                    <div class="col-lg-8">
                        <?php echo get_field('envzone_gives');?>
                    </div>
                </div>
            </div>
        </div>

        <?php $your_current_action = get_field('your_current_action');?>
        <div class="container section-current-action-matters">
            <div class="row box-your-current-action">
                <div class="col-lg-12">
                    <h2 class="text-center"><?php echo $your_current_action['title'];?></h2>
                </div>
                <div class="col-lg-8">
                    <p>
                        <?php echo $your_current_action['description'];?>
                    </p>
                </div>
            </div>
            <div class="row section-digital-world section-your-business pt-0">
                <div class="col-lg-6">
                    <?php echo $your_current_action['list'];?>
                </div>
                <div class="col-lg-12 text-center box-button">
                    <a href="<?php echo $your_current_action['link_button'];?>" class="btn btn-blue-env"><?php echo $your_current_action['button_name'];?></a>
                </div>
            </div>
        </div>
    </section>
    <script src="//code.tidio.co/ljas59smx8hit2eissvid4hjv10sit8t.js"></script>
</main>
<?php get_footer();?>