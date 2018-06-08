<?php include BASE_PATH . "/libs/hotjar.php";  ?>
	<style type="text/css">body {
	margin-left: 0px;
	margin-top: 0px;
}

.error {
	font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 16px; line-height: 22px; color: #FF4040; padding-top: 10px; padding-bottom:10px;
	}
	</style>
	<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<body onload="MM_preloadImages('fb-hover.png','twitter-hover.png')">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="center" style="background:white;" valign="top">
			<table border="0" width="900">
				<tbody>
					<tr>
						<td width="642"><img height="81" src="<?= IMG_URL ?>logo-header-01.png" width="399" /></td>
						<td style="text-align:left; font-family:arial; font-size:18px; color:#462f28 ; line-height:30px;" width="130">Stay connected</td>
						<td style="text-align:left; font-family:arial; font-size:18px; color:#462f28 ; line-height:30px;" width="55"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','<?= IMG_URL ?>fb-hover.png',1)"><img border="0" height="55" id="Image5" name="Image5" src="<?= IMG_URL ?>fb.png" width="55" /></a></td>
						<td style="text-align:left; font-family:arial; font-size:18px; color:#462f28 ; line-height:30px;" width="55"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','<?= IMG_URL ?>twitter-hover.png',1)"><img border="0" height="55" id="Image6" name="Image6" src="<?= IMG_URL ?>twitter.png" width="55" /></a></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
			<table border="0" width="900">
				<tbody>
					<tr>
						<td width="485">
						<table border="0" width="95%">
							<tbody>
								<tr>
									<td style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 20px; line-height: 22px; color:#b6e000; padding-top: 40px;"><span style="color:#FF8C00;">Oops!</span></td>
								</tr>
								<tr>
									<td style="text-align:left; font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-size:36px; color:#462f28; font-weight: 700; line-height:46px;"></td>
								</tr>
								<tr>
									<td style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 14px; line-height: 22px; color:#462f28; padding-top: 10px; padding-bottom:10px;"></td>
								</tr>
								<tr>
									<td style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 14px; line-height: 22px; color:#462f28; padding-top: 10px; padding-bottom:10px;">The conditions to qualify for our promotion are:<br />
									<span class="error">&bull; 
                                                                            <?php
                                                                                if(!isset($_SESSION)){  session_start();  }
                                                                                if(isset($_SESSION['error']))
                                                                                {
                                                                                    if($_SESSION['error'] == 1)
                                                                                    {
                                                                                        $msg = 'Try after 2 Minutes.';
                                                                                        unset($_SESSION['error']);
                                                                                    }
                                                                                    elseif ($_SESSION['error'] == 2) 
                                                                                    {
                                                                                        $msg = 'You already get bottle for this Product.';
                                                                                        unset($_SESSION['error']);
                                                                                    }
                                                                                    elseif ($_SESSION['error'] == 3) 
                                                                                    {
                                                                                        $msg = 'Getting incorrect data.';
                                                                                        unset($_SESSION['error']);
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $msg = 'Have been actively using our product for 15 days or more.';
                                                                                    }
                                                                                }
                                                                                else
                                                                                {
                                                                                    $msg = 'Have been actively using our product for 15 days or more.';
                                                                                }
                                                                                echo $msg;
                                                                            ?>
                                                                            
                                                                        </span>
                                                                        <br />
									&bull; Agree to send us your experience with product<br />
									&bull; Limited to one free bottle of each product per household<br />
									&bull; Only valid for customers that bought the product at full price at PotentOrganics.com or our Official Seller on Amazon.com</td>
								</tr>
								<tr>
									<td style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 20px; line-height: 22px; color:#b6e000;"></td>
								</tr>
								<tr>
									<td>
									<p></p>

									<p></p>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
						<td align="center" valign="middle" width="405"><img src="<?= IMG_URL ?>caution.png" style="width: 300px; height: 263px;" /></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td align="center" style="text-align:center; font-family:arial; font-size:12px; color: white; background-color:#462f28; line-height:60px;" valign="top">Copyright &copy; 2017 Potent Organics. All Rights Reserved</td>
		</tr>
	</tbody>
</table>
