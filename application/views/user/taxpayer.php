<!DOCTYPE html><html lang="en"><head>
  <style>
  .state-info {
    background: #7dd996;
    margin: 1em 0em;
}
.format-explanation {
    background: #cccccc78;
    padding: 1em;
    border-radius: 4px;
}
    .gst-box.filled {
       border: 1px solid #26bf5099;
    padding: 0.6em 0.9em;
    background: #26bf5099;
}
    label {
    display: block;
    max-width: 100%;
}
input {
    width: 100%;
    padding: 0.7em;
}
.gst-box {
    display: inline-block;
}
.gst-boxes {
    display: flex
;
    align-items: center;
    justify-content: space-between;
    padding: 1em;
}
.gst-box.invalid {
    border: 2px solid red;
    background-color: #ffe6e6;
     padding: 0.6em 0.9em;
     height:40px;
     width:35px;
   
}

</style>
</head>
<body>


    
<div class="container" style="font-size:14px;background: #fff;padding: 4em;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; margin:1em auto;">
            
<div class="form-container">
    <h1 class="form-title">Taxpayer Information</h1>
    
   <?php echo form_open_multipart('home/save_taxpayer', array('id' => 'gstin-form','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
      
        
        <div class="form-group">
            <label class="reg m-cir" for="id_name">Name</label>
            <input type="text" name="name" value="<?php echo @$resultTaxpayer->name?>" maxlength="200" required="" id="name">
            
            
             
            
        </div>
        
        <div class="form-group">
            <label class="reg m-cir" for="id_gstin">GSTIN Number of the taxpayer</label>
            <input type="text" name="gstno" value="<?php echo @$resultTaxpayer->gstno?>" maxlength="15"  minlength="15"  id="id_gstin" required>
            <!-- Add this div where you want error messages to appear -->

        <div id="gst-format-container" class="gst-format-container" style="display: block; padding-top:1em;">
            <!-- <div class="gst-format-title" >GST Number Format</div> -->
            <!-- <div class="gst-boxes">
                <div class="gst-section">
                    <div class="gst-box filled valid" data-index="0">2</div>
                    <div class="gst-box filled valid" data-index="1">7</div>
                    <div class="gst-section-label">State Code</div>
                </div>
                
                <div class="gst-section">
                    <div class="gst-box filled valid" data-index="2">C</div>
                    <div class="gst-box filled valid" data-index="3">D</div>
                    <div class="gst-box filled valid" data-index="4">A</div>
                    <div class="gst-box filled valid" data-index="5">M</div>
                    <div class="gst-box filled valid" data-index="6">P</div>
                    <div class="gst-box filled valid" data-index="7">4</div>
                    <div class="gst-box filled valid" data-index="8">5</div>
                    <div class="gst-box filled valid" data-index="9">6</div>
                    <div class="gst-box filled valid" data-index="10">1</div>
                    <div class="gst-box filled valid" data-index="11">V</div>
                    <div class="gst-section-label">PAN Number</div>
                </div>
                
                <div class="gst-section">
                    <div class="gst-box filled valid" data-index="12">1</div>
                    <div class="gst-section-label">Entity</div>
                </div>
                
                <div class="gst-section">
                    <div class="gst-box filled valid" data-index="13">Z</div>
                    <div class="gst-section-label">Z</div>
                </div>
                
                <div class="gst-section">
                    <div class="gst-box filled valid" data-index="14">2</div>
                    <div class="gst-section-label">Checksum</div>
                </div>
            </div>
             -->
            <!-- <div id="state-info" class="state-info valid-state" style="display: block;padding: 1em 1em;"> State: Maharashtra </div> -->
            
            <div class="format-explanation">
                <strong>Example:</strong> 07AALCM2911N1Z6
                <ul>
                    <li><strong>07</strong> - Delhi state code</li>
                    <li><strong>AALCM2911N</strong> - PAN number</li>
                    <li><strong>1</strong> - Entity number</li>
                    <li><strong>Z</strong> - Fixed character</li>
                    <li><strong>6</strong> - Checksum digit</li>
                </ul>
            </div>
        <!-- </div> -->
    
            
            
            
            
        </div>
        
        
        <div class="form-group">
            <!--<button type="submit" class="submit-btn" data-frm="basic_frm">-->
            <!--    Update Taxpayer-->
            <!--</button>-->
            <div class="col-sm-offset-4 col-sm-8">
                	<input type="hidden" id="id" name="id" value="<?php echo @$resultTaxpayer->id ;?>" />
                        	<input type="submit" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="tax_frm"  style="width:200px;" />
                    </div>
        </div>
   <?php  echo form_close(); ?>
</div>
</div>
</div>

        




<script>
$(document).ready(function () {
    $('#id_gstin').after(`
        <div id="gst-format-container" class="gst-format-container" style="margin-top: 15px;">
            <div class="gst-format-title">GST Number Format</div>
            <div class="gst-boxes">
                <div class="gst-section">
                    <div class="gst-box" data-index="0"></div>
                    <div class="gst-box" data-index="1"></div>
                    <div class="gst-section-label">State Code</div>
                </div>
                <div class="gst-section">
                    <div class="gst-box" data-index="2"></div>
                    <div class="gst-box" data-index="3"></div>
                    <div class="gst-box" data-index="4"></div>
                    <div class="gst-box" data-index="5"></div>
                    <div class="gst-box" data-index="6"></div>
                    <div class="gst-box" data-index="7"></div>
                    <div class="gst-box" data-index="8"></div>
                    <div class="gst-box" data-index="9"></div>
                    <div class="gst-box" data-index="10"></div>
                    <div class="gst-box" data-index="11"></div>
                    <div class="gst-section-label">PAN Number</div>
                </div>
                <div class="gst-section">
                    <div class="gst-box" data-index="12"></div>
                    <div class="gst-section-label">Entity</div>
                </div>
                <div class="gst-section">
                    <div class="gst-box" data-index="13"></div>
                    <div class="gst-section-label">Z</div>
                </div>
                <div class="gst-section">
                    <div class="gst-box" data-index="14"></div>
                    <div class="gst-section-label">Checksum</div>
                </div>
            </div>
            <div id="gst-error-messages" class="text-danger" style="margin-top: 10px;"></div>
            <div id="state-info" class="state-info valid-state" style="display: block;padding: 1em 1em;"></div>
        </div>
    `);

    const stateCodeMap = {
        '01': 'Jammu & Kashmir', '02': 'Himachal Pradesh', '03': 'Punjab', '04': 'Chandigarh',
        '05': 'Uttarakhand', '06': 'Haryana', '07': 'Delhi', '08': 'Rajasthan', '09': 'Uttar Pradesh',
        '10': 'Bihar', '11': 'Sikkim', '12': 'Arunachal Pradesh', '13': 'Nagaland', '14': 'Manipur',
        '15': 'Mizoram', '16': 'Tripura', '17': 'Meghalaya', '18': 'Assam', '19': 'West Bengal',
        '20': 'Jharkhand', '21': 'Odisha', '22': 'Chhattisgarh', '23': 'Madhya Pradesh', '24': 'Gujarat',
        '25': 'Daman & Diu', '26': 'Dadra & Nagar Haveli', '27': 'Maharashtra', '29': 'Karnataka',
        '30': 'Goa', '31': 'Lakshadweep', '32': 'Kerala', '33': 'Tamil Nadu', '34': 'Puducherry',
        '35': 'Andaman & Nicobar Islands', '36': 'Telangana', '37': 'Andhra Pradesh', '38': 'Ladakh'
    };

    const validationRules = [
        { pos: [0, 1], regex: /^[0-9]$/, name: "State Code", error: "Enter number only" },
        { pos: [2, 3, 4, 5, 6], regex: /^[A-Z]$/, name: "PAN (letters)", error: "Enter uppercase letters only (A–Z)" },
        { pos: [7, 8, 9, 10], regex: /^[0-9]$/, name: "PAN (numbers)", error: "Enter number only (0–9)" },
        { pos: [11], regex: /^[A-Z]$/, name: "PAN (last letter)", error: "Enter uppercase letter only (A–Z)" },
        { pos: [12], regex: /^[1-9]$/, name: "Entity", error: "Enter number between 1–9" },
        { pos: [13], regex: /^Z$/, name: "Z (fixed)", error: "Must be 'Z'" },
        { pos: [14], regex: /^[0-9]$/, name: "Checksum", error: "Enter a valid Checksum" }
    ];

let gstinHasErrors = true; // Default true to block empty submissions

$('#id_gstin').on('input', function () {
    const gstin = $(this).val().toUpperCase();
    $(this).val(gstin); // Always store as uppercase
    $('#gst-error-messages').html('');
    $('#gst-format-container').show();
    $('.gst-box').removeClass('filled valid invalid current').text('');

    const errors = [];
    const enteredLength = gstin.length;

    for (let i = 0; i < 15; i++) {
        const $box = $(`.gst-box[data-index="${i}"]`);
        const char = gstin[i] || '';
        const rule = validationRules.find(r => r.pos.includes(i));

        if (char) {
            $box.addClass('filled').text(char);
            if (rule && rule.regex.test(char)) {
                $box.addClass('valid');
            } else {
                $box.addClass('invalid');
                if (rule) {
                    errors.push(`${rule.name}: ${rule.error}`);
                }
            }
        } else {
            $box.removeClass('valid').addClass('invalid');
            if (rule) {
                errors.push(`${rule.name}: ${rule.error}`);
            }
        }
    }

    if (enteredLength < 15) {
        $(`.gst-box[data-index="${enteredLength}"]`).addClass('current');
    }

    const stateCode = gstin.substring(0, 2);
    if (stateCode.length === 2 && stateCodeMap[stateCode]) {
        $('#state-info')
            .html(`State: ${stateCodeMap[stateCode]}`)
            .removeClass('invalid-state')
            .addClass('valid-state')
            .show();
    } else {
        $('#state-info').html('').hide();
    }

    if (errors.length > 0) {
        $('#gst-error-messages').html(
            `<strong>GSTIN Format Issues:</strong><ul><li>${errors.join('</li><li>')}</li></ul>`
        );
        gstinHasErrors = true;
    } else {
        $('#gst-error-messages').html('');
        gstinHasErrors = false;
    }
});


// Prevent form submission if GSTIN is invalid
$('#gstin-form').on('submit', function (e) {
    if (gstinHasErrors) {
        alert('Please correct the GSTIN format errors before submitting.');
        e.preventDefault(); // Stop form submission
    }
});


    $('#id_gstin').trigger('input');
    
});



</script>


    
<!-- <script>
    $(document).ready(function() {
        // Simple animation for the card when page loads
        $(".card").hide().fadeIn(1000);
        
        // Staggered animation for benefit items
        $(".benefit-item").each(function(index) {
            $(this).delay(300 * index).animate({opacity: 1}, 500);
        });
    });
</script> -->





