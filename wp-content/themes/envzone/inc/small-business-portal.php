<?php
/* Template Name: SYS - Small business portal*/
get_header();
?>
<main class="main-content">

    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <span class="nav-link active">Small Business Portal</span>
                </li>
            </ul>
        </div>
    </div>

    <section class="artical-page lead-contact-form-page system-page employee-login-page">
        <div class="container">
            <div class="row box-list-employee justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <a target="_blank" rel="nofollow" href="">
                        <article class="item-employee">
                            <img src="<?php echo ASSET_URL;?>images/icon-account-green.png" alt="">
                            <h3>Account</h3>
                            <p>Manage your subscription, payment, and more.</p>
                        </article>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <a target="_blank" rel="nofollow" href="https://portal.envzone.com/">
                        <article class="item-employee">
                            <img src="<?php echo ASSET_URL;?>images/icon-business-portal.png" alt="">
                            <h3>Business Portal</h3>
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
                <div class="col-lg-8 pd-lr-0">
                    <div class="box-client-portal">
                        <h1 class="title-head-gray">DO NOT HAVE AN ACCOUNT YET!</h1>
                        <h3>SUBMIT A REQUEST TO GET YOU STARTED</h3>

                        <div class="box-form-client-portal form-horizontal">
                            <?php
                            echo do_shortcode('[gravityform id=8 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</main>
<?php get_footer();?>