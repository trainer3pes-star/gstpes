<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
define('SITE_NAME','ASC Journal'); 
define('PREFIX','asc_');
define('LFIX','_01');
define('SITE_LOGO','uploads/logo.png');
define('INFOID','info@/ascjournal.com');
define('MAIL_LOGO','uploads/mail_logo.png');
define('ESTIMATED_DATE','l , d F');
define('DISPLAY_DATE','d-m-Y');
define('DISPLAY_DATE_TIME','d-m-Y h:i A');
define('ADMIN_MAIL','info@/ascjournal.com');
//define('ADMIN_MAIL','info@gmail.com');

define('REGISTER_URL','sign-up');
define('LOGIN_URL','sign-in');
define('MY_ACCOUNT','my-account'); 
define('ALL_ORDER','all-order'); 
define('DETAIL_ORDER','order-detail');
define('MY_CASHBACK','my-cashback');
define('MY_WALLET','my-wallet');
define('MY_WISHLIST','my-wishlist');
define('ACCOUNT_DETAILS','account-detail');
define('SEND_GIFT_COUPON','send-gift-coupon');
define('CONFIRM_SEND_GIFT_COUPON','confirm-send-gift-coupon');
define('CONFIRM_GIFT_COUPON','confirm-gift-coupon');
define('SENT_GIFT_COUPON_LIST','sent-gift-coupon-list');
define('MY_GIFT_COUPON_LIST','my-gift-coupon-list');
define('THANKYOU_GIFT_MESSAGE','staus-gift-coupon');
define('RAZOR_RETURN_GIFT_URL','gift-payment-return');
define('PRODUCT_LIST','products');
define('PRODUCT_LIST_SEARCH','search-products');
define('CART_VIEW','cart');
define('CART_NOTIFY','cart-notify');
define('CONFIRM_CART','confirm-cart');
define('CHECKOUT_SHIP','checkout-shipping');
define('CHECKOUT_PAYMET','checkout-payment');
define('CHECKOUT_CONFIRM','confirm');
define('CATEGORY_LIST','categories');
define('PRODUCT_DETAIL','detail');
define('ORDER_STATUS','order-status');
define('MY_ORDER','my-order');
define('SIGN_ICON','RS ');
define('RAZOR_RETURN_URL','cart/payment-return');
define('WELCOME_MESSAGE',SITE_NAME.'  is one of the leading e-commerce in India . ');
define('SWITCHTOBUYER','switch_to_buyer');
define('ABOUT_US','about');
define('CONTACT_US','contact');
define('SERVICES','services');
define('CAREER','career');
define('FAQ','faq');
define('ADD_MY_WALLET','add-my-wallet');
define('CONFIRM_ADD_MY_WALLET','confirm-my-wallet');
define('RAZOR_RETURN_WALLET_URL','add-my-wallet-return');
define('THANKYOU_WALLET_MESSAGE','status-wallet-payment');
define('WALLET_LIST','wallet-added-list');

define('AWS_URL','https://udyotwork.co.in/ascjournal/');