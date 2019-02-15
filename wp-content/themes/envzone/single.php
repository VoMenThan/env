<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */

get_header();
?>

<main class="main-content">
    <section class="artical-page blog-page blog-detail-page">
        <div class="container-fluid bg-blue-home">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="current-category">CATERGORY NAME HERE - HEALTHCARE</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>/blog">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="col-8">
                    <h1>
                        <?php echo $post->post_title;?>
                    </h1>
                    <article class="content-blog">
                        <div class="excerpt-news">
                            <?php echo $post->post_excerpt;?>
                        </div>
                        <div class="audit">
                            <span>By:</span>
                            <a class="author" href="#"> <?php echo get_the_author_meta('display_name', $post->post_author);?></a> <span>| ENVZONE Staff</span>
                            <div class="date">PUBLISHED: <?php echo get_the_date( 'M d,Y', $item->ID );?> | UPDATED: <?php echo get_the_date( 'M d,Y', $item->ID );?></div>
                        </div>

                        <div class="box-share">
                            <ul class="nav list-social d-flex justify-content-end">
                                <li class="nav-item">
                                    SHARE THIS ARTICLE:
                                </li>
                                <li class="nav-item">
                                    <a class="link-twitter" href="https://twitter.com/Envzone">
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-facebook" href="https://www.facebook.com/envzone/">
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-linkedin"  href="https://www.linkedin.com/company/evnzone-inc.?trk=top_nav_home">
                                        <i class="icon-linkedin"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-google" href="https://plus.google.com/+EnvZoneWashington">
                                        <i class="icon-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="main-content">
                            <?php echo $post->post_content;?>
                        </div>
                    </article>
                </div>

                <div class="col-4">
                    <div class="box-advert">
                        <p>
                            <span class="fz-big-green">80%</span> of outsourcing relationships fail due to responsiveness & communication factors
                        </p>
                        <div class="sub-title">
                            Do Not Let Your Projects Go South!
                        </div>
                        <a href="#" class="btn btn-green-env">
                            SEE OUR UNIQUE APPROACH FOR SUCCESS
                        </a>
                    </div>

                    <div class="box-related-article">
                        <div class="title-article">
                            Related articles
                        </div>

                        <div class="item-relate clearfix">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                            <a href="#">
                                <h2>Cloud Services are current trend</h2>
                            </a>
                        </div>

                        <div class="item-relate clearfix">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                            <a href="#">
                                <h2>Cloud Services are current trend</h2>
                            </a>
                        </div>

                        <div class="item-relate clearfix">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                            <a href="#">
                                <h2>Cloud Services are current trend</h2>
                            </a>
                        </div>

                        <div class="item-relate clearfix">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                            <a href="#">
                                <h2>Cloud Services are current trend</h2>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
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
                            <form action="" method="get">
                                <input type="text" class="input-search d-block" placeholder="Enter your email adress">
                                <input type="submit" hidden>
                                <a class="btn btn-blue-env btn-search" href="#">SIGN ME UP FOR THREE THINGS</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->


        <div class="container">

            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue">READ MORE FROM EXPERTS</h3>
                    <a href="#" class="view-all">VIEW ALL</a>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue">READ MORE FROM EXPERTS</h3>
                    <a href="#" class="view-all">VIEW ALL</a>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <div class="row section-trending">
                <div class="col-12 border-header">
                    <h3 class="title-head-blue">READ MORE FROM EXPERTS</h3>
                    <a href="#" class="view-all">VIEW ALL</a>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="highlight-news-right img-center">
                        <a class="thumbnail-news" href="#">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-blog-the-innovative.png">
                        </a>
                        <div class="info-news">
                            <a href="#" class="category">DEVOPS</a>
                            <a href="#">
                                <h2>
                                    The Innovative work of CB Insights in Data Mining
                                </h2>
                            </a>
                            <div class="audit"><span>By:</span>
                                <a class="author" href="#"> Author</a>
                                <span class="date-public">Updated Nov 29, 2018</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

        </div>

    </section>
</main>



<?php
get_footer();
?>
