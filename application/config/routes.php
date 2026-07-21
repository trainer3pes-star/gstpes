<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route[SERVICES] = 'Home/services'; //about  
$route[CAREER] = 'Home/career'; //about  
$route[FAQ] = 'Home/faq'; //about  
$route[ABOUT_US] = 'Home/about'; //about  
$route[CONTACT_US] = 'Home/contact'; //contact  
$route[REGISTER_URL] = 'Home/register'; //register  
$route[REGISTER_URL.'/(:any)'] = 'Home/register/$1'; //register  
$route[LOGIN_URL] = 'Home/login'; //login  
$route[SWITCHTOBUYER] = 'User/switch_to_buyer'; // my account
$route[MY_ACCOUNT] = 'User/my_account'; // my account
$route[MY_ORDER] = 'User/my_order'; // my account 
$route[ALL_ORDER] = 'User/all_order'; // my account 
$route[DETAIL_ORDER.'/(:any)'] = 'User/order_detail/$1'; // my account
$route[MY_CASHBACK] = 'User/my_cashback'; // my account
$route[MY_WALLET] = 'User/my_wallet'; // my account
$route[MY_WISHLIST] = 'User/my_wishlist'; // my account
$route[ACCOUNT_DETAILS] = 'User/account_detail'; // my account
$route[SEND_GIFT_COUPON] = 'User/send_gift_coupon'; // my account
$route[CONFIRM_SEND_GIFT_COUPON] = 'User/confirm_send_gift_coupon'; // my account
$route[CONFIRM_GIFT_COUPON] = 'User/confirm_gift_coupon'; // my account
$route[SENT_GIFT_COUPON_LIST] = 'User/sent_gift_coupon_list'; // my account
$route[RAZOR_RETURN_GIFT_URL] = 'User/gift_payment_return'; // my account
$route[THANKYOU_GIFT_MESSAGE] = 'User/staus_gift_coupon'; // my account
$route[MY_GIFT_COUPON_LIST] = 'User/my_gift_coupon_list'; // my account
$route[PRODUCT_LIST] = 'Product/product_list'; // my account
$route[PRODUCT_LIST.'/(:any)'] = 'Product/product_list/$1'; // my account
$route[PRODUCT_LIST_SEARCH.'/(:any)'] = 'Product/product_list_search/$1'; // my account
$route[PRODUCT_DETAIL] = 'Product/product_detail'; // my account
$route[PRODUCT_DETAIL.'/(:any)/(:any)'] = 'Product/product_detail/$1/$2'; // my account
$route[CATEGORY_LIST] = 'Product/category_list'; // my account
$route[CATEGORY_LIST.'/(:any)'] = 'Product/category_list/$1'; // my account
$route[CART_VIEW] = 'cart/my_cart'; // my account 
$route[CART_NOTIFY] = 'cart/cart_notify'; // my account 
$route[CONFIRM_CART] = 'cart/confirm_cart'; // my account 
$route[CHECKOUT_SHIP] = 'cart/checkout_shipping'; // my account 
$route[CHECKOUT_SHIP.'/(:any)'] = 'cart/checkout_shipping/$1'; // my account
$route[CHECKOUT_PAYMET] = 'cart/checkout_payment'; // my account 
$route[CHECKOUT_CONFIRM] = 'cart/checkout_confirm'; // my account 
$route[ORDER_STATUS.'/(:any)'] = 'cart/order_status/$1'; // my account  
$route[ADD_MY_WALLET] = 'User/add_my_wallet'; // my account
$route[CONFIRM_ADD_MY_WALLET] = 'User/confirm_my_wallet'; // my account
$route[RAZOR_RETURN_WALLET_URL] = 'User/add-wallet-payment-return'; // my account
$route[THANKYOU_WALLET_MESSAGE] = 'User/status_wallet_payment'; // my account
$route[WALLET_LIST] = 'User/wallet_added_list'; // my account