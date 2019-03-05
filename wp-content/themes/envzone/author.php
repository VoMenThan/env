<?php
/**
 * Created by PhpStorm.
 * User: than.vo
 * Date: 2019-03-05
 * Time: 16:32
 */

get_header()?>

<main class="main-content">
    <section class="artical-page blog-page blog-author-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="box-breadcrumb">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </div>
                    <h2 class="title-author">
                        Author
                    </h2>
                </div>
                <div class="col-8">

                    <div class="information-author clearfix">
                        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-avatar.png" alt="">
                        <div class="box-info">
                            <h1 class="author-name">Belle Nguyen’s Bio</h1>
                            <div class="box-position">
                                <div class="position-company">ENVZONE STAFF</div>
                                <div class="position">Jr. Influencer Marketing Operations</div>
                            </div>
                            <div class="description">
                                Afshar is the author of The Pursuit of Social Business Excellence. Afshar is also the co-host of DisrupTV, a weekly show covering the latest digital business and innovation market trends.
                            </div>
                            <div class="follow-author">Follow this in-depth resource writer on: <a href="#">Linkedin</a></div>
                        </div>
                    </div>

                    <h2 class="title-post-by-author">
                        Recent Contribution by Belle Nguyen
                    </h2>

                    <article class="highlight-news-right clearfix">
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

                    <article class="highlight-news-right clearfix">
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

                    <a href="#" class="btn btn-blue-env btn-show-more">Show more</a>

                </div>

                <div class="col-4">
                    <div class="popup-hack-me">
                        <h3>
                            Hacking your mind with 5 mins daily digest!
                        </h3>
                        <input type="text" placeholder="your email address">
                        <a href="#" class="btn btn-blue-env btn-show-more">HACK ME NOW!</a>
                    </div>

                    <div class="define-headline box-head-other-author">
                        <div class="other-author underline-head">
                            <span>Other authors</span>
                        </div>
                        <div class="item-author clearfix">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-avatar.png" alt="">
                            <div class="author-name">
                                Joel Makower
                            </div>
                        </div>

                        <div class="item-author clearfix">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-avatar.png" alt="">
                            <div class="author-name">
                                Joel Makower
                            </div>
                        </div>
                        <div class="item-author clearfix">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/img-avatar.png" alt="">
                            <div class="author-name">
                                Joel Makower
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
</main>

<?php get_footer()?>
