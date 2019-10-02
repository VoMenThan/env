<?php
/* Template Name: SER - Plans and pricing*/
get_header();
?>
<main class="main-content">
    <div class="container-fluid nav-small-business">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="#" class="active">
                        Pricing
                    </a>
                    <a href="<?php echo home_url('small-business')?>">
                        Small Business
                    </a>
                    <a href="<?php echo home_url('coverage-locations')?>">
                        Coverage Locations
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page service-page pricing-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-8">
                    <div class="box-header text-center">
                        <?php echo get_the_content();?>
                    </div>
                </div>
                <div class="col-lg-12 p-0">
                    <!-- Nav tabs -->
                    <ul class="nav box-nav-tab justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link bd-radius-left tab-content active" data-toggle="tab" href="#menu1">Yearly (Save 20%)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bd-radius-right tab-content" data-toggle="tab" href="#menu2">Monthly</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="menu1" class="container tab-pane active"><br>
                            <div class="row justify-content-center">
                                <div class="col-lg-3 box-plan-pricing d-lg-block d-none">
                                    <div class="plan">Plans</div>
                                    <div class="pricing">Pricing</div>
                                </div>
                                <?php $packages_support_yearly = get_field('packages_support_yearly');
                                    foreach ($packages_support_yearly as $k => $item):
                                ?>
                                <div class="col-lg-3 col-md-8 col-12 d-flex">
                                    <div class="item-pricing d-flex <?php echo $k==1?'most-popular':'';?> flex-column justify-content-between">
                                        <div class="box-info">
                                            <?php if ($k==1){?>
                                                <div class="label-most-popular">Most Popular</div>
                                            <?php }?>
                                            <h2>
                                                <?php echo $item['name'];?>
                                            </h2>
                                            <img src="<?php echo $item['image'];?>" alt="<?php echo $item['name'];?>">
                                            <p>
                                                <?php echo $item['description'];?>
                                            </p>
                                        </div>
                                        <div class="box-pricing">
                                            <div class="pricing"><?php echo $item['price'];?></div>
                                            <div class="per-site-month"><?php echo $item['per_price'];?></div>
                                            <div class="sale-off"><?php echo $item['discount'];?></div>
                                            <a href="<?php echo $item['url_button'];?>" class="btn btn-green-env"><?php echo $item['button_name'];?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>

                                <div class="col-lg-12 box-table-option">
                                    <table class="table table-option-business">
                                        <thead>
                                        <tr>
                                            <th scope="col">Compare Plans</th>
                                            <th scope="col">High-Growth</th>
                                            <th scope="col">Main-Street</th>
                                            <th scope="col">Growing Business</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $compare_plans = get_field('compare_plans');
                                        foreach ($compare_plans['list_services'] as $item):
                                            ?>
                                            <tr <?php echo $item['color']=='blue'?'class="blue"':'';?>>
                                                <?php if ($item['type']=='head'){?>
                                                    <th><?php echo $item['name'];?></th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php }else{?>
                                                    <td><?php echo $item['name'];?><span class="info"></span></td>
                                                    <td>
                                                        <?php if ($item['check_point']=='point'):?>
                                                            <span class="circle"></span>
                                                        <?php elseif ($item['check_point']=='star'):?>
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0)">
                                                                    <path d="M39.9649 15.4496C39.8804 15.1904 39.6563 15.0014 39.3864 14.962L26.4342 13.0797L20.6419 1.34325C20.5216 1.09838 20.2724 0.943726 20.0004 0.943726C19.7283 0.943726 19.4784 1.09838 19.3588 1.34325L13.5658 13.0804L0.613596 14.9627C0.343669 15.0021 0.120282 15.1904 0.0350794 15.4503C-0.048691 15.7088 0.0207597 15.9938 0.216224 16.1835L9.5892 25.3195L7.37609 38.2201C7.33026 38.4886 7.44053 38.76 7.66033 38.9203C7.88157 39.0822 8.17441 39.1029 8.41427 38.9748L20.0004 32.8846L31.585 38.9748C31.6895 39.0299 31.8048 39.0571 31.9187 39.0571C32.0669 39.0571 32.2144 39.0113 32.3397 38.9203C32.5602 38.76 32.6704 38.4886 32.6239 38.2201L30.4115 25.3202L39.7845 16.1835C39.9792 15.9923 40.0494 15.7081 39.9649 15.4496Z" fill="#0D3153"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0">
                                                                        <rect width="40" height="40" fill="white"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        <?php elseif ($item['check_point']=='text'):?>
                                                            <?php echo $item['high'];?>
                                                        <?php else:?>
                                                            <?php echo '';?>
                                                        <?php endif;?>
                                                    </td>
                                                    <td>
                                                        <?php if ($item['check_point']=='point'):?>
                                                            <span class="circle"></span>
                                                        <?php elseif ($item['check_point']=='star'):?>
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0)">
                                                                    <path d="M39.9649 15.4496C39.8804 15.1904 39.6563 15.0014 39.3864 14.962L26.4342 13.0797L20.6419 1.34325C20.5216 1.09838 20.2724 0.943726 20.0004 0.943726C19.7283 0.943726 19.4784 1.09838 19.3588 1.34325L13.5658 13.0804L0.613596 14.9627C0.343669 15.0021 0.120282 15.1904 0.0350794 15.4503C-0.048691 15.7088 0.0207597 15.9938 0.216224 16.1835L9.5892 25.3195L7.37609 38.2201C7.33026 38.4886 7.44053 38.76 7.66033 38.9203C7.88157 39.0822 8.17441 39.1029 8.41427 38.9748L20.0004 32.8846L31.585 38.9748C31.6895 39.0299 31.8048 39.0571 31.9187 39.0571C32.0669 39.0571 32.2144 39.0113 32.3397 38.9203C32.5602 38.76 32.6704 38.4886 32.6239 38.2201L30.4115 25.3202L39.7845 16.1835C39.9792 15.9923 40.0494 15.7081 39.9649 15.4496Z" fill="#0D3153"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0">
                                                                        <rect width="40" height="40" fill="white"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        <?php elseif ($item['check_point']=='text'):?>
                                                            <?php echo $item['main'];?>
                                                        <?php else:?>
                                                            <?php echo '';?>
                                                        <?php endif;?>
                                                    </td>
                                                    <td>
                                                        <?php if ($item['check_point']=='point'):?>
                                                            <span class="circle"></span>
                                                        <?php elseif ($item['check_point']=='star'):?>
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0)">
                                                                    <path d="M39.9649 15.4496C39.8804 15.1904 39.6563 15.0014 39.3864 14.962L26.4342 13.0797L20.6419 1.34325C20.5216 1.09838 20.2724 0.943726 20.0004 0.943726C19.7283 0.943726 19.4784 1.09838 19.3588 1.34325L13.5658 13.0804L0.613596 14.9627C0.343669 15.0021 0.120282 15.1904 0.0350794 15.4503C-0.048691 15.7088 0.0207597 15.9938 0.216224 16.1835L9.5892 25.3195L7.37609 38.2201C7.33026 38.4886 7.44053 38.76 7.66033 38.9203C7.88157 39.0822 8.17441 39.1029 8.41427 38.9748L20.0004 32.8846L31.585 38.9748C31.6895 39.0299 31.8048 39.0571 31.9187 39.0571C32.0669 39.0571 32.2144 39.0113 32.3397 38.9203C32.5602 38.76 32.6704 38.4886 32.6239 38.2201L30.4115 25.3202L39.7845 16.1835C39.9792 15.9923 40.0494 15.7081 39.9649 15.4496Z" fill="#0D3153"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0">
                                                                        <rect width="40" height="40" fill="white"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        <?php elseif ($item['check_point']=='text'):?>
                                                            <?php echo $item['growing'];?>
                                                        <?php else:?>
                                                            <?php echo '';?>
                                                        <?php endif;?>
                                                    </td>
                                                <?php }?>

                                            </tr>
                                        <?php endforeach;?>
                                        <tr class="button">
                                            <td></td>
                                            <?php foreach ($packages_support_yearly as $item):?>
                                                <td><a href="<?php echo $item['url_button'];?>" class="btn btn-green-env"><?php echo $item['button_name'];?></a></td>
                                            <?php endforeach;?>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-center description-business d-lg-block d-none">
                                        <?php echo $compare_plans['description_plan'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <div class="row justify-content-center">
                                <div class="col-lg-3 box-plan-pricing d-lg-block d-none">
                                    <div class="plan">Plans</div>
                                    <div class="pricing">Pricing</div>
                                </div>
                                <?php $packages_support_monthly = get_field('packages_support_monthly');
                                foreach ($packages_support_monthly as $k => $item):
                                    ?>
                                    <div class="col-lg-3 col-md-8 col-12 d-flex">
                                        <div class="item-pricing d-flex <?php echo $k==1?'most-popular':'';?> flex-column justify-content-between">
                                            <div class="box-info">
                                                <?php if ($k==1){?>
                                                    <div class="label-most-popular">Most Popular</div>
                                                <?php }?>
                                                <h2>
                                                    <?php echo $item['name'];?>
                                                </h2>
                                                <img src="<?php echo $item['image'];?>" alt="<?php echo $item['name'];?>">
                                                <p>
                                                    <?php echo $item['description'];?>
                                                </p>
                                            </div>
                                            <div class="box-pricing">
                                                <div class="pricing"><?php echo $item['price'];?></div>
                                                <div class="per-site-month"><?php echo $item['per_price'];?></div>
                                                <div class="sale-off"><?php echo $item['discount'];?></div>
                                                <a href="<?php echo $item['url_button'];?>" class="btn btn-green-env"><?php echo $item['button_name'];?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>

                                <div class="col-lg-12 col-md-8 box-table-option d-lg-block d-none">
                                    <table class="table table-option-business">
                                        <thead>
                                        <tr>
                                            <th scope="col">Compare Plans</th>
                                            <th scope="col">High-Growth</th>
                                            <th scope="col">Main-Street</th>
                                            <th scope="col">Growing Business</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach ($compare_plans['list_services'] as $item):
                                        ?>
                                        <tr <?php echo $item['color']=='blue'?'class="blue"':'';?>>
                                            <?php if ($item['type']=='head'){?>
                                            <th><?php echo $item['name'];?></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }else{?>
                                                <td><?php echo $item['name'];?><span class="info"></span></td>
                                                <td>
                                                    <?php if ($item['check_point']=='point'):?>
                                                        <span class="circle"></span>
                                                    <?php elseif ($item['check_point']=='star'):?>
                                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0)">
                                                                <path d="M39.9649 15.4496C39.8804 15.1904 39.6563 15.0014 39.3864 14.962L26.4342 13.0797L20.6419 1.34325C20.5216 1.09838 20.2724 0.943726 20.0004 0.943726C19.7283 0.943726 19.4784 1.09838 19.3588 1.34325L13.5658 13.0804L0.613596 14.9627C0.343669 15.0021 0.120282 15.1904 0.0350794 15.4503C-0.048691 15.7088 0.0207597 15.9938 0.216224 16.1835L9.5892 25.3195L7.37609 38.2201C7.33026 38.4886 7.44053 38.76 7.66033 38.9203C7.88157 39.0822 8.17441 39.1029 8.41427 38.9748L20.0004 32.8846L31.585 38.9748C31.6895 39.0299 31.8048 39.0571 31.9187 39.0571C32.0669 39.0571 32.2144 39.0113 32.3397 38.9203C32.5602 38.76 32.6704 38.4886 32.6239 38.2201L30.4115 25.3202L39.7845 16.1835C39.9792 15.9923 40.0494 15.7081 39.9649 15.4496Z" fill="#0D3153"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0">
                                                                    <rect width="40" height="40" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    <?php elseif ($item['check_point']=='text'):?>
                                                        <?php echo $item['high'];?>
                                                    <?php else:?>
                                                        <?php echo '';?>
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <?php if ($item['check_point']=='point'):?>
                                                        <span class="circle"></span>
                                                    <?php elseif ($item['check_point']=='star'):?>
                                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0)">
                                                                <path d="M39.9649 15.4496C39.8804 15.1904 39.6563 15.0014 39.3864 14.962L26.4342 13.0797L20.6419 1.34325C20.5216 1.09838 20.2724 0.943726 20.0004 0.943726C19.7283 0.943726 19.4784 1.09838 19.3588 1.34325L13.5658 13.0804L0.613596 14.9627C0.343669 15.0021 0.120282 15.1904 0.0350794 15.4503C-0.048691 15.7088 0.0207597 15.9938 0.216224 16.1835L9.5892 25.3195L7.37609 38.2201C7.33026 38.4886 7.44053 38.76 7.66033 38.9203C7.88157 39.0822 8.17441 39.1029 8.41427 38.9748L20.0004 32.8846L31.585 38.9748C31.6895 39.0299 31.8048 39.0571 31.9187 39.0571C32.0669 39.0571 32.2144 39.0113 32.3397 38.9203C32.5602 38.76 32.6704 38.4886 32.6239 38.2201L30.4115 25.3202L39.7845 16.1835C39.9792 15.9923 40.0494 15.7081 39.9649 15.4496Z" fill="#0D3153"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0">
                                                                    <rect width="40" height="40" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    <?php elseif ($item['check_point']=='text'):?>
                                                        <?php echo $item['main'];?>
                                                    <?php else:?>
                                                        <?php echo '';?>
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <?php if ($item['check_point']=='point'):?>
                                                        <span class="circle"></span>
                                                    <?php elseif ($item['check_point']=='star'):?>
                                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0)">
                                                                <path d="M39.9649 15.4496C39.8804 15.1904 39.6563 15.0014 39.3864 14.962L26.4342 13.0797L20.6419 1.34325C20.5216 1.09838 20.2724 0.943726 20.0004 0.943726C19.7283 0.943726 19.4784 1.09838 19.3588 1.34325L13.5658 13.0804L0.613596 14.9627C0.343669 15.0021 0.120282 15.1904 0.0350794 15.4503C-0.048691 15.7088 0.0207597 15.9938 0.216224 16.1835L9.5892 25.3195L7.37609 38.2201C7.33026 38.4886 7.44053 38.76 7.66033 38.9203C7.88157 39.0822 8.17441 39.1029 8.41427 38.9748L20.0004 32.8846L31.585 38.9748C31.6895 39.0299 31.8048 39.0571 31.9187 39.0571C32.0669 39.0571 32.2144 39.0113 32.3397 38.9203C32.5602 38.76 32.6704 38.4886 32.6239 38.2201L30.4115 25.3202L39.7845 16.1835C39.9792 15.9923 40.0494 15.7081 39.9649 15.4496Z" fill="#0D3153"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0">
                                                                    <rect width="40" height="40" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    <?php elseif ($item['check_point']=='text'):?>
                                                        <?php echo $item['growing'];?>
                                                    <?php else:?>
                                                        <?php echo '';?>
                                                    <?php endif;?>
                                                </td>
                                            <?php }?>

                                        </tr>
                                        <?php endforeach;?>
                                        <tr class="button">
                                            <td></td>
                                            <?php foreach ($packages_support_monthly as $item):?>
                                            <td><a href="<?php echo $item['url_button'];?>" class="btn btn-green-env"><?php echo $item['button_name'];?></a></td>
                                            <?php endforeach;?>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-center description-business d-lg-block d-none">
                                        <?php echo $compare_plans['description_plan'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-gray-process section-faq">
            <div class="container">
                <?php $frequently_asked = get_field('frequently_asked');?>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-8">
                        <h2><?php echo $frequently_asked['title'];?></h2>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div id="accordion" class="box-question">
                            <?php foreach ($frequently_asked['list_question'] as $key => $item):?>
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#question<?php echo $key;?>" aria-expanded="false" aria-controls="question<?php echo $key;?>">
                                        <?php echo $item['question'];?>
                                    </h3>
                                </div>
                                <div id="question<?php echo $key;?>" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        <?php echo $item['answer'];?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "popup-spin-to-win.php";?>
</main>

<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/popper.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    })
</script>
<script src="//code.tidio.co/ljas59smx8hit2eissvid4hjv10sit8t.js"></script>
<?php get_footer();?>
