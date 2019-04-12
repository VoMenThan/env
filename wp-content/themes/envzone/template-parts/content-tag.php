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
    <a class="thumbnail-news" href="<?php echo get_permalink();?>">
        <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>">
    </a>
    <div class="info-news">
        <a href="<?php echo home_url('category/'.get_the_category()[0]->slug);?>" class="category"><?php echo get_the_category()[0]->name;?></a>
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <div class="audit">
            <?php
            if (get_field('avatar', 'user_'.$post->post_author)== ''){
                $avatar = ASSET_URL.'images/avatar-default.png';
            }
            else{
                $avatar = get_field('avatar', 'user_'.$post->post_author);
            }
            ?>
            <img src="<?php echo $avatar['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar">
            <span>By:</span>
            <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>"> <?php echo get_the_author_meta('display_name', $post->post_author);?></a>
            <div class="date-public">Updated <?php echo get_the_date( 'M d,Y', $item->ID );?></div>
        </div>
    </div>
</article>
