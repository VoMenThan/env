<?php if (!defined('ABSPATH')) {
    die('You are not allowed to call this page directly.');
} ?>

<div class="account-setting-tab">
    <h1>Account settings</h1>

    <?php if (!empty($mepr_current_user->user_message)): ?>
        <div id="mepr-account-user-message">
            <?php echo MeprHooks::apply_filters('mepr-user-message', wpautop(do_shortcode($mepr_current_user->user_message)), $mepr_current_user); ?>
        </div>
    <?php endif; ?>

    <?php MeprView::render('/shared/errors', get_defined_vars()); ?>
    <div class="box-card">
        <div class="card-header" id="headingProfile">
            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile">
                Profile settings
            </h5>
        </div>

        <div id="collapseProfile" class="collapse show" aria-labelledby="headingProfile">
            <div class="card-body">
                <div class="group-name">Additional information</div>
                <div class="mp_wrapper">

                    <form class="mepr-account-form mepr-form clearfix" id="mepr_account_form" action="" method="post" novalidate>
                        <input type="hidden" name="mepr-process-account" value="Y"/>
                        <?php wp_nonce_field('update_account', 'mepr_account_nonce'); ?>

                        <?php MeprHooks::do_action('mepr-account-home-before-name', $mepr_current_user); ?>

                        <?php if ($mepr_options->show_fname_lname): ?>
                            <div class="mp-form-row mepr_first_name">
                                <div class="mp-form-label">
                                    <label for="user_first_name"><?php _ex('First Name:', 'ui', 'memberpress');
                                        echo ($mepr_options->require_fname_lname) ? '*' : ''; ?></label>
                                    <span class="cc-error"><?php _ex('First Name Required', 'ui', 'memberpress'); ?></span>
                                </div>
                                <input type="text" name="user_first_name" id="user_first_name" class="mepr-form-input"
                                       value="<?php echo $mepr_current_user->first_name; ?>" <?php echo ($mepr_options->require_fname_lname) ? 'required' : ''; ?> />
                            </div>
                            <div class="mp-form-row mepr_last_name">
                                <div class="mp-form-label">
                                    <label for="user_last_name"><?php _ex('Last Name:', 'ui', 'memberpress');
                                        echo ($mepr_options->require_fname_lname) ? '*' : ''; ?></label>
                                    <span class="cc-error"><?php _ex('Last Name Required', 'ui', 'memberpress'); ?></span>
                                </div>
                                <input type="text" id="user_last_name" name="user_last_name" class="mepr-form-input"
                                       value="<?php echo $mepr_current_user->last_name; ?>" <?php echo ($mepr_options->require_fname_lname) ? 'required' : ''; ?> />
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="user_first_name" value="<?php echo $mepr_current_user->first_name; ?>"/>
                            <input type="hidden" name="user_last_name" value="<?php echo $mepr_current_user->last_name; ?>"/>
                        <?php endif; ?>
                        <div class="mp-form-row mepr_email">
                            <div class="mp-form-label">
                                <label for="user_email"><?php _ex('Email:*', 'ui', 'memberpress'); ?></label>
                                <span class="cc-error"><?php _ex('Invalid Email', 'ui', 'memberpress'); ?></span>
                            </div>
                            <input type="email" id="user_email" name="user_email" class="mepr-form-input"
                                   value="<?php echo $mepr_current_user->user_email; ?>" required/>
                        </div>
                        <?php
                        MeprUsersHelper::render_custom_fields(null, 'account');
                        MeprHooks::do_action('mepr-account-home-fields', $mepr_current_user);
                        ?>

                        <div class="mepr_spacer clearfix">&nbsp;</div>

                        <button type="submit" name="mepr-account-form" class="mepr-submit mepr-share-button"><?php _ex('Save changes', 'ui', 'memberpress'); ?></button>
                        <img src="<?php echo admin_url('images/loading.gif'); ?>" style="display: none;" class="mepr-loading-gif"/>
                        <?php MeprView::render('/shared/has_errors', get_defined_vars()); ?>
                    </form>

                    <?php if (!defined('ABSPATH')) {
                        die('You are not allowed to call this page directly.');
                    } ?>
                    <?php MeprHooks::do_action('mepr_account_home', $mepr_current_user); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="box-card">
        <div class="card-header" id="headingPassword">
            <h5 class="mb-0" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="true" aria-controls="collapsePassword">
                Password
            </h5>
        </div>

        <div id="collapsePassword" class="collapse show" aria-labelledby="headingPassword">
            <div class="card-body">
                <div class="group-name">Change password</div>
                <div class="mp_wrapper">
                    <form action="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>"
                          class="mepr-newpassword-form mepr-form clearfix" method="post" novalidate>
                        <input type="hidden" name="plugin" value="mepr"/>
                        <input type="hidden" name="action" value="updatepassword"/>
                        <?php wp_nonce_field('update_password', 'mepr_account_nonce'); ?>

                        <div class="mp-form-row mepr_new_password">
                            <label for="mepr-new-password"><?php _ex('New password', 'ui', 'memberpress'); ?></label>
                            <input type="password" name="mepr-new-password" class="mepr-form-input mepr-new-password" required/>
                        </div>
                        <div class="mp-form-row mepr_confirm_password pr-fix">
                            <label for="mepr-confirm-password"><?php _ex('Confirm password', 'ui', 'memberpress'); ?></label>
                            <input type="password" name="mepr-confirm-password"
                                   class="mepr-form-input mepr-new-password-confirm" required/>
                        </div>
                        <?php MeprHooks::do_action('mepr-account-after-password-fields', $mepr_current_user); ?>

                        <div class="mepr_spacer clearfix">&nbsp;</div>

                        <button type="submit" name="new-password-submitm" class="mepr-submit">
                            <?php _ex('Save changes', 'ui', 'memberpress'); ?>
                        </button>
                        <img src="<?php echo admin_url('images/loading.gif'); ?>" style="display: none;"
                             class="mepr-loading-gif"/>
                        <?php MeprView::render('/shared/has_errors', get_defined_vars()); ?>
                    </form>

                    <?php MeprHooks::do_action('mepr_account_password', $mepr_current_user); ?>
                </div>
            </div>
        </div>
    </div>
</div>
