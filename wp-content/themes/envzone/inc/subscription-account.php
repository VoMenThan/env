<?php
/* Template Name: Subscription Account*/
get_header('subscription');
?>
<main class="main-content subscription-account-page">
    <?php
        if (is_user_logged_in()):
            $user = get_current_user_id();
            $avatar = get_field('avatar', 'user_' . $user)['sizes']['medium'];
            if ($avatar == '') {
                $avatar = 'https://www.envzone.com/wp-content/uploads/2019/04/Commenter-Profile-Icon.png';
            }
            $user_meta = get_user_meta($user);

            $info_subscription = do_shortcode('[mepr-list-subscriptions]');
            $info_subscription = strip_tags($info_subscription);
            $info_subscription = preg_split('/\:/', $info_subscription);

            $info_plan = preg_split("/[\s]+/", $info_subscription[0]);

            $number_letter = count($info_plan);

            foreach ($info_plan as $k => $val){
                $k++;
                if ($k == $number_letter) break;
                $letter_plan .= ' '.$val;
            }
            ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-3 order-1 no-print">
                <aside class="site-sidebar clearfix">
                    <div class="side-user">
                        <a class="avatar" href="javascript:void(0);">
                            <img src="<?php echo $avatar;?>">
                        </a>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="sidebar-nav">
                        <ul class="side-menu">
                            <li class="active current-page item">
                                <a class="ripple" href="/subscription-account">
                                    <i>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.199951 5.1H5.09995V0.199997H0.199951V5.1ZM7.54995 19.8H12.45V14.9H7.54995V19.8ZM0.199951 19.8H5.09995V14.9H0.199951V19.8ZM0.199951 12.45H5.09995V7.55H0.199951V12.45ZM7.54995 12.45H12.45V7.55H7.54995V12.45ZM14.9 0.199997V5.1H19.7999V0.199997H14.9ZM7.54995 5.1H12.45V0.199997H7.54995V5.1ZM14.9 12.45H19.7999V7.55H14.9V12.45ZM14.9 19.8H19.7999V14.9H14.9V19.8Z" fill="white"/>
                                        </svg>
                                    </i>
                                    <span class="menu-name">Dashbrd</span>
                                </a>
                            </li>
                            <li class="item">
                                <a class="ripple" href="#">
                                    <i>
                                        <svg width="32" height="38" viewBox="0 0 32 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_dd)">
                                                <path d="M23.35 29.25C23.9998 29.25 24.623 28.9919 25.0824 28.5324C25.5419 28.0729 25.8 27.4498 25.8 26.8V7.2C25.8 5.84025 24.6975 4.75 23.35 4.75H16V13.325L12.9375 11.4875L9.87501 13.325V4.75H8.65001C8.00023 4.75 7.37706 5.00812 6.9176 5.46759C6.45814 5.92705 6.20001 6.55022 6.20001 7.2V26.8C6.20001 27.4498 6.45814 28.0729 6.9176 28.5324C7.37706 28.9919 8.00023 29.25 8.65001 29.25H23.35Z" fill="#0D3153"/>
                                            </g>
                                            <defs>
                                                <filter id="filter0_dd" x="0.200012" y="0.75" width="31.6" height="36.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                    <feOffset dy="1"/>
                                                    <feGaussianBlur stdDeviation="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0295189 0 0 0 0 0.137798 0 0 0 0 0.187773 0 0 0 0.24 0"/>
                                                    <feBlend mode="multiply" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                    <feOffset dy="2"/>
                                                    <feGaussianBlur stdDeviation="3"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0295189 0 0 0 0 0.137798 0 0 0 0 0.187773 0 0 0 0.16 0"/>
                                                    <feBlend mode="multiply" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>
                                    </i>
                                    <span class="menu-name">Resource</span>
                                </a>
                            </li>
                            <li class="item">
                                <a class="ripple" href="#">
                                    <i>
                                        <svg width="38" height="36" viewBox="0 0 38 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_dd)">
                                                <path d="M31.25 27.025H6.75V4.97501H9.2V24.575H11.65V22.125H16.55V24.575H19V20.9H23.9V24.575H26.35V22.125H31.25V27.025ZM26.35 18.45H31.25V20.9H26.35V18.45ZM19 8.65001H23.9V12.325H19V8.65001ZM23.9 19.675H19V13.55H23.9V19.675ZM11.65 13.55H16.55V16H11.65V13.55ZM16.55 20.9H11.65V17.225H16.55V20.9Z" fill="#0D3153"/>
                                            </g>
                                            <defs>
                                                <filter id="filter0_dd" x="0.75" y="0.975006" width="36.5" height="34.05" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                    <feOffset dy="1"/>
                                                    <feGaussianBlur stdDeviation="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0295189 0 0 0 0 0.137798 0 0 0 0 0.187773 0 0 0 0.24 0"/>
                                                    <feBlend mode="multiply" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                    <feOffset dy="2"/>
                                                    <feGaussianBlur stdDeviation="3"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0295189 0 0 0 0 0.137798 0 0 0 0 0.187773 0 0 0 0.16 0"/>
                                                    <feBlend mode="multiply" in2="effect1_dropShadow" result="effect2_dropShadow"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>
                                    </i>
                                    <span class="menu-name">Affiliate</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-nav -->

                    <div class="side-user-logout">
                        <ul class="side-menu">
                            <li class="item">
                                <a class="ripple logout" href="<?php echo MeprUtils::logout_url(); ?>">
                                    <i>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.25 5V1.25H0V18.75H11.25V15H10V17.5H1.25V2.5H10V5H11.25Z" fill="#828282"/>
                                            <path d="M20 10L13.75 5V7.5H7.5V12.5H13.75V15L20 10Z" fill="#828282"/>
                                        </svg>
                                    </i>
                                    <span class="menu-name">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </aside>

                <aside class="list-features">
                    <ul class="feature-menu">
                        <li class="<?php echo $_GET['action']=='payments'? 'active' : '';?> item">
                            <a class="feature" href="<?php echo home_url('subscription-account/?action=payments')?>">
                                <i>
                                    <svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.2563 5.20002H3.05625V2.80002H22.2563V5.20002ZM22.2563 17.2H3.05625V10H22.2563V17.2ZM22.2563 0.400024H3.05625C1.72425 0.400024 0.65625 1.46802 0.65625 2.80002V17.2C0.65625 17.8365 0.909106 18.447 1.35919 18.8971C1.80928 19.3472 2.41973 19.6 3.05625 19.6H22.2563C22.8928 19.6 23.5032 19.3472 23.9533 18.8971C24.4034 18.447 24.6562 17.8365 24.6562 17.2V2.80002C24.6562 1.46802 23.5763 0.400024 22.2563 0.400024Z" fill="#2FA84F"/>
                                    </svg>
                                </i>
                                <span class="menu-name">Billing & Payments</span>
                                <span class="sub-name">Manage payment methods</span>
                            </a>
                        </li>
                        <li class="<?php echo $_GET['action']=='home'? 'active' : ''; echo $_GET['action']==''? 'active' : '';?> item">
                            <a class="feature" href="<?php echo home_url('subscription-account/?action=home')?>">
                                <i>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.65627 2.67999C11.0483 2.67999 12.1763 3.80799 12.1763 5.19999C12.1763 6.59199 11.0483 7.71999 9.65627 7.71999C8.26427 7.71999 7.13627 6.59199 7.13627 5.19999C7.13627 3.80799 8.26427 2.67999 9.65627 2.67999ZM9.65627 13.48C13.2203 13.48 16.9763 15.232 16.9763 16V17.32H2.33627V16C2.33627 15.232 6.09227 13.48 9.65627 13.48ZM9.65627 0.399994C7.00427 0.399994 4.85627 2.54799 4.85627 5.19999C4.85627 7.85199 7.00427 9.99999 9.65627 9.99999C12.3083 9.99999 14.4563 7.85199 14.4563 5.19999C14.4563 2.54799 12.3083 0.399994 9.65627 0.399994ZM9.65627 11.2C6.45227 11.2 0.0562744 12.808 0.0562744 16V19.6H19.2563V16C19.2563 12.808 12.8603 11.2 9.65627 11.2Z" fill="#367BF5"/>
                                    </svg>
                                </i>
                                <span class="menu-name">Account</span>
                                <span class="sub-name">Update profile, password</span>
                            </a>
                        </li>
                        <li class="<?php echo $_GET['action']=='subscriptions'? 'active' : '';?> item">
                            <a class="feature" href="<?php echo home_url('subscription-account/?action=subscriptions')?>">
                                <i>
                                    <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.65626 10.8H11.6563V16.8H5.65626V10.8ZM20.0563 21.6H3.25626V8.4H20.0563V21.6ZM20.0563 2.4H18.8563V0H16.4563V2.4H6.85626V0H4.45626V2.4H3.25626C1.92426 2.4 0.856262 3.48 0.856262 4.8V21.6C0.856262 22.2365 1.10912 22.847 1.55921 23.2971C2.00929 23.7471 2.61974 24 3.25626 24H20.0563C20.6928 24 21.3032 23.7471 21.7533 23.2971C22.2034 22.847 22.4563 22.2365 22.4563 21.6V4.8C22.4563 4.16348 22.2034 3.55303 21.7533 3.10294C21.3032 2.65286 20.6928 2.4 20.0563 2.4Z" fill="#EA3D2F"/>
                                    </svg>
                                </i>
                                <span class="menu-name">Plans</span>
                                <span class="sub-name">Manage your subscription</span>
                            </a>
                        </li>
                        <li class="<?php echo $_GET['action']=='booking'? 'active' : '';?> item">
                            <a class="feature" href="<?php echo home_url('subscription-account/?action=booking')?>">
                                <i>
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.6562 0C6.02025 0 0.65625 5.4 0.65625 12C0.65625 15.1826 1.92053 18.2348 4.17097 20.4853C5.28527 21.5996 6.60814 22.4835 8.06405 23.0866C9.51996 23.6896 11.0804 24 12.6562 24C15.3563 24 17.8523 23.088 19.8563 21.6V18.336C18.0923 20.328 15.5243 21.6 12.6562 21.6C10.1102 21.6 7.66837 20.5886 5.86803 18.7882C4.06768 16.9879 3.05625 14.5461 3.05625 12C3.05625 9.45392 4.06768 7.01212 5.86803 5.21178C7.66837 3.41143 10.1102 2.4 12.6562 2.4C16.6882 2.4 20.1322 4.884 21.5483 8.4H24.1043C22.5803 3.528 18.0563 0 12.6562 0ZM11.4563 6V13.2L17.7563 16.98L18.6562 15.504L13.2563 12.3V6H11.4563ZM22.2563 10.8V19.2H24.6562V10.8H22.2563ZM22.2563 21.6V24H24.6562V21.6H22.2563Z" fill="#EA3D2F"/>
                                    </svg>
                                </i>
                                <span class="menu-name">Booking</span>
                                <span class="sub-name">Talk to dedicated manager</span>
                            </a>
                        </li>
                        <li class="<?php echo $_GET['action']=='work-order'? 'active' : '';?> item">
                            <a class="feature" href="<?php echo home_url('subscription-account/?action=work-order')?>">
                                <i>
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4563 19.2H13.8563V16.8H11.4563V19.2ZM12.6562 0C11.0804 0 9.51996 0.310389 8.06405 0.913446C6.60814 1.5165 5.28527 2.40042 4.17097 3.51472C1.92053 5.76516 0.65625 8.8174 0.65625 12C0.65625 15.1826 1.92053 18.2348 4.17097 20.4853C5.28527 21.5996 6.60814 22.4835 8.06405 23.0866C9.51996 23.6896 11.0804 24 12.6562 24C15.8388 24 18.8911 22.7357 21.1415 20.4853C23.392 18.2348 24.6562 15.1826 24.6562 12C24.6562 10.4241 24.3459 8.86371 23.7428 7.4078C23.1397 5.95189 22.2558 4.62902 21.1415 3.51472C20.0272 2.40042 18.7044 1.5165 17.2485 0.913446C15.7925 0.310389 14.2321 0 12.6562 0V0ZM12.6562 21.6C7.36425 21.6 3.05625 17.292 3.05625 12C3.05625 6.708 7.36425 2.4 12.6562 2.4C17.9482 2.4 22.2563 6.708 22.2563 12C22.2563 17.292 17.9482 21.6 12.6562 21.6ZM12.6562 4.8C11.3832 4.8 10.1623 5.30571 9.26214 6.20589C8.36196 7.10606 7.85625 8.32696 7.85625 9.6H10.2563C10.2563 8.96348 10.5091 8.35303 10.9592 7.90294C11.4093 7.45286 12.0197 7.2 12.6562 7.2C13.2928 7.2 13.9032 7.45286 14.3533 7.90294C14.8034 8.35303 15.0563 8.96348 15.0563 9.6C15.0563 12 11.4563 11.7 11.4563 15.6H13.8563C13.8563 12.9 17.4563 12.6 17.4563 9.6C17.4563 8.32696 16.9505 7.10606 16.0504 6.20589C15.1502 5.30571 13.9293 4.8 12.6562 4.8Z" fill="#069697"/>
                                    </svg>
                                </i>
                                <span class="menu-name">Work Order</span>
                                <span class="sub-name">Submit work tickets</span>
                            </a>
                        </li>
                        <li class="<?php echo $_GET['action']=='digital-asset'? 'active' : '';?> item">
                            <a class="feature" href="<?php echo home_url('subscription-account/?action=digital-asset')?>">
                                <i>
                                    <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.856262 10.4944H4.20426L9.37626 0.599998L10.7923 11.3983L14.6563 6.46915L18.6523 10.4944H22.4563V12.9047H17.6563L14.8603 10.0967L9.16026 17.4L7.98426 8.45768L5.65626 12.9047H0.856262V10.4944Z" fill="#F3AA18"/>
                                    </svg>
                                </i>
                                <span class="menu-name">Digital Asset</span>
                                <span class="sub-name">Manage website, more.</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
            <?php the_content();?>
            <div class="col-lg-2 order-3 d-flex align-items-end justify-content-center no-print">
                <div class="box-info-user">
                    <a class="avatar" href="javascript:void(0);">
                        <img src="<?php echo $avatar;?>">
                    </a>
                    <div class="name"><?php echo do_shortcode('[mepr-account-info field="full_name"]');?></div>
                    <div class="plan">Plan: <span><?php echo $letter_plan;?></span></div>
                    <a href="#" class="btn btn-upgrade">Upgrade your plan</a>
                </div>
            </div>
        </div>
    </div>
    <?php else:?>

    <section class="subscription-member-template-page no-print">
        <div class="container box-affiliate-content">
            <div class="row box-container justify-content-center">
                <div class="col-lg-4 content-subscription-template">
                    <?php the_content();?>
                </div>
            </div>
        </div>
        <div class="footer-affiliate">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="box-term">
                            <a href="<?php echo home_url('terms-of-use');?>">Terms of Use</a>
                            <a href="<?php echo home_url('privacy-policy');?>">Privacy Policy</a>
                        </div>

                        <a href="<?php echo home_url('privacy-policy');?>" class="logo-env-footer">
                            <img class="img-fluid" src="<?php echo ASSET_URL;?>images/logo-envzone-gray.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <style>
            .box-affiliate-content{
                min-height: calc(100vh - 192px);
                padding-top: 100px;
                padding-bottom: 100px;
            }
            .box-affiliate-content > .box-container{
                height: 100%;
                text-align: center;
            }
            .box-affiliate-content > .box-container h2{
                font-size: 28px;
                color: #333333 !important;
                margin-bottom: 20px;
                margin-top: 50px;
                text-align: left;
            }
            .box-affiliate-content > .box-container h3{
                font-size: 26px;
                color: #333333 !important;
                margin-bottom: 20px;
                margin-top: 40px;
                text-align: left;
            }
            .box-affiliate-content > .box-container h4{
                font-size: 24px;
                color: #333333 !important;
                margin-bottom: 20px;
                margin-top: 30px;
                text-align: left;
            }
            .box-affiliate-content > .box-container p{
                font-size: 22px;
                line-height: 140%;
                font-weight: 500;
                margin-bottom: 15px;
                color: #808080;
                text-align: left;
            }
            .box-affiliate-content > .box-container li{
                list-style-type: inherit;
                margin-bottom: 15px;
                color: #808080;
                font-size: 22px;
                font-weight: 500;
                text-align: left;
            }
            .box-affiliate-content .uap-register-form{
                margin: auto;
            }
            .box-affiliate-content .uap-login-form-wrap{
                padding-top: 150px;
            }
            .footer-affiliate{
                background: #F2F2F2;
                padding: 15px;
            }
            .footer-affiliate{
                min-height: 90px;
            }
            .footer-affiliate .logo-env-footer img{
                height: 30px;
            }
            .footer-affiliate .box-term a{
                color: #BDBDBD;
                border-right: 1px solid #bdbdbd;
                padding: 0 15px;
                display: inline-block;
            }
            .footer-affiliate .box-term a:last-child{
                border-right: 0;
            }
        </style>
    <?php endif;?>

    <script>
        $(document).ready(function() {
            $("#user_login").attr("placeholder", "Email");
            $("#user_pass").attr("placeholder", "Password");
        });
    </script>
</main>
<?php get_footer('subscription');?>
