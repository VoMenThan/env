<?php
/**
 * Created by PhpStorm.
 * User: than.vo
 * Date: 2019-03-05
 * Time: 16:32
 */


if (get_the_author()==''){
    $argc = 'author_name=admin';
    $authorName = 'Admin';
}else{
    $argc = 'author_name='.get_the_author();
    $authorName = get_the_author();
}
// The Query
$the_query = new WP_Query($argc);

get_header();?>

<main class="main-content">
    <section class="artical-page blog-page blog-author-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Author</li>
                        </ol>
                    </div>
                    <h2 class="title-author">
                        Author
                    </h2>
                </div>
                <div class="col-8">

                    <div class="information-author clearfix">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 296 );?>

                        <div class="box-info">
                            <h1 class="author-name"><?php echo $authorName;?>’s Bio</h1>
                            <div class="box-position">
                                <div class="position-company">ENVZONE STAFF</div>
                                <div class="position">Jr. Influencer Marketing Operations</div>
                            </div>
                            <div class="description">
                                <?php the_author_meta( 'description' ); ?>
                            </div>
                            <div class="follow-author">Follow this in-depth resource writer on: <a target="_blank" href="#">Linkedin</a></div>
                        </div>
                    </div>

                    <h2 class="title-post-by-author">
                        Recent Contribution by <?php echo $authorName;?>
                    </h2>

                    <?php
                    if ($the_query->have_posts()){
                        while($the_query->have_posts()){
                            $the_query->the_post();
                            ?>
                            <article class="highlight-news-right clearfix">
                                <a class="thumbnail-news" href="<?php echo get_the_permalink();?>">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>">
                                </a>
                                <div class="info-news">
                                    <a href="<?php echo home_url('category/').get_the_category(get_the_ID())[0]->slug;?>" class="category"><?php echo get_the_category(get_the_ID())[0]->name;?></a>
                                    <a href="<?php echo get_the_permalink();?>">
                                        <h2>
                                            <?php echo get_the_title()?>
                                        </h2>
                                    </a>
                                    <div class="audit"><span>By:</span>
                                        <span class="author"><?php echo $authorName;?></span>
                                        <span class="date-public">Updated <?php echo get_the_modified_date();?></span>
                                    </div>
                                </div>
                            </article>
                    <?php
                        }
                    }
                    if (  $wp_query->max_num_pages > 1 ){
                        echo '<div class="misha_loadmore btn-category btn btn-blue-env w-100 mb-5">Show more</div>'; // you can use <a> as well
                    };
                    ?>

                </div>

                <div class="col-4">
                    <div class="popup-hack-me">
                        <h3>
                            Hacking your mind with 5 mins daily digest!
                        </h3>
                        <div class="form-subscribe">
                            <?php
                            echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                            ?>
                        </div>
                    </div>

                    <div class="define-headline box-head-other-author">

                        <div class="other-author underline-head">
                            <span>Other authors</span>
                        </div>

                        <?php
                        global $wp_query;
                        $users = get_users();
                        $i=0;
                        foreach ($users as $user):
                            $i++;
                            if ($i==4) break;
                        ?>
                        <div class="item-author clearfix">
                            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 110 );?>
                            <div class="author-name">
                                <a href="<?php echo home_url('author/').$user->nickname;?>">
                                    <?php echo $user->display_name;?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>

                </div>

            </div>

        </div>
    </section>
</main>

<?php get_footer()?>
