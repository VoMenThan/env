<?php
/* Template Name: SYS - Request submission*/
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

                        <div class="box-thank">
                            <div class="notification">
                                <?php echo $post->post_content;
                                ?>
                            </div>

                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();?>