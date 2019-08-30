<?php
/* Template Name: SER - Full cycle development*/
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
                        <li class="breadcrumb-item active" aria-current="page">Full Cycle Development</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page service-page full-cycle-development-page">
        <div class="container">

            <div class="row justify-content-md-center box-solves-business mb-200">
                <div class="col-md-8">
                    <h2 class="title-head-blue text-center pt-4">
                        CREATE SOFTWARE THAT SOLVES BUSINESS PROBLEM
                    </h2>
                    <div class="description-overhead text-center">
                        The full cycle development is the ideal choice for any organization want a team of full cycle developers to handle the whole process of full software life cycle. So the business owners, leaders don’t have to worry about other third-party providers.
                    </div>
                </div>
                <div class="col-lg-12 text-center box-development-team">
                    <h3>
                        The Roles in Full Cycle Development Team Who Work Directly with Your Company
                    </h3>
                    <img class="img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/img-full-cycle-development-team.png" alt="">
                    <img class="img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/img-full-cycle-development-team-mb.png" alt="">
                </div>
                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo home_url('contact-us');?>" class="btn btn-blue-env">
                        GET A FULL CYCLE DEVELOPMENT TEAM
                    </a>
                </div>

            </div>

            <div class="row justify-content-md-center mb-200">
                <div class="col-lg-5">
                    <h2 class="title-head-blue title-head-blue-3  text-center pt-3">
                        <?php echo get_field('title_product_development', $post->ID);?>
                    </h2>
                </div>
                <div class="col-lg-7">
                    <div class="description-overhead">
                        <?php echo get_field('description_product_development', $post->ID);?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="title-blue"><?php echo get_field('subtitle_product_development', $post->ID);?></div>
                    <div class="row justify-content-center">
                        <?php $list_product =  get_field('list_product_development', $post->ID);
                        foreach ($list_product as $item):
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                <div class="item-product-development full-cycle-pt">
                                    <?php echo $item['name_product'];?>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>

                </div>

                <div class="col-12 text-center btn-learn-more">
                    <a href="<?php echo get_field('link_button_requirement', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_requirement', $post->ID);?>
                    </a>
                </div>
            </div>

            <div class="row justify-content-md-center box-development mb-200">
                <div class="col-lg-5">
                    <h2 class="title-head-blue text-center">
                        <?php echo get_field('title_custom_software_development', $post->ID);?>
                    </h2>
                </div>
                <div class="col-lg-7">
                    <div class="description-overhead">
                        <?php echo get_field('description_custom_software_development', $post->ID);?>
                    </div>
                </div>

                <?php $list_software =  get_field('list_software_development', $post->ID);
                    foreach ($list_software as $item):
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="item-custom-software d-flex align-items-center justify-content-center">
                        <h3>
                            <?php echo $item['name_software_development'];?>
                        </h3>
                    </div>
                </div>
                <?php endforeach;?>


                <div class="col-12 text-center btn-submit">
                    <a href="<?php echo get_field('link_button_custom_software', $post->ID);?>" class="btn btn-blue-env">
                        <?php echo get_field('name_button_custom_software', $post->ID);?>
                    </a>
                </div>
            </div>

            <div class="row box-staffing-expensive">
                <div class="col-lg-8">
                    <h2 class="title-head-blue text-center">STAFFING IS EXPENSIVE, THE OFFSHORE SDLC TEAM IS THE CHOICE</h2>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <p class="description-staffing description-overhead">
                        A team that utilizes development expertise to solve problems across life cycle is your driving factor for business success
                    </p>
                </div>
                <div class="col-lg-6 text-lg-left text-center mt-5">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-areas-of-software.png" alt="">
                </div>
            </div>
            <div class="row justify-content-center box-yourself-overload">
                <div class="col-lg-6 text-center">
                    <p>
                        Don’t Get Yourself Overload and Burnout!
                    </p>
                    <p>
                        <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M45.8333 91.6667L12.5 91.6667L70.8333 150L129.167 91.6667L95 91.6667C95 50 108.333 20.8333 137.5 -5.46392e-06C95.8333 8.33332 54.1667 33.3333 45.8333 91.6667Z" fill="#0D3153"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="150" height="150" fill="white" transform="translate(0 150) rotate(-90)"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Get Help Here!
                    </p>
                </div>
                <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'offset'=> 0,
                        'post_type' => 'knowledge_center',
                        'orderby' => 'post_modified',
                        'order' =>'desc',
                        'meta_query' => array(
                            'relation' => 'OR',
                            array(
                                'key' => 'video_show',
                                'value' => 'knowledge-center',
                                'compare' => 'LIKE',
                            )
                        )
                    );
                    $video_main = get_posts( $args );
                ?>
                <div class="col-lg-8 video-play mb-200">
                    <div class="embed-video">
                        <?php echo get_field('embed', $video_main[0]->ID);?>
                    </div>
                    <h3>
                        3 Reasons-Why You Should Let an Outsourcing Advisor be a Part of Your Team
                    </h3>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-6 justify-content-center d-flex">
                    <div class="box-calculate">
                        <p>
                            Calculate your company’s potential savings with EnvZone’s solution using this handy tool.
                        </p>

                    </div>

                </div>

                <div class="col-lg-6 text-lg-left text-center">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-chart-cost-outsourcing-advisor.png" alt="">
                </div>
                <div class="col-lg-6 d-flex justify-content-center mb-200">
                    <div class="box-calculate">
                        <a href="<?php echo home_url("cost-estimator ");?>" class="btn btn-green-env btn-get-calculate">
                            CALCULATE NOW
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.05175 6.03448H6.89658V3.87931C6.89658 3.64095 6.70348 3.44827 6.46554 3.44827C6.22761 3.44827 6.03451 3.64095 6.03451 3.87931V6.03448H3.87934C3.64141 6.03448 3.4483 6.22715 3.4483 6.46551C3.4483 6.70388 3.64141 6.89655 3.87934 6.89655H6.03451V9.05172C6.03451 9.29008 6.22761 9.48275 6.46554 9.48275C6.70348 9.48275 6.89658 9.29008 6.89658 9.05172V6.89655H9.05175C9.28968 6.89655 9.48279 6.70388 9.48279 6.46551C9.48279 6.22715 9.28968 6.03448 9.05175 6.03448Z" fill="#0D3153"/>
                                <path d="M21.1207 6.03448H15.9482C15.7103 6.03448 15.5172 6.22716 15.5172 6.46552C15.5172 6.70388 15.7103 6.89655 15.9482 6.89655H21.1207C21.3586 6.89655 21.5517 6.70388 21.5517 6.46552C21.5517 6.22716 21.3586 6.03448 21.1207 6.03448Z" fill="#0D3153"/>
                                <path d="M12.931 0H12.069H0V12.069V12.931V25H12.069H12.931H25V12.931V12.069V0H12.931ZM0.862069 0.862069H12.069V12.069H0.862069V0.862069ZM0.862069 24.1379V12.931H12.069V24.1379H0.862069ZM24.1379 24.1379H12.931V12.931H24.1379V24.1379ZM12.931 12.069V0.862069H24.1379V12.069H12.931Z" fill="#0D3153"/>
                                <path d="M15.9482 20.2586H21.1207C21.3586 20.2586 21.5517 20.0659 21.5517 19.8276C21.5517 19.5892 21.3586 19.3965 21.1207 19.3965H15.9482C15.7103 19.3965 15.5172 19.5892 15.5172 19.8276C15.5172 20.0659 15.7103 20.2586 15.9482 20.2586Z" fill="#0D3153"/>
                                <path d="M15.9482 17.6724H21.1207C21.3586 17.6724 21.5517 17.4797 21.5517 17.2414C21.5517 17.003 21.3586 16.8103 21.1207 16.8103H15.9482C15.7103 16.8103 15.5172 17.003 15.5172 17.2414C15.5172 17.4797 15.7103 17.6724 15.9482 17.6724Z" fill="#0D3153"/>
                                <path d="M8.92544 16.0746C8.75691 15.906 8.48449 15.906 8.31596 16.0746L6.46553 17.925L4.61509 16.0746C4.44656 15.906 4.17415 15.906 4.00561 16.0746C3.83708 16.2431 3.83708 16.5155 4.00561 16.684L5.85604 18.5345L4.00561 20.3849C3.83708 20.5534 3.83708 20.8258 4.00561 20.9944C4.08966 21.0784 4.20001 21.1207 4.31035 21.1207C4.4207 21.1207 4.53104 21.0784 4.61509 20.9944L6.46553 19.1439L8.31596 20.9944C8.40001 21.0784 8.51035 21.1207 8.6207 21.1207C8.73104 21.1207 8.84139 21.0784 8.92544 20.9944C9.09398 20.8258 9.09398 20.5534 8.92544 20.3849L7.07501 18.5345L8.92544 16.684C9.09398 16.5155 9.09398 16.2431 8.92544 16.0746Z" fill="#0D3153"/>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--WHY BUSINESS-->
    <div class="box-why-business why-industries">
        <img class="img-industries img-fluid" src="<?php echo ASSET_URL;?>images/img-bg-full-cycle-development-services.png" alt="">
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