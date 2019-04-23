<?php get_header();?>
    <main class="main-content">
        <section class="artical-page system-page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-12">
                        <div class="notification-error">
                            <h1>404</h1>
                            <h3>OOPS! YOU’RE GOING TOO FAR.</h3>
                            <p>
                                The page you are looking for could not be found. The link you followed to request a page is inaccurate or out of date or because of typographic error in the address bar.
                            </p>
                            <p>
                                You may wish to try another entry in the search box below.
                            </p>

                        </div>

                        <div class="box-search">
                            <div class="title-search">
                                TYPE YOUR SEARCH
                            </div>
                            <div class="box-input-search">
                                <form method="get" id="search-error" action="<?php echo home_url('/');?>">
                                    <input class="input-search" name="s" type="text" placeholder="Input your queries">
                                    <a href="" onclick="document.getElementById('search-error').submit()" class="btn-search">
                                        <i class="icon-search"></i>
                                    </a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /*============SUBCRIBE HOME=================*/ -->
        <div class="container-fluild">
            <div class="bg-green-subscribe">
                <div class="container content-subcribe">
                    <div class="row">
                        <div class="col-12 box-success-plan text-center">
                            <h2>NEED HELP GETTING YOUR SOFTWARE PROJECT GOING? </h2>
                            <p>
                                Offshore outsourcing is a solution. WE BELIEVE... <br>
                                <span class="highlight-blue">Ousourcing Authority Saves Companies</span> <br>
                                A FREE outsourcing succession plan would put you back on track
                            </p>
                            <div class="form-subscribe">
                                <?php
                                echo do_shortcode('[gravityform id=10 title=false description=false ajax=false]');
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /*============END SUBCRIBE HOME=================*/ -->
    </main>
<?php get_footer();?>