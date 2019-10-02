<?php if(!defined('ABSPATH')) { die('You are not allowed to call this page directly.'); } ?>
<html>
  <body>

    <div class="body-email" style="background-color: #c4c4c4; font-size: 18px; min-width: 500px;">
        <div class="container-envzone" style="width: 600px; margin: auto; margin-top: 0; padding-top: 0;">
            <div class="logo-envzone" style="text-align: left; padding: 15px 0; background: #C4C4C4; padding-bottom: 0;"><img src="https://www.envzone.com/wp-content/uploads/2019/08/Notification-EnvZone-Logo.png" alt="logo envzone" /></div>
            <div class="box-content-env" style="border-top: 4px solid #8DC63F; padding: 30px 50px; background-color: #ffffff;">
                <div class="icon-head" style="text-align: center; padding-bottom: 10px;"><img src="https://www.envzone.com/wp-content/uploads/2019/08/notification-confirmation.png" alt="Icon Check True" /></div>
                <h1 style="color: #191919; font-size: 24px; font-weight: 600; line-height: 34px; font-family: 'Raleway', sans-serif;">Password Reset</h1>

                <p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;"><?php echo sprintf(_x("Someone requested to reset your password for %1\$s on %2\$s at %3\$s", 'ui', 'memberpress'), $locals['user_login'], $locals['mepr_blogname'], $locals['mepr_blogurl']); ?></p>
                <p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;"><?php echo _x("To reset your password visit the following address, otherwise just ignore this email and nothing will happen.", 'ui', 'memberpress'); ?></p>
                <p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;"><a href="<?php echo $locals['reset_password_link']; ?>"><?php echo $locals['reset_password_link']; ?></a></p>

                <p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;">Best regards.</p>
                <p style="color: #808080; font-size: 18px; line-height: 25px; margin: 0; padding: 10px 0px; font-family: 'Raleway', sans-serif;">Management Team | ENVZONE</p>

            </div>
            <div style="text-align: center; font-size: 12px; line-height: 18px; color: #808080; padding-top: 20px; padding-bottom: 35px; font-family: 'Raleway', sans-serif; background: #F2F2F2;"><span style="display: block">This email was sent to <?php echo $locals['user_login'];?></span>
                <span style="display: block">© 2019 EnvZone LLC. All rights reserved. </span>
                <span style="display: block">1801 California St Ste 2400, Denver, CO 80202</span></div>
        </div>
    </div>
  </body>
</html>
