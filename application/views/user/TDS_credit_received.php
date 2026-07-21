
<div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row" data-ng-controller="transctrl" data-ng-init="init('returns')">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="" href="/gst/dashboard/" data-ng-bind="name">Dashboard</a></li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-default=""><a href="/gst/return/dashboard/" data-ng-bind="breadcrumb.n" target="_self">Returns</a></span>
                        </ng-switch>
                    </li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-when="true">GSTR2A</span>
                        </ng-switch>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown" data-ng-bind="selectedLang">English</span>
                <ul class="dropdown-menu lang-dpdwn">

                    <li data-ng-repeat="language in languages">
                        <a data-ng-click="selectLang(language.cd)" data-ng-bind="language.nm">English</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div data-ng-controller="mainctrl" ng-view="">
        <div class="myPage" data-ng-init="isdpreview()">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body" style="font-size:14px">
                            <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">Indicates Mandatory Fields</p>
                             <?php $this->load->view('user/trade_info', ['resultTaxpayer' => $resultTaxpayer]); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12">
                    <h4>TDS Credit Received-Summary</h4>
                </div>
            </div>

            <div class="tabpane">
               

               <div class="row">
    <div class="col-md-12 text-center">
        <center><img src="<?php echo base_url('assets/images/TDS.jpg'); ?>" 
             alt="ISD Invoice" 
             class="img-responsive" 
             style="max-width:100%; height:auto;"></center>
    </div>
</div>
            </div>
        </div>
        <style type="text/css">
        .prdMarker {
            font-size: 14px;
            line-height: 1.6;
            position: absolute;
            right: 0;
            top: 0;
        }
        </style>
    </div>
</div>

        </div>
    </div>

    <div id="gst-course-modal" class="modal fade" tabindex="-1" role="dialog">
    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">ï¿½</span></button>
                    <!-- <h4 class="modal-title">Take our premium course to use GST DEMO Website</h4> -->
                    <h4 class="modal-title">Please login to view GST Simulation</h4>
                </div>
                <div class="modal-body">
                    <p>To use our demo portal (simulation)... <a href="/user/login/">Login Now</a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        
</div><!-- /.modal -->
<div id="challan-delete-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-body">
            <div class="m-icon m-warning pulseWarning"><span class="micon-body pulseWarningIns"></span><span class="micon-dot pulseWarningIns"></span></div>
            <h2>Warning</h2>
            <p>Are you sure you want to delete this challan?</p>
        </div>
        <div class="modal-footer"><a class="btn btn-default" data-dismiss="modal" ng-click="cancelcallback()">Cancel</a><a class="btn btn-primary btn-ok" ng-click="callback()" target="_blank">Proceed</a></div>
    </div>
</div>

    <script type="text/javascript">
        var sc_project = 12875655;
        var sc_invisible = 1;
        var sc_security = "6dc86be0"; 
        
    </script>
    <script type="text/javascript" src="js/counter.js" async=""></script>
    <!-- <script type="text/javascript" src="https://delan5sxrj8jj.cloudfront.net/html/js/jquery-1.10.2.min.df6173bad698.js"></script> -->
    <script type="text/javascript" src="js/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/base.js"></script>
    <script type="text/javascript" src="js/base_1.js"></script>
    
