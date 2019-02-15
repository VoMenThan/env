<?php ob_start();?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        <?php
            wp_title('|', true, 'right');
            bloginfo('name');
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

</head>
<body>

<header>
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
                            <a class="nav-link" href="tel:7206062900">
                                <i class="icon-typical-phone" aria-hidden="true"></i> <span>720-606-2900</span>
                            </a>
                        </li>
                        <li class="nav-item d-md-inline-block d-none-768 d-none">
                            <a class="nav-link" href="mailto:info@envzone.com">
                                <i class="icon-close-mail" aria-hidden="true"></i> <span>info@envzone.com</span>
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
                        <li class="nav-item d-lg-inline-block d-none">
                            <a class="nav-link" href="#">
                                <span>Client Portal</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-3 text-center box-logo-home d-xl-block d-lg-block d-none">
                    <a href="<?php echo get_home_url();?>">
                        <img src="<?php echo ASSET_URL;?>images/envzone-logo.png" alt="Logo Envzone">
                    </a>
                </div>
                <div class="col-lg-9 col-md-12 col-12 d-lg-flex d-md-flex justify-content-lg-end position-static" id="menuBarMobile">

                    <div class="justify-content-lg-end w-100">
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
                                        <div class="row box-sub-menu">
                                            <div class="col-xl-5 col-lg-5 order-lg-0 order-1 d-md-block d-none-768 d-none">
                                                <div class="bg-blue-lv4">
                                                    <h3 class="text-center mb-3">
                                                        COMPANY
                                                    </h3>
                                                    <div class="sub-title-form">
                                                        A top choice of offshore software outsourcing consultant in Denver Metro area.
                                                    </div>
                                                    <p>
                                                        Get to know more about our company, we are much more than happy to see you.
                                                    </p>
                                                    <div class="title-contact">
                                                        It’s cold out there. We would love to invite you for a coffee at our office.
                                                    </div>

                                                    <form class="text-center">
                                                        <input type="email" name="email" placeholder="Enter your email address">
                                                        <textarea placeholder="Your Message" rows="4"></textarea>
                                                        <a class="btn btn-green-env m-auto btn-send-message" href="#">SEND YOUR MESSAGE</a>
                                                    </form>
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
                                                            <p>
                                                                Enzone is an outsouring company that provide software development and IT consulting services located in the US with over a hundred software developers located internationally
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/partnership">
                                                                Partnership
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                Our Channel Partner Program provides you with the opportunity to benefit from our pool of IT and software development expert partners
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/process-framework">
                                                                Process Framework
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We design special process to ensure that we provide quality services which are safety, skills, and authenticity.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/client-focus-solutions/">
                                                                Client - Focus Solutions
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We have ample experience with hundreds of successful projects to our name, you have nothing to be scared of, and we are always on your team.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/careers">
                                                                Careers
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                EnvZone is always seeking talented individuals who are looking for challenging projects. And we are interested in those individuals who can offer reliability, expertise, and versatility that will make them an asset to the company.
                                                            </p>
                                                        </article>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Schedule a Briefing Appointment with a Representative to Learn More.
                                                </div>
                                                <a href="#" class="btn btn-blue-env">
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
                                                        EnvZone specializes custom software development requests across a diverse array of industries.
                                                    </div>
                                                    <p>
                                                        We bring top-notch custom-made solutions to businesses willing to take the leap into the digital world in different industries
                                                    </p>
                                                    <div class="title-contact">
                                                        Send us quick note of your concerns!
                                                    </div>
                                                    <form class="text-center">
                                                        <input type="email" name="email" placeholder="Enter your email address">
                                                        <textarea placeholder="Your Message" rows="4"></textarea>
                                                        <a class="btn btn-green-env m-auto btn-send-message" href="#">SEND YOUR MESSAGE</a>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 order-lg-1 order-0">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/real-estate">
                                                                Real Estate & Property
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We provide solutions leveraging on customer experience to help businesses in the hospitality industry meet and surpass their goals
                                                            </p>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/hospitality">
                                                                Hospitality
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We provide solutions leveraging on customer experience to help businesses in the hospitality industry meet and surpass their goals
                                                            </p>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/education">
                                                                Education
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We develop education softwares which include everything from student information systems to reference management software
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/e-commerce-retail">
                                                                E-Commerce & Retail
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We provide a staff of industry experts to help you boost your sales. Our easy-to-use solutions help you to extend the benefits from the online word
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/financial-services">
                                                                Financial  Services
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We have deep expertise in financial services and provide these services to keep your commercial businesses at the top of the game
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/non-profit-organization">
                                                                Non-profit Organization
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                Envzone provides top-of-the-line services for non-profit organization to help your orgranization become more effective and efficient
                                                            </p>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/healthcare">
                                                                Healthcare
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We offer foremost help to healthcare industries in need of software developed for them to store, analyze and maintain data processed on a daily basis
                                                            </p>
                                                        </article>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/logistics">
                                                                Logistics & Supply Chain
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                Envzone has the capability to provide viable logistic and supply chain solutions to deal with the challenges and help the right products reach the right customers.
                                                            </p>
                                                        </article>
                                                    </div>

                                                </div>
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
                                                        At EnvZone, we offer affordable services which are critical to the growth of your business
                                                    </div>
                                                    <p>
                                                        Whatever your organization, whatever your industry, we provide you with services you need to ensure your projects operate smoothly.
                                                    </p>
                                                    <div class="title-contact">
                                                        Send us a quick note of your current business conflicts!
                                                    </div>
                                                    <form class="text-center">
                                                        <input type="email" name="email" placeholder="Enter your email address">
                                                        <textarea placeholder="Your Message" rows="4"></textarea>
                                                        <a class="btn btn-green-env m-auto btn-send-message" href="#">SEND YOUR MESSAGE</a>
                                                    </form>
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
                                                            <p>
                                                                We are seasoned experts in full cycle development, including: software prototyping, custom software development, product development.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/it-outsourcing">
                                                                IT Outsourcing
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We provide services across almost all technology platforms, work on operating systems and infrastructures.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/testing">
                                                                Testing
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                EnvZone helps provide top-notch technology consultants that are certified and capable of providing established and cutting edge technologies.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/client-center">
                                                                Client Center
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                As soon as you become an Envzone client, you will get unlimited access to our client care representatives and our consultants as well.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/software-quality-assurance">
                                                                Software Quality Assurance
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                The quality of your products are our concern, and we make sure that our experts adhere to your specifications and industry standards
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/devops">
                                                                DevOps
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                EnvZone provides maintenance and support services to increase productivity and quality of your service.
                                                            </p>
                                                        </article>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Schedule a Briefing Appointment with a Representative to Learn More.
                                                </div>
                                                <a href="#" class="btn btn-blue-env">
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
                                <div class="sub-menu text-left">
                                    <div class="container">
                                        <div class="row box-sub-menu">
                                            <div class="col-xl-5 col-lg-5 order-lg-0 order-1 d-md-block d-none-768 d-none">
                                                <div class="bg-blue-lv4">
                                                    <h3 class="text-center mb-3">
                                                        DISCOVERY
                                                    </h3>
                                                    <div class="sub-title-form">
                                                        Envzone features daily news, blogs, events and keeps up to date with the latest technology news.
                                                    </div>
                                                    <p>
                                                        Go to our discovery section to get the latest news, learn more about IT industry overviews and trends, outsourcing, software development and discover our daily events from studio.
                                                    </p>
                                                    <div class="title-contact">
                                                        Every other week we release a quick video of minutes from in-depth workshop events.
                                                        <br>
                                                        Take 5-mins to improve your skill!
                                                    </div>
                                                    <form class="text-center">
                                                        <input type="email" name="email" placeholder="Enter your email address">
                                                        <textarea placeholder="Your Message" rows="4"></textarea>
                                                        <a class="btn btn-green-env m-auto btn-send-message" href="#">SEND YOUR MESSAGE</a>
                                                    </form>
                                                </div>

                                            </div>

                                            <div class="col-lg-7 order-lg-1 order-0 ">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/blog">
                                                                Blog
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                We create influencial blogs which provide fresh news and the most interesting events focus on technology and software development.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/events">
                                                                Events
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                Looking for some IT & Technology events? Go to our Events section and discover full list of upcoming events.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/knowledge">
                                                                Knowledge Center
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                Here you can find useful materials and information about IT outsourcing and other related resources.
                                                            </p>
                                                        </article>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 element-sub">
                                                        <article>
                                                            <a class="title-submenu" href="<?php echo get_home_url();?>/studio">
                                                                Studio
                                                                <span class="icon-arrow-right"></span>
                                                            </a>
                                                            <p>
                                                                Take a look around our studio to see the collection of our stories and activities
                                                            </p>
                                                        </article>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 d-md-none d-block-768 box-check-avaibility">
                                                <div class="description-check">
                                                    Schedule a Briefing Appointment with a Representative to Learn More.
                                                </div>
                                                <a href="#" class="btn btn-blue-env">
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
                                <a href="#" class="icon-right-arrow"></a>
                            </div>
                            <div class="box-portal clearfix">
                                <a href="#" class="client-portal">Client Portal</a>
                                <a href="#" class="vendor-portal">Vendor Portal</a>
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
                    <form action="" method="get">
                        <label for="input-search">TYPE YOUR SEARCH</label>
                        <input id="input-search" type="text" class="input-search" placeholder="Search for keywords">
                        <input type="submit" hidden>
                        <a class="btn-search" href="#">
                            <i class="icon-search"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div id="sticky-menu-anchor"></div>
</header>