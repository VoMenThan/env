<?php
/* Template Name: SYS - Donate confirmation*/
get_header();
?>
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
                            <p class="d-lg-block d-none">
                                Share with Friends:
                            </p>
                            <ul class="nav list-social-mb d-lg-flex d-none">
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
                        <div class="box-go-home">
                            <a class="back-home" href="<?php echo home_url();?>">
                                GO BACK TO HOMEPAGE
                            </a>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();?>