$('.submit_frm').keypress(function (e) {
  if (e.which == 13) { 
	$('#admin_login').trigger('click');
    return false;    //<---- Add this line
  }
});
$('.my-colorpicker1').colorpicker();

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
	// var val=password_validation($('#reg_password').val()); 
	//			    if(val==1){
	
$(document).on("click", "#admin_login", function(event) {  
	var counter=0; 
	var username=$("#username").val(); 
	var password=$('#password').val(); 
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
						location.reload();
					}else{
                        $('#overlay').hide();
						$('.error').html('<div id="card-alert" class="alert alert-danger alert-dismissable"><h4>'+$('#js_error_invalid').val()+'</h4></div>');
					}																																								 				});	

		}else{
			return false;		
			}	
});

$(document).on("click", "#forgot_btn", function(event) {  
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
			$.getJSON("Home/set-new-password", { username:username}, function (response) {
					if(response['sucess']){
						 $('#overlay').hide();
						$('.error').html(response['message']);
					}else{
                        $('#overlay').hide();
						$('.error').html(response['message']);
					}																																								 				});	

		}else{
			return false;		
			}	
});

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




$(document).on('keyup',".zero_validations",function(event) { // Sangita

if($('.zero_validations').val() == 0) 
{
	alert("Invalid days");
	$('.zero_validations').val('');
	return false;
	
}

});
$(document).on('keypress',".percentage_val",function(event) { // Sangita



	var val=parseFloat($(this).val());



	if(val>100){



		alert('Percentage not greater than 100');



		$(this).val('');



		return false;	



	}


});







$(document).on('change',".check_tomax",function(event) { // Sangita

var minqty=parseInt($(this).attr('data-from'));

 	var maxqty=parseInt($(this).attr('data-to'));

	var input=parseInt($(this).val());

 	if(((input<=maxqty)&&(input>=minqty))){

	

	}else{

		alert($(this).attr('data-msg'));



	//	$(this).val('1');

 $(this).focus();

		return false;	



	}
	
	
});



