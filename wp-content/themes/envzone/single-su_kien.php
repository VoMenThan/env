<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */




$args = array(
        'posts_per_page' => 3,
        'offset'=> 0,
        'post_type' => 'su_kien',
        'orderby' => 'id',
        'order' =>'desc'
        );
$news_related = get_posts( $args );

get_header();
?>

<section class="category_page">
    <div class="container">
        <article class="content-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <ul class="nav flex-lg-column text-center list-share-social">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.instagram.com/media.marinahill/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.facebook.com/bietthunghiduongtrendoinhatrang/?_rdc=1&_rdr"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.youtube.com/channel/UCp5lFfV6-9p9dvYjb4Rmnkw/featured"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-10">
                        <div class="content-page">
                            <div class="date-time"><?php echo get_the_date( 'd-m-Y', $item->ID );?></div>
                            <h1><?php echo $post->post_title;?></h1>

                            <div class="content-news">
                                <?php echo $post->post_content;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </article>


        <article class="list-news">
            <div class="title-news-related">SỰ KIỆN KHÁC</div>
            <div class="row">
                <?php foreach ($news_related as $item):
                        $image_featured = get_the_post_thumbnail_url($item->ID);

                    ?>
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $image_featured?>" alt="Card image cap">
                            <div class="card-body">
                                <div class="date"><?php echo get_the_date( 'd-m-Y', $item->ID );?></div>
                                <a href="<?php echo get_home_url()."/su-kien/". $item->post_name; ?>"><h5 class="card-title"><?php echo $item->post_title;?></h5></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
             <div class="text-center p-5">
                <a class="btn-gradient-slide load-more" href="#" role="button">TẢI THÊM +</a>
            </div>
        </article>

    </div>





</section>

<?php
get_footer();
?>