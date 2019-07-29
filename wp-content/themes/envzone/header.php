<?php ob_start();?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="ZUJ15uq5bC4RKo_oDyuIemPa6YEcfxNteB_Mo9wqPV4" />

    <title>
        <?php
            wp_title('|', true, 'right');
        ?>
    </title>

    <link rel="alternate" href="https://www.envzone.com" hreflang="en-us" />
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

<!--<div id="pageloader">
    <div class="pageloader">
        <div class="thecube">
            <div class="cube c1"></div>
            <div class="cube c2"></div>
            <div class="cube c4"></div>
            <div class="cube c3"></div>
        </div>
        <div class="textedit">
            <span class="site-name"><img src="<?php /*echo ASSET_URL;*/?>images/envzone-logo.png" alt="Logo Envzone"></span>
        </div>
    </div>
</div>-->

<header id="header-top">
    <nav id="sticky-menu" class="position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 toolbar-top">
                    <div class="d-md-none d-inline-block d-inline-block-768 menu-bar-mobile btn-toggle-menu">
                    </div>
                    <a href="<?php echo get_home_url();?>" class="d-lg-none d-inline-block logo-envzone-mobile">
                        <img src="<?php echo ASSET_URL;?>images/envzone-logo.png" alt="Logo Envzone">
                    </a>
                    <div class="d-sm-none btn-hide-submenu">
                        <div class="icon-left-arrow-blue"></div>
                    </div>
                    <div class="title-category d-sm-none">COMPANY</div>

                    <ul class="menu-contact nav text-right justify-content-end float-lg-none float-right">
                        <li class="nav-item d-lg-inline-block d-none">
                            <span>Contact us today on:</span>
                        </li>
                        <li class="nav-item d-md-inline-block d-none-768 d-none">
                            <div class="nav-link">
                                <i class="icon-typical-phone" aria-hidden="true"></i> <span>720-606-2900</span>
                            </div>
                        </li>
                        <li class="nav-item d-md-inline-block d-none-768 d-none btn-schedule">
                            <a class="nav-link" href="<?php echo home_url('contact-us')?>">
                                <i class="icon-schedule-appointment" aria-hidden="true"></i> <span>Schedule Appointment</span>
                            </a>
                        </li>
                        <li class="nav-item d-lg-none d-inline-block">
                            <a class="nav-link btn-search btn-toggle-search">
                                <i class="icon-search"></i>
                            </a>
                            <div class="nav-link btn-search btn-toggle-menu close-menu-mb">
                                <i class="icon-close-green"></i>
                            </div>
                        </li>
                        <li class="nav-item d-lg-inline-block d-none client-portal">
                            <a class="nav-link" href="<?php echo home_url('client-portal');?>">
                                <span>Client Portal</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-3 text-left box-logo-home d-xl-block d-lg-block d-none">
                    <a href="<?php echo get_home_url();?>" class="logo-envzone">
                        <img src="<?php echo ASSET_URL;?>images/envzone-logo.png" alt="Logo Envzone">
                    </a>
                </div>
                <div class="col-lg-9 col-md-12 col-12 d-lg-flex d-md-flex justify-content-lg-end position-static" id="menuBarMobile">

                    <div class="d-flex flex-column align-items-end justify-content-lg-end w-100">
                        <ul class="main-menu nav text-right justify-content-lg-end justify-content-sm-between flex-md-row flex-column ">
                            <li class="nav-item d-sm-none">
                                <a class="nav-link item-call" href="tel:7206062900">
                                    <i class="icon-phone-call"></i>
                                    Call Now 720-606-2900
                                </a>
                            </li>

                            <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                            <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
                            <li class="nav-item">
                                <a class="nav-link item-menu" href="#">COMPANY
                                    <span class="icon-arrow-right"></span>
                                </a>

                                <!-- BOX SUBMENU -->
                                <div class="sub-menu text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu sub-menu-company">
                                            <div class="col-xl-5 col-lg-5 order-lg-0 order-1 d-md-block d-none-768 d-none">
                                                <div class="bg-blue-lv4">
                                                    <h3 class="text-center mb-3">
                                                        COMPANY
                                                    </h3>
                                                    <div class="sub-title-form">
                                                        How an innovative development approach would change the tide of your organization
                                                    </div>
                                                    <?php
                                                        echo do_shortcode('[gravityform id="1" title="false" description="false"]');
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 order-lg-1 order-0">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/about-us">
                                                                About Us
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/partnership">
                                                                Partnership
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/process-framework">
                                                                Process Framework
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/client-focused-solutions">
                                                                Client - Focused Solutions
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub d-lg-block d-none">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/careers">
                                                                Careers
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/contact-us">
                                                                Contact Us
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Schedule a Briefing Appointment with a Representative to Learn More.
                                                </div>
                                                <a href="#" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;" class="btn btn-blue-env">
                                                    CHECK AVAIBILITY <i class="icon-arrow-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link item-menu" href="#">INDUSTRIES
                                    <span href="#" class="icon-arrow-right"></span>
                                </a>

                                <!-- BOX SUBMENU -->
                                <div class="sub-menu text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu">
                                            <div class="col-xl-5 col-lg-5 order-lg-0 order-1 d-md-block d-none-768 d-none">
                                                <div class="bg-blue-lv4">
                                                    <h3 class="text-center mb-3">
                                                        INDUSTRIES
                                                    </h3>
                                                    <div class="sub-title-form">
                                                        When we say we know your industry, we mean business.
                                                    </div>
                                                    <?php
                                                    echo do_shortcode('[gravityform id="1" title="false" description="false"]');
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 order-lg-1 order-0">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/real-estate-property">
                                                                Real Estate & Property
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/hospitality-and-travel">
                                                                Hospitality and Travel
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/education">
                                                                Education
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/ecommerce-and-retail">
                                                                ECommerce & Retail
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/financial-services">
                                                                Financial  Services
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/ngos">
                                                                Non-Profit Organization
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/healthcare">
                                                                Healthcare
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/logistics-and-supply-chain">
                                                                Logistics and Supply Chain
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Schedule My Appointment for Assistance
                                                </div>
                                                <a href="#" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;" class="btn btn-blue-env">
                                                    CHECK AVAIBILITY <i class="icon-arrow-down"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link item-menu" href="#">SERVICES
                                    <span href="#" class="icon-arrow-right"></span>
                                </a>
                                <!-- BOX SUBMENU -->
                                <div class="sub-menu text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu">
                                            <div class="col-xl-5 col-lg-5 order-lg-0 order-1 d-md-block d-none-768 d-none">
                                                <div class="bg-blue-lv4">
                                                    <h3 class="text-center mb-3">
                                                        SERVICES
                                                    </h3>
                                                    <div class="sub-title-form">
                                                        Realize the full potential of your decision
                                                    </div>
                                                    <?php
                                                    echo do_shortcode('[gravityform id="1" title="false" description="false"]');
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 order-lg-1 order-0">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/full-cycle-development">
                                                                Full Cycle Development
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/it-outsourcing">
                                                                IT Outsourcing
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/testing">
                                                                Testing
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/devops">
                                                                DevOps
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/customer-support">
                                                                Customer Support
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/small-business">
                                                                Small Business Owners
                                                                <span class="icon-arrow-right"></span>
                                                                <svg class="d-lg-block d-none" width="135" height="20" viewBox="0 0 135 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="35" width="100" height="20" rx="3" fill="#AEE366"/>
                                                                    <path d="M50.0137 10.5635C48.888 10.2399 48.0677 9.84342 47.5527 9.37402C47.0423 8.90007 46.7871 8.31673 46.7871 7.62402C46.7871 6.84017 47.0993 6.19303 47.7236 5.68262C48.3525 5.16764 49.1683 4.91016 50.1709 4.91016C50.8545 4.91016 51.4629 5.04232 51.9961 5.30664C52.5339 5.57096 52.9486 5.93555 53.2402 6.40039C53.5365 6.86523 53.6846 7.37337 53.6846 7.9248H52.3652C52.3652 7.32324 52.1738 6.85156 51.791 6.50977C51.4082 6.16341 50.8682 5.99023 50.1709 5.99023C49.5238 5.99023 49.0179 6.13379 48.6533 6.4209C48.2933 6.70345 48.1133 7.09766 48.1133 7.60352C48.1133 8.00911 48.2842 8.35319 48.626 8.63574C48.9723 8.91374 49.5579 9.16895 50.3828 9.40137C51.2122 9.63379 51.8594 9.89128 52.3242 10.1738C52.7936 10.4518 53.14 10.7777 53.3633 11.1514C53.5911 11.5251 53.7051 11.9648 53.7051 12.4707C53.7051 13.2773 53.3906 13.9245 52.7617 14.4121C52.1328 14.8952 51.292 15.1367 50.2393 15.1367C49.5557 15.1367 48.9176 15.0068 48.3252 14.7471C47.7327 14.4827 47.2747 14.1227 46.9512 13.667C46.6322 13.2113 46.4727 12.694 46.4727 12.1152H47.792C47.792 12.7168 48.013 13.193 48.4551 13.5439C48.9017 13.8903 49.4964 14.0635 50.2393 14.0635C50.932 14.0635 51.4629 13.9222 51.832 13.6396C52.2012 13.3571 52.3857 12.972 52.3857 12.4844C52.3857 11.9967 52.2148 11.6208 51.873 11.3564C51.5312 11.0876 50.9115 10.8232 50.0137 10.5635ZM59.7617 14.2686C59.2695 14.8473 58.5472 15.1367 57.5947 15.1367C56.8063 15.1367 56.2048 14.9089 55.79 14.4531C55.3799 13.9928 55.1725 13.3138 55.168 12.416V7.60352H56.4326V12.3818C56.4326 13.5029 56.8883 14.0635 57.7998 14.0635C58.766 14.0635 59.4085 13.7035 59.7275 12.9834V7.60352H60.9922V15H59.7891L59.7617 14.2686ZM69.1816 11.3838C69.1816 12.514 68.9219 13.4232 68.4023 14.1113C67.8828 14.7949 67.1855 15.1367 66.3105 15.1367C65.3763 15.1367 64.654 14.8063 64.1436 14.1455L64.082 15H62.9199V4.5H64.1846V8.41699C64.695 7.78353 65.3991 7.4668 66.2969 7.4668C67.1947 7.4668 67.8988 7.80632 68.4092 8.48535C68.9242 9.16439 69.1816 10.0941 69.1816 11.2744V11.3838ZM67.917 11.2402C67.917 10.3789 67.7507 9.71354 67.418 9.24414C67.0853 8.77474 66.6068 8.54004 65.9824 8.54004C65.1484 8.54004 64.5492 8.92741 64.1846 9.70215V12.9014C64.5719 13.6761 65.1758 14.0635 65.9961 14.0635C66.6022 14.0635 67.0739 13.8288 67.4111 13.3594C67.7484 12.89 67.917 12.1836 67.917 11.2402ZM75.0879 13.0381C75.0879 12.6963 74.958 12.432 74.6982 12.2451C74.443 12.0537 73.9941 11.8896 73.3516 11.7529C72.7135 11.6162 72.2054 11.4521 71.8271 11.2607C71.4535 11.0693 71.1755 10.8415 70.9932 10.5771C70.8154 10.3128 70.7266 9.99837 70.7266 9.63379C70.7266 9.02767 70.9818 8.51497 71.4922 8.0957C72.0072 7.67643 72.6634 7.4668 73.4609 7.4668C74.2995 7.4668 74.9785 7.68327 75.498 8.11621C76.0221 8.54915 76.2842 9.10286 76.2842 9.77734H75.0127C75.0127 9.43099 74.8646 9.13249 74.5684 8.88184C74.2767 8.63118 73.9076 8.50586 73.4609 8.50586C73.0007 8.50586 72.6406 8.60612 72.3809 8.80664C72.1211 9.00716 71.9912 9.26921 71.9912 9.59277C71.9912 9.89811 72.112 10.1283 72.3535 10.2832C72.5951 10.4382 73.0303 10.5863 73.6592 10.7275C74.2926 10.8688 74.8053 11.0374 75.1973 11.2334C75.5892 11.4294 75.8786 11.6663 76.0654 11.9443C76.2568 12.2178 76.3525 12.5527 76.3525 12.9492C76.3525 13.61 76.0882 14.141 75.5596 14.542C75.0309 14.9385 74.3451 15.1367 73.502 15.1367C72.9095 15.1367 72.3854 15.0319 71.9297 14.8223C71.474 14.6126 71.1162 14.321 70.8564 13.9473C70.6012 13.569 70.4736 13.1611 70.4736 12.7236H71.7383C71.7611 13.1475 71.9297 13.4847 72.2441 13.7354C72.5632 13.9814 72.9824 14.1045 73.502 14.1045C73.9805 14.1045 74.3633 14.0088 74.6504 13.8174C74.9421 13.6214 75.0879 13.3617 75.0879 13.0381ZM80.9668 14.1045C81.418 14.1045 81.8122 13.9678 82.1494 13.6943C82.4867 13.4209 82.6735 13.0791 82.71 12.6689H83.9062C83.8835 13.0928 83.7376 13.4961 83.4688 13.8789C83.1999 14.2617 82.8398 14.5671 82.3887 14.7949C81.9421 15.0228 81.4681 15.1367 80.9668 15.1367C79.9596 15.1367 79.1576 14.8018 78.5605 14.1318C77.9681 13.4574 77.6719 12.5368 77.6719 11.3701V11.1582C77.6719 10.4382 77.804 9.79785 78.0684 9.2373C78.3327 8.67676 78.7109 8.24154 79.2031 7.93164C79.6999 7.62174 80.2855 7.4668 80.96 7.4668C81.7894 7.4668 82.4775 7.71517 83.0244 8.21191C83.5758 8.70866 83.8698 9.35352 83.9062 10.1465H82.71C82.6735 9.66797 82.4912 9.27604 82.1631 8.9707C81.8395 8.66081 81.4385 8.50586 80.96 8.50586C80.3174 8.50586 79.8184 8.73828 79.4629 9.20312C79.112 9.66341 78.9365 10.3311 78.9365 11.2061V11.4453C78.9365 12.2975 79.112 12.9538 79.4629 13.4141C79.8138 13.8743 80.3151 14.1045 80.9668 14.1045ZM88.9033 8.73828C88.7119 8.70638 88.5046 8.69043 88.2812 8.69043C87.4518 8.69043 86.889 9.04362 86.5928 9.75V15H85.3281V7.60352H86.5586L86.5791 8.45801C86.9938 7.7972 87.5817 7.4668 88.3428 7.4668C88.5889 7.4668 88.7757 7.4987 88.9033 7.5625V8.73828ZM91.4463 15H90.1816V7.60352H91.4463V15ZM90.0791 5.6416C90.0791 5.43652 90.1406 5.26335 90.2637 5.12207C90.3913 4.98079 90.5781 4.91016 90.8242 4.91016C91.0703 4.91016 91.2572 4.98079 91.3848 5.12207C91.5124 5.26335 91.5762 5.43652 91.5762 5.6416C91.5762 5.84668 91.5124 6.01758 91.3848 6.1543C91.2572 6.29102 91.0703 6.35938 90.8242 6.35938C90.5781 6.35938 90.3913 6.29102 90.2637 6.1543C90.1406 6.01758 90.0791 5.84668 90.0791 5.6416ZM99.7246 11.3838C99.7246 12.5094 99.4671 13.4163 98.9521 14.1045C98.4372 14.7926 97.7399 15.1367 96.8604 15.1367C95.9626 15.1367 95.2562 14.8519 94.7412 14.2822V17.8438H93.4766V7.60352H94.6318L94.6934 8.42383C95.2083 7.78581 95.9238 7.4668 96.8398 7.4668C97.7285 7.4668 98.4303 7.80176 98.9453 8.47168C99.4648 9.1416 99.7246 10.0736 99.7246 11.2676V11.3838ZM98.46 11.2402C98.46 10.4062 98.2822 9.74772 97.9268 9.26465C97.5713 8.78158 97.0837 8.54004 96.4639 8.54004C95.6982 8.54004 95.124 8.87956 94.7412 9.55859V13.0928C95.1195 13.7673 95.6982 14.1045 96.4775 14.1045C97.0837 14.1045 97.5645 13.8652 97.9199 13.3867C98.2799 12.9036 98.46 12.1882 98.46 11.2402ZM103.054 5.8125V7.60352H104.435V8.58105H103.054V13.168C103.054 13.4642 103.115 13.6875 103.238 13.8379C103.361 13.9837 103.571 14.0566 103.867 14.0566C104.013 14.0566 104.214 14.0293 104.469 13.9746V15C104.136 15.0911 103.812 15.1367 103.498 15.1367C102.933 15.1367 102.507 14.9658 102.22 14.624C101.933 14.2822 101.789 13.7969 101.789 13.168V8.58105H100.442V7.60352H101.789V5.8125H103.054ZM107.292 15H106.027V7.60352H107.292V15ZM105.925 5.6416C105.925 5.43652 105.986 5.26335 106.109 5.12207C106.237 4.98079 106.424 4.91016 106.67 4.91016C106.916 4.91016 107.103 4.98079 107.23 5.12207C107.358 5.26335 107.422 5.43652 107.422 5.6416C107.422 5.84668 107.358 6.01758 107.23 6.1543C107.103 6.29102 106.916 6.35938 106.67 6.35938C106.424 6.35938 106.237 6.29102 106.109 6.1543C105.986 6.01758 105.925 5.84668 105.925 5.6416ZM108.987 11.2334C108.987 10.5088 109.129 9.8571 109.411 9.27832C109.698 8.69954 110.095 8.25293 110.601 7.93848C111.111 7.62402 111.692 7.4668 112.344 7.4668C113.351 7.4668 114.164 7.81543 114.784 8.5127C115.409 9.20996 115.721 10.1374 115.721 11.2949V11.3838C115.721 12.1038 115.582 12.751 115.304 13.3252C115.03 13.8949 114.636 14.3392 114.121 14.6582C113.611 14.9772 113.023 15.1367 112.357 15.1367C111.355 15.1367 110.541 14.7881 109.917 14.0908C109.297 13.3936 108.987 12.4707 108.987 11.3223V11.2334ZM110.259 11.3838C110.259 12.2041 110.448 12.8626 110.826 13.3594C111.209 13.8561 111.719 14.1045 112.357 14.1045C113 14.1045 113.51 13.8538 113.889 13.3525C114.267 12.8467 114.456 12.1403 114.456 11.2334C114.456 10.4222 114.262 9.76595 113.875 9.26465C113.492 8.75879 112.982 8.50586 112.344 8.50586C111.719 8.50586 111.216 8.75423 110.833 9.25098C110.45 9.74772 110.259 10.4587 110.259 11.3838ZM118.503 7.60352L118.544 8.5332C119.109 7.82227 119.847 7.4668 120.759 7.4668C122.322 7.4668 123.11 8.34863 123.124 10.1123V15H121.859V10.1055C121.855 9.57227 121.732 9.17806 121.49 8.92285C121.253 8.66764 120.882 8.54004 120.376 8.54004C119.966 8.54004 119.606 8.64941 119.296 8.86816C118.986 9.08691 118.744 9.37402 118.571 9.72949V15H117.307V7.60352H118.503Z" fill="#0D3153"/>
                                                                    <path d="M9.99998 0C4.4774 0 0 4.47721 0 9.99998C0 15.5227 4.4774 20 9.99998 20C15.5232 20 20 15.5227 20 9.99998C20 4.47721 15.523 0 9.99998 0ZM8.16557 15.1368L3.76237 10.7338L5.22998 9.26615L8.16557 12.2016L14.77 5.59696L16.2376 7.06457L8.16557 15.1368Z" fill="#AEE366"/>
                                                                </svg>
                                                                <svg class="d-lg-none d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.99998 0C4.4774 0 0 4.47721 0 9.99998C0 15.5227 4.4774 20 9.99998 20C15.5232 20 20 15.5227 20 9.99998C20 4.47721 15.523 0 9.99998 0ZM8.16557 15.1368L3.76237 10.7338L5.22998 9.26615L8.16557 12.2016L14.77 5.59696L16.2376 7.06457L8.16557 15.1368Z" fill="#AEE366"/>
                                                                </svg>
                                                            </a>
                                                        </article>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Schedule My Appoitment with a Representative
                                                </div>
                                                <a href="#" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;" class="btn btn-blue-env">
                                                    CHECK AVAIBILITY <i class="icon-arrow-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link item-menu" href="#">DISCOVERY
                                    <span href="#" class="icon-arrow-right"></span>
                                </a>
                                <!-- BOX SUBMENU -->
                                <div class="sub-menu sub-menu-discovery text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu">
                                            <div class="col-xl-5 col-lg-5 order-lg-0 order-1 d-md-block d-none-768 d-none">
                                                <div class="bg-blue-lv4">
                                                    <h3 class="text-center mb-3">
                                                        DISCOVERY
                                                    </h3>
                                                    <div class="sub-title-form">
                                                        EnvZone features resources, daily news, blogs, events and keeps up to date with the insights for your success.
                                                    </div>
                                                    <p>
                                                        Take 5 mins to improve your skill!
                                                    </p>
                                                    <?php
                                                    echo do_shortcode('[gravityform id="3" title="false" description="false"]');
                                                    ?>
                                                </div>

                                            </div>

                                            <div class="col-lg-7 order-lg-1 order-0 ">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/blog">
                                                                Blog
                                                                <span class="icon-arrow-right"></span>
                                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0)">
                                                                        <path d="M15.5885 16.2315C16.0568 15.4488 16.7454 15.0479 17.6584 15.0372C18.5715 15.0265 19.0324 14.5614 19.0473 13.6462C19.0602 12.7352 19.4568 12.0467 20.2395 11.5805C21.0243 11.1122 21.1943 10.4824 20.7474 9.68479C20.3026 8.88931 20.3026 8.09382 20.7474 7.2962C21.1943 6.50072 21.0254 5.87203 20.2395 5.40372C19.4568 4.93434 19.0591 4.24685 19.0473 3.33161C19.0324 2.42066 18.5715 1.95556 17.6584 1.94486C16.7454 1.93203 16.0568 1.53322 15.5885 0.750569C15.1202 -0.0342229 14.4904 -0.204225 13.6949 0.2427C12.8994 0.687486 12.1018 0.687486 11.3063 0.2427C10.5098 -0.203156 9.88003 -0.0342229 9.41172 0.750569C8.94448 1.53429 8.25485 1.9331 7.34282 1.94486C6.43187 1.95556 5.9689 2.42066 5.95607 3.33161C5.9411 4.24685 5.54443 4.93327 4.76178 5.40372C3.97699 5.87203 3.80484 6.49965 4.25391 7.2962C4.70083 8.09382 4.70083 8.88931 4.25391 9.68479C3.80484 10.4824 3.97592 11.1132 4.76178 11.5805C5.54443 12.0467 5.94217 12.7352 5.95607 13.6462C5.9689 14.5603 6.43187 15.0265 7.34282 15.0372C8.25592 15.0479 8.94448 15.4488 9.41279 16.2315C9.8811 17.0163 10.5109 17.1863 11.3063 16.7372C12.1018 16.2967 12.8994 16.2967 13.6949 16.7372C14.4904 17.1852 15.1212 17.0163 15.5885 16.2315ZM12.5028 13.4869C9.7421 13.4869 7.50534 11.2501 7.50534 8.48943C7.50534 5.7309 9.7421 3.49413 12.5028 3.49413C15.2613 3.49413 17.4981 5.7309 17.4981 8.48943C17.4981 11.2501 15.2613 13.4869 12.5028 13.4869Z" fill="#8DC63F"/>
                                                                        <path d="M7.26293 15.7696C6.30279 15.7696 6.17448 15.3227 6.17448 15.3227L2.4248 22.6926L5.43139 22.3548L7.094 24.8567C7.094 24.8567 10.5582 17.6289 10.5582 17.677C8.76301 17.6321 9.47724 15.8177 7.26293 15.7696Z" fill="#8DC63F"/>
                                                                        <path d="M18.7783 15.6114C16.039 15.8979 16.5961 16.5779 15.9695 17.1061C15.2489 17.8749 14.3486 17.7241 14.3486 17.7241L18.5773 25L19.6176 22.3056L22.575 22.6916L18.7783 15.6114Z" fill="#8DC63F"/>
                                                                        <path d="M13.5462 7.38708L12.5005 5.27007L11.4538 7.38708L9.11328 7.72922L10.8048 9.379L10.4059 11.712L12.5005 10.6118L14.5951 11.712L14.1963 9.379L15.8877 7.72922L13.5462 7.38708Z" fill="#8DC63F"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0">
                                                                            <rect width="25" height="25" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>

                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/events">
                                                                Events
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/knowledge-center">
                                                                Knowledge Center
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/studio">
                                                                Studio
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>


                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/resources">
                                                                Resources
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('discussion-board');?>">
                                                                Forum
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('companies');?>">
                                                                Review Platform
                                                                <span class="icon-arrow-right"></span>
                                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0)">
                                                                        <path d="M24.8405 7.70848C24.8518 7.61884 24.863 7.53034 24.8714 7.44031C24.8817 7.32625 24.8882 7.21696 24.8936 7.10882C24.897 7.03843 24.8999 6.96863 24.901 6.89825C24.9025 6.78857 24.901 6.68291 24.897 6.57972C24.8945 6.50781 24.8911 6.43705 24.8857 6.3661C24.8783 6.27264 24.8686 6.18319 24.8568 6.09507C24.8465 6.01534 24.835 5.93581 24.8209 5.8576C24.8075 5.78684 24.7913 5.7199 24.7751 5.65295C24.7545 5.56502 24.7334 5.4769 24.7068 5.39126C24.6954 5.35636 24.6817 5.32489 24.6698 5.29094C24.6355 5.19214 24.6044 5.09238 24.5613 4.99778C24.5436 4.95944 24.5174 4.9295 24.4984 4.89211C24.4368 4.77157 24.3704 4.66037 24.2991 4.55719C24.2498 4.48528 24.1978 4.41604 24.1426 4.34948C24.0595 4.2503 23.9729 4.16065 23.8829 4.07844C23.8239 4.02485 23.7635 3.97221 23.6996 3.92357C23.5657 3.82229 23.4299 3.73322 23.2933 3.65959C23.2597 3.64186 23.2248 3.62603 23.1903 3.60943C22.9912 3.51197 22.794 3.43777 22.6126 3.38665C22.5718 3.36834 22.502 3.33878 22.4098 3.30292C22.9073 2.63059 23.1232 1.91705 22.9853 1.32178C22.8909 0.913035 22.5899 0.356856 21.6953 0.0297487C21.44 -0.0627569 21.1571 0.0675139 21.0642 0.322906C20.9713 0.578679 21.1022 0.860964 21.3574 0.953852C21.744 1.09499 21.9692 1.29317 22.0274 1.5436C22.1138 1.91839 21.8636 2.48296 21.39 2.99832C20.5214 2.80854 19.336 2.73091 18.2477 3.25963C18.2456 3.26058 18.2431 3.26153 18.2408 3.26249C18.2398 3.26306 18.2383 3.26401 18.2372 3.26459C18.1901 3.28766 18.1418 3.30693 18.0951 3.33249C18.0258 3.37044 17.9627 3.41813 17.8963 3.46047C17.8565 3.48545 17.8162 3.51006 17.7773 3.53676C17.6789 3.60409 17.5841 3.67733 17.4925 3.75458C17.4571 3.78395 17.4222 3.81447 17.3878 3.84594C17.2968 3.92872 17.2087 4.01569 17.1246 4.1082C17.0966 4.1391 17.0695 4.17171 17.042 4.20414C16.9564 4.30446 16.8738 4.40784 16.7962 4.51885C16.7775 4.54593 16.7597 4.57492 16.7416 4.60239C16.66 4.72503 16.5812 4.85034 16.5084 4.98519C16.503 4.99492 16.4986 5.00579 16.4937 5.01571C16.227 5.51886 16.021 6.10346 15.8805 6.77484L15.7637 7.29192C15.7637 7.29192 15.6335 7.89635 15.5711 8.16986C13.9054 15.506 7.81454 19.4014 0.620463 23.3858C0.215155 23.6095 -0.000183299 24.1299 0.140959 24.5445C0.236898 24.8268 0.482753 25 0.770379 25C0.806809 25 0.844193 24.9971 0.882149 24.9916C1.4925 24.8997 2.24208 24.8411 3.11011 24.7738C8.50652 24.3528 18.5519 23.5693 23.7305 11.4322C23.7728 11.344 24.3166 10.1869 24.6492 8.76896L24.6536 8.76495L24.688 8.61008C24.6901 8.60073 24.691 8.59291 24.6929 8.58357C24.7343 8.39226 24.7711 8.19695 24.8026 7.99916C24.8184 7.89864 24.8287 7.8048 24.8405 7.70848V7.70848ZM23.4781 8.44509C23.3831 6.9116 22.3267 5.98311 22.274 5.93733L21.3318 5.12671L21.4646 6.36286C21.5384 7.05388 21.0667 7.41628 20.625 7.60281C20.6967 6.34359 19.8841 5.51238 19.8424 5.47061L19.4273 5.055L19.0915 5.53698C18.9351 5.76128 18.3182 6.03289 17.0601 6.18929C17.0655 6.17251 17.0714 6.15629 17.0773 6.14008C17.1979 5.79829 17.3415 5.49273 17.5095 5.22609C17.5175 5.21388 17.5248 5.20167 17.5322 5.18928C17.5889 5.10211 17.6478 5.01914 17.7098 4.9398C17.7182 4.92912 17.727 4.9192 17.7353 4.9089C17.9219 4.67678 18.1323 4.48299 18.365 4.32697C18.3892 4.31076 18.4132 4.29455 18.4382 4.27929C18.5095 4.23446 18.583 4.19269 18.6581 4.15493C18.6774 4.14558 18.6964 4.13757 18.7163 4.1288C18.9774 4.00635 19.2494 3.92967 19.5219 3.88695C19.5504 3.88237 19.579 3.87703 19.607 3.8736C19.6871 3.86311 19.7672 3.85529 19.847 3.85052C19.8794 3.84842 19.9114 3.84689 19.9438 3.84594C20.0217 3.84308 20.0993 3.8406 20.1756 3.84155C20.241 3.84251 20.3045 3.84689 20.3684 3.85052C20.4691 3.85643 20.5679 3.86482 20.6648 3.87646C20.7171 3.88294 20.7697 3.88924 20.8203 3.89668C20.8794 3.90564 20.9374 3.91499 20.9938 3.92529C21.0514 3.93597 21.1066 3.94741 21.1617 3.95924C21.234 3.9745 21.3032 3.99071 21.3701 4.00749C21.4297 4.02275 21.4886 4.03744 21.5433 4.05308C21.5832 4.06452 21.6204 4.07577 21.6574 4.08665C21.7081 4.1019 21.7568 4.11716 21.802 4.13223C21.8271 4.14062 21.8542 4.14902 21.8773 4.15741C21.9412 4.17953 21.9998 4.2007 22.0478 4.2194C22.0606 4.22416 22.07 4.22817 22.0818 4.23275C22.1222 4.24839 22.1596 4.26365 22.1842 4.27414C22.1867 4.27509 22.1901 4.27643 22.1926 4.27757C22.2185 4.28882 22.2363 4.29664 22.2382 4.29722L22.3185 4.32678C22.493 4.37389 22.6534 4.43588 22.7999 4.5116C22.8098 4.51656 22.8171 4.52343 22.827 4.52838C22.9632 4.60163 23.0887 4.68574 23.1999 4.78416C23.2058 4.7895 23.2105 4.79598 23.217 4.80132C23.3242 4.8986 23.4192 5.00884 23.5018 5.13034C23.5161 5.15151 23.5279 5.17516 23.5416 5.1969C23.6101 5.306 23.67 5.42407 23.7204 5.55148C23.7331 5.58486 23.7454 5.61938 23.7572 5.65371C23.8005 5.78017 23.8344 5.91502 23.8609 6.05749C23.8674 6.09144 23.8762 6.12444 23.8817 6.15896C23.9088 6.33463 23.9239 6.52136 23.9264 6.7201C23.9269 6.74814 23.9254 6.77713 23.9254 6.80574C23.9248 7.00391 23.9151 7.21143 23.8911 7.4323C23.8901 7.44126 23.8895 7.45004 23.8886 7.45843C23.8611 7.70428 23.8197 7.96387 23.7637 8.23738C23.6645 8.31635 23.5691 8.3852 23.4781 8.44509V8.44509ZM3.03343 23.793C2.55831 23.8298 2.11753 23.8647 1.71184 23.9036C8.84736 19.9173 14.8238 15.9049 16.5309 8.38616C16.5915 8.12008 16.6548 7.88548 16.7199 7.66518L16.7351 7.5929C16.7533 7.45805 16.7782 7.33274 16.8015 7.20475C18.2328 7.06361 18.9976 6.79258 19.4107 6.54424C19.594 6.88661 19.7657 7.43936 19.5233 8.11036L19.2538 8.85631L20.0423 8.76591C20.6984 8.69114 21.7493 8.32913 22.218 7.48227C22.4276 7.90475 22.5825 8.47923 22.4537 9.17121L22.3057 9.96657L23.0793 9.73197C23.0911 9.72854 23.2092 9.69115 23.3881 9.612C23.1176 10.423 22.8451 11.0044 22.8348 11.0265C17.8805 22.6343 8.58625 23.3597 3.03343 23.793V23.793Z" fill="#8DC63F"/>
                                                                        <path d="M19.9775 10.4554C19.709 10.41 19.4591 10.6025 19.4204 10.8714C19.4099 10.9443 18.2346 18.2313 7.58327 21.6629C7.32464 21.7465 7.18292 22.0234 7.26589 22.282C7.33284 22.4905 7.52605 22.6229 7.73414 22.6229C7.78431 22.6229 7.83504 22.6151 7.8852 22.5994C19.1144 18.9808 20.347 11.3362 20.3941 11.0122C20.4324 10.7431 20.2466 10.4942 19.9775 10.4554V10.4554Z" fill="#8DC63F"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0">
                                                                            <rect width="25" height="25" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </a>
                                                        </article>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Subscribe for Three Things <br> <br>
                                                    Three links or tips of interest curated about offshore outsourcing every week by the experts at ENVZONE Consulting
                                                </div>
                                                <?php
                                                echo do_shortcode('[gravityform id="3" title="false" description="false"]');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item d-lg-block d-none">
                                <a class="nav-link item-menu" href="#"><i class="icon-plus-green"></i>VENDORS
                                    <span href="#" class="icon-arrow-right"></span>
                                </a>
                                <!-- BOX SUBMENU -->
                                <div class="sub-menu text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu nav-vendor">
                                            <div class="col-xl-5 col-lg-5 order-lg-0 order-1 d-md-block d-none-768 d-none">
                                                <div class="vendor-university">
                                                    <h3 class="mb-3">
                                                        VENDOR UNIVERSITY
                                                    </h3>
                                                    <div class="title-head">
                                                        Get software development projects in Western Market
                                                    </div>
                                                    <div class="title-head">
                                                        How it works?
                                                    </div>
                                                    <p>
                                                        We have easy 5 step process for apply application
                                                    </p>

                                                   <ul class="list-step-process">
                                                       <li class="step">Apply</li>
                                                       <li class="step">Evaluate</li>
                                                       <li class="step">On-site Inspection</li>
                                                       <li class="step">Approved</li>
                                                       <li class="step">Certified</li>
                                                   </ul>

                                                </div>

                                            </div>

                                            <div class="col-lg-7 order-lg-1 order-0 text-center">
                                                <article class="box-sign-up d-flex justify-content-between flex-lg-row flex-column">
                                                    <a href="<?php echo home_url('vendor-contact');?>" class="item-sign-up align-items-center d-lg-block d-flex">
                                                        <i class="icon-sign-up-now"></i>
                                                        <h4>sign up now</h4>
                                                        <p>
                                                            Not verified yet! Enroll your team in our verification program to get started
                                                        </p>
                                                    </a>
                                                    <a href="<?php echo home_url('vendor-portal');?>" class="item-sign-up align-items-center d-lg-block d-flex">
                                                        <i class="icon-already-verified"></i>
                                                        <h4>Already Verified</h4>
                                                        <p>
                                                            Get access here to view and track your projects
                                                        </p>
                                                    </a>
                                                </article>
                                                <div class="description-nav-vendor">
                                                    Still not clear how this works! No worries. We are here to help. Click the link below to learn more about our verification program
                                                </div>
                                                <a href="<?php echo home_url('certification-process')?>" class="btn btn-white-env">LEARN MORE</a>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Schedule a Briefing Appointment with a Representative to Learn More.
                                                </div>
                                                <a href="#" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;" class="btn btn-blue-env">
                                                    CHECK AVAIBILITY <i class="icon-arrow-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item d-lg-inline-block d-xl-inline-block d-none">
                                <a href="#" class="nav-link btn-search-pc">
                                    <i class="icon-search"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="box-direction-menu">
                            <div class="location-address d-flex justify-content-between align-items-center">
                                <i class="icon-direction"></i>
                                <span>
                                        1801 California St. Ste 2400 <br>
                                        Denver, CO 80202 <br>
                                        M-F | 8:30 am - 5:30 pm MST
                                    </span>
                                <a href="https://goo.gl/maps/V7KQJrDY94t" target="_blank" class="icon-right-arrow"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOX SEARCH -->
        <div id="detailBoxSearch">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 box-search">
                    <form action="<?php echo home_url("/");?>" method="get" id="search-form" class="search-form" role="search">
                        <label for="input-search">TYPE YOUR SEARCH</label>
                        <input id="input-search" type="text" name="s" class="input-search" placeholder="Input your queries" autofocus>
                        <a onclick="document.getElementById('search-form').submit()" class="btn-search" href="#">
                            <i class="icon-search"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div id="sticky-menu-anchor"></div>
</header>