$(document).on('keypress',".no_special",function(event) { 

    var regex = new RegExp("^[a-zA-Z 0-9\b\t]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode); 
	//if((event.keyCode==9)||(event.keyCode==13)||(event.keyCode==8)||(event.keyCode==46))
	if((event.keyCode==9)||(event.keyCode==13)||(event.keyCode==8))
	{
		return true;
	}
	if($( this ).hasClass( "allow_dot" ))
	{
		if(key=='.'){
			return true;	
		}	
	}
	else if($( this ).hasClass( "allow_dash" ))
	{
		if(key=='-'){
			return true;	
		}	
	}
	else
	{
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


 
if($('button').hasClass('pagination_btn_custom')){
    $('.pagination_btn_custom').hide();    
    $('.active_btn_pag').show();
    $('.active_btn_pag').prev('.pagination_btn_custom').show();
     $('.active_btn_pag').next('.pagination_btn_custom').show();
     $('.pagination_btn_custom').first().show();
$('.pagination_btn_custom').last().show();
}
$(document).on('click','.pagination_btn', function(event) {
		$('#pagi_number').val($(this).val());
		$('#'+$(this).attr('data-frm')).submit();
     });
$(document).on('click','.sorting_btn', function(event) {
	
		$('#sort_by').val($(this).attr('data-filed'));
		$('#sort_order').val($(this).attr('data-type'));
		$('#'+$(this).attr('data-frm')).submit();
     });
	
	
$(document).on('click',".confirm_delete",function(event) { // Sangita
		if(confirm("Do You Want To Delete This Record ?")){
			return true;
		}else{
			return false;	
		}	
}); 


$(document).on('change',".match_val",function(event){
	var val=$(this).val();
	var val1=$('#'+$(this).attr('data-parent')).val();
	if(val==val1){
	}else{
		$(this).val('');
		alert($(this).attr('data-msg'))	;
		return false;
	}
});
 $(document).on("click", ".check_all_check", function(event) {

	 if ($(this).is(':checked')) {

		  $(".sub_checkbox_check").prop('checked', true); 	 

	 }else{

		 $(".sub_checkbox_check").prop('checked', false); 

		 }
 });
 $(document).on("click", ".check_all", function(event) {

	 if ($(this).is(':checked')) {

		  $(".sub_checkbox").prop('checked', true); 	 

	 }else{

		 $(".sub_checkbox").prop('checked', false); 

		 }

			  $('.sub_checkbox').each(function() {

				  var val=$(this).val();

				 if ($(this).is(':checked')) {

					 

					 $('.tr_'+val).addClass('selected')

				 }else{

					  $('.tr_'+val).removeClass('selected')

					 }

				 });									   });

 

 $(document).on("click", ".sub_checkbox", function(event) {

		 var val=$(this).val();

				 if ($(this).is(':checked')) {

					 

					 $('.tr_'+val).addClass('selected')

				 }else{

					  $('.tr_'+val).removeClass('selected')

					 }

});



$(document).on("change", ".update_order", function(event) {
	$('#overlay').show();
	var val=$(this).val();
	$.getJSON("Home/change_value_run", {task:'change_value_run', data_id:$(this).attr('data-id'),data_module:$(this).attr('data-module'),data_filed:$(this).attr('data-filed'),val:val}, function (response) {

 					if(response['sucess']){

						$('#overlay').hide();
						 

					}

 			});
 			});
$(document).on("change", ".update_status", function(event) {
var check_c=1;
var reload=0;
if($(this).hasClass('relad_page')){
	reload=1;
}
	if ($(this).is(':checked')) {
		check_c=0;
	} 
if(confirm($(this).attr('data-confirm-msg'))){
$('#overlay').show(); 

var val=$(this).val();

if($(this).attr('type')=='checkbox'){

	if ($(this).is(':checked')) {

	}else{

		val=0;

	}

}

var msg=$(this).attr('data-msg');

			$.getJSON("Home/change_value_run", {task:'change_value_run', data_id:$(this).attr('data-id'),data_module:$(this).attr('data-module'),data_filed:$(this).attr('data-filed'),val:val}, function (response) {

 					if(response['sucess']){

						$('#overlay').hide();
						if(msg.length!=0){
						alert(msg);
						if(reload==1){
							location.reload() ;
						}
						}

					}

 			});

}else{
	if(check_c==0){
	$(this).prop('checked',false)
	}else{
	$(this).prop('checked',true)	
	}
	
}

});


$(document).on("click", ".update_status_btn", function(event) { var check_c=1;
var reload=1;   
check_c=$(this).attr('data-checked'); 
if(confirm($(this).attr('data-confirm-msg'))){
$('#overlay').show();  
var val=check_c;

 

var msg=$(this).attr('data-msg');

			$.getJSON("Home/change_value_run", {task:'change_value_run', data_id:$(this).attr('data-id'),data_module:$(this).attr('data-module'),data_filed:$(this).attr('data-filed'),val:val}, function (response) {

 					if(response['sucess']){

						$('#overlay').hide();
						if(msg.length!=0){
						alert(msg);
						if(reload==1){
							location.reload() ;
						}
						}

					}

 			});

}else{ 
}

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
 
 
	$(document).on("click", "#set_user_project", function(event) {
$('#overlay').show();  
var pro_id=$('#set_project').val(); 

$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: {"pro_id":pro_id },
							url: "Home/set_session_project",
							success: function(ajaxdata){ 
							location.href='Home';
							}
						});				
		
		
		
$('#overlay').hide(); 
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

			}else if($( this ).hasClass( "password_validate" )){
				if(value.length>0){
				var val=password_validation($(this).val(),$(this)); 
				if(val==0){
 				counter++;
				}
				}
 

			}else if($( this ).hasClass( "select2" )){
				$(this).siblings(".select2-container").css("border-bottom", "1px thin #ccc");
 				if(value==""||value.length==0||value=="0"){
 					if ($(this).attr('name')=="credit_facility" && value=="0") 
 					{
 						$(this).siblings(".select2-container").css("border-bottom", "none");
 					}
 					else
 					{
					 	$(this).siblings(".select2-container").css("border-bottom", "1px solid rgb(255, 64, 129)");
					 	counter++;
				 	} 					
  				}

			}else if($( this ).hasClass( "up_file" )){
				
 				if(value==""||value.length==0||value=="0"){  
				$(this).css("color", "red")
 				 counter++;  
  				}else{
					$(this).css("color", "")
				}

			}else if($( this ).hasClass( "up_filen" )){ 
				var data_f=$(this).attr('data-ufile'); 
 				if((value==""||value.length==0||value=="0")&&(data_f.length==0)){ 	  
				$(this).css("color", "red")
 				 counter++; 
  				}else{
					$(this).css("color", "")
				}

			}else if($( this ).hasClass( "up_file_new" )){

 				if(value==""||value.length==0||value=="0"){ 	//alert($(this).attr('name'))
				$(this).parent().parent().parent().parent().addClass('bg-danger')
				 counter++;
  				}else{
				$(this).parent().parent().parent().parent().removeClass('bg-danger')	
				}

			}else if($( this ).hasClass( "radiovali" )){
				
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
 
  		if(counter==0){ 

		 if(buttonElement.hasClass('ajax_btn')){
			 
			 $('#overlay_loader').show();
			 
	var path=$('#'+buttonElement.attr('data-frm')).attr('action'); 
	var form_ele=$('#'+buttonElement.attr('data-frm')); 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: path ,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
		if(data['is_clear_data']==1){
			$('.clear_run').val('');
			
		}
		if(data['is_default']==1){
			$('#product_img').val($('#default_img').val());
			$('#image_src').attr('src',$('#default_img_src').val());
		}
		if(data['is_replace']==1){
			$('.'+data['replace_class']).replaceWith(data['html'])
		}else{
			$('#add_saved_row').append(data['html']); 
		}
		alert(data['msg']);
		$('#overlay_loader').hide(); 
	}
	});
	
			 
			 
		 }else{
		$('#'+buttonElement.attr('data-frm')).submit();
		 }
			 

			 

			}else{

				alert($('#js_error_mandatory_msg').val());	

				 

				}



});
 $('.select2').select2()

 
	 function confirm_pwd()
{  
	var new_password=$("#new_password").val();
	var confirm_password=$("#confirm_password").val();
	if(new_password != confirm_password)
	{
		$("#new_password").val("");
		$("#confirm_password").val("");
		alert($('#js_error_match').val());		
		return false;
	}
	else
	{
		return true;
	}
} 

$(document).on('click','.select_all', function(event) { 
var select_id=$(this).attr('data-select');
	 $('#'+select_id+' option').prop('selected', true);$(".select2").select2();
});


$(document).on("change", ".check_type_all", function(event) {
	if ($(this).is(':checked')) {
		$('.type_li').prop('checked', true); 
	}else{
		$('.type_li').prop('checked', false); 
	}
	$('.comman_li').trigger('change');
});
$(document).on("change", ".check_brand_all", function(event) {
	if ($(this).is(':checked')) {
		$('.brand_li').prop('checked', true); 
	}else{
		$('.brand_li').prop('checked', false); 
	}
	$('.comman_li').trigger('change');
});

$(document).on("change", ".check_service_cate_all", function(event) {
	$('#overlay').show();  
	if ($(this).is(':checked')) {
		 $('.type_li').each(function() {	   
		var type_id=$(this).val();
		if ($(this).is(':checked')) {
		$('.t'+type_id).show();
		   $('.type_cat_'+type_id).prop('checked', true); 
		}else{
			$('.type_cat_'+type_id).prop('checked', false); 
			$('.t'+type_id).hide(); 
			
		}
   });
	}else{
		$('.serv_cate_ch').prop('checked', false); 
	}
	$('.comman_li_s').trigger('change');	
	$('#overlay').hide(); 
});


$(document).on("click", ".col_li", function(event) {
	$(this).parent('li').children('ol').toggle();
	if($(this).parent('li').children('i').hasClass('fa-angle-right')){
			$(this).parent('li').children('i').removeClass('fa-angle-right').addClass('fa-angle-down');
	}else{
		$(this).parent('li').children('i').removeClass('fa-angle-down').addClass('fa-angle-right');
	}
});

$(document).on("change", ".comman_li1", function(event) {
	var brand_id=$(this).val();
	if ($(this).is(':checked')) {
		$('.brand_'+brand_id).prop('checked', true); 
	}else{
		$('.brand_'+brand_id).prop('checked', false); 
	}
});
$(document).on("click", ".show_child_ul", function(event) {
	 $(this).children('ul').toggle();
	if($(this).children('i').hasClass('fa-angle-right')){
			$(this).children('i').removeClass('fa-angle-right').addClass('fa-angle-down');
	}else{
		$(this).children('i').removeClass('fa-angle-down').addClass('fa-angle-right');
	}
});
$(document).on("change", ".check_all_ser", function(event) {
	var brand_id=$(this).val();
	if ($(this).is(':checked')) {
		$(this).parent('li').find('input[type=checkbox]').prop('checked', true); 
	}else{
		$(this).parent('li').find('input[type=checkbox]').prop('checked', false); 
	}
});
$(document).on("change", ".comman_li", function(event) {

$('#overlay').show(); 
   $('.type_li').each(function() {	   
		var type_id=$(this).val();
		if ($(this).is(':checked')) {
			$('.t'+type_id).show();
			$('.sc_'+type_id).show();
		   $('.brand_li').each(function() { 		   
				var brand_id=$(this).val();
				if ($(this).is(':checked')) { // $('b.'+brand_id).show();
					$('.type_'+type_id+'.brand_'+brand_id).prop('checked', true); 
					$('.brand_'+brand_id).prop('checked', true); 
				}else{
					// $('.b'+brand_id).hide();
					$('.type_'+type_id+'.brand_'+brand_id).prop('checked', false);
$('.brand_'+brand_id).prop('checked', false);					
				}
		   });
		}else{
			$('.type_'+type_id).prop('checked', false); 
			$('.t'+type_id).hide();
		$('.sc_'+type_id).hide();
			
		}
   });
$('#overlay').hide(); 
});


$(document).on("change", ".serv_cate_ch", function(event) {
$('#overlay').show(); 
if ($(this).is(':checked')) {
	$(this).next('ol').find('input[type=checkbox]').prop('checked',true);
}else{
	$(this).next('ol').find('input[type=checkbox]').prop('checked',false);
}
$('#overlay').hide(); 
});


$(document).on("change", ".check_service_cate_all", function(event) {
$('#overlay').show(); 
if ($(this).is(':checked')) {
	$('.check_all_ser').prop('checked',true);
	$('.serv_cate_ch').prop('checked',true);
	$('.services_ch').prop('checked',true);
}else{
	$('.check_all_ser').prop('checked',false);
	$('.serv_cate_ch').prop('checked',false);
	$('.services_ch').prop('checked',false);
}
$('#overlay').hide(); 
});
$(document).on("change", ".shop_status", function(event) {
$('#overlay').show(); 
var ref=$(this).attr('data-ref'); 
if ($(this).val()=='open') {
	  $('#from_time_'+ref).prop('readonly','');
	  $('#to_time_'+ref).prop('readonly','');
	 $('#from_time_'+ref).addClass('required'); 
	  $('#from_time_'+ref).val('10:00 AM');
	  $('#to_time_'+ref).val('6:00 PM');
}else{
	 $('#from_time_'+ref).val('');
	 $('#from_time_'+ref).prop('readonly','readonly'); 
	 $('#from_time_'+ref).removeClass('required'); 
	 $('#to_time_'+ref).val('');
	 $('#to_time_'+ref).prop('readonly','readonly');
	 $('#to_time_'+ref).removeClass('required'); 
}
$('#overlay').hide(); 
});

$(document).on("click", ".delete_btn", function(event) {
	if($('.delete_image:checked').length > 0){
		$('#'+$(this).attr('data-frm')).submit();
	}else{
		alert($(this).attr('data-error-msg'))
	}
});
$(document).on("click", ".small_show_text", function(event) {
	$(this).hide();
	$(this).next('.long_show_text').show();
});
$(document).on("click", ".btn_validator1", function(event) {
	var counter=0;
	 if($('.type_li:checked').length > 0){
		 $('.type_th') .css("color", "#000"); 
	 }else{
		 counter++;
		$('.type_th') .css("color", "#ff4081"); 
	 }
	 
	 if($('.brand_li:checked').length > 0){
		 $('.brand_th') .css("color", "#000"); 
	 }else{
		 counter++;
		$('.brand_th') .css("color", "#ff4081"); 
	 }
	 
	 if($('.brand_li:checked').length > 0){
		 $('.brand_th') .css("color", "#000"); 
	 }else{
		 counter++;
		$('.brand_th') .css("color", "#ff4081"); 
	 }
	 
	 
	  if($('.model_li:checked').length > 0){
		 $('.model_th') .css("color", "#000"); 
	 }else{
		 counter++;
		$('.model_th') .css("color", "#ff4081"); 
	 }
	 	
		
	 if($('.serv_cate_ch:checked').length > 0){
		 if($('.services_ch:checked').length > 0){
			$('.serv_cate_th') .css("color", "#000"); 
		 }else{
			 counter++;
			$('.serv_cate_th') .css("color", "#ff4081"); 
		 }
		 
	 }else{
		 counter++;
		$('.serv_cate_th') .css("color", "#ff4081"); 
	 }
	if(counter==0){ 	 	
		$('#'+$(this).attr('data-frm')).submit();
}
});

$(document).on("change", ".allow_File_only", function(event) {
$('#overlay').show();
var file_type=$(this).attr('data-file');
if(file_type=='csv'){
	var regex = new RegExp("(.*?)\.(csv)$");
}
if(file_type=='xls'){
	var regex = new RegExp("(.*?)\.(xls)$");
}
if(file_type=='image'){
	var regex = new RegExp("(.*?)\.(jpg|png|gif|bmp)$");
}
if(file_type=='pdf'){
	var regex = new RegExp("(.*?)\.(pdf)$");
}
if (!(regex.test($(this).val().toLowerCase()))) {
    $(this).val(''); 
  }

$('#overlay').hide();

});
$(document).on("change", "#lan_master_type", function(event) {
	var val=$(this).val();
	$('#master_csv').attr('href','');
	$('.show_me').hide();
	if(val!=""){
		$('#overlay').show();
			$.getJSON("Language/get-csv-master", {'master_type':val}, function (response) {
				if(response['sucess']){ 
				$('#master_csv').attr('href',response['filename']);
					$('.show_me').show();
                    $('#overlay').hide();
				}else{
					 $('#overlay').hide();
				}	
			});
	}
});
 
$(document).on("click", ".service_close_open", function(event) {
	 if(confirm($(this).attr('data_msg'))){
		 return true;
	 }else{
		 return false;
	 }
});
$(document).on("click", ".set_user_id", function(event) {
	var id= $(this).attr('data-id') 
	var center= $(this).attr('data-center') 
	$('#hidden_user_id').val(id);
	$('#center_id').val(center);
	$('#basic_search').submit();
});

$(document).on("change", ".change_status", function(event) {
	var id= $(this).attr('data-id');
	var val= $(this).val();
	var cancel_reason="";
	if(val==2){
		cancel_reason=prompt('Cancel Reason');
		if(cancel_reason.length==0){
			alert('Please enter cancel reason')
			$(this).val('0');
			$('.select2').select2()
		}
	}
	$('#overlay').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {"id":id ,"val":val,"cancel_reason":cancel_reason},
			url: "Home/set_status",
			success: function(ajaxdata){   
			$('#overlay').hide();
			}
	 });
	
	
});



