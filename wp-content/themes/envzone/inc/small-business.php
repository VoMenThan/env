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
                        <h1>GET AN ONLINE PRESENCE MANAGER ON-CALL FOR YOUR SMALL BUSINESS.</h1>
                        <p>
                            Just from <span class="green">$159</span> per month.
                        </p>
                        <p>
                            Have your own online management team available on-call and get online presence done for a fraction of what it would normally cost.
                        </p>
                        <div class="box-button">
                        <a href="<?php echo home_url('plans-and-pricing')?>" class="btn btn-green-env">SEE PRICING</a>
                        <a href="<?php echo home_url('')?>" class="btn btn-white-env">LOGIN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="artical-page service-page small-business-page">
        <div class="container-fluid section-top-customer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Trusted by hundreds of small businesses</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-customers justify-content-around d-flex flex-wrap">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-mcelhanney.png" alt="McElhanney">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-garver-alt.png" alt="Garver">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-cha-web2019.png" alt="Cha">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-burns-mcdonnel.png" alt="Burn MCDonNell">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-bohannan-huston.png" alt="Bohannan Huston">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-harris-associates.png" alt="Harris Associates">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-header text-center">
                        <h2>Built for small business</h2>
                        <p>
                            All the big business benefits without the high cost and complexity.
                        </p>
                    </div>
                </div>
            </div>
            <div id="accordion" class="row">
                <div class="col-lg-4 item-build text-center">
                    <div class="block-expanded clearfix">
                        <img src="<?php echo ASSET_URL;?>images/icon-like-green.png" alt="">
                        <h3>Easy to set up and manage</h3>
                        <span class="icon-arrow-bottom-gray" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></span>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="content-expanded">
                            <ul>
                                <li>No setup fees</li>
                                <li>Remain focused on your business operation and intended results without getting stuck in the “how” or “who”</li>
                                <li>Get a business cloud account and all-in-one collaboration portal</li>
                                <li>High-quality service and 24/7 support.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 item-build text-center">
                    <div class="block-expanded clearfix">
                        <img src="<?php echo ASSET_URL;?>images/icon-investment-green.png" alt="">
                        <h3>Savings you can count on</h3>
                        <span class="icon-arrow-bottom-gray" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"></span>
                    </div>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="content-expanded">
                            <ul>
                                <li>Save 50% or more compared to hiring local resources</li>
                                <li>Hassel-free dealing of lengthy contract negotiations with normal agency solutions</li>
                                <li>One manager for all your online operation.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 item-build text-center">
                    <div class="block-expanded clearfix">
                        <img src="<?php echo ASSET_URL;?>images/icon-grows-green.png" alt="">
                        <h3>Grows with you</h3>
                        <span class="icon-arrow-bottom-gray" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"></span>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="content-expanded">
                            <ul>
                                <li>Completely customize your requirements and goals to align with your business setting,</li>
                                <li>Periodically performance benchmark and improve as you grow.</li>
                                <li>Add features as you expand.</li>
                                <li>Functionality to fit every business size.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center box-button">
                    <a href="<?php echo home_url('plans-and-pricing')?>" class="btn btn-blue-env">SEE PLAN DETAILS</a>
                </div>
            </div>


            <div class="row box-originally-hard">
                <div class="col-lg-12">
                    <h2>We offer your small business setting something that is originally hard to find: </h2>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="item-originally-hard">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M56 40C56 44.2435 54.3143 48.3131 51.3137 51.3137C48.3131 54.3143 44.2435 56 40 56C35.7565 56 31.6869 54.3143 28.6863 51.3137C25.6857 48.3131 24 44.2435 24 40C24 35.7565 25.6857 31.6869 28.6863 28.6863C31.6869 25.6857 35.7565 24 40 24C41.52 24 43 24.22 44.4 24.62L47.54 21.48C45.22 20.52 42.68 20 40 20C37.3736 20 34.7728 20.5173 32.3463 21.5224C29.9198 22.5275 27.715 24.0007 25.8579 25.8579C22.1071 29.6086 20 34.6957 20 40C20 45.3043 22.1071 50.3914 25.8579 54.1421C27.715 55.9993 29.9198 57.4725 32.3463 58.4776C34.7728 59.4827 37.3736 60 40 60C45.3043 60 50.3914 57.8929 54.1421 54.1421C57.8929 50.3914 60 45.3043 60 40H56ZM31.82 36.16L29 39L38 48L58 28L55.18 25.16L38 42.34L31.82 36.16Z" fill="#AEE366"/>
                        </svg>
                        <p>
                            Get all the benefits & advantages of having a team without the costs and responsibilities that come with it
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="item-originally-hard">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M56 40C56 44.2435 54.3143 48.3131 51.3137 51.3137C48.3131 54.3143 44.2435 56 40 56C35.7565 56 31.6869 54.3143 28.6863 51.3137C25.6857 48.3131 24 44.2435 24 40C24 35.7565 25.6857 31.6869 28.6863 28.6863C31.6869 25.6857 35.7565 24 40 24C41.52 24 43 24.22 44.4 24.62L47.54 21.48C45.22 20.52 42.68 20 40 20C37.3736 20 34.7728 20.5173 32.3463 21.5224C29.9198 22.5275 27.715 24.0007 25.8579 25.8579C22.1071 29.6086 20 34.6957 20 40C20 45.3043 22.1071 50.3914 25.8579 54.1421C27.715 55.9993 29.9198 57.4725 32.3463 58.4776C34.7728 59.4827 37.3736 60 40 60C45.3043 60 50.3914 57.8929 54.1421 54.1421C57.8929 50.3914 60 45.3043 60 40H56ZM31.82 36.16L29 39L38 48L58 28L55.18 25.16L38 42.34L31.82 36.16Z" fill="#AEE366"/>
                        </svg>
                        <p>
                            Get flexible, affordable building options of online presence that can be reconfigured accordingly to your needs
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="item-originally-hard">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M56 40C56 44.2435 54.3143 48.3131 51.3137 51.3137C48.3131 54.3143 44.2435 56 40 56C35.7565 56 31.6869 54.3143 28.6863 51.3137C25.6857 48.3131 24 44.2435 24 40C24 35.7565 25.6857 31.6869 28.6863 28.6863C31.6869 25.6857 35.7565 24 40 24C41.52 24 43 24.22 44.4 24.62L47.54 21.48C45.22 20.52 42.68 20 40 20C37.3736 20 34.7728 20.5173 32.3463 21.5224C29.9198 22.5275 27.715 24.0007 25.8579 25.8579C22.1071 29.6086 20 34.6957 20 40C20 45.3043 22.1071 50.3914 25.8579 54.1421C27.715 55.9993 29.9198 57.4725 32.3463 58.4776C34.7728 59.4827 37.3736 60 40 60C45.3043 60 50.3914 57.8929 54.1421 54.1421C57.8929 50.3914 60 45.3043 60 40H56ZM31.82 36.16L29 39L38 48L58 28L55.18 25.16L38 42.34L31.82 36.16Z" fill="#AEE366"/>
                        </svg>
                        <p>
                            Get an online presence management partner/consultant that can take on a lot of the challenges at costs that are lower what the business would otherwise pay
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container">
                <div class="row box-peace-of-mind">
                    <div class="col-lg-8">
                        <h2>Peace of mind, 365 days a year</h2>
                        <p>
                            Keeping your business visible online doesn’t have to be time consuming, stressful figure of how stuff works.
                        </p>
                        <p>
                            Every time a need of change or simply improvement with your website comes up, there’s no need to scramble. With EnvZone, you’ll have a trusted manager ready to help whenever you need it. That’s real peace of mind.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <img class="img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/icon-peace-of-mind.png" alt="">
                        <img class="img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/icon-peace-of-mind-mb.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-how-it-works">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center box-how-it-work">
                    <h2>How it works</h2>
                    <p>A solution built with team work mindset that drive results for your business. Not individual freelancer mindset.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 d-flex">
                    <div class="item-how-it-work">
                        <h3>1. Sign up</h3>
                        <p>
                            Once you’ve signed up for an account for your business, a dedicated site manager will guide you through data migration of your website from our secure portal.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="item-how-it-work">
                        <h3>2. Get support</h3>
                        <p>
                            Get support from your team and start improving your website. Plus, getting insights from your website performance audit report.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="item-how-it-work">
                        <h3>3. Track and grow </h3>
                        <p>
                            As a member of EnvZone small business community, you will recieve monthly analytic report and recommendations for improvement of your online brand.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 box-support-experience">
                    <h2>You deserve a better support experience</h2>
                    <p>
                        We help established businesses of all sizes expand, grow, and thrive online. So whatever your next goal is, just tell us how we can help.
                    </p>
                </div>
                <div class="col-lg-12 text-center flow-how-it-work">
                    <img class="img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/img-how-it-work.png" alt="">
                    <img class="img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/img-how-it-work-mb.png" alt="">
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container section-your-business">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2>
                            Why this is the plan for your business
                        </h2>
                    </div>
                    <div class="col-lg-10">
                        <ul>
                            <li>
                                As you can see in the above team roles, a variety of skills are required which you are unlikely to have immediately to hand in order to compete in this competitive digital world.
                            </li>
                            <li>
                                Your business probably has a lacking support from in-house resource to manage online presence. Digital world is the foundation of communication and you can’t afford to let your business get lost. Maintaining the right-skill inhouse resources to run your business online is not sustainable for your business setting.
                            </li>
                            <li>
                                With this solution, you’ll never worry about your website issues ever again. You’ll have a dedicated team who’s got your back—today, tomorrow, and every day.
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-12 box-button text-center">
                        <a href="<?php echo home_url('plans-and-pricing')?>" class="btn btn-blue-env">VIEW ALL PLANS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            var width = $(window).width();
            if (width <= 768) {
                $('#collapseOne, #collapseTwo, #collapseThree').collapse('hide');
            }else {
                $('#collapseOne, #collapseTwo, #collapseThree').collapse('show');
            }
        });
        $(window).on('resize', function(){
            var win = $(this); //this = window
            if (win.width() <= 768) {
                $('#collapseOne,#collapseTwo, #collapseThree').collapse('hide');
            }else {
                $('#collapseOne,#collapseTwo, #collapseThree').collapse('show');
            }
        });
    </script>
    <script src="//code.tidio.co/ljas59smx8hit2eissvid4hjv10sit8t.js"></script>
</main>
<?php get_footer();?>