<?php
if (!defined('ABSPATH')) {
    die('You are not allowed to call this page directly.');
}

if (!empty($payments)) {
    ?>
    <div class="col-lg-7 order-2">

        <div class="mp_wrapper">
            <div class="account-setting-tab">
                <h1>Billing & Payments</h1>
                <div class="box-card">
                    <div class="card-header" id="headingBillingPayments">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseBillingPayments" aria-expanded="true" aria-controls="collapseBillingPayments">
                            <?php _ex('Payment methods', 'ui', 'memberpress'); ?>
                        </h5>
                    </div>
                    <div id="collapseBillingPayments" class="collapse show" aria-labelledby="feature">
                        <div class="card-body">
                            <div class="group-name"></div>
                            <table id="mepr-account-payments-table" class="mepr-account-table">
                                <thead>
                                <tr>
                                    <th><?php _ex('Date', 'ui', 'memberpress'); ?></th>
                                    <th><?php _ex('Total', 'ui', 'memberpress'); ?></th>
                                    <th><?php _ex('Membership', 'ui', 'memberpress'); ?></th>
                                    <th><?php _ex('Method', 'ui', 'memberpress'); ?></th>
                                    <th><?php _ex('Status', 'ui', 'memberpress'); ?></th>
                                    <th><?php _ex('Invoice', 'ui', 'memberpress'); ?></th>
                                    <?php MeprHooks::do_action('mepr_account_payments_table_header'); ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($payments as $payment):
                                    $alt = (isset($alt) && !$alt);
                                    $txn = new MeprTransaction($payment->id);
                                    $pm  = $txn->payment_method();
                                    $prd = $txn->product();
                                    ?>
                                    <tr class="mepr-payment-row <?php echo ($alt)?'mepr-alt-row':''; ?>">
                                        <td data-label="<?php _ex('Date', 'ui', 'memberpress'); ?>"><?php echo MeprAppHelper::format_date($payment->created_at); ?></td>
                                        <td data-label="<?php _ex('Total', 'ui', 'memberpress'); ?>"><?php echo MeprAppHelper::format_currency( $payment->total <= 0.00 ? $payment->amount : $payment->total ); ?></td>

                                        <!-- MEMBERSHIP ACCESS URL -->
                                        <?php if(isset($prd->access_url) && !empty($prd->access_url)): ?>
                                            <td data-label="<?php _ex('Membership', 'ui', 'memberpress'); ?>"><a href="<?php echo stripslashes($prd->access_url); ?>"><?php echo MeprHooks::apply_filters('mepr-account-payment-product-name', $prd->post_title, $txn); ?></a></td>
                                        <?php else: ?>
                                            <td data-label="<?php _ex('Membership', 'ui', 'memberpress'); ?>"><?php echo MeprHooks::apply_filters('mepr-account-payment-product-name', $prd->post_title, $txn); ?></td>
                                        <?php endif; ?>

                                        <td data-label="<?php _ex('Method', 'ui', 'memberpress'); ?>"><?php echo (is_object($pm)?$pm->label:_x('Unknown', 'ui', 'memberpress')); ?></td>
                                        <td data-label="<?php _ex('Status', 'ui', 'memberpress'); ?>"><?php echo MeprAppHelper::human_readable_status($payment->status); ?></td>
                                        <td data-label="<?php _ex('Invoice', 'ui', 'memberpress'); ?>"><?php echo $payment->trans_num; ?></td>
                                        <?php MeprHooks::do_action('mepr_account_payments_table_row',$payment); ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div id="mepr-payments-paging">
                                <?php if($prev_page): ?>
                                    <a href="<?php echo $account_url.$delim.'currpage='.$prev_page; ?>">&lt;&lt; <?php _ex('Previous Page', 'ui', 'memberpress'); ?></a>
                                <?php endif; ?>
                                <?php if($next_page): ?>
                                    <a href="<?php echo $account_url.$delim.'currpage='.$next_page; ?>" style="float:right;"><?php _ex('Next Page', 'ui', 'memberpress'); ?> &gt;&gt;</a>
                                <?php endif; ?>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
} else {
    ?>
    <div class="col-lg-7 order-2">
        <div class="mp-wrapper mp-no-subs">
            <div class="account-setting-tab">
                <div class="box-card">
                    <div class="card-header" id="headingProfile">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                            aria-controls="collapseProfile">
                            Feature Locked
                        </h5>
                    </div>

                    <div id="collapseProfile" class="collapse show" aria-labelledby="headingProfile">
                        <div class="card-body">
                            <div class="group-name">
                                <?php _ex('Please purchase a plan to have this feature unlock.', 'ui', 'memberpress'); ?>
                            </div>
                            <div class="mp_wrapper text-center">
                                <svg width="80" height="200" viewBox="0 0 80 80" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M63.7038 29.797V21.4815C63.7038 9.63704 53.0697 0 40.0001 0C26.9304 0 16.2964 9.63704 16.2964 21.4815V29.797C11.2578 30.6652 7.40747 35.0563 7.40747 40.3407V69.2918C7.40747 75.1955 12.2119 80 18.1171 80H61.883C67.7882 80 72.5926 75.1956 72.5926 69.2904V40.3393C72.5926 35.0563 68.7423 30.6652 63.7038 29.797ZM19.2593 21.4815C19.2593 11.2696 28.563 2.96296 40.0001 2.96296C51.4371 2.96296 60.7408 11.2696 60.7408 21.4815V29.6296H19.2593V21.4815ZM69.6297 69.2904C69.6297 73.5615 66.1541 77.037 61.883 77.037H18.1171C13.846 77.037 10.3704 73.5615 10.3704 69.2904V40.3393C10.3704 36.0681 13.846 32.5926 18.1171 32.5926H61.883C66.1541 32.5926 69.6297 36.0681 69.6297 40.3393V69.2904Z"
                                          fill="#BDBDBD"/>
                                    <path d="M40 41.4815C36.7319 41.4815 34.0741 44.1393 34.0741 47.4074V56.2963C34.0741 59.5644 36.7319 62.2222 40 62.2222C43.2682 62.2222 45.9259 59.5644 45.9259 56.2963V47.4074C45.9259 44.1393 43.2682 41.4815 40 41.4815ZM42.963 56.2963C42.963 57.9304 41.6341 59.2593 40 59.2593C38.3659 59.2593 37.0371 57.9304 37.0371 56.2963V47.4074C37.0371 45.7733 38.3659 44.4444 40 44.4444C41.6341 44.4444 42.963 45.7733 42.963 47.4074V56.2963Z"
                                          fill="#BDBDBD"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

MeprHooks::do_action('mepr_account_payments', $mepr_current_user);


?>

