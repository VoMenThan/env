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


    <link href="<?php echo ASSET_URL;?>css/nouislider.min.css" rel="stylesheet">
</head>
<body>

    <main class="main-content">
        <section class="analyze-page cost-estimator">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <a href="<?php echo  home_url();?>" class="box-logo">
                        <img src="<?php echo ASSET_URL;?>images/logo-envzone-blue.png" alt="Logo Envzone">
                        </a>

                        <h1>Development Cost Estimator</h1>
                        <p>
                            This calculator simulates the potential savings of development cost  that you could realize by optimizing development approach with EnvZone outsourcing solutions.
                        </p>
                        <div class="note">
                            Enter your metrics to calculate your potential results, then scroll down to view them.
                        </div>

                        <form>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">LOCATION OF YOUR OFFICE</label>
                                <div class="col-sm-6">
                                    <select class="form-control form-control-lg">
                                        <option>Please select state</option>
                                        <option value="">Alabama - AL</option>
                                        <option value="">Alaska - AK</option>
                                        <option value="">Arizona - AZ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">BUDGET</label>
                                <div class="col-sm-6">
                                    <select class="form-control form-control-lg">
                                        <option>Please select estimated budget</option>
                                        <option value="">< 25k</option>
                                        <option value="">25k-100k</option>
                                        <option value="">100k-250k</option>
                                        <option value="">> 250k</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="box-estimated-developers">
                                        <div class="info-estimated d-flex justify-content-between">
                                            <span class="title">Estimated developers involved in the project</span>
                                            <span id="huge-value" class="number">5</span>
                                        </div>
                                        <div id="slider-huge"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-green-env">CALCULATE</button>
                                </div>
                            </div>
                        </form>

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


    <script language="JavaScript" src="<?php echo ASSET_URL;?>js/nouislider.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="<?php echo ASSET_URL;?>js/wNumb.js" type="text/javascript"></script>
    <script>
        var bigValueSlider = document.getElementById('slider-huge');
        var bigValueSpan = document.getElementById('huge-value');

        noUiSlider.create(bigValueSlider, {
            start: 5,
            step: 5,
            format: wNumb({
                decimals: 0
            }),
            range: {
                min: 5,
                max: 100
            },
            pips: {
                mode: 'values',
                values: [5, 25, 50, 75, 100],
                density: 4
            }
        });

        bigValueSlider.noUiSlider.on('change', function (values, handle) {
            bigValueSpan.innerHTML = values[handle];
        });
    </script>
    <?php wp_footer();?>
</body>
</html>