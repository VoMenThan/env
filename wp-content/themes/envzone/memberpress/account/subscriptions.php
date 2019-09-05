<?php
if (!defined('ABSPATH')) {
    die('You are not allowed to call this page directly.');
}

MeprHooks::do_action('mepr_before_account_subscriptions', $mepr_current_user);

if (!empty($subscriptions)) {
    $alt = false;
    ?>
    <div class="col-lg-7 order-2">
        <div class="mp_wrapper no-print">
            <div class="account-setting-tab">
                <h1>
                    <?php _ex('Plans & Services', 'ui', 'memberpress'); ?>
                </h1>
                <div class="box-card">
                    <div class="card-header" id="headingPlansServices">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapsePlansServices" aria-expanded="true" aria-controls="collapsePlansServices">
                            <?php _ex('Products & services', 'ui', 'memberpress'); ?>
                        </h5>
                    </div>
                    <div id="collapsePlansServices" class="collapse show" aria-labelledby="feature">
                        <div class="card-body">
                            <div class="group-name"></div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" >
                                            <?php _ex('Name', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Billed', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Status', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Member since', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Renews on', 'ui', 'memberpress'); ?>
                                        </th>
                                        <?php MeprHooks::do_action('mepr-account-subscriptions-th', $mepr_current_user, $subscriptions); ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($subscriptions as $s):
                                            if (trim($s->sub_type) == 'transaction') {
                                                $is_sub = false;
                                                $txn = $sub = new MeprTransaction($s->id);
                                                $pm = $txn->payment_method();
                                                $prd = $txn->product();
                                                $group = $prd->group();
                                                $default = _x('Never', 'ui', 'memberpress');
                                                if ($txn->txn_type == MeprTransaction::$fallback_str && $mepr_current_user->subscription_in_group($group)) {
                                                    //Skip fallback transactions when user has an active sub in the fallback group
                                                    continue;
                                                }
                                            } else {
                                                $is_sub = true;
                                                $sub = new MeprSubscription($s->id);
                                                $txn = $sub->latest_txn();
                                                $pm = $sub->payment_method();
                                                $prd = $sub->product();
                                                $group = $prd->group();

                                                if ($txn == false || !($txn instanceof MeprTransaction) || $txn->id <= 0) {
                                                    $default = _x('Unknown', 'ui', 'memberpress');
                                                } else if (trim($txn->expires_at) == MeprUtils::db_lifetime() or empty($txn->expires_at)) {
                                                    $default = _x('Never', 'ui', 'memberpress');
                                                } else {
                                                    $default = _x('Unknown', 'ui', 'memberpress');
                                                }
                                            }

                                            $mepr_options = MeprOptions::fetch();
                                            $alt = !$alt; // Facilitiates the alternating lines
                                            ?>
                                        <tr>
                                            <td>
                                                <!-- MEMBERSHIP ACCESS URL -->
                                                <?php if (isset($prd->access_url) && !empty($prd->access_url)): ?>
                                                    <div class="mepr-account-product"><a
                                                                href="<?php echo stripslashes($prd->access_url); ?>"><?php echo MeprHooks::apply_filters('mepr-account-subscr-product-name', $prd->post_title, $txn); ?></a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="mepr-account-product"><?php echo MeprHooks::apply_filters('mepr-account-subscr-product-name', $prd->post_title, $txn); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php
                                                 echo ($sub->rec->period_type=='years')?'Yearly':'Monthly';
                                                ?>
                                            </td>
                                            <td style="text-align: right">
                                                <div class="mepr-account-active"><?php echo (strip_tags($s->active)=='Yes')?'<span class="active">Active</span>':'<span class="inactive">Inactive</span>';?></div>
                                            </td>
                                            <td style="text-align: right">
                                                <?php if ($txn != false && $txn instanceof MeprTransaction && $txn->is_sub_account()): ?>
                                                    <div>--</div>
                                                <?php else: ?>
                                                    <div class="mepr-account-created-at"><?php echo MeprAppHelper::format_date($s->created_at); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php if ($txn != false && $txn instanceof MeprTransaction && $txn->is_sub_account()): ?>
                                                    <div>--</div>
                                                <?php else: ?>
                                                    <div class="mepr-account-expires-at">
                                                        <?php if ($txn != false && $txn instanceof MeprTransaction && $txn->txn_type == MeprTransaction::$payment_str || ($is_sub && !$sub->in_grace_period())) {
                                                            echo MeprAppHelper::format_date($s->expires_at, $default);
                                                        } elseif ($txn != false && $txn instanceof MeprTransaction && $txn->txn_type == MeprTransaction::$fallback_str) {
                                                            _ex('Never', 'ui', 'memberpress');
                                                        } else {
                                                            _ex('processing', 'ui', 'memberpress');
                                                        }
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php MeprHooks::do_action('mepr-account-subscriptions-table', $mepr_current_user, $subscriptions); ?>
                                        <div id="mepr-subscriptions-paging">
                                            <?php if ($prev_page): ?>
                                                <a href="<?php echo "{$account_url}{$delim}currpage={$prev_page}"; ?>">&lt;&lt; <?php _ex('Previous Page', 'ui', 'memberpress'); ?></a>
                                            <?php endif; ?>
                                            <?php if ($next_page): ?>
                                                <a href="<?php echo "{$account_url}{$delim}currpage={$next_page}"; ?>"
                                                   style="float:right;"><?php _ex('Next Page', 'ui', 'memberpress'); ?> &gt;&gt;</a>
                                            <?php endif; ?>
                                        </div>
                                        <div style="clear:both"></div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-card">
                    <div class="card-header" id="headingPurchaseServices">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapsePurchaseServices" aria-expanded="true" aria-controls="collapsePurchaseServices">
                            <?php _ex('Purchase services', 'ui', 'memberpress'); ?>
                        </h5>
                    </div>
                    <div id="collapsePurchaseServices" class="collapse show" aria-labelledby="feature">
                        <div class="card-body">
                            <div class="group-name">
                                <?php _ex('Choose an appointment type following that you need support for your asset', 'ui', 'memberpress'); ?>
                            </div>
                            <div class="mp_wrapper">
                                <div class="clearfix">


                                    <div class="item-shadow-account item-ticket-portal">
                                        <h3 class="title-shadow">
                                            Main-Street
                                        </h3>
                                        <a href="<?php echo home_url('register/main-street');?>" class="link-shadow">Upgrade</a>
                                    </div>

                                    <div class="item-shadow-account item-ticket-portal">
                                        <h3 class="title-shadow">
                                            High Growth
                                        </h3>
                                        <a href="<?php echo home_url('register/high-growth');?>" class="link-shadow">Upgrade</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-card">
                    <div class="card-header" id="headingInvoices">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseInvoices" aria-expanded="true" aria-controls="collapseInvoices">
                            <?php _ex('Invoices', 'ui', 'memberpress'); ?>
                        </h5>
                    </div>
                    <div id="collapseInvoices" class="collapse show" aria-labelledby="feature">
                        <div class="card-body">
                            <div class="group-name"></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" >
                                            <?php _ex('Invoice date', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Total', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Method', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Status', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Invoice number', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right">
                                            <?php _ex('Download', 'ui', 'memberpress'); ?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($subscriptions as $s):
                                        if (trim($s->sub_type) == 'transaction') {
                                            $is_sub = false;
                                            $txn = $sub = new MeprTransaction($s->id);
                                            $pm = $txn->payment_method();
                                            $prd = $txn->product();
                                            $group = $prd->group();
                                            $default = _x('Never', 'ui', 'memberpress');
                                            if ($txn->txn_type == MeprTransaction::$fallback_str && $mepr_current_user->subscription_in_group($group)) {
                                                //Skip fallback transactions when user has an active sub in the fallback group
                                                continue;
                                            }
                                        } else {
                                            $is_sub = true;
                                            $sub = new MeprSubscription($s->id);
                                            $txn = $sub->latest_txn();
                                            $pm = $sub->payment_method();
                                            $prd = $sub->product();
                                            $group = $prd->group();

                                            if ($txn == false || !($txn instanceof MeprTransaction) || $txn->id <= 0) {
                                                $default = _x('Unknown', 'ui', 'memberpress');
                                            } else if (trim($txn->expires_at) == MeprUtils::db_lifetime() or empty($txn->expires_at)) {
                                                $default = _x('Never', 'ui', 'memberpress');
                                            } else {
                                                $default = _x('Unknown', 'ui', 'memberpress');
                                            }
                                        }

                                        $mepr_options = MeprOptions::fetch();
                                        $alt = !$alt; // Facilitiates the alternating lines
                                        ?>
                                        <tr>
                                            <td>
                                                <?php if ($txn != false && $txn instanceof MeprTransaction && $txn->is_sub_account()): ?>
                                                    <div>--</div>
                                                <?php else: ?>
                                                    <div class="mepr-account-created-at"><?php echo MeprAppHelper::format_date($s->created_at); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php if ($prd->register_price_action != 'hidden'): ?>
                                                    <?php
                                                    if ($txn != false && $txn instanceof MeprTransaction && $txn->is_sub_account()) {
                                                        MeprHooks::do_action('mepr_account_subscriptions_sub_account_terms', $txn);
                                                    } else {
                                                        if ($prd->register_price_action == 'custom' && !empty($prd->register_price)) {
                                                            //Add coupon in if one was used eh
                                                            $coupon_str = '';
                                                            if ($is_sub) {
                                                                $subscr = new MeprSubscription($s->id);

                                                                if ($subscr->coupon_id && ($coupon = new MeprCoupon($subscr->coupon_id)) && isset($coupon->ID) && $coupon->ID) {
                                                                    $coupon_str = ' ' . _x('with coupon', 'ui', 'memberpress') . ' ' . $coupon->post_title;
                                                                }
                                                            }

                                                            echo stripslashes($prd->register_price) . $coupon_str;
                                                        } else if ($txn != false && $txn instanceof MeprTransaction) {
                                                            echo MeprTransactionsHelper::format_currency($txn);
                                                        }
                                                    }
                                                    ?>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php echo $pm->label;?>
                                            </td>
                                            <td style="text-align: right">
                                                Paid
                                            </td>
                                            <td style="text-align: right">
                                                <?php if ($txn != false && $txn instanceof MeprTransaction && !$txn->is_sub_account()): ?>
                                                    <div class="mepr-account-subscr-id"><?php echo $s->subscr_id; ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: right">
                                                <a href="javascript:window.print()" class="active">
                                                    PDF
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php MeprHooks::do_action('mepr-account-subscriptions-table', $mepr_current_user, $subscriptions); ?>
                                    </tbody>
                                </table>

                                <div id="mepr-subscriptions-paging">
                                    <?php if ($prev_page): ?>
                                        <a href="<?php echo "{$account_url}{$delim}currpage={$prev_page}"; ?>">&lt;&lt; <?php _ex('Previous Page', 'ui', 'memberpress'); ?></a>
                                    <?php endif; ?>
                                    <?php if ($next_page): ?>
                                        <a href="<?php echo "{$account_url}{$delim}currpage={$next_page}"; ?>"
                                           style="float:right;"><?php _ex('Next Page', 'ui', 'memberpress'); ?> &gt;&gt;</a>
                                    <?php endif; ?>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-card">
                    <div class="card-header" id="headingBillingPayments">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseBillingPayments" aria-expanded="true" aria-controls="collapseBillingPayments">
                            <?php _ex('Payment methods', 'ui', 'memberpress'); ?>
                        </h5>
                    </div>
                    <div id="collapseBillingPayments" class="collapse show" aria-labelledby="feature">
                        <div class="card-body">
                            <div class="group-name"></div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" colspan="2" style="width: 50%">
                                            <?php _ex('Card', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="width: 20%; text-align: right">
                                            <?php _ex('Expiration date', 'ui', 'memberpress'); ?>
                                        </th>
                                        <th scope="col" style="text-align: right; width: 30%">
                                            <?php _ex('Type', 'ui', 'memberpress'); ?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($subscriptions as $s):
                                        if (trim($s->sub_type) == 'transaction') {
                                            $is_sub = false;
                                            $txn = $sub = new MeprTransaction($s->id);
                                            $pm = $txn->payment_method();
                                            $prd = $txn->product();
                                            $group = $prd->group();
                                            $default = _x('Never', 'ui', 'memberpress');
                                            if ($txn->txn_type == MeprTransaction::$fallback_str && $mepr_current_user->subscription_in_group($group)) {
                                                //Skip fallback transactions when user has an active sub in the fallback group
                                                continue;
                                            }
                                        } else {
                                            $is_sub = true;
                                            $sub = new MeprSubscription($s->id);
                                            $txn = $sub->latest_txn();
                                            $pm = $sub->payment_method();
                                            $prd = $sub->product();
                                            $group = $prd->group();

                                            if ($txn == false || !($txn instanceof MeprTransaction) || $txn->id <= 0) {
                                                $default = _x('Unknown', 'ui', 'memberpress');
                                            } else if (trim($txn->expires_at) == MeprUtils::db_lifetime() or empty($txn->expires_at)) {
                                                $default = _x('Never', 'ui', 'memberpress');
                                            } else {
                                                $default = _x('Unknown', 'ui', 'memberpress');
                                            }
                                        }

                                        $mepr_options = MeprOptions::fetch();
                                        $alt = !$alt; // Facilitiates the alternating lines
                                        if($pm->name != 'Stripe') continue;

                                        ?>
                                        <tr>
                                            <td>
                                                *****
                                            </td>
                                            <td style="text-align: right">
                                                <a class="edit-card" title="Update" href="<?php echo home_url("subscription-account/?action=update&sub=".$s->id);?>">
                                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 24C20.5304 24 21.0391 24.2107 21.4142 24.5858C21.7893 24.9609 22 25.4696 22 26C22 26.5304 21.7893 27.0391 21.4142 27.4142C21.0391 27.7893 20.5304 28 20 28C19.4696 28 18.9609 27.7893 18.5858 27.4142C18.2107 27.0391 18 26.5304 18 26C18 25.4696 18.2107 24.9609 18.5858 24.5858C18.9609 24.2107 19.4696 24 20 24ZM20 18C20.5304 18 21.0391 18.2107 21.4142 18.5858C21.7893 18.9609 22 19.4696 22 20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22C19.4696 22 18.9609 21.7893 18.5858 21.4142C18.2107 21.0391 18 20.5304 18 20C18 19.4696 18.2107 18.9609 18.5858 18.5858C18.9609 18.2107 19.4696 18 20 18ZM20 12C20.5304 12 21.0391 12.2107 21.4142 12.5858C21.7893 12.9609 22 13.4696 22 14C22 14.5304 21.7893 15.0391 21.4142 15.4142C21.0391 15.7893 20.5304 16 20 16C19.4696 16 18.9609 15.7893 18.5858 15.4142C18.2107 15.0391 18 14.5304 18 14C18 13.4696 18.2107 12.9609 18.5858 12.5858C18.9609 12.2107 19.4696 12 20 12Z" fill="#78909C"/>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td style="text-align: right">
                                                <?php if($txn != false && $txn instanceof MeprTransaction && $txn->is_sub_account()): ?>
                                                    <div>--</div>
                                                <?php else: ?>
                                                    <div class="mepr-account-expires-at">
                                                        <?php if($txn != false && $txn instanceof MeprTransaction && $txn->txn_type == MeprTransaction::$payment_str || ($is_sub && !$sub->in_grace_period())) {
                                                            echo MeprAppHelper::format_date($s->expires_at, $default);
                                                        }
                                                        elseif($txn != false && $txn instanceof MeprTransaction && $txn->txn_type == MeprTransaction::$fallback_str) {
                                                            _ex('Never', 'ui', 'memberpress');
                                                        }
                                                        else {
                                                            _ex('processing', 'ui', 'memberpress');
                                                        }
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php echo $pm->label;?>
                                            </td>
                                            <?php MeprHooks::do_action('mepr-account-subscriptions-td', $mepr_current_user, $s, $txn, $is_sub); ?>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php MeprHooks::do_action('mepr-account-subscriptions-table', $mepr_current_user, $subscriptions); ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $s = $subscriptions[0];

            if (trim($s->sub_type) == 'transaction') {
                $is_sub = false;
                $txn = $sub = new MeprTransaction($s->id);
                $pm = $txn->payment_method();
                $prd = $txn->product();
                $group = $prd->group();
                $default = _x('Never', 'ui', 'memberpress');
            } else {
                $is_sub = true;
                $sub = new MeprSubscription($s->id);
                $txn = $sub->latest_txn();
                $pm = $sub->payment_method();
                $prd = $sub->product();
                $group = $prd->group();

                if ($txn == false || !($txn instanceof MeprTransaction) || $txn->id <= 0) {
                    $default = _x('Unknown', 'ui', 'memberpress');
                } else if (trim($txn->expires_at) == MeprUtils::db_lifetime() or empty($txn->expires_at)) {
                    $default = _x('Never', 'ui', 'memberpress');
                } else {
                    $default = _x('Unknown', 'ui', 'memberpress');
                }
            }
        ?>
        <div class="mp_wrapper d-none box-print-account">
            <div class="row">
                <div class="col-6">
                    <h1>INVOICE</h1>
                    <h2>
                        Thank you for using EnvZone!
                    </h2>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <img class="img-fluid logo-env" src="<?php echo ASSET_URL;?>images/logo-env-printer.png" alt="Logo Envzone">
                </div>

                <div class="col-6">
                    <h3>Bill To</h3>
                    <ul>
                        <li><?php echo do_shortcode('[mepr-account-info field="mepr_company"]')?></li>
                        <li><?php echo do_shortcode('[mepr-account-info field="full_name"]')?></li>
                        <li><?php echo do_shortcode('[mepr-account-info field="user_email"]')?></li>
                    </ul>
                </div>
                <div class="col-6">
                    <h3>Payment Info</h3>
                    <ul>
                        <li>
                            Account ID: <?php echo $subscriptions[0]->user_id;?>
                        </li>
                        <li>
                            Invoice #: <?php echo $subscriptions[0]->subscr_id;?>
                        </li>
                        <li>
                            Invoice Date: <?php echo $subscriptions[0]->created_at;?>
                        </li>
                        <li>
                            Payment Due By: <?php echo $subscriptions[0]->expires_at;?>
                        </li>
                    </ul>

                    <ul>
                        <li>
                            Tranasction #: <?php echo $subscriptions[0]->subscr_id;?>
                        </li>
                        <li>
                            Payment Method: <?php echo $pm->label;?>
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <h3 class="d-flex justify-content-between">
                        <span>Service</span>
                        <span>Price (USD)</span>
                    </h3>
                    <ul class="d-flex justify-content-between">
                        <li>
                            <!-- MEMBERSHIP ACCESS URL -->
                            <?php if (isset($prd->access_url) && !empty($prd->access_url)): ?>
                                <div class="mepr-account-product"><a
                                            href="<?php echo stripslashes($prd->access_url); ?>"><?php echo MeprHooks::apply_filters('mepr-account-subscr-product-name', $prd->post_title, $txn); ?></a>
                                </div>
                            <?php else: ?>
                                <div class="mepr-account-product"><?php echo MeprHooks::apply_filters('mepr-account-subscr-product-name', $prd->post_title, $txn); ?></div>
                            <?php endif; ?>
                        </li>
                        <li>
                            <?php if ($prd->register_price_action != 'hidden'): ?>
                                <?php
                                if ($txn != false && $txn instanceof MeprTransaction && $txn->is_sub_account()) {
                                    MeprHooks::do_action('mepr_account_subscriptions_sub_account_terms', $txn);
                                } else {
                                    if ($prd->register_price_action == 'custom' && !empty($prd->register_price)) {
                                        //Add coupon in if one was used eh
                                        $coupon_str = '';
                                        if ($is_sub) {
                                            $subscr = new MeprSubscription($s->id);

                                            if ($subscr->coupon_id && ($coupon = new MeprCoupon($subscr->coupon_id)) && isset($coupon->ID) && $coupon->ID) {
                                                $coupon_str = ' ' . _x('with coupon', 'ui', 'memberpress') . ' ' . $coupon->post_title;
                                            }
                                        }

                                        echo stripslashes($prd->register_price) . $coupon_str;
                                    } else if ($txn != false && $txn instanceof MeprTransaction) {
                                        echo MeprTransactionsHelper::format_currency($txn);
                                    }
                                }
                                ?>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="col-4 offset-8 d-flex justify-content-end">
                    <table>
                        <tr>
                            <td>Sales Tax:</td>
                            <td>$0</td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td>
                                <?php if ($prd->register_price_action != 'hidden'): ?>
                                    <?php
                                    if ($txn != false && $txn instanceof MeprTransaction && $txn->is_sub_account()) {
                                        MeprHooks::do_action('mepr_account_subscriptions_sub_account_terms', $txn);
                                    } else {
                                        if ($prd->register_price_action == 'custom' && !empty($prd->register_price)) {
                                            //Add coupon in if one was used eh
                                            $coupon_str = '';
                                            if ($is_sub) {
                                                $subscr = new MeprSubscription($s->id);

                                                if ($subscr->coupon_id && ($coupon = new MeprCoupon($subscr->coupon_id)) && isset($coupon->ID) && $coupon->ID) {
                                                    $coupon_str = ' ' . _x('with coupon', 'ui', 'memberpress') . ' ' . $coupon->post_title;
                                                }
                                            }

                                            echo stripslashes($prd->register_price) . $coupon_str;
                                        } else if ($txn != false && $txn instanceof MeprTransaction) {
                                            echo MeprTransactionsHelper::format_currency($txn);
                                        }
                                    }
                                    ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>Paid</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 box-space"></div>
                <div class="col-6">
                    <ul>
                        <li><?php echo do_shortcode('[mepr-account-info field="mepr_company"]')?></li>
                        <li><?php echo do_shortcode('[mepr-account-info field="mepr_company_address"]')?></li>
                        <li><?php echo do_shortcode('[mepr-account-info field="mepr_city"]')?>, <?php echo do_shortcode('[mepr-account-info field="mepr_state"]')?></li>
                    </ul>
                </div>
                <div class="col-6">
                    <p>Questions? <br>
                        General billing inquiries: billing@envzone.com
                        For additional billing assistance or to pay by credit card, submit a case by visiting: Support
                    </p>
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

MeprHooks::do_action('mepr_account_subscriptions', $mepr_current_user);
