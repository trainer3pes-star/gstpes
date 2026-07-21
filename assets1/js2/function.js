$(document).on("change", ".runtime_change-price", function(event) {
    var price=$('option:selected', this).attr('data-price');
    $('.orginal-price').html(price);
    var dprice=$('option:selected', this).attr('data-dis-price');
    $('.discount-price').html(dprice);
    var stock=parseInt($('option:selected', this).attr('data-stock'));
     if(stock<1){
        $('.stock_error').html('Out Of Stock');
        $('#cart_btn_main').hide();
    }else{
        $('.stock_error').html(' ');
        $('#cart_btn_main').show();
    }
      if((stock<20)&&(stock>0 )){
          $('.stock_msg').html('Hurry Up! '+stock+' Product(s) available only ');
     }else{
         $('.stock_msg').html('  ');
     }
    var fid=$('option:selected', this).val();
    $('#wishlist_d').attr('data-f-id',fid);
    
});
$.ajax({
			type: "POST",
			async: false,
			dataType: "json", 
			url: "product/page_load_show_cart",
			success: function(ajaxdata){   
			 
			 
			    $('#cart_total_amount').html(ajaxdata['cart_total_amont']);
			    $('.cart_html_dy').html(ajaxdata['cart_html']);
			    $('.mini_t_card_qty').html(ajaxdata['cart_total_quanity']);
			    if(parseInt(ajaxdata['cart_total_quanity'])>0){
			        $('.card_toggle_div').show();
			    }else{
			        $('.card_toggle_div').hide();
			    }			} 
			 
	 });
	 
	$(document).on("click", ".cart_btn_mainw", function(event) {
    var pro_id=$(this).attr('product_id');
    var seller_id=$(this).attr('seller_id'); 
    var filed_id=$(this).attr('filed_id');  
     var quantity=1; 
     var quantity_statue='';
   $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {"pro_id":pro_id ,"seller_id":seller_id,"filed_id":filed_id,"quantity":quantity,"quantity_statue":quantity_statue },
			url: "product/add_to_card",
			success: function(ajaxdata){   
			if(ajaxdata['is_erro']==1){ 
			    $('#id01_alert_message').html(ajaxdata['msg']);
			    $('#id01_alert').show();
			}
			if(ajaxdata['is_success']==1){
			   $('#id01_alert_message').html(ajaxdata['msg']);
			    $('#id01_alert').show();
			    $('#cart_total_amount').html(ajaxdata['cart_total_amont']);
			    $('.cart_html_dy').html(ajaxdata['cart_html']);
			    $('.mini_t_card_qty').html(ajaxdata['cart_total_quanity']);
			     			}
		 
			$('#overlay_chat').hide();
			}
	 });
	
});