$('#fab_send_old').click(function(e) {
	save_chat();
});

if($('div' ).hasClass( "scroll_to_bottom1" )){   
var myDiv = $("#chat_converse").get(0);
myDiv.scrollTop = myDiv.scrollHeight;
	setInterval(function() { 
   get_latest_chat_messages();
}, 5 * 1000); 
}


$('#chatSend').keypress(function (e) { 
  if (e.which == 13) { 
	$('#fab_send').trigger('click');
    return false;    //<---- Add this line
  }
});

function get_latest_chat_messages(){
	 
		var to_user=$('#to_user_id').val();
		var center=$('#center_id').val();
	var last_id=$('#last_rc_id').val();
		$('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: { "to_user":to_user,"center":center ,"last_id":last_id },
			url: "User/get_chat_history",
			success: function(ajaxdata){   
			if(ajaxdata['html']['html_way']=='append'){
				$('#chat_converse').append(ajaxdata['html']['html'])
			}else{
				$('#chat_converse').html(ajaxdata['html']['html'])
			}
			$('#last_rc_id').val(ajaxdata['html']['last_d']);
			var myDiv = $("#chat_converse").get(0);
myDiv.scrollTop = myDiv.scrollHeight;
			$('#overlay_chat').hide();
			}
	 });
	
}
function save_chat(){
	var chat_message=$('#chatSend').val();
	var last_id=$('#last_rc_id').val();
	if(chat_message.length){
		var to_user=$('#to_user_id').val();
		var center=$('#center_id').val();
		$('#overlay_chat').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {"chat_message":chat_message ,"to_user":to_user,"center":center,"last_id":last_id },
			url: "User/save_chat",
			success: function(ajaxdata){   
			$('#chatSend').val('');
			if(ajaxdata['html']['html_way']=='append'){
				$('#chat_converse').append(ajaxdata['html']['html'])
			}else{
				$('#chat_converse').html(ajaxdata['html']['html'])
			}
			$('#last_rc_id').val(ajaxdata['html']['last_d']);
			var myDiv = $("#chat_converse").get(0);
myDiv.scrollTop = myDiv.scrollHeight;
			$('#overlay_chat').hide();
			}
	 });
	}
}


    $('[data-mask]').inputmask();
$(document).on("change", ".set_alais", function(event) {
	var val=$(this).val();
});



if($('div' ).hasClass( "load_dashboard" )){ 
 
 var month=$('#month_array').val();
 var conatcts=$('#contact_array').val();
 var leads=$('#lead_array').val(); 
 
    var areaChartData = {
      labels  : month.split(','),
      datasets: [
        {
          label               : 'Leads',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : leads.split(',')
        },
        {
          label               : 'Conatcts',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : conatcts.split(',')
        },
      ]
    }


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })


	
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
	
var lead_type_name=$('#lead_type_name_array').val();
var lead_type_color=$('#lead_type_color_array').val();
var lead_type_count=$('#lead_type_count_array').val(); 
 
	var donutDataType        = {
      labels: lead_type_name.split(','),
      datasets: [
        {
          data: lead_type_count.split(','),
          backgroundColor : lead_type_color.split(','),
        }
      ]
    }
    
    var pieChartCanvas = $('#pieChartType').get(0).getContext('2d')
    var pieData        = donutDataType;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })


var lead_status_name=$('#lead_status_name_array').val();
var lead_status_color=$('#lead_status_color_array').val();
var lead_status_count=$('#lead_status_count_array').val(); 
 
	var donutDataStatus        = {
      labels: lead_status_name.split(','),
      datasets: [
        {
          data: lead_status_count.split(','),
          backgroundColor : lead_status_color.split(','),
        }
      ]
    }
    
    var pieChartCanvas = $('#pieChartStatus').get(0).getContext('2d')
    var pieData        = donutDataStatus;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

}


$(document).on("click", "#mark_as_done", function(event) {
	var msg=$(this).attr('data-msg');
	 if($('.sub_checkbox:checked').length > 0){
		var app_id = [];
	$(".sub_checkbox:checked").each(function(){app_id.push($(this).val());});
	
	$('#overlay').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {'app_id':app_id},
			url: "Home/set_mark_as_done",
			success: function(ajaxdata){   
			$('#overlay').hide();
			location.reload() ;
			}
	 });
	 }else{
		 alert(msg)
	 }
	
});




$(document).on("click", ".send_feedback", function(event) {
	var review_hidden_id=$(this).attr('data-id');
	$('#overlay').show();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {'id':review_hidden_id},
			url: "Home/check_feedback",
			success: function(ajaxdata){   
			$('#feedback').val(ajaxdata['val']);
			$('#overlay').hide(); 
			$('#feed_back_model').modal('show');
			$('#review_hidden_id').val(review_hidden_id);
			}
	 });
	
});



$(document).on("click", "#save_feedback", function(event) {
	var review_hidden_id=$('#review_hidden_id').val();
	var class_name="btn-info";
	if($('.btn-'+review_hidden_id).hasClass('btn-danger')){
		var class_name="btn-info";
	} 
	var counter=0;
	var value=$('#feedback').val();
	if(value==""||value.length==0){
		$('#feedback').css("border-bottom-color", "#ff4081");
 		counter++;
 	}else{
		$('#feedback').css("border-bottom-color", "#d2d6de")	
	}
	if(counter==0){
		
		var feedback=$('#feedback').val();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {'id':review_hidden_id,feedback:feedback},
			url: "Home/save_feedback",
			success: function(ajaxdata){   
			$('#feedback').val('');
			$('#overlay').hide(); 
			$('#feed_back_model').modal('hide');
			$('#review_hidden_id').val('');
			$('.btn-'+review_hidden_id).removeClass('btn-danger')
			$('.btn-'+review_hidden_id).addClass(class_name)
			}
	 });
	}
});

				
if($('div' ).hasClass( "load_socket" )){   
	var websocket_server = new WebSocket($('#socket_url').val());
			websocket_server.onopen = function(e) {
				websocket_server.send(
					JSON.stringify({
						'type':'socket',
						'user_id':$('#socket_from').val(),
						'to_id':$('#socket_to').val()
					})
				);
			};
			websocket_server.onerror = function(e) {
				// Errorhandling
			}
			websocket_server.onmessage = function(e)
			{
				var user_id = $('#socket_from').val();
				var json = JSON.parse(e.data);
				switch(json.type) {
					case 'chat':
						var html ="";
						if(json.from_id==user_id){
							
							html='<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">'+$('#from_name').val()+'</span><span class="direct-chat-timestamp float-left">'+json.chat_date+'</span></div><img class="direct-chat-img" src="../uploads/users/thumb/'+$('#from_photo').val()+'" alt=""> <div class="direct-chat-text">'+json.msg+'</div> </div>';
						}else{
							html='<div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left">'+$('#to_name').val()+'</span><span class="direct-chat-timestamp float-right">'+json.chat_date+'</span></div><img class="direct-chat-img" src="../uploads/users/thumb/'+$('#to_photo').val()+'" alt=""> <div class="direct-chat-text">'+json.msg+'</div> </div>';
						}
						$('#chat_converse').append(html);
						var myDiv = $("#chat_converse").get(0);
myDiv.scrollTop = myDiv.scrollHeight;
						break; 
				}
			}
			// Events
			$('#chat_input').on('keyup',function(e){
				if(e.keyCode==13 && !e.shiftKey)
				{
					var chat_msg = $(this).val();
					websocket_server.send(
						JSON.stringify({
							'type':'chat',
							'user_id':$('#socket_from').val(),
							'to_id':$('#socket_to').val(),
							'to_name':$('#to_name').val(),
							'from_name':$('#from_name').val(),
							'center_id':$('#socket_center').val(),
							'chat_msg':chat_msg
						})
					);
					$(this).val('');
				}
			});
}
$(document).on("click", "#export_excel", function(event) {  
	var frm_id=$(this).attr('data-frm');
	$('#overlay_loader').show();
	var path=$('#'+frm_id).attr('action'); 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: path+'_export',   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
			window.open(data['filename'],'_blank' );
			$('#overlay_loader').hide(); 
		}
	});
});

