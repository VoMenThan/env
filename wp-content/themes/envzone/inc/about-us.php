<main class="main-content">
    <section class="banner-top banner-company bg-blue">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>">
        <h1><?php echo get_the_title();?></h1>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="artical-page about-us-page">

        <div class="container section-represent">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-head-about-us">
                        <h2>
                            It’s not about us. <br>
                            It’s about YOU represent us.
                        </h2>
                        <p>
                            Our success is not mainly due to the quality of our work; it’s down to your business success, our approach and the way we treat you.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 justify-content-center align-items-center d-flex">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-represent-us.png" alt="">
                </div>
                <div class="col-lg-5">
                    <div class="get-started-form">
                        <div class="title-form">Talk to the team.</div>
                        <?php
                            echo do_shortcode('[gravityform id="19" title="false" description="false"]');
                        ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid section-think-boundlessly">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-6 box-head-about-us">
                        <h2>
                            THINK Boundlessly WORK Purposely LIVE Passionately
                        </h2>
                    </div>
                    <div class="col-lg-8 col-6 text-center box-things-you-love">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-target-green.png" alt="">
                    </div>
                    <div class="col-lg-8 offset-lg-4 text-center">
                        <p>
                            Do the THINGS you love and matter. Our teams are there and yours to support.
                        </p>
                        <a href="<?php echo home_url('contact-us');?>" class="btn btn-green-env">CONTACT US</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container section-mission-vision">
            <div class="row box-vision">
                <div class="col-lg-6 justify-content-center align-items-center d-flex">
                    <img class="img-fluid" src="<?php echo ASSET_URL?>images/img-vision-green.png" alt="">
                </div>

                <div class="col-lg-6">
                    <div class="item-vision">
                        <h2>VISION</h2>
                        <p>
                            Our vision at Envzone is helping our clients by sourcing for the best IT and software engineers globally to work on their various software projects.
                        </p>
                        <p>
                            We will partner with you to provide affordable services without sacrificing quality.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row box-vision">
                <div class="col-lg-6 order-lg-0 order-1">
                    <div class="item-vision">
                        <h2>OUR MISSION</h2>
                        <p>
                            We offer our expertise in perusing our partners’ capabilities and matching them with our clients according to their required needs.
                        </p>
                        <p>
                            We always provide a seamless match which enhances smooth interactions with our foreign partners.
                        </p>
                        <p>
                            As a result, we take extra care looking at the smallest details in our clients brief and use it as a requirement when matching them with our partners.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 order-lg-1 order-0 justify-content-center align-items-center d-flex">
                    <img class="img-fluid" src="<?php echo ASSET_URL?>images/img-our-mission-green.png" alt="">
                </div>

            </div>
        </div>

        <div class="container-fluid section-headquarters">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="title-headquarters">
                            Headquarters Location:
                        </div>
                        <div class="address">
                            ENVZONE LLC <br>
                            1801 California St Suite 2400 <br>
                            Denver, CO 80202
                        </div>
                        <div class="contact">
                            Main: 720-606-2900 <br>
                            Fax: 720-606-4265 <br>
                            Email: info@envzone.com
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-doing-business.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-video-knowledge">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="embed-video">
                        <iframe src="https://player.vimeo.com/video/247833683" frameborder="0" title="" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
                    </div>
                    <h3 class="title-video">
                        3 Reasons-Why You Should Let an Outsourcing Advisor be a Part of Your Team
                    </h3>
                </div>
            </div>
        </div>

        <div class="container-fluid section-find-your-team">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2>
                            Now, it’s time to find your team.
                        </h2>
                        <div class="get-started-form">
                            <?php echo do_shortcode('[gravityform id="12" title="false" description="false"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container section-more-about-envzone">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Learn more about EnvZone</h2>
                </div>
                <div class="col-lg-4">
                    <a href="<?php echo home_url('blog');?>" class="item-about-envzone">
                        <img src="<?php echo ASSET_URL;?>images/icon-blog-green.png" alt="">
                        <h3>Blog</h3>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="<?php echo home_url('knowledge-center');?>" class="item-about-envzone">
                        <img src="<?php echo ASSET_URL;?>images/icon-play-button-green.png" alt="">
                        <h3>Knowledge Center</h3>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="<?php echo home_url('resources');?>" class="item-about-envzone">
                        <img src="<?php echo ASSET_URL;?>images/icon-notebook-green.png" alt="">
                        <h3>Resources</h3>
                    </a>
                </div>
            </div>
        </div>

        <div class="container-fluid section-careers-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?php echo home_url('contact-us');?>" class="item-contact-us">
                            <div class="note-tag">Get In Touch</div>
                            <h3>Contact Us</h3>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?php echo home_url('careers');?>" class="item-contact-us">
                            <div class="note-tag">Our Culture</div>
                            <h3>Careers</h3>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?php echo home_url('partnership');?>" class="item-contact-us">
                            <div class="note-tag">Work with Us</div>
                            <h3>Join our Partnership</h3>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?php echo home_url('get-media-coverage');?>" class="item-contact-us">
                            <div class="note-tag">Share Your  Insights</div>
                            <h3>Join Featured Interviews</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "popup-company.php";?>
    </section>
</main>