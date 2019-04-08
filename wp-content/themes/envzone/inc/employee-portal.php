<main class="main-content">
    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo home_url('client-portal');?>">Client Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo home_url('vendor-portal');?>">Vendor Portal</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link active">Employee Portal</span>
                </li>
            </ul>
        </div>
    </div>

    <section class="artical-page lead-contact-form-page system-page employee-login-page">
        <div class="container">
            <div class="row box-list-employee">
                <div class="col-lg-4 col-md-6 col-12">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-project-management.png" alt="">
                        <h3>Project Management</h3>
                        <p>Get access to company intranet system. Collaborate on projects with your colleagues.</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-timesheet-tracker.png" alt="">
                        <h3>Timesheet Tracker</h3>
                        <p>Report your timesheet. Keep your track of your project status and budget.</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <a target="_blank" href="https://envzone.clinked.com/">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-crm.png" alt="">
                        <h3>CRM</h3>
                        <p>Manage all your company’s relationships and interactions with customers and potential customers.</p>
                    </article>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-hr-ats.png" alt="">
                        <h3>HR-ATS</h3>
                        <p>The integrated platform streamlines various recruiting activities.</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-resources.png" alt="">
                        <h3>Resources</h3>
                        <p>Keep track of sources, links, and articles in a sharing environment with teams.</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-login-management.png" alt="">
                        <h3>Login Management</h3>
                        <p>Manage all your company’s relationships and interactions with customers and potential customers</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-client-and-vendor.png" alt="">
                        <h3>Client and Vendor Management</h3>
                        <p>Create private Workspaces to securely share information with your clients and vendors</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/icon-em-customer-support-partal.png" alt="">
                        <h3>Customer Support Portal</h3>
                        <p>Enhance High Touch customer service with ticketing system</p>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="hr-employee"></div>
                </div>
            </div>
            <div class="row justify-content-center box-form-employee">
                <div class="col-lg-8">
                    <div class="box-client-portal">
                        <h1 class="title-head-gray">DO NOT HAVE AN ACCOUNT YET!</h1>
                        <h3>SUBMIT A REQUEST TO GET YOU ON THE SYSTEM</h3>
                        <div class="box-form-client-portal form-horizontal">
                        <?php
                        echo do_shortcode('[gravityform id=9 title=false description=false ajax=false]');
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>