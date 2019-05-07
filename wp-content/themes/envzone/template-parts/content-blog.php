<article class="highlight-news-right clearfix">

    <a class="thumbnail-news" href="<?php echo get_the_permalink();?>">
        <?php echo get_the_post_thumbnail( get_the_ID(), 'medium');?>
    </a>
    <div class="info-news">
        <a href="<?php echo home_url('category/').get_the_category(get_the_ID())[0]->slug;?>" class="category"><?php echo get_the_category(get_the_ID())[0]->cat_name;?></a>
        <a href="<?php echo get_the_permalink();?>">
            <h2>
                <?php echo the_title();?>
            </h2>
        </a>
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
            <a class="author" href="<?php echo home_url("author/").get_the_author_meta('nickname', $post->post_author);?>">
                By <?php echo get_the_author_meta('display_name', $post->post_author);?>
            </a>
            <div class="date-public">on <?php echo get_the_date( 'M d, Y', get_the_ID() );?></div>
        </div>
    </div>

</article>