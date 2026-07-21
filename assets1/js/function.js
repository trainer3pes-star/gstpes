 $('.select2').select2();
 $(document).on("change", "#role_id", function(event) {
	var val=$(this).val(); 
	if((val==6)||(val==0)){
		$('.nrequired').removeClass('required');
		$('.company_other').hide();	
		if(val==6)
		{	
		 $('#designation_div').hide();	
		}
		else
		{
			$('#designation_div').show();	
		}	
	}else{
		$('.nrequired').addClass('required');	
		$('.company_other').show();
		$('#designation_div').show();
	}
	$('.select2').select2();
});

if($('select').hasClass('run_time_role')){
	var val=$("#role_id").val(); 
	if((val==6)||(val==0)){
		$('.nrequired').removeClass('required');
		$('.company_other').hide();	
		if(val==6)
		{	
		 $('#designation_div').hide();	
		}
		else
		{
			$('#designation_div').show();	
		}	
	}else{
		$('.nrequired').addClass('required');	
		$('.company_other').show();
		$('#designation_div').show();
	}
	$('.select2').select2(); 
}
 $(document).on("change", "#company_type_id", function(event) {

	var val=$(this).val(); 
	if((val==0)){
		$('.requiredd').removeClass('required');
		$('.file_n').hide();
		$('.company_documnet_other').hide();	
	}else{
		$('.company_documnet_other').show();	
		$('.requiredd').removeClass('required');
		$('.file_'+val+'_f').addClass('required');
		$('.file_n').hide();
		$('.file_'+val).show();
	}
	
});


if($('select').hasClass('run_time_company_type')){
	var val=$("#company_type_id").val(); 
	if((val==0)){
		$('.requiredd').removeClass('required');
		$('.file_n').hide();
		$('.company_documnet_other').hide();	
	}else{
		$('.company_documnet_other').show();	
		$('.requiredd').removeClass('required');
		$('.file_'+val+'_f').addClass('required');
		$('.file_n').hide();
		$('.file_'+val).show();
	}
	$('.select2').select2(); 
}

 $(document).on('change','.required', function(event) {

			var currentElement = $(this);

		

			var value = $.trim(currentElement.val());

 			if($( this ).hasClass( "editor_class" )){

				$('#cke_'+$( this ).attr('id')).css("border-bottom-color", "#d2d6de")	

				var value = CKEDITOR.instances[$( this ).attr('id')].getData();

				if(value==""||value.length==0){

 				$('#cke_'+$( this ).attr('id')).css("border-bottom-color", "#ff4081");

 				counter++;

 				}

			}if($( this ).hasClass( "select2" )){
				$(this).siblings(".select2-container").css("border-bottom", "1px thin #ccc");
 				if(value==""||value.length==0||value=="0"){
				 $(this).siblings(".select2-container").css("border-bottom", "1px solid rgb(255, 64, 129)");
				 counter++;
 					
  				}

			}if($( this ).hasClass( "up_file" )){

 				if(value==""||value.length==0||value=="0"){ 	//alert($(this).attr('name'))

				 $(this).css("color", "red")
 				 counter++;

 					

  				}else{ 
					$(this).css("color", "")
				}


			}if($( this ).hasClass( "password_validate" )){
				if(value.length>0){
				var val=password_validation($(this).val(),$(this)); 
				if(val==0){
 				counter++;
				}
				}
 

			}if($( this ).hasClass( "same_to_same" )){
				if(value.length>0){
				var me_val=$(this).val();
				var ref_ele=$(this).attr('data-input');
				var ref_val=$('#'+ref_ele).val();
				if(me_val==ref_val){
					
				}else{
					alert($(this).attr('data-msg'))
					counter++;
					$(this).css("border-bottom-color", "#ff4081");
				}
			}else{
				$(this).css("border-bottom-color", "#ff4081");
			}

			}if($( this ).hasClass( "up_file_new" )){

 				if(value==""||value.length==0||value=="0"){ 	//alert($(this).attr('name'))
				$(this).parent().parent().parent().parent().addClass('bg-danger')
				 counter++;
  				}else{
				$(this).parent().parent().parent().parent().removeClass('bg-danger')	
				}

			}if($( this ).hasClass( "radiovali" )){
				
				if(($('.'+$( this ).attr('name')+':checked').length)==0){ 	//alert($(this).attr('name'))

				$('.'+$( this ).attr('name')).css("outline", "1px solid  red");

				counter++;

				}else{

					$('.'+$( this ).attr('name')).css("outline", "none");

					}

			

			}else if($( this ).hasClass( "hide_input" )){
				if(value==""||value.length==0||value=="0"){
					if($('#id').val()==""){
						$(this).parent('.custom-file-upload').css("color", "#ff4081"); 
						counter++;
					}else{ 
						var temp_hidden=$(this).attr('id')+'_hidden';
						if($('#'+temp_hidden).val()==""||$('#'+temp_hidden).val().length==0||$('#'+temp_hidden).val()=="0"){
							$(this).parent('.custom-file-upload').css("color", "#ff4081"); 
						counter++;
						}
					}
				}

 				 

			}else if(value==""||value.length==0){ 

 				$(this).css("border-bottom-color", "#ff4081");

 				counter++;

 			}else{

 				$(this).css("border-bottom-color", "#d2d6de")	

 				}

									 

											 });
