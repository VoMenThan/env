<?php
global $wp_query;
get_header();

$cat = $wp_query->query_vars['resources_cat'];
?>

<main class="main-content">
    <div class="filter-companies-page filter-resources">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-sort-industries">
                        <div class="title" data-toggle="collapse" data-target="#collapseFilterIndustries" aria-expanded="false" aria-controls="collapseExample">
                            SORT BY:
                            <span class="default-title"><?php echo $cat;?></span>
                            <div class="collapse list-sort-industries" id="collapseFilterIndustries">
                                <div class="wrap">
                                    <div class="item-resource">
                                        <a href="<?php echo home_url('resources');?>">
                                            All
                                        </a>
                                    </div>
                                    <div class="item-resource">
                                        <a href="<?php echo home_url('resources-category/ebooks');?>">
                                            eBook
                                        </a>
                                    </div>
                                    <div class="item-resource">
                                        <a href="<?php echo home_url('resources-category/tools');?>">
                                            Tools
                                        </a>
                                    </div>
                                    <div class="item-resource">
                                        <a href="<?php echo home_url('resources-category/software');?>">
                                            Software
                                        </a>
                                    </div>
                                    <div class="item-resource">
                                        <a href="<?php echo home_url('resources-category/guide');?>">
                                            Guide
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="arrow-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-detail-page resources-ebook-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-0 order-2">
                    <h3>
                        <?php
                        $ebook_resources = $wp_query->posts;

                        if (!$ebook_resources){
                            echo "No resource in this category";
                        }
                        ?></h3>
                </div>
                <div class="col-lg-8 order-lg-0 order-1">

                    <div class="row">

                        <?php
                        foreach($ebook_resources as $item):
                            ?>
                            <div class="col-md-6">
                                <article class="box-ebook">
                                    <img class="img-fluid cover-ebook" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                                    <a href="<?php echo get_permalink($item->ID);?>" class="mb-3 d-block">
                                        <h2>
                                            <?php echo $item->post_title;?>
                                        </h2>
                                    </a>

                                    <div class="box-category">
                                        <a href="#"><?php echo $cat;?></a>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="col-lg-4 order-lg-1 order-0">
                    <div class="box-login-memberpress">
                        <?php echo do_shortcode('[mepr-login-form use_redirect="false"]');?>
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
<?php get_footer(); ?>
