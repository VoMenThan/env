<main class="main-content">
    <section class="artical-page system-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    <article class="thank-you">
                        <h3>
                            CONFIRMATION
                        </h3>

                        <div class="box-thank meantime">
                            <div class="notification">
                                <img src="<?php echo ASSET_URL;?>images/icon-verified.png" alt="">
                                <p>
                                    THANK YOU!
                                </p>
                            </div>
                            <p>
                                Thank you for contacting ENVZONE! We’ll respond to your request shortly!
                                One more step. Let’s schedule an appointment at your convenience.
                            </p>
                            <!--<a href="#" class="btn btn-check-availibity">
                                CHECK AVAIBILITY
                            </a>-->
                            <!-- Calendly link widget begin -->
                            <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                            <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
                            <a href="" class="btn btn-check-availibity"" onclick="Calendly.showPopupWidget('https://calendly.com/envzone/discovery-session');return false;">
                                CHECK AVAIBILITY
                            </a>
                            <!-- Calendly link widget end -->

                            <h4>
                                In the meantime, get our best advice, every week.
                            </h4>
                            <p>
                                Every week, we send out our best advice from the EnvZone Blog in our newsletter. Got 5 mins to improve your skills every week? Subscribe below.
                            </p>

                            <!--<div class="box-subscribe d-flex justify-content-between">
                                <input type="text" placeholder="Your email address">
                                <a href="#" class="btn btn-green-env">
                                    SUBSCRIBE NOW
                                </a>
                            </div>-->
                            <div class="form-subscribe">
                                <?php
                                echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                                ?>
                            </div>
                            <p>
                                Or connect with us on:
                            </p>
                            <ul class="nav list-social-mb">
                                <li class="nav-item px-1">
                                    <a class="nav-link link-twitter" href="https://twitter.com/Envzone">
                                        <i class="icon-twitter-green"></i>
                                    </a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link link-facebook" href="https://www.facebook.com/envzone/">
                                        <i class="icon-facebook-green"></i>
                                    </a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link link-linkedin"  href="https://www.linkedin.com/company/evnzone-inc.?trk=top_nav_home">
                                        <i class="icon-linkedin-green"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>
</main>

<script>
    $(".box-thank #gform_submit_button_3").val('SUBSCRIBE NOW');
</script>