$(document).on("click", "#company_export_excel", function(event) {  
	var frm_id=$(this).attr('data-frm');
	$('#overlay_loader').show();
	var path=$('#'+frm_id).attr('action'); 
	var user_id=$('#user_id').val(); 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: 'user/user_company_export/'+user_id,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
			window.open(data['filename'],'_blank' );
			$('#overlay_loader').hide(); 
		}
	});
});

$(document).on("click", "#company_history_export_excel", function(event) {  
	var frm_id=$(this).attr('data-frm');
	$('#overlay_loader').show();
	var path=$('#'+frm_id).attr('action'); 
	var user_id=$('#user_id').val(); 
	var company_id=$('#company_id').val(); 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: 'user/user_company_history_export/'+user_id+'/'+company_id,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
			window.open(data['filename'],'_blank' );
			$('#overlay_loader').hide(); 
		}
	});
});

$(document).on("click", "#seller_exclusive_order_list_export", function(event) {  
	var frm_id=$(this).attr('data-frm');
	$('#overlay_loader').show();
	var path=$('#'+frm_id).attr('action'); 
	var seller_id=$('#seller_id').val(); 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: 'order/seller_exclusive_order_list_export/'+seller_id,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
			window.open(data['filename'],'_blank' );
			$('#overlay_loader').hide(); 
		}
	});
});

$(document).on("click", "#save_pro", function(event) {  
if($('#user_company_id').val().length>0){
if($('.sub_checkbox_check:checked').length>0){
	var frm_id=$(this).attr('data-frm');
	$('#overlay_loader').show();
	var path=$('#'+frm_id).attr('action'); 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: path+'-save',   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
		$('#overlay_loader').hide();
		alert(data['msg']);
		$('#basic_search').submit();
		 
	}
	});
}else{
	alert('Please select Product')
}
}else{
	alert('Please select Company')
}
	});
	
	
	
$(document).on("click", "#export_excel1", function(event) {  
	var frm_id=$(this).attr('data-frm');
	var path=$(this).attr('data-ref');
	$('#overlay_loader').show(); 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: path ,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
		window.open(data['filename'],'_blank' );
		$('#overlay_loader').hide(); 
	}
	});
	});
	
	
	
$(document).on("click", "#restore_btn", function(event) {  
if($('.sub_checkbox:checked').length > 0){ 
	var frm_id=$(this).attr('data-frm');
	$('#overlay_loader').show();
	var path='trash/restore_records'; 
	var frmdata = new FormData(this.form);
	$.ajax({
		url: path ,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:frmdata, processData: false, contentType: false,
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{ 
		alert(data['msg'])
		$('#'+frm_id).submit(); 
		$('#overlay_loader').hide(); 
	}
	});
	
}else{
	alert('Please select record to restore');
}});
	
$(document).on("change", ".apply_comm", function(event) { 
	var total=100;
	var doc_val= $('#doctor_charges').val();
	if(doc_val.length){
		
	}else{
		var doc_val=0;
	} 
	
	var rmp_val= $('#rmp_commission').val();
	if(rmp_val.length){
		
	}else{
		var rmp_val=0;
	} 
	var wrmp=parseInt(total)-(parseInt(doc_val)+parseInt(rmp_val));
	var wormp=parseInt(total)-parseInt(doc_val);
	$('#admin_commission_with_rmp').val(wrmp);
	$('#admin_commission_without_rmp').val(wormp);
});

 $(document).on('keyup','.autocomplete_input',function(){
	 var input_id=$(this).attr('name');
	 var val=$(this).val();
    $( this).autocomplete({
      source:function(request,response){
                  $.post("User/autocomplete",{'field':input_id,'val':val}).done(function(data, status){

                    response(JSON.parse(data));
        });
      }
    });
});



$(document).on("change", ".class_24_7", function(event) {
$('#overlay').show(); 
if ($(this).is(':checked')) {
	$('.shop_status').val('open')
	$('.shop_status').prop('disabled','disabled'); 
	$('.input_from').val('12:00 AM');
	$('.input_from').prop('readonly','readonly');  
	$('.input_to').val('11:59 PM');
	$('.input_to').prop('readonly','readonly'); 
}else{
	$('.shop_status').val('open')
	$('.shop_status').prop('disabled',''); 
	$('.input_from').val('10:00 AM');
	$('.input_from').prop('readonly','');  
	$('.input_from').addClass('required'); 
	$('.input_to').val('6:00 PM');
	$('.input_to').prop('readonly',''); 
	$('.input_to').addClass('required'); 
} 
$('.select2').select2() 
$('#overlay').hide(); 
});



$(document).on("click", ".call_ajax_App", function(event) {
	if($('.app_rc:checked').length > 0){ 
		var valuesArray = $('.app_rc:checked').map( function () {
			return $(this).val();
		}).get().join();
		$('#comment_back_model').modal('show');
		$('#record_id_pending').val(valuesArray); 
		$('#record_action').val($(this).attr('data-ref')); 
	}else{
		alert('Please select appointment');
	}
	
	
});


$(document).on("click", "#save_comment", function(event) {
	 
	var counter=0;
	var value=$('#comment').val();
	if(value==""||value.length==0){
		$('#comment').css("border-bottom-color", "#ff4081");
 		counter++;
 	}else{
		$('#comment').css("border-bottom-color", "#d2d6de")	
	}
	if(counter==0){
		
		var comment=$('#comment').val();
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			data: {'record_id':$('#record_id_pending').val(),'record_action':$('#record_action').val(),comment:comment},
			url: "appointment/update_status",
			success: function(ajaxdata){   
			$('#comment').val('');
			$('#overlay').hide(); 
			$('#feed_back_model').modal('hide');
			$('#record_action').val('');
			$('#record_id_pending').val(''); 
			$('#basic_search').submit();
			} 
		});
	}
});
	  
 

if($('#appointment_date').hasClass('datepicker')){ 
var days=$('#appointment_date').attr('disable-day');
var dis_day=days.split(",");

var dates=$('#appointment_date').attr('disable-date');
var dis_date=dates.split(",");

$('.datepicker').datepicker({  
minDate: new Date(),
 maxDate: '+1m' ,
 dateFormat:"dd-mm-yy",
  beforeShowDay: function(date) {
       var show = true;
	   if(dis_day.length){
		   var cu_day="'"+date.getDay()+"'" 
		   if(dis_day.includes(cu_day)) show=false 
			
	   }
	   if(dis_date.length){
		    cu_date = "'"+date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear()+"'" ;
 			if(dis_date.includes(cu_date)) show=false 
	   }
	   return [show];
    }
});  
} 
	$(document).on("change", "#appointment_date", function(event) {
$('#overlay').show();  
var doc_id=$('#doc_id').val();
var appointment_date=$('#appointment_date').val();

$.ajax({
							type: "POST",
							async: false,
							dataType: "json", 
							data: {"selected_date":appointment_date,"doc_id":doc_id},
							url: "appointment/ajax_slotting_time",
							success: function(ajaxdata){
							$('#booking_time').html(ajaxdata['html']) 
							 $('.select2').select2()
							}
						});				
		
		
		
$('#overlay').hide(); 
});

  $(document).on("click", ".show_more", function(event) {  
  var id=$(this).attr('data-id');
  $('#span_less_'+id).hide();
  $('#span_more_'+id).show();
  });
  
  

  $(document).on("click", ".show_pass", function(event) {  
  $(this).hide();
  $(this).next('span').show();
  });
  
  
  $(document).on("click", ".hide_pass", function(event) {  
  $(this).hide();
  $(this).prev('span').show();
  });
  
  
  
  
   $(document).on("click", ".check_permission_all", function(event) {
	var assi_class=$(this).attr('data-class');
	 if ($(this).is(':checked')) {

		  $("."+assi_class).prop('checked', true); 	 

	 }else{

		 $("."+assi_class).prop('checked', false); 

		 } 						 
 });
 
 
 