$(document).on("click", "#cart_btn_main", function(event) {
    var pro_id=$('#product_id').val();
    var seller_id=$('#seller_id').val();
    var filed_id=$('#filed_id').val();  
     var quantity=$('#quantity').val(); 
     var quantity_statue='';
   $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {"pro_id":pro_id ,"seller_id":seller_id,"filed_id":filed_id,"quantity":quantity,"quantity_statue":quantity_statue },
			url: "product/add_to_card",
			success: function(ajaxdata){   
			if(ajaxdata['is_erro']==1){ 
			    $('#id01_alert_message').html(ajaxdata['msg']);
			    $('#id01_alert').show();
			}
			if(ajaxdata['is_success']==1){
			   $('#id01_alert_message').html(ajaxdata['msg']);
			    $('#id01_alert').show();
			    $('#cart_total_amount').html(ajaxdata['cart_total_amont']);
			    $('.cart_html_dy').html(ajaxdata['cart_html']);
			    $('.mini_t_card_qty').html(ajaxdata['cart_total_quanity']);
			    if(parseInt(ajaxdata['cart_total_quanity'])>0){
			        $('.card_toggle_div').show();
			    }else{
			        $('.card_toggle_div').hide();
			    }			}
			$('#quantity').val('1'); 
			$('#overlay_chat').hide();
			}
	 });
	
});
$(document).on("click", ".remove_car_tr", function(event) {
    if(confirm('Are you shure do you want to delete this product from cart')){
        var classname=$(this).attr('data_class');
         var id=$(this).attr('data-id'); 
   
   
   $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "filed_id":id  },
			url: "product/remove_from_cart",
			success: function(ajaxdata){   
			if(ajaxdata['is_erro']==1){
			   // alert(ajaxdata['msg'])
			   $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
			}
			if(ajaxdata['is_success']==1){
			   // alert(ajaxdata['msg'])
			    $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
			    $('#cart_total_amount').html(ajaxdata['cart_total_amont']);
			     $('#cart_subtotal').html(ajaxdata['cart_total_amont']);
			     $('#cart_total').html(ajaxdata['cart_total_amont']);
			    $('.cart_html_dy').html(ajaxdata['cart_html']);
			    $('.mini_t_card_qty').html(ajaxdata['cart_total_quanity']);
			    if(parseInt(ajaxdata['cart_total_quanity'])>0){
			        $('.card_toggle_div').show();
			    }else{
			        $('.card_toggle_div').hide();
			    }			}
			$('#quantity').val('1'); 
			$('#overlay_chat').hide();
			}
	 });
        $('.'+classname).remove();
    }
});
$(document).on("click", ".remove_from_cart", function(event) {
    var id=$(this).attr('data-id'); 
   
   
   $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "filed_id":id  },
			url: "product/remove_from_cart",
			success: function(ajaxdata){   
			if(ajaxdata['is_erro']==1){
			   // alert(ajaxdata['msg'])
			     $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
			}
			if(ajaxdata['is_success']==1){
			    //alert(ajaxdata['msg'])
			     $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
			    $('#cart_total_amount').html(ajaxdata['cart_total_amont']);
			    $('.cart_html_dy').html(ajaxdata['cart_html']);
			    $('.mini_t_card_qty').html(ajaxdata['cart_total_quanity']);
			    if(parseInt(ajaxdata['cart_total_quanity'])>0){
			        $('.card_toggle_div').show();
			    }else{
			        $('.card_toggle_div').hide();
			    }			}
			$('#quantity').val('1'); 
			$('#overlay_chat').hide();
			}
	 });
	
});

$(document).on("change", ".update_quantity", function(event) {
    var pro_id=$(this).attr('data-pro');
    var seller_id=$(this).attr('data-seller');
    var filed_id=$(this).attr('data-id');  
     var quantity=$(this).val(); 
     var quantity_statue='update';
   $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {"pro_id":pro_id ,"seller_id":seller_id,"filed_id":filed_id,"quantity":quantity,"quantity_statue":quantity_statue },
			url: "product/add_to_card",
			success: function(ajaxdata){   
			if(ajaxdata['is_erro']==1){
			   // alert(ajaxdata['msg'])
			    $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
			}
			if(ajaxdata['is_success']==1){
			   // alert(ajaxdata['msg'])
			    $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
			    $('#cart_subtotal').html(ajaxdata['cart_total_amont']);
			    $('.'+filed_id+'_total').html(ajaxdata['reflect_price']);
			     $('#cart_total').html(ajaxdata['cart_total_amont']);
			    $('#cart_total_amount').html(ajaxdata['cart_total_amont']);
			    $('.cart_html_dy').html(ajaxdata['cart_html']);
			    $('.mini_t_card_qty').html(ajaxdata['cart_total_quanity']);
			    if(parseInt(ajaxdata['cart_total_quanity'])>0){
			        $('.card_toggle_div').show();
			    }else{
			        $('.card_toggle_div').hide();
			    }			}
			$('#quantity').val('1'); 
			$('#overlay_chat').hide();
			}
	 });
	
});
$(document).on("click", ".add_to_wishlist", function(event) {
     var ele=$(this);
       
         var p_id=$(this).attr('data-p-id');
          var f_id=$(this).attr('data-f-id');
           var s_id=$(this).attr('data-s-id');
   
   
   $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "p_id":p_id,"f_id":f_id,"s_id":s_id  },
			url: "product/add_to_wish_list",
			success: function(ajaxdata){    
			    $(ele).attr('style',ajaxdata['style_c'])
			    //alert(ajaxdata['msg']) 
			     $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
			    $('#overlay_chat').hide();
			}
	 });
       
     
});

