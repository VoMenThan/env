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
        <a href="<?php echo home_url('category/').get_the_category($post->ID)[0]->slug;?>" class="category">
            <?php echo get_the_category($post->ID)[0]->cat_name;?>
        </a>
        <?php the_title( sprintf( '<a href="%s" rel="bookmark"><h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2></a>' ); ?>
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
            <a class="author" href="<?php echo home_url('author/').get_the_author_meta('nickname', $post->post_author);?>">By <?php echo get_the_author_meta('display_name', $post->post_author);?></a>
            <div class="date-public">Updated <?php echo get_the_date( 'M d, Y', $post->ID );?></div>
        </div>
    </div>
</article>
