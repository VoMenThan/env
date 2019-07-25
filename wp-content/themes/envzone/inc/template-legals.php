<?php
/* Template Name: LEGALS Template*/
get_header();
?>
<main class="main-content">
    <section class="artical-page legals-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="content-legals">
                        <h1><?php echo $post->post_title;?></h1>
                        <?php echo $post->post_content;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();?>