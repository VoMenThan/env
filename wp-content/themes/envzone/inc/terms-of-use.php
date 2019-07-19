<?php
/* Template Name: LEGALS - Terms of use*/
get_header();
?>
<main class="main-content">
    <section class="banner-top bg-blue">
        <h2><?php echo $post->post_title;?></h2>
    </section>
    <section class="artical-page legals-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">

                    <div class="content-legals">
                        <?php echo $post->post_content;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /*============SUBCRIBE HOME=================*/ -->
    <div class="container-fluild">
        <div class="bg-green-subscribe">
            <div class="container content-subcribe">
                <div class="row">
                    <div class="col-12 box-success-plan text-center">
                        <h2>NEED HELP GETTING YOUR SOFTWARE PROJECT GOING? </h2>
                        <p>
                            Offshore outsourcing is a solution. WE BELIEVE... <br>
                            <span class="highlight-blue">Ousourcing Authority Saves Companies</span> <br>
                            A FREE outsourcing succession plan would put you back on track
                        </p>
                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=10 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /*============END SUBCRIBE HOME=================*/ -->
</main>
<?php get_footer();?>