<?php get_header();?>

<!--SLIDER HOME-->
<div class="container-fluid p-0 position-relative">
    <div class="owl-carousel slider-home owl-theme">
        <div class="item">
            <img src="<?php echo ASSET_URL;?>images/banner-home-new.png">
            <div class="container">
                <article class="box-headline">
                    <h1 class="head-line-envzone">
                        A TRUST ENABLER IN DENVER AREA FOR YOUR OUTSOURCING NEEDS
                    </h1>
                    <p>
                        Clients let ENVZONE handle the risk of offshore outsourcing. <br>
                        ENVZONE due diligence process making sure the programming team that will innovate and not just code.
                    </p>
                    <a href="<?php echo home_url("process-framework");?>" class="btn btn-green-env btn-get-started">TAKE ME TO THIS UNIQUE APPROACH</a>
                    <div class="title-security">
                        <i class="icon-security"></i>
                        Be Informed. Be Protected. Be outsourcing fearless.
                    </div>
                </article>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo ASSET_URL;?>images/banner-home-2.png">
            <div class="container">
                <article class="box-headline">
                    <h1 class="head-line-envzone">
                        STOP WASTING TIME ON TEAM FOLLOW UP
                    </h1>
                    <p>
                        Your outsourced vendor will be tracked by results. <br>
                        Performance inspector clears the way, so you can focus on doing <br>
                        what you do best.
                    </p>
                    <a href="<?php echo home_url("contact-us");?>" class="btn btn-green-env btn-get-started">SCHEDULE AN APPOINTMENT NOW</a>
                    <div class="title-security">
                        <i class="icon-security"></i>
                        Be Informed. Be Protected. Be outsourcing fearless.
                    </div>
                </article>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo ASSET_URL;?>images/banner-home-3.png">
            <div class="container">
                <article class="box-headline">
                    <h1 class="head-line-envzone">
                        KEEPING OUR CLIENTS AHEAD OF THE GAME IS THE MISSION
                    </h1>
                    <p>
                        Learn how we could help startup and tech founders achieve <br> their business goals.

                    </p>
                    <a href="<?php echo home_url("knowledge/guidance-to-keep-your-tech-company-ahead-of-the-competition");?>" class="btn btn-green-env btn-get-started">TAKE ME TO THE SECRET SAUCE</a>
                    <div class="title-security">
                        <i class="icon-security"></i>
                        Be Informed. Be Protected. Be outsourcing fearless.
                    </div>
                </article>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo ASSET_URL;?>images/banner-home-4.png">
            <div class="container">
                <article class="box-headline">
                    <h1 class="head-line-envzone">
                        NO MORE ISSUES OF LOSING DNA BOND WITH OFFSHORE OUTSOURCED DEV TEAM
                    </h1>
                    <p>
                        Our clients hire us to be their communication bridge. <br>
                        They retain us because we do all it takes to help them finish the race.
                    </p>
                    <a href="<?php echo home_url("contact-us");?>" class="btn btn-green-env btn-get-started">GET MY PROJECT GOING</a>
                    <div class="title-security">
                        <i class="icon-security"></i>
                        Be Informed. Be Protected. Be outsourcing fearless.
                    </div>
                </article>
            </div>
        </div>
    </div>
    <a href="#solution-figurative" class="btn-scroll-bottom">
        <i class="icon-arrow-down-green"></i>
    </a>
    <div class="connect-social d-lg-block d-none">
        <h3>
            Your best choice of offshore software outsourcing
        </h3>
        <ul class="best-choose">
            <li class="item-best-choose">
                <i class="fa fa-check" aria-hidden="true"></i>
                Choose the right team for your needs
            </li>
            <li class="item-best-choose">
                <i class="fa fa-check" aria-hidden="true"></i>
                Eliminate risk through an outsourcing authority
            </li>
        </ul>
        <div class="title-link">See our verified teams’ expertise</div>
        <a class="btn btn-blue-env text-center" href="<?php echo home_url("contact-us");?>">CONNECT ME TO THE TEAM</a>
        <hr class="d-none-1200">
        <div class="title-integrate d-none-1200">
            Your team is awesome!
        </div>
        <div class="title-link d-none-1200">Enroll in our verification program</div>
        <a class="btn btn-blue-env text-center d-none-1200" href="<?php echo home_url("contact-us");?>">SIGN ME UP</a>
    </div>