$(document).on("click", ".submit_as_lead", function(event) { 
	if($('.sub_checkbox:checked').length > 0){  
		$('#convert_as').val($(this).attr('data-ref'));
		
		var frm_id=$(this).attr('data-frm');
		$('#overlay_loader').show();
		var path=$('#'+frm_id).attr('action'); 
		var frmdata = new FormData(this.form);
		$.ajax({
			url: path+'_covertlead',   	// Url to which the request is send
			type: "post",      				// Type of request to be send, called as method
			data:frmdata, processData: false, contentType: false,
			dataType: "json",
			cache: false, async: true	,
			success: function(data)  		// A function to be called if request succeeds
			{ 
			$('#search').trigger('click');
			$('#overlay_loader').hide(); 
			}
		});
	
	}else{
		alert('Please select contact');
	}
	
	
});

 
 $(document).on("click", "#assign_lead_btn", function(event) {
	if($('#asign_user_id').val()){
		
	
	if($('.sub_checkbox:checked').length > 0){ 
		var valuesArray = $('.sub_checkbox:checked').map( function () {
			return $(this).val();
		}).get().join();
		$('#basic_search').attr('action','contact/mark-assign-lead');
		$('#basic_search').submit();
	}else{
		alert('Please select lead(s)');
	}
	}else{
		alert('Please select user');
	}
	
	
});

 
 $('.disable_right_click').mousedown(function(e) {
                if (e.button == 2) {
                    //alert('right-click is disabled!');
                    e.preventDefault();
                }
            });
			
		$('.disable_right_click').on("cut", function(e) { 
                e.preventDefault();
            });
            $('.disable_right_click').on("copy", function(e) { 
                e.preventDefault();
            });
            $('.disable_right_click').on("paste", function(e) { 
                e.preventDefault();
            });
			
document.onkeypress = function (event) {  
event = (event || window.event);  
if (event.keyCode == 123) {  
return false;  
}  
}  
document.onmousedown = function (event) {  
event = (event || window.event);  
if (event.keyCode == 123) {  
return false;  
}  
} 
 
$(document).keydown(function(e) {    
    if ((e.ctrlKey || e.metaKey) && e.keyCode == 65) {
      e.preventDefault();
    }
  });
document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    }      
 }
 $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
 
	
$(document).on("click", ".delete_me", function(event) {  
	if(confirm("Do You Want To Delete This Record ?")){
			 $(this).parent().remove();
		}else{
			return false;	
		}	
});
$(document).on("change", ".apply_margin", function(event) {   
	var seller_margin=$(this).find('option:selected').attr('data-margin');
	$('#seller_standard_margin').val(seller_margin);
});

$(document).on("change", "#is_scheme_product", function(event) {   
if($(this).val()=='1'){
	$('.scheme_input').addClass('required')
	$('.scheme_div').show();
}else{
	$('.scheme_input').removeClass('required')
	$('.scheme_div').hide();
}
});
if($('select').hasClass('is_scheme_select')){
  if($('#is_scheme_product').val()=='1'){
	$('.scheme_input').addClass('required')
	$('.scheme_div').show();
}else{
	$('.scheme_input').removeClass('required')
	$('.scheme_div').hide();
}
}

$('.toastsDefaultTopLeft').click(function() {
	var data_msg=$(this).attr('data-msg');
	var data_title=$(this).attr('data-title');
	$('.scheme_product_body').html(data_msg);
	$('#dy_scheme_product_title').html(data_title);
    $('#modal-llg').modal('show');   
    });




$(document).on("click", ".send_bank_model", function(event) {
	var company_name=$(this).attr('data-compnay-name');
	var user_name=$(this).attr('data-user-name');
	var send_user_id=$(this).attr('user_id');
	var send_company_id=$(this).attr('company_id');
	$('#com_name2').html(company_name); 
	$('#com_name').val(company_name); 
	$('#cust_name2').html(user_name); 
	$('#cust_name').val(user_name); 
	$('#send_user_id').val(send_user_id); 
	$('#send_company_id').val(send_company_id); 
	$('#send_bank_model').modal('show'); 
	
});
$(document).on("click", ".btn_send_customer_model", function(event) {
	var company_name=$(this).attr('data-compnay-name');
	var user_name=$(this).attr('data-user-name');
	var send_user_id=$(this).attr('user_id');
	var send_company_id=$(this).attr('company_id');
	$('#com_name1').html(company_name); 
	$('#cust_name1').html(user_name); 
	$('#com_name').val(company_name); 
	$('#cust_name').val(user_name); 
	$('#sendc_user_id').val(send_user_id); 
	$('#sendc_company_id').val(send_company_id); 
	$('#send_customer_model').modal('show'); 
	
});

$(document).on("click", "#se_to_banks", function(event) { 
	var counter=0; 
	var comment=$("#bank_comment").val();   
	if(($.trim(comment) == '')&&(comment.length==0)){
		$("#bank_comment").css("border-bottom-color", "#F00"); 
		counter++; 
	}else{ 
		$("#bank_comment").css("border-bottom-color", "#d2d6de"); 
	} 
	if(counter==0)
	{	
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
			alert(data['msg']);
			$('#send_bank_model').modal('hide');
			setTimeout(function(){
                location.reload();
			}, 1000);  			
			$('#overlay_loader').hide(); 
			}
		});
	}	
	else
	{
		alert('Please enter comment.');
	} 
	
});

$(document).on("click", "#se_to_customer", function(event) { 
	 	var counter=0; 
	var comment=$("#cust_comment").val();   
	if(($.trim(comment) == '')&&(comment.length==0)){
		$("#cust_comment").css("border-bottom-color", "#ff4081"); 
		counter++; 
	}else{ 
		$("#cust_comment").css("border-bottom-color", "#d2d6de"); 
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
			alert(data['msg']);
			$('#send_customer_model').modal('hide');
			setTimeout(function(){
                location.reload();
			}, 1000);  			
			$('#overlay_loader').hide(); 
			}
		});
	}
	 
	
});

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

 $('.call_run_time_auto').each(function() { 
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
		
		
		
$('#overlay').hide(); });


$(document).on("click", ".delete_file_run", function(event) {  
	if(confirm("Do You Want To Delete This File ?")){
			 $(this).parent().remove();
		}else{
			return false;	
		}
	var app_id = [];	
$('.license_hidden').each(function() { 
	app_id.push($(this).val());
	
});
$('#license').attr('data-ufile',app_id);
alert($('#license').attr('data-ufile'));
});

$(document).on("click", ".master_model_call	", function(event) {  

$('#overlay').show();  
var pro_id=$(this).attr('data-id'); 
var call_to=$(this).attr('data-call-to'); 
 
if(call_to=="get_product_varient" || call_to=="get_product_varient_stock"){
	 var company_id=$(this).attr('data-company_id');
}else{
	var company_id='';
}

var path='product/'+call_to; 
	$.ajax({
		url: path,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:  { "pro_id":pro_id,"company_id":company_id },
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{
			$('#master_run_model').modal('show');
			$('.ajax_master_run').html(data['html']);
			$('.run_time_title').html(data['popup_title']);
			$('.select2').select2();
			$('#overlay').hide();
		}
	});

});

$(document).on("change", ".value_chnaged", function(event) { 
 $('.update_Stock_btn').show();
}); 
$(document).on("click", ".delete_delete_me_ajax", function(event) {  
	if(confirm("Do You Want To Delete This Record ?")){
			var id=$(this).attr('data-id'); 
			var module=$(this).attr('data-module');  
$('#overlay').show();
				$.ajax({
					url: 'home/get_run_time_delete',   	// Url to which the request is send
					type: "post",      				// Type of request to be send, called as method
					data:  { "ref_id":id,"ref_tb":module },
					dataType: "json",
					cache: false, async: true	,
					success: function(data)  		// A function to be called if request succeeds
					{
						$('.tr_r'+id).remove();
						$('#overlay').hide();
					}
				});
	
		}else{
			return false;	
		}	
});


$(document).on("click", ".edit_ajax_rc", function(event) {   
			var id=$(this).attr('data-id');  
$('#overlay').show();
				$.ajax({
					url: 'product/get_variennt_info',   	// Url to which the request is send
					type: "post",      				// Type of request to be send, called as method
					data:  { "ref_id":id  },
					dataType: "json",
					cache: false, async: true	,
					success: function(data)  		// A function to be called if request succeeds
					{ 
					for (let x in data['id']) { 
					if(data['id'][x]=='image_src'){
						$('#photo').val('');
						$('#'+data['id'][x]).attr('src',data['value'][x])
					}else{
						$('#'+data['id'][x]).val(data['value'][x])
					}
					}	
					if($('input').hasClass('clear_fprice')){
						$('#final_price').val('');
					}
					if($('input').hasClass('clear_bprice')){
						$('#base_price').val('');
					} 
						$('#discount_price').val(''); 
						$('.select2').select2();
						$('#overlay').hide();
					}
				});
	 
});

