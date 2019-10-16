<?php
/* Template Name: Newsletter Signup*/
get_header('newsletter');
?>
<main class="main-content">
    <section class="newsletter-signup-template-page">
        <div class="container-fluid box-newsletter-signup">
            <div class="container box-container justify-content-center align-items-center">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <a href="<?php echo home_url();?>" class="logo-envzone">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/envzone-logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-7 bg-gray">
                        <div class="box-head clearfix">
                            <img class="img-fluid mail-box" src="<?php echo ASSET_URL;?>images/icon-mailbox-green.png" alt="">
                            <img class="img-fluid process-bar" src="<?php echo ASSET_URL;?>images/icon-process-bar-newsletter.png" alt="">
                            <h3>Stay tuned for all the insights!</h3>
                        </div>
                        <div class="form-newsletter-signup">
                            <p>You are from</p>
                            <?php
                            echo do_shortcode('[gravityform id=33 title=false description=false ajax=true]');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer('subscription');
?>