$(document).on('keypress',".no_space",function(event) { // Sangita
    var regex = new RegExp("^[ ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key)) {
    	event.preventDefault();
    	return false;
    }
});
$(document).on('keypress',".no_number",function(event) { // Sangita 
    var regex = new RegExp("^[0-9]+$"); 
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key)) {
    	event.preventDefault();
    	return false;
    }
});
$(document).on('keypress',".no_chara",function(event) { // Sangita

    var regex = new RegExp("^[a-zA-Z]+$");

    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);

    if (regex.test(key)) {

    	event.preventDefault();

    	return false;

    }

});
$(document).on('focusout',".phone_valid",function(event)  // Sangita
  { 	
	
	
		if(!$('.phone_valid').val().match('[0-9]{10}')) 
		{
			alert("Invalid phone number");

			$('.phone_valid').val('');
			return false;
		}
	

}); 

$(document).on('keypress',".no_special",function(event) { // Sangita



    var regex = new RegExp("^[a-zA-Z 0-9\b\t]+$");



    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode); 
 
	if((event.keyCode==9)||(event.keyCode==13)||(event.keyCode==8)||(event.keyCode==46)){



		return true;



		}



	if($( this ).hasClass( "allow_dot" )){



		if(key=='.'){



			return true;	



		}	



	}else{



    if (!regex.test(key)) {



    	event.preventDefault();



    	return false;



    }



	}



});
$(document).on('change',".email_valide",function(event) { // Sangita



  var email=$(this).val(); 



		if(email.length){



			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;



			 if(regex.test(email)){



			 }else{



				 $(this).val('');



				 alert('Invalid Email Address')



				 }



		}



});
$(document).on("click", ".btn_validator", function(event) { // Sangita

var alert_msg="";

		var buttonElement = $(this);

			$('.required').css("border-bottom-color", "#d2d6de")	



		var counter=0;

 		$('#'+buttonElement.attr('data-frm')).find('.required').each(function() {

 			var currentElement = $(this);
			var value = $.trim(currentElement.val());
 			if($( this ).hasClass( "editor_class" )){

				$('#cke_'+$( this ).attr('id')).css("border-bottom-color", "#d2d6de")	

				var value = CKEDITOR.instances[$( this ).attr('id')].getData();

				if(value==""||value.length==0){

 				$('#cke_'+$( this ).attr('id')).css("border-bottom-color", "#ff4081");

 				counter++;

 				}

			}
			if($( this ).hasClass( "password_validate" ))
			{
				if(value.length>0)
				{
					var val=password_validation($(this).val(),$(this)); 
					if(val==0)
					{
	 					counter++;
					}
				}
 

			}if($( this ).hasClass( "select2" )){
				$(this).siblings(".select2-container").css("border-bottom", "1px thin #ccc");
 				if(value=="" || value.length==0 || value=="0"){
 					if ($(this).attr('name')=="credit_facility" && value=="0") 
 					{

 					}
 					else
 					{
					 	$(this).siblings(".select2-container").css("border-bottom", "1px solid rgb(255, 64, 129)");
					 	counter++;
				 	} 					
  				}

			}if($( this ).hasClass( "up_file" )){

 				if(value==""||value.length==0||value=="0"){ 	//alert($(this).attr('name'))

				 
				$(this).css("color", "red")
 				 counter++;

 					

  				}else{
					$(this).css("color", "")
				}

			}if($( this ).hasClass( "up_file_new" )){

 				if(value==""||value.length==0||value=="0"){ 	//alert($(this).attr('name'))
				$(this).parent().parent().parent().parent().addClass('bg-danger')
				 counter++;
  				}else{
				$(this).parent().parent().parent().parent().removeClass('bg-danger')	
				}

			}if($( this ).hasClass( "radiovali" )){
				
				if(($('.'+$( this ).attr('name')+':checked').length)==0){ 	//alert($(this).attr('name'))

				$('.'+$( this ).attr('name')).css("outline", "1px solid  red");

				counter++;

				}else{

					$('.'+$( this ).attr('name')).css("outline", "none");

					}

			

			}else if($( this ).hasClass( "hide_input" )){
				if(value==""||value.length==0||value=="0"){
					if($('#id').val()==""){
						$(this).parent('.custom-file-upload').css("color", "#ff4081"); 
						counter++;
					}else{ 
						var temp_hidden=$(this).attr('id')+'_hidden';
						if($('#'+temp_hidden).val()==""||$('#'+temp_hidden).val().length==0||$('#'+temp_hidden).val()=="0"){
							$(this).parent('.custom-file-upload').css("color", "#ff4081"); 
						counter++;
						}
					}
				}

 				 

			}if($( this ).hasClass( "same_to_same" )){
				if(value.length>0){
				var me_val=$(this).val();
				var ref_ele=$(this).attr('data-input');
				var ref_val=$('#'+ref_ele).val();
				if(me_val==ref_val){
					
				}else{
					alert($(this).attr('data-msg'))
					counter++;
					$(this).css("border-bottom-color", "#ff4081");
				}
			}else{
				$(this).css("border-bottom-color", "#ff4081");
			}

			}else if(value==""||value.length==0){

			//	

				//alert($(this).attr('name'))

 				$(this).css("border-bottom-color", "#ff4081");

 				counter++;

 			}else{

 				$(this).css("border-bottom-color", "#d2d6de")	

 				}



		});

		

		 if(buttonElement.attr('data-frm')=='review_frm'){
			 var val=$('#rating_apply').val();
			 if((val==0)||(val=='')){
				 counter++;
				 $('.border_ul').css("border-bottom", "1px solid #ff4081");
				 alert('Please select rating');
			 }else{
				  $('.border_ul').css("border-bottom", "none");
			 }
		 } 

  		if(counter==0){ 

		
		$('#'+buttonElement.attr('data-frm')).submit();

			 

			 

			}else{

				alert($('#js_error_mandatory_msg').val());	
				event.preventDefault();
				 

				}



});
 