$(document).on("click", ".wishlist_dc", function(event) {
     var ele=$(this);
       
         var p_id=$(this).attr('data-p-id');
          var f_id=$(this).attr('data-f-id');
           var s_id=$(this).attr('data-s-id');
    var class_id=$(this).attr('data-class');
   
   $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "p_id":p_id,"f_id":f_id,"s_id":s_id  },
			url: "product/add_to_wish_list",
			success: function(ajaxdata){    
			    $(ele).attr('style',ajaxdata['style_c'])
			    //alert(ajaxdata['msg']) 
			     $('.'+class_id).remove();
			     $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
                
			    $('#overlay_chat').hide();
			}
	 });
       
     
});


if($('select').hasClass( "runtime_change-price" )){ 
     var price=$('option:selected', '.runtime_change-price').attr('data-price');
    $('.orginal-price').html(price);
    var dprice=$('option:selected', '.runtime_change-price').attr('data-dis-price');
    $('.discount-price').html(dprice);
    var stock=parseInt($('option:selected', '.runtime_change-price').attr('data-stock'));
    
    if(stock<1){
        $('.stock_error').html('Out Of Stock');
        $('#cart_btn_main').hide();
    }else{
        $('.stock_error').html(' ');
        $('#cart_btn_main').show();
    }
      if((stock<20)&&(stock>0 )){
          $('.stock_msg').html('Hurry Up! '+stock+' Product(s) available only ');
     }else{
         $('.stock_msg').html('  ');
     }
     var fid=$('option:selected', '.runtime_change-price').val();
    $('#wishlist_d').attr('data-f-id',fid);
}

$(document).on("click", ".set_same_billing", function(event) { 
    if ($('.set_same_billing').is(':checked')) {
         $('#bill_name').val($('#ship_name').val()); 
     $('#bill_company_name').val($('#ship_company_name').val()); 
     $('#bill_address_line_1').val($('#ship_address_line_1').val()); 
      $('#bill_address_line_2').val($('#ship_address_line_2').val()); 
      $('#bill_landmark').val($('#ship_landmark').val()); 
      $('#bill_state').html($('#ship_state').html());  
      $('#bill_district').html($('#ship_district').html());  
      $('#bill_city').html($('#ship_city').html());   
      
      $('#bill_state').val($('#ship_state').val());  
      $('#bill_district').val($('#ship_district').val());  
      $('#bill_city').val($('#ship_city').val());   
      
      $('#bill_pincode').val($('#ship_pincode').val()); 
      $('#bill_email').val($('#ship_email').val()); 
       $('#bill_mobile').val($('#ship_mobile').val()); 
     $('#bill_state').val($('#ship_state').val()); 
     
     $('.show_billing_f').hide();
    }else{ 
        
        
      $('#bill_name').val(''); 
     $('#bill_company_name').val(''); 
     $('#bill_address_line_1').val(''); 
     $('#bill_address_line_2').val(''); 
     $('#bill_landmark').val(''); 
     $('#bill_state').val('');  
     $('#bill_district').html('');  
     $('#bill_city').html('');   
     $('#bill_district').val('');  
     $('#bill_city').val('');    
      
      $('#bill_pincode').val(''); 
      $('#bill_email').val(''); 
      $('#bill_mobile').val('');  
     
        $('.show_billing_f').show();
        
    }
    
});

$(document).on("click", ".apply_shipping_Same", function(event) { 
    if ($('.set_same_billing').is(':checked')) {
     $('#bill_name').val($('#ship_name').val()); 
     $('#bill_company_name').val($('#ship_company_name').val()); 
     $('#bill_address_line_1').val($('#ship_address_line_1').val()); 
      $('#bill_address_line_2').val($('#ship_address_line_2').val()); 
      $('#bill_landmark').val($('#ship_landmark').val()); 
      $('#bill_state').html($('#ship_state').html());  
      $('#bill_district').html($('#ship_district').html());  
      $('#bill_city').html($('#ship_city').html());   
      
      $('#bill_state').val($('#ship_state').val());  
      $('#bill_district').val($('#ship_district').val());  
      $('#bill_city').val($('#ship_city').val());   
      
      $('#bill_pincode').val($('#ship_pincode').val()); 
      $('#bill_email').val($('#ship_email').val()); 
       $('#bill_mobile').val($('#ship_mobile').val()); 
     
     
      $('.show_billing_f').hide();
    }else{ 
        $('.show_billing_f').show();
        
    }
    
});

