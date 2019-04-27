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