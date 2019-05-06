<?php
$date_now = date('Y-m-d');
$args_event = array(
    'posts_per_page' => 5,
    'post_type' => 'events',
    'meta_query'	=> array(
        'relation' 			=> 'AND',
        array(
            'key'			=> 'date',
            'compare'		=> '>=',
            'value'			=> $date_now,
            'type'			=> 'DATETIME'
        )
    ),
    'orderby'	=> 'meta_value',
    'order'     => 'asc'
);
$the_query = new WP_Query( $args_event );


get_header();
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
                <?php if( $the_query->have_posts() ): ?>
                <div class="col-lg-8">

                    <?php while( $the_query->have_posts() ) : $the_query->the_post();

                        get_template_part( 'template-parts/content', 'event' );

                        endwhile;

                        if (  $the_query->max_num_pages > 1 ){
                            echo '<div class="misha_loadmore btn-show-event btn btn-blue-env w-100 my-5">Load more</div>'; // you can use <a> as well
                        };
                    ?>



                </div>
                <?php
                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                ?>

                <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


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
    <script>
        $(".form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');
    </script>
<?php get_footer();?>