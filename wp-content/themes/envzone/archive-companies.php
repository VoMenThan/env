<?php
/*
Template Name: Archives Companies
*/

global $wp_query;
$date_now = date('Y-m-d');

$get_terms = $_GET['t'];

$paged = get_query_var( 'paged' );


if(count($get_terms)>=1){
    $args_event = array(
        'post_type' => 'companies',
        'posts_per_page' => 10,
        'orderby'	=> 'meta_value',
        'order'     => 'desc',
        'paged' => $paged,
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
        'post_type' => 'companies',
        'posts_per_page' => 10,
        'paged' => $paged
    );
}



$the_query = new WP_Query( $args_event );
$total_posts = $the_query->found_posts;//total post show

$terms_companies = get_terms( array(
    'taxonomy' => 'industries',
    'hide_empty' => false
) );


$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$count_industries = count($_GET['t']);
get_header();
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

                            <div class="btn-clear">
                                <span class="d-lg-inline-block d-none"><?php echo $total_posts;?> Companies</span>
                                <?php if (count($get_terms)>=1):?>
                                <a href="<?php echo home_url('companies')?>">
                                    <span class="d-lg-inline-block d-none text-clear">CLEAR</span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 2L18 0L10 8L2 0L0 2L8 10L0 18L2 20L10 12L18 20L20 18L12 10L20 2Z" fill="#8DC63F"/>
                                    </svg>
                                </a>
                                <?php endif;?>
                            </div>

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
                                                if($i==0){
                                                    $slug = str_replace('?t[0]='.$item->slug, '',$full_url);
                                                    for ($j=0; $j<$count_industries; $j++){
                                                        $t = $j+1;
                                                        if ($j==0){
                                                            $slug = str_replace("&t[$t]", "?t[$j]", $slug);
                                                        }else{
                                                            $slug = str_replace("&t[$t]", "&t[$j]", $slug);
                                                        }
                                                    }

                                                }else{
                                                    $slug = str_replace("&t[$i]=".$item->slug, '',$full_url);
                                                    for ($j=1; $j <= $count_industries; $j++){
                                                        if ($j >= $i){
                                                            $t = $j+1;
                                                            $slug = str_replace("&t[$t]", "&t[$j]", $slug);
                                                        }
                                                        else{
                                                            $slug = str_replace("&t[$j]", "&t[$j]", $slug);
                                                        }

                                                    }
                                                }

                                                break;
                                            }
                                            else{
                                                $checked = '';
                                                $slug = $full_url.'&t['.$count_industries.']='.$item->slug;
                                            }
                                        }
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
                    <?php
                    if( $the_query->have_posts() ): ?>


                        <?php while( $the_query->have_posts() ) : $the_query->the_post();

                            get_template_part( 'template-parts/content', 'companies' );

                        endwhile;

                        if ($the_query->max_num_pages > 1):
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
                        endif;

                    else :

                        get_template_part( 'template-parts/content', 'none-company' );

                    endif;

                    wp_reset_postdata();	 // Restore global post data stomped by the_post().
                    ?>
                </div>



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

<?php get_footer();?>