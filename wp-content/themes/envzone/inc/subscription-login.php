<?php
/* Template Name: Subscription login*/
get_header();
?>
<main class="main-content">
    <section class="subscription-member-template-page">
        <div class="container box-affiliate-content">
            <div class="row box-container justify-content-center">
                <div class="col-lg-4 content-subscription-template">
                    <?php the_content();?>
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
    <?php if (isset($_GET['action'])):?>
    .subscription-member-template-page .content-subscription-template h2{
        display: none;
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
    $(document).ready(function() {
        $('h2').innerText('Resquest a password reset');
    });
</script>
<?php get_footer();?>
