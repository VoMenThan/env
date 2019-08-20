<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>

<?php
if(isset($expired_subs) and !empty($expired_subs)) {
  $account_url = MeprUtils::get_permalink(); // $mepr_options->account_page_url();
  $sub_label = MeprHooks::apply_filters('mepr-account-nav-subscriptions-label',_x('Subscriptions', 'ui', 'memberpress'));
  $delim = preg_match('#\?#',$account_url) ? '&' : '?';
  $errors = array(sprintf(_x('You have a problem with one or more of your %1$s. To prevent any lapses in your %1$s please visit your %2$s%3$s%4$s page to update them.', 'ui', 'memberpress'),strtolower($sub_label),'<a href="'.$account_url.$delim.'action=subscriptions">',$sub_label,'</a>'));
  MeprView::render('/shared/errors', get_defined_vars());
}
