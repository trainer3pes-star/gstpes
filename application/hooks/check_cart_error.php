<?php
function check_cart_error() { 
 
		$CI =& get_instance();
		$class = $CI->router->fetch_class();  
		$controller=strtolower($CI->router->fetch_class()); 
		$method=strtolower($CI->router->fetch_method());
		
	if($method!='offer_detail'){
    if(@$_SESSION['cart']['cart_error']>0){ 
		if(($method!='cart_notify')&&($method!='confirm_cart')){ 
			redirect(CART_NOTIFY); 
		}
	}}
}
?>