<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage EnvZone
 * @since EnvZone 1.0
 */

get_header(); ?>

<?php global $wp_query;?>

<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tag</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-author-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8">
                    <?php if ( have_posts() ) : ?>
                        <header class="page-header">
                            <?php
                                the_archive_title( '<h2 class="title-post-by-author">', '</h2>' );
                            ?>
                        </header><!-- .page-header -->

                        <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', get_post_format());

                        endwhile;

                        if (  $wp_query->max_num_pages > 1 ){
                            echo '<div class="misha_loadmore btn-category btn btn-blue-env w-100 mb-5">Show more</div>'; // you can use <a> as well
                        };

                    else :
                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>

                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
