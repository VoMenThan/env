<?php
global $wp_query;
get_header();
?>

<main class="main-content">

    <section class="artical-page lead-contact-form-page system-page resource-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 d-flex align-items-center">
                    <img src="<?php echo ASSET_URL;?>images/big-cover-ebook-all-in-one.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <div class="box-get-ebook">
                        <div class="title-head-green">Get Your Free eBook!</div>
                        <h3>Free eBook - 3 Quick Tips to Have a Successful Outsourcing Experience</h3>

                        <div class="box-form-get-ebook form-horizontal">
                            <?php
                            echo do_shortcode('[gravityform id=11 title=false description=false ajax=false]');
                            ?>
                            <p>By downloading this e-book, you agree to receive communication from EnvZone.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</main>

<?php get_footer(); ?>
