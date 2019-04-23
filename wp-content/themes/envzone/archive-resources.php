<?php
global $wp_query;
get_header();
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
                        <div class="col-lg-6">
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

                <div class="col-lg-4">
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
