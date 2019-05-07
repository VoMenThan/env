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
        <?php
            $excerpt = get_the_excerpt();
            $excerpt = (mb_strlen($excerpt,'utf-8')<100) ? $excerpt : mb_substr($excerpt,0,100,'utf-8')."...";
            echo $excerpt;
        ?>
    </div>
</article>





