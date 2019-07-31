<?php get_header();

global $wp_query;
$scope = $_GET['scope'];
$keyword = $_GET['s'];

if (isset($scope)){
    $args_search = array(
        'post_type' => $scope,
        'posts_per_page' => 10,
        's' => $keyword,
        'paged' => $paged
    );
    $the_query = new WP_Query( $args_search );
}else{
    $the_query = $wp_query;
}

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<main class="main-content">
    <section class="artical-page system-page page-search">
        <div class="container-fluid d-lg-block d-none">
            <div class="box-search">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-12">
                            <div class="box-input-search">
                                <form action="" method="get" id="search-page" name="search-page">
                                    <input class="input-search" name="s" type="text" value="<?php echo $keyword;?>" placeholder="Input your queries">
                                    <input class="scope-search" name="scope" type="hidden" value="<?php echo $scope;?>">
                                    <a onclick="document.getElementById('search-page').submit()" href="#" class="btn-search">
                                        <i class="icon-search"></i>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="title-filter">
                        Filter by type
                    </div>
                    <ul class="list-filter">
                        <li class="item-filter">
                            <a href="<?php echo home_url('?s='.$keyword);?>" class="<?php echo ($scope)==''?'active':'';?>">
                                All
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=page&s='.$keyword);?>" class="<?php echo ($scope)=='page'?'active':'';?>">
                                Information
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=post&s='.$keyword);?>" class="<?php echo ($scope)=='post'?'active':'';?>">
                                Articles
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=knowledge_center&s='.$keyword);?>" class="<?php echo ($scope)=='knowledge_center'?'active':'';?>">
                                Knowledge center
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=studio_gallery&s='.$keyword);?>" class="<?php echo ($scope)=='studio_gallery'?'active':'';?>">
                                Gallery
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=studio_motion&s='.$keyword);?>" class="<?php echo ($scope)=='studio_motion'?'active':'';?>">
                                Studio
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=companies&s='.$keyword);?>" class="<?php echo ($scope)=='companies'?'active':'';?>">
                                Profiles
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=resources&s='.$keyword);?>" class="<?php echo ($scope)=='resources'?'active':'';?>">
                                Resources
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="<?php echo home_url('?scope=help_support&s='.$keyword);?>" class="<?php echo ($scope)=='help_support'?'active':'';?>">
                                Help
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-8 col-12">
                    <?php
                        if ( have_posts() ) :
                    ?>
                        <header class="page-header mb-lg-5 mb-3">
                            <div class="page-title">
                                <?php echo $the_query->found_posts;?> results for <?php printf( __( '%s ', 'envzone' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
                            </div>
                        </header><!-- .page-header -->

                        <?php
                        // Start the loop.
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );

                            // End the loop.
                        endwhile;

                        if ($the_query->max_num_pages > 1):
                            $big = 999999999;

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
                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer()?>