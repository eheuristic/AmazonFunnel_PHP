<?php
include_once '/Models/ShippinginfoModel.php';

class ShippinginfoController {

    public $title = "Shipping Info";
    public $is_mobile;

    public function __construct($is_mobile) {
        $this->is_mobile = $is_mobile;
    }

    public function index() {
        $is_mobile = $this->is_mobile;

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

        /* if (empty($PostalCode) || empty($City) || empty($AddressLine1) || empty($lastname) || empty($phone) || empty($order_id) || empty($asin) || empty($name) || empty($email) || empty($purchasedate)) { */
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
                echo "<script type='text/javascript'>window.location.href = '".BASE_URL."not-eligible/index/" . $order_id . "/" . $purchasedate . "/" . $asin . "';</script>";
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
            ShippinginfoModel::insert_data($purchasedate, $shipped_date, $order_id, $email, $asin, $name, $product_id, $promo_id1, $phone); // INSERT INTO TABLES (orders, promo1)
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
                'merge_fields' => ['FNAME' => $name1, 'LNAME' => '', 'ASIN' => $asin1, 'PHONE' => $phone],
            ]);
//print_r($result);
// show thank you page

            echo "<script type='text/javascript'>window.location.href ='../thankyou/index/" . $asin . "';</script>";
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

        require_once 'pages/shippinginfo/index.php';
        ?>
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

        <?php
        return $this->title;
    }

}
