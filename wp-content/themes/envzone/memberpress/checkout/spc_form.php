<?php if (!defined('ABSPATH')) {
    die('You are not allowed to call this page directly.');
} ?>

<?php do_action('mepr-above-checkout-form', $product->ID); ?>

<?php
$email_regsiter = $_GET['mail'];
$plan = uri_segment(1);
$term = uri_segment(2);

if ($term != '') {
    $term = 'year';
    $term_name = 'Yearly (20% Off)';
    $term_more = 'Monthly';
    $full_url = home_url('register/') . $plan;
} else {
    $term = '';
    $full_url = home_url('register/') . $plan . '/yearly';
    $term_name = 'Monthly';
    $term_more = 'Yearly (20% Off)';
}
if ($plan == 'growing-business') {
    $plan_name = 'Growing Business';
    $price_plan = 199;
} elseif ($plan == 'main-street') {
    $plan_name = 'Main Street';
    $price_plan = 299;
} else {
    $plan_name = 'High Growth';
    $price_plan = 399;
}

if ($term != '') {
    if ($plan == 'growing-business') {
        $price_plan = '159';
    } elseif ($plan == 'main-street') {
        $price_plan = '239';
    } else {
        $price_plan = '319';
    }
}
?>
<div class="mp_wrapper">
    <form id="mepr-signup-form" class="mepr-signup-form mepr-form" method="post"
          action="<?php echo $_SERVER['REQUEST_URI'] . '#mepr_jump'; ?>" novalidate>
        <div class="row box-container justify-content-center">
            <div class="col-lg-4 order-1 form-secure-checkout content-subscription-template box-infomation-checkout">

                <div class="box-your-information">
                    <div class="title-your-information">Your Information</div>
                    <div class="title-your-information title-starter d-none text-center">Registration</div>
                    <div class="box-info">
                        <input type="hidden" id="mepr_process_signup_form" name="mepr_process_signup_form"
                               value="<?php echo isset($_GET['mepr_process_signup_form']) ? $_GET['mepr_process_signup_form'] : 1 ?>"/>
                        <input type="hidden" id="mepr_product_id" name="mepr_product_id"
                               value="<?php echo $product->ID; ?>"/>
                        <input type="hidden" id="mepr_transaction_id" name="mepr_transaction_id"
                               value="<?php echo isset($_GET['mepr_transaction_id']) ? $_GET['mepr_transaction_id'] : ""; ?>"/>

                        <?php if (MeprUtils::is_user_logged_in()): ?>
                            <input type="hidden" name="logged_in_purchase" value="1"/>
                            <?php wp_nonce_field('logged_in_purchase', 'mepr_checkout_nonce'); ?>
                        <?php endif; ?>

                        <?php if (($product->register_price_action != 'hidden') && MeprHooks::apply_filters('mepr_checkout_show_terms', true)): ?>
                            <div class="mp-form-row mepr_bold mepr_price">
                                <?php $price_label = ($product->is_one_time_payment() ? _x('Price:', 'ui', 'memberpress') : _x('Terms:', 'ui', 'memberpress')); ?>
                                <label><?php echo $price_label; ?></label>
                                <div class="mepr_price_cell">
                                    <?php MeprProductsHelper::display_invoice($product, $mepr_coupon_code); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php MeprHooks::do_action('mepr-checkout-before-name', $product->ID); ?>

                        <?php if ((!MeprUtils::is_user_logged_in() ||
                                (MeprUtils::is_user_logged_in() && $mepr_options->show_fields_logged_in_purchases)) &&
                            $mepr_options->show_fname_lname): ?>
                            <div class="mp-form-row mepr_first_name">
                                <input type="text" placeholder="<?php _ex('First name', 'ui', 'memberpress');
                                echo ($mepr_options->require_fname_lname) ? '*' : ''; ?>" name="user_first_name"
                                       id="user_first_name" class="mepr-form-input"
                                       value="<?php echo $first_name_value; ?>" <?php echo ($mepr_options->require_fname_lname) ? 'required' : ''; ?> />
                            </div>
                            <div class="mp-form-row mepr_last_name">
                                <input type="text" placeholder="<?php _ex('Last name', 'ui', 'memberpress');
                                echo ($mepr_options->require_fname_lname) ? '*' : ''; ?>" name="user_last_name"
                                       id="user_last_name" class="mepr-form-input"
                                       value="<?php echo $last_name_value; ?>" <?php echo ($mepr_options->require_fname_lname) ? 'required' : ''; ?> />
                            </div>
                        <?php else: /* this is here to avoid validation issues */ ?>
                            <input type="hidden" name="user_first_name" id="user_first_name"
                                   value="<?php echo $first_name_value; ?>"/>
                            <input type="hidden" name="user_last_name" id="user_last_name"
                                   value="<?php echo $last_name_value; ?>"/>
                        <?php endif; ?>

                        <?php
                        if (!MeprUtils::is_user_logged_in() || (MeprUtils::is_user_logged_in() && $mepr_options->show_fields_logged_in_purchases)) {
                            MeprUsersHelper::render_custom_fields($product, 'signup');
                        }
                        ?>

                        <?php if (MeprUtils::is_user_logged_in()): ?>
                            <input type="hidden" name="user_email" id="user_email"
                                   value="<?php echo stripslashes($mepr_current_user->user_email); ?>"/>
                        <?php else: ?>
                            <input type="hidden" class="mepr-geo-country" name="mepr-geo-country" value=""/>

                            <?php if (!$mepr_options->username_is_email): ?>
                                <div class="mp-form-row mepr_username">
                                    <div class="mp-form-label">
                                        <label><?php _ex('Username:*', 'ui', 'memberpress'); ?></label>
                                        <span class="cc-error"><?php _ex('Invalid Username', 'ui', 'memberpress'); ?></span>
                                    </div>
                                    <input type="text" name="user_login" id="user_login" class="mepr-form-input"
                                           value="<?php echo (isset($user_login)) ? esc_attr(stripslashes($user_login)) : ''; ?>"
                                           required/>
                                </div>
                            <?php endif; ?>
                            <div class="mp-form-row mepr_email">
                                <input type="email"
                                       placeholder="<?php _ex('Email*', 'ui', 'memberpress'); ?>"
                                       name="user_email" id="user_email" class="mepr-form-input"
                                       value="<?php echo (isset($user_email)) ? esc_attr(stripslashes($user_email)) : $email_regsiter; ?>"
                                       required/>
                            </div>
                            <?php MeprHooks::do_action('mepr-after-email-field'); //Deprecated ?>
                            <?php MeprHooks::do_action('mepr-checkout-after-email-field', $product->ID); ?>
                            <?php if ($mepr_options->disable_checkout_password_fields === false): ?>
                                <div class="mp-form-row mepr_password">
                                    <div class="mp-form-label">
                                        <label><?php _ex('Password:*', 'ui', 'memberpress'); ?></label>
                                        <span class="cc-error"><?php _ex('Invalid Password', 'ui', 'memberpress'); ?></span>
                                    </div>
                                    <input type="password" name="mepr_user_password" id="mepr_user_password"
                                           class="mepr-form-input mepr-password"
                                           value="<?php echo (isset($mepr_user_password)) ? esc_attr(stripslashes($mepr_user_password)) : ''; ?>"
                                           required/>
                                </div>
                                <div class="mp-form-row mepr_password_confirm">
                                    <div class="mp-form-label">
                                        <label><?php _ex('Password Confirmation:*', 'ui', 'memberpress'); ?></label>
                                        <span class="cc-error"><?php _ex('Password Confirmation Doesn\'t Match', 'ui', 'memberpress'); ?></span>
                                    </div>
                                    <input type="password" name="mepr_user_password_confirm"
                                           id="mepr_user_password_confirm"
                                           class="mepr-form-input mepr-password-confirm"
                                           value="<?php echo (isset($mepr_user_password_confirm)) ? esc_attr(stripslashes($mepr_user_password_confirm)) : ''; ?>"
                                           required/>
                                </div>
                                <?php MeprHooks::do_action('mepr-after-password-fields'); //Deprecated ?>
                                <?php MeprHooks::do_action('mepr-checkout-after-password-fields', $product->ID); ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="mp-form-submit">
                            <input type="submit" class="mepr-submit"
                                   value="<?php echo stripslashes($product->signup_button_text); ?>"/>
                            <img src="<?php echo admin_url('images/loading.gif'); ?>" style="display: none;"
                                 class="mepr-loading-gif"/>
                            <?php MeprView::render('/shared/has_errors', get_defined_vars()); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-0 form-secure-checkout content-subscription-template box-infomation-payment">
                <div class="box-your-information">
                    <div class="title-your-information">Payments & Discounts</div>

                        <?php MeprHooks::do_action('mepr-before-coupon-field'); //Deprecated ?>
                        <?php MeprHooks::do_action('mepr-checkout-before-coupon-field', $product->ID); ?>

                        <div id="accordion" class="box-payment-method">
                            <div class="payment-header bd-none">
                                <h3 class="mb-0 text-left" data-toggle="collapse" data-target="#couponCode" aria-expanded="false" aria-controls="couponCode">
                                    Add coupons
                                    <span class="icon-bottom-gray"></span>
                                </h3>
                            </div>

                            <?php if ($product->adjusted_price($mepr_coupon_code) > 0.00 || !empty($product->plan_code)): ?>
                                <?php if ($mepr_options->coupon_field_enabled): ?>
                                <div id="couponCode" class="collapse">
                                    <div class="box-info py-0">
                                        <a class="have-coupon-link d-none" data-prdid="<?php echo $product->ID; ?>" href="">
                                            <?php echo MeprCouponsHelper::show_coupon_field_link_content($mepr_coupon_code); ?>
                                        </a>
                                        <div class="mp-form-row mepr_coupon mepr_coupon_<?php echo $product->ID; ?>">
                                            <div class="mp-form-label">
                                                <span class="mepr-coupon-loader mepr-hidden">
                                                  <img src="<?php echo includes_url('js/thickbox/loadingAnimation.gif'); ?>" width="100" height="10"/>
                                                </span>
                                                <span class="cc-error"><?php _ex('Invalid Coupon', 'ui', 'memberpress'); ?></span>
                                            </div>
                                            <input type="text" placeholder="<?php _ex('Enter coupon code', 'ui', 'memberpress'); ?>" id="mepr_coupon_code-<?php echo $product->ID; ?>" class="mepr-form-input mepr-coupon-code" name="mepr_coupon_code" value="<?php echo (isset($mepr_coupon_code)) ? esc_attr(stripslashes($mepr_coupon_code)) : ''; ?>" data-prdid="<?php echo $product->ID; ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                        <input type="hidden" id="mepr_coupon_code-<?php echo $product->ID; ?>" name="mepr_coupon_code" value="<?php echo (isset($mepr_coupon_code)) ? esc_attr(stripslashes($mepr_coupon_code)) : ''; ?>"/>
                                <?php endif; ?>


                                <div class="payment-header">
                                    <?php if (sizeof($payment_methods) > 1): ?>
                                        <h3 class="mb-0 text-left" data-toggle="collapse" data-target="#paymentMethod" aria-expanded="true" aria-controls="paymentMethod">
                                            <?php _ex('Payment Method', 'ui', 'memberpress'); ?>
                                            <span class="icon-bottom-gray"></span>
                                        </h3>
                                    <?php endif; ?>
                                </div>
                                <div id="paymentMethod" class="collapse show">
                                    <div class="box-info py-0">
                                        <div id="mepr-payment-methods-wrapper">
                                            <div class="mepr-payment-methods-radios<?php echo sizeof($payment_methods) === 1 ? ' mepr-hidden' : ''; ?>">
                                                <?php echo MeprOptionsHelper::payment_methods_radios($payment_methods); ?>
                                            </div>
                                            <?php if (sizeof($payment_methods) > 1): ?>
                                                <hr/>
                                            <?php endif; ?>
                                            <div class="mepr-payment-methods-icons">
                                                <?php echo MeprOptionsHelper::payment_methods_icons($payment_methods); ?>
                                            </div>
                                            <?php echo MeprOptionsHelper::payment_methods_descriptions($payment_methods); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                    <input type="hidden" id="mepr_coupon_code-<?php echo $product->ID; ?>" name="mepr_coupon_code" value="<?php echo (isset($mepr_coupon_code)) ? esc_attr(stripslashes($mepr_coupon_code)) : ''; ?>"/>
                            <?php endif; ?>



                        <?php if (!MeprUtils::is_user_logged_in()): ?>
                            <?php if ($mepr_options->require_tos): ?>
                                <div class="mp-form-row mepr_tos">
                                    <label for="mepr_agree_to_tos" class="mepr-checkbox-field mepr-form-input">
                                        <!-- don't mark this required, we'll let PHP validate it -->
                                        <input type="checkbox" name="mepr_agree_to_tos"
                                               id="mepr_agree_to_tos" <?php checked(isset($mepr_agree_to_tos)); ?> />
                                        <a href="<?php echo stripslashes($mepr_options->tos_url); ?>" target="_blank"
                                           rel="noopener noreferrer"><?php echo stripslashes($mepr_options->tos_title); ?></a>*
                                    </label>
                                </div>
                            <?php endif; ?>

                            <?php // This thing needs to be hidden in order for this to work so we do it explicitly as a style ?>
                            <input type="text" id="mepr_no_val" name="mepr_no_val" class="mepr-form-input"
                                   autocomplete="off"/>
                        <?php endif; ?>

                        <?php if ($mepr_options->require_privacy_policy && $privacy_page_link = MeprAppHelper::privacy_policy_page_link()): ?>
                            <div class="mp-form-row">
                                <label for="mepr_agree_to_privacy_policy" class="mepr-checkbox-field mepr-form-input">
                                    <input type="checkbox" name="mepr_agree_to_privacy_policy"
                                           id="mepr_agree_to_privacy_policy"/>
                                    <?php echo preg_replace('/%(.*)%/', '<a href="' . $privacy_page_link . '" target="_blank">$1</a>', __($mepr_options->privacy_policy_title, 'memberpress')); ?>
                                </label>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="box-no-risk-money">
                    <b>100% No-Risk Money Back Guarantee!</b> <br>
                    You are completely protected by our 100% No-Risk Guarantee. If you don’t like EnvZone over the next
                    14 days, we’ll happily refund 100% of your money. No questions asked.
                </div>
            </div>
            <div class="col-lg-4 order-2 form-secure-checkout box-infomation-subscription-sumary">
                <div class="box-subscription-summary">
                    <div class="title-form">Subscription Summary</div>

                    <div class="box-info">
                        <div class="subtitle-summary">Plan</div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuPlan"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $plan_name; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuPlan">
                                <a class="dropdown-item" href="<?php echo home_url('register/growing-business/'); ?>">Growing
                                    Business</a>
                                <a class="dropdown-item" href="<?php echo home_url('register/main-street/'); ?>">Main
                                    Street</a>
                                <a class="dropdown-item" href="<?php echo home_url('register/high-growth/'); ?>">High
                                    Growth</a>
                            </div>
                        </div>

                        <div class="subtitle-summary">Term</div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuTerm"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $term_name; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuTerm">
                                <a class="dropdown-item" href="<?php echo $full_url; ?>"><?php echo $term_more; ?></a>
                            </div>
                        </div>

                        <div class="box-total d-flex justify-content-between">
                            <span class="total">Recurring monthly cost</span>
                            <span class="total">$<?php echo $price_plan; ?></span>
                        </div>
                        <div class="box-total due-today d-flex justify-content-between">
                            <span class="total">Due today</span>
                            <span class="total"><?php MeprProductsHelper::display_invoice($product, $mepr_coupon_code); ?></span>
                        </div>
                    </div>
                </div>

                <div class="term-policy-condition">
                    By signing up, I agree to the EnvZone <a href="<?php echo home_url('privacy-policy'); ?>">Privacy
                        Policy</a> and <a href="<?php echo home_url('terms-of-use'); ?>">Terms of Use</a>.
                </div>

                <?php MeprHooks::do_action('mepr-user-signup-fields'); //Deprecated ?>
                <?php MeprHooks::do_action('mepr-checkout-before-submit', $product->ID); ?>

                <div class="mepr_spacer">&nbsp;</div>

                <div class="mp-form-submit">
                    <input type="submit" class="mepr-submit"
                           value="<?php echo stripslashes($product->signup_button_text); ?>"/>
                    <img src="<?php echo admin_url('images/loading.gif'); ?>" style="display: none;"
                         class="mepr-loading-gif"/>
                    <?php MeprView::render('/shared/has_errors', get_defined_vars()); ?>
                </div>

                <div class="secure-payments">
                    <img src="<?php echo ASSET_URL; ?>images/img-secure-stripe.png" alt="">
                </div>
            </div>
        </div>
    </form>
</div>
