<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>shipping_info.css?ver=3"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=1"/>
<script src="https://use.fontawesome.com/dc6fe16a4a.js"></script>

<?php
include(BASE_PATH.'/libs/MailChimp.php');

//use \DrewM\MailChimp\MailChimp;
use DrewM\MailChimp\MailChimp;
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
