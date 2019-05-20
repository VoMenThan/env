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
                        <li class="breadcrumb-item active" aria-current="page">Date</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-author-page">
        <div class="container">
            <div class="row mb-5">

            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