$(document).on("change", ".check_cal_price", function(event) {   

	var discount_type=$('#discount_type').val(); 
	var discount=parseFloat($('#discount').val()); 
	var base_price=parseFloat($('#base_price').val()); 
	var igst_per=parseFloat($('#igst_per').val()); 
	var cgst_per=parseFloat($('#cgst_per').val()); 
	var sgst_per=parseFloat($('#sgst_per').val()); 
	var final_price=parseFloat($('#final_price').val()); 
	var discount_price=parseFloat($('#discount_price').val()); 

	if(discount>0 && discount_type=="per")
	{
		if (discount>100) 
		{
			alert('Discount should be less than 100%.');
			$('#discount').val(''); 
			return false;
		}
	}

	if(base_price>0)
	{
		var cgst_price=parseFloat((base_price*cgst_per)/100).toFixed(2); 
		var sgst_price=parseFloat((base_price*sgst_per)/100).toFixed(2); 
		var igst_price=parseFloat((base_price*igst_per)/100).toFixed(2); 
		var final_price=parseFloat(base_price) + parseFloat(cgst_price) + parseFloat(sgst_price); 
		var final_price=parseFloat(final_price).toFixed(2);
		$('#final_price').val(final_price); 
	}
	else if (final_price>0) 
	{
		var base_price=parseFloat(((final_price)*100)/(100+igst_per)).toFixed(2); 
		var cgst_price=parseFloat((base_price*cgst_per)/100).toFixed(2); 
		var sgst_price=parseFloat((base_price*sgst_per)/100).toFixed(2); 
		var igst_price=parseFloat((base_price*igst_per)/100).toFixed(2); 

		$('#base_price').val(base_price); 
	}

	var base_price=parseFloat($('#base_price').val()); 
	var final_price=parseFloat($('#final_price').val()); 
	var discount_price =0;
	if(discount>0 && (final_price>0 || base_price>0))
	{
		if (final_price>0) 
		{
			if(discount_type=='per')
			{
				var discount_per=discount;
				var discount_amount =parseFloat(((final_price*discount)/100)).toFixed(2); 
				var discount_price =parseFloat((final_price-discount_amount)).toFixed(2); 
			}
			else
			{
				var discount_amount =discount; 
				var discount_price =parseFloat((final_price-discount_amount)).toFixed(2); 
				var discount_per =parseFloat(((final_price*discount)/100)).toFixed(2); 
			}
		}
		else
		{
			if(discount_type=='per')
			{
				var discount_per=discount;
				var discount_amount =parseFloat(((base_price*discount)/100)).toFixed(2); 
				var discount_price =parseFloat((final_price-discount_amount)).toFixed(2);
			}
			else
			{
				var discount_amount =discount; 
				var discount_price=parseFloat((final_price-discount)).toFixed(2); 
				var discount_per=parseFloat(((base_price*discount)/100)).toFixed(2);
			}
		}
	}
	$('#discount_price').val(discount_price); 
	
	$('.select2').select2();
});

$(document).on("change", ".assign_auto_modules", function(event) { 
var element_id=$(this).attr('data-assign-to'); 
if($(this).find('option:selected').attr('data-module').length!=0){
	var str1=$(this).find('option:selected').attr('data-module');
	var split_string = str1.split(",");
	$('#'+element_id).val(split_string);
	$('.select2').select2();
}else{
	$('#'+element_id).val('');
	$('.select2').select2();
}
});
$(document).on("click", ".download_import_product", function(event) {
	var id=$('#category_id').val();  
$('#overlay').show();
				$.ajax({
					url: 'product/import_product_format',   	// Url to which the request is send
					type: "post",      				// Type of request to be send, called as method
					data:  { "cat_id":id  },
					dataType: "json",
					cache: false, async: true	,
				success: function(data)  		// A function to be called if request succeeds
		{ 
		window.open(data['filename'],'_blank' );
		$('#overlay').hide(); 
	}
				});
	 
});	
$(document).on("click", "#copy_lik", function(event) {  
$('body').removeClass('disable_right_click') 
  var copyText = document.getElementById('sponsor_link');
  copyText.select();
  document.execCommand("copy"); 
  alert("Link Copied: " + copyText.value);
//$('body').addClass('disable_right_click')
});

/*	

*/


$(document).on("click", "#save_product_note", function(event) {  
	// if($('.check_all_check:checked').length>0){ 
	if($('.sub_checkbox_check:checked').length>0){
		var frm_id=$(this).attr('data-frm');
		
		$('#overlay_loader').show();
		var path=$('#'+frm_id).attr('action'); 
		var frmdata = new FormData(this.form);
		$.ajax({
			url: 'home/update_run_status',   	// Url to which the request is send
			type: "post",      				// Type of request to be send, called as method
			data:frmdata, processData: false, contentType: false,
			dataType: "json",
			cache: false, async: true	,
			success: function(data)  		// A function to be called if request succeeds
			{ 
			$('#overlay_loader').hide();
			alert(data['msg']);
			$('#basic_search').submit();
			 
		}
		}); 
		
	}else{
		alert('Please select Product')
	}
});
	
	


$(document).on("change", "#select_seller", function(event) {
	var data_url=$(this).find('option:selected').attr('data-url');
	location.href=data_url;
});	

$(document).on("click", ".auto_update", function(event) {  
	$('.show_here_data').show();
	$('.show_final_price').html($(this).attr('data-sfprice'))
	$('.final_price').html($(this).attr('data-fprice'))
	$('.discount_ribbon').html($(this).attr('data-discountlable'))
	$('.cgst_per').html($(this).attr('data-cgst'))
	$('.sgst_per').html($(this).attr('data-sgst'))
	$('.igst_per').html($(this).attr('data-igst')) 
	$('#run_time_chnage_image').attr('src',$(this).attr('data-img'))
});

$(document).on("click", ".show_run_image", function(event) {   
	$('#run_time_chnage_image').attr('src',$(this).attr('data-img'))
});

$(document).on("click", ".chnage_run_status", function(event) {  
	// if($('.check_all_check:checked').length>0){
	if($('.sub_checkbox_check:checked').length>0){
		var module=$(this).attr('data-module');
		var filed=$(this).attr('data-filed');
		var assign_val=$(this).attr('data-action');
		$('#module').val(module);
		$('#field').val(filed);
		$('#assign_val').val(assign_val);
		$('#master_product_note_model').modal('show');
		if(assign_val==1)
		{
			var heading="Product Approved Note";
		}else{
			var heading="Product Reject Note.";
		}
		$('#modelheading').html(heading);

	}else{
		alert('Please select Product')
	}
});
	
	
	
	
	$('.show_hide_respective').trigger('change');
$(document).on("change", ".show_hide_respective", function(event) {  
 if($(this).val()=='1'){
	 $('.user_time_div').hide();
 }else{
	  $('.user_time_div').show();
 }
	});

if($('select').hasClass('show_hide_respective')){
	 if($('.show_hide_respective').val()=='1'){
	 $('.user_time_div').hide();
 }else{
	  $('.user_time_div').show();
 }
 $('.select2').select2();
	
}

if($('select').hasClass('offer_for')){ 
	var offer_type = $("#offer_type").val();
	if($('.offer_for').val()=='2'){
		$("#min_purchase_amount_on").html("<option value='2' selected>Total Categories Amount</option>");

		$('#category_id').addClass('required');
		$('.category_div').show();
		$('.product_div').hide();
		if(offer_type=='discount' || offer_type=='cashback')
		{
			$('.discount_type_per').prop('checked',true)
			$('.o_offer_for_div').hide();
	 		$('.offer_for_div').show();
		}
		else
		{
			if(offer_type=='free_product'){
				 $('.discount_type_free').prop('checked',true)
				 $('.o_free_product_div').hide();
				 $('.free_product_div').show();
			}else{
				 $('.discount_type_amt').prop('checked',true)
				 $('.o_free_product_div').show();
				 $('.free_product_div').hide();
			}			
		}
	}else if($('.offer_for').val()=='3'){
		$("#min_purchase_amount_on").html("<option value='3' selected>Total Products Amount</option>");

		$('#product_id').addClass('required');
		$('.product_div').show();
		$('.category_div').hide();
		if(offer_type=='discount' || offer_type=='cashback')
		{
			$('.discount_type_per').prop('checked',true)
			$('.o_offer_for_div').hide();
	 		$('.offer_for_div').show();
		}
		else
		{
			if(offer_type=='free_product'){
				 $('.discount_type_free').prop('checked',true)
				 $('.o_free_product_div').hide();
				 $('.free_product_div').show();
			}else{
				 $('.discount_type_amt').prop('checked',true)
				 $('.o_free_product_div').show();
				 $('.free_product_div').hide();
			}
		}
	}else{
		$("#min_purchase_amount_on").html("<option value='1' selected>Total Cart Amount</option>");

		$('#category_id').removeClass('required');
		$('#product_id').removeClass('required');
		$('.category_div').hide();
		$('.product_div').hide();
		if(offer_type=='free_product'){
			 $('.discount_type_free').prop('checked',true)
			 $('.o_free_product_div').hide();
			 $('.free_product_div').show();
		}else{
			 $('.discount_type_amt').prop('checked',true)
			 $('.o_free_product_div').show();
			 $('.free_product_div').hide();
		}
	}
	$('.select2').select2();
	
}

