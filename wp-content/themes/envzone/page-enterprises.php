<?php
    /* Template Name: Enterprises*/
    get_header();
?>

<!--SLIDER HOME-->
<div class="container-fluid p-0 position-relative box-slider">

    <div class="owl-carousel slider-home owl-theme">
        <div class="item">
            <img src="<?php echo get_the_post_thumbnail_url();?>">
            <div class="container">
                <article class="box-headline">
                    <h1 class="head-line-envzone">
                        SEE THE POTENTIAL <span>SAVINGS</span> YOU COULD ACHIEVE
                    </h1>
                    <p>
                        Calculate your company’s potential savings with EnvZone’s solution using this handy tool.
                    </p>
                    <span class="direction-arrow">
                       <svg width="60" height="50" viewBox="0 0 60 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path d="M59.4244 37.3492L59.4263 37.3508C59.4281 37.3531 59.43 37.3555 59.4319 37.3586C59.5931 37.5109 59.7113 37.6945 59.8059 37.8883C59.8359 37.9477 59.8556 38.0039 59.8772 38.0641C59.9316 38.2133 59.9653 38.368 59.9766 38.5297C59.9822 38.5891 59.9934 38.6453 59.9916 38.7063C59.9916 38.7375 60.0009 38.7656 59.9991 38.7961C59.9859 38.9828 59.9409 39.1633 59.8716 39.3328C59.8659 39.3508 59.8509 39.3649 59.8434 39.3828C59.7609 39.5695 59.6428 39.7352 59.5031 39.8867C59.4834 39.9078 59.4769 39.9359 59.4562 39.957L49.7897 49.4461C49.05 50.1727 47.8359 50.1867 47.0766 49.475C46.3191 48.7641 46.305 47.5984 47.0466 46.8703L52.2572 41.7539C44.6437 42.5945 37.1597 41.2594 36.8062 41.1938C13.7006 37.7039 -2.65032 19.9227 0.356246 1.55626C0.505308 0.646889 1.32 1.52588e-05 2.24906 1.52588e-05C2.34843 1.52588e-05 2.44781 0.00704575 2.54906 0.0211067C3.59531 0.179703 4.30968 1.12189 4.14656 2.12736C1.46812 18.4867 16.3866 34.3789 37.4625 37.5633C37.5591 37.582 45.2916 38.9649 52.5722 38.0117L44.5312 34.0328C43.5891 33.5656 43.2206 32.4547 43.7053 31.5508C44.1891 30.6453 45.3441 30.2945 46.2891 30.7563L58.9641 37.0281C59.1356 37.1149 59.2894 37.2234 59.4244 37.3492Z" fill="#8DC63F"/>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="60" height="50" fill="white" transform="matrix(1 0 0 -1 0 50)"/>
                            </clipPath>
                        </defs>
                    </svg>
                    </span>

                    <a href="<?php echo home_url("cost-estimator ");?>" class="btn btn-green-env btn-get-started">
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
                </article>
            </div>
        </div>
    </div>

    <!--INFORMED-->
    <div class="title-security">
        <i class="icon-security"></i>
        Be Informed. Be Protected. Be outsourcing fearless.
    </div>
    <!--END INFORMED-->

    <!--BUTTON DOWN-->
    <a href="#analyze-keyword" class="btn-scroll-bottom">
        <i class="icon-arrow-down-green"></i>
    </a>
    <!--BUTTON DOWN-->

    <div class="connect-social d-lg-block d-none">
        <h3>
            Your best choice of offshore software outsourcing
        </h3>
        <ul class="best-choose">
            <li class="item-best-choose">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="11" height="11" fill="url(#pattern0)"/>
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0" transform="scale(0.0078125)"/>
                        </pattern>
                        <image id="image0" width="128" height="128" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACT1BMVEUAAAD9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/v9+/sAAABGmFfSAAAAw3RSTlMAFicCRt31hwYdvf7KEhnbzhXVzxMR0A4UC8TRCNK2BK9tp8YBn/KXjoXZCXzqKXPuL2rxNWL0O1r990JS+/lISvpQQ/xXPV82ZzDvcCvreSbngiHjixzelBid1KUQrAMNyLQFCsK7B8GtRTPTofBhFyDfnOCQjOJ/gyVuKl5PaPhBPPPsyeVR3Flsacu6cix7JOaEH42VG5am2J61w0wPza4+DNoywLwouR6yNKujm5Kqj7MxN0RLQGtOb4aBkz9NXDmXNvpOAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAN1wAADdcBQiibeAAAAAd0SU1FB+IMBxIkO5A+ug0AAARRSURBVHja7dv5VxNXFAfwC6lUCCgIBqFAFGLUoIhGtmBE3AWNoqiIoAhuLa1F20IXtViXWru37kup+94qdq/a1vePOSooy3xn3kxmbs7pme+vvPs+7ySZvHdnApETJ06cOHHihD9x8a5Y8q+MECLh1ZGx4hOT3OJpklNi448aLfqSGpMVpI0RL5Kewe+P9YgB8bCvIDNZDIpnHK+flS2G5DXWFeQkiWHJZVzByDyhkmy2ryTveKGaCUy+K1/dFwU8vm8i8IWfZwGTkC88LP5k6IspHP4U7AcKGfyp2J9WxOBPx37xDAZ/JvaDsxj8Ejf0S8sY/PIK6IcqGfzZYejPqWLw51ZDPzyPwZ8fgv6ChQz+ogTouxcz+Ev8+AJcyuDX1GJ/GYO/PIL9FQz+yjrsr2LwV9djfw2Dv3Yd9hsY/PUB7Df67PfHbcB+E8MxvDkV+xs32e+3bMZ+a5v9/pat2N+23X4/Zxv2d2yx329rxf7mFvt97+vYT23WLc94oz26D4mrCftv6jbizW8pw3a+HYXva8R+oEOvetfu5yPfMf9N1YD9dWt1/Xf7x75n1u/EftcueV+I9835H2C/7kMjvhAfmfFXYD+yx5gv3HuN+8uwX1xj0FfO7PuM+h9j37/EsC9E935j/mKNBvATvWJvukrZAUN968IF0A/N161Wb98P6n5wXmaeRgM4V7/8kHrpYd1Ltz9Vc6Af/lSiPgiKj6yX8ytxA1jxmcwEBag8d6xMeVkp9N1yG8tROEFBln71rCAsF5/LvYSuL+AMX+o+WZpRjP2v5Hyir/GHSO8QWzQN+9/I+lpvgmjULPz2O1z5vbyvuZF1apQd68J1x434RCfMvJInR+CqU8Z8cp3Gc80ENR1ncM1Zw8eqtnNwMne5akVGLvZPm2gAC8/D6cI/qIzv+RH7F7zGfWXGdDhh6OKw0ZcKsH/O5HPpuMtwyuCVoa/XVexfyzHnK1cVvq0SuT5o5PYb2D8fRQNYdBBOW39zwLi2W9g/1GLeJ7qNby0G4l6M2nQH++lSOyjO/m48dU/fGNdP2N8Q9ZPYffh01/fm+n7G/mXJM4xWNM63ec9a57vY363bAMpEo8O4l0JZvfjP9aut8IlWYSJ0fyf+Y91Ka3zNLlsjkeVW+eRrMuHX/mKZr/RKrYZ9/68W+spX/VaDfsIiS32izFRDfug3i31lawwY8Kt/t9wnulkv7Ydn2+ATXY9I+hXl0WOqafdL+e4Sm3yiP0IyC/jTNp/or7C+P91Gn2ivW8+faqtP9LeO/8Bmn+ihpt9ru0/0SMOfxOCTD58AJzI8AVTivQ/8fK4f4uXsUPXHm2oATSVTrQ/N4/xhctrwOwFJphtAU0kcei8mW+IGnqWJH3w3LDmT2Ve2xuAA3xNlA2gq/7zcGsekxcAn+rd/axw9KiY+0X/PV3AkMUY+0WPlaqzO74l+IvNJ2ROz/4tw4sSJEydO/s95AsL03yNDBK3SAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE4LTEyLTA3VDE4OjM2OjU5KzAxOjAwGSS0ggAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOC0xMi0wN1QxODozNjo1OSswMTowMGh5DD4AAAAZdEVYdFNvZnR3YXJlAHd3dy5pbmtzY2FwZS5vcmeb7jwaAAAAAElFTkSuQmCC"/>
                    </defs>
                </svg>
                <span>Choose the right team for your needs</span>
            </li>
            <li class="item-best-choose">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="11" height="11" fill="url(#pattern0)"/>
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0" transform="scale(0.0078125)"/>
                        </pattern>
                        <image id="image0" width="128" height="128" xlink:href="data:image/png;base64,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"/>
                    </defs>
                </svg>
                <span>Eliminate risk through an outsourcing authority</span>
            </li>
        </ul>
        <div class="title-link">See our verified teams’ expertise</div>
        <a class="btn btn-blue-env text-center" style="margin-top: 20px;" href="<?php echo home_url("get-a-team");?>">GET A VERIFIED TEAM</a>
    </div>
