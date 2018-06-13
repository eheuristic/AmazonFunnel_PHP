<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>shipping_info.css?ver=3"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=1"/>
<script src="https://use.fontawesome.com/dc6fe16a4a.js"></script>

<?php
include(BASE_PATH.'/libs/MailChimp.php');

//use \DrewM\MailChimp\MailChimp;
use DrewM\MailChimp\MailChimp;
?>
<?php
//error_reporting(0);

$order_id = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : '';
//$email = 'Jenniferwaldron@comcast.net';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';
$asin = isset($_SESSION['asin']) ? $_SESSION['asin'] : '';
$shipped_date = isset($_SESSION['delivery_date']) ? $_SESSION['delivery_date'] : '';
$purchasedate = isset($_SESSION['purchase_date']) ? $_SESSION['purchase_date'] : '';
$promo_id1 = isset($_SESSION['promo_id']) ? $_SESSION['promo_id'] : '-';
$product_id = isset($_SESSION['product_id']) ? $_SESSION['product_id'] : '';
$AddressLine1 = isset($_SESSION['AddressLine1']) ? $_SESSION['AddressLine1'] : '';
$City = isset($_SESSION['City']) ? $_SESSION['City'] : '';
$State = isset($_SESSION['StateOrRegion']) ? strtoupper($_SESSION['StateOrRegion']) : '';
$PostalCode = isset($_SESSION['PostalCode']) ? $_SESSION['PostalCode'] : '';
$review = isset($_SESSION['review']) ? $_SESSION['review'] : '';
$rating = isset($_SESSION['rating']) ? $_SESSION['rating'] : '';
$like = isset($_SESSION['like']) ? $_SESSION['like'] : '';

/*if (empty($PostalCode) || empty($City) || empty($AddressLine1) || empty($lastname) || empty($phone) || empty($order_id) || empty($asin) || empty($name) || empty($email) || empty($purchasedate)) {*/
if (empty($order_id) || empty($asin) || empty($email) || empty($purchasedate)) {
//    echo "<script type='text/javascript'>window.location.href = 'error.php?error=3';</script>";
    echo "<script type='text/javascript'>window.location.href = '../errors/index/3';</script>";
}

