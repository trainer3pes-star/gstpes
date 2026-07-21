<!-- jQuery -->
<script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url();?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url();?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>
<script src="<?php echo base_url();?>plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>dist/js/demo.js"></script>
<script src="<?php echo base_url();?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url();?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>dist/js/function.js"></script>
<script src="<?php echo base_url();?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="<?php echo base_url();?>plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="<?php echo base_url();?>/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
	$(function () {
		<?php if(!$this->session->userdata('crm_admin_login_user_project')){
			if(@$login_user_info->UserType!=1){
			?>
		$('#product_model').modal('show');
		<?php } } ?>
		$('#compose-textarea').summernote();
if($('#editor1').hasClass('editor_class')){

	CKEDITOR.replace('editor1');

	CKEDITOR.config.allowedContent = true;

	}
	if($('#editor2').hasClass('editor_class')){

	CKEDITOR.replace('editor2');

	CKEDITOR.config.allowedContent = true;

	}
	});                                 
	
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
$(document).on('change','.profile_photo',function(event) {
       
      var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	 var div_id=$(this).attr('data-class'); 
     var image_holder = $("."+div_id+"");
     
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
						image_holder.empty();
						$("<div class='thumb_outer_div'><img  id='image_src' src='"+e.target.result+"' class ='thumbimage' /><input type='hidden' name='hidden_img_name[]' value='"+e.target.name+"'></div>").appendTo(image_holder);
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
 $('.timepicker').datetimepicker({
      format: 'LT'
    }) 
	$('.cust-tooltip').tooltip({ boundary: 'window' }) 
	 $('#on_date').daterangepicker({singleDatePicker: true,
	 autoUpdateInput:false,
      locale: {
        format: 'DD-MM-YYYY'
      }})
	  $('#on_date').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY')); 
    });
	
	
	 $('#from_date').daterangepicker({singleDatePicker: true,
	 autoUpdateInput:false,
      locale: {
        format: 'DD-MM-YYYY'
      }})
	  $('#from_date').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY')); 
    });
	
	 $('#to_date').daterangepicker({singleDatePicker: true,
	 autoUpdateInput:false,
      locale: {
        format: 'DD-MM-YYYY'
      }})
	  $('#to_date').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY')); 
    });
	 $('.onlydate').daterangepicker({singleDatePicker: true,
	 autoUpdateInput:false,
      locale: {
        format: 'DD-MM-YYYY'
      }})
	  $('.onlydate').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY')); 
    });
	 
	 $('.singledate').daterangepicker({singleDatePicker: true,
	 autoUpdateInput:false,timePicker: true,
	  drops: 'up',
      locale: {
        format: 'DD-MM-YYYY'
      }})
	  $('.singledate').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY h:mm A')); 
    });
	 
	   
 </script> 
 
	
	<script>
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: false,
        events: "User/fetch-appointment?center_id=<?php echo @$search['center_id']?>",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true, 
        editable: false, 
        eventClick: function (event) {
             alert("Name : "+event.name+"\nEmail id : "+event.email_id+"\nPhone : "+event.phone+"\nDate : "+event.d_date+"\nTime : "+event.d_s_time+" - "+event.d_e_time+"\nCenter : "+event.shop_name);
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>