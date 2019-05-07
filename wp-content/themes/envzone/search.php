<?php get_header(); ?>
<?php global $wp_query;?>
<main class="main-content">
    <section class="artical-page system-page page-search">
        <div class="container-fluid d-lg-block d-none">
            <div class="box-search">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-12">
                            <div class="title-search">
                                TYPE YOUR SEARCH
                            </div>
                            <div class="box-input-search">
                                <form action="<?php echo home_url("/");?>" method="get" id="search-page" name="search-page">
                                    <input class="input-search" name="s" type="text" placeholder="Input your queries">
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
                <div class="col-md-8 col-12">


                    <?php if ( have_posts() ) : ?>

                        <header class="page-header mb-lg-5 mb-3">
                            <h1 class="page-title"><?php printf( __( 'Search results for: %s', 'envzone' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
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

                        if (  $wp_query->max_num_pages > 1 ){
                            echo '<div class="misha_loadmore btn btn-blue-env w-100 mb-5">Load more</div>'; // you can use <a> as well
                        };


                        // Previous/next page navigation.
                        /*the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'envzone' ),
                            'next_text'          => __( 'Next page', 'envzone' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'envzone' ) . ' </span>',
                        ) );*/

                    // If no content, include the "No posts found" template.
                    else :
                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /*============SUBCRIBE HOME=================*/ -->
    <div class="container-fluild">
        <div class="bg-green-subscribe">
            <div class="container content-subcribe">
                <div class="row">
                    <div class="col-12 box-success-plan text-center">
                        <h2>NEED HELP GETTING YOUR SOFTWARE PROJECT GOING? </h2>
                        <p>
                            Offshore outsourcing is a solution. WE BELIEVE... <br>
                            <span class="highlight-blue">Ousourcing Authority Saves Companies</span> <br>
                            A FREE outsourcing succession plan would put you back on track
                        </p>
                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=10 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /*============END SUBCRIBE HOME=================*/ -->
</main>

<?php get_footer()?>