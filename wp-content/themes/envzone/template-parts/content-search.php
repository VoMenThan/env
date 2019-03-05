<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Envzone
 * @since Envzone 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" class="item-search <?php post_class(); ?>">
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <a href="<?php echo esc_url( get_permalink() );?>" class="link"><?php echo esc_url( get_permalink() );?></a>
    <div class="excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>