$(document).on("change", "#offer_for", function(event) { 
	var offer_type = $("#offer_type").val();  
	//alert(offer_type);
	//alert($(this).val());
 	if($(this).val()=='2'){
 		$("#min_purchase_amount_on").html("<option value='2' selected>Total Categories Amount</option>");

	 	$('#category_id').addClass('required');
	 	$('.category_div').show();
	  	$('.product_div').hide();
	  	if(offer_type=='discount' || offer_type=='cashback')
		{
			$('.discount_type_per').prop('checked',true)
			$('.o_offer_for_div').hide();
	 		$('.offer_for_div').show();
		}
		else
		{
			if(offer_type=='free_product'){
				 $('.discount_type_free').prop('checked',true)
				 $('.o_free_product_div').hide();
				 $('.free_product_div').show();
			}else{
				 $('.discount_type_amt').prop('checked',true)
				 $('.o_free_product_div').show();
				 $('.free_product_div').hide();
			}
		}
 	}else if($(this).val()=='3'){
 		$("#min_purchase_amount_on").html("<option value='3' selected>Total Products Amount</option>");

	  	$('#product_id').addClass('required');
	  	$('.product_div').show();
	  	$('.category_div').hide();
	  	if(offer_type=='discount' || offer_type=='cashback')
		{
			$('.discount_type_per').prop('checked',true)
			$('.o_offer_for_div').hide();
	 		$('.offer_for_div').show();
		}
		else
		{
			if(offer_type=='free_product'){
				 $('.discount_type_free').prop('checked',true)
				 $('.o_free_product_div').hide();
				 $('.free_product_div').show();
			}else{
				 $('.discount_type_amt').prop('checked',true)
				 $('.o_free_product_div').show();
				 $('.free_product_div').hide();
			}
		}
 	}else{
    	$("#min_purchase_amount_on").html("<option value='1' selected>Total Cart Amount</option>");

	 	$('#category_id').removeClass('required');
	 	$('#product_id').removeClass('required');
	 	$('.category_div').hide();
	 	$('.product_div').hide();

	 	if(offer_type=='free_product'){
			$('.discount_type_free').prop('checked',true)
			$('.o_free_product_div').hide();
			$('.free_product_div').show();
		}else{
			$('.discount_type_amt').prop('checked',true)
			$('.o_free_product_div').show();
			$('.free_product_div').hide();
		}
 }
 $('.select2').select2();
});
	

if($('select').hasClass('coupon_for')){ 
	if($('.coupon_for').val()=='2'){
	 $('#category_id').addClass('required');
	 $('.category_div').show();
	  $('.product_div').hide();
 }else if($('.coupon_for').val()=='3'){
	  $('#product_id').addClass('required');
	  $('.product_div').show();
	  $('.category_div').hide();
 }else{
	 $('#category_id').removeClass('required');
	 $('#product_id').removeClass('required');
	 $('.category_div').hide();
	 $('.product_div').hide();
 }
 $('.select2').select2();
	
}
$(document).on("change", "#coupon_for", function(event) {   
 if($(this).val()=='2'){
	 $('#category_id').addClass('required');
	 $('.category_div').show();
	  $('.product_div').hide();
 }else if($(this).val()=='3'){
	  $('#product_id').addClass('required');
	  $('.product_div').show();
	  $('.category_div').hide();
 }else{
	 $('#category_id').removeClass('required');
	 $('#product_id').removeClass('required');
	 $('.category_div').hide();
	 $('.product_div').hide();
 }
 $('.select2').select2();
	});
	
	
	$(document).on("click", ".order_detail_popup", function(event) {  

$('#overlay').show();  
var order_id=$(this).attr('data-id');  
var seller_id=$(this).attr('data-seller-id');  
var path='order/get_order_product_details'; 
	$.ajax({
		url: path,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:  { "order_id":order_id,"seller_id":seller_id },
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{
			$('#master_run_model').modal('show');
			$('.ajax_master_run').html(data['html']);
			$('.run_time_title').html(data['popup_title']);
			$('.select2').select2();
			$('#overlay').hide();
		}
	});

});
	
	$(document).on("click", ".order_payment_popup", function(event) {  

$('#overlay').show();  
var order_id=$(this).attr('data-id');  
var path='order/get_order_payment_details'; 
	$.ajax({
		url: path,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:  { "order_id":order_id },
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{
			$('#master_run_model').modal('show');
			$('.ajax_master_run').html(data['html']);
			$('.run_time_title').html(data['popup_title']);
			$('.select2').select2();
			$('#overlay').hide();
		}
	});

});



$(document).on("click", "#paymet_approve_order", function(event) {  
// if($('.check_all_check:checked').length>0){ 
if($('.sub_checkbox_check:checked').length>0){ 
$('#basic_search').attr('action','order/make-approve-order');
$('#basic_search').submit();
}else{
	alert('Please select order')
}
	});

$(document).on("click", "#save_order_reject_note", function(event) {  
// if($('.check_all_check:checked').length>0){ 
if($('.sub_checkbox_check:checked').length>0){ 
$('#basic_search').attr('action','order/make-reject-order');
$('#basic_search').submit();
}else{
	alert('Please select order')
}
	});

$(document).on("click", "#payment_reject_order", function(event) {  
// if($('.check_all_check:checked').length>0){ 
if($('.sub_checkbox_check:checked').length>0){ 
$('#master_order_note_model').modal('show');
}else{
	alert('Please select order')
}
	});		
	
	 $('.select2_placeholder').each(function() {
		 var custom_pace=$(this).attr('placeholder');
	$(this).select2({
    placeholder:custom_pace 
});
});


$(document).on("click", "#approve_order_product", function(event) {  
if($('.sub_checkbox_check:checked').length>0){ 
$('#basic_search').attr('action','order/make-approve-order-product');
$('#basic_search').submit();
}else{
	alert('Please select product')
}
	});

$(document).on("click", "#save_product_reject_note", function(event) {  
if($('.sub_checkbox_check:checked').length>0){ 
$('#basic_search').attr('action','order/make-reject-order-product');
$('#basic_search').submit();
}else{
	alert('Please select product')
}
	});

$(document).on("click", "#reject_order_product", function(event) {  
if($('.sub_checkbox_check:checked').length>0){ 
$('#master_order_product_note_model').modal('show');
}else{
	alert('Please select product')
}
	});		
	
	

$(document).on("click", "#mark_dispatch_product", function(event) {  
if($('.sub_checkbox_check:checked').length>0){ 
$('#basic_search').attr('action','order/make-dispatch-order-product');
$('#basic_search').submit();
}else{
	alert('Please select product')
}
	});


$(document).on("click", "#mark_as_delivered", function(event) {  
if($('.sub_checkbox_check:checked').length>0){ 
$('#basic_search').attr('action','order/make-delivered-order-product');
$('#basic_search').submit();
}else{
	alert('Please select product')
}
	});

 $(document).on("click", ".discount_type", function(event) {

	 if ($(this).val()=='product') {
		$('#free_product_id').addClass('required')
		$(".free_product_div").show(); 	 

	 }else{
$('#free_product_id').removeClass('required')
		$(".free_product_div").hide(); 

		 }
		  $('.select2').select2()
 });
 
 $(document).on("change", "#offer_type", function(event) { 
 	var offer_for = $("#offer_for").val();

	 if($(this).val()=='free_product'){
		 $('.discount_type_free').prop('checked',true)
		 $('.o_free_product_div').hide();
		 $('.free_product_div').show();
	 }else{
		 /*$('.discount_type_amt').prop('checked',true)
		 $('.o_free_product_div').show();
		 $('.free_product_div').hide();*/

		 if(offer_for=='2')
		 {
	    	$("#min_purchase_amount_on").html("<option value='2' selected>Total Categories Amount</option>");

			$('.discount_type_per').prop('checked',true)
			$('.o_offer_for_div').hide();
	 		$('.offer_for_div').show();
		 }
		 else if(offer_for=='3')
		 {
	    	$("#min_purchase_amount_on").html("<option value='3' selected>Total Products Amount</option>");

			$('.discount_type_per').prop('checked',true)
			$('.o_offer_for_div').hide();
	 		$('.offer_for_div').show();
		 }else{
		 	$("#min_purchase_amount_on").html("<option value='1' selected>Total Cart Amount</option>");
	    	
		 	$('.discount_type_amt').prop('checked',true)
			$('.o_free_product_div').show();
			$('.free_product_div').hide();
		 }
	 }

	 $('.select2').select2()
 });

 $(document).on("click", "#offer_apply_to", function(event) { 
 if ($(this).is(':checked')) {
	 $('#offer_apply_seller').val('');
	 $('#offer_apply_seller').prop('disabled',true) 
 }else{
	 $('#offer_apply_seller').prop('disabled',false) 
 }
 $('.select2').select2()
 });

