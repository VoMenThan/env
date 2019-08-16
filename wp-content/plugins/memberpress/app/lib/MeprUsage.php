<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

class MeprUsage {
  public function uuid($regenerate=false) {
    $uuid_key = 'mepr-usage-uuid';
    $uuid = get_option($uuid_key);

    if($regenerate || empty($uuid)) {
      // Definitely not cryptographically secure but
      // close enough to provide an unique id
      $uuid = md5(uniqid().site_url());
      update_option($uuid_key,$uuid);
    }

    return $uuid;
  }

  public function snapshot() {
    global $wpdb, $mepr_update;

    $mepr_options = MeprOptions::fetch();

    $txn_stats = MeprReports::transaction_stats();
    $sub_stats = MeprReports::subscription_stats();

    $last_week = MeprUtils::ts_to_mysql_date(time()-MeprUtils::weeks(1));
    $last_month = MeprUtils::ts_to_mysql_date(time()-MeprUtils::days(30));
    $last_year = MeprUtils::ts_to_mysql_date(time()-MeprUtils::days(365));

    $weekly_txn_stats = MeprReports::transaction_stats($last_week);
    $weekly_sub_stats = MeprReports::subscription_stats($last_week);
    $weekly_refund_stats = MeprReports::refund_event_stats($last_week);
    $weekly_cancel_stats = MeprReports::cancel_event_stats($last_week);

    $monthly_txn_stats = MeprReports::transaction_stats($last_month);
    $monthly_sub_stats = MeprReports::subscription_stats($last_month);
    $monthly_refund_stats = MeprReports::refund_event_stats($last_month);
    $monthly_cancel_stats = MeprReports::cancel_event_stats($last_month);

    $yearly_txn_stats = MeprReports::transaction_stats($last_year);
    $yearly_sub_stats = MeprReports::subscription_stats($last_year);
    $yearly_refund_stats = MeprReports::refund_event_stats($last_year);
    $yearly_cancel_stats = MeprReports::cancel_event_stats($last_year);

    $snap = array(
      'uuid'               => $this->uuid(),
      'mp_version'         => MEPR_VERSION,
      'php_version'        => phpversion(),
      'mysql_version'      => $wpdb->db_version(),
      'os'                 => php_uname('s'),
      'webserver'          => $_SERVER["SERVER_SOFTWARE"],
      'active_license'     => MeprUpdateCtrl::is_activated(),
      'edition'            => MEPR_EDITION,
      'all_users'          => MeprReports::get_total_wp_users_count(),
      'all_members'        => MeprReports::get_total_members_count(),
      'active_members'     => MeprReports::get_active_members_count(),
      'inactive_members'   => MeprReports::get_inactive_members_count(),
      'free_members'       => MeprReports::get_free_active_members_count(),
      'timestamp'          => gmdate('c'),
      'memberships'        => $this->memberships(),
      'plugins'            => $this->plugins(),
      'gateways'           => $this->gateways(),
      'ltv'                => MeprReports::get_average_lifetime_value(),
      //'mrr'                => '',
      //'arr'                => '',
      'currency'           => $mepr_options->currency_code,
    );

    if(!empty($weekly_txn_stats)) {
      $snap['week_revenue'] = $weekly_txn_stats->complete_sum_total;
      $snap['week_transactions'] = $weekly_txn_stats->complete;
    }

    if(!empty($monthly_txn_stats)) {
      $snap['month_revenue'] = $monthly_txn_stats->complete_sum_total;
      $snap['month_transactions'] = $monthly_txn_stats->complete;
    }

    if(!empty($yearly_txn_stats)) {
      $snap['year_revenue'] = $yearly_txn_stats->complete_sum_total;
      $snap['year_transactions'] = $yearly_txn_stats->complete;
    }

    if(!empty($sub_stats)) {
      $snap['subscriptions'] = $sub_stats->active;
    }

    if(!empty($weekly_sub_stats)) {
      $snap['week_subscriptions'] = $weekly_sub_stats->active;
    }

    if(!empty($monthly_sub_stats)) {
      $snap['month_subscriptions'] = $monthly_sub_stats->active;
    }

    if(!empty($yearly_sub_stats)) {
      $snap['year_subscriptions'] = $yearly_sub_stats->active;
    }

    if(!empty($weekly_refund_stats)) {
      $snap['week_refunds'] = $weekly_refund_stats->obj_count;
      $snap['week_refunds_total'] = $weekly_refund_stats->obj_total;
    }

    if(!empty($weekly_cancel_stats)) {
      $snap['week_cancellations'] = $weekly_cancel_stats->obj_count;
      $snap['week_cancellations_total'] = $weekly_cancel_stats->obj_total;
    }

    if(!empty($monthly_refund_stats)) {
      $snap['month_refunds'] = $monthly_refund_stats->obj_count;
      $snap['month_refunds_total'] = $monthly_refund_stats->obj_total;
    }

    if(!empty($monthly_cancel_stats)) {
      $snap['month_cancellations'] = $monthly_cancel_stats->obj_count;
      $snap['month_cancellations_total'] = $monthly_cancel_stats->obj_total;
    }

    if(!empty($yearly_refund_stats)) {
      $snap['year_refunds'] = $yearly_refund_stats->obj_count;
      $snap['year_refunds_total'] = $yearly_refund_stats->obj_total;
    }

    if(!empty($yearly_cancel_stats)) {
      $snap['year_cancellations'] = $yearly_cancel_stats->obj_count;
      $snap['year_cancellations_total'] = $yearly_cancel_stats->obj_total;
    }

    if(!empty($txn_stats)) {
      $snap['transactions'] = $txn_stats->complete;
    }

    return MeprHooks::apply_filters('mepr_usage_snapshot', $snap);
  }

