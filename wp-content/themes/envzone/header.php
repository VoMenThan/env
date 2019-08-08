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

        <!-- BOX SEARCH -->
        <div id="detailBoxSearch">
            <div class="container-fluid bg-blue-search">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-12 col-12 box-search">
                            <form action="<?php echo home_url("/");?>" method="get" id="search-form" class="search-form" role="search">
                                <input id="input-search" type="text" name="s" class="input-search" placeholder="Input your queries" autofocus>
                                <a onclick="document.getElementById('search-form').submit()" class="btn-search" href="#">
                                    <i class="icon-search"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Modal Hamburger menu -->
    <div class="modal content-hamburger-menu" id="hamburger-menu" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="box-hamburger clearfix">
                    <div class="sidebar-menu">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 1.5L13.5 0L7.5 6L1.5 0L0 1.5L6 7.5L0 13.5L1.5 15L7.5 9L13.5 15L15 13.5L9 7.5L15 1.5Z" fill="#8DC63F"/>
                            </svg>
                        </button>
                        <ul class="list-contact-us">
                            <li class="item-contact">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M9.09791 4.29723C12.1309 4.32699 14.0309 4.13828 14.2875 7.5H17.9861C17.9861 2.29217 13.4441 1.59021 9.00163 1.59021C4.55879 1.59021 0.0172119 2.29217 0.0172119 7.5H3.68702C3.97096 4.07421 6.09015 4.26782 9.09791 4.29723Z" fill="#FBF8FD"/>
                                        <path d="M1.85241 9.17421C2.75323 9.17421 3.50281 9.22812 3.66946 8.342C3.69187 8.22156 3.70482 8.08502 3.70482 7.92712H3.66211H0C0 9.24528 0.829401 9.17421 1.85241 9.17421Z" fill="#FBF8FD"/>
                                        <path d="M14.3123 7.92712H14.2776C14.2776 8.08607 14.2913 8.22296 14.3169 8.342C14.4926 9.15914 15.2411 9.10838 16.1388 9.10838C17.1667 9.10838 18 9.17595 18 7.92712H14.3123Z" fill="#FBF8FD"/>
                                        <path d="M12.5055 7.0294V6.50564C12.5055 6.27142 12.2355 6.25671 11.9022 6.25671H11.3578C11.0249 6.25671 10.7549 6.27142 10.7549 6.50564V6.95693V7.30703H6.90376V6.95693V6.50564C6.90376 6.27142 6.63382 6.25671 6.30087 6.25671H5.75611C5.42316 6.25671 5.15323 6.27142 5.15323 6.50564V7.0294V7.48664C4.27586 8.39831 1.40499 12.2792 1.30066 12.7491L1.30206 15.8843C1.30206 16.1738 1.53768 16.4094 1.82722 16.4094H15.8315C16.121 16.4094 16.3566 16.1738 16.3566 15.8843V12.7333C16.2533 12.2771 13.3832 8.39796 12.5055 7.48629V7.0294ZM6.714 13.171C6.43216 13.171 6.20354 12.9427 6.20354 12.6605C6.20354 12.3783 6.43216 12.15 6.714 12.15C6.99583 12.15 7.22445 12.3783 7.22445 12.6605C7.22445 12.9427 6.99583 13.171 6.714 13.171ZM6.714 11.4204C6.43216 11.4204 6.20354 11.1922 6.20354 10.91C6.20354 10.6278 6.43216 10.3995 6.714 10.3995C6.99583 10.3995 7.22445 10.6278 7.22445 10.91C7.22445 11.1922 6.99583 11.4204 6.714 11.4204ZM6.714 9.67025C6.43216 9.67025 6.20354 9.44198 6.20354 9.15979C6.20354 8.87796 6.43216 8.64934 6.714 8.64934C6.99583 8.64934 7.22445 8.87796 7.22445 9.15979C7.22445 9.44198 6.99583 9.67025 6.714 9.67025ZM8.81463 13.171C8.5328 13.171 8.30418 12.9427 8.30418 12.6605C8.30418 12.3783 8.5328 12.15 8.81463 12.15C9.09682 12.15 9.32509 12.3783 9.32509 12.6605C9.32509 12.9427 9.09682 13.171 8.81463 13.171ZM8.81463 11.4204C8.5328 11.4204 8.30418 11.1922 8.30418 10.91C8.30418 10.6278 8.5328 10.3995 8.81463 10.3995C9.09682 10.3995 9.32509 10.6278 9.32509 10.91C9.32509 11.1922 9.09682 11.4204 8.81463 11.4204ZM8.81463 9.67025C8.5328 9.67025 8.30418 9.44198 8.30418 9.15979C8.30418 8.87796 8.5328 8.64934 8.81463 8.64934C9.09682 8.64934 9.32509 8.87796 9.32509 9.15979C9.32509 9.44198 9.09682 9.67025 8.81463 9.67025ZM10.9153 13.171C10.6331 13.171 10.4048 12.9427 10.4048 12.6605C10.4048 12.3783 10.6331 12.15 10.9153 12.15C11.1975 12.15 11.4257 12.3783 11.4257 12.6605C11.4257 12.9427 11.1975 13.171 10.9153 13.171ZM10.9153 11.4204C10.6331 11.4204 10.4048 11.1922 10.4048 10.91C10.4048 10.6278 10.6331 10.3995 10.9153 10.3995C11.1975 10.3995 11.4257 10.6278 11.4257 10.91C11.4257 11.1922 11.1975 11.4204 10.9153 11.4204ZM10.9153 9.67025C10.6331 9.67025 10.4048 9.44198 10.4048 9.15979C10.4048 8.87796 10.6331 8.64934 10.9153 8.64934C11.1975 8.64934 11.4257 8.87796 11.4257 9.15979C11.4257 9.44198 11.1975 9.67025 10.9153 9.67025Z" fill="#FBF8FD"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="18" height="18" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                720-606-2900
                            </li>
                            <li class="item-contact">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.22982 8.77117H9.79486C9.99312 8.77117 10.1539 8.61039 10.1539 8.41214C10.1539 8.21388 9.99312 8.0531 9.79486 8.0531H4.22982C4.03146 8.0531 3.87079 8.21388 3.87079 8.41214C3.87079 8.61039 4.03146 8.77117 4.22982 8.77117Z" fill="#FBF8FD"/>
                                    <path d="M7.56156 10.3868H4.22982C4.03146 10.3868 3.87079 10.5476 3.87079 10.7459C3.87079 10.9441 4.03146 11.1049 4.22982 11.1049H7.56156C7.75982 11.1049 7.9206 10.9441 7.9206 10.7459C7.9206 10.5476 7.75982 10.3868 7.56156 10.3868Z" fill="#FBF8FD"/>
                                    <path d="M13.7944 9.58975V3.38574C13.7941 2.39436 12.9905 1.5909 11.9992 1.59057H10.5272V0.904811C10.5272 0.706445 10.3665 0.545776 10.1681 0.545776C9.96986 0.545776 9.80908 0.706445 9.80908 0.904811V1.59057H4.92621V0.904811C4.92621 0.706445 4.76554 0.545776 4.56717 0.545776C4.36892 0.545776 4.20814 0.706445 4.20814 0.904811V1.59057H2.73609C1.74482 1.5909 0.941367 2.39436 0.940918 3.38574V13.112C0.941367 14.1033 1.74482 14.9067 2.73609 14.9072H9.38194C10.0727 16.6765 11.9254 17.7036 13.792 17.3522C15.6587 17.0009 17.0111 15.3706 17.0114 13.471C17.0149 11.543 15.6254 9.93454 13.7944 9.58975ZM2.7398 2.30864H4.21184V2.99439C4.21184 3.19265 4.37251 3.35343 4.57087 3.35343C4.76913 3.35343 4.92991 3.19265 4.92991 2.99439V2.30864H9.81278V2.99439C9.81278 3.19265 9.97345 3.35343 10.1718 3.35343C10.3701 3.35343 10.5309 3.19265 10.5309 2.99439V2.30864H12.0029C12.597 2.31032 13.0782 2.79154 13.08 3.38574V4.25461H1.66269V3.38574C1.66314 2.79098 2.14514 2.30909 2.7398 2.30864ZM2.7398 14.1891C2.14559 14.1874 1.66437 13.7061 1.66269 13.112V4.96909H13.0763V9.52165H13.0655C11.8929 9.52345 10.7816 10.0453 10.0315 10.9467C9.28119 11.848 8.96972 13.0357 9.18077 14.1891H2.7398ZM13.0655 16.7023C11.281 16.7023 9.83421 15.2557 9.83421 13.471C9.83421 11.6864 11.281 10.2397 13.0655 10.2397C14.8502 10.2397 16.2968 11.6864 16.2968 13.471C16.2941 15.2545 14.849 16.6997 13.0655 16.7023Z" fill="#FBF8FD"/>
                                    <path d="M14.728 12.1821L12.5954 14.2178L11.4931 13.112C11.3534 12.9722 11.1268 12.9722 10.987 13.112C10.847 13.2518 10.847 13.4784 10.987 13.6182L12.3404 14.9718C12.4077 15.0395 12.4997 15.0771 12.5954 15.0759C12.6881 15.0767 12.7772 15.0405 12.843 14.9752L15.227 12.6954C15.2957 12.6297 15.3354 12.5396 15.3375 12.4446C15.3395 12.3496 15.3037 12.2577 15.2378 12.1892C15.098 12.049 14.8717 12.0457 14.728 12.1821Z" fill="#FBF8FD"/>
                                </svg>
                                <a href="" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;">
                                    Schedule an Appointment
                                </a>
                            </li>
                        </ul>
                        <div class="title-you-are">You are:</div>
                        <ul class="list-contact-us list-service">
                            <li class="item-contact">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.3125 20.8008C20.043 20.8008 19.8242 21.0195 19.8242 21.2891C19.8242 21.5586 20.043 21.7773 20.3125 21.7773C20.582 21.7773 20.8008 21.5586 20.8008 21.2891C20.8008 21.0195 20.582 20.8008 20.3125 20.8008Z" fill="white"/>
                                    <path d="M21.7773 2.31602V1.46484C21.7773 0.657129 21.1202 0 20.3125 0H4.6875C3.87979 0 3.22266 0.657129 3.22266 1.46484V2.31602C0.0377443 8.19805 0.000146484 8.02339 0 8.30024C0 8.30044 0 8.30059 0 8.30078V9.27734C0 10.1237 0.489355 10.9108 1.26953 11.3584V24.5117C1.26953 24.7813 1.48818 25 1.75781 25H23.2422C23.5118 25 23.7305 24.7813 23.7305 24.5117V11.3584C24.5028 10.9112 25 10.1148 25 9.27734V8.30078C25 8.30059 25 8.30044 25 8.30024C24.9999 8.02041 24.9312 8.14067 21.7773 2.31602ZM23.6859 7.8125H20.6645L19.0369 2.92969H21.0004L23.6859 7.8125ZM16.8945 8.78906H19.8242V9.27734C19.8242 10.0851 19.1671 10.7422 18.3594 10.7422C17.5517 10.7422 16.8945 10.0851 16.8945 9.27734V8.78906ZM16.8199 7.8125L16.0061 2.92969H18.0074L19.635 7.8125H16.8199ZM4.19922 1.46484C4.19922 1.19561 4.41826 0.976562 4.6875 0.976562H20.3125C20.5817 0.976562 20.8008 1.19561 20.8008 1.46484V1.95312C20.3358 1.95312 4.66777 1.95312 4.19922 1.95312V1.46484ZM15.918 8.78906V9.27734C15.918 10.0851 15.2608 10.7422 14.4531 10.7422C13.6454 10.7422 12.9883 10.0851 12.9883 9.27734V8.78906H15.918ZM12.9883 7.8125V2.92969H15.0161L15.8299 7.8125H12.9883ZM9.17017 7.8125L9.98398 2.92969H12.0117V7.8125H9.17017ZM12.0117 8.78906V9.27734C12.0117 10.0851 11.3546 10.7422 10.5469 10.7422C9.73916 10.7422 9.08203 10.0851 9.08203 9.27734V8.78906H12.0117ZM5.36494 7.8125L6.99253 2.92969H8.9939L8.18008 7.8125H5.36494ZM8.10547 8.78906V9.27734C8.10547 10.0851 7.44834 10.7422 6.64062 10.7422C5.83291 10.7422 5.17578 10.0851 5.17578 9.27734V8.78906H8.10547ZM3.99961 2.92969H5.96313L4.33555 7.8125H1.31406L3.99961 2.92969ZM0.976562 9.27734V8.78906H4.19922V9.27734C4.19922 10.044 3.4312 10.7422 2.58789 10.7422C2.37529 10.7422 2.15498 10.696 1.9499 10.6083C1.36772 10.3607 0.976562 9.82578 0.976562 9.27734ZM10.0586 24.0234H5.17578V19.8242H10.0586V24.0234ZM10.0586 18.8477H5.17578V14.6484H10.0586V18.8477ZM22.7539 24.0234H11.0352V14.1602C11.0352 13.8905 10.8165 13.6719 10.5469 13.6719H4.6875C4.41787 13.6719 4.19922 13.8905 4.19922 14.1602V24.0234H2.24609V11.6949C2.35928 11.7103 2.47329 11.7188 2.58789 11.7188C3.23052 11.7188 3.88013 11.4642 4.37002 11.0202C4.47837 10.9221 4.57593 10.8171 4.66348 10.7071C5.10752 11.3194 5.82812 11.7188 6.64062 11.7188C7.43843 11.7188 8.14795 11.3341 8.59375 10.7405C9.03955 11.3341 9.74907 11.7188 10.5469 11.7188C11.3447 11.7188 12.0542 11.3341 12.5 10.7405C12.9458 11.3341 13.6553 11.7188 14.4531 11.7188C15.2509 11.7188 15.9604 11.3341 16.4062 10.7405C16.8521 11.3341 17.5616 11.7188 18.3594 11.7188C19.1719 11.7188 19.8925 11.3194 20.3365 10.7071C20.4241 10.8171 20.5216 10.922 20.63 11.0202C21.1199 11.4642 21.7695 11.7188 22.4121 11.7188C22.5265 11.7188 22.6405 11.7105 22.7539 11.6951V24.0234ZM24.0234 9.27734C24.0234 9.84121 23.6177 10.3823 23.014 10.6238C22.8165 10.7024 22.6141 10.7422 22.4121 10.7422C21.5688 10.7422 20.8008 10.044 20.8008 9.27734V8.78906H24.0234V9.27734Z" fill="white"/>
                                    <path d="M21.2891 18.8477H20.8008V14.1602C20.8008 13.8905 20.5821 13.6719 20.3125 13.6719H14.4531C14.1835 13.6719 13.9648 13.8905 13.9648 14.1602V18.8477H13.4766C13.2069 18.8477 12.9883 19.0663 12.9883 19.3359C12.9883 19.6056 13.2069 19.8242 13.4766 19.8242H21.2891C21.5587 19.8242 21.7773 19.6056 21.7773 19.3359C21.7773 19.0663 21.5587 18.8477 21.2891 18.8477ZM19.8242 18.8477H14.9414V14.6484H19.8242V18.8477Z" fill="white"/>
                                    <path d="M18.3594 20.8008H14.4531C14.1835 20.8008 13.9648 21.0194 13.9648 21.2891C13.9648 21.5587 14.1835 21.7773 14.4531 21.7773H18.3594C18.629 21.7773 18.8477 21.5587 18.8477 21.2891C18.8477 21.0194 18.629 20.8008 18.3594 20.8008Z" fill="white"/>
                                </svg>
                                <a href="<?php echo home_url('small-business');?>" class="have-submenu" data-hamburger="small-business-hamburger">
                                    Small Business
                                    <span class="icon-arrow-right"></span>
                                </a>
                            </li>
                            <li class="item-contact">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.58333 8.33337H8.75V9.16671H9.58333V8.33337Z" fill="white"/>
                                    <path d="M9.58333 10H8.75V10.8333H9.58333V10Z" fill="white"/>
                                    <path d="M9.58333 11.6667H8.75V12.5001H9.58333V11.6667Z" fill="white"/>
                                    <path d="M9.58333 13.3333H8.75V14.1666H9.58333V13.3333Z" fill="white"/>
                                    <path d="M11.25 8.33337H10.4166V9.16671H11.25V8.33337Z" fill="white"/>
                                    <path d="M11.25 10H10.4166V10.8333H11.25V10Z" fill="white"/>
                                    <path d="M11.25 11.6667H10.4166V12.5001H11.25V11.6667Z" fill="white"/>
                                    <path d="M11.25 13.3333H10.4166V14.1666H11.25V13.3333Z" fill="white"/>
                                    <path d="M12.9166 8.33337H12.0833V9.16671H12.9166V8.33337Z" fill="white"/>
                                    <path d="M12.9166 10H12.0833V10.8333H12.9166V10Z" fill="white"/>
                                    <path d="M12.9166 11.6667H12.0833V12.5001H12.9166V11.6667Z" fill="white"/>
                                    <path d="M12.9166 13.3333H12.0833V14.1666H12.9166V13.3333Z" fill="white"/>
                                    <path d="M14.5833 8.33337H13.75V9.16671H14.5833V8.33337Z" fill="white"/>
                                    <path d="M11.25 6.66663H10.4166V7.49996H11.25V6.66663Z" fill="white"/>
                                    <path d="M12.9166 6.66663H12.0833V7.49996H12.9166V6.66663Z" fill="white"/>
                                    <path d="M14.5833 6.66663H13.75V7.49996H14.5833V6.66663Z" fill="white"/>
                                    <path d="M14.5833 10H13.75V10.8333H14.5833V10Z" fill="white"/>
                                    <path d="M14.5833 11.6667H13.75V12.5001H14.5833V11.6667Z" fill="white"/>
                                    <path d="M14.5833 13.3333H13.75V14.1666H14.5833V13.3333Z" fill="white"/>
                                    <path d="M16.25 8.33337H15.4167V9.16671H16.25V8.33337Z" fill="white"/>
                                    <path d="M16.25 10H15.4167V10.8333H16.25V10Z" fill="white"/>
                                    <path d="M16.25 11.6667H15.4167V12.5001H16.25V11.6667Z" fill="white"/>
                                    <path d="M16.25 13.3333H15.4167V14.1666H16.25V13.3333Z" fill="white"/>
                                    <path d="M24.5838 6.25C24.5836 6.25 24.5835 6.25 24.5833 6.25H18.3333V0.416667C18.3335 0.186667 18.1471 0.000156348 17.9171 9.81849e-08C17.917 9.81849e-08 17.9168 9.81849e-08 17.9167 9.81849e-08H7.08333C6.85333 -0.000156152 6.66682 0.186198 6.66667 0.416198C6.66667 0.416354 6.66667 0.41651 6.66667 0.416667V6.25H0.416667C0.186667 6.24984 0.000156348 6.4362 9.81849e-08 6.6662C9.81849e-08 6.66635 9.81849e-08 6.66651 9.81849e-08 6.66667V21.6667C-0.000156152 21.8967 0.186198 22.0832 0.416198 22.0833C0.416354 22.0833 0.41651 22.0833 0.416667 22.0833H1.28766C1.26349 22.2209 1.25089 22.3603 1.25 22.5V24.5833C1.24984 24.8133 1.4362 24.9998 1.6662 25C1.66635 25 1.66651 25 1.66667 25H23.3333C23.5633 25.0002 23.7498 24.8138 23.75 24.5838C23.75 24.5836 23.75 24.5835 23.75 24.5833V22.5C23.7492 22.3603 23.7366 22.2209 23.7123 22.0833H24.5833C24.8133 22.0835 24.9998 21.8971 25 21.6671C25 21.667 25 21.6668 25 21.6667V6.66667C25.0002 6.43667 24.8138 6.25016 24.5838 6.25ZM17.9167 17.9167C17.9167 18.3769 17.5436 18.75 17.0833 18.75C16.6231 18.75 16.25 18.3769 16.25 17.9167C16.25 17.4564 16.6231 17.0833 17.0833 17.0833C17.5433 17.0839 17.9161 17.4567 17.9167 17.9167ZM7.91667 17.0833C8.37693 17.0833 8.75 17.4564 8.75 17.9167C8.75 18.3769 8.37693 18.75 7.91667 18.75C7.45641 18.75 7.08333 18.3769 7.08333 17.9167C7.08391 17.4567 7.45667 17.0839 7.91667 17.0833ZM5.41667 24.1667H2.08333V22.5C2.08333 21.5795 2.82953 20.8333 3.75 20.8333C4.67047 20.8333 5.41667 21.5795 5.41667 22.5V24.1667ZM2.91667 19.1667C2.91667 18.7064 3.28974 18.3333 3.75 18.3333C4.21026 18.3333 4.58333 18.7064 4.58333 19.1667C4.58333 19.6269 4.21026 20 3.75 20C3.29 19.9994 2.91724 19.6267 2.91667 19.1667ZM5.47979 20.6992C5.32266 20.5477 5.14646 20.4172 4.95562 20.3113C5.59115 19.6454 5.56661 18.5904 4.90078 17.9548C4.23495 17.3193 3.17995 17.3439 2.54437 18.0097C1.92964 18.6537 1.92964 19.6672 2.54437 20.3112C2.14667 20.5319 1.81625 20.8564 1.58823 21.2499H0.833333V7.08333H6.66667V16.8258C6.09448 17.4679 6.1138 18.4424 6.71104 19.0613C6.08604 19.4069 5.63818 20.0028 5.47979 20.6992ZM9.58333 24.1667H6.25V21.25C6.25 20.3295 6.9962 19.5833 7.91667 19.5833C8.83713 19.5833 9.58333 20.3295 9.58333 21.25V24.1667ZM14.5833 24.1667H10.4167V21.25C10.4167 20.0994 11.3494 19.1667 12.5 19.1667C13.6506 19.1667 14.5833 20.0994 14.5833 21.25V24.1667ZM11.25 17.0833C11.25 16.393 11.8096 15.8333 12.5 15.8333C13.1904 15.8333 13.75 16.393 13.75 17.0833C13.75 17.7737 13.1904 18.3333 12.5 18.3333C11.8099 18.3326 11.2507 17.7734 11.25 17.0833ZM15.0376 19.8174C14.7586 19.3256 14.3435 18.9248 13.8421 18.6633C14.7222 17.922 14.8347 16.6077 14.0935 15.7277C13.3522 14.8476 12.0379 14.7351 11.1579 15.4763C10.2778 16.2176 10.1653 17.5319 10.9065 18.4119C10.983 18.5027 11.067 18.5868 11.1579 18.6633C10.6565 18.9248 10.2414 19.3256 9.96239 19.8174C9.74333 19.5049 9.45604 19.2464 9.12229 19.0613C9.76109 18.4078 9.74922 17.3601 9.09568 16.7213C8.67489 16.3099 8.06734 16.1531 7.5 16.3092V0.833333H17.5V16.3092C17.3642 16.2717 17.2242 16.2518 17.0833 16.25C16.1653 16.2476 15.4191 16.9898 15.4167 17.9079C15.4155 18.3374 15.5808 18.7508 15.8777 19.0613C15.544 19.2464 15.2567 19.5049 15.0376 19.8174ZM18.75 22.5V24.1667H15.4167V21.25C15.4167 20.3295 16.1629 19.5833 17.0833 19.5833C18.0038 19.5833 18.75 20.3295 18.75 21.25V22.5ZM22.9167 24.1667H19.5833V22.5C19.5833 21.5795 20.3295 20.8333 21.25 20.8333C22.1705 20.8333 22.9167 21.5795 22.9167 22.5V24.1667ZM20.4167 19.1667C20.4167 18.7064 20.7897 18.3333 21.25 18.3333C21.7103 18.3333 22.0833 18.7064 22.0833 19.1667C22.0833 19.6269 21.7103 20 21.25 20C20.79 19.9994 20.4172 19.6267 20.4167 19.1667ZM24.1667 21.25H23.4118C23.1837 20.8564 22.8533 20.532 22.4556 20.3113C23.0911 19.6454 23.0666 18.5904 22.4008 17.9548C21.7349 17.3193 20.6799 17.3439 20.0444 18.0097C19.4296 18.6537 19.4296 19.6672 20.0444 20.3112C19.8535 20.4172 19.6773 20.5476 19.5202 20.6992C19.3619 20.0027 18.914 19.4069 18.289 19.0612C18.8862 18.4424 18.9056 17.4678 18.3334 16.8258V7.08333H24.1667V21.25H24.1667Z" fill="white"/>
                                    <path d="M20.4167 9.58325H19.5834V16.2499H20.4167V9.58325Z" fill="white"/>
                                    <path d="M22.9167 9.58325H22.0834V16.2499H22.9167V9.58325Z" fill="white"/>
                                    <path d="M2.91671 9.58325H2.08337V16.2499H2.91671V9.58325Z" fill="white"/>
                                    <path d="M5.41671 9.58325H4.58337V16.2499H5.41671V9.58325Z" fill="white"/>
                                    <path d="M15.0005 1.66663C15.0003 1.66663 15.0001 1.66663 15 1.66663H9.99998C9.76998 1.66647 9.58347 1.85282 9.58331 2.08282C9.58331 2.08298 9.58331 2.08314 9.58331 2.08329V5.41663C9.58316 5.64663 9.76951 5.83314 9.99951 5.83329C9.99967 5.83329 9.99982 5.83329 9.99998 5.83329H15C15.23 5.83345 15.4165 5.64709 15.4166 5.41709C15.4166 5.41694 15.4166 5.41678 15.4166 5.41663V2.08329C15.4168 1.85329 15.2305 1.66678 15.0005 1.66663ZM14.5833 4.99996H10.4166V2.49996H14.5833V4.99996Z" fill="white"/>
                                </svg>
                                <a href="<?php echo home_url('enterprises');?>" class="have-submenu" data-hamburger="enterprises-hamburger">
                                    Enterprise & Tech Startup
                                    <span class="icon-arrow-right"></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="list-contact-us">
                            <li class="item-contact">
                                <a href="<?php echo home_url('contact-us');?>">Contact Us</a>
                            </li>
                            <li class="item-contact">
                                <a href="<?php echo home_url('customer-support');?>">Support</a>
                            </li>
                        </ul>
                        <ul class="list-contact-us">
                            <li class="item-contact">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25 12.5C25 5.60773 19.3923 0 12.5 0C5.60773 0 0 5.60773 0 12.5C0 16.1405 1.56545 19.4218 4.05727 21.7082L4.04545 21.7186L4.45091 22.0605C4.47727 22.0827 4.50591 22.1009 4.53227 22.1227C4.74773 22.3014 4.97091 22.4709 5.19818 22.635C5.27182 22.6882 5.34545 22.7414 5.42045 22.7932C5.66318 22.9605 5.91227 23.1191 6.16682 23.2695C6.22227 23.3023 6.27818 23.3341 6.33409 23.3659C6.61273 23.5245 6.89727 23.6741 7.18864 23.8114C7.21 23.8214 7.23182 23.8305 7.25318 23.8405C8.20273 24.2818 9.21636 24.6059 10.2764 24.7973C10.3041 24.8023 10.3318 24.8073 10.36 24.8123C10.6891 24.8691 11.0218 24.9145 11.3586 24.945C11.3995 24.9486 11.4405 24.9509 11.4818 24.9545C11.8173 24.9823 12.1564 25 12.5 25C12.8405 25 13.1764 24.9823 13.51 24.9555C13.5523 24.9518 13.5945 24.9495 13.6368 24.9459C13.9709 24.9155 14.3009 24.8714 14.6268 24.8155C14.655 24.8105 14.6836 24.8055 14.7118 24.8C15.7559 24.6127 16.755 24.2959 17.6923 23.8659C17.7268 23.85 17.7618 23.835 17.7964 23.8186C18.0768 23.6868 18.3509 23.5445 18.6195 23.3932C18.6864 23.3555 18.7527 23.3173 18.8191 23.2782C19.0636 23.1341 19.3041 22.9836 19.5377 22.8236C19.6218 22.7664 19.7041 22.7059 19.7873 22.6459C19.9868 22.5023 20.1827 22.3541 20.3732 22.1991C20.4155 22.165 20.4609 22.1355 20.5023 22.1005L20.9182 21.7532L20.9059 21.7427C23.4195 19.4555 25 16.1591 25 12.5ZM0.909091 12.5C0.909091 6.10864 6.10864 0.909091 12.5 0.909091C18.8914 0.909091 24.0909 6.10864 24.0909 12.5C24.0909 15.9441 22.5795 19.0405 20.1868 21.165C20.0532 21.0727 19.9186 20.99 19.7809 20.9209L15.9323 18.9968C15.5868 18.8241 15.3723 18.4768 15.3723 18.0909V16.7468C15.4614 16.6368 15.5555 16.5123 15.6527 16.3755C16.1509 15.6718 16.5505 14.8891 16.8418 14.0468C17.4177 13.7732 17.7895 13.1995 17.7895 12.5518V10.9405C17.7895 10.5464 17.645 10.1641 17.3864 9.86364V7.74227C17.41 7.50636 17.4936 6.175 16.5305 5.07682C15.6927 4.12045 14.3368 3.63636 12.5 3.63636C10.6632 3.63636 9.30727 4.12045 8.46955 5.07636C7.50636 6.17455 7.59 7.50591 7.61364 7.74182V9.86318C7.35545 10.1636 7.21045 10.5459 7.21045 10.94V12.5514C7.21045 13.0518 7.435 13.5186 7.81955 13.8336C8.18773 15.2759 8.94545 16.3677 9.22545 16.7377V18.0532C9.22545 18.4241 9.02318 18.765 8.69727 18.9432L5.10318 20.9036C4.98864 20.9659 4.875 21.0386 4.76136 21.12C2.39818 18.9964 0.909091 15.9191 0.909091 12.5ZM19.2995 21.8782C19.1405 21.9936 18.9786 22.1055 18.8145 22.2123C18.7391 22.2614 18.6641 22.3105 18.5873 22.3582C18.3727 22.4909 18.1545 22.6173 17.9318 22.7355C17.8827 22.7614 17.8332 22.7859 17.7836 22.8114C17.2718 23.0736 16.7423 23.2991 16.1982 23.4823C16.1791 23.4886 16.16 23.4955 16.1405 23.5018C15.8555 23.5964 15.5668 23.6805 15.275 23.7527C15.2741 23.7527 15.2732 23.7532 15.2723 23.7532C14.9777 23.8259 14.6795 23.8864 14.3795 23.9359C14.3714 23.9373 14.3632 23.9391 14.355 23.9405C14.0727 23.9864 13.7882 24.0195 13.5027 24.0445C13.4523 24.0491 13.4018 24.0523 13.3509 24.0559C13.0686 24.0773 12.785 24.0909 12.5 24.0909C12.2118 24.0909 11.9245 24.0768 11.6386 24.0555C11.5891 24.0518 11.5395 24.0486 11.4905 24.0441C11.2023 24.0186 10.9155 23.9845 10.6314 23.9382C10.6186 23.9359 10.6059 23.9336 10.5932 23.9314C9.99227 23.8309 9.40091 23.6832 8.825 23.49C8.80727 23.4841 8.78909 23.4777 8.77136 23.4718C8.48546 23.3745 8.20273 23.2668 7.925 23.1477C7.92318 23.1468 7.92091 23.1459 7.91909 23.145C7.65636 23.0318 7.39864 22.9064 7.14409 22.7741C7.11091 22.7568 7.07727 22.7405 7.04455 22.7227C6.81227 22.5986 6.585 22.4645 6.36091 22.3245C6.29455 22.2827 6.22864 22.2405 6.16318 22.1977C5.95682 22.0627 5.75318 21.9223 5.555 21.7736C5.53455 21.7582 5.515 21.7418 5.49455 21.7264C5.50909 21.7182 5.52364 21.71 5.53818 21.7018L9.13227 19.7414C9.75045 19.4041 10.1345 18.7573 10.1345 18.0532L10.1341 16.4159L10.0295 16.2895C10.0195 16.2782 9.03682 15.0827 8.66545 13.4641L8.62409 13.2841L8.46909 13.1836C8.25045 13.0423 8.11955 12.8059 8.11955 12.5509V10.9395C8.11955 10.7282 8.20909 10.5314 8.37273 10.3836L8.52273 10.2482V7.71636L8.51864 7.65682C8.51727 7.64591 8.38318 6.55273 9.15318 5.675C9.81045 4.92591 10.9368 4.54545 12.5 4.54545C14.0573 4.54545 15.18 4.92273 15.8391 5.66636C16.6082 6.535 16.4823 7.64864 16.4814 7.65773L16.4773 10.2491L16.6273 10.3845C16.7905 10.5318 16.8805 10.7291 16.8805 10.9405V12.5518C16.8805 12.8759 16.66 13.17 16.3436 13.2677L16.1177 13.3373L16.045 13.5623C15.7768 14.3955 15.395 15.165 14.9105 15.8495C14.7914 16.0177 14.6755 16.1668 14.5759 16.2809L14.4632 16.4095V18.0909C14.4632 18.8236 14.8705 19.4827 15.5259 19.81L19.3745 21.7341C19.3991 21.7464 19.4232 21.7591 19.4473 21.7718C19.3986 21.8086 19.3486 21.8427 19.2995 21.8782Z" fill="white"/>
                                </svg>
                                <a href="" class="have-submenu" data-hamburger="portal-hamburger">
                                    My Portal
                                    <span class="icon-arrow-right"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="main-menu-hamburger">
                        <div class="box-content d-none small-business-hamburger">
                            <div class="title-menu">Solutions</div>
                            <div class="list-service-name clearfix">
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('plans-and-pricing');?>">
                                        Pricing
                                        <svg width="135" height="20" viewBox="0 0 135 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="35" width="100" height="20" rx="3" fill="#AEE366"/>
                                            <path d="M50.0137 10.5635C48.888 10.2399 48.0677 9.84342 47.5527 9.37402C47.0423 8.90007 46.7871 8.31673 46.7871 7.62402C46.7871 6.84017 47.0993 6.19303 47.7236 5.68262C48.3525 5.16764 49.1683 4.91016 50.1709 4.91016C50.8545 4.91016 51.4629 5.04232 51.9961 5.30664C52.5339 5.57096 52.9486 5.93555 53.2402 6.40039C53.5365 6.86523 53.6846 7.37337 53.6846 7.9248H52.3652C52.3652 7.32324 52.1738 6.85156 51.791 6.50977C51.4082 6.16341 50.8682 5.99023 50.1709 5.99023C49.5238 5.99023 49.0179 6.13379 48.6533 6.4209C48.2933 6.70345 48.1133 7.09766 48.1133 7.60352C48.1133 8.00911 48.2842 8.35319 48.626 8.63574C48.9723 8.91374 49.5579 9.16895 50.3828 9.40137C51.2122 9.63379 51.8594 9.89128 52.3242 10.1738C52.7936 10.4518 53.14 10.7777 53.3633 11.1514C53.5911 11.5251 53.7051 11.9648 53.7051 12.4707C53.7051 13.2773 53.3906 13.9245 52.7617 14.4121C52.1328 14.8952 51.292 15.1367 50.2393 15.1367C49.5557 15.1367 48.9176 15.0068 48.3252 14.7471C47.7327 14.4827 47.2747 14.1227 46.9512 13.667C46.6322 13.2113 46.4727 12.694 46.4727 12.1152H47.792C47.792 12.7168 48.013 13.193 48.4551 13.5439C48.9017 13.8903 49.4964 14.0635 50.2393 14.0635C50.932 14.0635 51.4629 13.9222 51.832 13.6396C52.2012 13.3571 52.3857 12.972 52.3857 12.4844C52.3857 11.9967 52.2148 11.6208 51.873 11.3564C51.5312 11.0876 50.9115 10.8232 50.0137 10.5635ZM59.7617 14.2686C59.2695 14.8473 58.5472 15.1367 57.5947 15.1367C56.8063 15.1367 56.2048 14.9089 55.79 14.4531C55.3799 13.9928 55.1725 13.3138 55.168 12.416V7.60352H56.4326V12.3818C56.4326 13.5029 56.8883 14.0635 57.7998 14.0635C58.766 14.0635 59.4085 13.7035 59.7275 12.9834V7.60352H60.9922V15H59.7891L59.7617 14.2686ZM69.1816 11.3838C69.1816 12.514 68.9219 13.4232 68.4023 14.1113C67.8828 14.7949 67.1855 15.1367 66.3105 15.1367C65.3763 15.1367 64.654 14.8063 64.1436 14.1455L64.082 15H62.9199V4.5H64.1846V8.41699C64.695 7.78353 65.3991 7.4668 66.2969 7.4668C67.1947 7.4668 67.8988 7.80632 68.4092 8.48535C68.9242 9.16439 69.1816 10.0941 69.1816 11.2744V11.3838ZM67.917 11.2402C67.917 10.3789 67.7507 9.71354 67.418 9.24414C67.0853 8.77474 66.6068 8.54004 65.9824 8.54004C65.1484 8.54004 64.5492 8.92741 64.1846 9.70215V12.9014C64.5719 13.6761 65.1758 14.0635 65.9961 14.0635C66.6022 14.0635 67.0739 13.8288 67.4111 13.3594C67.7484 12.89 67.917 12.1836 67.917 11.2402ZM75.0879 13.0381C75.0879 12.6963 74.958 12.432 74.6982 12.2451C74.443 12.0537 73.9941 11.8896 73.3516 11.7529C72.7135 11.6162 72.2054 11.4521 71.8271 11.2607C71.4535 11.0693 71.1755 10.8415 70.9932 10.5771C70.8154 10.3128 70.7266 9.99837 70.7266 9.63379C70.7266 9.02767 70.9818 8.51497 71.4922 8.0957C72.0072 7.67643 72.6634 7.4668 73.4609 7.4668C74.2995 7.4668 74.9785 7.68327 75.498 8.11621C76.0221 8.54915 76.2842 9.10286 76.2842 9.77734H75.0127C75.0127 9.43099 74.8646 9.13249 74.5684 8.88184C74.2767 8.63118 73.9076 8.50586 73.4609 8.50586C73.0007 8.50586 72.6406 8.60612 72.3809 8.80664C72.1211 9.00716 71.9912 9.26921 71.9912 9.59277C71.9912 9.89811 72.112 10.1283 72.3535 10.2832C72.5951 10.4382 73.0303 10.5863 73.6592 10.7275C74.2926 10.8688 74.8053 11.0374 75.1973 11.2334C75.5892 11.4294 75.8786 11.6663 76.0654 11.9443C76.2568 12.2178 76.3525 12.5527 76.3525 12.9492C76.3525 13.61 76.0882 14.141 75.5596 14.542C75.0309 14.9385 74.3451 15.1367 73.502 15.1367C72.9095 15.1367 72.3854 15.0319 71.9297 14.8223C71.474 14.6126 71.1162 14.321 70.8564 13.9473C70.6012 13.569 70.4736 13.1611 70.4736 12.7236H71.7383C71.7611 13.1475 71.9297 13.4847 72.2441 13.7354C72.5632 13.9814 72.9824 14.1045 73.502 14.1045C73.9805 14.1045 74.3633 14.0088 74.6504 13.8174C74.9421 13.6214 75.0879 13.3617 75.0879 13.0381ZM80.9668 14.1045C81.418 14.1045 81.8122 13.9678 82.1494 13.6943C82.4867 13.4209 82.6735 13.0791 82.71 12.6689H83.9062C83.8835 13.0928 83.7376 13.4961 83.4688 13.8789C83.1999 14.2617 82.8398 14.5671 82.3887 14.7949C81.9421 15.0228 81.4681 15.1367 80.9668 15.1367C79.9596 15.1367 79.1576 14.8018 78.5605 14.1318C77.9681 13.4574 77.6719 12.5368 77.6719 11.3701V11.1582C77.6719 10.4382 77.804 9.79785 78.0684 9.2373C78.3327 8.67676 78.7109 8.24154 79.2031 7.93164C79.6999 7.62174 80.2855 7.4668 80.96 7.4668C81.7894 7.4668 82.4775 7.71517 83.0244 8.21191C83.5758 8.70866 83.8698 9.35352 83.9062 10.1465H82.71C82.6735 9.66797 82.4912 9.27604 82.1631 8.9707C81.8395 8.66081 81.4385 8.50586 80.96 8.50586C80.3174 8.50586 79.8184 8.73828 79.4629 9.20312C79.112 9.66341 78.9365 10.3311 78.9365 11.2061V11.4453C78.9365 12.2975 79.112 12.9538 79.4629 13.4141C79.8138 13.8743 80.3151 14.1045 80.9668 14.1045ZM88.9033 8.73828C88.7119 8.70638 88.5046 8.69043 88.2812 8.69043C87.4518 8.69043 86.889 9.04362 86.5928 9.75V15H85.3281V7.60352H86.5586L86.5791 8.45801C86.9938 7.7972 87.5817 7.4668 88.3428 7.4668C88.5889 7.4668 88.7757 7.4987 88.9033 7.5625V8.73828ZM91.4463 15H90.1816V7.60352H91.4463V15ZM90.0791 5.6416C90.0791 5.43652 90.1406 5.26335 90.2637 5.12207C90.3913 4.98079 90.5781 4.91016 90.8242 4.91016C91.0703 4.91016 91.2572 4.98079 91.3848 5.12207C91.5124 5.26335 91.5762 5.43652 91.5762 5.6416C91.5762 5.84668 91.5124 6.01758 91.3848 6.1543C91.2572 6.29102 91.0703 6.35938 90.8242 6.35938C90.5781 6.35938 90.3913 6.29102 90.2637 6.1543C90.1406 6.01758 90.0791 5.84668 90.0791 5.6416ZM99.7246 11.3838C99.7246 12.5094 99.4671 13.4163 98.9521 14.1045C98.4372 14.7926 97.7399 15.1367 96.8604 15.1367C95.9626 15.1367 95.2562 14.8519 94.7412 14.2822V17.8438H93.4766V7.60352H94.6318L94.6934 8.42383C95.2083 7.78581 95.9238 7.4668 96.8398 7.4668C97.7285 7.4668 98.4303 7.80176 98.9453 8.47168C99.4648 9.1416 99.7246 10.0736 99.7246 11.2676V11.3838ZM98.46 11.2402C98.46 10.4062 98.2822 9.74772 97.9268 9.26465C97.5713 8.78158 97.0837 8.54004 96.4639 8.54004C95.6982 8.54004 95.124 8.87956 94.7412 9.55859V13.0928C95.1195 13.7673 95.6982 14.1045 96.4775 14.1045C97.0837 14.1045 97.5645 13.8652 97.9199 13.3867C98.2799 12.9036 98.46 12.1882 98.46 11.2402ZM103.054 5.8125V7.60352H104.435V8.58105H103.054V13.168C103.054 13.4642 103.115 13.6875 103.238 13.8379C103.361 13.9837 103.571 14.0566 103.867 14.0566C104.013 14.0566 104.214 14.0293 104.469 13.9746V15C104.136 15.0911 103.812 15.1367 103.498 15.1367C102.933 15.1367 102.507 14.9658 102.22 14.624C101.933 14.2822 101.789 13.7969 101.789 13.168V8.58105H100.442V7.60352H101.789V5.8125H103.054ZM107.292 15H106.027V7.60352H107.292V15ZM105.925 5.6416C105.925 5.43652 105.986 5.26335 106.109 5.12207C106.237 4.98079 106.424 4.91016 106.67 4.91016C106.916 4.91016 107.103 4.98079 107.23 5.12207C107.358 5.26335 107.422 5.43652 107.422 5.6416C107.422 5.84668 107.358 6.01758 107.23 6.1543C107.103 6.29102 106.916 6.35938 106.67 6.35938C106.424 6.35938 106.237 6.29102 106.109 6.1543C105.986 6.01758 105.925 5.84668 105.925 5.6416ZM108.987 11.2334C108.987 10.5088 109.129 9.8571 109.411 9.27832C109.698 8.69954 110.095 8.25293 110.601 7.93848C111.111 7.62402 111.692 7.4668 112.344 7.4668C113.351 7.4668 114.164 7.81543 114.784 8.5127C115.409 9.20996 115.721 10.1374 115.721 11.2949V11.3838C115.721 12.1038 115.582 12.751 115.304 13.3252C115.03 13.8949 114.636 14.3392 114.121 14.6582C113.611 14.9772 113.023 15.1367 112.357 15.1367C111.355 15.1367 110.541 14.7881 109.917 14.0908C109.297 13.3936 108.987 12.4707 108.987 11.3223V11.2334ZM110.259 11.3838C110.259 12.2041 110.448 12.8626 110.826 13.3594C111.209 13.8561 111.719 14.1045 112.357 14.1045C113 14.1045 113.51 13.8538 113.889 13.3525C114.267 12.8467 114.456 12.1403 114.456 11.2334C114.456 10.4222 114.262 9.76595 113.875 9.26465C113.492 8.75879 112.982 8.50586 112.344 8.50586C111.719 8.50586 111.216 8.75423 110.833 9.25098C110.45 9.74772 110.259 10.4587 110.259 11.3838ZM118.503 7.60352L118.544 8.5332C119.109 7.82227 119.847 7.4668 120.759 7.4668C122.322 7.4668 123.11 8.34863 123.124 10.1123V15H121.859V10.1055C121.855 9.57227 121.732 9.17806 121.49 8.92285C121.253 8.66764 120.882 8.54004 120.376 8.54004C119.966 8.54004 119.606 8.64941 119.296 8.86816C118.986 9.08691 118.744 9.37402 118.571 9.72949V15H117.307V7.60352H118.503Z" fill="#0D3153"/>
                                            <path d="M9.99998 0C4.4774 0 0 4.47721 0 9.99998C0 15.5227 4.4774 20 9.99998 20C15.5232 20 20 15.5227 20 9.99998C20 4.47721 15.523 0 9.99998 0ZM8.16557 15.1368L3.76237 10.7338L5.22998 9.26615L8.16557 12.2016L14.77 5.59696L16.2376 7.06457L8.16557 15.1368Z" fill="#AEE366"/>
                                        </svg>
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('small-business');?>">
                                        Product
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('coverage-locations');?>">
                                        Coverage Locations
                                    </a>
                                </article>
                            </div>
                        </div>
                        <div class="box-content d-none enterprises-hamburger">
                            <div class="title-menu">Solutions</div>
                            <div class="list-service-name clearfix">
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('full-cycle-development');?>">
                                        Full Cycle Development
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('it-outsourcing');?>">
                                        IT Outsourcing
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('testing');?>">
                                        Testing
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('devops');?>">
                                        DevOps
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('process-framework');?>">
                                        Process Framework
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('client-focused-solutions');?>">
                                        Client-Focused Solutions
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('get-a-team');?>">
                                        Get a Verified Team Now
                                        <svg width="56" height="30" viewBox="0 0 56 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M51.9458 13.8573C52.8243 13.24 53.406 12.2131 53.406 11.0556C53.406 9.16202 51.8746 7.63056 49.981 7.63056C48.0875 7.63056 46.556 9.16202 46.556 11.0556C46.556 12.2131 47.1318 13.24 48.0162 13.8573C47.2624 14.1185 46.5738 14.5221 45.9921 15.0445C45.1907 14.3619 44.2469 13.8395 43.2141 13.5308C44.4666 12.771 45.3095 11.388 45.3095 9.81497C45.3095 7.41687 43.3684 5.47583 40.9703 5.47583C38.5722 5.47583 36.6312 7.4228 36.6312 9.81497C36.6312 11.388 37.4681 12.771 38.7266 13.5308C37.7056 13.8395 36.7736 14.3559 35.9782 15.0267C35.3965 14.5162 34.7198 14.1185 33.9778 13.8632C34.8564 13.2459 35.4381 12.219 35.4381 11.0615C35.4381 9.16796 33.9066 7.63649 32.0131 7.63649C30.1195 7.63649 28.588 9.16796 28.588 11.0615C28.588 12.219 29.1638 13.2459 30.0483 13.8632C27.6917 14.6765 26 16.9143 26 19.5439V19.9357C26 19.9475 26.0119 19.9594 26.0237 19.9594H33.2833C33.2418 20.2859 33.218 20.6242 33.218 20.9626V21.3662C33.218 23.1114 34.6308 24.5241 36.3759 24.5241H45.5766C47.3217 24.5241 48.7345 23.1114 48.7345 21.3662V20.9626C48.7345 20.6242 48.7107 20.2859 48.6692 19.9594H55.9763C55.9881 19.9594 56 19.9475 56 19.9357V19.5439C55.9881 16.9084 54.3023 14.6705 51.9458 13.8573ZM47.5057 11.0496C47.5057 9.68438 48.6157 8.57437 49.981 8.57437C51.3463 8.57437 52.4563 9.68438 52.4563 11.0496C52.4563 12.3971 51.37 13.4952 50.0285 13.5249C50.0107 13.5249 49.9988 13.5249 49.981 13.5249C49.9632 13.5249 49.9513 13.5249 49.9335 13.5249C48.5861 13.5012 47.5057 12.403 47.5057 11.0496ZM37.5691 9.81497C37.5691 7.94516 39.0886 6.42557 40.9584 6.42557C42.8283 6.42557 44.3478 7.94516 44.3478 9.81497C44.3478 11.6195 42.9292 13.0975 41.1543 13.1984C41.089 13.1984 41.0237 13.1984 40.9584 13.1984C40.8932 13.1984 40.8279 13.1984 40.7626 13.1984C38.9877 13.0975 37.5691 11.6195 37.5691 9.81497ZM29.52 11.0496C29.52 9.68438 30.63 8.57437 31.9953 8.57437C33.3605 8.57437 34.4705 9.68438 34.4705 11.0496C34.4705 12.3971 33.3843 13.4952 32.0427 13.5249C32.0249 13.5249 32.0131 13.5249 31.9953 13.5249C31.9774 13.5249 31.9656 13.5249 31.9478 13.5249C30.6063 13.5012 29.52 12.403 29.52 11.0496ZM33.4495 19.0037H26.9616C27.2287 16.475 29.3657 14.4925 31.9596 14.4746C31.9715 14.4746 31.9834 14.4746 31.9953 14.4746C32.0071 14.4746 32.019 14.4746 32.0309 14.4746C33.2655 14.4806 34.3934 14.9376 35.2659 15.6796C34.4112 16.6056 33.776 17.7453 33.4495 19.0037ZM47.7729 21.3662C47.7729 22.5831 46.7816 23.5744 45.5647 23.5744H36.3641C35.1472 23.5744 34.1559 22.5831 34.1559 21.3662V20.9626C34.1559 17.2764 37.1001 14.261 40.7626 14.1541C40.8279 14.16 40.8991 14.16 40.9644 14.16C41.0297 14.16 41.1009 14.16 41.1662 14.1541C44.8287 14.261 47.7729 17.2764 47.7729 20.9626V21.3662ZM48.4792 19.0037C48.1528 17.7513 47.5295 16.6294 46.6806 15.7034C47.5592 14.9436 48.6989 14.4865 49.9454 14.4746C49.9573 14.4746 49.9691 14.4746 49.981 14.4746C49.9929 14.4746 50.0047 14.4746 50.0166 14.4746C52.6106 14.4925 54.7475 16.475 55.0146 19.0037H48.4792Z" fill="#8DC63F"/>
                                            <path d="M11.8903 11.2119C11.7441 11.0627 11.5063 11.0627 11.36 11.2119L6.37534 16.2965L3.63997 13.5071C3.49372 13.3579 3.25595 13.3579 3.10969 13.5071C2.96344 13.6563 2.96344 13.8988 3.10969 14.048L6.1098 17.1083C6.18331 17.1825 6.27929 17.22 6.37531 17.22C6.47132 17.22 6.56731 17.1825 6.64008 17.1083L11.8903 11.7528C12.0366 11.6036 12.0366 11.3611 11.8903 11.2119Z" fill="#8DC63F"/>
                                            <path d="M14.745 8.15785L7.60215 6.01499C7.53502 5.995 7.46431 5.995 7.39714 6.01499L0.254297 8.15785C0.10356 8.20285 0 8.34213 0 8.5V16.3572C0 19.5157 4.8157 22.325 7.3943 23.1271C7.42858 23.1379 7.46431 23.1428 7.5 23.1428C7.53569 23.1428 7.57142 23.1379 7.6057 23.1271C10.1843 22.3243 15 19.5157 15 16.3571V8.5C15 8.34213 14.8964 8.20355 14.745 8.15785ZM14.2857 16.3571C14.2857 18.865 10.3122 21.5021 7.5 22.4114C4.68787 21.5021 0.714275 18.865 0.714275 16.3571V8.76572L7.5 6.73L14.2857 8.76572V16.3571Z" fill="#8DC63F"/>
                                        </svg>
                                    </a>
                                </article>
                            </div>
                            <div class="title-menu">Industries</div>
                            <div class="list-industries clearfix">
                                <a href="<?php echo home_url('healthcare');?>" class="industry-name">Healthcare</a>
                                <a href="<?php echo home_url('financial-services');?>" class="industry-name">Financial Services</a>
                                <a href="<?php echo home_url('logistics-and-supply-chain');?>" class="industry-name">Logistics & Supply Chain</a>
                                <a href="<?php echo home_url('hospitality-and-travel');?>" class="industry-name">Hospitality & Travel</a>
                                <a href="<?php echo home_url('ecommerce-and-retail');?>" class="industry-name">Ecommerce & Retail</a>
                                <a href="<?php echo home_url('real-estate-property');?>" class="industry-name">Real Estate & Property</a>
                                <a href="<?php echo home_url('ngos');?>" class="industry-name">NGOs</a>
                                <a href="<?php echo home_url('education');?>" class="industry-name">Education</a>
                            </div>
                        </div>
                        <div class="box-content d-none portal-hamburger">
                            <div class="list-service-name clearfix">
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('small-business-portal');?>">
                                        Small Business
                                    </a>
                                </article>
                                <article>
                                    <a class="title-submenu" href="<?php echo home_url('client-portal');?>">
                                        Enterprises & Startups
                                    </a>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sticky-menu-anchor"></div>
</header>