<main class="main-content">
    <section class="banner-top banner-company bg-blue">
        <img class="img-fluid" src="<?php echo ASSET_URL;?>images/banner-about-us-new.png">
        <h2>ABOUT US</h2>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-breadcrumb">
                    <span class="you-here">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="artical-page about-us-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-introduct">
                        <h1 class="title-head-blue">Business Oriented</h1>

                        <p>
                            <i class="fa fa-check-circle"></i>
                            EnvZone helps clients find the best software development experts, through its multiple outsourcing models. We work with clients from diverse industries such as retail, logistics, hospitality, healthcare and financial services.
                        </p>
                        <p>
                            <i class="fa fa-check-circle"></i>
                            Our goal is to enable clients to find reputable, reliable development services. We don’t offer a one size fits all model. We pride ourselves at matching teams with actual client needs.
                        </p>
                        <p>
                            <i class="fa fa-check-circle"></i>
                            We study client requirements with due diligence and offer tailored lists of developer teams along with their strengths and how they can fit into the client’s work culture. Based on the input, we can identify the best team to support clients’ projects.
                        </p>
                        <p>
                            <i class="fa fa-check-circle"></i>
                            Our onshore resource is the key to help you communicate with the selected offshore teams to ensure continuous support throughout the project.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-two-col-full">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-head-blue">WHAT MAKES US DIFFERENT</h2>
                    </div>
                    <div class="col-lg-6 description-different">

                        <p>
                            With a wide range of professionals to choose from, we offer affordable services which are critical to the growth of your business. Envzone looks forward to the opportunity to help you with your IT and software development needs.
                        </p>
                    </div>
                    <div class="col-lg-6 box-list-different">
                        <ul class="list-different">
                            <li class="d-flex align-items-center">The well vetted pool of skilled, trustworthy offshore partners</li>
                            <li class="d-flex align-items-center">Long term relationship with our partners</li>
                            <li class="d-flex align-items-center">Provide expert help for clients to collaborate with our partners</li>
                            <li class="d-flex align-items-center">Servicing a wide range of industries</li>
                        </ul>
                        <div class="text-right">
                            <a href="<?php echo get_home_url();?>/contact-us" class="btn btn-white-env mt-3">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row py-5 box-what-we-see justify-content-center mb-4">
                <div class="col-12">
                    <h2 class="title-head-blue">WHAT WE SEE AND HOW WE DO IT</h2>
                </div>
                <div class="col-lg-6 col-md-8 mb-lg-0 mb-md-5">
                    <div class="box-blue">
                        <h3>OUR VISION</h3>
                        <p>Our vision at EnvZone is helping our clients by sourcing for the best IT and software engineers globally to work on their various software projects. </p>
                        <p>
                            We will partner with you to provide affordable services without sacrificing quality.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="box-blue">
                        <h3>OUR MISSION</h3>
                        <p>
                            We offer our expertise in perusing our partners’ capabilities and matching them with our clients according to their required needs.
                        </p>
                        <p>
                            We always provide a seamless match which enhances smooth interactions with our foreign partners.
                        </p>
                        <p>
                            As a result, we take extra care looking at the smallest details in our clients brief and use it as a requirement when matching them with our partners.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "why-business.php";?>
        <?php require_once "subscribe.php";?>

        <?php require_once "popup-company.php";?>
    </section>
</main>