$(document).on('change','.profile_photo',function(event) {
       
      var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	 var div_id=$(this).attr('data-class'); 
     var image_holder = $("."+div_id+"");
     image_holder.empty();
 	var timer=0; 
  var fileUpload = $(this)[0];
	 var countFiles =$(this)[0].files.length;  
		if($(this).hasClass('max_len')){
			var max_len=parseInt($(this).attr('max-length'));
			 if (parseInt($(this).get(0).files.length) > max_len){
                  alert( max_len+" files are only allowed to upload");
				   $(this).val('');
				   return false;
               }
		}
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {
 
             for (var i = 0; i < countFiles; i++) {
                  var reader = new FileReader(); 
				   reader.name = fileUpload.files[i].name;
                 reader.onload = function (e) {
				 timer++;   
					if(countFiles==1){
						$("<div class='thumb_outer_div'><img src='"+e.target.result+"' class ='thumbimage' /></div>").appendTo(image_holder);
					}else{
   				 	 $("<div class='thumb_outer_div'><img src='"+e.target.result+"' class ='thumbimage' /><a class='delete_me'>Delete</a><input type='hidden' name='hidden_img_name[]' value='"+e.target.name+"'></div>").appendTo(image_holder);
					}
                  }
 
                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }
 
         } else {
             alert("It doesn't supports");
         }
     } else {
         alert("Select Only Images");
		  $(this).val('');
     }
 });
  function password_validation(key,ele){ 
    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})");

 if (regex.test(key)) { 
     return 1;
 }else{ 
    alert('password must be a minimum of 6 characters including number, Upper, Lower And  one special character'); 
	ele.val('');
    	return 0;
 }

    }
