<?php

// get site info to construct 'FROM' for email
//$from_name = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );
$from_email = get_option('wp_mail_smtp')['mail']['from_email'];

// initialize
$send_mail_message = false;

if ( !empty( $_POST ) && check_admin_referer( 'sefa_send_email', 'sefa-form-nonce' ) ) {
    // handle attachment
    $attachment_path = '';
    if ( $_FILES ) {
        if ( !function_exists( 'wp_handle_upload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }
        $uploaded_file = $_FILES['attachment'];
        $upload_overrides = array( 'test_form' => false );
        $attachment = wp_handle_upload( $uploaded_file, $upload_overrides );
        if ( $attachment && !isset( $attachment['error'] ) ) {
            // file was successfully uploaded
            $attachment_path = $attachment['file'];
        } else {
            // echo $attachment['error'];
        }
    }

    // get the posted form values
    $sefa_name_email = isset( $_POST['sefa_name_email'] ) ? trim($_POST['sefa_name_email']) : '';
    $sefa_recipient_emails = isset( $_POST['sefa_recipient_emails'] ) ? trim($_POST['sefa_recipient_emails']) : '';
    $sefa_subject = isset( $_POST['sefa_subject'] ) ? stripslashes(trim($_POST['sefa_subject'])) : '';
    $sefa_body = isset( $_POST['sefa_body'] ) ? stripslashes(nl2br($_POST['sefa_body']))  : '';
    $sefa_group_email = isset( $_POST['sefa_group_email'] ) ? trim($_POST['sefa_group_email']) : 'no';
    $recipients = explode( ',',$sefa_recipient_emails );

    // initialize some vars
    $errors = array();
    $valid_email = true;

    // simple form validation
    if ( empty( $sefa_recipient_emails ) ) {
        $errors[] = __( "Please enter an email recipient in the To: field.", 'sefa' );
    } else {
        // Loop through each email and validate it
        foreach( $recipients as $recipient ) {
            if ( !filter_var( trim($recipient), FILTER_VALIDATE_EMAIL ) ) {
                $valid_email = false;
                break;
            }
        }
        // create appropriate error msg
        if ( !$valid_email ) {
            $errors[] = _n( "The To: email address appears to be invalid.", "One of the To: email addresses appears to be invalid.", count($recipients), 'sefa' );
        }
    }
    if ( empty($sefa_subject) ) $errors[] = __( "Please enter a Subject.", 'sefa' );
    if ( empty($sefa_body) ) $errors[] = __( "Please enter a Message.", 'sefa' );

    // send the email if no errors were found
    if ( empty($errors) ) {
        $headers[] = "Content-Type: text/html; charset=\"" . get_option('blog_charset') . "\"\n";
        $headers['From'] = 'From: ' . $sefa_name_email . ' <' . $from_email . ">\r\n";
        $attachments = $attachment_path;

        if ( $sefa_group_email === 'yes' ) {
            if ( wp_mail( $sefa_recipient_emails, $sefa_subject, $sefa_body, $headers, $attachments ) ) {
                $send_mail_message = '<div class="updated">' . __( 'Your email has been successfully sent!', 'sefa' ) . '</div>';
            } else {
                $send_mail_message = '<div class="error">' . __( 'There was an error sending the email.', 'sefa' ) . '</div>';
            }
        } else {
            foreach( $recipients as $recipient ) {
                if ( wp_mail( $recipient, $sefa_subject, $sefa_body, $headers, $attachments ) ) {
                    wp_insert_post(
                        array(  'post_title'    => $recipient,
                            'post_content'  => $sefa_body,
                            'post_status'   => 'private',
                            'post_type'     => 'mail_notification'));
                    $send_mail_message .= '<div class="updated">' . __( 'Your email has been successfully sent to ', 'sefa' ) . esc_html($recipient) . '!</div>';
                } else {
                    $send_mail_message .= '<div class="error">' . __( 'There was an error sending the email to ', 'sefa' ) . esc_html($recipient) . '</div>';
                }
            }
        }

        // delete the uploaded file (attachment) from the server
        if ( $attachment_path ) {
            unlink($attachment_path);
        }
    }
}
?>
<div class="wrap" id="sefa-wrapper">
    <h1><?php _e( 'Send Email From Admin', 'sefa' ); ?></h1>
    <?php
    if ( !empty($errors) ) {
        echo '<div class="error"><ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>\n";
    }
    if ( $send_mail_message ) {
        echo $send_mail_message;
    }
    ?>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <form method="POST" id="sefa-form" enctype="multipart/form-data">
                    <?php wp_nonce_field( 'sefa_send_email', 'sefa-form-nonce' ); ?>
                    <table cellpadding="0" border="0" class="form-table">
                        <tr>
                            <th scope=”row”><label for="sefa-name-email">Name:</label></th>
                            <td>
                                <input type="text" id="sefa-name-email" name="sefa_name_email" value="<?php echo esc_attr( sefa_plugin_issetor($sefa_name_email) ); ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <th scope=”row”>From:</th>
                            <td><input type="text" disabled value="<?php echo "&lt;$from_email&gt;"; ?>" required><div class="note"><?php _e( 'These can be changed in WP Mail SMTP.', 'sefa' ); ?></div></td>
                        </tr>
                        <tr>
                            <th scope=”row”><label for="sefa-recipient-emails">To:</label></th>
                            <td>
                                <input type="email" multiple id="sefa-recipient-emails" name="sefa_recipient_emails" value="<?php echo esc_attr( sefa_plugin_issetor($sefa_recipient_emails) ); ?>" required>
                                <div class="note"><?php _e( 'To send to multiple recipients, enter each email address separated by a comma.', 'sefa' ); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope=”row”></th>
                            <td>
                                <div class="sefa-radio-wrap">
                                    <input type="radio" class="radio" name="sefa_group_email" value="no" id="no"<?php if ( isset($sefa_group_email) && $sefa_group_email === 'no' ) echo ' checked'; ?> required>
                                    <label for="no"><?php _e( 'Send each recipient an individual email', 'sefa' ); ?></label>
                                </div>
                                &nbsp;&nbsp;
                                <div class="sefa-radio-wrap">
                                    <input type="radio" class="radio" name="sefa_group_email" value="yes" id="yes"<?php if ( isset($sefa_group_email) && $sefa_group_email === 'yes' ) echo ' checked'; ?> required>
                                    <label for="yes"><?php _e( 'Send a group email to all recipients', 'sefa' ); ?></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope=”row”><label for="sefa-subject">Subject:</label></th>
                            <td><input type="text" id="sefa-subject" name="sefa_subject" value="<?php echo esc_attr( sefa_plugin_issetor($sefa_subject) );?>" required></td>
                        </tr>
                        <tr>
                            <th scope=”row”><label for="sefa_body">Message:</label></th>
                            <td align="left">
                                <?php
                                $settings = array( "editor_height" => "200" );
                                wp_editor( sefa_plugin_issetor($sefa_body), "sefa_body", $settings );
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope=”row”><label for="attachment">Attachment:</label></th>
                            <td><input type="file" id="attachment" name="attachment"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                                <input type="submit" value="<?php _e( 'Send Email', 'sefa' ); ?>" name="submit" class="button button-primary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>


<?php
    function sefa_plugin_issetor(&$var) {
        return isset($var) ? $var : '';
    }
?>