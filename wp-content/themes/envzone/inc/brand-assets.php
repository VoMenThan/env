<?php
/* Template Name: QUICK - Brand Assets*/
get_header();
?>
<main class="main-content">
    <section class="artical-page contact-us-page quick-links-page">
        <div class="container">

            <div class="row justify-content-md-center">

                <div class="col-lg-8">
                    <div class="box-content">
                        <h1>
                            <?php echo get_the_title($post->ID);?>
                        </h1>

                        <?php echo get_the_content($post->ID);?>
                    </div>

                </div>
                <div class="col-lg-4 d-lg-block d-none">
                    <div class="box-contact-topic">
                        <div class="label-header">
                            Questions
                        </div>
                        <article>
                            <h4>Media Inquiries:</h4>
                            <a href="mailto:media@envzone.com">media@envzone.com</a>
                        </article>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
<?php get_footer();?>