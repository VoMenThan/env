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

    <?php wp_head();
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>


    <link href="<?php echo ASSET_URL;?>css/nouislider.min.css" rel="stylesheet">
    <link href="<?php echo ASSET_URL;?>css/Chart.min.css" rel="stylesheet">
    <script language="JavaScript" src="<?php echo ASSET_URL;?>js/Chart.min.js" type="text/javascript"></script>
</head>
<body>

    <main class="main-content">
        <section class="analyze-page cost-estimator">
            <div class="container">
                <div class="row justify-content-center form-estimated">
                    <div class="col-lg-8 text-center">
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

                        <form id="estimated-form" method="get" action="#chart-estimated">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">LOCATION OF YOUR OFFICE</label>
                                <div class="col-sm-6">
                                    <select name="state" class="form-control form-control-lg" required>
                                        <option value="">Please select state</option>
                                        <?php
                                            $state = get_field('average_hourly_rate' , $post->ID);
                                            $state_id = array();
                                            foreach ($state as $k => $item):

                                                $state_id[substr($item['state'], -2)] = $k;
                                        ?>
                                        <option <?php echo ($_GET['state'] == substr($item['state'], -2))? 'selected':'';?> value="<?php echo substr($item['state'], -2);?>"><?php echo $item['state'];?></option>
                                        <?php endforeach;?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">BUDGET</label>
                                <div class="col-sm-6">
                                    <select name="estimated-budget" class="form-control form-control-lg" required>
                                        <option value="">Please select estimated budget</option>
                                        <option value="25k" <?php echo ($_GET['estimated-budget'] == '25k')? 'selected':'';?>>< 25k</option>
                                        <option value="25_100k" <?php echo ($_GET['estimated-budget'] == '25_100k')? 'selected':'';?>>25k-100k</option>
                                        <option value="100_250k" <?php echo ($_GET['estimated-budget'] == '100_250k')? 'selected':'';?>>100k-250k</option>
                                        <option value="250k"> <?php echo ($_GET['estimated-budget'] == '250k')? 'selected':'';?>> 250k</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="box-estimated-developers">
                                        <div class="info-estimated d-flex justify-content-between">
                                            <span class="title">Estimated developers involved in the project</span>
                                            <span id="huge-value" class="number"><?php $get_dev = (isset($_GET['estimated-developers']))? $_GET['estimated-developers']:5; echo $get_dev;?></span>
                                            <input class="d-none" type="text" name="estimated-developers" id="huge-input" value="<?php echo $get_dev?>" required>
                                        </div>
                                        <div id="slider-huge"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-green-env">CALCULATE</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <?php if (isset($_GET['state']) and $_GET['estimated-developers'] != '' and $_GET['estimated-budget'] != ''):?>

                    <?php

                    $chart_env = array();
                    $chart_traditional = array();

                    $est_dev = (int)$_GET['estimated-developers'];
                    if ($est_dev > 100){
                        $est_dev = 100;
                    }elseif ($est_dev < 5){
                        $est_dev = 5;
                    }


                    $get_state = $_GET['state'];
                    $state_position = $state_id[$get_state];


                    $est_budget = $_GET['estimated-budget'];
                    if ($est_budget == '25k'){
                        $est_cost_env = 45;
                        $est_cost = $state[$state_position]['estimated_1'];
                    }elseif ($est_budget == '25_100k'){
                        $est_cost_env = 45;
                        $est_cost = $state[$state_position]['estimated_2'];
                    }elseif ($est_budget == '100_250k'){
                        $est_cost_env = 40;
                        $est_cost = $state[$state_position]['estimated_3'];
                    }elseif ($est_budget == '250k'){
                        $est_cost_env = 40;
                        $est_cost = $state[$state_position]['estimated_4'];
                    }else{
                        $est_cost_env = 0;
                        $est_cost = 0;
                    }

                    $chart_env[0] = $est_cost_env*80*$est_dev;
                    $chart_env[1] = $est_cost_env*1920*$est_dev;
                    $chart_env[2] = $est_cost_env*3840*$est_dev;

                    $chart_traditional[0] = $est_cost*80*$est_dev;
                    $chart_traditional[1] = $est_cost*1920*$est_dev;
                    $chart_traditional[2] = $est_cost*3840*$est_dev;

                    $saving_week = $chart_traditional[0] - $chart_env[0];
                    $saving_month = $chart_traditional[1] - $chart_env[1];
                    $saving_year = $chart_traditional[2] - $chart_env[2];


                    function convertDola($number){

                        if ($number < 1000000){
                            $number = round($number, -3);
                            $number = $number/1000;
                            $number = number_format($number , 0, '.', ',').'K';
                        }else{
                            $number = round($number, -5);
                            $number = $number/1000000;
                            $number = number_format($number , 1, '.', ',').'M';
                        }
                        return $number;
                    }

                    ?>
                <div id="chart-estimated" class="row chart-estimated">
                    <div class="col-lg-6 box-chart-estimated">
                        <h3 class="title-chart">The estimated development cost</h3>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-lg-5 offset-lg-1 d-flex align-items-center">
                        <ul class="label-chart">
                            <li class="traditional-method"><span></span> Traditional Method</li>
                            <li class="envzone-solution"><span></span>EnvZone Solution</li>
                        </ul>
                    </div>
                </div>

                <div class="row potential-saving">
                    <div class="col-lg-6">
                        <h2 class="title-potential">Potential Saving</h2>

                        <ul class="circle-potential nav">
                            <li class="nav-item d-flex align-items-center justify-content-center position-relative">
                                <span class="circle-1">$<?php echo convertDola($saving_week);?></span>
                                <span class="title">2-Week Saving</span>
                            </li>
                            <li class="nav-item d-flex align-items-center justify-content-center position-relative">
                                <span class="circle-2">$<?php echo convertDola($saving_month);?></span>
                                <span class="title">6-Month Saving</span>
                            </li>
                            <li class="nav-item d-flex align-items-center justify-content-center position-relative">
                                <span class="circle-3">$<?php echo convertDola( $saving_year);?></span>
                                <span class="title">1-Year Saving</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-5 offset-lg-1 d-flex flex-column justify-content-between">
                        <p>This calculator is based on industry hourly rate standard, as reported in the 2018. Your actual savings may vary.</p>

                        <div class="box-share">
                            <div class="title-share">SHARE THIS REPORT.</div>
                            <div class="link-copy">
                                <input id="copy-link" type="text" class="link" value="<?php echo $full_url;?>#chart-estimated"/>
                                <span class="copy-clipboard">Copy</span>
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-lg-12 text-center box-optimize-envzone">
                        <div class="title-button">READY TO OPTIMIZE WITH ENVZONE SOLUTION!</div>
                        <a href="<?php echo home_url('contact-us')?>" class="btn btn-blue-env">Yes, I want to implement now.</a>
                    </div>
                </div>
                <?php endif;?>
            </div>
            <div class="footer-analyze text-center">
                <p class="text-center">
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
        var bigValueInput = document.getElementById('huge-input');

        noUiSlider.create(bigValueSlider, {
            start: <?php echo ($est_dev == '') ? 5 : $est_dev;?>,
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
            bigValueInput.value = values[handle];
        });

        $('.copy-clipboard').click(
            function (e) {
                let el = document.getElementById('copy-link');
                el.select();
                document.execCommand('copy');
            }
        );

        <?php if (isset($_GET['state']) and $_GET['estimated-developers'] != '' and $_GET['estimated-budget'] != ''):?>
        /*Chart JS*/
        var ctx = document.getElementById('myChart').getContext('2d');
        var data_env = [<?php echo $chart_env[0].','.$chart_env[1].','. $chart_env[2]?>];
        var data_traditional = [<?php echo $chart_traditional[0].','.$chart_traditional[1].','. $chart_traditional[2]?>];
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2-Week Cost', '6-Month Cost', '1-Year Cost'],
                datasets: [
                    {
                        label: 'EnvZone Solution',
                        data: data_env,
                        backgroundColor: 'rgba(13, 49, 83)',
                    },
                    {
                        label: 'Traditional Method',
                        data: data_traditional,
                        backgroundColor: 'rgba(189, 189, 189)'
                    }

                ]
            },
            options: {
                scales: {
                    xAxes: [{
                        barPercentage: 0.5,
                        barThickness: 50,
                        maxBarThickness: 25,
                        minBarLength: 2,
                        gridLines: {
                            offsetGridLines: true,
                            display: false
                        }

                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            callback: function(value, index, values) {
                                return  '$' + (value/1000)+ 'K';
                            }
                        },
                    }]
                },

                legend: {
                    display: false
                },
                tooltips: false
            },

        });
        /*Chart JS END*/
        <?php endif;?>

        $( document ).ready(function() {

            if(window.location.hash) {
                var hash = window.location.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 'slow');
            }

        });

    </script>
    <?php wp_footer();?>
</body>
</html>