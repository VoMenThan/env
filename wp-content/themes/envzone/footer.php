<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row mb-lg-5 py-3">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12">
                <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-envzone-gray.png" alt="">
                <p class="description-logo">
                    Understand your idea. <br>
                    Execute it with our resources.
                </p>
                <div class="box-info-footer">
                    <div class="label-company">Request for Inquiries:</div>
                    <a class="email-envzone" href="mailto:info@envzone.com">info@envzone.com</a> <br>
                    <a href="tel:+017206062900" class="phone-envzone">Office: 720-606-2900</a>
                    <address>1801 California St., Suite 2400 <br>
                        Denver, CO 80202
                        <a href="https://goo.gl/maps/V7KQJrDY94t" target="_blank" class="icon-direction-footer">
                            <svg width="25" height="25" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.197 6.54585L4.31655 14.7518C4.11705 14.8438 4.00055 15.0543 4.02955 15.2723C4.05855 15.4903 4.22605 15.6633 4.44255 15.6993L12.359 17.0258L13.2635 24.5008C13.2905 24.7198 13.458 24.8963 13.6755 24.9333C13.704 24.9383 13.732 24.9408 13.76 24.9408C13.9475 24.9408 14.123 24.8353 14.208 24.6628L22.8535 7.22185C22.9475 7.03185 22.912 6.80335 22.7645 6.65135C22.617 6.49935 22.388 6.45735 22.197 6.54585ZM14.055 22.7193L13.307 16.5348C13.28 16.3148 13.1115 16.1383 12.893 16.1018L6.21205 14.9823L21.33 8.04385L14.055 22.7193Z" fill="#BDBDBD"/>
                                <path d="M15 0C6.729 0 0 6.729 0 15C0 23.271 6.729 30 15 30C23.271 30 30 23.271 30 15C30 6.729 23.271 0 15 0ZM15 29C7.2805 29 1 22.7195 1 15C1 7.2805 7.2805 1 15 1C22.7195 1 29 7.2805 29 15C29 22.7195 22.7195 29 15 29Z" fill="#BDBDBD"/>
                            </svg>
                        </a>
                    </address>
                    <p>
                        BASED IN COLORADO, SERVING THE ENTIRE USA
                    </p>

                    <ul class="nav list-social">
                        <li class="nav-item label-socials px-1">
                            Follow us:
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link link-twitter" target="_blank" href="https://twitter.com/Envzone"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link link-facebook" target="_blank" href="https://www.facebook.com/envzone/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link link-linkedin" target="_blank" href="https://www.linkedin.com/company/evnzone-inc.?trk=top_nav_home"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-xl-8 col-lg-7 start-project">
                <div class="label-form-project text-center">
                    START A PROJECT
                </div>
                <div class="form-start-project">
                    <?php
                    echo do_shortcode('[gravityform id=2 title=false description=false ajax=false]');
                    ?>
                </div>

            </div>
        </div>
        <div class="row mb-5 menu-footer">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="box-info-footer">
                    <h5 class="label-menu-footer">Company</h5>
                    <ul class="list-menu-footer">
                        <li><a href="<?php echo get_home_url();?>/about-us">About us</a></li>
                        <li><a href="<?php echo get_home_url();?>/process-framework">Process Framework</a></li>
                        <li><a href="<?php echo get_home_url();?>/client-focused-solutions">Client-Focused Solutions</a></li>
                        <li><a href="<?php echo get_home_url();?>/partnership">Partnership</a></li>
                        <li><a href="<?php echo get_home_url();?>/contact-us">Contact us</a></li>
                        <li><a href="<?php echo get_home_url();?>/careers">Careers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="box-info-footer">
                    <h5 class="label-menu-footer">Industries</h5>
                    <ul class="list-menu-footer">
                        <li><a href="<?php echo get_home_url();?>/healthcare">Healthcare</a></li>
                        <li><a href="<?php echo get_home_url();?>/ecommerce-and-retail">E-Commerce & Retail</a></li>
                        <li><a href="<?php echo get_home_url();?>/financial-services">Financial Services</a></li>
                        <li><a href="<?php echo get_home_url();?>/real-estate-property">Real Estate & Property</a></li>
                        <li><a href="<?php echo get_home_url();?>/hospitality-and-travel">Hospitality & Travel</a></li>
                        <li><a href="<?php echo get_home_url();?>/education">Education</a></li>
                        <li><a href="<?php echo get_home_url();?>/logistics-and-supply-chain">Logistics & Supply Chain</a></li>
                        <li><a href="<?php echo get_home_url();?>/ngos">NGOs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="box-info-footer">
                    <h5 class="label-menu-footer">Services</h5>
                    <ul class="list-menu-footer">
                        <li><a href="<?php echo get_home_url();?>/full-cycle-development">Full Cycle Development</a></li>
                        <li><a href="<?php echo get_home_url();?>/it-outsourcing">IT Outsourcing</a></li>
                        <li><a href="<?php echo get_home_url();?>/testing">Testing</a></li>
                        <li><a href="<?php echo get_home_url();?>/devops">DevOps</a></li>
                        <li><a href="<?php echo get_home_url();?>/customer-support">Customer Support</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="box-info-footer">
                    <h5 class="label-menu-footer">Discovery</h5>
                    <ul class="list-menu-footer">
                        <li><a href="<?php echo get_home_url();?>/blog">Blog</a></li>
                        <li><a href="<?php echo get_home_url();?>/events">Events</a></li>
                        <li><a href="<?php echo get_home_url();?>/knowledge-center">Knowledge Center</a></li>
                        <li><a href="<?php echo get_home_url();?>/studio">EnvZone Studio</a></li>
                        <li><a href="<?php echo get_home_url();?>/resources">Resources</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid social-mobile">
        <div class="row">
            <div class="col-12">
                <ul class="nav list-social-mb d-flex justify-content-between">
                    <li class="nav-item px-1 py-3">
                        <a class="nav-link link-twitter" target="_blank" href="https://twitter.com/Envzone">
                            <i class="icon-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item px-1 py-3">
                        <a class="nav-link link-facebook" target="_blank" href="https://www.facebook.com/envzone/">
                            <i class="icon-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item px-1 py-3">
                        <a class="nav-link link-linkedin" target="_blank" href="https://www.linkedin.com/company/evnzone-inc.?trk=top_nav_home">
                            <i class="icon-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid check-avaibility-mb-footer">
        <div class="row">
            <div class="col-12 text-center py-4">
                <div class="title-check-vaibility-mb">
                    SCHEDULE AN APPOINTMENT
                </div>
                <a href="#" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;" class="btn btn-blue-env">CHECK AVAIBILITY <i class="icon-arrow-bottom"></i></a>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-blue-footer">
        <div class="row address-footer-mb">
            <div class="col-6 box-info">
                <div class="address">1801 California St., Suite 2400 <br>
                    Denver, CO 80202 <br>
                    M-F | 8:30 am - 5:30 pm MST
                </div>
                <p>
                    Main: <a href="tel:+017206062900">720-606-2900</a> <br>
                    Email: <a class="email-envzone" href="mailto:info@envzone.com">info@envzone.com</a>
                </p>
            </div>
            <div class="col-6 box-direction d-flex justify-content-center align-items-center">
                <div class="box-icon-direction text-center">
                    <a href="https://goo.gl/maps/V7KQJrDY94t" target="_blank" class="direction">
                        <i class="icon-location"></i>
                    </a>
                    <a href="tel:7206602900" class="phone-number">
                        <i class="icon-mobile-phone"></i>
                    </a>
                </div>

            </div>
        </div>

        <div class="container section-donate">

            <div class="row box-donate">
                <div class="col-lg-2">
                    <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-society-same.png">
                </div>
                <div class="col-lg-8 col-12">
                    <div class="description-same">
                        We were delighted to have been given the opportunity to sponsor the Society of American Military Engineers Denver Post. For the promotion of this Non-Profit Organization’s dedication to National Security, a small immediate donation from you or your organization would help us to continue our journey to show the appreciation to this great organization.
                    </div>

                </div>
                <div class="col-lg-2 d-flex align-items-end">
                    <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KW8D2MCJD7PVC&source=url" class="btn-donate btn btn-gray-env">DONATE NOW</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 d-none-768 box-certified">
                    <p>Certified Business Credentials</p>
                    <div class="d-flex justify-content-around">
                    <a href="https://www.dandb.com/verified/business/113367122/" target="_blank">
                        <img style="height: 65px" class="img-verified img-fluid" src="<?php echo ASSET_URL;?>images/img-verified.png" alt="Verify Business">
                    </a>
                    <script language="JavaScript" type="text/javascript"> SiteSeal("https://seal.networksolutions.com/images/confirmrecgreen.gif", "NETSS", "none");</script>
                    </div>
                </div>
                <div class="col-lg-8 pt-3">
                    <div class="box-policy text-center d-none-768">
                        <a href="<?php echo get_home_url();?>/accessibility">Accessibility</a>
                        <a href="<?php echo get_home_url();?>/terms-of-use">Terms of Use</a>
                        <a href="<?php echo get_home_url();?>/privacy-policy">Privacy Policy</a>
                        <a href="<?php echo get_home_url();?>/help">Help</a>
                        <a href="<?php echo get_home_url();?>/sitemap">Site Map</a>
                    </div>
                    <div class="box-policy text-center d-none-768">
                        <a href="<?php echo home_url('employee-portal');?>">Employee Portal</a>
                        <a href="<?php echo get_home_url();?>/affiliate-program">Affiliate Program</a>
                        <a href="<?php echo home_url('vendor-portal');?>">Vendor Portal</a>
                    </div>

                    <div class="box-term-policy-mb">
                        <p class="text-center"><a href="#">Full Site</a></p>
                        <p class="text-center box-term-policy">
                            <a class="px-3" href="<?php echo get_home_url();?>/terms-of-use">Terms of Use</a>
                            <a class="px-3" href="<?php echo get_home_url();?>/privacy-policy">Privacy Policy</a>
                        </p>
                    </div>

                    <p class="text-lg-left text-center copyright-footer">Copyright © 2016 EnvZone LLC. <span class="all-rights">All rights reserved.</span></p>
                </div>
            </div>
        </div>
    </div>
