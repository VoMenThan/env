<?php
/* Template Name: Subscription Thank You*/
get_header();
?>
<main class="main-content">
    <section class="subscription-member-page">
        <div class="container box-affiliate-content">
            <div class="row box-container justify-content-center">
                <div class="col-lg-4">
                    <img class="process-bar-subscription img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/icon-process-bar-subscription.png" alt="">
                    <img class="process-bar-subscription img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/icon-process-bar-subscription-mb.png" alt="">
                    <article class="thank-you">
                        <h3>
                            Confirmation
                        </h3>

                        <div class="box-thank meantime">
                            <div class="notification">
                                <img class="alignnone size-full wp-image-3030" src="https://www.envzone.com/wp-content/uploads/2019/04/icon-verified.png" alt="">
                                <h1>Thank You!</h1>
                            </div>
                            <div class="box-info">
                                <p>
                                    You have purchased subscription plan successfully!
                                </p>
                                <p>
                                    Your full SMBs account is being processed for activation now. A notification email will be sent to your inbox within 24 hours.
                                </p>
                                <p>
                                    In the meantime, you can check your subscription status in the link below.
                                </p>

                            </div>
                        </div>
                    </article>
                    <div class="box-btn d-md-flex justify-content-md-between">
                        <a href="<?php echo home_url('small-business-portal');?>" class="btn btn-gray-trans-env">SMBs Portal</a>
                        <a href="<?php echo home_url('subscription-account');?>" class="btn btn-green-env">Account</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-affiliate">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="box-term">
                            <a href="<?php echo home_url('terms-of-use');?>">Terms of Use</a>
                            <a href="<?php echo home_url('privacy-policy');?>">Privacy Policy</a>
                        </div>

                        <a href="<?php echo home_url('privacy-policy');?>" class="logo-env-footer">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-envzone-gray.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<style>
    header nav .box-logo-home{
        display: block !important;
    }
    nav ul.main-menu{
        visibility: hidden;
    }
    nav .toolbar-top{
        display: none;
    }
    nav .box-logo-home a{
        position: relative;
        padding-top: 20px;
        top: 0;
    }
    nav .menu-bar-hamburger{
        display: none !important;
    }
    .box-affiliate-content{
        min-height: calc(100vh - 180px);
        padding-top: 100px;
        padding-bottom: 100px;
    }
    .box-affiliate-content > .box-container{
        height: 100%;
        text-align: center;
    }
    .box-affiliate-content > .box-container h2{
        font-size: 28px;
        color: #333333 !important;
        margin-bottom: 20px;
        margin-top: 50px;
        text-align: left;
    }
    .box-affiliate-content > .box-container h3{
        font-size: 26px;
        color: #333333 !important;
        margin-bottom: 20px;
        margin-top: 40px;
        text-align: left;
    }
    .box-affiliate-content > .box-container h4{
        font-size: 24px;
        color: #333333 !important;
        margin-bottom: 20px;
        margin-top: 30px;
        text-align: left;
    }
    .box-affiliate-content > .box-container p{
        font-size: 22px;
        line-height: 140%;
        font-weight: 500;
        margin-bottom: 15px;
        color: #808080;
        text-align: left;
    }
    .box-affiliate-content > .box-container li{
        list-style-type: inherit;
        margin-bottom: 15px;
        color: #808080;
        font-size: 22px;
        font-weight: 500;
        text-align: left;
    }
    .box-affiliate-content .uap-register-form{
        margin: auto;
    }
    .box-affiliate-content .uap-login-form-wrap{
        padding-top: 150px;
    }
    footer{
        display: none !important;
    }
    .footer-affiliate{
        background: #F2F2F2;
        padding: 15px;
    }
    .footer-affiliate{
        min-height: 90px;
    }
    .footer-affiliate .logo-env-footer img{
        height: 30px;
    }
    .footer-affiliate .box-term a{
        color: #BDBDBD;
        border-right: 1px solid #bdbdbd;
        padding: 0 15px;
        display: inline-block;
    }
    .footer-affiliate .box-term a:last-child{
        border-right: 0;
    }
</style>
<?php get_footer();?>