$('.select2').select2();

	$(document).on("change", ".call_run_time", function(event) {
$('#overlay').show();  
var ref_input=$(this).attr('data-ref'); 
var ref_tb=$(this).attr('data-tb'); 
var select_id=$(this).attr('data-select'); 
var value=$(this).val();

$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: {"ref_input":ref_input,'ref_tb':ref_tb,"select_id":select_id,"value":value},
							url: "Home/get_run_time_values",
							success: function(ajaxdata){ 
								$('#'+ref_input).html(ajaxdata['html']);
								$('.select2').select2();
								$('#overlay').hide(); 
							}
						});				
		
		
		
$('#overlay').hide(); 
});

$(document).on("click", "#site_login", function(event) {  
	var counter=0; 
	var username=$("#username").val(); 
	var password=$('#password').val(); 
	var previous_url=$('#previous_url').val(); 
	// alert(previous_url);
	if(($.trim(username) == '')&&(username.length==0)){ 
		$("#username").css("border-bottom-color", "#ff4081"); 
		counter++; 
	}else{ 
		$("#username").css("border-bottom-color", "#d2d6de"); 
		}
	if(($.trim(password) == '')&&(password.length==0)){
		$("#password").css("border-bottom-color", "#ff4081");
		counter++;
	}else{
		$("#password").css("border-bottom-color", "#d2d6de");
		}
	var remember_me='0';
	if ($("#remember_me").is(':checked')) {
		var remember_me='1';
	}else{
		var remember_me='0';
	}	
	if(counter==0){
			$('#overlay').show();
			$.getJSON("Home/set-login", {task:'login', username:username,password:password,remember_me:remember_me}, function (response) {
					if(response['sucess']){
						if(response['link']!=""){
							// location.href=response['link'];
							location.href='Home/add_product_review/'+response['order_id']+'/'+response['user_id'];
						}else{
							location.href=previous_url;
						}
					}else{
                        $('#overlay').hide();
						$('.error').html('<div id="card-alert" class="alert alert-danger alert-dismissable"><span>'+$('#js_error_invalid').val()+'</span></div>');
					}																																								 				});	

		}else{
			return false;		
			}	
});

$(document).on("click", "#forgot_password", function(event) {  
	var counter=0; 
	var username=$("#username").val(); 
	if(($.trim(username) == '')&&(username.length==0)){ 
		$("#username").css("border-bottom-color", "#ff4081"); 
		counter++; 
	}else{ 
		$("#username").css("border-bottom-color", "#d2d6de"); 
	}	
	if(counter==0){
		$('#overlay').show();
		$.getJSON("Home/send-link-set-password", {task:'send_link_set_password', username:username}, function (response) {
				if(response['sucess']){
					location.href='Home/forgot_password/';
				}else{
                    $('#overlay').hide();
					$('.error').html('<div id="card-alert" class="alert alert-danger alert-dismissable"><span>'+$('#js_error_invalid').val()+'</span></div>');
				}
			});	

	}else{
		return false;		
	}	
});

if($('div').hasClass('open_otp_auto')) {
	 $('#otp_model').modal({backdrop: 'static', keyboard: false})
	   // $('#otp_model').modal('show');
}