</footer>




<?php wp_footer();?>

<script type="text/javascript">

    (function($) {
        $(window).on("load", function() {
            $(".content-scroll").mCustomScrollbar({ theme: "3d" });
        });

        /*$( window ).load(function() {
            /!*  [ Page loader ]
            - - - - - - - - - - - - - - - - - - - - *!/
            $( 'body' ).addClass( 'loaded' );
            setTimeout(function () {
                $('#pageloader').fadeOut();
            }, 100);
        });*/
    })(jQuery);

    /*============ end custom scroll =================*/


    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var div_top_menu = $('#sticky-menu-anchor').offset().top;

        if (window_top >= div_top_menu) {
            $('#sticky-menu').addClass('stick');
        }
        else if(window_top < (div_top_menu + 120)){
            $('#sticky-menu').removeClass('stick');
        }
    };

    function toggle_obj(btn_click, box_toggle) {

        $(btn_click).click(function () {

            $(box_toggle).toggleClass("show-obj");
            $(btn_click).toggleClass("active");

            if (btn_click == ".btn-toggle-menu"){
                $("body").toggleClass("overflow-hidden");
                $(".btn-toggle-search").toggleClass("d-none");

            }

        });
    }

    function get_attr(){
        $(".item-menu").click(function () {
            var val = $(this).text();
            $(".logo-envzone-mobile").addClass("d-hidden");
            $("nav .title-category").addClass("active").text(val);
            $("nav .btn-hide-submenu").addClass("active");
        });
    }

    function select_next_element(){
        $(".nav-link").click(function () {
            $(this).next().addClass("show-submenu");
        });

        $(".btn-hide-submenu").click(function () {
            $(".sub-menu").removeClass("show-submenu");
            $(".logo-envzone-mobile").removeClass("d-hidden");
            $("nav .title-category").removeClass("active");
            $("nav .btn-hide-submenu").removeClass("active");
        });

        //CLOSE MENU MOBILE

        $(".close-menu-mb").click(function () {
            $(".sub-menu").removeClass("show-submenu");
            $(".logo-envzone-mobile").removeClass("d-hidden");
            $("nav .title-category").removeClass("active");
            $("nav .btn-hide-submenu").removeClass("active");
        });

    }

    function changeTextBtnHead() {
        $(".sub-menu-company #gform_submit_button_1").val('SEND MY GREETINGS');
        $(".sub-menu-discovery #gform_submit_button_3").val('KEEP ME UPDATED');
        $("header .box-check-avaibility #gform_submit_button_3").val('SUBSCRIBE NOW');
    }

    $(function () {
        toggle_obj(".btn-toggle-search", "#detailBoxSearch");
        toggle_obj(".btn-search-pc", "#detailBoxSearch");
        get_attr();
        select_next_element();
        changeTextBtnHead();
    });

    $(function () {

        $(".btn-toggle-menu").click(function (e) {

            $("#menuBarMobile").toggleClass("show-obj");
            $(".btn-toggle-menu").toggleClass("active");

            $("body").toggleClass("overflow-hidden");
            $("html").toggleClass("overflow-hidden");
            $(".btn-toggle-search").toggleClass("d-none");

            e.preventDefault();

        });
    });

    $(document).ready(function(){
        $('input[id="input_2_7"]').change(function(e){
            var fileName = e.target.files[0].name;
            $("#field_2_7 label").html(fileName);
        });
    });


</script>
<!-- Global site tag (gtag.js) - Google Analytics -->

<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88982528-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-88982528-1');
</script>


<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<amp-analytics type="gtag" data-credentials="include">
    <script type="application/json">
        {
            "vars" : {
                "gtag_id": "<UA-88982528-1>",
                "config" : {
                    "<UA-88982528-1>": { "groups": "default" }
                }
            }
        }
    </script>
</amp-analytics>-->

</body>
</html>