$(document).on("click", ".show_shippin_new", function(event) {
    $('.use_this_add').prop('checked',false);
     $('#bill_name').val(''); 
     $('#bill_company_name').val(''); 
     $('#bill_address_line_1').val(''); 
     $('#bill_address_line_2').val(''); 
     $('#bill_landmark').val(''); 
     $('#bill_state').val('');  
     $('#bill_district').html('');  
     $('#bill_city').html('');   
     $('#bill_district').val('');  
     $('#bill_city').val('');    
      
      $('#bill_pincode').val(''); 
      $('#bill_email').val(''); 
      $('#bill_mobile').val('');  
      
      
      
      
       $('#ship_name').val(''); 
     $('#ship_company_name').val(''); 
     $('#ship_address_line_1').val(''); 
     $('#ship_address_line_2').val(''); 
     $('#ship_landmark').val(''); 
     $('#ship_state').val('');  
     $('#ship_district').html('');  
     $('#ship_city').html('');   
     $('#ship_district').val('');  
     $('#ship_city').val('');    
      
      $('#ship_pincode').val(''); 
      $('#ship_email').val(''); 
      $('#ship_mobile').val('');  
      
      
    $('#ship_new').show();
     $('#only_billing').hide();
     $('#shipping_id').val('');
     $('#billing_id').val('');
})

$(document).on("click", ".use_this_add", function(event) { 
    $('#ship_new').hide();
     $('#only_billing').show();
      $('#shipping_id').val($(this).val());
})

 
$(document).on("click", ".btn_validator2", function(event) { // Sangita

var alert_msg="";

		var buttonElement = $(this);

			$('.required').css("border-bottom-color", "#d2d6de")	



		var counter=0;

 		$('#'+buttonElement.attr('data-frm')).find('.required').each(function() { 

		    var currentElement = $(this);
            var value = $.trim(currentElement.val());
            // alert(value);
            if(value==""||value.length==0)
            {
                // alert($(this).attr('name'));
                $(this).css("border-bottom", "1px solid red");
                counter++;
            }
            else
            {
                $(this).css("border-bottom", "1px solid #d2d6de");
            }


		});

		
if(counter==0)
        {
            $('#'+buttonElement.attr('data-frm')).submit();
        }
        else
        {
            //alert('Please enter or select required fields.');
             $('#id01_alert_message').html('Please enter or select required fields.');
                $('#id01_alert').show();
                
            return false;           
        }



});

$(document).on("click", ".apply_coupon_btn", function(event) {
    var counter=0;
        var value = $.trim($('#coupon_code').val());
              if(value==""||value.length==0) {
                $('#coupon_code').css("border-bottom", "1px solid red");
                counter++;
            }
            else
            {
                $('#coupon_code').css("border-bottom", "1px solid #d2d6de");
            }
        if(counter==0){
            
            $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "code":$('#coupon_code').val() },
			url: "product/apply_coupon_code",
			success: function(ajaxdata){  
			   // alert(ajaxdata['msg']) 
			     $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
                
			    if(ajaxdata['reload']==1){
			        setTimeout(function(){
                        location.reload();
                    }, 5000)  
			    }
			    $('#overlay_chat').hide();
			}
	 });
        }

});
 
 
$(document).on("click", ".apply_gift_coupon_btn", function(event) {
    var counter=0;
        var value = $.trim($('#gift_coupon_code').val());
              if(value==""||value.length==0) {
                $('#gift_coupon_code').css("border-bottom", "1px solid red");
                counter++;
            }
            else
            {
                $('#gift_coupon_code').css("border-bottom", "1px solid #d2d6de");
            }
        if(counter==0){
            
            $('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "code":$('#gift_coupon_code').val() },
			url: "product/apply_gift_coupon_code",
			success: function(ajaxdata){  
			    //alert(ajaxdata['msg']) 
			     $('#id01_alert_message').html(ajaxdata['msg']);
                $('#id01_alert').show();
                
			    if(ajaxdata['reload']==1){
			        setTimeout(function(){
                        location.reload();
                    }, 5000)  
			    }
			    $('#overlay_chat').hide();
			}
	 });
        }

});
 
  
 $('.datepicker').datepicker({ minDate: 0 ,  dateFormat: 'dd-mm-yy'
 });
 
$(document).on("click", "#use_wallet", function(event) {
   calcalue_payable_amount();
});