$(document).on("click", "#bt-otp-bt", function(event) {  
	var counter=0; 
	var otp=$("#input_otp").val();  
	var bank_rc_id=$("#bank_rc_id").val();  
	if(($.trim(otp) == '')&&(otp.length==0)){
		$("#input_otp").css("border-bottom-color", "#ff4081"); 
		counter++; 
	}else{ 
		$("#input_otp").css("border-bottom-color", "#d2d6de"); 
		} 
	if(counter==0){
			
$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: {"otp":otp,'bank_rc_id':bank_rc_id},
							url: "Home/check_bank_otp",
							success: function(ajaxdata){ 
							if(ajaxdata['close_model']=='1'){ 
								$('#main_bak_data').removeClass('mark_opacity')
								$('#otp_model .close').click()
							}
							alert(ajaxdata['html']);
							$('#overlay').hide(); 
							}	
						});	

						
		
		}else{
			return false;		
			}

});

  
$(document).on("click", "#resend-bt-otp-bt", function(event) {  
	var counter=0;  
	var bank_rc_id=$("#bank_rc_id").val();  
	 
	if(counter==0){
			
$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: { 'bank_rc_id':bank_rc_id},
							url: "Home/resend_bank_otp",
							success: function(ajaxdata){ 
							 
							alert(ajaxdata['html']);
							$('#overlay').hide(); 
							}	
						});	

						
		
		}else{
			return false;		
			}

});

 
$(document).on("click", "#send_bak_comment", function(event) {  
	var counter=0; 
	var comment=$("#bank_comment").val();   
	if(($.trim(comment) == '')&&(comment.length==0)){
		$("#bank_comment").css("border-bottom-color", "#ff4081"); 
		counter++; 
	}else{ 
		$("#bank_comment").css("border-bottom-color", "#d2d6de"); 
		} 
	if(counter==0){
		var frm_id=$(this).attr('data-frm');
	$('#overlay_loader').show();
	var path=$('#'+frm_id).attr('action'); 
	var frmdata = new FormData(this.form);
			
	$.ajax({
			url: path,   	// Url to which the request is send
			type: "post",      				// Type of request to be send, called as method
			data:frmdata, processData: false, contentType: false,
			dataType: "json",
			cache: false, async: true	,
			success: function(data)  		// A function to be called if request succeeds
			{ 
			$('#bank_status').val('0');
			$('#bank_comment').val('');
				$('.select2').select2();
				$('#append_view_history').prepend(data['html']);
				alert(data['msg']);
				$('#overlay').hide(); 
			}	
	});	

						
		
		}else{
			return false;		
			}

});

$(document).on("click", ".submit_frm", function(event) {  
if($(this).hasClass('assign_category')){
var id=$(this).attr('data-id');
$('#category_id').val(id);
}
$('#pagi_number').val('0');
$('#admin_frm').submit();
});

$(document).on("change", ".submit_change", function(event) {  
 
$('#pagi_number').val('0');
$('#admin_frm').submit();
});

if($('.pagination_a_btn').hasClass('pagination_btn_custom')){
    $('.pagination_btn_custom').hide();    
    $('.active_btn_pag').show();
    $('.active_btn_pag').prev('.pagination_btn_custom').show();
     $('.active_btn_pag').next('.pagination_btn_custom').show();
     $('.pagination_btn_custom').first().show();
$('.pagination_btn_custom').last().show();
}

$(document).on('click','.add_to_wishlist', function(event) { 
	var pro_id=$(this).attr('data-id');
	var detail_id=$(this).attr('data-did');
	var seller_id=$(this).attr('data-sid');
	var ele=$(this);
	
$('#overlay').show();   
$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: {"pro_id":pro_id,'detail_id':detail_id,"seller_id":seller_id },
							url: "User/add_to_wishlist",
							success: function(ajaxdata){  
								ele.html(ajaxdata['class_name']); 
								$('.wish_cart_quantity').html(ajaxdata['total_product'])
								$('.wishlistmobile').html(ajaxdata['total_product'])
								$('#overlay').hide(); 
							}
						});	 
});

