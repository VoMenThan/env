<?php
/* Template Name: CPY - Careers*/
get_header();
?>
<main class="main-content">
    <section class="banner-top banner-careers bg-blue">
        <h1><?php echo get_the_title();?></h1>
    </section>
    <section class="artical-page careers-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <img class="img-fluid img-careers" src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="">
                    <article class="box-careers">
                        <?php echo get_the_content($post->ID);?>
                    </article>

                    <div class="hr-career"></div>

                    <div class="article-benefits">
                        <h4><?php echo get_field('title_benefits', $post->ID);?></h4>

                        <div class="row">
                            <?php $list_benefits = get_field('list_benefits', $post->ID);
                            foreach ($list_benefits as $item):
                                ?>
                                <div class="col-lg-4 col-md-6 col-6 item-benefit">
                                    <img src="<?php echo $item['icon'];?>" alt="">
                                    <p><?php echo $item['title'];?></p>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="hr-career"></div>
                    <div class="text-center">
                        <a target="_blank" href="<?php echo get_field('url_vacancies', $post->ID);?>" class="btn btn-green-env">
                            <?php echo get_field('button_name_vacancies', $post->ID);?>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();?>