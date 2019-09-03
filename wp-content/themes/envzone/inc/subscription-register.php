<?php
/* Template Name: Subscription register*/
get_header();
$plan = uri_segment(1);
?>
<main class="main-content">
    <section class="subscription-member-template-page register-checkout-page">
        <div class="container box-register-subscription">
            <div class="row title-secure-checkout">
                <div class="col-lg-12">
                    <img class="process-bar-subscription img-fluid d-lg-block d-none" src="<?php echo ASSET_URL;?>images/icon-process-bar-subscription-checkout.png" alt="">
                    <img class="process-bar-subscription img-fluid d-lg-none d-block" src="<?php echo ASSET_URL;?>images/icon-process-bar-subscription-checkout-mb.png" alt="">
                    <h1>
                        Secure Checkout
                    </h1>
                </div>
            </div>
            <?php the_content();?>
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
    .box-infomation-checkout .mp-form-submit{
        display: none;
    }
    .box-register-subscription{
        min-height: calc(100vh - 180px);
    }
    <?php if ($plan == 'starter'):?>
    .box-register-subscription .title-secure-checkout{
        display: none;
    }
    .box-infomation-checkout .mp-form-submit{
        display: block;
    }
    .box-infomation-payment{
        display: none;
    }
    .box-infomation-subscription-sumary{
        display: none;
    }
    .form-secure-checkout .box-your-information .mepr_last_name{
        display: none;
    }
    .form-secure-checkout .box-your-information .mepr_first_name{
        display: none;
    }
    .form-secure-checkout .box-your-information .title-your-information{
        display: none;
        border-bottom: none;
    }
    .form-secure-checkout .box-your-information .title-starter{
        display: block !important;
    }
    .form-secure-checkout .box-your-information{
        border: none;
    }

    <?php endif;?>
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
<script>

    $(document).ready(function(){
        $(".stripe-card-name").attr("placeholder", "Name on the card*");
        $('h2').innerText('Resquest a password reset');
    });
</script>
<?php get_footer();?>
