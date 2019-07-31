<?php
/* Template Name: SYS - Offline*/
get_header();
?>
<main class="main-content">
    <section class="artical-page system-page page-offline">
        <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="box-improvement">
                       <?php echo $post->post_content;?>
                   </div>

               </div>
           </div>
        </div>
    </section>
</main>

<?php get_footer();?>