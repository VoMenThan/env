<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" class="highlight-news-right clearfix">
    <a class="thumbnail-news" href="#">
        <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>">
    </a>
    <div class="info-news">
        <div class="category"><?php single_cat_title();?></div>
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <div class="audit"><span>By:</span>
            <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>"> <?php echo get_the_author_meta('display_name', $post->post_author);?></a>
            <span class="date-public">Updated <?php echo get_the_date( 'M d,Y', $item->ID );?></span>
        </div>
    </div>
</article>