function calcalue_payable_amount(){ 
     $('#used_wallet_amount').val('0');
     $('#used_gift_coupon_amount').val('0');
     $('#remain_amount').val('0');
     $('#payable_amt').html('');
     
      var final_amount=parseFloat($('#final_amount').val());
        var wallet_amount=parseFloat($('#wallet_amount').val());
         var gift_coupon_amount=parseFloat($('#gift_coupon_amount').val());
        var remain_amount=0;
        var temp_final_amount=final_amount;
   if ($('#use_wallet').is(':checked')) {
       
       if(wallet_amount>temp_final_amount){ 
           remain_amount=0;
           $('#used_wallet_amount').val(temp_final_amount);
           temp_final_amount=0;
       }else{
           remain_amount=temp_final_amount-wallet_amount;
           temp_final_amount=temp_final_amount-wallet_amount;
           
           $('#used_wallet_amount').val(wallet_amount);
       }
       
   }else{
       remain_amount=temp_final_amount;
   }
   
   
   if ($('#use_gift_coupon').is(':checked')) {
       
       if(gift_coupon_amount>temp_final_amount){ 
           remain_amount=0;
            $('#used_gift_coupon_amount').val(temp_final_amount);
       }else{
           remain_amount=temp_final_amount-gift_coupon_amount;
           temp_final_amount=temp_final_amount-gift_coupon_amount;
            $('#used_gift_coupon_amount').val(gift_coupon_amount);
       }
       
   }else{
       remain_amount=temp_final_amount;
   }
    
   remain_amount=remain_amount.toFixed(2);
   
      $('#remain_amount').val(remain_amount);
       $('#payable_amt').html(remain_amount);
       if(remain_amount==0){
           $('.no-other').hide();
           $('.other_pay').show();
       }else{
           $('.other_pay').hide();
           $('.no-other').show();
       }
   
    
}
$(document).on("click", "#use_gift_coupon", function(event) {
    
   calcalue_payable_amount();
});
 

$(document).on("click", "#place_order", function(event) {
 calcalue_payable_amount();
   var remain_amount=parseFloat($('#remain_amount').val());
   if(remain_amount>0){
       	var counter=0;

 		$('.required').each(function() {
		    var currentElement = $(this);
            var value = $.trim(currentElement.val()); 
            if(value==""||value.length==0)
            { 
                $(this).css("border-bottom", "1px solid red");
                counter++;
            }
            else
            {
                $(this).css("border-bottom", "1px solid #d2d6de");
            }
		});
	 
		if(counter==0){
		    var len=$('[name="payment_method"]:checked').length;
		    if(len==0){
		        //alert('Please select payment method');
		        
		         $('#id01_alert_message').html('Please select payment method');
                $('#id01_alert').show();
                
		    }else{
		        $('#payment_frm').submit();
		    }
		}
       
   }else{
        $('#payment_frm').submit();
   }
});

$(document).on("click", "#place_order_online", function(event) {
    calcalue_payable_amount();
    var remain_amount=parseFloat($('#remain_amount').val());
   if(remain_amount>0){
       	var counter=0;
 
		
		if(counter==0){
		    var len=$('[name="payment_method"]:checked').length;
		    if(len==0){
		        //alert('Please select payment method');
		         $('#id01_alert_message').html('Please select payment method');
                $('#id01_alert').show();
                
		    }else{
		        $('#payment_frm').submit();
		    }
		}
       
   }
});


$(document).on("click", "#place_order_other", function(event) {
    calcalue_payable_amount();
    var remain_amount=parseFloat($('#remain_amount').val());
   if(remain_amount==0){
       $('#payment_frm').submit();
   }else{
       setTimeout(function(){
                        location.reload();
                    }, 5000)  
   }
});
$(document).on("click", ".clickable_div_pay", function(event) {
    var ap_class=$(this).attr('data-class'); 
    $('#'+ap_class).prop('checked',true);
    $('#'+ap_class).trigger( "click" );
    
    if(ap_class=='main_offline_readio'){ 
        if($('#collapsible1').is(':checked')){ 
         $('#collapsible1').trigger( "click" ); 
        }
    }else{
        if($('#collapsible').is(':checked')){ 
         $('#collapsible').trigger( "click" ); 
        }
    }
});

$(document).on("click", ".gatway_set", function(event) {
  var refclas=$(this).attr('data-ref'); 
  $('.change_pay_gateway').hide();
  $('.'+refclas).show();
  $('.payment_method').prop('checked',false);
   $("."+refclas+"_radio:first").prop('checked',true);
});

