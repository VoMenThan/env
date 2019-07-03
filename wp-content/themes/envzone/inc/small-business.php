<main class="main-content">
    <div class="container-fluid nav-small-business">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="javascript:function() { return false; }" class="active">
                        Small Business
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
                        <h1>Your business activities are about to get a lot easier</h1>
                        <p>
                            Get a dedicated online presence manager with support in all aspects to drive results.
                        </p>
                        <a href="<?php echo home_url('plans-and-pricing')?>" class="btn btn-green-env">SEE PRICING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="artical-page service-page small-business-page">
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
                <div class="col-lg-4 item-build text-center">
                    <img src="<?php echo ASSET_URL;?>images/icon-like-green.png" alt="">
                    <h3>Easy to set up and manage</h3>
                    <ul>
                        <li>No setup fees</li>
                        <li>Remain focused on your business operation and intended results without getting stuck in the “how” or “who”</li>
                        <li>Get a business cloud account and all-in-one collaboration portal</li>
                        <li>High-quality service and 24/7 support.</li>
                    </ul>
                </div>
                <div class="col-lg-4 item-build text-center">
                    <img src="<?php echo ASSET_URL;?>images/icon-investment-green.png" alt="">
                    <h3>Savings you can count on</h3>
                    <ul>
                        <li>Save 50% or more compared to hiring local resources</li>
                        <li>Hassel-free dealing of lengthy contract negotiations with normal agency solutions</li>
                        <li>One manager for all your online operation.</li>
                    </ul>
                </div>
                <div class="col-lg-4 item-build text-center">
                    <img src="<?php echo ASSET_URL;?>images/icon-grows-green.png" alt="">
                    <h3>Grows with you</h3>
                    <ul>
                        <li>Completely customize your requirements and goals to align with your business setting,</li>
                        <li>Periodically performance benchmark and improve as you grow.</li>
                        <li>Add features as you expand.</li>
                        <li>Functionality to fit every business size.</li>
                    </ul>
                </div>
                <div class="col-lg-12 text-center box-button">
                    <a href="<?php echo home_url('plans-and-pricing')?>" class="btn btn-blue-env">SEE PLAN DETAILS</a>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container">
                <div class="row box-peace-of-mind">
                    <div class="col-lg-8">
                        <h2>PEACE OF MIND, 365 DAYS A YEAR</h2>
                        <p>
                            Keeping your business visible online doesn’t have to be time consuming, stressful figure of how stuff works.
                        </p>
                        <p>
                            Every time a need of change or simply improvement with your website comes up, there’s no need to scramble. With EnvZone, you’ll have a trusted manager ready to help whenever you need it. That’s real peace of mind.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <img src="<?php echo ASSET_URL;?>images/icon-peace-of-mind.png" alt="">
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
                <div class="col-lg-12 text-center">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-how-it-work.png" alt="">
                </div>

            </div>
        </div>

        <div class="container-fluid bg-gray-process">
            <div class="container section-your-business">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2>
                            WHY THIS IS THE PLAN FOR
                            YOUR BUSINESS?
                        </h2>
                    </div>
                    <div class="col-lg-10">
                        <ul>
                            <li>
                                As you can see in the above team roles, a variety of skills are required which you are unlikely to have immediately to hand in order to compete in this competitive digital world.
                            </li>
                            <li>
                                With this solution, you’ll never worry about your website issues ever again. You’ll have a dedicated team who’s got your back—today, tomorrow, and every day.
                            </li>
                            <li>
                                Your business probably has a lacking support from in-house resource to manage online presence. Digital world is the foundation of communication and you can’t afford to let your business get lost. Maintaining the right-skill inhouse resources to run your business online is not sustainable for your business setting.
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

    <?php require_once "popup-services.php";?>
</main>