<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        <?php
        wp_title('|', true, 'right');
        ?>
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo ASSET_URL;?>images/favicon-envzone.png">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head();?>

    <script language="JavaScript" src="https://seal.networksolutions.com/siteseal/javascript/siteseal.js" type="text/javascript"></script>

</head>
<body>

    <main class="main-content landing-page-all-in-one">
        <section class="container-fluid banner-landing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a class="link-home" href="<?php echo get_home_url();?>">
                            <img src="<?php echo ASSET_URL;?>images/envzone-logo.png" alt="Logo Envzone">
                        </a>
                        <h1>
                            Software Project Goes Down Hill! <br> <br>
                            How A Trusted-Solution Manual Made The Team Back on Track
                        </h1>
                    </div>
                </div>

            </div>
        </section>


        <?php
            $lead_magnet = get_post(2589);
            $link = get_field('link_share', $lead_magnet->ID);
        ?>
        <section class="container-fluid resource-page form-ebook-section">
            <div class="container box-get-ebook">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center flex-column">
                        <img src="<?php echo ASSET_URL;?>images/icon-take-this-ebook.png" alt="" class="icon-this-ebook">
                        <img class="img-fluid cover-ebook" src="<?php echo get_the_post_thumbnail_url($lead_magnet->ID);?>" alt="">
                    </div>

                    <div class="col-lg-6 box-form-get-ebook form-horizontal">
                        <div class="form-landing-page">
                            <?php
                            echo do_shortcode('[gravityform id="11" title="false" description="false"]');
                            ?>
                        </div>
                        <p>
                            By downloading this resource, you agree to receive communication from EnvZone.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid ebook-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h2>What Can This eBook Do for You?</h2>
                        <div class="box-info">
                            <div class="description">
                                This ebook tells you secrets of better outsourcing decision making with your software projects.
                            </div>
                            <ul class="list-true">
                                <li class="item-list">Benchmark the existing in-house operation</li>
                                <li class="item-list">Determine the right options of external help and resources</li>
                                <li class="item-list">Measure the outcomes from with our magic tool</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid video-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2>If You Really Want to Hire from External Resources, It Pays to Hire Outsourcing Advisors</h2>
                    </div>
                    <div class="col-lg-7">
                        <div class="box-info">
                            <div class="box-video">
                                <iframe src="https://player.vimeo.com/video/247833683" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            </div>
                            <h3>
                                3 Reasons-Why You Should Let an Outsourcing Advisor be a Part of Your Team
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid matters-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Results: What matters most</h2>
                        <div class="box-info">
                            <div class="description">
                                Since software companies implement this proven framework for development needs, the typical results we received include:
                            </div>
                            <ul class="list-circle d-flex align-items-center justify-content-between flex-lg-row flex-column">
                                <li class="item-circle d-flex justify-content-center align-items-center">
                                    89% Reduction of Communication Conflicts
                                </li>
                                <li class="item-circle d-flex justify-content-center align-items-center">
                                    45% Decrease in Time Spent Looking for the Right Team
                                </li>
                                <li class="item-circle d-flex justify-content-center align-items-center">
                                    55% Increase in Overall Sense of Control at the End of the Day
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid referral-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2>It’s Never Been about Ability or Referral, It’s Been about Trusted Access with Verification</h2>
                    </div>
                    <div class="col-lg-5">
                        <div class="item-referral">
                            <img src="<?php echo ASSET_URL;?>images/icon-land-cost-affetive.png" alt="">
                            itemCost Effective
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="item-referral">
                            <img src="<?php echo ASSET_URL;?>images/icon-land-business-operation.png" alt="">
                            Business Operation Efficiency
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid retrace-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2>Retrace the Steps of Software Outsourcing</h2>
                        <div class="description">
                            In a software development world, you can source practically every talents but the team mindset. Learn more a verified team that is built for your business growth. A strategic solution manual can help you:
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="list-circle-green d-flex align-items-center justify-content-between flex-lg-row flex-column">
                            <li class="item-circle-green d-flex align-items-center justify-content-center">
                                Track Daily Progress
                            </li>
                            <li class="item-circle-green d-flex align-items-center justify-content-center">
                                Get Honestly Notified
                            </li>
                            <li class="item-circle-green d-flex align-items-center justify-content-center">
                                Shield Up Your Interlectual Property
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer-landing-page-blue text-center">
        <p>
            ©2018 EnvZone, LLC. All Rights Reserved. <br>
            <a href="<?php echo home_url('privacy-policy');?>">Privacy Policy</a>
        </p>
    </footer>



    <?php wp_footer();?>

    <script>
        (function ( $ ) {
            "use strict";
            $(document).ready(function (e) {
                var link = <?php echo json_encode($link);?>;
                $("#gform_11 #input_11_12").val(link);
            });
        })(jQuery);
    </script>
</body>
</html>