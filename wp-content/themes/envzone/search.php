<?php get_header();

global $wp_query;
?>
<main class="main-content">
    <section class="artical-page system-page page-search">
        <div class="container-fluid d-lg-block d-none">
            <div class="box-search">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-12">
                            <div class="box-input-search">
                                <form action="<?php echo home_url("/");?>" method="get" id="search-page" name="search-page">
                                    <input class="input-search" name="s" type="text" value="<?php echo $_GET['s'];?>" placeholder="Input your queries">
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
                            <a href="" class="active">
                                All
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
                                Information
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
                                Articles
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
                                Knowledge center
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
                                Gallery
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
                                Studio
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
                                Profiles
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
                                Resources
                            </a>
                        </li>
                        <li class="item-filter">
                            <a href="">
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
                                <?php echo $wp_query->found_posts;?> results for <?php printf( __( '%s ', 'envzone' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
                            </div>
                        </header><!-- .page-header -->

                        <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );

                            // End the loop.
                        endwhile;

                        if ($wp_query->max_num_pages > 1):
                            $big = 999999999;

                            echo '<div class="box-pagination">';
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'end_size'           => 4,
                                'mid_size'           => 1,
                                'current'            => max( 1, $paged ),
                                'total'              => $wp_query->max_num_pages,
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