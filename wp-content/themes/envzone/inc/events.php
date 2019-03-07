<?php
$args = array(
    'posts_per_page' => 5,
    'offset'=> 0,
    'post_type' => 'list_events',
    'orderby' => 'id',
    'order' =>'desc'
);
$event_all = get_posts( $args );

$args = array(
    'posts_per_page' => 5,
    'offset'=> 0,
    'post_type' => 'post',
    'orderby' => 'id',
    'order' =>'desc'
);
$news_all = get_posts( $args );
?>

<main class="main-content">
    <section class="artical-page blog-page blog-events-page blog-detail-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ol>
                    </div>
                    <h1 class="title-head-blue">
                        EVENTS
                    </h1>
                </div>
                <div class="col-8">
                    <?php foreach ($event_all as $item):?>
                    <div class="box-item-event clearfix">
                        <?php echo $item->post_content;?>
                    </div>
                    <?php endforeach;?>

                </div>

                <div class="col-4">
                    <div class="popup-hack-me">
                        <h3>
                            Hacking your mind with 5 mins daily digest!
                        </h3>
                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>

                    <div class="box-related-article">
                        <div class="title-article">
                            Blog
                        </div>
                        <?php foreach ($news_all as $item):?>
                        <div class="item-relate clearfix">
                            <a href="<?php echo get_the_permalink($item->ID);?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID)?>">
                            </a>
                            <h2><a href="<?php echo get_the_permalink($item->ID);?>"><?php echo $item->post_title;?></a></h2>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>

        </div>
    </section>
</main>