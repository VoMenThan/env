<?php
/**<br />
 * The template for displaying Author Archive pages.<br />
 *<br />
 * @package WordPress<br />
 * @subpackage envzone<br />
 * @since EnvZone 1.0<br />
 */


global $wp_query;
$curauth = $wp_query->get_queried_object();

$author_id = $curauth->ID;
$authorName = $curauth->display_name;
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
                        <li class="breadcrumb-item active" aria-current="page">Discovery</li>
                        <li class="breadcrumb-item active" aria-current="page">Author</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page blog-author-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 pd-lr-0">

                    <div class="information-author clearfix">
                        <?php
                        $avatar = get_field('avatar', 'user_'. $author_id );
                        if ($avatar == ''){
                            echo get_avatar( get_the_author_meta( 'user_email' ), 110 );
                        }else{?>
                            <img src="<?php echo $avatar['sizes']['medium'];?>" alt="" class="img-fluid avatar-author">
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
                                <?php the_author_meta( 'description', $author_id ); ?>
                            </div>
                            <div class="certification-author">
                                <?php echo $authorName;?>’s Certifications
                            </div>
                            <ul class="list-certification nav">

                                <?php
                                    $list_certification = get_field('certifications', 'user_'. $author_id );
                                    if (count($list_certification) >= 1):
                                        foreach ($list_certification as $item):
                                ?>
                                <li class="item-certification nav-item">
                                    <img class="img-fluid" src="<?php echo $item['image_certification'];?>" alt="">
                                </li>
                                <?php
                                        endforeach;
                                    endif;
                                ?>
                            </ul>
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
                                        <span class="author">By <?php echo $authorName;?></span>
                                        <div class="date-public">on <?php echo get_the_modified_date();?></div>
                                    </div>
                                </div>
                            </article>
                    <?php
                        }
                    }else{?>
                    <article class="item-busy-collarating text-center">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M40 0C39.2637 0 38.6667 0.597005 38.6667 1.33333V6.66667C38.6667 7.403 39.2637 8 40 8C40.7363 8 41.3333 7.403 41.3333 6.66667V2.69987C61.5957 3.41862 77.5801 20.1777 77.3405 40.4512C77.1009 60.7246 60.7246 77.1009 40.4512 77.3405C20.1777 77.5801 3.41862 61.5957 2.69987 41.3333H6.66667C7.403 41.3333 8 40.7363 8 40C8 39.2637 7.403 38.6667 6.66667 38.6667H1.33333C0.597005 38.6667 0 39.2637 0 40C0 62.0911 17.9089 80 40 80C62.0911 80 80 62.0911 80 40C80 17.9089 62.0911 0 40 0Z" fill="#375D81"/>
                                <path d="M57.888 20.0228C54.2187 19.7162 50.9954 22.4427 50.6894 26.112C50.3828 29.7813 53.1093 33.0046 56.7786 33.3106C56.9668 33.3268 57.1517 33.3333 57.3372 33.3333C60.8001 33.3268 63.6835 30.6732 63.9759 27.2227C64.2786 23.5547 61.5553 20.334 57.888 20.0228ZM57 30.6537C54.86 30.4785 53.2402 28.6452 53.3294 26.5C53.4192 24.3548 55.1862 22.6628 57.3333 22.6667C57.444 22.6667 57.556 22.6667 57.6692 22.6797C59.8711 22.8639 61.5065 24.7982 61.3229 27C61.1386 29.2018 59.2044 30.8372 57.0026 30.6537H57Z" fill="#375D81"/>
                                <path d="M43.084 24.9544C41.5013 23.444 39.0111 23.444 37.4277 24.9544L28.472 33.9121C27.1803 35.2155 27.1849 37.3183 28.4831 38.6159C29.7806 39.9134 31.8835 39.9173 33.1869 38.6256L40.2533 31.5586L45.5202 36.8229C46.8014 38.1061 48.8776 38.1165 50.1719 36.8463C50.819 36.2331 51.1908 35.3834 51.2025 34.4922C51.2148 33.6002 50.8652 32.7415 50.2344 32.1107L43.084 24.9544ZM48.2962 34.9544C48.0443 35.1907 47.6504 35.1829 47.4082 34.9375L41.1999 28.7252C40.679 28.2051 39.8353 28.2051 39.3145 28.7252L31.3027 36.7402C31.0423 37.0006 30.6198 37.0013 30.3594 36.7409C30.099 36.4804 30.0983 36.0579 30.3587 35.7975L39.3145 26.8398C39.8353 26.3196 40.679 26.3196 41.1999 26.8398L48.3535 33.9922C48.4766 34.1146 48.5443 34.2825 48.5397 34.4557C48.5319 34.6478 48.4434 34.8275 48.2962 34.9505V34.9544Z" fill="#375D81"/>
                                <path d="M41.6003 65.7989H41.6172C42.5013 65.8015 43.349 65.4499 43.972 64.8229L51.0267 57.7683C52.5892 56.2058 52.5892 53.6726 51.0267 52.1107L42.0723 43.155C40.7533 41.8952 38.6771 41.8952 37.3588 43.155C36.0573 44.4564 36.0573 46.5664 37.3588 47.8679L44.4252 54.9349L39.2559 60.1042C37.9714 61.3978 37.9597 63.4831 39.2305 64.7904C39.8523 65.433 40.7064 65.7963 41.6003 65.7989ZM41.1452 62L47.2572 55.888C47.778 55.3672 47.778 54.5235 47.2572 54.0026L39.2455 45.9883C39.0723 45.8203 39.0026 45.5729 39.0638 45.3399C39.1244 45.1068 39.3067 44.9245 39.5398 44.8633C39.7728 44.8028 40.0209 44.8718 40.1882 45.0456L49.1426 54C49.6635 54.5209 49.6635 55.3646 49.1426 55.8854L42.0866 62.9336C41.9629 63.0586 41.7943 63.1289 41.6185 63.1283C41.4362 63.1394 41.2592 63.0645 41.14 62.9265C40.892 62.6667 40.8939 62.2572 41.1452 62Z" fill="#375D81"/>
                                <path d="M63.3334 49.3333C65.1745 49.3333 66.6667 47.8411 66.6667 46C66.6667 44.1588 65.1745 42.6667 63.3334 42.6667H56V38.6667C56 38.1751 55.7292 37.7227 55.2956 37.4909C54.862 37.2591 54.336 37.2845 53.9265 37.5573L49.9265 40.224C49.556 40.4714 49.3334 40.8874 49.3334 41.3333V45.3333C49.3334 47.5423 51.1244 49.3333 53.3334 49.3333H63.3334ZM52 45.3333V42.0469L53.3334 41.1588V44C53.3334 44.7363 53.9304 45.3333 54.6667 45.3333H63.3334C63.7019 45.3333 64 45.6315 64 46C64 46.3685 63.7019 46.6667 63.3334 46.6667H53.3334C52.597 46.6667 52 46.0697 52 45.3333Z" fill="#375D81"/>
                                <path d="M38.9427 51.2389C37.9082 50.2025 36.6882 48.9531 36.3815 48.599C36.3242 48.5046 36.2565 48.418 36.1784 48.3398C35.6582 47.821 34.8164 47.821 34.2962 48.3398L19.7441 62.8945C18.4421 64.1966 18.4421 66.3073 19.7441 67.6094C21.0462 68.9115 23.1569 68.9115 24.459 67.6094L38.9427 53.1237C39.4629 52.6035 39.4629 51.7591 38.9427 51.2389ZM22.5736 65.7227C22.3132 65.9831 21.8906 65.9837 21.6302 65.7233C21.3691 65.4629 21.3691 65.0404 21.6296 64.7799L35.1842 51.2266C35.4505 51.5065 35.7598 51.8229 36.1172 52.1797L22.5736 65.7227Z" fill="#375D81"/>
                                <path d="M34.211 8.50651C34.2891 8.50651 34.3672 8.5 34.4441 8.48698C35.1693 8.35873 35.6537 7.66667 35.5255 6.94141L34.5919 1.68946C34.4486 0.980472 33.7657 0.515628 33.0541 0.641279C32.3419 0.76693 31.8594 1.43685 31.9669 2.1517L32.8998 7.4056C33.0124 8.04167 33.5645 8.50586 34.211 8.50651Z" fill="#375D81"/>
                                <path d="M27.3463 9.13347C27.5384 9.65951 28.0384 10.0104 28.599 10.0104C28.7546 10.0111 28.9089 9.98373 29.0547 9.92905C29.7474 9.67905 30.1055 8.91407 29.8548 8.22136L28.028 3.20964C27.7663 2.53191 27.0104 2.18816 26.3281 2.43686C25.6458 2.6849 25.2878 3.43425 25.5228 4.1211L27.3463 9.13347Z" fill="#375D81"/>
                                <path d="M22.1783 11.7988C22.4153 12.2148 22.8561 12.472 23.3346 12.4733C23.8131 12.4739 24.2558 12.2187 24.4941 11.804C24.7324 11.3887 24.7298 10.8782 24.4882 10.4655L21.8215 5.84635C21.4505 5.21418 20.6393 4.99999 20.0045 5.36653C19.3697 5.73306 19.1497 6.54296 19.5116 7.17968L22.1783 11.7988Z" fill="#375D81"/>
                                <path d="M17.5534 15.3229C18.0267 15.888 18.8678 15.9622 19.4336 15.4896C19.9987 15.0163 20.0729 14.1745 19.6003 13.6094L16.1667 9.52277C15.6862 8.98892 14.8685 8.93163 14.3184 9.39322C13.7682 9.85546 13.6829 10.6699 14.1256 11.2357L17.5534 15.3229Z" fill="#375D81"/>
                                <path d="M13.608 19.6003C14.1731 20.0547 14.9987 19.9733 15.4648 19.4173C15.931 18.862 15.8671 18.0351 15.3216 17.5573L11.2376 14.1296C10.6718 13.6751 9.84696 13.7559 9.38017 14.3118C8.91402 14.8678 8.97782 15.694 9.52405 16.1719L13.608 19.6003Z" fill="#375D81"/>
                                <path d="M5.84829 21.8216L10.4668 24.4883C10.8795 24.7298 11.39 24.7324 11.8053 24.4941C12.22 24.2559 12.4752 23.8131 12.4746 23.3346C12.4733 22.8561 12.2161 22.4154 11.8001 22.1784L7.18162 19.5117C6.54425 19.1497 5.73435 19.3698 5.36782 20.0045C5.00128 20.6393 5.21547 21.4505 5.84829 21.8216Z" fill="#375D81"/>
                                <path d="M3.20961 28.028L8.22133 29.8522C8.36717 29.9062 8.52146 29.9336 8.67706 29.9336C9.32485 29.9336 9.87888 29.4694 9.99152 28.8314C10.1041 28.194 9.74217 27.5677 9.13344 27.3463L4.12107 25.5228C3.43422 25.2878 2.68487 25.6458 2.43683 26.3281C2.18813 27.0104 2.53188 27.7663 3.20961 28.028Z" fill="#375D81"/>
                                <path d="M1.68946 34.5989L6.94142 35.5254C7.01824 35.5384 7.09637 35.5449 7.17449 35.5455C7.86655 35.5455 8.44337 35.0169 8.50327 34.3274C8.56381 33.6386 8.0866 33.0182 7.40561 32.8984L2.1517 31.9655C1.42644 31.8379 0.735037 32.3222 0.607433 33.0475C0.479829 33.7728 0.964204 34.4642 1.68946 34.5918V34.5989Z" fill="#375D81"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="80" height="80" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <p>
                            Than Vo is busy collaborating with other team members. Stay tuned for surprises!
                        </p>
                    </article>
                    <?php }

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
                            <span>Other EnvZoners</span>
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
