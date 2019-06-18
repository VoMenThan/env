<main class="main-content">

    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <span class="nav-link active">Buyer Guidelines</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_home_url();?>/customer-support">Support</a>
                </li>
            </ul>
        </div>
    </div>

    <section class="artical-page customer-support-page is-envzone-a-fit-page">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buyer Guidelines</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-customer-support">
                        <?php echo get_the_content();?>
                    </div>


                </div>
                <div class="col-lg-4 blog-page blog-detail-page">
                    <div class="box-free-ebook d-lg-block d-none">
                        <div class="title-free-book">
                            Free eBooks
                        </div>

                        <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'offset'=> 0,
                            'post_type' => 'resources',
                            'orderby' => 'post_modified',
                            'order' =>'desc',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'lead_magnet_mode',
                                    'value' => 'highlight',
                                    'compare' => 'LIKE',
                                )
                            )

                        );
                        $ebook_resources = get_posts( $args );
                        ?>
                        <div class="ebook-top">
                            <h4 class="title-ebook">
                                <?php echo $ebook_resources[0]->post_title;?>
                            </h4>
                            <div class="box-img">
                                <img class="img-fluild" src="<?php echo get_the_post_thumbnail_url($ebook_resources[0]->ID);?>" alt="">
                            </div>

                            <a href="<?php echo get_permalink($ebook_resources[0]->ID); ?>" class="btn btn-blue-env btn-download">DOWNLOAD</a>
                        </div>

                        <?php
                        foreach($ebook_resources as $k => $item):
                            if ($k == 0) continue;
                            ?>
                            <div class="ebook">
                                <div class="box-img">
                                    <img class="img-fluild" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                                </div>
                                <div class="info">
                                    <h4 class="title-ebook">
                                        <?php echo $item->post_title;?>
                                    </h4>
                                    <a href="<?php echo get_permalink($item->ID);?>" class="btn btn-blue-env">DOWNLOAD</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>


            </div>
        </div>

        <!-- /*============SUBCRIBE HOME=================*/ -->
        <div class="container-fluild section-parallax">
            <div class="bg-green-home">
                <div class="container content-subcribe">
                    <div class="row">
                        <div class="col-12 box-head-subcribe text-center">
                            <h2>Do we still sound like a fit?</h2>
                            <p>Not sure? Interested! Drop us a line and we’ll continue the conversation.</p>
                            <a class="btn btn-blue-env btn-search" href="<?php echo get_home_url();?>/contact-us">CONTACT FOR MORE INFO</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->
    </section>
</main>