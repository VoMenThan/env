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

    <script language="JavaScript" src="https://seal.networksolutions.com/siteseal/javascript/siteseal.js" type="text/javascript"></script>

</head>
<body>

    <main class="main-content">
        <section class="analyze-page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 box-info-done">
                        <a href="<?php echo  home_url();?>" class="box-logo">
                        <img src="<?php echo ASSET_URL;?>images/logo-envzone-blue.png" alt="Logo Envzone">
                        </a>
                        <div id="loading" class="text-center">
                            Analyzing and sorting...
                        </div>
                        <div class="box-analyze-load invisible">
                            <div class="status">
                                Done.
                            </div>
                            <p>
                                We found teams that are capable of building products that match the queries below.
                            </p>
                            <div class="keyword-analyze">
                                <?php echo $_REQUEST['analyze'];?>
                            </div>
                            <p>
                                They should be ready to work on your project in coming weeks!
                            </p>
                            <div class="description">
                                Interested in working with the team? Fill out the form below to speak with an advisor.
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9 box-analyze-load invisible">
                        <div class="analyze-form">
                            <?php
                            echo do_shortcode('[gravityform id="15" title="false" description="false"]');
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-analyze text-center">
                <p>
                    ©2019 EnvZone, LLC. All Rights Reserved.
                </p>
                <a href="<?php echo home_url('privacy-policy');?>">Privacy Policy</a>
            </div>
        </section>
    </main>


    <script>
        (function($) {
            $( window ).load(function() {
                setTimeout(function () {
                    $('#loading').hide();
                    $( '.box-analyze-load' ).removeClass( 'invisible' );
                }, 1500);
            });
        })(jQuery);
    </script>


    <?php wp_footer();?>
</body>
</html>