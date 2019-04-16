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
                    <div class="col-lg-7">
                        <article>
                            <h1 class="title-head-blue title-top">WORK WITH US!</h1>
                            <p>
                                ENVZONE is a full-service software development outsourcing consultancy firm serving clients in private and public sector across industries. As a contract entity, ENVZONE focuses its expertise on the areas of quality, flow and output management.
                            </p>
                        </article>

                        <article>
                            <h4 class="subhead-1">
                                What we purchase
                            </h4>
                            <p>
                                As a full-service software outsourcing consulting firm, ENVZONE is looking to identify vendor, subcontractors that will support the firm’s projects in all aspects of custom software development.
                            </p>
                        </article>

                        <article>
                            <h4 class="subhead-1">Enrollment</h4>
                            <p>
                                You are invited to register your company, if your company provides software-related services that ENVZONE is likely to purchase. Registration enters your company into the ENVZONE database of vendors and subcontractors and gives your company visibility among the procurement professionals working on active ENVZONE projects nationwide in United States.
                            </p>
                            <p>
                                Registrants are not automatically placed on a pre-approved bidder list, rather the registrant profiles are reviewed at the time vendor services are required for each project based on project-specific requirements. You will only be contacted by ENVZONE when you are being considered for work on a project.
                            </p>
                        </article>

                        <article>
                            <h2 class="head-1">
                                GET YOUR OUTSTANDING TEAM EXPOSED!
                            </h2>
                            <p>
                                Ready to be a part of our journey? Fill out the form and we’ll be in touch with you as soon as possible.
                            </p>
                        </article>

                        <div class="box-form-client-portal form-horizontal">
                            <?php
                            echo do_shortcode('[gravityform id=6 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>


                    <div class="col-lg-12 box-already-registered clearfix pb-5">
                        <div class="col-blue d-flex align-items-center justify-content-center">
                            <div class="title-already">
                                Already registered? <br>
                                Login <a href="#">here</a>.
                            </div>
                        </div>
                        <div class="box-img">
                            <img src="<?php echo ASSET_URL;?>images/img-already.png" alt="" class="img-fluid">
                        </div>
                    </div>


                    <div class="col-lg-12 box-email-us clearfix pb-5">
                        <div class="box-blue d-flex align-items-center justify-content-center">
                            <div class="title-question">
                                Questions about working with ENVZONE as a Vendor or Contractor? Contact us!
                            </div>
                        </div>
                        <div class="box-green">
                            <a href="#">EMAIL US</a>
                        </div>
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