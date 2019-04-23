<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */

global $wp_query;
get_header();

$cat = get_the_terms( $post->ID, 'resources_cat' );
$link = get_field('link_share');
?>

<style>
    nav ul.main-menu{
        visibility: hidden;
    }
    nav .toolbar-top{
        display: none;
    }
    nav .box-logo-home a{
        position: relative;
        padding-top: 20px;
        top: 0;
    }
    footer{
        display: none !important;
    }
    .footer-ebook{
        background: #021A32;
        padding: 10px;
    }
    .footer-ebook .privacy-policy{
        color: #fff;
    }
    .footer-ebook .privacy-policy:hover{
        cursor: pointer;
    }
    .footer-ebook p{
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 17px;
        line-height: 30px;
        text-align: center;
        color: #E0E0E0;
    }
</style>
<main class="main-content">
    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center breadcrumb-ebook">
                <li class="nav-item">
                    <a href="<?php echo home_url('resources-category/').$cat[0]->slug;?>"><span class="nav-link active"><?php echo $cat[0]->name;?></span></a>
                </li>
            </ul>
        </div>
    </div>
    <section class="artical-page lead-contact-form-page system-page resource-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 d-flex justify-content-center flex-column">
                    <div class="box-cover">
                        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="img-fluid image-cover-detail">
                    </div>
                    <div class="box-tags">
                        TAGS:
                        <?php
                        if (get_the_tags() != ''):
                            foreach (get_the_tags() as $tag):?>
                                <a href="<?php echo home_url('tag/'.$tag->slug);?>"><?php echo $tag->name;?></a>
                            <?php endforeach; else: echo 'No tags!'; endif;?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="box-get-ebook">
                        <div class="title-head-green">Get Your Freebies!</div>
                        <h3>Guidance to Help You Make Software Outsourcing Decison</h3>

                        <div class="box-form-get-ebook form-horizontal">
                            <?php
                            echo do_shortcode('[gravityform id=11 title=false description=false ajax=false]');
                            ?>
                            <p>By downloading this resource, you agree to receive communication from EnvZone.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</main>

<script>
    (function ( $ ) {
        "use strict";
        $(document).ready(function (e) {
            var link = <?php echo json_encode($link);?>;
            $("#gform_11 #input_11_12").val(link);

        });

    })(jQuery);
</script>
<div class="footer-ebook container-fluid">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
                <p>
                    ©2018 EnvZone, LLC. All Rights Reserved. <br>
                    <a class="privacy-policy" href="<?php echo home_url('privacy-policy/');?>">Privacy Policy</a>
                </p>
            </div>
        </div>

    </div>

</div>
<?php
get_footer();
?>
