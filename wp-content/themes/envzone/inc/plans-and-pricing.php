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
                        <h2>Plans & pricing for your small business</h2>
                        <p>
                            Get the online presence management plan that’s right for you.
                        </p>
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
                                <div class="col-lg-3 col-md-8 col-12 d-flex">
                                    <div class="item-pricing d-flex flex-column justify-content-between">
                                        <div class="box-info">
                                            <h2>
                                                High-Growth
                                            </h2>
                                            <img src="<?php echo ASSET_URL;?>images/icon-high-growth-green.png" alt="">
                                            <p>
                                                If you're ready to reach new heights and enter new markets with your growing business, this is the right choice for you.
                                            </p>
                                        </div>
                                        <div class="box-pricing">
                                            <div class="pricing">$319</div>
                                            <div class="per-site-month">per site/month</div>
                                            <div class="sale-off">20% off $399 (billed yearly)</div>
                                            <a href="<?php echo home_url('initial-signup/?plan=high-growth&term=yearly')?>" class="btn btn-green-env">SIGN UP</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex col-md-8 col-12">
                                    <div class="item-pricing most-popular d-flex flex-column justify-content-between">
                                        <div class="box-info">
                                            <div class="label-most-popular">Most Popular</div>
                                            <h2>
                                                Main-Street
                                            </h2>
                                            <img src="<?php echo ASSET_URL;?>images/icon-main-street-green.png" alt="">
                                            <p>
                                                Made for the busy entrepreneur who prefers to have the option to update and tweak design or content as they add new services to their businesses.
                                            </p>
                                        </div>

                                        <div class="box-pricing">
                                            <div class="pricing">$239</div>
                                            <div class="per-site-month">per site/month</div>
                                            <div class="sale-off">20% off $299 (billed yearly)</div>
                                            <a href="<?php echo home_url('initial-signup/?plan=main-street&term=yearly')?>" class="btn btn-green-env">SIGN UP</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex col-md-8 col-12">
                                    <div class="item-pricing d-flex flex-column justify-content-between">
                                        <div class="box-info">
                                            <h2>
                                                Growing Business
                                            </h2>
                                            <img src="<?php echo ASSET_URL;?>images/icon-growing-business.png" alt="">
                                            <p>
                                                Perfect for a small business. You will have a safe, secure website that's updated and working correctly, giving you peace of mind.
                                            </p>
                                        </div>
                                        <div class="box-pricing">
                                            <div class="pricing">$159</div>
                                            <div class="per-site-month">per site/month</div>
                                            <div class="sale-off">20% off $199 (billed yearly)</div>
                                            <a href="<?php echo home_url('initial-signup/?plan=growing-business&term=yearly')?>" class="btn btn-green-env">SIGN UP</a>
                                        </div>

                                    </div>
                                </div>

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
                                        <tr class="blue">
                                            <th>Core Services</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                A dedicated online presence manager
                                                <span class="info"></span>

                                            </td>
                                            <td>
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
                                            </td>
                                            <td>
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
                                            </td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Unlimited on-call strategic consulting
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Unlimited improvement advice
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Initial performance audit
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Support ticket per month
                                                <span class="info"></span>

                                            </td>
                                            <td>8</td>
                                            <td>6</td>
                                            <td>4</td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Custom design & development hour (does not rollover)
                                                <span class="info"></span>

                                            </td>
                                            <td>6</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                20% off hourly rate services
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Intergrated digital marketing recommendation
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>

                                        <tr>
                                            <th>Monitoring and Reporting</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Industry performance benchmark
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Monthly SEO performace tracking
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Best practice SEO setup
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Site health checks
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Monthly analytic report
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>

                                        <tr>
                                            <th>
                                                Digital Asset Management
                                            </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Dedicated business cloud account for asset storage-5TB
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Dedicated SharePoint account for  asset management
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>

                                        <tr>
                                            <th>
                                                Hosting & Security Controls
                                            </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Secure hosting with latest speed technonolgy*
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Security updates
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Weekly manual database backups
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                SSL setup and renewal
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Theme and plugin updates
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Core platform updates
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Data migrations
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Version control with Github
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <th>
                                                The All-In-One Online Presence Support Portal
                                            </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Ticket response
                                                <span class="info"></span>
                                            </td>
                                            <td>Priority</td>
                                            <td>Expedite</td>
                                            <td>Basic  </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Ticket submission portal
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Online documentation
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Coworker collaboration
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Secure payment gateway
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Secure message
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                File exchange
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Live help chat
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="button">
                                            <td></td>
                                            <td><a href="<?php echo home_url('initial-signup/?plan=high-growth&term=yearly')?>" class="btn btn-green-env">SIGN UP</a></td>
                                            <td><a href="<?php echo home_url('initial-signup/?plan=main-street&term=yearly')?>" class="btn btn-green-env">SIGN UP</a></td>
                                            <td><a href="<?php echo home_url('initial-signup/?plan=growing-business&term=yearly')?>" class="btn btn-green-env">SIGN UP</a></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-center description-business">
                                        For large organizations, enterprises, tech startups, please contact us <a href="<?php echo home_url('contact-us')?>">here</a> with custom outsourcing solutions
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
                                <div class="col-lg-3 col-md-8 d-flex">
                                    <div class="item-pricing d-flex flex-column justify-content-between">
                                        <div class="box-info">
                                            <h2>
                                                High-Growth
                                            </h2>
                                            <img src="<?php echo ASSET_URL;?>images/icon-high-growth-green.png" alt="">
                                            <p>
                                                If you're ready to reach new heights and enter new markets with your growing business, this is the right choice for you.
                                            </p>
                                        </div>
                                        <div class="box-pricing">
                                            <div class="pricing">$399</div>
                                            <div class="per-site-month">per site/month</div>
                                            <a href="<?php echo home_url('initial-signup/?plan=high-growth&term=monthly')?>" class="btn btn-green-env">SIGN UP</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 d-flex">
                                    <div class="item-pricing most-popular d-flex flex-column justify-content-between">
                                        <div class="box-info">
                                            <div class="label-most-popular">Most Popular</div>
                                            <h2>
                                                Main-Street
                                            </h2>
                                            <img src="<?php echo ASSET_URL;?>images/icon-main-street-green.png" alt="">
                                            <p>
                                                Made for the busy entrepreneur who prefers to have the option to update and tweak design or content as they add new services to their businesses.
                                            </p>
                                        </div>

                                        <div class="box-pricing">
                                            <div class="pricing">$299</div>
                                            <div class="per-site-month">per site/month</div>
                                            <a href="<?php echo home_url('initial-signup/?plan=main-street&term=monthly')?>" class="btn btn-green-env">SIGN UP</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 d-flex">
                                    <div class="item-pricing d-flex flex-column justify-content-between">
                                        <div class="box-info">
                                            <h2>
                                                Growing Business
                                            </h2>
                                            <img src="<?php echo ASSET_URL;?>images/icon-growing-business.png" alt="">
                                            <p>
                                                Perfect for a small business. You will have a safe, secure website that's updated and working correctly, giving you peace of mind.
                                            </p>
                                        </div>
                                        <div class="box-pricing">
                                            <div class="pricing">$199</div>
                                            <div class="per-site-month">per site/month</div>
                                            <a href="<?php echo home_url('initial-signup/?plan=growing-business&term=monthly')?>" class="btn btn-green-env">SIGN UP</a>
                                        </div>
                                    </div>
                                </div>

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
                                        <tr class="blue">
                                            <th>Core Services</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                A dedicated online presence manager
                                                <span class="info"></span>

                                            </td>
                                            <td>
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
                                            </td>
                                            <td>
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
                                            </td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Unlimited on-call strategic consulting
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Unlimited improvement advice
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Initial performance audit
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Support ticket per month
                                                <span class="info"></span>

                                            </td>
                                            <td>8</td>
                                            <td>6</td>
                                            <td>4</td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Custom design & development hour (does not rollover)
                                                <span class="info"></span>

                                            </td>
                                            <td>6</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                20% off hourly rate services
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="blue">
                                            <td>
                                                Intergrated digital marketing recommendation
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>

                                        <tr>
                                            <th>Monitoring and Reporting</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Industry performance benchmark
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Monthly SEO performace tracking
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Best practice SEO setup
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Site health checks
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Monthly analytic report
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>

                                        <tr>
                                            <th>
                                                Digital Asset Management
                                            </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Dedicated business cloud account for asset storage-5TB
                                                <span class="info"></span>

                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Dedicated SharePoint account for  asset management
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>

                                        <tr>
                                            <th>
                                                Hosting & Security Controls
                                            </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Secure hosting with latest speed technonolgy*
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Security updates
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Weekly manual database backups
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                SSL setup and renewal
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Theme and plugin updates
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Core platform updates
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Data migrations
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Version control with Github
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <th>
                                                The All-In-One Online Presence Support Portal
                                            </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Ticket response
                                                <span class="info"></span>
                                            </td>
                                            <td>Priority</td>
                                            <td>Expedite</td>
                                            <td>Basic  </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Ticket submission portal
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Online documentation
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Coworker collaboration
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Secure payment gateway
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Secure message
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                File exchange
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Live help chat
                                                <span class="info"></span>
                                            </td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                            <td><span class="circle"></span></td>
                                        </tr>
                                        <tr class="button">
                                            <td></td>
                                            <td><a href="<?php echo home_url('initial-signup/?plan=high-growth&term=monthly')?>" class="btn btn-green-env">SIGN UP</a></td>
                                            <td><a href="<?php echo home_url('initial-signup/?plan=main-street&term=monthly')?>" class="btn btn-green-env">SIGN UP</a></td>
                                            <td><a href="<?php echo home_url('initial-signup/?plan=growing-business&term=monthly')?>" class="btn btn-green-env">SIGN UP</a></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-center description-business d-lg-block d-none">
                                        For large organizations, enterprises, tech startups, please contact us <a href="<?php echo home_url('contact-us')?>">here</a> with custom outsourcing solutions
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
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-8">
                        <h2>Frequently asked questions</h2>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div id="accordion" class="box-question">
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#questionOne" aria-expanded="false" aria-controls="questionOne">
                                        How does the billing work?
                                    </h3>
                                </div>
                                <div id="questionOne" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        We sell monthly subscriptions. EnvZone bills annual contracts immediately/on the day of signing and monthly contracts on the anniversary of the signing date. That time is yours to use now or save for later. Each plan comes with a bank of pre-paid support ticket and custom hour work. This resource will be subtracted from your account until you approve EnvZone to work on your site. As members of our staff work on your request, we subtract time away from this balance by 15-min increment. You may upgrade, downgrade, or cancel your subscription at any time. And if you're not happy at all in your first 30 days, please let us know and we'll refund your money.
                                    </div>
                                </div>
                            </div>
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#questionTwo" aria-expanded="false" aria-controls="questionTwo">
                                        What payment method can I use from the account dashboard?
                                    </h3>
                                </div>
                                <div id="questionTwo" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        When you receive an activation email from our portal for your business, you will be able to pay for subscription with a variety of payment methods including: Paypal, Venmo, Visa, Mastercard, Discover, American Express, Apple Pay, Google Pay, ACH.
                                    </div>
                                </div>
                            </div>
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#questionThree" aria-expanded="false" aria-controls="questionThree">
                                        What happens after I sign up? How do I get support?
                                    </h3>
                                </div>
                                <div id="questionThree" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        When you sign up your credit card is charged for the first month's support time you purchased and you receive access to your Envzone Account Dashboard. You can immediately submit your support requests via a form on your Account Dashboard, email us directly support@envzone.com, or call us at 720-606-2900. If you email or use the form, a member of the team will typically reply with an hour during business hours.
                                    </div>
                                </div>
                            </div>
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#questionFour" aria-expanded="false" aria-controls="questionFour">
                                        How do I cancel? What is your refund policy?
                                    </h3>
                                </div>
                                <div id="questionFour" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        Email info@envzone.com or call 720-606-2900 at any time to cancel. For refunds, if you are not completely satisfied with the service you receive in your first 30 days as a customer, please let us know and we will refund your complete purchase. Past 30 days, we do not refund previously purchased hours. That time remain yours to use as long as you have an active subscription.
                                    </div>
                                </div>
                            </div>
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#questionFive" aria-expanded="false" aria-controls="questionFive">
                                        Which plan is right for me?
                                    </h3>
                                </div>
                                <div id="questionFive" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        It depends with the level of support you need. We offer flexible pricing to accommodate most situations. Do you have one or two changes a month, plus regular upkeep? Growing-business is likely a good fit. Running a store or have weekly updates? Main-street plan is typical. Ready to make significant changes? Give us a call and we'll help scope it out. We also have
                                        <a href="https://www.envzone.com/help/support-tasks-catalog/">a list of 130+ common tasks</a> we do along with time estimates for each.
                                    </div>
                                </div>
                            </div>
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#questionSix" aria-expanded="false" aria-controls="questionSix">
                                        Do you work with agencies, or handle more than one website per customer?
                                    </h3>
                                </div>
                                <div id="questionSix" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        Yes and yes! Contact us to learn more about how we can accommodate multiple approved requesters, separate client budgets, and useful tools we provide to give your clients a full-service experience.
                                    </div>
                                </div>
                            </div>
                            <div class="item-question">
                                <div class="question">
                                    <h3 class="mb-0" data-toggle="collapse" data-target="#questionSeven" aria-expanded="false" aria-controls="questionSeven">
                                        What happens if something breaks during a change?
                                    </h3>
                                </div>
                                <div id="questionSeven" class="collapse" data-parent="#accordion">
                                    <div class="box-answer">
                                        We immediately roll-back to the backup we created right before the change, then diagnose what went wrong. To avoid this issue, we test most changes on a staging copy of your site hidden from the public prior to doing them on your live website.
                                    </div>
                                </div>
                            </div>

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
<?php get_footer();?>
