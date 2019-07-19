<?php
/* Template Name: DIS - Resources*/
get_header();
global $wp_query;
?>

<main class="main-content">
    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center breadcrumb-ebook">
                <li class="nav-item">
                    <span class="nav-link active">All Resources</span>
                </li>


                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'resources_cat',
                    'hide_empty' => false,
                    'orderby' => 'id',
                    'order' => 'asc',
                    'parent' => 0
                ));
                foreach ($terms as $item):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo home_url('resources-category/').$item->slug;?>"><?php echo $item->name;?></a>
                    </li>
                <?php endforeach;?>

            </ul>
        </div>
    </div>
    <section class="artical-page blog-detail-page resources-ebook-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="title-head-blue have-border">ALL COLLECTIONS</h3>
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <?php
                        $args = array(
                            'posts_per_page' => 6,
                            'offset'=> 0,
                            'post_type' => 'resources',
                            'orderby' => 'ID',
                            'order' =>'desc'
                        );
                        $ebook_resources = get_posts( $args );

                        foreach($ebook_resources as $item):
                            ?>
                            <div class="col-md-6">
                                <article class="box-ebook">
                                    <img class="img-fluid cover-ebook" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                                    <h2>
                                        <?php echo $item->post_title;?>
                                    </h2>
                                    <a href="<?php echo get_permalink($item->ID);?>" class="btn-download-ebook btn btn-blue-env">DOWNLOAD</a>
                                    <div class="box-category">
                                        <a href="<?php echo wp_get_post_terms( $item->ID, 'resources_cat')[0]->slug;?>"><?php echo wp_get_post_terms( $item->ID, 'resources_cat')[0]->name?></a>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="box-subscriber-blog">
                        <div class="box-border">
                            <div class="title-sub">
                                Join Over 5,000 of Your Industry Peers in Colorado Who Receive Software Outsourcing Insights and Updates.
                            </div>
                            <div class="form-subscribe">
                                <?php
                                echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- /*============SUBCRIBE HOME=================*/ -->
    <div class="container-fluild section-parallax">
        <div class="bg-green-home">
            <div class="container content-subcribe">
                <div class="row">
                    <div class="col-12 box-head-subcribe text-center">
                        <h2>SUBSCRIBE FOR THREE THINGS</h2>
                        <p>
                            Three links or tips of interest curated about offshore outsourcing every week by the experts at ENVZONE Consulting.
                        </p>
                        <!--<form action="" method="get">
                            <input type="text" class="input-search d-block" placeholder="Enter your email adress">
                            <input type="submit" hidden>
                            <a class="btn btn-blue-env btn-search" href="#">SIGN ME UP FOR THREE THINGS</a>
                        </form>-->

                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /*============END SUBCRIBE HOME=================*/ -->
</main>
<script>
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {

            $(".form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');

            $('.box-ebook h2').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });

    })(jQuery);
</script>
<?php get_footer();?>
