<?php
$date_now = date('Y-m-d');

$get_terms = $_GET['t'];
if(count($get_terms)>=1){
    $args_event = array(
        'posts_per_page' => -1,
        'post_type' => 'companies',
        'orderby'	=> 'meta_value',
        'order'     => 'desc',
        'tax_query' => array(
            array(
                'taxonomy' => 'industries',
                'field'    => 'slug',
                'terms'    => $get_terms
            ),
        )
    );
}else{
    $args_event = array(
        'posts_per_page' => -1,
        'post_type' => 'companies',
        'orderby'	=> 'meta_value',
        'order'     => 'desc'
    );
}



$the_query = new WP_Query( $args_event );


$terms_companies = get_terms( array(
    'taxonomy' => 'industries',
    'hide_empty' => false
) );


$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$count_industries = count($_GET['t']);

?>

    <main class="main-content">
        <div class="container-fluid filter-companies-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 box-filter">
                        <div class="box-sort-industries">
                            <div class="title" data-toggle="collapse" data-target="#collapseFilterIndustries" aria-expanded="false" aria-controls="collapseExample">
                                SORT BY: <span class="default-title">Industry (<?php echo $count_industries;?>)</span>
                            </div>
                            <div class="arrow-right"></div>
                        </div>
                        <div class="collapse list-sort-industries" id="collapseFilterIndustries">
                            <div class="wrap">
                                <?php foreach ($terms_companies as $item):?>
                                <div class="item-industry">
                                    <?php

                                        if (!isset($_GET['t'])){
                                            $slug = home_url('companies/?t[0]=').$item->slug;
                                        }else{
                                            for ($i = 0; $i < $count_industries; $i++){
                                                if ($_GET['t'][$i] == $item->slug){
                                                    $checked = 'checked';
                                                    break;
                                                }
                                                else{
                                                    $checked = '';
                                                }

                                            }
                                            $slug = $full_url.'&t['.$count_industries.']='.$item->slug;

                                        }
                                    ?>
                                    <a class="<?php echo $checked?>" href="<?php echo $slug;?>">
                                        <span class="">
                                            <?php echo $item->name;?>
                                        </span>
                                    </a>

                                </div>
                                <?php endforeach;?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="artical-page blog-page blog-detail-page companies-page">
            <div class="container">
                <div class="row mb-lg-5">
                    <div class="col-lg-8 mb-5 pd-lr-0">
                        <?php if( $the_query->have_posts() ): ?>


                            <?php while( $the_query->have_posts() ) : $the_query->the_post();

                                get_template_part( 'template-parts/content', 'companies' );

                            endwhile;

                            if (  $the_query->max_num_pages > 1 ){
                                echo '<div class="misha_loadmore btn-show-event btn btn-blue-env w-100 my-5">Load more</div>'; // you can use <a> as well
                            };

                        else :

                            get_template_part( 'template-parts/content', 'none-company' );

                        endif;
                        ?>
                    </div>
                    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


                    <div class="col-lg-4 pd-lr-0">

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
        $(".box-subscriber-blog .form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');
    </script>