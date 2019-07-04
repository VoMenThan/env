<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        <?php
        wp_title('|', true, 'right');
        ?>
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo ASSET_URL;?>images/favicon-envzone.png">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head();?>

</head>
<body>

<main class="main-content">
    <section class="subscription-signup-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 my-5 text-center">
                    <img class="img-fluid img-process" src="<?php echo ASSET_URL;?>images/img-progress-bar-subscription.png" alt="">
                    <div class="box-subscription-form">
                        <div class="box-head">
                            <a href="<?php echo  home_url();?>" class="box-logo">
                                <img src="<?php echo ASSET_URL;?>images/envzone-logo.png" alt="Logo Envzone">
                            </a>
                        </div>
                        <div class="subtitle">Tell us about yourself.</div>
                        <div class="subscription-form">
                            <?php
                                echo do_shortcode('[gravityform id="24" title="false" description="false"]');
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-signup text-center">
            <p>
                ©2019 EnvZone, LLC. All Rights Reserved.
            </p>
            <a href="<?php echo home_url('privacy-policy');?>">Privacy Policy</a>
        </div>
    </section>
</main>
<?php
    $plans = $_GET['plans'];
    $pricing = $_GET['pricing'];
?>
<script>
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {
            var plans = <?php echo json_encode($plans);?>;
            var pricing = <?php echo json_encode($pricing);?>;
            $("#gform_24 #input_24_8").val(plans);
            $("#gform_24 #input_24_9").val(pricing);

        });

    })(jQuery);
</script>
<?php wp_footer();?>
</body>
</html>