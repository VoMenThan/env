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

<header id="header-top">
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
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
                        <div class="hide-subsub"></div>
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
                            <a class="nav-link" href="" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/general-inquiries');return false;">
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
                        <li class="nav-item d-lg-inline-block d-xl-inline-block d-none">
                            <?php if (!isset($_GET['s'])):?>
                                <a href="#" class="nav-link btn-search-pc">
                                    <i class="icon-search"></i>
                                </a>
                            <?php else:?>
                                <a href="#" onclick="window.history.go(-2)" class="nav-link btn-search-pc active">
                                    <i class="icon-search"></i>
                                </a>
                            <?php endif;?>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-3 text-left box-logo-home d-xl-block d-lg-block d-none">
                    <div class="d-lg-inline-block d-none menu-bar-hamburger"></div>
                    <a href="<?php echo get_home_url();?>" class="logo-envzone">
                        <img src="<?php echo ASSET_URL;?>images/logo-envzone-partner.png" alt="Logo Envzone">
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
                                                            <a class="title-submenu" href="<?php echo home_url('about-us');?>">
                                                                About Us
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('partnership');?>">
                                                                Partnership
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('team');?>">
                                                                Team
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub d-lg-block d-none">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('careers');?>">
                                                                Careers
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('contact-us');?>">
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
                            <li class="nav-item d-lg-none d-block">
                                <a class="nav-link item-menu" href="#">SMALL BUSINESS
                                    <span href="#" class="icon-arrow-right"></span>
                                </a>
                                <!-- BOX SUBMENU -->
                                <div class="sub-menu sub-menu-discovery text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu">

                                            <div class="col-lg-7 order-lg-1 order-0 ">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('small-business');?>">
                                                                Product
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('plans-and-pricing');?>">
                                                                Pricing
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('coverage-locations');?>">
                                                                Coverage Locations
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item d-lg-none d-block">
                                <a class="nav-link item-menu" href="#">ENTERPRISES & TECH STARTUPS
                                    <span href="#" class="icon-arrow-right"></span>
                                </a>
                                <!-- BOX SUBMENU -->
                                <div class="sub-menu sub-menu-discovery text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu">

                                            <div class="col-lg-7 order-lg-1 order-0 ">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('full-cycle-development');?>">
                                                                Full Cycle Development
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('it-outsourcing');?>">
                                                                IT Outsourcing
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('testing');?>">
                                                                Testing
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('devops');?>">
                                                                DevOps
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('process-framework');?>">
                                                                Process Framework
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo home_url('client-focused-solutions');?>">
                                                                Client-Focused Solutions
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">

                                                        <a class="title-submenu" href="#">
                                                            Industries
                                                            <span class="icon-arrow-right"></span>
                                                        </a>

                                                        <div class="subsub-menu">
                                                            <div class="row box-subsub-menu">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('healthcare');?>">
                                                                                    Healthcare
                                                                                    <span class="icon-arrow-right"></span>
                                                                                </a>
                                                                            </article>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('logistics-and-supply-chain');?>">
                                                                                    Logistics and Supply Chain
                                                                                    <span class="icon-arrow-right"></span>
                                                                                </a>
                                                                            </article>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('financial-services');?>">
                                                                                    Financial Services
                                                                                    <span class="icon-arrow-right"></span>
                                                                                </a>
                                                                            </article>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('ecommerce-and-retail');?>">
                                                                                    Ecommerce and Retail
                                                                                    <span class="icon-arrow-right"></span>
                                                                                </a>
                                                                            </article>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('real-estate-property');?>">
                                                                                    Real Estate and Property
                                                                                    <span class="icon-arrow-right"></span>
                                                                                </a>
                                                                            </article>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('education');?>">
                                                                                    Education
                                                                                    <span class="icon-arrow-right"></span>
                                                                                </a>
                                                                            </article>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('hospitality-and-travel');?>">
                                                                                    Hospitality and Travel
                                                                                    <span class="icon-arrow-right"></span>
                                                                                </a>
                                                                            </article>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                                            <article>
                                                                                <a class="title-submenu" href="<?php echo home_url('ngos');?>">
                                                                                    Non-Profit Organization
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
                            <li class="nav-item d-lg-inline-block d-none">
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
    </nav>
</header>