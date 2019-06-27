<?php
//Thay đổi URL chạy chính của WP
//define( 'WP_SITEURL', 'http://example.com/wordpress' );
//define( 'WP_HOME', 'http://example.com/wordpress' );

//Thay đổi đường dẫn đến thư mục chứa Plugin
//define( 'WP_PLUGIN_DIR', 'New Path');
//define( 'WP_PLUGIN_URL', 'New URL');

define('WP_POST_REVISIONS', 3);
define('AUTOSAVE_INTERVAL', 150);
//define( 'SAVEQUERIES', true );

//Allowed memory size of xxxxx bytes exhausted
//and config php.ini
//define( 'WP_MEMORY_LIMIT', '128M' );

define ( 'WPLANG', 'en-US' );

//Thiết lập COOKIE cho nhiều domain (Multisite)
//define( 'COOKIE_DOMAIN', '.domain.com' );
//define( 'COOKIEPATH', '/' );
//define( 'SITECOOKIEPATH', '/' );

//Thiết lập tài khoản FTP cho website
//define( 'FTP_USER', 'username' );
//define( 'FTP_PASS', 'password' );
//define( 'FTP_HOST', 'ftp.example.com:21' );

//Thiết lập cấp phép cho thư mục
//define( 'FS_CHMOD_FILE',0644 );
//define( 'FS_CHMOD_DIR',0755 );

//Thiết lập chế độ login
//define( 'FORCE_SSL_LOGIN', true ); //HTTPS - HTTP
//define( 'FORCE_SSL_ADMIN', true );

//Thiết lập thời gian xóa TRASH
//define( 'EMPTY_TRASH_DAYS', 7 );

//Thiết lập giá trị không chỉnh sửa trong Admin
define('DISALLOW_FILE_EDIT', TRUE);

//Thiết lập chế độ Cron
//define( 'DISABLE_WP_CRON', true );
