<?php
/**<br />
 * The template for displaying Author Archive pages.<br />
 *<br />
 * @package WordPress<br />
 * @subpackage envzone<br />
 * @since EnvZone 1.0<br />
 */

$author_id = get_the_author_meta('ID');
$authorName = get_the_author_meta('display_name');
$argc = array("author" => $author_id);
// The Query
$the_query = new WP_Query($argc);

get_header();?>

<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $authorName;?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-author-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="title-author">
                        Author
                    </h2>
                </div>
                <div class="col-lg-8 pd-lr-0">

                    <div class="information-author clearfix">
                        <?php
                        $avatar = get_field('avatar', 'user_'. $author_id );
                        if ($avatar == ''){
                            echo get_avatar( get_the_author_meta( 'user_email' ), 110 );
                        }else{?>
                            <img src="<?php echo $avatar['sizes']['medium'];?>" alt="" class="img-fluid">
                        <?php
                        }
                        ?>


                        <div class="box-info">
                            <h1 class="author-name"><?php echo $authorName;?>’s Bio</h1>
                            <div class="box-position">
                                <div class="position-company"><?php echo get_field('staff', 'user_'. $author_id );?></div>
                                <div class="position"><?php echo get_field('position', 'user_'. $author_id );?></div>
                            </div>
                            <div class="description">
                                <?php the_author_meta( 'description' ); ?>
                            </div>
                            <div class="follow-author">Follow this in-depth resource writer on: <a target="_blank" href="<?php echo get_field('linkedin', 'user_'. $author_id );?>">Linkedin</a></div>
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
                                    <div class="audit">
                                        <?php
                                        if (get_field('avatar', 'user_'.$author_id)== ''){
                                            $avatar = ASSET_URL.'images/avatar-default.png';
                                        }
                                        else{
                                            $avatar = get_field('avatar', 'user_'.$author_id);
                                        }

                                        ?>
                                        <img src="<?php echo $avatar['sizes']['thumbnail'];?>" class="img-fluid avatar" alt="">
                                        <span>By </span>
                                        <span class="author"><?php echo $authorName;?></span>
                                        <div class="date-public">on <?php echo get_the_modified_date();?></div>
                                    </div>
                                </div>
                            </article>
                    <?php
                        }
                    }

                    if (  $the_query->max_num_pages > 1 ){
                        echo '<div class="misha_loadmore btn-category btn btn-blue-env w-100 mb-5">Show more</div>'; // you can use <a> as well
                    };
                    ?>

                </div>

                <div class="col-lg-4">
                    <div class="popup-hack-me d-lg-block d-none">
                        <h3>
                            Follow <?php echo $authorName;?> for featured insights to make your business successful
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

                        foreach ($users as $user):
                            $id = $user->ID;
                            if ($user->ID==$author_id) continue;
                            if ($id == 7 || $id == 8 || $id == 9 || $id == 1) continue;
                        ?>
                        <div class="item-author clearfix">
                            <img src="<?php echo get_field('avatar', 'user_'. $user->ID )['sizes']['thumbnail'];?>" alt="" class="img-fluid">
                            <?php //echo get_avatar( get_the_author_meta( 'user_email' ), 110 );?>
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
    <section class="subscriber">
        <!-- /*============SUBCRIBE HOME=================*/ -->
        <div class="container-fluild section-parallax">
            <div class="bg-green-home">
                <div class="container content-subcribe">
                    <div class="row">
                        <div class="col-12 box-head-subcribe text-center">
                            <h2>SUBSCRIBE FOR THREE THINGS</h2>
                            <p>
                                Three links or tips of interest curated about offshore outsourcing every week by the experts at ENVZONE Consulting.
                            </p>
                            <div class="form-subscribe">
                                <?php
                                echo do_shortcode('[gravityform id=3 title=false description=false ajax=false]');
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->
    </section>
</main>
<script>
    $(".form-subscribe #gform_submit_button_3").val('KEEP ME UPDATED');
</script>
<?php get_footer()?>