if($('div').hasClass( "change_pay_gateway" )){ 
    var refclas=$('[name="gateway_type"]:checked').attr('data-ref'); 
  $('.change_pay_gateway').hide();
  $('.'+refclas).show();
  $('.payment_method').prop('checked',false);
  $("."+refclas+"_radio:first").prop('checked',true)
  
}



$(document).on("click", "#check_all", function(event) {
  if ($(this).is(':checked')) {
      $('.sub_child').prop('checked',true)
  }else{
        $('.sub_child').prop('checked',false)
  }
});
//$(document).on("click", ".remove_overlay", function(event) {
   // $('div').removeClass('overlay-open');
//});
 
$(document).on("click", "#cancel_btn_m", function(event) {
   
     	var counter=0;

 		$('.required').each(function() {
		    var currentElement = $(this);
            var value = $.trim(currentElement.val()); 
            if(value==""||value.length==0)
            { 
                $(this).css("border-bottom", "1px solid red");
                counter++;
            }
            else
            {
                $(this).css("border-bottom", "1px solid #d2d6de");
            }
		});                                                             
		
		if(counter==0){
		    var len=$('[name="rc_id[]"]:checked').length;
		    if(len==0){
		         event.preventDefault();
		       // alert('Please select product you want to cancel ');
		        
		          $('#id01_alert_message').html('Please select product you want to cancel');
                $('#id01_alert').show();
                
		    }else{
		        if(confirm('Are you shure do you want to delete selected product(s) ')){
		            $('#cancel_frm').submit();
		        }else{
		     event.preventDefault();
		}
		    }
		}else{
		     event.preventDefault();
		}
});


if($('div').hasClass('show_billing_f')){ 
    if($('.set_same_billing').is(':checked')) {
        $('.show_billing_f').hide();
    }else{
        $('.show_billing_f').show();
    }
}

$(document).on("change", ".apply_to_billing", function(event) {
    if ($('.set_same_billing').is(':checked')) {
     $('#bill_name').val($('#ship_name').val()); 
     $('#bill_company_name').val($('#ship_company_name').val()); 
     $('#bill_address_line_1').val($('#ship_address_line_1').val()); 
      $('#bill_address_line_2').val($('#ship_address_line_2').val()); 
      $('#bill_landmark').val($('#ship_landmark').val()); 
      $('#bill_state').html($('#ship_state').html());  
      $('#bill_district').html($('#ship_district').html());  
      $('#bill_city').html($('#ship_city').html());   
      
      $('#bill_state').val($('#ship_state').val());  
      $('#bill_district').val($('#ship_district').val());  
      $('#bill_city').val($('#ship_city').val());   
      
      $('#bill_pincode').val($('#ship_pincode').val()); 
      $('#bill_email').val($('#ship_email').val()); 
       $('#bill_mobile').val($('#ship_mobile').val());  
    }
    
});

$(document).on("click", ".set_billing_pre", function(event) {
     $('#overlay_chat').show();
     var id=$(this).attr('data-id');
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "id":id },
			url: "product/set_shipping_as_billing",
			success: function(ajaxdata){  
			     
			    if(ajaxdata['reload']==1){
			        setTimeout(function(){
                        location.reload();
                    }, 5000)  
			    }
			    $('#overlay_chat').hide();
			}
	 });
    
});

$(document).on("click", "#gift_check", function(event) {
    gift_payment_cal();
    });
function gift_payment_cal(){
     var wallet_use_amount=parseFloat($('#wallet_use_amount').val());
     var wallet_total_amount=parseFloat($('#wallet_total_amount').val());
     var total_amount=parseFloat($('#total_amount').val());
     var payable_amount=parseFloat($('#payable_amount').val());
      if ($('#gift_check').is(':checked')) {
          if(wallet_total_amount>=total_amount){
              payable_amount=0;
              wallet_use_amount=total_amount;
          }else{
              payable_amount=total_amount-wallet_total_amount;
              wallet_use_amount=wallet_total_amount;
          }
      }else{
          wallet_use_amount=0;
          payable_amount=total_amount;
      }
      $('#wallet_use_amount').val(wallet_use_amount);
      $('#wallet_total_amount').val(wallet_total_amount);
      $('#total_amount').val(total_amount);
      $('#payable_amount').val(payable_amount)
      $('#p_amount').html(payable_amount);
}
