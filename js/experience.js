                        var rbt_value = '';
                        var satisfied_btn_value = '';
                        var describe_value = '';

                        jQuery("#myrating").rateYo("option", "rating", <?= isset($_SESSION['like_val']) ? !empty($_SESSION['like_val']) ? $_SESSION['like_val'] : 0 : 0 ?>);

                        var fewSeconds = 10;
                        jQuery('#amazone_link').on("click", function (e) {
                            // Ajax request
                            var describe_value = jQuery("#describe").val();
                            jQuery("#describe").css("border", "none");
                            jQuery('#error_describe').html("");
                            if (describe_value.length >= 0 && describe_value.length < 20)
                            {
                                jQuery('#error_describe').html('');
                                jQuery("#describe").css("border", "1px solid red");
                                jQuery('#error_describe').html('Please describe more.');
                                jQuery('#error_describe').css("color", "red");
                                e.preventDefault();
                                return;
                            }
                            document.getElementById("amazon_anchor").click();
                            setTimeout(function () {
                                jQuery('#btn_submit').prop('disabled', false);
                                jQuery('#btn_submit').css('cursor', 'pointer');
                                jQuery('#btn_submit').css('background-color', '#462f28');
                                jQuery('#append_text').text('You may proceed to the final step!');

                                jQuery("#btn_submit").hover(function () {
                                    jQuery(this).css("background-color", "#b6e000");
                                },
                                        function () {
                                            jQuery(this).css("background-color", "#462f28");
                                        }
                                );
                            }, fewSeconds * 1000);
                        });



                        jQuery(document).ready(function () {
                            rbt_value = '<?= $rating ?>';
                            satisfied_btn_value = '<?= $like ?>';
                            describe_value = '<?= addcslashes($desc) ?>';
                            firsttime = '<?= $firsttime ?>';
                            console.log(firsttime);
                            console.log(rbt_value);
                            console.log(satisfied_btn_value);
                            console.log(describe_value);
                            if (firsttime != '-')
                            {

                                btnEnable();
                            }
                        });

                        jQuery("#btn_submit").click(function (e) {

                            var describe_value = jQuery("#describe").val();
                            var $rateYo = jQuery("#myrating").rateYo();
                            var star_val = $rateYo.rateYo("rating");
                            //var star_val =jQuery('#myrating').rateYo("method", "rating");

                            if (!btnEnable())
                                e.preventDefault();

                            if (describe_value.length <= 0)
                            {
                                jQuery('#error_describe').html('Please describe first.');
                                jQuery('#error_describe').css("color", "red");

                                e.preventDefault();
                            } else if (describe_value.length > 0 && describe_value.length < 20)
                            {
                                jQuery('#error_describe').html('');
                                jQuery('#error_describe').html('Please describe more.');
                                jQuery('#error_describe').css("color", "red");
                                e.preventDefault();
                            }
                        });
                        jQuery(".rbt").click(function () {
                            rbt_value = parseInt(jQuery(this).data("value"));
                            jQuery('.rbt').html('');

                        });
                        jQuery(".satisfied").click(function () {
                            satisfied_btn_value = jQuery(this).data("value");
                            jQuery('.satisfied').html('');

                        });
                        jQuery("#describe").click(function () {
                            describe_value = jQuery(this).val();

                        });
                        jQuery("#describe").on('keyup', function () {
                            var $rateYo = jQuery("#myrating").rateYo();
                            var star_val = $rateYo.rateYo("rating");
                            console.log(star_val);
                            var describe_value = jQuery(this).val();
                            if (describe_value.length > 20 && star_val > 3)
                            {
                                jQuery('#error_describe').html('');
                            }

                        });
                        /**
                         * enable submit button
                         */
                        function btnEnable() {
                            var isValidated = true;
                            var $rateYo = jQuery("#myrating").rateYo();
                            var star_val = $rateYo.rateYo("rating");
                            console.log(star_val);
                            var describe_value = jQuery("#describe").val();


                            if (describe_value.length >= 0 && describe_value.length < 20)
                            {
                                jQuery("#describe").css("border", "1px solid red");
                                jQuery('#error_describe').html('');
                                jQuery('#error_describe').html('Please describe more.');
                                jQuery('#error_describe').css("color", "red");
                                return;
                            }

                            if (star_val > 3) {
                                if (describe_value.length > 20 && satisfied_btn_value != '')
                                {
                                    var $rateYo = jQuery("#myrating").rateYo();
                                    var star_val = $rateYo.rateYo("rating");
        //                console.log(star_val);
                                    var satisfied_btn_value = star_val;
        //            console.log("tttttttgkfdg"+satisfied_btn_value);
                                    jQuery.post("libs/ajax.php", {'action': 'rating', 'review': describe_value, 'like': satisfied_btn_value})
                                            .done(function (data) {
                                                if (satisfied_btn_value > 3)
                                                {
        //                                change
                                                    window.location.href = '../shipping-info/index/<?= $productid; ?>/<?= $promoid; ?>/<?= $purchasedate; ?>/<?= $shipped_date; ?>/<?= $asin; ?>/<?= $order_id; ?>/<?= $email; ?>/<?php echo $phone1; ?>/<?= $name1; ?>';
                                                }
                                            });
                                    jQuery('#counter').text('');

                                }
                            } else {

                                var $rateYo = jQuery("#myrating").rateYo();
                                var star_val = $rateYo.rateYo("rating");
                                var satisfied_btn_value = star_val;
                                jQuery.post("libs/ajax.php", {'action': 'rating', 'review': describe_value, 'like': satisfied_btn_value})
                                        .done(function (data) {
                                            if (satisfied_btn_value <= 3)
                                            {

                                                window.location.href = '../shipping-info/index/<?php echo $productid; ?>/<?php echo $promoid; ?>/<?php echo $purchasedate; ?>/<?php echo $shipped_date; ?>/<?php echo $asin; ?>/<?php echo $order_id; ?>/<?php echo $email; ?>/<?php echo $phone1; ?>/<?php echo $name1; ?>';
                                            }
                                        });
                                jQuery('#counter').text('');


                            }
                            return isValidated;
                        }