if (empty($promo_id1)) {
    $promo_id1 = '-';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $order_id = (isset($_POST['order_id']) && !empty($_POST['order_id'])) ? $_POST['order_id'] : $_SESSION['order_id'];
    $asin = (isset($_POST['asin']) && !empty($_POST['asin'])) ? $_POST['asin'] : $_SESSION['asin'];
    $name = (isset($_POST['name']) && !empty($_POST['name'])) ? $_POST['name'] : $_SESSION['name'];
    $lastname = (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? $_POST['lastname'] : $_SESSION['lastname'];
    $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : $_SESSION['phone'];
    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : $_SESSION['email'];
    $shipped_date = (isset($_POST['shipped_date'])) ? $_POST['shipped_date'] : '';
    $purchasedate = (isset($_POST['purchasedate']) && !empty($_POST['purchasedate'])) ? $_POST['purchasedate'] : $_SESSION['purchasedate'];
    $promo_id1 = (isset($_POST['promo_id1'])) ? $_POST['promo_id1'] : '-';
    $product_id = (isset($_POST['product_id'])) ? $_POST['product_id'] : '';

    $address_line_1 = (isset($_POST['address1'])) ? $_POST['address1'] : '';
    $address_line_2 = (isset($_POST['address2'])) ? $_POST['address2'] : '';
    $city = (isset($_POST['city'])) ? $_POST['city'] : '';
    $state = (isset($_POST['state'])) ? $_POST['state'] : '-';
    $zipcode = (isset($_POST['zipcode'])) ? $_POST['zipcode'] : '';
    $country = (isset($_POST['country'])) ? $_POST['country'] : '-';
    // CHECK IF ALREADY APPLY FOR BOTTLE (SAME ORDER)
    //23-09-2017 START
    $days_ago = date('Y-m-d', strtotime('+15 days', strtotime($purchasedate)));
    if ($purchasedate < strtotime($days_ago)) {
//        change
        echo "<script type='text/javascript'>window.location.href = '../15-days-not-passed/index/" . $order_id . "/" . strtotime($purchasedate) . "';</script>";
        //echo "<script type='text/javascript'>window.location.href = '15-days-not-passed.php';</script>";
    }

    //if (empty($country) || empty($zipcode) || empty($city) || empty($address_line_1) || empty($lastname) || empty($phone) || empty($order_id) || empty($asin) || empty($name) || empty($email) || empty($purchasedate)) {
    if (empty($order_id) || empty($asin) || empty($email) || empty($purchasedate)) {
//        echo "<script type='text/javascript'>window.location.href = 'error.php?error=3';</script>";
//        change
        echo "<script type='text/javascript'>window.location.href = '../errors/index/3';</script>";    
    }
    if (!empty($like) && !empty($review)) {
        global $dbh;
        $data_review = array();
      //  $data_review['like'] = $dbh->sqlsafe($like);
        $data_review['review'] = $dbh->sqlsafe($review);
        $data_review['rating'] = $dbh->sqlsafe($like);
        $data_review['buyer_email_id'] = $dbh->sqlsafe($email);
        $data_review['product_id'] = $dbh->sqlsafe($product_id);
        $data_review['order_id'] = $dbh->sqlsafe($order_id);
        $data_review['asin'] = $dbh->sqlsafe($asin);
        $data_review['created_at'] = $dbh->sqlsafe(date('Y-m-d h:i:s'));
		
        $dbh->insert('review_rating', $data_review);
    }
    //23-09-2017 END
    global $dbh;
    $data = array();
    $selc = "SELECT * FROM promo1 WHERE order_id='" . $order_id . "' AND mail='" . $email . "' AND product_id='" . $product_id . "'";
    $allcat = $dbh->select($selc);
    if (count($allcat) > 0) {
        echo "<script type='text/javascript'>window.location.href = '../not-eligible/index/" . $order_id . "/" . $purchasedate . "/" . $asin . "';</script>";
        exit;
    }
    $data['fullname'] = $dbh->sqlsafe($name);
    $data['phone'] = $dbh->sqlsafe($phone);
    $data['order_id'] = $dbh->sqlsafe($order_id);
    $data['address_line_1'] = $dbh->sqlsafe($address_line_1);
    $data['address_line_2'] = $dbh->sqlsafe($address_line_2);
    $data['city'] = $dbh->sqlsafe($city);
    $data['state'] = $dbh->sqlsafe($state);
    $data['zipcode'] = $dbh->sqlsafe($zipcode);
    $data['country'] = $dbh->sqlsafe($country);
    $data['email'] = $dbh->sqlsafe($email);
    $data['created_at'] = $dbh->sqlsafe(date('Y-m-d h:i:s'));

    $dbh->insert('shipping_address', $data);
    insert_data($purchasedate, $shipped_date, $order_id, $email, $asin, $name, $product_id, $promo_id1, $phone); // INSERT INTO TABLES (orders, promo1)
// Add this customer to our maichimp list for sending followup emails
// Values    
    $email1 = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $name1 = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
    $asin1 = isset($_SESSION['asin']) ? $_SESSION['asin'] : '';


// API Key
    $MailChimp = new MailChimp('546ee5e26d9c982e3f4260b357aff158-us3');

// List ID
    $list_id = 'f654067a90';

// API Call
    $result = $MailChimp->post("lists/$list_id/members", [
        'email_address' => $email1,
        'status' => 'subscribed',
        'merge_fields' => ['FNAME' => $name1, 'LNAME' => '', 'ASIN' => $asin1,'PHONE'=>$phone],
    ]);
//print_r($result);
    // show thank you page

    echo "<script type='text/javascript'>window.location.href ='../thankyou/index/" . $asin . "';</script>";
}

function insert_data($purchasedate, $shipped_date, $order_id, $email, $asin, $name, $product_id, $promo_id1, $phone) {
    global $dbh;
    $data1['order_id'] = $dbh->sqlsafe($order_id);
    $data1['date'] = $dbh->sqlsafe(date('Y-m-d', $purchasedate));
    $data1['user_id'] = $dbh->sqlsafe($order_id);
    $data1['promo_code'] = $dbh->sqlsafe($promo_id1); // set here promo code not get in response

    $dbh->insert('orders', $data1);

    $promo_data = array();
    $promo_data['order_id'] = $dbh->sqlsafe($order_id);
    $promo_data['user_id'] = $dbh->sqlsafe($order_id);
    $promo_data['name'] = $dbh->sqlsafe($name);
    $promo_data['order_date'] = $dbh->sqlsafe(date('Y-m-d', $purchasedate));
    $promo_data['delivery_date'] = $dbh->sqlsafe(date('Y-m-d', $shipped_date));
    $promo_data['phone'] = $dbh->sqlsafe($phone);
    $promo_data['ASIN'] = $dbh->sqlsafe($asin);
    $promo_data['mail'] = $dbh->sqlsafe($email);
    $promo_data['product_id'] = $dbh->sqlsafe($product_id);
    $promo_data['get_bootle'] = $dbh->sqlsafe('0');

    $dbh->insert('promo1', $promo_data);
    return true;
}
?>

    <?php
    include BASE_PATH . "/libs/hotjar.php"; 
    include BASE_PATH . "/libs/fb-chat.php";
    include BASE_PATH . "/libs/headcodes.php";

    $state_array = array(
        'AL' => 'AL - Alabama',
        'AK' => 'AK - Alaska',
        'AZ' => 'AZ - Arizona',
        'AR' => 'AR - Arkansas',
        'CA' => 'CA - California',
        'CO' => 'CO - Colorado',
        'CT' => 'CT - Connecticut',
        'DE' => 'DE - Delaware',
        'DC' => 'DC - District Of Columbia',
        'FL' => 'FL - Florida',
        'GA' => 'GA - Georgia',
        'HI' => 'HI - Hawaii',
        'ID' => 'ID - Idaho',
        'IL' => 'IL - Illinois',
        'IN' => 'IN - Indiana',
        'IA' => 'IA - Iowa',
        'KS' => 'KS - Kansas',
        'KY' => 'KY - Kentucky',
        'LA' => 'LA - Louisiana',
        'ME' => 'ME - Maine',
        'MD' => 'MD - Maryland',
        'MA' => 'MA - Massachusetts',
        'MI' => 'MI - Michigan',
        'MN' => 'MN - Minnesota',
        'MS' => 'MS - Mississippi',
        'MO' => 'MO - Missouri',
        'MT' => 'MT - Montana',
        'NE' => 'NE - Nebraska',
        'NV' => 'NV - Nevada',
        'NH' => 'NH - New Hampshire',
        'NJ' => 'NJ - New Jersey',
        'NM' => 'NM - New Mexico',
        'NY' => 'NY - New York',
        'NC' => 'NC - North Carolina',
        'ND' => 'ND - North Dakota',
        'OH' => 'OH - Ohio',
        'OK' => 'OK - Oklahoma',
        'OR' => 'OR - Oregon',
        'PA' => 'PA - Pennsylvania',
        'RI' => 'RI - Rhode Island',
        'SC' => 'SC - South Carolina',
        'SD' => 'SD - South Dakota',
        'TN' => 'TN - Tennessee',
        'TX' => 'TX - Texas',
        'UT' => 'UT - Utah',
        'VT' => 'VT - Vermont',
        'VA' => 'VA - Virginia',
        'WA' => 'WA - Washington',
        'WV' => 'WV - West Virginia',
        'WI' => 'WI - Wisconsin',
        'WY' => 'WY - Wyoming',
        '' => 'US Outlying Territories',
        'AS' => 'AS - American Samoa',
        'GU' => 'GU - Guam',
        'MP' => 'MP - Northern Mariana Islands',
        'PR' => 'PR - Puerto Rico',
        'UM' => 'UM - United States Minor Outlying Islands',
        'VI' => 'VI - Virgin Islands',
        '' => 'Armed Forces',
        'AA' => 'AA - Armed Forces Americas',
        'AP' => 'AP - Armed Forces Pacific',
        'AE' => 'AE - Armed Forces Others',
    );
    ?>

    <body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png')">
        <?php include BASE_PATH . '/libs/header-content.php'; ?>
        <?php include BASE_PATH . '/libs/progress-bar.php'; ?>
		<div class="row text-center">
		<div class="title_zero">
                Free BOTTLE is ALMOST YOURS
            </div>
            </div>
        <div class="row text-center">
			
            <div id="title_first">
                Confirm your shipping address
            </div>
            <div class="text-center"  >
                <div class="col-md-3 col-sm-3 col-xs-1"></div>
                <div class="col-md-6 col-sm-6 col-xs-8 text-center" id="title_second">
                    Please enter your valid shipping address to recieve
a free bottle of the following product:
                </div>
            </div>

            <!-- <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> -->
			<div class="col-lg-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <form action="<?php echo '../shipping-info/index/' . $email ?>" method="post">
                    <input type="text" id="name" name="name" placeholder="Full Name" value="<?php echo $name; ?>"  />
                    <input type="hidden" id="lastname" name="lastname" placeholder="last Name" value="<?php echo $lastname; ?>"  />
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" />
                    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"  placeholder="Phone Number" value="<?php echo $phone; ?>" />

                    <input type="text" id="address1" name="address1" value="<?= $AddressLine1 ?>"  placeholder="Adress Line 1" required/>
                    <input type="text" id="address2" name="address2" placeholder="Address Line 2"/>
                    <input type="text" id="city" name="city" value="<?= $City ?>"  placeholder="City" required/>
<!--                    <select name="state" size="1">
                        <option value="AL" style="color:#462f28;">AL - Alabama</option>
                        <option value="AK" style="color:#462f28;">AK - Alaska</option>
                        <option value="AZ" style="color:#462f28;">AZ - Arizona</option>
                        <option value="AR" style="color:#462f28;">AR - Arkansas</option>
                        <option value="CA" style="color:#462f28;">CA - California</option>
                        <option value="CO" style="color:#462f28;">CO - Colorado</option>
                        <option value="CT" style="color:#462f28;">CT - Connecticut</option>
                        <option value="DE" style="color:#462f28;">DE - Delaware</option>
                        <option value="DC" style="color:#462f28;">DC - District Of Columbia</option>
                        <option value="FL" style="color:#462f28;">FL - Florida</option>
                        <option value="GA" style="color:#462f28;">GA - Georgia</option>
                        <option value="HI" style="color:#462f28;">HI - Hawaii</option>
                        <option value="ID" style="color:#462f28;">ID - Idaho</option>
                        <option value="IL" style="color:#462f28;">IL - Illinois</option>
                        <option value="IN" style="color:#462f28;">IN - Indiana</option>
                        <option value="IA" style="color:#462f28;">IA - Iowa</option>
                        <option value="KS" style="color:#462f28;">KS - Kansas</option>
                        <option value="KY" style="color:#462f28;">KY - Kentucky</option>
                        <option value="LA" style="color:#462f28;">LA - Louisiana</option>
                        <option value="ME" style="color:#462f28;">ME - Maine</option>
                        <option value="MD" style="color:#462f28;">MD - Maryland</option>
                        <option value="MA" style="color:#462f28;">MA - Massachusetts</option>
                        <option value="MI" style="color:#462f28;">MI - Michigan</option>
                        <option value="MN" style="color:#462f28;">MN - Minnesota</option>
                        <option value="MS" style="color:#462f28;">MS - Mississippi</option>
                        <option value="MO" style="color:#462f28;">MO - Missouri</option>
                        <option value="MT" style="color:#462f28;">MT - Montana</option>
                        <option value="NE" style="color:#462f28;">NE - Nebraska</option>
                        <option value="NV" style="color:#462f28;">NV - Nevada</option>
                        <option value="NH" style="color:#462f28;">NH - New Hampshire</option>
                        <option value="NJ" style="color:#462f28;">NJ - New Jersey</option>
                        <option value="NM" style="color:#462f28;">NM - New Mexico</option>
                        <option value="NY" style="color:#462f28;">NY - New York</option>
                        <option value="NC" style="color:#462f28;">NC - North Carolina</option>
                        <option value="ND" style="color:#462f28;">ND - North Dakota</option>
                        <option value="OH" style="color:#462f28;">OH - Ohio</option>
                        <option value="OK" style="color:#462f28;">OK - Oklahoma</option>
                        <option value="OR" style="color:#462f28;">OR - Oregon</option>
                        <option value="PA" style="color:#462f28;">PA - Pennsylvania</option>
                        <option value="RI" style="color:#462f28;">RI - Rhode Island</option>
                        <option value="SC" style="color:#462f28;">SC - South Carolina</option>
                        <option value="SD" style="color:#462f28;">SD - South Dakota</option>
                        <option value="TN" style="color:#462f28;">TN - Tennessee</option>
                        <option value="TX" style="color:#462f28;">TX - Texas</option>
                        <option value="UT" style="color:#462f28;">UT - Utah</option>
                        <option value="VT" style="color:#462f28;">VT - Vermont</option>
                        <option value="VA" style="color:#462f28;">VA - Virginia</option>
                        <option value="WA" style="color:#462f28;">WA - Washington</option>
                        <option value="WV" style="color:#462f28;">WV - West Virginia</option>
                        <option value="WI" style="color:#462f28;">WI - Wisconsin</option>
                        <option value="WY" style="color:#462f28;">WY - Wyoming</option>
                        <option disabled="disabled" style="color:#b6e000;">US Outlying Territories</option>
                        <option value="AS" style="color:#462f28;">AS - American Samoa</option>
                        <option value="GU" style="color:#462f28;">GU - Guam</option>
                        <option value="MP" style="color:#462f28;">MP - Northern Mariana Islands</option>
                        <option value="PR" style="color:#462f28;">PR - Puerto Rico</option>
                        <option value="UM" style="color:#462f28;">UM - United States Minor Outlying Islands</option>
                        <option value="VI" style="color:#462f28;">VI - Virgin Islands</option>
                        <option disabled="disabled" style="color:#b6e000;">Armed Forces</option>
                        <option value="AA" style="color:#462f28;">AA - Armed Forces Americas</option>
                        <option value="AP" style="color:#462f28;">AP - Armed Forces Pacific</option>
                        <option value="AE" style="color:#462f28;">AE - Armed Forces Others</option>
                    </select>-->
                    <select name="state" size="1">
                        <?php
                        foreach ($state_array as $state_key => $state_val) {
                            if ($State == $state_key) {
                                ?>
                                <option value="<?php echo $state_key; ?>" style="color:#462f28;" selected><?php echo $state_val; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $state_key; ?>" style="color:#462f28;"><?php echo $state_val; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="text" id="zip" name="zipcode" value="<?= $PostalCode ?>"  placeholder="Zip Code" required/>
                    <input type="hidden" name='order_id' value="<?= $order_id ?>"/>
                    <input type="hidden" name='asin' value="<?= $asin ?>"/>
                    <input type="hidden" name='shipped_date' value="<?= $shipped_date ?>"/>
                    <input type="hidden" name='purchasedate' value="<?= $purchasedate ?>"/>
                    <input type="hidden" name='promo_id1' value="<?= $promo_id1 ?>"/>
                    <input type="hidden" name='product_id' value="<?= $product_id ?>"/>
                    <input type="submit" value="CONFIRM AND SHIP MY FREE BOTTLE"/>
                </form>
            </div>
        </div>
        
    <?php include_once BASE_PATH."/libs/footer.php"; ?>
<!--<script src="jquery.min.js"></script>-->
<script>//document.addEventListener('contextmenu', event => event.preventDefault());</script>
<script>
    $('select option[value="<?= $State ?>"]').attr("selected", true);
</script>
<script type="text/javascript">
    function MM_swapImgRestore() { //v3.0
        var i, x, a = document.MM_sr;
        for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++)
            x.src = x.oSrc;
    }
    function MM_preloadImages() { //v3.0
        var d = document;
        if (d.images) {
            if (!d.MM_p)
                d.MM_p = new Array();
            var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
            for (i = 0; i < a.length; i++)
                if (a[i].indexOf("#") != 0) {
                    d.MM_p[j] = new Image;
                    d.MM_p[j++].src = a[i];
                }
        }
    }

    function MM_findObj(n, d) { //v4.01
        var p, i, x;
        if (!d)
            d = document;
        if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
            d = parent.frames[n.substring(p + 1)].document;
            n = n.substring(0, p);
        }
        if (!(x = d[n]) && d.all)
            x = d.all[n];
        for (i = 0; !x && i < d.forms.length; i++)
            x = d.forms[i][n];
        for (i = 0; !x && d.layers && i < d.layers.length; i++)
            x = MM_findObj(n, d.layers[i].document);
        if (!x && d.getElementById)
            x = d.getElementById(n);
        return x;
    }

    function MM_swapImage() { //v3.0
        var i, j = 0, x, a = MM_swapImage.arguments;
        document.MM_sr = new Array;
        for (i = 0; i < (a.length - 2); i += 3)
            if ((x = MM_findObj(a[i])) != null) {
                document.MM_sr[j++] = x;
                if (!x.oSrc)
                    x.oSrc = x.src;
                x.src = a[i + 2];
            }
    }
</script>