$(document).on('click','.product_added_cart', function(event) { 
	var pro_id=$(this).attr('data-id');
	var detail_id=$(this).attr('data-did');
	var seller_id=$(this).attr('data-sid'); 
	var qunatity=parseInt($('#cart_quantity').val());
	if(qunatity>0){
		
	}else{
		qunatity=1;
	} 
	$('#overlay').show();   
		$.ajax({
		type: "POST",
		async: false,
		dataType: "json", 
		data: {"pro_id":pro_id,'detail_id':detail_id,"seller_id":seller_id ,"qunatity":qunatity},
		url: "User/add_to_cart",
		success: function(ajaxdata){ 
			$('.minicart_html').html(ajaxdata['minicart_html'])
			$('.minicart_subtotal').html(ajaxdata['sub_total'])
			$('.cart_quantity').html(ajaxdata['total_product'])

			if(parseFloat(ajaxdata['total_product'])>0){
				if(parseFloat(ajaxdata['is_success'])>0)
				{
					alert(ajaxdata['msg']);
					//$('#myModal').show();
				  	//$('#myModal').modal('show'); 
				    //var element = document.getElementById("myModal");
					//element.classList.add("in");	
				}
				else
				{
					alert(ajaxdata['msg_alert']);
				}								
			}else{
				$('.mini_cart_qty').hide();
				if(ajaxdata['is_msg']>0){
						alert(ajaxdata['msg_alert']);
					}
			}
			
			if(ajaxdata['is_multiseller']>0)
			{
				alert('If you want to use pay with credit.Please add one Seller product.You were added multiple sellers product.');
			}
			$('#overlay').hide(); 
		}
	});	 
});




$(document).on('click','.pagination_a_btn', function(event) { 
		$('#pagi_number').val($(this).attr('data-value'));
		$('#'+$(this).attr('data-frm')).submit();
     });
$(document).on('change','.assign_rescpective_detail', function(event) { 
	var detail_id=$(this).val();
	$('.main_product_wishlist').attr('data-did',detail_id) ;
	$('.assign_detail_id').attr('data-did',detail_id) ;	
	var is_expired=$(this).find('option:selected').attr('data-is_expired');

	var discount_amount=parseFloat($(this).find('option:selected').attr('data-discount_amount'));
	var final_price=$(this).find('option:selected').attr('data-final_price');
	var show_final_price=$(this).find('option:selected').attr('data-show_final_price');
	var current_stock=parseInt($(this).find('option:selected').attr('data-current_stock'));
	var total_rating=$(this).find('option:selected').attr('data-total_rating');
	var total_review_added=$(this).find('option:selected').attr('data-total_review_added');
	$('.show_final_price').html(show_final_price);
	$('.final_price').html(final_price);
	$('.no_of_ratings').html(total_review_added);
	if(discount_amount==0){
		$('.discount_price_div').hide();
		$('.sigle_price_div').show();
	}else{
		$('.discount_price_div').show();
		$('.sigle_price_div').hide();
	}
	$('.show_stock').html(current_stock)
	if(current_stock>0){
		$('.available_stock_outer_div').show();
		$('.notify_outer_div').hide();
	}else{
		$('.available_stock_outer_div').hide();
		$('.notify_outer_div').show();
	}

	if(is_expired==0){
		$('#expired').hide();
	}else{
		$('#expired').show();
	}
	
});
	 
	 
	 
$(document).on('click','.delete_from_cart', function(event) { 
	var id=$(this).attr('data-id');  
	if(confirm('Are you sure do you want to remove this product from cart ?')){
$('#overlay').show();   
$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: {"id":id },
							url: "User/delete_from_cart",
							success: function(ajaxdata){ 
								location.reload();
								$('#overlay').hide(); 
							}
						});	 
	}
});

$(document).on("change", ".set_min_val", function(event) {  
if($(this).val().length==0){
	$(this).val('1');
} 	
});


$(document).on('click','#apply_coupon', function(event) { 
	 
	var coupon_code=$('#coupon_code').val();
	if(coupon_code.length==0){
		alert('Please enter coupon code')
	}else{
		$('#overlay').show();   
$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: {"coupon_code":coupon_code },
							url: "User/apply_coupon_code",
							success: function(ajaxdata){ 
							
							if(ajaxdata['show_msg']==1){
								alert(ajaxdata['msg']);
							}
								
								if(ajaxdata['reload']==1){
									location.reload();
								}
								$('#overlay').hide(); 
							}
						});	 

	} 

});


if($('input').hasClass('check_diff_ship')){
	if ($(".check_diff_ship").is(':checked')) {
	 $('#ship-box-info').show();
	}else{
		$('#ship-box-info').hide();
	}
}

