<?php
global $wp_query;
get_header();

$cat = $wp_query->query_vars['resources_cat'];
?>

<main class="main-content">
    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center breadcrumb-ebook">
                <li class="nav-item">
                    <span class="nav-link active"><?php echo $cat;?></span>
                </li>
            </ul>
        </div>
    </div>
    <section class="artical-page resources-ebook-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="title-head-blue have-border">COLLECTIONS: <?php echo $cat;?></h3>
                        </div>

                        <?php
                        $ebook_resources = $wp_query->posts;

                        foreach($ebook_resources as $item):
                            ?>
                            <div class="col-lg-6">
                                <article class="box-ebook">
                                    <img class="img-fluid cover-ebook" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                                    <h2>
                                        <?php echo $item->post_title;?>
                                    </h2>
                                    <a href="<?php echo get_permalink($item->ID);?>" class="btn-download-ebook btn btn-blue-env">DOWNLOAD</a>
                                    <div class="box-category">
                                        <a href="#"><?php echo $cat;?></a>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach;?>
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

            $('.box-ebook h2').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });

    })(jQuery);
</script>
<?php get_footer(); ?>