  private function memberships() {
    global $wpdb;
    $mepr_db = MeprDb::fetch();

    $objs = MeprProduct::get_all();

    //$q = $wpdb->prepare("
    //    SELECT COUNT(*)
    //      FROM {$mepr_db->transactions}
    //     WHERE status=%s
    //       AND txn_type=%s
    //       AND created_at >= %s
    //  ",
    //  'complete',
    //  'payment',
    //  MeprUtils::ts_to_mysql_date(time()-MeprUtils::weeks(1))
    //);

    $memberships = array();
    foreach($objs as $obj) {
      //$mq = $q . $wpdb->prepare(" AND product_id=%d", $obj->ID);
      $memberships[] = array(
        'amount'       => $obj->price,
        'recurring'    => !$obj->is_one_time_payment(),
        'period_type'  => $obj->period_type,
        'period'       => $obj->period,
        'trial'        => $obj->trial,
        'limit_cycles' => $obj->limit_cycles,
        //'weekly_transactions' => $wpdb->get_var($mq),
      );
    }

    return $memberships;
  }

  private function plugins() {
    $plugin_list = get_plugins();

    $plugins = array();
    foreach($plugin_list as $slug => $info) {
      $plugins[] = array(
        'name'        => $info['Name'],
        'slug'        => $slug,
        'version'     => $info['Version'],
        'active'      => is_plugin_active($slug),
        //'plugin_uri'  => $info['PluginURI'],
        //'description' => $info['Description'],
        //'author'      => $info['Author'],
        //'author_uri'  => $info['AuthorURI'],
        //'text_domain' => $info['TextDomain'],
        //'domain_path' => $info['DomainPath'],
        //'network'     => $info['Network'],
        //'title'       => $info['Title'],
        //'author_name' => $info['AuthorName'],
      );
    }

    return $plugins;
  }

  private function gateways() {
    $mepr_options = MeprOptions::fetch();

    $pms = $mepr_options->payment_methods(false);

    $gateways = array();
    foreach($pms as $pm) {
      $rev_stats = MeprReports::gateway_revenue_stats($pm->id);
      $gateways[] = array(
        'name' => $pm->name,
        'livemode' => !$pm->is_test_mode(),
        'week_revenue'        => $rev_stats->week_revenue,
        'week_refunds_total'  => $rev_stats->week_refunds_total,
        'month_revenue'       => $rev_stats->month_revenue,
        'month_refunds_total' => $rev_stats->month_refunds_total,
        'year_revenue'        => $rev_stats->year_revenue,
        'year_refunds_total'  => $rev_stats->month_refunds_total
      );
    }

    return $gateways;
  }

} //End class