if($('input').hasClass('payment_radio')){
	if ($(".payment_radio").is(':checked')) { 
		$('.set_raiod_check').addClass('collapsed')
		$('.collapse').removeClass('show')
		$('.set_raiod_check').prop('aria-expanded',false)
		
		$('.payment_radio:checked').parent('a').removeClass('collapsed');
		$('.payment_radio:checked').parent('a').prop('aria-expanded',false);
		var target_div=$('.payment_radio:checked').parent('a').attr('data-bs-target');
		$(target_div).addClass('show');
		
	}
}

$(document).on("change", ".input_ship", function(event) {
if ($(".check_diff_ship").is(':checked')) {
}else{	
 $('#'+$(this).attr('data-ref-input')).val($(this).val());
}
});
$(document).on("change", ".select_ship", function(event) {
if ($(".check_diff_ship").is(':checked')) {
}else{	
 $('#'+$(this).attr('data-ref-input')).val($(this).val());
 $('.select2').select2();
 $('#'+$(this).attr('data-ref-input')).trigger('change');
}
});

$(document).on("click", ".check_diff_ship", function(event) {
if ($(".check_diff_ship").is(':checked')) {
}else{	
	$('.input_ship').each(function() {
		$('#'+$(this).attr('data-ref-input')).val($(this).val());
	});
	$('.select_ship').each(function() {
		$('#'+$(this).attr('data-ref-input')).val($(this).val());
		$('.select2').select2();
		$('#'+$(this).attr('data-ref-input')).trigger('change');
	});
}
});

$(document).on('click','.confirm_delete', function(event) {  
	if(confirm('Are you sure do you want to delete this address ?')){
		
	}else{
		event.preventDefault();
    	return false;
	}
});

$(document).on('click','.set_raiod_check', function(event) {  
	var dataid=$(this).attr('data-radio');
	$('#'+dataid).prop('checked',true);
	// $('#used_credit_amount').removeClass('required');
});



$(document).on('click','#set_payment_method', function(event) {  
  // alert('ok');
  var total_checked=$('.payment_radio:checked').length;
  var is_use_wallet=$('#use_wallet:checked').length;
  var is_use_credit=$('#is_use_credit:checked').length;

  var sub_total=$('#sub_total').val();

  var only_use=0;
  var used_credit_amount=0;
  var use_wallet=0;
  var totalamount=0;

  if(is_use_wallet==1){
     only_use=$('#use_wallet').attr('data-only-use');
     use_wallet=$('#use_wallet').attr('data-amount');
  }

  if(is_use_credit==1)
  {
    used_credit_amount=$('#used_credit_amount').val();

    if (used_credit_amount<=0) 
    {
      alert('Enter Used Credit Amount');
    }
  }

  var totalamount = parseFloat(use_wallet) + parseFloat(used_credit_amount);

  // alert(is_use_credit);
  // alert(sub_total);
  // alert(used_credit_amount);
  // alert(totalamount);


  if((total_checked==0)&&(only_use==0)&&(is_use_credit==0)){
    alert('Please select payment method');
  }
  else
  {
    var val=$('.payment_radio:checked').val();
    var counter=0;    
      if (totalamount<sub_total)
      {
        // if(val=='' val=='')
        if (typeof(val) == undefined || val == null || val == '')
        {
          alert('Please select payment method');
          counter++; 
        }
        else
        {
          if(val=='cheque')
          { 
            $('#pay_frm').find('.required').each(function() {
              var currentElement = $(this); 
              var value = $.trim(currentElement.val());
              if(value==""||value.length==0){ 
                $(this).css("border-bottom-color", "#ff4081"); 
                counter++; 
              }else{ 
                $(this).css("border-bottom-color", "#d2d6de")  
              } 
            });
          }
        }
      }
    if(counter==0)
    { 
      $('#pay_frm').submit();
    }   
  }
});

 
$(document).on('click','#place_order_btn', function(event) { 
	if($(this).hasClass('call_online')){
 rzp.open();
	}else{
		location.href='Cart/offline_return';
	}
	/*
	$('#overlay').show();   
						$.ajax({
							type: "POST",
							async: false,
							dataType: "json",  
							url: "User/place_order",
							success: function(ajaxdata){ 
							 
								$('#overlay').hide(); 
							}
						});	 

	} */

});
  
