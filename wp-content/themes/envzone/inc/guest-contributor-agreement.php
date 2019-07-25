<?php
/* Template Name: EXT - Guest contributor agreement*/
get_header();
?>
<main class="main-content">
    <section class="artical-page contact-us-page quick-links-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-content">
                        <h1>
                            <?php echo get_the_title();?>
                        </h1>
                        <?php echo get_the_content();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();?>