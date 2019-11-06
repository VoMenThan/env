<?php
$post_arr = array(
    'mail-sender-name',
    'mail-send-to',
    'mail-subject',
    'mail-message-body',
);
$mail_send_success = false;

if ( $_POST ) {

    foreach ($post_arr as $post_name) {
        if (!isset ($_POST[$post_name])) {
            $error = true;
            break;
        }
    }
    if (!$error) {

        $to = $_POST['mail-send-to'];
        $subject = $_POST['mail-subject'];
        $body = <<<EOF
        
        
        <div class="body-email" style="background-color: #c4c4c4; font-size: 18px; min-width: 500px;">
<div class="container-envzone" style="width: 600px; margin: auto; margin-top: 0; padding-top: 0;">
<div class="logo-envzone" style="text-align: left; padding: 15px 0; background: #C4C4C4; padding-bottom: 0;"><img src="https://www.envzone.com/wp-content/uploads/2019/08/Notification-EnvZone-Logo.png" alt="logo envzone" /></div>
<div class="box-content-env" style="border-top: 4px solid #8DC63F; padding: 30px 50px; background-color: #ffffff;">
<div class="icon-head" style="text-align: center; padding-bottom: 10px;"><img src="https://www.envzone.com/wp-content/uploads/2019/08/notification-confirmation.png" alt="Icon Check True" /></div>
<h1 style="color: #191919; font-size: 24px; font-weight: 600; line-height: 34px; font-family: 'Raleway', sans-serif;">
{$subject}
</h1>
<p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;">
{$_POST['mail-message-body']}
</p>

<p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;">Best regards.</p>
<p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;">Management Team | ENVZONE</p>

</div>
<div style="text-align: center; font-size: 12px; line-height: 18px; color: #808080; padding-top: 20px; padding-bottom: 35px; font-family: 'Raleway', sans-serif; background: #F2F2F2;">
<span style="display:block;text-align: center">This email was sent to {$to}</span>
<span style="display:block;text-align: center">© 2019 EnvZone LLC. All rights reserved.</span>
<span style="display:block;text-align: center">1801 California St Ste 2400, Denver, CO 80202</span></div>
</div>
</div>

EOF;
        $headers = array('Content-Type: text/html; charset=UTF-8','From: than.vo@envzone.com');

        wp_mail($to, $subject, html_entity_decode($body), $headers);

        wp_insert_post(
            array(  'post_title'    => $_POST['mail-send-to'],
                'post_content'  => '<h2>'.$subject.'</h2><p>'.$_POST['mail-message-body'].'</p>',
                'post_status'   => 'private',
                'post_type'     => 'mail_notification'));

        $mail_send_success = true;
    }
}


?>

<div class="wrap">

    <h2 class="wp-heading-inline">Send Email</h2>
    <?php if ($mail_send_success == true):?>
    <div class="updated">
        <p>Send mail successfully!</p>
    </div>
    <?php endif;?>

    <form method="post" action="" id="envzone-mt-form-setting-email">
        <table class="form-table" role="presentation">
            <tbody>

            <tr>
                <th scope="row"><label for="mail-sender-name">Sender name</label></th>
                <td><input id="mail-sender-name" name="mail-sender-name" type="text" value="<?php echo $mail_send_success == false? $_POST['mail-sender-name'] : '';?>" class="regular-text ltr"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mail-send-to">Send to</label></th>
                <td><input id="mail-send-to" name="mail-send-to" type="mail" value="<?php echo $mail_send_success == false? $_POST['mail-send-to'] : '';?>" class="regular-text ltr"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mail-subject">Subject</label></th>
                <td><input id="mail-subject" name="mail-subject" type="text" value="<?php echo $mail_send_success == false? $_POST['mail-subject'] : '';?>" class="regular-text ltr"></td>
            </tr>
            <tr>
                <th scope="row"><label for="mail-message-body">Message body</label></th>
                <td>
                    <textarea name="mail-message-body" id="mail-message-body" cols="100" rows="10"><?php echo $mail_send_success == false? $_POST['mail-message-body'] : '';?></textarea>
                    <?php
                    $settings = array( "editor_height" => "200" );
                    wp_editor( sefa_plugin_issetor($sefa_body), "mail-message-body", $settings );
                    ?>
                </td>
            </tr>
            </tbody></table>
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Send Mail"></p>
    </form>

</div>