$(document).on("click", ".master_model_call1	", function(event) {  
$('#master_run_model').modal('show');
/**/


 });

 $('.master_model_call').on('click', function(event){
    event.preventDefault();
	
	
$('#overlay').show();  
var id=$(this).attr('data-id'); 
var other=$(this).attr('other'); 
var call_to=$(this).attr('data-call-to'); 
var path='user/'+call_to; 
	$.ajax({
		url: path,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:  { "id":id ,"other":other },
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{
			 
			$('.ajax_master_run').html(data['html']);
			$('.run_time_title').html(data['popup_title']); 
			$('#cart_detail_id').val(id);
			 $('.select2').select2();
			$('.popup').addClass('is-visible');
			$('#overlay').hide();
		}
	});

	
    
  });
  
  //close popup
  $('.popup').on('click', function(event){
    if( $(event.target).is('.popup-close') || $(event.target).is('.popup') ) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
  //close popup when clicking the esc keyboard button
  $(document).keyup(function(event){
      if(event.which=='27'){
        $('.popup').removeClass('is-visible');
      }
    });

	 
$(document).on('click','.remove_wishlist', function(event) { 
	  
	if(confirm('Are you sure do you want to remove this product from wishlist ?')){
		
	}else{
		event.preventDefault();
    	return false;
	}
});



$(document).on("click", ".close_modle_cust	", function(event) {  
$('#master_run_model').modal('hide');
});
$(document).on("mouseover", ".custom_rating	", function(event) {  
$('#rating_apply').val('0');
var index=parseInt($(this).attr('data-index'));
$('.c_star').removeClass('fa-star').addClass('fa-star-o');
for(var i=1;i<=index;i++){
	$('.star_'+i).removeClass('fa-star-o').addClass('fa-star');
}
$('#rating_apply').val(index);
});
$(document).on("click", ".custom_rating	", function(event) { 
$('#rating_apply').val('0'); 
var index=parseInt($(this).attr('data-index'));
$('.c_star').removeClass('fa-star').addClass('fa-star-o');
for(var i=1;i<=index;i++){
	$('.star_'+i).removeClass('fa-star-o').addClass('fa-star');
}
$('#rating_apply').val(index);
});
$(document).on("click", ".offer_detail_view	", function(event) {  
$('#master_run_model').modal('show'); 
$('#overlay').show();  
var offer_id=$(this).attr('data-id');  
var path='Home/offer_detail'; 
	$.ajax({
		url: path,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:  { "offer_id":offer_id },
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{
			$('#master_run_model').modal('show');
			$('.ajax_master_run_n').html(data['html']);
			$('.run_time_title_n').html(data['popup_title']); 
			$('#overlay').hide();
		}
	});

});

$( ".rateButton" ).click(function() {
        var id=$(this).attr('data-id');
        if($(this).hasClass('btn-grey')) {          
            $(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
            $(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
            $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');           
        } else {                        
            $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
        }
        $("#rating_"+id).val($('.star-selected').length);       
    });  

 $(document).on('change',".check_unquie",function(event) {
	$('.btn_validator').prop('disabled',true);
	$('#overlay').show();

 	var field=$(this).attr('id');

	var placeholder=$(this).attr('data-msg');

	var value=$(this).val();

	var record_id=$(this).attr('data-id');

	var module=$(this).attr('data-module');

 

	$.getJSON("Home/check_unique", {"field":field,"value":value,"record_id":record_id , "module":module}, function (response) {

		if(response['sucess']){
			$('.btn_validator').prop('disabled',false);
			$('#overlay').hide();

		 }else{

			$('#overlay').hide();
			$('.btn_validator').prop('disabled',false);
			alert( placeholder + ' alerady Exists')

			$('#'+field).val('');

		}		

	});


}); 
 
$('.mobile_vali').bind('change', function (event) {
  var mobile=$(this).val(); 
  		if(mobile.length==10){
 			 }else{
				 $(this).val('');
				 alert('Enter 10 Digit Number')
				 }
 });


