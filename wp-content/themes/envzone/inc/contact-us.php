<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page contact-us-page">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 box-form-contact">
                    <div class="box-header mb-5">
                        <h1 class="title-head-blue title-top">COLLABORATE WITH ENVZONE!</h1>
                        <p>
                            Ready to start a flow? Let’s fill out the form to collect some basic information
                            prior to scheduling appoitment.
                        </p>
                        <p>
                            You have a project but not quite ready to contact us?
                        </p>
                        <a href="<?php echo home_url('process-framework');?>">
                            Is ENVZONE a fit for you?
                        </a>
                    </div>

                    <div class="box-form-contact form-horizontal">
                        <?php
                            echo do_shortcode('[gravityform id=5 title=false description=false ajax=false]');
                        ?>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="box-contact-topic">
                        <div class="label-header">
                            CONTACT US BY TOPIC
                        </div>
                        <article>
                            <h4>New Business and Partnering:</h4>
                            <div class="name-label">Linh Pham</div>
                            <a href="mailto:linh.pham@envzone.com">linh.pham@envzone.com</a>
                        </article>

                        <article>
                            <h4>Media Inquiries:</h4>
                            <div class="name-label">Belle Nguyen</div>
                            <a href="mailto:belle.nguyen@envzone.com">belle.nguyen@envzone.com</a>
                        </article>

                        <article>
                            <h4>Career Opportunities:</h4>
                            <div class="name-label">Apply via our careers section</div>
                        </article>

                        <article>
                            <h4>Website Feedback:</h4>
                            <div class="name-label">Web Maintenance Team</div>
                            <a href="mailto:webmaster@envzone.com">webmaster@envzone.com</a>
                        </article>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h2 class="title-head-blue title-top pb-3 pt-lg-0 pt-5">DOING BUSINESS WITH US IS EASY!</h2>
                </div>

                <div class="col-lg-12 box-visit-envzone clearfix pb-5">
                    <div class="col-green">
                        <h4>VISIT ENVZONE!</h4>
                        <p>
                            Headquarters Location: <br>
                            ENVZONE LLC <br>
                            1801 California St Ste 2400 <br>
                            Denver, CO 80202
                        </p>
                        <p>
                            Monday to Friday | 8:30 AM – 5:30 PM MST <br>
                            Main: 720-606-2900 <br>
                            Fax: 720-606-4265 <br>
                            Email: info@envzone.com
                        </p>
                    </div>
                    <div class="box-img">
                        <img src="<?php echo ASSET_URL;?>images/img-doing-business.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <img class="img-fluid" style="width: 100%;" src="<?php echo ASSET_URL;?>images/img-map-env.png" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a target="_blank" href="https://goo.gl/maps/V7KQJrDY94t" class="btn btn-green-env btn-100">
                        <i class="icon-direction"></i>
                        Take me to direction page
                    </a>
                </div>
                <div class="col-12">
                    <div class="international-header">
                        International Offices:
                    </div>
                </div>
                <div class="col-lg-6 international-office">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-office-operation.png" alt="">
                    <h5>Operation Office </h5>
                    <p>
                        ENVZONE, LTD. <br>
                        H3 Building, Level 1 <br>
                        384 Hoang Dieu <br>
                        District 4, Hochiminh city <br>
                        Vietnam <br>

                        Phone: +84 961 709 095 <br>
                        Email: info.operation@envzone.com
                    </p>
                    <a target="_blank" href="https://goo.gl/maps/RTVnDANdPAA2" class="btn btn-green-env btn-100"><i class="icon-direction"></i> Take me to direction page</a>
                </div>
                <div class="col-lg-6 international-office">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-office-strategic.png" alt="">
                    <h5> Strategic Partnership Office</h5>
                    <p>
                        ENVZONE, LTD. <br>
                        Bitexco Financial Tower, Level 46 <br>
                        2 Hai Trieu <br>
                        District 1, Hochiminh city <br>
                        Vietnam <br>

                        Phone: +84 984 642 340 <br>
                        Email: info.partnership@envzone.com
                    </p>
                    <a target="_blank" href="https://goo.gl/maps/vBgHwtfhAgu" class="btn btn-green-env btn-100"><i class="icon-direction"></i> Take me to direction page</a>
                </div>


            </div>
        </div>

    </section>
</main>