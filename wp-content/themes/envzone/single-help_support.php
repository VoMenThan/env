<?php
/**
 * Created by PhpStorm.
 * User: mrtha
 * Date: 10/22/2018
 * Time: 3:26 PM
 */

get_header();
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<main class="main-content">
    <section class="artical-page help-page">
        <div class="container d-lg-block d-none">
            <div class="row">
                <div class="col-12 mb-lg-5">
                    <div class="box-breadcrumb no-print">
                        <span class="you-here">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Help</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-help">

            <div class="row">
                <div class="col-lg-4">
                    <div class="box-section-article">
                        <div class="title-article">In this article</div>
                        <?php echo get_field('list_scroll_help', $post->ID);?>
                        <div class="box-technical-support">
                            <div class="title-technical">Technical Support</div>
                            <p>If you have questions about your account, contact our Support team.</p>
                            <a href="<?php echo home_url('contact-us')?>" class="contact-support">Contact Support</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <article class="content-help">
                            <div class="box-help">
                                <h1>
                                    <?php echo $post->post_title;?>
                                </h1>
                                <span id="copy-clipboard" class="link-post">
                                    Copy Article URL
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.15501 5.63299C8.98003 5.5205 8.776 5.48999 8.5875 5.532C8.40099 5.57349 8.23001 5.68599 8.11851 5.8595C8.00651 6.03399 7.97603 6.23699 8.01754 6.4245C8.05851 6.612 8.17103 6.78397 8.34502 6.8955C9.06852 7.35901 9.50003 8.14601 9.50003 9C9.50003 9.668 9.24003 10.2955 8.76803 10.7675L5.76803 13.7675C5.29553 14.24 4.66753 14.5 4.00003 14.5C2.62152 14.5 1.50003 13.3785 1.50003 12C1.50003 11.332 1.76003 10.7045 2.23203 10.2325L3.65503 8.80902C3.80502 8.65903 3.87804 8.46152 3.87503 8.26502C3.87153 8.07752 3.79854 7.8915 3.65503 7.7485C3.50852 7.60199 3.31652 7.5285 3.12505 7.5285C2.93305 7.5285 2.74105 7.60149 2.59506 7.7485L1.17205 9.172C0.416 9.92701 0 10.9315 0 12C0 14.2055 1.79451 16 4 16C5.0685 16 6.07299 15.584 6.8285 14.828L9.8285 11.828C10.584 11.0735 11 10.0685 11 9C11 7.6325 10.3105 6.37401 9.15501 5.63299ZM12 0C10.9315 0 9.92701 0.416 9.1715 1.172L6.1715 4.172C5.416 4.92648 5 5.9315 5 6.9995C5 8.36701 5.68952 9.62599 6.84499 10.367C7.02 10.479 7.224 10.5095 7.4125 10.4675C7.59898 10.4265 7.76999 10.314 7.88149 10.1405C7.99349 9.96552 8.024 9.76251 7.98248 9.57501C7.94149 9.3875 7.82899 9.2155 7.65498 9.1045C6.93197 8.6405 6.49997 7.85349 6.49997 6.9995C6.49997 6.3315 6.75997 5.704 7.23197 5.232L10.232 2.232C10.7045 1.76 11.3325 1.5 12 1.5C13.3785 1.5 14.5 2.62149 14.5 3.9995C14.5 4.6675 14.24 5.29501 13.768 5.76701L12.345 7.19001C12.195 7.34 12.122 7.53752 12.125 7.73401C12.1285 7.92152 12.2015 8.10753 12.345 8.25051C12.4915 8.39702 12.6835 8.47001 12.8755 8.47001C13.0675 8.47001 13.2595 8.39702 13.4055 8.25051L14.8285 6.82701C15.584 6.07299 16 5.068 16 3.9995C16 1.79451 14.2055 0 12 0Z" fill="#375D81"/>
                                    </svg>
                                    <span class="copied d-none">Copied</span>
                                </span>
                                <?php echo $post->post_content;?>
                            </div>

                            <div class="box-comment no-print">
                                <?php
                                    if ( comments_open() || get_comments_number() ) {
                                        comments_template();
                                    }
                                ?>
                            </div>
                    </article>
                </div>
            </div>

        </div>
    </section>
    <script>
        $('#copy-clipboard').click(
            function (e) {
                var dummy = document.createElement('input'),
                    text = window.location.href;
                document.body.appendChild(dummy);
                dummy.value = text;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);
                $('.copied').removeClass('d-none');
            }
        );
    </script>
</main>
<?php get_footer();?>
