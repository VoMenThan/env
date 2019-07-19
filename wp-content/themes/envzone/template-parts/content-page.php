<main class="main-content">
    <section class="banner-top banner-company bg-blue">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>">
        <h1><?php echo get_the_title();?></h1>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="artical-page about-us-page">

        <div class="container section-represent">
            <div class="row">
                <div class="col-lg-12">

                    <div class="entry-content">
                        <?php
                            the_content();
                        ?>
                    </div><!-- .entry-content -->
                </div>

            </div>
        </div>

    </section>
</main>