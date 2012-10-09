<?php
require "session_start.php";
include ("fckeditor/fckeditor.php");
include "connect.php";
include "change_format.php";
include "config.php";

if(isset($_REQUEST['act'])){
	$act=$_REQUEST['act'];
	$sql="select * from cms_msg where Msg_ID=$act";
	$result=mysql_query($sql);
	echo mysql_error();
	$msg=mysql_fetch_array($result);
	$text=$msg['Msg_Description'];
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $siteName ?> Administration Area</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript"   src="javascript/frm_confirmation.js"></script>

<style type="text/css">
.li{
 text-decoration: none;
 list-style: none;
}
.cmsColor{
	color:#5858fc;
}
</style>

</head>
<body bgcolor="#cccccc" style="font-family: tahoma;margin-top: 0px" topmargin="0">
<div style="padding: 0px; background-color: #ffffff" align="center">

<div align="center" style="padding:5px;background-color: #333333">
	<table width="100%" border="0"  cellspacing="0" cellpadding="0" >
	<tr height="120">
		<td align="left" width="350" valign="top">
			<img src="images/cms.gif" width="340" border="0">
		</td>
		<td style="color: #ffffff;padding-top: 1px;" align="center" width="500" valign="middle">
		<div align="center"><img src="images/click-for-more.gif"/></div>
			<div align="center" style="padding: 2px;">
				<table border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td width="60">
							<div>
								<a href="display_cms_text.php">
									<img alt="Text" title="Text" src="images/cms-text.png" border="0"/>
								</a>
							</div>
							<div align="center" class="cmsColor">
								Text
							</div>
						</td>
						
						<td width="60">
							<div>
								<a href="display_cms_photo.php">
									<img alt="Photo" title="Photo" src="images/cms-picture.png" border="0"/>
								</a>
							</div>
							<div align="center" class="cmsColor">
								Photo
							</div>
						</td>
						
						<td width="60">
							<div>
								<a href="display_cms_video.php">
									<img alt="Video" title="Video" src="images/cms-video.png" border="0"/>
								</a>
							</div>
							<div align="center" class="cmsColor">
								Video
							</div>
						</td>
						
						<td width="60">
							<div>
								<a href="display_cms_audio.php">
									<img alt="Audio" title="Audio" src="images/cms-audio.png" border="0"/>
								</a>
							</div>
							<div align="center" class="cmsColor">
								Audio
							</div>
						</td>
						
						<td width="60">
							<div>
								<a href="cms_news.php">
									<img alt="News" title="News" src="images/cms-quote.png" border="0"/>
								</a>
							</div>
							<div align="center" class="cmsColor">
								News
							</div>
						</td>
						
						<td width="60">
							<div>
								<a href="edit_admin.php">
									<img alt="Admin" title="Admin" src="images/cms-chat.png" border="0"/>
								</a>
							</div>
							<div align="center" class="cmsColor">
								Admin
							</div>
						</td>
						
						<td width="60">
							<div>
								<a href="edit_setting.php">
									<img alt="Admin" title="Admin" src="images/cms-link.png" border="0"/>
								</a>
							</div>
							<div align="center" class="cmsColor">
								Website
							</div>
						</td>
						
					</tr>
				</table>
				</div>
		</td>
		<td width="200"  class="font11px cmsColor" valign="top">
			<?php echo "Server Date Time: <br>".date("F j, Y  -  g:i a");     ?>
			<br/><br/>
          	<b><a href="login.php"><img src="images/exit.png" width="50" alt="logout" title="logout" border="0"></a></b>
		</td>
	</tr>
      </table>
</div>


<hr>


<!-- start menu -->
<div style="background-color: #ffffff;padding:3px;" align="center">
	<table   width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr height="50">
			<td align="left" valign="top" width="200" bgcolor="#f3f3f3">
				<div align="center" class="cmsColor font18px bold" style="background-color: #e1dfdf;height: 50px;padding: 10px">
					<img src="images/menu.png" height="40" alt="menu" title="menu">
				</div>
				<div class="menuDiv">
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/Pages.png" border="0"  height="30">
						Pages Content
						<ul  class="font14px">
							<li><a href="display_static_page.php" class="MenuLinks">View Pages Content</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/City.png" border="0"  height="30">
						Destinations
						<ul  class="font14px">
							<li><a href="display_destination.php" class="MenuLinks">View Destinations</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/golden_offer.png" border="0"  height="30">
						offers
						<ul  class="font14px">
							<li><a href="display_offer.php?fromLink=main" class="MenuLinks">View offers</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/news.png" border="0"  height="30">
						News
						<ul  class="font14px">
							<li><a href="display_latest_news.php" class="MenuLinks">View News</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/office.png" border="0"  height="30">
						offices
						<ul  class="font14px">
							<li><a href="display_office.php" class="MenuLinks">View offices</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/Partnership.png" border="0"  height="30">
						partners
						<ul  class="font14px">
							<li><a href="display_partner.php" class="MenuLinks">View partners</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/product.png" border="0"  height="30">
						products
						<ul  class="font14px">
							<li><a href="display_product.php" class="MenuLinks">View products</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/services.png" border="0"  height="30">
						products services
						<ul  class="font14px">
							<li><a href="display_product_service.php?fromLink=main" class="MenuLinks">View products services</a>
						</ul>
					</ul>
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/testimonial.png" border="0"  height="30">
						testimonial
						<ul  class="font14px">
							<li><a href="display_testimonial.php" class="MenuLinks">View testimonial</a>
						</ul>
					</ul>
					
					<ul class="font13px bold" style="margin-left: -5px;">
						<li class="li"> <img src="images/plus.png" border="0"  height="30">
						Dmc Arabia
						<ul  class="font14px">
							<li><a href="display_dmc_brochure.php" class="MenuLinks">View Dmc brochure</a>
							<li><a href="display_dmc_contact.php" class="MenuLinks">View Dmc Contact</a>
							<li><a href="display_dmc_product.php" class="MenuLinks">View Dmc Product</a>
						</ul>
					</ul>
				</div>
				
			</td>
			
			<td align="left" valign="top">
			<?php if($text != ""){ ?>
				<div align="center" class="Msg"><?=$text?></div>
			<?php } ?>
			<div align="center">
				<? main() ?>
			</div>
			</td>
			
			
		</tr>
	</table>

</div>
<!-- end menu -->

     <hr style="height: 1px; color:black;"/>
	<div align="center" class="font11px">Powered by <a href="http://www.multiframes.com" target="_blank" class="defaultLinks bold">Multiframes</a>.&copy;2008. All rights reserved. </div>
	<br/>
</div>
</body>
</html>