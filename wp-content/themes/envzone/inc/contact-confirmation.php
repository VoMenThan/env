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
                            <?php echo $post->post_content;?>

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
                                    <a class="nav-link link-twitter" target="_blank" rel="nofollow" href="https://twitter.com/Envzone">
                                        <i class="icon-twitter-green"></i>
                                    </a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link link-facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/envzone/">
                                        <i class="icon-facebook-green"></i>
                                    </a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link link-linkedin" target="_blank" rel="nofollow" href="https://www.linkedin.com/company/evnzone-inc.?trk=top_nav_home">
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