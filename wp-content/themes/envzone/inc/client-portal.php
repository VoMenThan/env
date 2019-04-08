<main class="main-content">
    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <span class="nav-link active">Client Portal</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo home_url('vendor-portal');?>">Vendor Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo home_url('employee-portal');?>">Employee Portal</a>
                </li>
            </ul>
        </div>
    </div>

    <section class="artical-page lead-contact-form-page system-page employee-login-page">
        <div class="container">
            <div class="row box-list-employee justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <a target="_blank" href="https://envzone.clinked.com/">
                    <article class="item-employee">
                        <img src="<?php echo ASSET_URL;?>images/img-cl-project-management.png" alt="">
                        <h3>Project Management</h3>
                        <p>Store and collaborate your documents in secure digital gateway</p>
                    </article>
                    </a>
                </div>


            </div>
            <div class="row">
                <div class="col-12">
                    <div class="hr-employee"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="box-client-portal">
                        <h1 class="title-head-gray">DO NOT HAVE AN ACCOUNT YET!</h1>
                        <h3>SUBMIT A REQUEST TO GET YOU ON THE SYSTEM</h3>
                        <div class="box-form-client-portal form-horizontal">
                            <?php
                                echo do_shortcode('[gravityform id=7 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>