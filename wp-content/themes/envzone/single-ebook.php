<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */

get_header();
$link = get_field('link_share');
?>

<main class="main-content">

    <section class="artical-page lead-contact-form-page system-page resource-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 d-flex align-items-center">
                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <div class="box-get-ebook">
                        <div class="title-head-green">Get Your Free eBook!</div>
                        <h3>Free eBook - <?php echo $post->post_title;?></h3>

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

<script>
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {
            var link = <?php echo json_encode($link);?>;
            $("#gform_11 #input_11_12").val(link);

        });

    })(jQuery);
</script>

<?php
get_footer();
?>
