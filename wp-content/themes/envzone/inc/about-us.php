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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-introduct">
                        <h2 class="title-head-blue"><?php echo get_field('title_business_oriented', $post->ID);?></h2>

                        <?php echo get_field('description_business_oriented', $post->ID);?>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-two-col-full">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-head-blue"><?php echo get_field('title_what_makes_us_different', $post->ID);?></h2>
                    </div>
                    <div class="col-lg-6 description-different">

                        <p>
                            <?php echo get_field('description_makes_us_different', $post->ID);?>
                        </p>
                    </div>
                    <div class="col-lg-6 box-list-different">
                        <ul class="list-different">

                            <?php $list_makes_us_different = get_field('list_makes_us_different', $post->ID);
                            foreach ($list_makes_us_different as $item):
                                ?>
                                <li class="d-flex align-items-center"><?php echo $item['item'];?></li>
                            <?php endforeach;?>
                        </ul>
                        <div class="text-right">
                            <a href="<?php echo get_field('url_learn_more', $post->ID);?>" class="btn btn-white-env mt-3">
                                <?php echo get_field('button_name_learn_more', $post->ID);?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row py-5 box-what-we-see justify-content-center mb-4">
                <div class="col-12">
                    <h2 class="title-head-blue"><?php echo get_field('title_we_do_it', $post->ID);?></h2>
                </div>


                <?php $list_do_it = get_field('list_do_it', $post->ID);
                foreach ($list_do_it as $item):
                    ?>
                    <div class="col-lg-6 col-md-8 mb-lg-0 mb-md-5">
                        <div class="box-blue">
                            <h3><?php echo $item['title'];?></h3>
                            <?php echo $item['description'];?>
                        </div>
                    </div>
                <?php endforeach;?>

            </div>
        </div>

        <div class="box-why-business">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-lg-center text-left">
                        <h2>
                            <?php echo get_field('title_reasons', $post->ID)?>
                        </h2>
                        <div class="description-business">
                            <?php echo get_field('description_reasons', $post->ID)?>
                        </div>
                    </div>

                    <?php
                    $list_reasons = get_field('list_reasons', $post->ID);
                    foreach ($list_reasons as $item):
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-lg-0 mb-3">
                            <div class="item-reason">
                                <i class="fa fa-check-circle"></i>
                                <p>
                                    <?php echo $item['reason'];?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach;?>

                    <div class="col-lg-5 col-md-6 mb-lg-0 mb-3">
                        <div class="box-dedicated">
                            <h4><?php echo get_field('teams_title', $post->ID)?></h4>
                            <p>
                                <?php echo get_field('teams_description', $post->ID)?>
                            </p>
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-6 mb-lg-0 mb-3">
                        <div class="box-dedicated">
                            <h4><?php echo get_field('talent_title', $post->ID)?></h4>
                            <p>
                                <?php echo get_field('talent_description', $post->ID)?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <a  <?php echo (get_field('button_direct', $post->ID) == '')? 'onclick="Calendly.showPopupWidget(\'https://calendly.com/envzone/discovery-session\');return false;"': 'href="'.get_field('button_direct', $post->ID).'"';?> class="btn btn-green-env"><?php echo get_field('button_name', $post->ID)?></a>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "subscribe.php";?>

        <?php require_once "popup-company.php";?>
    </section>
</main>