<script tyoe="text/javascript">
    $(document).ready(function () {
        $("#radiotrn").click(function () {
            $("#new-reg").hide();
            $("#trn").show();
        });

        $("#radionew").click(function () {
            $("#new-reg").show();
            $("#trn").hide();
        });
    });

    var statesAndDistricts = {
        "35": ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari", "YSR Kadapa"],
        "37": ["Anjaw", "Changlang", "East Kameng", "East Siang", "Kamle", "Kra Daadi", "Kurung Kumey", "Lepa Rada", "Lohit", "Longding", "Lower Dibang Valley", "Lower Siang", "Lower Subansiri", "Namsai", "Pakke Kessang", "Papum Pare", "Shi Yomi", "Siang", "Tawang", "Tirap", "Upper Dibang Valley", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang"],
        "18" : ['Baksa', 'Barpeta', 'Biswanath', 'Bongaigaon', 'Cachar', 'Charaideo', 'Chirang', 'Darrang', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Goalpara', 'Golaghat', 'Hailakandi', 'Hojai', 'Jorhat', 'Kamrup Metropolitan', 'Kamrup', 'Karbi Anglong', 'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Majuli', 'Morigaon', 'Nagaon', 'Nalbari', 'Dima Hasao', 'Sivasagar', 'Sonitpur', 'South Salmara-Mankachar', 'Tinsukia', 'Udalguri', 'West Karbi Anglong'] ,
        "10" : ['Araria', 'Arwal', 'Aurangabad', 'Banka', 'Begusarai', 'Bhagalpur', 'Bhojpur', 'Buxar', 'Darbhanga', 'East Champaran (Motihari)', 'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad', 'Kaimur (Bhabua)', 'Katihar', 'Khagaria', 'Kishanganj', 'Lakhisarai', 'Madhepura', 'Madhubani', 'Munger (Monghyr)', 'Muzaffarpur', 'Nalanda', 'Nawada', 'Patna', 'Purnia (Purnea)', 'Rohtas', 'Saharsa', 'Samastipur', 'Saran', 'Sheikhpura', 'Sheohar', 'Sitamarhi', 'Siwan', 'Supaul', 'Vaishali', 'West Champaran'] ,
        "04" : ['Chandigarh'] ,
        "22" : ['Balod', 'Baloda Bazar', 'Balrampur', 'Bastar', 'Bemetara', 'Bijapur', 'Bilaspur', 'Dantewada (South Bastar)', 'Dhamtari', 'Durg', 'Gariyaband', 'Janjgir-Champa', 'Jashpur', 'Kabirdham (Kawardha)', 'Kanker (North Bastar)', 'Kondagaon', 'Korba', 'Korea (Koriya)', 'Mahasamund', 'Mungeli', 'Narayanpur', 'Raigarh', 'Raipur', 'Rajnandgaon', 'Sukma', 'Surajpur  ', 'Surguja'] ,
        "26" : ['Dadra & Nagar Haveli'] ,
        "07" : ['Central Delhi', 'East Delhi', 'New Delhi', 'North Delhi', 'North East  Delhi', 'North West  Delhi', 'Shahdara', 'South Delhi', 'South East Delhi', 'South West  Delhi', 'West Delhi'] ,
        "30" : ['North Goa', 'South Goa'] ,
        "24" : ['Ahmedabad', 'Amreli', 'Anand', 'Aravalli', 'Banaskantha (Palanpur)', 'Bharuch', 'Bhavnagar', 'Botad', 'Chhota Udepur', 'Dahod', 'Dangs (Ahwa)', 'Devbhoomi Dwarka', 'Gandhinagar', 'Gir Somnath', 'Jamnagar', 'Junagadh', 'Kachchh', 'Kheda (Nadiad)', 'Mahisagar', 'Mehsana', 'Morbi', 'Narmada (Rajpipla)', 'Navsari', 'Panchmahal (Godhra)', 'Patan', 'Porbandar', 'Rajkot', 'Sabarkantha (Himmatnagar)', 'Surat', 'Surendranagar', 'Tapi (Vyara)', 'Vadodara', 'Valsad'] ,
        "06" : ['Ambala', 'Bhiwani', 'Charkhi Dadri', 'Faridabad', 'Fatehabad', 'Gurgaon', 'Hisar', 'Jhajjar', 'Jind', 'Kaithal', 'Karnal', 'Kurukshetra', 'Mahendragarh', 'Mewat', 'Palwal', 'Panchkula', 'Panipat', 'Rewari', 'Rohtak', 'Sirsa', 'Sonipat', 'Yamunanagar'] ,
        "02" : ['Bilaspur', 'Chamba', 'Hamirpur', 'Kangra', 'Kinnaur', 'Kullu', 'Lahaul & Spiti', 'Mandi', 'Shimla', 'Sirmaur (Sirmour)', 'Solan', 'Una'] ,
        "01" : ['Anantnag', 'Bandipore', 'Baramulla', 'Budgam', 'Doda', 'Ganderbal', 'Jammu', 'Kargil', 'Kathua', 'Kishtwar', 'Kulgam', 'Kupwara', 'Leh', 'Poonch', 'Pulwama', 'Rajouri', 'Ramban', 'Reasi', 'Samba', 'Shopian', 'Srinagar', 'Udhampur'] ,
        "20" : ['Bokaro', 'Chatra', 'Deoghar', 'Dhanbad', 'Dumka', 'East Singhbhum', 'Garhwa', 'Giridih', 'Godda', 'Gumla', 'Hazaribag', 'Jamtara', 'Khunti', 'Koderma', 'Latehar', 'Lohardaga', 'Pakur', 'Palamu', 'Ramgarh', 'Ranchi', 'Sahibganj', 'Seraikela-Kharsawan', 'Simdega', 'West Singhbhum'] ,
        "29" : ['Bagalkot', 'Ballari (Bellary)', 'Belagavi (Belgaum)', 'Bengaluru (Bangalore) Rural', 'Bengaluru (Bangalore) Urban', 'Bidar', 'Chamarajanagar', 'Chikballapur', 'Chikkamagaluru (Chikmagalur)', 'Chitradurga', 'Dakshina Kannada', 'Davangere', 'Dharwad', 'Gadag', 'Hassan', 'Haveri', 'Kalaburagi (Gulbarga)', 'Kodagu', 'Kolar', 'Koppal', 'Mandya', 'Mysuru (Mysore)', 'Raichur', 'Ramanagara', 'Shivamogga (Shimoga)', 'Tumakuru (Tumkur)', 'Udupi', 'Uttara Kannada (Karwar)', 'Vijayapura (Bijapur)', 'Yadgir'] ,
        "32" : ['Alappuzha', 'Ernakulam', 'Idukki', 'Kannur', 'Kasaragod', 'Kollam', 'Kottayam', 'Kozhikode', 'Malappuram', 'Palakkad', 'Pathanamthitta', 'Thiruvananthapuram', 'Thrissur', 'Wayanad'] ,
        "38" : ['Kargil', 'Leh Ladakh'],
        "31" : ['Agatti', 'Amini', 'Androth', 'Bithra', 'Chethlath', 'Kavaratti', 'Kadmath', 'Kalpeni', 'Kilthan', 'Minicoy'] ,
        "23" : ['Agar Malwa', 'Alirajpur', 'Anuppur', 'Ashoknagar', 'Balaghat', 'Barwani', 'Betul', 'Bhind', 'Bhopal', 'Burhanpur', 'Chhatarpur', 'Chhindwara', 'Damoh', 'Datia', 'Dewas', 'Dhar', 'Dindori', 'Guna', 'Gwalior', 'Harda', 'Hoshangabad', 'Indore', 'Jabalpur', 'Jhabua', 'Katni', 'Khandwa', 'Khargone', 'Mandla', 'Mandsaur', 'Morena', 'Narsinghpur', 'Neemuch', 'Panna', 'Raisen', 'Rajgarh', 'Ratlam', 'Rewa', 'Sagar', 'Satna', 'Sehore', 'Seoni', 'Shahdol', 'Shajapur', 'Sheopur', 'Shivpuri', 'Sidhi', 'Singrauli', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha'] ,
        "27" : ['Ahmednagar', 'Akola', 'Amravati', 'Aurangabad', 'Beed', 'Bhandara', 'Buldhana', 'Chandrapur', 'Dhule', 'Gadchiroli', 'Gondia', 'Hingoli', 'Jalgaon', 'Jalna', 'Kolhapur', 'Latur', 'Mumbai City', 'Mumbai Suburban', 'Nagpur', 'Nanded', 'Nandurbar', 'Nashik', 'Osmanabad', 'Palghar', 'Parbhani', 'Pune', 'Raigad', 'Ratnagiri', 'Sangli', 'Satara', 'Sindhudurg', 'Solapur', 'Thane', 'Wardha', 'Washim', 'Yavatmal'] ,
        "14" : ['Bishnupur', 'Chandel', 'Churachandpur', 'Imphal East', 'Imphal West', 'Jiribam', 'Kakching', 'Kamjong', 'Kangpokpi', 'Noney', 'Pherzawl', 'Senapati', 'Tamenglong', 'Tengnoupal', 'Thoubal', 'Ukhrul'] ,
        "17" : ['East Garo Hills', 'East Jaintia Hills', 'East Khasi Hills', 'North Garo Hills', 'Ri Bhoi', 'South Garo Hills', 'South West Garo Hills ', 'South West Khasi Hills', 'West Garo Hills', 'West Jaintia Hills', 'West Khasi Hills'] ,
        "15" : ['Aizawl', 'Champhai', 'Kolasib', 'Lawngtlai', 'Lunglei', 'Mamit', 'Saiha', 'Serchhip'] ,
        "13" : ['Dimapur', 'Kiphire', 'Kohima', 'Longleng', 'Mokokchung', 'Mon', 'Peren', 'Phek', 'Tuensang', 'Wokha', 'Zunheboto'] ,
        "21" : ['Angul', 'Balangir', 'Balasore', 'Bargarh', 'Bhadrak', 'Boudh', 'Cuttack', 'Deogarh', 'Dhenkanal', 'Gajapati', 'Ganjam', 'Jagatsinghapur', 'Jajpur', 'Jharsuguda', 'Kalahandi', 'Kandhamal', 'Kendrapara', 'Kendujhar (Keonjhar)', 'Khordha', 'Koraput', 'Malkangiri', 'Mayurbhanj', 'Nabarangpur', 'Nayagarh', 'Nuapada', 'Puri', 'Rayagada', 'Sambalpur', 'Sonepur', 'Sundargarh'] ,
        "97" : [],        
        "34" : ['Karaikal', 'Mahe', 'Pondicherry', 'Yanam'] ,
        "03" : ['Amritsar', 'Barnala', 'Bathinda', 'Faridkot', 'Fatehgarh Sahib', 'Fazilka', 'Ferozepur', 'Gurdaspur', 'Hoshiarpur', 'Jalandhar', 'Kapurthala', 'Ludhiana', 'Mansa', 'Moga', 'Muktsar', 'Nawanshahr (Shahid Bhagat Singh Nagar)', 'Pathankot', 'Patiala', 'Rupnagar', 'Sahibzada Ajit Singh Nagar (Mohali)', 'Sangrur', 'Tarn Taran'] ,
        "08" : ['Ajmer', 'Alwar', 'Banswara', 'Baran', 'Barmer', 'Bharatpur', 'Bhilwara', 'Bikaner', 'Bundi', 'Chittorgarh', 'Churu', 'Dausa', 'Dholpur', 'Dungarpur', 'Hanumangarh', 'Jaipur', 'Jaisalmer', 'Jalore', 'Jhalawar', 'Jhunjhunu', 'Jodhpur', 'Karauli', 'Kota', 'Nagaur', 'Pali', 'Pratapgarh', 'Rajsamand', 'Sawai Madhopur', 'Sikar', 'Sirohi', 'Sri Ganganagar', 'Tonk', 'Udaipur'] ,
        "11" : ['East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim'] ,
        "33" : ['Ariyalur', 'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri', 'Dindigul', 'Erode', 'Kanchipuram', 'Kanyakumari', 'Karur', 'Krishnagiri', 'Madurai', 'Nagapattinam', 'Namakkal', 'Nilgiris', 'Perambalur', 'Pudukkottai', 'Ramanathapuram', 'Salem', 'Sivaganga', 'Thanjavur', 'Theni', 'Thoothukudi (Tuticorin)', 'Tiruchirappalli', 'Tirunelveli', 'Tiruppur', 'Tiruvallur', 'Tiruvannamalai', 'Tiruvarur', 'Vellore', 'Viluppuram', 'Virudhunagar'] ,
        "36" : ['Adilabad', 'Bhadradri Kothagudem', 'Hyderabad', 'Jagtial', 'Jangaon', 'Jayashankar Bhoopalpally', 'Jogulamba Gadwal', 'Kamareddy', 'Karimnagar', 'Khammam', 'Komaram Bheem Asifabad', 'Mahabubabad', 'Mahabubnagar', 'Mancherial', 'Medak', 'Medchal', 'Nagarkurnool', 'Nalgonda', 'Nirmal', 'Nizamabad', 'Peddapalli', 'Rajanna Sircilla', 'Rangareddy', 'Sangareddy', 'Siddipet', 'Suryapet', 'Vikarabad', 'Wanaparthy', 'Warangal (Rural)', 'Warangal (Urban)', 'Yadadri Bhuvanagiri'] ,
        "16" : ['Dhalai', 'Gomati', 'Khowai', 'North Tripura', 'Sepahijala', 'South Tripura', 'Unakoti', 'West Tripura'] ,
        "05" : ['Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Dehradun', 'Haridwar', 'Nainital', 'Pauri Garhwal', 'Pithoragarh', 'Rudraprayag', 'Tehri Garhwal', 'Udham Singh Nagar', 'Uttarkashi'] ,
        "09" : ['Agra', 'Aligarh', 'Allahabad', 'Ambedkar Nagar', 'Amethi (Chatrapati Sahuji Mahraj Nagar)', 'Amroha (J.P. Nagar)', 'Auraiya', 'Azamgarh', 'Baghpat', 'Bahraich', 'Ballia', 'Balrampur', 'Banda', 'Barabanki', 'Bareilly', 'Basti', 'Bhadohi', 'Bijnor', 'Budaun', 'Bulandshahr', 'Chandauli', 'Chitrakoot', 'Deoria', 'Etah', 'Etawah', 'Faizabad', 'Farrukhabad', 'Fatehpur', 'Firozabad', 'Gautam Buddha Nagar', 'Ghaziabad', 'Ghazipur', 'Gonda', 'Gorakhpur', 'Hamirpur', 'Hapur (Panchsheel Nagar)', 'Hardoi', 'Hathras', 'Jalaun', 'Jaunpur', 'Jhansi', 'Kannauj', 'Kanpur Dehat', 'Kanpur Nagar', 'Kanshiram Nagar (Kasganj)', 'Kaushambi', 'Kushinagar (Padrauna)', 'Lakhimpur - Kheri', 'Lalitpur', 'Lucknow', 'Maharajganj', 'Mahoba', 'Mainpuri', 'Mathura', 'Mau', 'Meerut', 'Mirzapur', 'Moradabad', 'Muzaffarnagar', 'Pilibhit', 'Pratapgarh', 'RaeBareli', 'Rampur', 'Saharanpur', 'Sambhal (Bhim Nagar)', 'Sant Kabir Nagar', 'Shahjahanpur', 'Shamali (Prabuddh Nagar)', 'Shravasti', 'Siddharth Nagar', 'Sitapur', 'Sonbhadra', 'Sultanpur', 'Unnao', 'Varanasi'] ,
        "19" : ['Alipurduar', 'Bankura', 'Birbhum', 'Burdwan (Bardhaman)', 'Cooch Behar', 'Dakshin Dinajpur (South Dinajpur)', 'Darjeeling', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Kalimpong', 'Kolkata', 'Malda', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'Paschim Medinipur (West Medinipur)', 'Purba Medinipur (East Medinipur)', 'Purulia', 'South 24 Parganas', 'Uttar Dinajpur (North Dinajpur)']
    };

    $('#id_state').change(function () {
        var state = $(this).val();
        var districts = statesAndDistricts[state];

        $('#id_district').empty();
        $('#id_district').append($('<option>', {value: "",text: "Select"}));

        $.each(districts, function (index, district) {
            $('#id_district').append($('<option>', {
                value: district,
                text: district
            }));
        });
    });
    $("#id_type_of_taxpayer").change(function () {
        if ($(this).val() === "1") {
            $("#panHelper").show();
            $("#helpBlock").show();
        } else {
            $("#panHelper").hide();
            $("#helpBlock").hide();
        }
    });
    const panCardCodes = document.querySelectorAll('.pan-card-code');

    document.querySelector('#id_pan').addEventListener('input', function() {
    const inputLength = this.value.length;
    for (let i = 0; i < inputLength; i++) {
        panCardCodes[i].classList.add('success');
    }
    for (let i = inputLength; i < panCardCodes.length; i++) {
        panCardCodes[i].classList.remove('success');
    }
    });

</script>





