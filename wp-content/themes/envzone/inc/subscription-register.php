<?php
/* Template Name: Subscription register*/
get_header();



$plan = uri_segment(1);
$term = uri_segment(2);

if ($term != ''){
    $term = 'year';
    $term_name = 'Yearly (20% Off)';
    $term_more = 'Monthly';
    $full_url = home_url('register/').$plan;
}else{
    $term = '';
    $full_url = home_url('register/').$plan.'/yearly';
    $term_name = 'Monthly';
    $term_more = 'Yearly (20% Off)';
}
if ($plan == 'growing-business'){
    $plan_name = 'Growing Business';
}elseif ($plan == 'main-street'){
    $plan_name = 'Main Street';
}else{
    $plan_name = 'High Growth';
}
?>
<main class="main-content">
    <section class="subscription-member-template-page register-checkout-page">
        <div class="container box-affiliate-content">
            <div class="row box-container justify-content-center">
                <div class="col-lg-4 content-subscription-template">
                    <?php the_content();?>
                    <?php if (!is_user_logged_in()):?>
                    <p style="text-align: center; margin-top: 15px;"><em>Have an account? <a href="<?php echo home_url('subscription-login');?>">login</a></em></p>
                    <?php endif;?>
                </div>
                <div class="col-lg-4 form-secure-checkout">
                    <div class="box-subscription-summary">
                        <div class="title-form">Subscription Summary</div>

                        <div class="box-info">
                            <div class="subtitle-summary">Plan</div>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuPlan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $plan_name;?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuPlan">
                                    <a class="dropdown-item" href="<?php echo home_url('register/growing-business/');?>">Growing Business</a>
                                    <a class="dropdown-item" href="<?php echo home_url('register/main-street/');?>">Main Street</a>
                                    <a class="dropdown-item" href="<?php echo home_url('register/high-growth/');?>">High Growth</a>
                                </div>
                            </div>

                            <div class="subtitle-summary">Term</div>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuTerm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $term_name;?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuTerm">
                                    <a class="dropdown-item" href="<?php echo $full_url;?>"><?php echo $term_more;?></a>
                                </div>
                            </div>

                            <div class="box-total d-flex justify-content-between">
                                <span class="total">Total Amount</span>
                                <span class="total"></span>
                            </div>
                        </div>
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
        $('h2').innerText('Resquest a password reset')
    });
</script>
<?php get_footer();?>
