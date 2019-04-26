<?php get_header();?>
    <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Envzone</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Vendor Contact Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="artical-page vendor-contact-form-page">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="title-head-blue title-top">VENDOR Application</h1>
                        <h2>Get Your Outstanding Team Verified and Grow!</h2>
                        <p>
                            Ready to be a part of our journey? Fill out the form and we’ll be in touch with you as soon as possible.
                        </p>

                        <div class="box-form-client-portal form-horizontal">
                            <?php
                            echo do_shortcode('[gravityform id=6 title=false description=false ajax=false]');
                            ?>
                        </div>

                        <h2>General Notes</h2>
                        <p>
                            ENVZONE is a full-service software development outsourcing consultancy firm serving clients in private and public sector across industries. As a contract entity, ENVZONE focuses its expertise on the areas of quality, flow and output management.
                        </p>
                        <h3>What we purchase</h3>
                        <p>
                            As a full-service software outsourcing consulting firm, ENVZONE is looking to identify vendor, subcontractors that will support the firm’s projects in all aspects of custom software development.
                        </p>
                        <h3>
                            Enrollment
                        </h3>
                        <p>
                            You are invited to register your company, if your company provides software-related services that ENVZONE is likely to purchase. Registration enters your company into the ENVZONE database of vendors and subcontractors and gives your company visibility among the procurement professionals working on active ENVZONE projects nationwide in United States.
                        </p>
                        <p>
                            Registrants are not automatically placed on a pre-approved bidder list, rather the registrant profiles are reviewed at the time vendor services are required for each project based on project-specific requirements. You will only be contacted by ENVZONE when you are being considered for work on a project.
                        </p>

                    </div>

                    <div class="col-lg-4 box-already-registered">
                        <a href="<?php echo home_url('certification-process');?>">
                            <article class="item-vendor">
                                <img src="<?php echo ASSET_URL;?>images/icon-verification-process.svg" alt="">
                                <h3>Verification Process</h3>
                                <p>Not clear how this works! Click here to learn more.</p>
                            </article>
                        </a>

                        <a href="<?php echo home_url('vendor-portal');?>">
                            <article class="item-vendor">
                                <img src="<?php echo ASSET_URL;?>images/icon-already-verified.svg" alt="">
                                <h3>Already Verified</h3>
                                <p>Get access here to view and track your projects</p>
                            </article>
                        </a>
                    </div>

                    <div class="col-lg-12 box-email-us clearfix pb-5">
                       <p>Questions about working with ENVZONE as a Vendor or Contractor? Contact us!</p>
                        <p class="text-center mt-5">
                            <a href="mailto:info@envzone.com">EMAIL US</a>
                        </p>

                    </div>


                </div>
            </div>

        </section>
    </main>
    <script>
        $(document).ready(function(){
            $('input[id="input_6_9"]').change(function(e){
                var fileName = e.target.files[0].name;
                $("#field_6_9 label").html(fileName);
            });
        });
    </script>
<?php get_footer();?>