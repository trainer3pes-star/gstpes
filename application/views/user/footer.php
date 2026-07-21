<footer class="">
    <div class="expbtn">
        <i class="fa fa-angle-up" title="Expand/Collapse Footer"></i>
    </div>
    <div class="ifooter " id="demo">
        
        <div class="f2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>© 2025 </p>
                        <p>Site Last Updated on 03/04/2025</p>
                        <!-- <p>Designed & Developed by <a href="https://www.teachoo.com">Teachoo</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="f3">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="site">Site best viewed at 1024 x 768 resolution in Internet Explorer 10+, Google
                            Chrome 49+, Firefox 45+ and Safari 6+</p>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .disabled {
                cursor: not-allowed !important;
                opacity: 0.6;
            }
        </style>
    </div>
</footer>
    <style>
    .footer-links {
        list-style-type: none;
        padding-left: 0;
    }
    
    .footer-links li {
        display: block;
        margin-bottom: 8px;
        font-size: 1.2em;
    }
    
    .footer-links a {
        text-decoration: none;
    }
    
    .footer-links a:hover {
        color: #c74718;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    </style>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="about-us.php">About us</a></li>
                    <li><a href="upgrade.php">Upgrade</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="terms-and-conditions.php">Terms and Conditions</a></li>
                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                    <li><a href="privacy-policy.php">Refund Policy</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <h4>Brothers in Arms</h4>
                <ul class="footer-links">
                    <li><a href="https://www.teachoo.com">Teachoo</a></li>
                    <li><a href="https://www.schoolistan.com/">Schoolistan</a></li>
                    <li><a href="https://www.skillistan.com/">Skillistan</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <!--<div class="col-md-12 text-center">-->
            <!--    <p>� 2025 Tax Demo Portal. All Rights Reserved.</p>-->
            <!--</div>-->
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="disclaimer-text"><small>This is a simulation. Please use this website for Educational purposes only. This is not affiliated with, endorsed by, or authorized by gst.demo.in or the Government of India</small></p>
            </div>
        </div>
    </div>
</footer>
 <style>
    .footer-links {
        list-style-type: none;
        padding-left: 0;
    }
    
    .footer-links li {
        display: block;
        margin-bottom: 8px;
        font-size: 1.2em;
    }
    
    .footer-links a {
        text-decoration: none;
    }
    
    .footer-links a:hover {
        color: #c74718;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    
        div#add-details img {
            width: 20px;
        }
        .invsumm {
            background-color: #17C4BB;
            padding: 3px 25px 0 0;
            color: #fff;
        }
        .tabpane {
            background-color: #fff;
            padding: 20px;
            min-height: 380px !important;
            height: auto;
        }


    </style>


    <script type="text/javascript">
        var sc_project = 12875655;
        var sc_invisible = 1;
        var sc_security = "6dc86be0"; 
        
    </script>
    <script type="text/javascript" src="js/counter.js" async=""></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/base.js"></script>
    <script>
   document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll("tbody tr");

    rows.forEach((row, index) => {
        const taxableInput = row.querySelector('input[name="taxable_value[]"]');
        const taxInput = row.querySelector('input[name="tax[]"]');
        const rateInput = row.querySelector('input[name="rate[]"]');

        if (taxableInput && taxInput && rateInput) {
    taxableInput.addEventListener("input", () => {
        const taxableValue = parseFloat(taxableInput.value) || 0;
        const rateStr = rateInput.value.replace('%', '');
        const rate = parseFloat(rateStr) || 0;

        const tax = (taxableValue * rate) / 100;
        taxInput.value = tax.toFixed(2);
    });
}
    });
});

$(document).ready(function() {
    $('#pos_id').on('change', function() {
        if ($(this).val()) {
            $('#item-details-integrated').show(); // Show fieldset
        } else {
            $('#item-details-integrated').hide(); // Hide fieldset
        }
    });

    $('#pos_id').trigger('change');
});

 var gstStateMap = {
        <?php foreach($pos_results as $presult){
            echo "'" . $presult->state_id . "': '" . $presult->id . "',";
        } ?>
    };

$(document).ready(function () {
    $('#gstin_no').on('keyup change', function () {
        var gstin = $(this).val();
        if (gstin.length >= 2) {
            var stateCode = gstin.substring(0, 2);
            if (gstStateMap[stateCode]) {
                $('#pos_id').val(gstStateMap[stateCode]).trigger('change');
            }
        }
    });
    
    $('#gstin_no').trigger('change');
});



    $(document).ready(function () {
        $('#gstin_no').on('keyup change', function () {
            var gstin = $(this).val().trim().toUpperCase();
    
            if (gstin.length === 15) {
                $('#id_receipient_name').val('XXXX XXXXX XXXX'); 
                $('#id_receipient_name_to_show').val('XXXX XXXXX XXXX'); 
            } else {
                $('#id_receipient_name').val('');
                $('#id_receipient_name_to_show').val('');
            }
        });
        $('#gstin_no').trigger('change');
    });
    
    
    $(document).ready(function() {
    $('#pos_id').on('change', function() {
       var posStateCode = $(this).find(':selected').data('state-id');
        var gstinStateCode = $('#gstin_state_code').val(); // GSTIN's first 2 digits
      

        if (String(posStateCode) === String(gstinStateCode)) {
            $('#id_supply_type').val('Inter');
        } else {
            $('#id_supply_type').val('Intra');
        }

    });

    // Trigger change if value already selected
    $('#pos_id').trigger('change');
});
    
</script>
