<?php
/* Template Name: SER - Customer support*/
get_header();
?>
<main class="main-content">

    <div class="nav-top-bar">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <span class="nav-link active">Support</span>
                </li>
            </ul>
        </div>
    </div>

    <section class="artical-page customer-support-page">

        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div class="box-customer-support">
                        <h1 class="title-head-blue title-top"><?php echo get_the_title();?></h1>
                        <article>
                            <?php echo get_the_content();?>
                        </article>
                    </div>


                </div>
                <div class="col-lg-4 contact-us-page">
                    <div class="box-contact-topic mb-5">
                        <div class="label-header">
                            CONTACT US BY TOPIC
                        </div>
                        <article>
                            <h4>Support Inquiries:</h4>
                            <a href="mailto:support@envzone.com">support@envzone.com</a>
                        </article>
                    </div>
                    <a target="_blank" rel="nofollow" href="https://envzone.supportbee.com/portal/sign_in" class="item-customer-support">
                        <img src="<?php echo ASSET_URL;?>images/icon-technical-support.png" alt="">
                        <h2>SUBMIT A TICKET</h2>
                    </a>
                </div>


            </div>
        </div>

    </section>
</main>
<?php get_footer();?>