</div>
<!--END SLIDER HOME-->

<main class="main-content home-page">

    <!-- /*============BLOG HOME=================*/ -->
    <?php
    $args = array(
        'posts_per_page' => 10,
        'offset'=> 0,
        'post_type' => 'post',
        'orderby' => 'id',
        'order' =>'desc'
    );
    $news_special = get_posts( $args );
    ?>
    <div class="container background-gray-mobile section-blog">
        <div class="content-blog define-headline">
            <div class="row">
                <div class="col-12 box-head-blog">
                    <h2 class="title-head-blue underline-head"><span>RECENT ARTICLES</span></h2>
                    <a class="view-all" href="<?php echo get_home_url();?>/blog">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="item-special">
                        <div class="row">

                            <div class="col-lg-7 img-special">
                                <a href="#">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_special[0]->ID);?>" align="job-openings">
                                </a>
                            </div>
                            <div class="col-lg-5 d-flex info-special flex-column align-items-start">
                                <div class="box-info">
                                    <a href="<?php echo home_url('category/').get_the_category($news_special[0]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_special[0]->ID)[0]->cat_name;?></a>

                                    <a href="<?php echo get_home_url().'/blog/'.$news_special[0]->post_name;?>">
                                        <h3><?php echo $news_special[0]->post_title;?></h3>
                                    </a>

                                    <div class="excerpt">
                                        <p>
                                            <?php echo $news_special[0]->post_excerpt;?>
                                        </p>
                                        <a href="<?php echo get_home_url().'/blog/'.$news_special[0]->post_name;?>" class="read-more">Read more</a>
                                    </div>
                                </div>

                                <div class="box-author mt-auto">
                                    <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[0]->post_author);?>" class="author-by">By <?php echo get_the_author_meta('display_name', $news_all[0]->post_author);?></a>
                                    <div class="date-by">on <?php echo get_the_date( 'M d, Y', $news_special[0]->ID );?></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php for($i=1; $i<4; $i++):?>
                            <div class="col-lg-4 col-md-4 col-6 col-mbx-100 d-flex box-item-special">
                                <div class="item-blog">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_special[$i]->ID);?>" align="job-openings">
                                    <div class="info">
                                        <div class="info-news">
                                            <a href="<?php echo home_url('category/').get_the_category($news_special[$i]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_special[$i]->ID)[0]->cat_name;?></a>
                                            <a href="<?php echo get_home_url().'/blog/'.$news_special[$i]->post_name;?>">
                                                <h4><?php echo $news_special[$i]->post_title;?></h4>
                                            </a>
                                        </div>
                                        <div class="info-author">
                                            <a href="<?php echo home_url("author/").get_the_author_meta('nickname', $news_all[$i]->post_author);?>" class="author-by">By <?php echo get_the_author_meta('display_name', $news_all[$i]->post_author);?></a>
                                            <div class="date-by">on <?php echo get_the_date( 'M d, Y', $news_special[$i]->ID );?></div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        <?php endfor;?>
                    </div>
                </div>

                <div class="col-lg-3 d-lg-block d-none">
                    <article class="list-item">
                        <div class="label-headline">#1 News Trending</div>

                        <div class="box-list-scroll mCustomScrollbar content-scroll" data-mcs-theme="dark">
                            <?php for($i=4; $i<10; $i++):?>
                                <div class="item-detail">
                                    <a href="<?php echo get_home_url().'/blog/'.$news_special[$i]->post_name;?>">
                                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_special[$i]->ID);?>" alt="">
                                        <h5><?php echo $news_special[$i]->post_title;?></h5>
                                    </a>
                                </div>
                            <?php endfor;?>
                        </div>
                    </article>
                </div>

            </div>

            <div class="row d-lg-none d-block py-5">

                <div class="col-12 box-head-blog">
                    <h2 class="title-head-blue underline-head"><span>INSIGHTS FOR C-LEVEL</span></h2>
                </div>

                <div class="col-md-12">
                    <?php for($i=4; $i<8; $i++):?>
                    <div class="item-blog-mobile-horizontal clearfix">
                        <a href="<?php echo get_permalink($news_special[$i]->ID);?>">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($news_special[$i]->ID);?>" align="job-openings">
                        </a>
                        <div class="info">
                            <a href="<?php echo home_url('category/').get_the_category($news_special[$i]->ID)[0]->slug;?>" class="category"><?php echo get_the_category($news_special[$i]->ID)[0]->cat_name;?></a>
                            <a href="<?php echo get_permalink($news_special[$i]->ID);?>">
                            <h4><?php echo $news_special[$i]->post_title;?></h4>
                            </a>
                            <div class="box-author-by">
                                <div class="author-by">By <?php echo get_the_author_meta('displayname', $news_special[$i]->ID);?></div>
                                <div class="date-by">on <?php echo get_the_date( 'M d, Y', $news_special[$i]->ID );?></div>
                            </div>
                        </div>
                    </div>
                    <?php endfor;?>
                </div>
            </div>
        </div>
    </div>

    <!-- /*============END BLOG HOME=================*/ -->

    <!--SECTION SOLUTION-->
    <div class="container">
        <section id="solution-figurative" class="solution-figurative">
            <h2 class="title-head-blue title-solution">
                THE SOLUTION OF FIGURATIVE WAR FOR HI-SKILLED TECH TALENT IN DENVER
            </h2>
            <div class="box-description">
                <p>
                    Outsourcing software development has been an integral business strategy to get to the next level.
                </p>
                <p>
                    Vietnam is one of the best locations that companies get accessed to young talent resources.
                </p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="box-vn-rank">
                        <img class="d-lg-block d-none" src="<?php echo ASSET_URL;?>images/img-map-vn.png" alt="">
                        <img class="d-lg-none d-block m-auto" src="<?php echo ASSET_URL;?>images/img-map-vn-mb.png" alt="">

                        <div class="rank-1">was ranked <span class="pig-letter">2<sup>nd</sup></span> in the world’s most dynamic cities, a young country with a lot of entrepreneurship.</div>
                        <div class="rank-2">has strong support from tech-minded community attracting some of the most skilled individuals</div>
                        <div class="rank-3">is where tech corporations want to gain access to the workforce</div>
                    </div>
                </div>

                <div class="col-lg-12 text-right">

                    <div class="title-major-factor">
                        Top major factors that C-Level Executives of Denver’s companies are unable to dismiss the outsourcing model
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-6 col-mbx-100 item-cost">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/icon-retention-costs.png" alt="">
                            <h5>Retention Costs</h5>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6 col-mbx-100 item-cost">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/icon-onboading-costs.png" alt="">
                            <h5>Onboading Costs</h5>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6 col-mbx-100 item-cost">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/icon-recruiting-costs.png" alt="">
                            <h5>Recruiting Costs</h5>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6 col-mbx-100 item-cost">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/icon-benefit-costs.png" alt="">
                            <h5>Benefit Costs</h5>
                        </div>
                    </div>

                    <a href="<?php echo get_home_url();?>/process-framework" class="btn btn-blue-env">
                        Learn more this unique solution
                    </a>
                </div>
            </div>
        </section>
    </div>
    <!--END SECTION SOLUTION-->

    <div class="container-fluid bg-gray-process overhead-costs-page">
        <div class="container content-overhead-costs">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-head-blue title-overhead-costs">
                        THE OVERHEAD COSTS THAT COMPANIES CAN AVOID
                    </h2>
                </div>
                <div class="col-lg-6">
                    <div class="box-according">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-according-31.png" alt="">
                        <div class="note-chart">*According to Bureau of Labor Statistics</div>
                        <div class="cost-1">Fully burdened cost </div>
                        <div class="cost-2">The average benefit cost of an in-house employee</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-list-costs-saving">
                        <p>
                            The  overhead cost savings by leveraging the outsourcing software development
                        </p>
                        <ul class="list-costs">
                            <li>Employee taxes</li>
                            <li>Paid time off</li>
                            <li>Insurances</li>
                            <li>Paid time off allowance (vacation, etc.)</li>
                            <li>Retirement and savings contributions</li>
                        </ul>
                    </div>

                </div>
                <div class="col-12 text-center">
                    <div class="description-overhead">
                        Don’t allow yourself or your management team to dismiss the option of outsourced software development
                    </div>
                    <a href="<?php echo get_home_url();?>/contact-us" class="btn btn-blue-env">GET ME CONNECTED TO A TEAM</a>
                </div>
            </div>
        </div>
    </div>

    <!-- /*============ABOUT US=================*/ -->
    <!--<div class="bg-about-us">
        <div class="container">
            <div class="row content-about-us">
                <div class="col-lg-6 col-md-6">
                    <img class="img-fluid img-feature" src="<?php /*echo ASSET_URL;*/?>images/img-about-us.png" alt="About Us EnvZone">
                </div>
                <div class="col-lg-6 col-md-6 text-center d-flex align-items-center">
                    <article class="px-lg-5">
                        <h2 class="title-head-blue">BUSINESS ORIENTED</h2>
                        <p class="pb-lg-3 description-about">As business owners ourselves, we will all it takes to make your business thrive</p>
                        <a href="<?php /*echo get_home_url();*/?>/about-us" class="btn btn-blue-env">About Us</a>
                    </article>
                </div>
            </div>
        </div>
    </div>-->
    <!-- /*============END ABOUT US=================*/ -->


    <!-- /*============INDUSTRY HOME=================*/ -->
    <!--<div class="container-fluid content-industries">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="title-head-blue">
                        THE POSITIVE IMPACTS THAT OUR CLIENTS RECEIVE IN HIGHLIGHTED INDUSTRIES
                    </div>
                    <div class="description-head">
                        When we say we know your industry, we mean business.
                        At EnvZone, we take a holistic approach to our industry-specific services to address issues such as web-based applications, mobile access, safe data storage, easy data access, updates of existing infrastructure, and much more.
                    </div>
                    <div class="tab-content" id="pills-tabContentMenu">
                        <div class="tab-pane fade show active" id="tab-healthcare" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Healthcare
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-healthcare.png" alt=""></div>
                                <div class="excerpt-field">
                                    EnvZone delivers solutions and services to clients in healthcare industry to store, analyze and maintain data processed on daily basis.
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/healthcare" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-logistics" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Logistics & Supply Chain
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-logistics-supply-chain.png" alt=""></div>
                                <div class="excerpt-field">
                                    At EnvZone, we provide the much needed high-tech software solutions that scales to meet the unique needs of every logistics and supply chain.
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/logistics" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-financial" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Financial Service
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-financial-services.png" alt=""></div>
                                <div class="excerpt-field">
                                    Sophisticated and optimized algorithms in financial industries provided by our company keep your businesses at the top of the game.
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/financial-services" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-education" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Education
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-education.png" alt=""></div>
                                <div class="excerpt-field">
                                    We understand the education sector. We offer education solutions that ensure you have the right products in place and the most reliable learning platform.
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/education" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-hospitality" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Hospitality & Travel
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-hospitality-travel.png" alt=""></div>
                                <div class="excerpt-field">
                                    We understand hospitality & travel industry and develop the latest technology to provide solutions leveraging on customer experience to help you meet and surpass your goals.
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/hospitality" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-ecommerce" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Ecommerce & Retail
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-ecommerce-retail.png" alt=""></div>
                                <div class="excerpt-field">
                                    We develop competitive solutions for e-commerce and retail  to manage the business more efficiently and use our services to help business owners boost their sales
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/e-commerce-retail" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-real" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Real Estate & Property
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-real-estate.png" alt=""></div>
                                <div class="excerpt-field">
                                    Discover the new real estate & property technology from EnvZone. We cover the latest technology including highly effective real estate portals that help our clients manage their project easily.
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/real-estate" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-organization" role="tabpanel">
                            <div class="box-field">
                                <div class="title-field">
                                    Non-profit Organization
                                </div>
                                <div class="icon-field"><img src="<?php /*echo ASSET_URL;*/?>images/icon-non-profit.png" alt=""></div>
                                <div class="excerpt-field">
                                    We offer the right accounting and fundraising software that fulfill your nonprofit’s need, help you run the organization easier.
                                </div>
                                <div class="box-learn-more text-right">
                                    <a href="<?php /*echo get_home_url();*/?>/non-profit-organization" class="learn-more">LEARN MORE <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="box-tab-industries">
                    <ul class="nav flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-healthcare" data-toggle="pill" role="tab" aria-controls="tab-healthcare" aria-selected="true">Healthcare</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-logistics" data-toggle="pill" role="tab" aria-controls="tab-logistics" aria-selected="false">Logistics & Supply Chain</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-financial" data-toggle="pill" role="tab" aria-controls="tab-financial" aria-selected="false">Financial Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-education" data-toggle="pill" role="tab" aria-controls="tab-education" aria-selected="false">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-hospitality" data-toggle="pill" role="tab" aria-controls="tab-hospitality" aria-selected="false">Hospitality & Travel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-ecommerce" data-toggle="pill" role="tab" aria-controls="tab-ecommerce" aria-selected="false">Ecommerce & Retail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-real" data-toggle="pill" role="tab" aria-controls="tab-real" aria-selected="false">Real Estate & Property</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-organization" data-toggle="pill" role="tab" aria-controls="tab-organization" aria-selected="false">Non-Profit Organization</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>-->

    <!-- /*============END INDUSTRY HOME=================*/ -->

    <div class="container">
        <!-- /*============SERVICES HOME=================*/ -->
        <div class="row content-services">
            <div class="col-12 text-center box-head-services">
                <h2 class="title-head-blue">OUTSOURCING NEEDS THAT MOST CLIENTS SEEK</h2>
                <p class="description-services text-left m-auto">
                    EnvZone is an outsourcing consultancy company for software and web development services. We have high quality IT engineers as partners. We provide services across almost all technology platforms, work on operating systems and infrastructures.
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-6 col-mbx-100">
                <article class="item-service">
                    <div class="box-info-services d-lg-flex align-items-lg-center">
                        <img class="img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/icon-full-cycle-development.png"  alt="Full Cycle Development">
                        <img class="img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/icon-full-cycle-development-gr.png"  alt="Full Cycle Development">
                        <p>
                            You’re seeking for managing full cycle development. From software prototyping, custom software development to product development, our exceptional experts will be your trust enablers working relentlessly to provide you the best performances  .
                        </p>
                        <a href="<?php echo get_home_url();?>/full-cycle-development" class="learn-more">LEARN MORE</a>
                        <a href="<?php echo get_home_url();?>/full-cycle-development" class="plus-gray d-lg-none d-block"></a>
                    </div>

                    <h3>
                        Full Cycle Development
                    </h3>
                </article>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-6 col-mbx-100">
                <article class="item-service">
                    <div class="box-info-services d-lg-flex align-items-lg-center">
                        <img class="img-fluid d-lg-block d-none"  src="<?php echo ASSET_URL;?>images/icon-outsourcing-services.png" alt="technology consulting">
                        <img class="img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/icon-outsourcing-services-gr.png"  alt="Full Cycle Development">
                        <p>
                            You will easily get access to our top-notch technology consultants that have vast experience addressing IT and business requirements for different organizations.
                        </p>
                        <a href="<?php echo get_home_url();?>/it-outsourcing" class="learn-more">LEARN MORE</a>
                        <a href="<?php echo get_home_url();?>/it-outsourcing" class="plus-gray d-lg-none d-block"></a>
                    </div>
                    <h3>
                        IT Outsourcing Services
                    </h3>
                </article>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-6 col-mbx-100">
                <article class="item-service">
                    <div class="box-info-services d-lg-flex align-items-lg-center">
                        <img class="img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/icon-testing.png" alt="Support">
                        <img class="img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/icon-testing-gr.png"  alt="Full Cycle Development">

                        <p>
                            The quality of your products are our concern, and we make sure that our experts adhere to your specifications and industry standards
                        </p>
                        <a href="<?php echo get_home_url();?>/testing" class="learn-more">LEARN MORE</a>
                        <a href="<?php echo get_home_url();?>/testing" class="plus-gray d-lg-none d-block"></a>
                    </div>
                    <h3>
                        Testing
                    </h3>
                </article>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-6 col-mbx-100">
                <article class="item-service">
                    <div class="box-info-services d-lg-flex align-items-lg-center">
                        <img class="img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/icon-devops.png" alt="IT Outsourcing">
                        <img class="img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/icon-devops-gr.png" alt="IT Outsourcing">
                        <p>
                            Regardless of your technology platforms, what you are seeking for will be specialized by our high quality IT engineers as partners, giving your business its leap to being a world-class phenomenon.
                        </p>
                        <a href="<?php echo get_home_url();?>/devops" class="learn-more">LEARN MORE</a>
                        <a href="<?php echo get_home_url();?>/devops" class="plus-gray d-lg-none d-block"></a>
                    </div>
                    <h3>
                        DevOps
                    </h3>
                </article>
            </div>
        </div>
        <!-- /*============END SERVICES HOME=================*/ -->
    </div>

    <!-- /*============PROCESS FRAMEWORK HOME=================*/ -->
    <div class="container-fluid bg-gray-process">
        <div class="container">
            <div class="row content-framework tab-content" id="pills-tabContentProcess">
                <div class="col-12 text-center box-head-framework">
                    <h2 class="title-head-blue">THE COMPLETE PROCESS FRAMEWORK FOR AGILE SOFTWARE DEVELOPMENT</h2>
                    <p class="description-process-framework">
                        With a proven process framework, we can deliver solutions much faster and with less effort. ENVZONE defines the roles, teams, activities and artifacts to apply Lean and Agile principles at scale, and provides outstanding services to increase your business success.
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
                        <h3>
                            1. Discovery
                        </h3>
                        <p>
                            The purpose of discovery process is to gather information and to determine if EnvZone is meeting your criteria
                        </p>
                        <div class="title-include">
                            Deliverables:
                        </div>
                        <ul class="include-process">
                            <li class="include-process-item">Proposals</li>
                            <li class="include-process-item">Needs Assessment</li>
                            <li class="include-process-item">Initial Meeting</li>
                            <li class="include-process-item">Team Selection</li>
                        </ul>
                    </article>
                </div>
                <div class="col-lg-4 tab-pane fade" id="pills-initial" role="tabpanel" aria-labelledby="pills-initial-tab">
                    <article class="item-framework">
                        <h3>
                            2. Initial Engagement
                        </h3>
                        <p>
                            Initial engagement is the first real interaction between EnvZone and our customers.
                        </p>
                        <div class="title-include">
                            Deliverables:
                        </div>
                        <ul class="include-process">
                            <li class="include-process-item">Detailed Requirements</li>
                            <li class="include-process-item">Wireframes & Clickable Prototype</li>
                            <li class="include-process-item">Research</li>
                            <li class="include-process-item">Detailed Quote & Project Timeline</li>
                        </ul>
                    </article>
                </div>
                <div class="col-lg-4 tab-pane fade" id="pills-development" role="tabpanel" aria-labelledby="pills-development-tab">
                    <article class="item-framework">
                        <h3>
                            3. Development process
                        </h3>
                        <p>
                            The main purpose of development process is analyzing your requirements, and building quality and correctness of good software.
                        </p>
                        <div class="title-include">
                            Deliverables:
                        </div>
                        <ul class="include-process">
                            <li class="include-process-item">2-week Sprints</li>
                            <li class="include-process-item">Quality Assurance</li>
                            <li class="include-process-item">Deployment & Launch</li>
                        </ul>
                    </article>
                </div>

                <div class="col-lg-12 text-center pt-lg-5 pt-3">
                    <a href="<?php echo get_home_url()."/process-framework";?>" class="btn btn-green-env">
                        SEE THIS UNIQUE APPROACH TO GET MY PROJECT ACCELERATED
                    </a>
                </div>


            </div>
        </div>
    </div>
    <!-- /*============END PROCESS FRAMEWORK HOME=================*/ -->

    <!-- /*============DID YOU KNOW=================*/ -->
    <div class="container-fluid d-lg-block d-md-block d-none">
        <div class="container">
            <div class="row content-reasons">
                <div class="col-12 text-center box-head-reasons">
                    <h2 class="title-head-blue"><img src="<?php echo ASSET_URL;?>images/icon-light-bulb.png" alt="">DID YOU KNOW?</h2>
                    <div class="description-head-reasons">
                        3 reasons that over 40% of small or mid-sized businesses outsource the non-competency work to their partners
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="box-list-reasons">
                        <div class="item-reason clearfix">
                            <div class="box-icon">
                                <img class="img-fluid" src="<?php echo ASSET_URL;?>images/icon-boosting-competitive.png" alt="">
                            </div>
                            <div class="box-reasons">
                                <h3>
                                    Boosting competitive advantage
                                </h3>
                                <p>
                                    To compete, SMEs must play in the same field as large corporations. That means you have to possess your owơn IT and software development teams
                                </p>
                            </div>
                        </div>

                        <div class="item-reason clearfix">
                            <div class="box-icon">
                                <img class="img-fluid" src="<?php echo ASSET_URL;?>images/icon-gaining-fair.png" alt="">
                            </div>
                            <div class="box-reasons">
                                <h3>
                                    Gaining fair play
                                </h3>
                                <p>
                                    Outsourcing provides highly-recognized and experienced teams that won’t break the bank

                                </p>
                            </div>
                        </div>

                        <div class="item-reason clearfix">
                            <div class="box-icon">
                                <img class="img-fluid" src="<?php echo ASSET_URL;?>images/icon-pocket-friendly.png" alt="">
                            </div>
                            <div class="box-reasons">
                                <h3>
                                    Pocket-friendly
                                </h3>
                                <p>
                                    Outsourcing provides affordable IT and software development services
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-clients">
                        <div class="info-optimize d-flex align-items-center">
                            Our clients have been succeeded with our succession roadmap. This is something we can do for you too!
                        </div>
                        <a href="<?php echo get_home_url()."/contact-us";?>" class="btn btn-green-env">Optimize Our Dev Workflow for Business Success <i class="icon-right-arrow-simple"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /*============END DID YOU KNOW=================*/ -->

    <!-- /*============SUBCRIBE HOME=================*/ -->
    <div class="container-fluild section-parallax bg-building">
        <div class="bg-blue-home">
            <div class="container content-contact-quote-book">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 ">
                        <h4>COLORADO IS COLD!</h4>
                        <p>Book a 30-min coffee meeting at our office</p>
                        <!--<a class="btn btn-green-env btn-transparent" href="#">
                            CHECK AVAIBILITY <i class="icon-arrow-bottom"></i>
                        </a>-->

                        <!-- Calendly link widget begin -->
                        <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                        <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
                        <a href="" class="btn btn-green-env btn-transparent" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;">
                            CHECK AVAIBILITY <i class="icon-arrow-bottom"></i>
                        </a>
                        <!-- Calendly link widget end -->

                    </div>
                    <div class="col-lg-4 d-lg-block d-none">
                        <h4>GET A QUOTE</h4>
                        <p>Get pricing on your custom project</p>
                        <a class="btn btn-green-env" data-toggle="collapse" href="#getQuote" role="button" aria-expanded="false" aria-controls="collapseExample">REQUEST PRICING</a>
                        <div class="collapse form-toggle" id="getQuote">
                            <?php
                            echo do_shortcode('[gravityform id=4 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-4 d-lg-block d-none">
                        <h4>CONTACT US</h4>
                        <p>Have a quick question? Let’s talk</p>
                        <a class="btn btn-green-env" data-toggle="collapse" href="#sendMail" role="button" aria-expanded="false" aria-controls="collapseExample">SEND EMAIL</a>
                        <div class="collapse form-toggle" id="sendMail">
                            <?php
                            echo do_shortcode('[gravityform id=4 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /*============END SUBCRIBE HOME=================*/ -->

    <!-- /*============KNOWLEDGE HOME=================*/ -->

    <?php
        $args = array(
            'posts_per_page' => 10,
            'offset'=> 0,
            'post_type' => 'knowledge',
            'orderby' => 'id',
            'order' =>'desc'
        );
        $video_list = get_posts( $args );
    ?>
    <div class="container-fluild bg-gray-home section-knowledge">
        <div class="container content-knowledge define-headline">
            <div class="row">
                <div class="col-12 box-head-blog">
                    <h2>KNOWLEDGE CENTER</h2>
                    <a class="view-all" href="<?php echo get_home_url();?>/knowledge">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 video-play">
                    <div class="embed-video">
                        <?php echo get_field('embed', $video_list[0]->ID);?>
                    </div>
                    <a href="<?php echo get_permalink($video_list[0]->ID);?>">
                        <h3>
                            <?php echo $video_list[0]->post_title;?>
                        </h3>
                    </a>
                </div>
                <div class="col-lg-4 d-lg-block d-none">
                    <article class="list-item">
                        <div class="label-headline">#1 News Trending</div>
                        <div class="box-list-scroll mCustomScrollbar content-scroll" data-mcs-theme="dark">
                            <?php foreach ($video_list as $k => $item):
                                if ($k == 0) continue;
                                $vimeo = get_post_meta($item->ID, 'embed', true);
                                ?>
                            <div class="item-detail clearfix">
                                <a href="<?php echo get_permalink($item->ID);?>">
                                    <img class="img-fluid" src="<?php echo grab_vimeo_thumbnail($vimeo);?>" alt="">
                                    <h5><?php echo $item->post_title;?></h5>
                                </a>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END KNOWLEDGE HOME=================*/ -->

    <!-- /*============PARTNERS HOME=================*/ -->
    <div class="container-fluid bg-gray-process partner-home">
        <div class="container">
            <div class="row content-partner">
                <div class="col-12 text-center box-head-partners">
                    <h2 class="title-head-blue">PARTNERS WE WORK WITH</h2>
                </div>

                <div class="owl-carousel owl-theme slider-partners">
                    <div class="item">
                        <img src="<?php echo ASSET_URL;?>images/logo-google.png" alt="">
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_URL;?>images/logo-salesforce.png" alt="">
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_URL;?>images/logo-amazon.png" alt="">
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_URL;?>images/logo-same.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END PARTNERS HOME=================*/ -->

    <!-- /*============EVENTS HOME=================*/ -->
    <?php
    $args = array(
        'posts_per_page' => 3,
        'offset'=> 0,
        'post_type' => 'list_events',
        'orderby' => 'id',
        'order' =>'desc'
    );
    $event_all = get_posts( $args );
    ?>
    <div class="container content-envent define-headline">
        <div class="row">
            <div class="col-lg-6 box-head-blog">
                <h2 class="title-head-blue underline-head"><span>EVENTS</span></h2>
                <a class="view-all" href="<?php echo get_home_url();?>/events">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                <?php foreach ($event_all as $item):?>
                    <div class="box-item-event clearfix">
                        <?php echo $item->post_content;?>
                    </div>
                <?php endforeach;?>


            </div>
            <div class="col-lg-6 box-head-blog d-lg-block d-none">
                <a class="twitter-timeline" data-lang="en" data-height="600" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/envzone?ref_src=twsrc%5Etfw">Tweets by envzone</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
    <!-- /*============END EVENTS HOME=================*/ -->

    <!-- /*============STUDIO HOME=================*/ -->
    <?php
    $args = array(
        'posts_per_page' => 5,
        'offset'=> 0,
        'post_type' => 'studio',
        'orderby' => 'id',
        'order' =>'desc'
    );
    $photo_studio = get_posts( $args );
    ?>
    <div class="container-fluild bg-gray-home section-studio">
        <div class="container content-studio define-headline">
            <div class="row">
                <div class="col-12 box-head-blog">
                    <h2>ENVZONE <b>STUDIO</b></h2>
                    <a class="view-all" href="<?php echo home_url('studio');?>">View all <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="item-studio">
                        <a href="<?php echo get_permalink($photo_studio[0]->ID); ?>">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($photo_studio[0]->ID); ?>" align="">
                        <h5 class="large-item"><?php echo $photo_studio[0]->post_title; ?></h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <?php
                            foreach ($photo_studio as $k=>$item):
                            if ($k==0) continue;
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 col-mbx-100">
                            <div class="item-studio">
                                <a href="<?php echo get_permalink($item->ID);?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" align="">
                                <h5><?php echo $item->post_title;?></h5>
                                </a>
                            </div>
                        </div>

                        <?php endforeach;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /*============END STUDIO HOME=================*/ -->

    <!-- /*============SUBCRIBE HOME=================*/ -->
    <div class="container-fluild section-parallax">
        <div class="bg-green-home">
            <div class="container content-subcribe">
                <div class="row">
                    <div class="col-12 box-head-subcribe text-center">
                        <h2>SUBSCRIBE FOR THREE THINGS</h2>
                        <p>
                            Three links or tips of interest curated about offshore outsourcing every week by the experts at ENVZONE Consulting.
                        </p>
                        <!--<form action="" method="get">
                            <input type="text" class="input-search d-block" placeholder="Enter your email adress">
                            <input type="submit" hidden>
                            <a class="btn btn-blue-env btn-search" href="#">SIGN ME UP FOR THREE THINGS</a>
                        </form>-->

                        <div class="form-subscribe">
                            <?php
                                echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /*============END SUBCRIBE HOME=================*/ -->

</main>

<script>
    /*============ slide news =================*/
    $(document).ready(function() {

        $('.slider-home').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed:450,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1,
                    dots: false
                },
                768: {
                    items: 1,
                    dots: false
                },
                1024: {
                    items: 1
                }
            }
        });

        $('.slider-partners').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 4
                }
            }
        });

        $('.box-industries').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            autoplay: false,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 4
                }
            }
        });

        $('.list-video').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            autoplay: false,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 4
                }
            }
        });
    });
</script>
<?php get_footer();?>