</div>
<!--END SLIDER HOME-->

<main class="main-content home-page enterprises-page">


    <!--SECTION 5 STEP-->
    <section class="artical-page service-page small-business-page">
        <div class="container box-list-digital-world">
            <?php $cto_ceo = get_field('cto_ceo');?>
            <div class="row section-digital-world">
                <div class="col-lg-6 order-lg-0 order-1">
                    <h2><?php echo $cto_ceo['title'];?></h2>
                    <p>
                        <?php echo $cto_ceo['description'];?>
                    </p>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $cto_ceo['image']?>" alt="">
                </div>
            </div>

            <?php $delegate_the_development = get_field('delegate_the_development');?>
            <div class="row section-digital-world">
                <div class="col-lg-6">
                    <img class="img-fluid" src="<?php echo $delegate_the_development['image'];?>" alt="">
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $delegate_the_development['title'];?></h2>
                    <p>
                        <?php echo $delegate_the_development['description'];?>
                    </p>
                </div>
            </div>

            <?php $an_outsourcing_advisor = get_field('an_outsourcing_advisor');?>
            <div class="row section-digital-world">
                <div class="col-lg-6 order-lg-0 order-1">
                    <h2><?php echo $an_outsourcing_advisor['title'];?></h2>
                    <p>
                        <?php echo $an_outsourcing_advisor['description'];?>
                    </p>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $an_outsourcing_advisor['image']?>" alt="">
                </div>
            </div>

            <?php $get_a_cost_effective = get_field('get_a_cost_effective');?>
            <div class="row section-digital-world">
                <div class="col-lg-6">
                    <img class="img-fluid" src="<?php echo $get_a_cost_effective['image'];?>" alt="">
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $get_a_cost_effective['title'];?></h2>
                    <p>
                        <?php echo $get_a_cost_effective['description'];?>
                    </p>
                </div>
            </div>

            <?php $make_your_organization = get_field('make_your_organization');?>
            <div class="row section-digital-world">
                <div class="col-lg-6 order-lg-0 order-1">
                    <h2><?php echo $make_your_organization['title'];?></h2>
                    <p>
                        <?php echo $make_your_organization['description'];?>
                    </p>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $make_your_organization['image'];?>" alt="">
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container section-your-business">
                <div class="row box-peace-of-mind">
                    <div class="col-lg-8">
                        <h2>It is obviously skeptical to delegate your product development to someone you don’t know</h2>
                        <ul>
                            <li class="confused-emoji">We understand how it feels to cluelessly search from the internet or fellow network with the hope of finding the right team that you can trust</li>
                            <li class="confused-emoji">Nobody should have to risk one's professional career for an outsourcing decision that might destroy the organization</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION 5 STEP-->


    <!--SECTION 3 REASONS-->
    <?php
    $video_feature = get_field('video_feature');
    ?>
    <div class="container-fluild section-knowledge">
        <div class="container content-knowledge">
            <div class="row justify-content-center">
                <div class="col-lg-8 video-play">
                    <div class="embed-video">
                        <?php echo get_field('embed', $video_feature->ID);?>
                    </div>
                    <a href="<?php echo get_permalink($video_feature->ID);?>">
                        <h3 class="title-head-blue">
                            <?php echo $video_feature->post_title;?>
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--END SECTION 3 REASONS-->

    <!-- /*============LEAD MAGNET HOME=================*/ -->
    <?php
    $args = array(
        'posts_per_page' => 1,
        'offset'=> 0,
        'post_type' => 'resources',
        'orderby' => 'post_modified',
        'order' =>'desc',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'lead_magnet_mode',
                'value' => 'feature',
                'compare' => 'LIKE',
            )
        )

    );
    $ebook_resources = get_posts( $args );
    ?>
    <div class="container-fluid">
        <div class="container lead-magnet-section">
            <div class="row">
                <div class="col-lg-12">
                    <h2>
                        <?php echo get_field('irresistible_headline', $ebook_resources[0]->ID);?>
                    </h2>
                    <div class="box-infomation-ebook clearfix">
                        <img class="img-fluid img-cover-ebook" src="<?php echo get_the_post_thumbnail_url($ebook_resources[0]->ID);?>" alt="">

                        <div class="info-ebook">
                            <?php echo $ebook_resources[0]->post_content;?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="title-download-free">
                        <?php echo get_field('title_download',$ebook_resources[0]->ID)?>
                    </div>
                    <a href="<?php echo home_url('resources/').$ebook_resources[0]->post_name;?>" class="btn btn-blue-env">
                        <?php echo get_field('title_button_download',$ebook_resources[0]->ID)?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END LEAD MAGNET HOME=================*/ -->

    <!-- /*============HASSEL FREE ONBOARDING PLAN=================*/ -->
    <?php $hassel_free_ondoarding = get_field('hassel_free_ondoarding');?>
    <section class="artical-page service-page small-business-page">
        <div class="container" style="padding-top: 200px; padding-bottom: 200px;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="box-header text-center">
                        <h2><?php echo $hassel_free_ondoarding['title'];?></h2>
                        <p><?php echo $hassel_free_ondoarding['description'];?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($hassel_free_ondoarding['list_onboarding'] as $item):?>
                <div class="col-lg-4 item-build text-center">
                    <div class="block-expanded clearfix">
                        <img src="<?php echo $item['image'];?>" alt="">
                        <h3><?php echo $item['title'];?></h3>
                    </div>
                </div>
                <?php endforeach;?>

                <div class="col-lg-12 text-right box-button">
                    <a href="<?php echo home_url('get-a-team');?>" class="btn btn-blue-env">FIND MY TEAM NOW</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /*============END HASSEL FREE ONBOARDING PLAN=================*/ -->

    <!-- /*============PROCESS FRAMEWORK HOME=================*/ -->
    <?php $sec_process_framework = get_field('process_framework', $post->ID);?>
    <div class="container-fluid">
        <div class="container" style="padding-bottom: 100px;">
            <div class="row content-framework tab-content" id="pills-tabContentProcess">
                <div class="col-12 text-center box-head-framework">
                    <h2 class="title-head-blue"><?php echo $sec_process_framework['title'];?></h2>
                    <p class="description-process-framework">
                        <?php echo $sec_process_framework['description'];?>
                    </p>
                </div>
                <div class="col-12 tab-process-framework-mb">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-discovery-tab" data-toggle="pill" href="#pills-discovery" role="tab" aria-controls="pills-discovery" aria-selected="true">1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-initial-tab" data-toggle="pill" href="#pills-initial" role="tab" aria-controls="pills-initial" aria-selected="false">2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-development-tab" data-toggle="pill" href="#pills-development" role="tab" aria-controls="pills-development" aria-selected="false">3</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 tab-pane fade show active" id="pills-discovery" role="tabpanel" aria-labelledby="pills-discovery-tab">
                    <article class="item-framework">
                        <?php echo $sec_process_framework['step_1'];?>
                    </article>
                </div>
                <div class="col-lg-4 tab-pane fade" id="pills-initial" role="tabpanel" aria-labelledby="pills-initial-tab">
                    <article class="item-framework">
                        <?php echo $sec_process_framework['step_2'];?>
                    </article>
                </div>
                <div class="col-lg-4 tab-pane fade" id="pills-development" role="tabpanel" aria-labelledby="pills-development-tab">
                    <article class="item-framework">
                        <?php echo $sec_process_framework['step_3'];?>
                    </article>
                </div>

                <div class="col-lg-12 text-right pt-lg-5 pt-3">
                    <a href="<?php echo $sec_process_framework['button_url'];?>" class="btn btn-green-env">
                        <?php echo $sec_process_framework['button_name'];?>
                    </a>
                </div>


            </div>
        </div>
    </div>
    <!-- /*============END PROCESS FRAMEWORK HOME=================*/ -->


    <!-- /*============CTA ANALYZE HOME=================*/ -->
    <?php $quora =  get_field('quora', $post->ID);?>
    <section id="analyze-keyword" class="container-fluid analyze-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 box-infomation-analyze">
                    <h3>
                        <?php echo $quora['title'];?>
                    </h3>
                    <div class="description-analyze">
                        <?php echo $quora['description'];?>
                    </div>
                    <div class="analyze-form">
                        <?php
                        echo do_shortcode('[gravityform id="12" title="false" description="false"]');
                        ?>
                    </div>

                    <div class="discussion-box">
                        <?php echo $quora['title_post_question'];?>
                        <a href="<?php echo $quora['url_post_question'];?>">
                            <svg width="160" height="40" viewBox="0 0 160 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="159" height="49" rx="2.5" stroke="#8DC63F"/>
                                <g clip-path="url(#clip0)">
                                    <path d="M30 10C21.729 10 15 16.729 15 25C15 33.2709 21.729 40 30 40C38.2709 40 45.0001 33.2709 45.0001 25C45.0001 16.729 38.2716 10 30 10ZM30 38.5366C22.5361 38.5366 16.4635 32.4641 16.4635 25C16.4635 17.5361 22.5361 11.4635 30 11.4635C37.4641 11.4635 43.5366 17.5361 43.5366 25C43.5366 32.4641 37.4641 38.5366 30 38.5366ZM31.3802 32.9408V35.1916C31.3802 35.4946 31.1351 35.7404 30.8314 35.7404H28.8874C28.5841 35.7404 28.3386 35.4946 28.3386 35.1916V32.9408C28.3386 32.6377 28.5841 32.392 28.8874 32.392H30.8314C31.1352 32.392 31.3802 32.6377 31.3802 32.9408ZM33.7426 15.1785C34.1191 15.5494 34.31 16.0249 34.31 16.5932V21.0959C34.31 21.7142 34.146 22.2765 33.823 22.7664L31.3037 26.6067V30.6891C31.3037 30.9921 31.0586 31.2379 30.755 31.2379H28.9642C28.6608 31.2379 28.4154 30.9921 28.4154 30.6891V26.8654C28.4154 26.1937 28.5717 25.6217 28.8804 25.164L31.4345 21.3516V17.2956H28.4388V21.2496C28.4388 21.5526 28.1933 21.7984 27.89 21.7984H26.112C25.8086 21.7984 25.5632 21.5526 25.5632 21.2496V16.5933C25.5632 16.0228 25.757 15.5462 26.1395 15.1759C26.5176 14.8101 26.9945 14.6246 27.5572 14.6246H32.3156C32.8887 14.6249 33.3686 14.8111 33.7426 15.1785Z" fill="#8DC63F"/>
                                </g>
                                <path d="M124 24.5626C128.447 24.5626 132.053 20.1834 132.053 14.7814C132.053 9.3792 130.869 5 124 5C117.131 5 115.947 9.3792 115.947 14.7814C115.947 20.1834 119.552 24.5626 124 24.5626Z" fill="#8DC63F"/>
                                <path d="M108.79 39.4975C108.788 39.1681 108.787 39.4047 108.79 39.4975V39.4975Z" fill="#8DC63F"/>
                                <path d="M139.21 39.7547C139.214 39.6646 139.211 39.1292 139.21 39.7547V39.7547Z" fill="#8DC63F"/>
                                <path d="M139.193 39.1025C139.043 29.692 137.814 27.0105 128.409 25.3131C128.409 25.3131 127.086 27.0001 124 27.0001C120.914 27.0001 119.59 25.3131 119.59 25.3131C110.288 26.992 108.984 29.6337 108.813 38.7968C108.799 39.545 108.792 39.5843 108.789 39.4975C108.79 39.6602 108.791 39.9613 108.791 40.4862C108.791 40.4862 111.03 45 124 45C136.97 45 139.209 40.4862 139.209 40.4862C139.209 40.1489 139.209 39.9144 139.21 39.7549C139.207 39.8086 139.202 39.7045 139.193 39.1025Z" fill="#8DC63F"/>
                                <path d="M126.927 12.4746C126.829 12.3751 126.671 12.3751 126.573 12.4746L123.25 15.8644L121.427 14.0047C121.329 13.9053 121.171 13.9053 121.073 14.0047C120.976 14.1042 120.976 14.2659 121.073 14.3653L123.073 16.4055C123.122 16.455 123.186 16.48 123.25 16.48C123.314 16.48 123.378 16.455 123.427 16.4055L126.927 12.8352C127.024 12.7357 127.024 12.574 126.927 12.4746Z" fill="white"/>
                                <path d="M128.83 10.4386L124.068 9.00999C124.023 8.99667 123.976 8.99667 123.931 9.00999L119.17 10.4386C119.069 10.4686 119 10.5614 119 10.6667V15.9048C119 18.0105 122.21 19.8833 123.93 20.4181C123.952 20.4252 123.976 20.4286 124 20.4286C124.024 20.4286 124.048 20.4252 124.07 20.4181C125.79 19.8829 129 18.0105 129 15.9047V10.6667C129 10.5614 128.931 10.469 128.83 10.4386ZM128.524 15.9047C128.524 17.5766 125.875 19.3347 124 19.9409C122.125 19.3347 119.476 17.5766 119.476 15.9047V10.8438L124 9.48667L128.524 10.8438V15.9047Z" fill="white"/>
                                <path d="M83.4678 18.1801C83.1953 17.8981 82.7418 17.8981 82.4598 18.1801C82.1874 18.4525 82.1874 18.906 82.4598 19.1778L87.5707 24.2887H70.7056C70.3125 24.2893 70 24.6018 70 24.9949C70 25.3881 70.3125 25.7107 70.7056 25.7107H87.5707L82.4598 30.812C82.1874 31.094 82.1874 31.5481 82.4598 31.8199C82.7418 32.1019 83.1959 32.1019 83.4678 31.8199L89.7885 25.4992C90.0705 25.2267 90.0705 24.7733 89.7885 24.5014L83.4678 18.1801Z" fill="#8DC63F"/>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="30.0001" height="30" fill="white" transform="translate(15 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /*============CTA ANALYZE HOME END=================*/ -->


    <!-- /*============THE SOLUTION=================*/ -->
    <section class="artical-page service-page small-business-page">
        <div class="container-fluid bg-green-solution">
            <div class="container section-your-business">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2>
                            A solution that helps you avoid
                        </h2>
                    </div>
                    <div class="col-lg-10">
                        <ul>
                            <li class="close-x">Missing market opportunity caused by development procrastination</li>
                            <li class="close-x">Risky exposure of intellectual property</li>
                            <li class="close-x">Unexpected low quality deliverables due to ineffective engineering management</li>
                            <li class="close-x">Loose sight and poor responsive in communication across organization</li>
                            <li class="close-x">Negative impact on professional career due to unsuccessful outsourcing decision</li>
                            <li class="close-x">Unhappy interpersonal relationships caused by negative business performance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /*============END THE SOLUTION=================*/ -->


    <!-- /*============THE OVERHEAD=================*/ -->
    <?php $the_overhead = get_field('the_overhead', $post->ID);?>
    <div class="container-fluid bg-gray-process overhead-costs-page">
        <div class="container content-overhead-costs">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-head-blue title-overhead-costs">
                        <?php echo $the_overhead['title'];?>
                    </h2>
                </div>
                <div class="col-lg-6">
                    <div class="box-according">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-according-31.png" alt="">
                        <div class="note-chart"><?php echo $the_overhead['note'];?></div>
                        <div class="cost-1"><?php echo $the_overhead['cost_1'];?> </div>
                        <div class="cost-2"><?php echo $the_overhead['cost_2'];?></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-list-costs-saving">
                        <?php echo $the_overhead['description'];?>
                    </div>

                </div>
                <div class="col-12 text-center">
                    <div class="description-overhead">
                        <?php echo $the_overhead['subtitle'];?>
                    </div>
                    <a href="<?php echo $the_overhead['button_url'];?>" class="btn btn-blue-env"><?php echo $the_overhead['button_name'];?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END THE OVERHEAD=================*/ -->


    <!-- /*============THE SUCESS THAT=================*/ -->
    <section class="artical-page service-page small-business-page">
        <?php $the_success_that = get_field('the_success_that');?>
        <div class="container section-the-success-business">
            <div class="row">
                <div class="col-lg-8">
                    <h2><?php echo $the_success_that['title'];?></h2>
                </div>
            </div>
            <div class="row section-digital-world section-your-business pt-0">
                <div class="col-lg-6 order-lg-0 order-1">
                    <?php echo $the_success_that['description'];?>
                </div>
                <div class="col-lg-6 text-lg-right order-lg-1 order-0">
                    <img class="img-fluid" src="<?php echo $the_success_that['image'];?>" alt="">
                </div>
            </div>

            <?php $get_speed_up = get_field('get_speed_up');?>
            <div class="row section-digital-world">
                <div class="col-lg-6">
                    <img class="img-fluid" src="<?php echo $get_speed_up['image'];?>" alt="">
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $get_speed_up['title'];?></h2>
                    <p>
                        <?php echo $get_speed_up['description'];?>
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container section-your-business">
                <div class="row box-peace-of-mind">
                    <div class="col-lg-8">
                        <h2>All the resources for your organization to thrive</h2>
                        <ul>
                            <li>Risk-free and educated decision will strengthen your confidence in front of your boss and fellow colleagues.</li>
                            <li>A decision that will change the ineffective operation of your organization, get the right human resources to delegate tasks to.</li>
                            <li>No more unproductive tasks after hours, spend more time with the one in needs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="container section-current-action-matters">
            <div class="row box-your-current-action">
                <div class="col-lg-12">
                    <h2 class="text-center">Your current action matters</h2>
                </div>
                <div class="col-lg-8">
                    <p>
                        Your decision will change the tide of your organization, enhance service quality and customer satisfaction.
                    </p>
                </div>
            </div>
            <div class="row section-digital-world section-your-business pt-0">
                <div class="col-lg-6">
                    <ul>
                        <li>Determined and clear direction</li>
                        <li>Action oriented, fearless</li>
                        <li>Smart management</li>
                    </ul>
                </div>
                <div class="col-lg-12 text-center box-button">
                    <a href="<?php echo home_url('contact-us');?>" class="btn btn-blue-env">FIND MY TEAM NOW</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /*============END THE SUCESS THAT=================*/ -->


    <!-- /*============SUBCRIBE HOME=================*/ -->
    <?php $booking_and_quote = get_field('booking_and_quote', $post->ID);?>
    <div class="container-fluild section-parallax bg-building">
        <div class="bg-blue-home">
            <div class="container content-contact-quote-book">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 ">
                        <article>
                            <h4><?php echo $booking_and_quote['title_booking'];?></h4>
                            <p><?php echo $booking_and_quote['description_booking'];?></p>

                            <a href="" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;" class="btn btn-white-env">
                                <?php echo $booking_and_quote['button_name_booking'];?> <i class="icon-arrow-bottom"></i>
                            </a>
                            <!-- Calendly link widget end -->
                        </article>

                    </div>
                    <div class="col-lg-4 d-lg-block d-none">
                        <h4><?php echo $booking_and_quote['title_quote'];?></h4>
                        <p><?php echo $booking_and_quote['description_quote'];?></p>
                        <a class="btn btn-green-env" data-toggle="collapse" href="#getQuote" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo $booking_and_quote['button_name_quote'];?></a>
                        <div class="collapse form-toggle" id="getQuote">
                            <?php
                            echo do_shortcode('[gravityform id=4 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-4 d-lg-block d-none">
                        <article class="float-right">
                            <h4><?php echo $booking_and_quote['title_contact'];?></h4>
                            <p><?php echo $booking_and_quote['description_contact'];?></p>
                            <a class="btn btn-green-env" data-toggle="collapse" href="#sendMail" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo $booking_and_quote['button_name_contact'];?></a>
                            <div class="collapse form-toggle" id="sendMail">
                                <?php
                                echo do_shortcode('[gravityform id=4 title=false description=false ajax=false]');
                                ?>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /*============END SUBCRIBE HOME=================*/ -->


    <!-- Modal -->
    <div class="modal fade book-advert box-subscribe" id="modal-advert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 1.5L13.5 0L7.5 6L1.5 0L0 1.5L6 7.5L0 13.5L1.5 15L7.5 9L13.5 15L15 13.5L9 7.5L15 1.5Z" fill="#0D3153"/>
                        </svg>
                    </button>
                    <div class="title-subscriber">
                        SUBSCRIBE TO:
                    </div>
                    <h3>
                        EXECUTIVE INSIGHTS
                    </h3>
                    <div class="info-subscriber clearfix">
                        <div class="description">
                            Join over 5,000 of your peers who recieve the most valuable industry updates business leaders, CEOs, CTOs, COOs, need to know, operation, development hacking and tactics to get a head of the competition.
                        </div>
                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                            ?>
                        </div>

                        <div class="tip">
                            ENVZONE will use the information you provide to send you insights, development hacking tips. You may unsubscribe from these communications at any time. For more information, check out our Privacy Policy.
                        </div>

                    </div>

                    <div class="text-center">
                        <div class="note">No thanks, I don’t want insights to reduce costs of business.</div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</main>
<?php get_footer();?>
