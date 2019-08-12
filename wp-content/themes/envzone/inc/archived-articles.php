<?php
/* Template Name: DIS - Archived Articles*/
get_header();
?>

<?php
$date_now = date('Y-m-d');

$get_date = $_GET['date'];

if ($get_date != ''){
    $get_month =  new DateTime($get_date);
    $get_month = $get_month->format('m');
}


$paged = get_query_var( 'paged' );
if (count($get_date) >= 1){
    $args_event = array(
        'posts_per_page' => 10,
        'post_type' => 'post',
        'orderby'	=> 'meta_value',
        'order' => 'desc',
        'date_query' => array(
            array(
                'year'  => 2019,
                'month' => $get_month,
            ),
        ),
        'paged' => $paged
    );
}else{
    $args_event = array(
        'posts_per_page' => 10,
        'post_type' => 'post',
        'orderby'	=> 'meta_value',
        'order' => 'desc',
        'paged' => $paged
    );
}

$the_query = new WP_Query( $args_event );

if (count($get_date) >= 1){
    $date = $get_date;
    $date =  new DateTime($date);
    $date = $date->format('M Y');
}else{
    $date = 'ALL';
}

?>

    <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo home_url('archived-articles');?>">Archived Articles</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $date;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="artical-page blog-page blog-events-page blog-detail-page">
            <div class="container">
                <div class="row mb-lg-5">
                    <div class="col-lg-8 border-header">
                        <h3 class="title-head-blue have-border">ARCHIVES: <?php echo $date;?></h3>
                    </div>
                    <div class="col-lg-8 mb-5 pd-lr-0 archived-posts-page">
                        <?php if( $the_query->have_posts() ): ?>


                            <?php while( $the_query->have_posts() ) : $the_query->the_post();

                                get_template_part( 'template-parts/content', get_post_format() );

                            endwhile;

                            if (  $the_query->max_num_pages > 1 ){

                                //echo '<div class="misha_loadmore btn-show-event btn btn-blue-env w-100 my-5">Show more</div>'; // you can use <a> as well

                                if (  $the_query->max_num_pages > 1 ){

                                    $big = 999999999; // need an unlikely integer

                                    echo '<div class="box-pagination">';
                                    echo paginate_links( array(
                                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format' => '?paged=%#%',
                                        'end_size'           => 4,
                                        'mid_size'           => 1,
                                        'current'            => max( 1, $paged ),
                                        'total'              => $the_query->max_num_pages,
                                        'prev_next'          => true,
                                        'prev_text'          => __('Previous'),
                                        'next_text'          => __('Next')
                                    ) );
                                    echo '</div>';
                                };
                            };

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                    </div>
                    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


                    <div class="col-lg-4 pd-lr-0">
                        <div class="list-archived-events">
                            <div class="title">ARCHIVES</div>
                            <ul class="box-year">
                                <li class="year">2019</li>
                            </ul>
                            <ul class="list-month">
                                <li class="month">
                                    <a class="<?php echo $get_month == 03 ? 'active' : '';?>" href="<?php echo home_url('archived-articles').'?date=2019-03'?>">Mar</a>
                                </li>
                                <li class="month">
                                    <a class="<?php echo $get_month == 04 ? 'active' : '';?>" href="<?php echo home_url('archived-articles').'?date=2019-04'?>">Apr</a>
                                </li>
                                <li class="month">
                                    <a class="<?php echo $get_month == 05 ? 'active' : '';?>" href="<?php echo home_url('archived-articles').'?date=2019-05'?>">May</a>
                                </li>
                                <li class="month">
                                    <a class="<?php echo $get_month == 06 ? 'active' : '';?>" href="<?php echo home_url('archived-articles').'?date=2019-06'?>">Jun</a>
                                </li>
                                <li class="month">
                                    <a class="<?php echo $get_month == 07 ? 'active' : '';?>" href="<?php echo home_url('archived-articles').'?date=2019-07'?>">Jul</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <script>
        $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');
    </script>

<?php get_footer();?>