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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-events-page blog-detail-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 border-header">
                    <h3 class="title-head-blue have-border">EVENTS</h3>
                </div>
                <div class="col-lg-8">

                    <?php foreach ($event_all as $item):?>
                    <div class="box-item-event clearfix">
                        <?php echo $item->post_content;?>
                    </div>
                    <?php endforeach;?>

                </div>

                <div class="col-4">
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

                    <div class="box-advert">
                        <p>
                            <span class="fz-big-green">80%</span> of outsourcing relationships fail due to responsiveness & communication factors
                        </p>
                        <div class="sub-title">
                            Do Not Let Your Projects Go South!
                        </div>
                        <a href="<?php echo home_url("process-framework");?>" class="btn btn-green-env">
                            SEE OUR UNIQUE APPROACH FOR SUCCESS
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>
</main>