$(document).on("click", ".apply_offer", function(event) {  

$('#overlay').show();   
var apply_status=$(this).attr('data-status');  
var apply_user=$(this).attr('data-user');  
var offer_id=$(this).attr('data-id');  
if(apply_status==1){
	var hide_span="offer_"+offer_id+"_1";
	var show_span="offer_"+offer_id+"_0";
	var confirm_msg="Are you sure do you want to join this offer";
}else if(apply_status==0){
	var hide_span="offer_"+offer_id+"_0";
	var show_span="offer_"+offer_id+"_1";
	var confirm_msg="Are you sure do you want to close this offer";
}
if(confirm(confirm_msg)){
var path='user/join_offer'; 
	$.ajax({
		url: path,   	// Url to which the request is send
		type: "post",      				// Type of request to be send, called as method
		data:  { "apply_status":apply_status , "apply_user":apply_user ,"offer_id":offer_id },
		dataType: "json",
		cache: false, async: true	,
		success: function(data)  		// A function to be called if request succeeds
		{  
			$('#'+show_span).show();
			$('#'+hide_span).hide();
			alert(data['msg'])
			$('#overlay').hide();
		}
	});
}
});

$('.check_margin_for').change(function(){
    margin_for = $("input[name='margin_for']:checked").val();
    // alert(margin_for);
    if (margin_for==1)
    {
      // $('#space_cate_multi').css({'display':'block'});
      $('#space_cate_multi').show();
      $('#multi_category_id').addClass('required');
      $('#category_id').removeClass('required');
      $('#category_id').removeClass('get_product');
      $('#space_cate').css({'display':'none'});
      $('#product_id').removeClass('required');
      $('#space_prod').css({'display':'none'});
    }
    else if(margin_for==2)
    {
      $('#multi_category_id').removeClass('required');
      $('#space_cate_multi').css({'display':'none'});
      // $('#space_cate').css({'display':'block'});
      $('#space_cate').show();
      $('#category_id').addClass('required');
      $('#category_id').addClass('get_product');
      // $('#space_prod').css({'display':'block'});
      $('#space_prod').show();
      $('#product_id').addClass('required');
    }
    else
    {         
      $('#multi_category_id').removeClass('required');
      $('#space_cate_multi').css({'display':'none'});          
      $('#category_id').removeClass('required');
      $('#category_id').removeClass('get_product');
      $('#space_cate').css({'display':'none'});
      $('#product_id').removeClass('required');          
      $('#space_prod').css({'display':'none'});
    }
});

$(document).on('change',".get_product",function(event) 
{
  // alert('aaaaaaaaa');
  var category_id = $("#category_id").val();
  var seller_id = $("#seller_id").val();
  // alert(seller_id);
  if(category_id!='' && category_id>'0')
  {
    if(seller_id!='' && seller_id>'0')
    {

      $.getJSON("User/get_product_list_by_category", {"category_id":category_id,"seller_id":seller_id}, function (response) 
      {
        if(response['sucess'])
        { 
          $('#product_id').html(response['html']);
          $('.select2').select2();
        }else{
          alert('Seller Has no any product for this category.');
          $('#product_id').html('');
          $('.select2').select2();
        }
      });
    }
    else
    {
      alert('Please select Seller First.');
      document.getElementById("category_id").selectedIndex = 0;
      document.getElementById("multi_category_id").selectedIndex = 0;
      $('.select2').select2();
      $("#category_id").val('');
      return false;
    }
    
  }
  else
  {
    alert('Please select Category First.');
    return false;
  }
  
});

$(document).on('change',".check_seller",function(event) 
{
	document.getElementById("category_id").selectedIndex = 0;
	document.getElementById("multi_category_id").selectedIndex = 0;
	document.getElementById("product_id").selectedIndex = -1;
	 $('.select2').select2();

});




function update_sellers_margin_status(seller_margin_id)
{
	// alert(is_approve);
	$.ajax({
		type: "POST",
		async: false,
		dataType: "json",
		data: { "seller_margin_id":seller_margin_id},
		url: "User/update_sellers_margin_status",
		success: function(ajaxdata){   
			$("#sellers_margin_sts_"+seller_margin_id).html(ajaxdata);
		}
	 });	
}


$(document).on('click',".pay_to_seller",function(event) 
{ 
    
   var seller_name=$(this).attr('data-seller-name');
    var data_price=$(this).attr('data-max-amount');
   $('#max_price_val').val(data_price);
   $('#pay_amount').val(data_price);
   $('#popup_seller_invoice_id').val($(this).attr('data-invoice'));
   $('#popup_order_id').val($(this).attr('data-id'));
   $('#popup_seller_id').val($(this).attr('data-seller'));
     $('.seller_name_id').html(seller_name)
    $('#myModalseller').modal('show');
    $('.singledate').daterangepicker({singleDatePicker:true});
});

$(document).on("click", ".btn_validator_seller_pay", function(event) {
		var buttonElement = $(this);
		var counter=0;
		$('.rrequired').each(function() {
			var currentElement = $(this);
			var value = $.trim(currentElement.val());
			if(value==""||value.length==0)			{
				// alert($(this).attr('name'));
				$(this).css("border-bottom", "1px solid red");
				counter++;
			}else{
				$(this).css("border-bottom", "1px solid #d2d6de");
			}
		});
		if(counter==0){
		    var pay_amount=parseFloat($('#pay_amount').val());
		    var max_price_val=parseFloat($('#max_price_val').val())
		    if(pay_amount>max_price_val){
		       $('#pay_amount').val($('#max_price_val').val());
		       alert('Payment amount is greater than payable amount - '+$('#max_price_val').val());
		       counter++;
		       return false;
		    }
		}
		if(counter==0){
			$('#'+buttonElement.attr('data-frm')).submit();
		}
		else
		{
			alert('Please enter or select required fields.');
			return false;
		}

});

$(document).on('click','.pay_to_seller_h',function(event){
   var order_id= $(this).attr('data-invoice');
   var seller_id= $(this).attr('data-seller');
   var seller_name=$(this).attr('data-seller-name');
	$.getJSON("Order/get_seller_payment_history", {order_id:order_id,seller_id:seller_id }, function (response) {

		if(response['sucess']){
		    $('.seller_name_id1').html(seller_name)
            $('#history_table_body').html(response['html'])
            $('#myModalseller_h').modal('show');
		}

	});

});


$(document).on('click',".refund_to_user",function(event) 
{     
   var orderno=$(this).attr('data-orderno');
    var data_price=$(this).attr('data-max-amount');
   $('#max_price_val').val(data_price);
   $('#order_number').val(orderno);
   $('#cancel_amount').val(data_price);
   $('#order_id').val($(this).attr('data-id'));
   $('#user_id').val($(this).attr('data-userid'));
     $('.cancel_order_id').html(orderno)
    $('#myModalreturn').modal('show');
    $('.singledate').daterangepicker({singleDatePicker:true});
});



$(document).on('click',".refund_return_to_user",function(event) 
{     
   var orderno=$(this).attr('data-orderno');
    var data_price=$(this).attr('data-max-amount');
   $('#max_price_val').val(data_price);
   $('#order_number').val(orderno);
   $('#return_amount').val(data_price);
   $('#order_id').val($(this).attr('data-id'));
   $('#user_id').val($(this).attr('data-userid'));
     $('.return_order_id').html(orderno)
    $('#myModalreturn').modal('show');
    $('.singledate').daterangepicker({singleDatePicker:true});
});

$(document).on("click", ".btn_validator_return_refund", function(event) {
		var buttonElement = $(this);
		var counter=0;
		$('.rrequired').each(function() {
			var currentElement = $(this);
			var value = $.trim(currentElement.val());
			if(value==""||value.length==0)			{
				// alert($(this).attr('name'));
				$(this).css("border-bottom", "1px solid red");
				counter++;
			}else{
				$(this).css("border-bottom", "1px solid #d2d6de");
			}
		});
		if(counter==0){
		    var return_amount=parseFloat($('#return_amount').val());
		    var max_price_val=parseFloat($('#max_price_val').val())
		    if(return_amount>max_price_val){
		       $('#return_amount').val($('#max_price_val').val());
		       alert('Refund amount is greater than payable amount - '+$('#max_price_val').val());
		       counter++;
		       return false;
		    }
		}
		if(counter==0){
			$('#'+buttonElement.attr('data-frm')).submit();
		}
		else
		{
			alert('Please enter or select required fields.');
			return false;
		}

});


$('.mobile_vali').bind('change', function (event) {
  var mobile=$(this).val(); 
  		if(mobile.length==10){
 			 }else{
				 $(this).val('');
				 alert('Enter 10 Digit Number')
				 }
 });

