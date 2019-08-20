<div class="account-setting-tab">
<h1>Change Password</h1>

<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>


    <?php if (!empty($mepr_current_user->user_message)): ?>
        <div id="mepr-account-user-message">
            <?php echo MeprHooks::apply_filters('mepr-user-message', wpautop(do_shortcode($mepr_current_user->user_message)), $mepr_current_user); ?>
        </div>
    <?php endif; ?>

    <?php MeprView::render('/shared/errors', get_defined_vars()); ?>
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