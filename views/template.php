<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo option ('BASE_URL') ?>" />
<title>Kurban Tours -<?php echo $templateTitle; ?></title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<!--[if IE]>
<link rel="stylesheet" href="css/fonts_ie.css" type="text/css" media="screen" />
<![endif]-->
<link rel="stylesheet" href="css/fonts_all.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>

<?php if ($dmcLogo == ""){$dmcLocation=false;}else{$dmcLocation=true;} ?>


<script type="text/javascript">
<!--
	function showHeaderDiv(id,color){
		if ($('#'+id).is(':visible')){
			$("#headerArrow").attr("src","images/"+color+"header-flesh.png");
		}else{
			$("#headerArrow").attr("src","images/"+color+"header-flesh-up.png");
		}
		$('#'+id).toggle('slow');
	}
//-->
</script>
</head>

<body style="background:#FFFFFF">
<!-- HEADER -->
<div>
	<div class="<?php echo $redheaderSlide ?>headerSlide" align="center">
		<div style="width:1000px" align="center" class="tahoma font12px white">
	    	<table border="0" cellspacing="0" cellpadding="0" width="100%">
	          <tr>
	            <td align="left">
	            <div>
	            	<table cellpadding="0" cellspacing="0" border="0">
	            		<tr>
	            			<td> <?php echo $formatClass->formatDay($formatClass->getTodayDate()); ?></td>
	            			<td width="25"></td>
	            			<td><?php echo $formatClass->getWeather(CommonController::$WEATHER_LEBANON_XML,'Lebanon'); ?></td>
	            			<td width="25"></td>
	            			<td><?php echo $formatClass->getWeather(CommonController::$WEATHER_OMAN_XML,'Oman'); ?></td>
	            			<td width="25"></td>
	            			<td><?php echo $formatClass->getWeather(CommonController::$WEATHER_UAE_XML,'UAE'); ?></td>
	            		</tr>
	            	</table>
	            </div>
	            </td>
	            <td align="right" valign="middle">
	                <table border="0" cellspacing="0" cellpadding="0">
	                  <tr>
	                  <?php if ($dmcLocation == false){ ?>
	                    <td>
	                    	<a href="<?php echo option('base_uri') ?>request-access"><img src="images/icon-request.png" border="0"/></a>&nbsp;<a href="<?php echo option('base_uri') ?>request-access">
	                    		<span class="<?php echo $requestAccessClass ?> " >Request a B2B Access</span>
	                    	</a>&nbsp;|&nbsp;
	            		</td>
	            		<?php } ?>
	                    <td>
	                        <table border="0" cellspacing="0" cellpadding="0">
	                          <tr>
	                            <td><a href="javascript:;" onclick="alert('Under Contruction')"><img src="images/icon-fb.png" border="0" hspace="1" style="bottom:0px"/></a></td>
	                            <td><a href="javascript:;" onclick="alert('Under Contruction')"><img src="images/icon-tweeter.png" border="0" hspace="1"/></a></td>
	                            <td><a href="<?php echo option('base_uri') ?>feed" target="_blank"><img src="images/icon-rss.png" border="0" hspace="1"/></a></td>
	                            <td><a href="javascript:;" onclick="alert('Under Contruction')"><img src="images/icon-print.png" border="0" hspace="1"/></a></td>
	                          </tr>
	                        </table>
	                	</td>
	                  </tr>
	                </table>
	            </td>
	          </tr>
	        </table>
	    </div>
	    <div style="display: none;" id="headerPage">
			<table>
				<tr>
					<td>
						<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$headerPage->staticPageImage)){ ?>
							<img src="<?php echo $appClass->getImage($headerPage->staticPageImage,"med"); ?>" width="250" border="0"/>
						<?php } ?>
						<div style="padding: 10px;" align="left">
							<div class="tahoma bold font14px white"><?php echo  $headerPage->staticPageTitle  ?></div>
							<div style="padding-top: 5px;" class="tahoma font13px white" align="justify"><?php echo  $headerPage->staticPageDetails  ?></div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div align="center"><a href="javascript:;" onclick="showHeaderDiv('headerPage','<?php echo $redheaderSlide ?>')">
		<img src="images/<?php echo $redheaderSlide ?>header-flesh.png" border="0" id="headerArrow"/></a>
	</div>
</div>

<!-- search -->
	<div align="center" style="padding-top:6px;">
		<table border="0" cellspacing="0" cellpadding="0" width="1000">
		  <tr>
		    <td align="left">
			    <a href="<?php echo option('base_uri') ?>">
			    	<?php if ($dmcLocation == false){ ?>
			    	<img src="images/logo.png" border="0" />
			    	<?php }else{ ?>
			    	<img src="images/<?php echo $dmcLogo ?>" border="0" />
			    	<?php } ?>
			    </a>
		    </td>
		    <td align="right" valign="middle">
		    	<form method="get" action="http://www.google.com/search" target="_blank">
			    	<div class="bgSearch">
			        	<input type="image" src="images/search-btn.png" style="position:absolute;right:6px;top:9px" />
			        	<input name="q" onfocus="if(this.value=='Search site here'){this.value=''};" onblur="if(this.value==''){this.value='Search site here'};" type="text" class="inputSearch" value="Search site here" />
			        	<input style="display: none;" type="checkbox"  name="sitesearch" value="kurbantours.com" checked /> 
			        </div>
		        </form>	
		    </td>
		  </tr>
		</table>
	</div>
<!-- end search -->

<!-- menu -->
<div style="padding-top:16px">
	<div class="bgMenu" align="center">
    	<table border="0" cellspacing="0" cellpadding="0" width="1000" class="amaranth font17px <?php echo $redheaderSlide ?>gray" height="100%">
          <tr>
            <td class="menuBorder <?php echo $homeClass ?>" align="center" ><a href="<?php echo option('base_uri') ?>">HOME</a></td>
            <td class="menuBorder <?php echo $whoWeAreClass ?>" align="center" ><a href="<?php echo option('base_uri') ?>who-we-are">Who we are</a></td>
            <td class="menuBorder <?php echo $productsClass ?>" align="center" ><a href="<?php echo option('base_uri') ?>products">Our Products</a></td>
            <td class="menuBorder <?php echo $destinationsClass ?>" align="center" ><a href="<?php echo option('base_uri') ?>destinations">Our Destinations</a></td>
            <td class="menuBorder <?php echo $tourOperatorClass ?>" align="center" ><a href="<?php echo option('base_uri') ?>page/<?php echo StaticPageController::$PAGE_TOUR_OPERATOR ?>">Tour Operator</a></td>
            <td class="menuBorder <?php echo $partnersClass ?>" align="center" ><a href="<?php echo option('base_uri') ?>partners">Our Partners</a></td>
            <td class="menuBorder <?php echo $contactUsClass ?>" align="center" ><a href="<?php echo option('base_uri') ?>contact-us">Contact us</a></td>
            <td align="right" width="250" class="menuBorder" <?php if ($dmcLocation){ ?>  style="border-right: 1px solid #c4c4c4;" <?php } ?>>
            <div style="padding-top: 7px;">
             	<?php if ($dmcLocation == false){ ?>
		            <a href="javascript:;" onclick="alert('Under Contruction')"><img src="images/icon-b2b.png" border="0" width="121" /></a>
		            <a href="<?php echo option('base_uri') ?>dmc-arabia"><img src="images/icon-dmc-arabia.png" border="0" /></a>
	            <?php }else{ ?>
	            <center>
	            	<a href="<?php echo option('base_uri') ?>"><img src="images/kurbanTours.png" border="0"  /></a>
	             </center>	
	            <?php } ?>
	         </div>   
            </td>
          </tr>
        </table>
    </div>
</div>
<!-- end menu-->


<!-- END HEADER -->



<!-- BODY-->
	<?php echo $tplSection; ?>
<!-- BODY-->


<!-- FOOTER-->
 <div align="center">
	 <div align="center">
	 <?php if ($dmcLocation == false){ ?>
	 <img src="images/bg-footer.png" />
	 <?php }else{ ?>
	 <img src="images/footerRed.png" />
	 <?php } ?>
	 </div>
	 <div style="width:1000px">
		 <div style="padding-top:10px;padding-left:26px" class="tahoma font13px blue" align="left">
		 	<a href="<?php echo option('base_uri') ?>">HOME</a> | <a href="<?php echo option('base_uri') ?>who-we-are">WHO WE ARE</a> | <a href="<?php echo option('base_uri') ?>products">OUR PRODUCTS</a> | <a href="<?php echo option('base_uri') ?>partners">OUR PARTNERS</a> | <a href="<?php echo option('base_uri') ?>dmc-arabia">DMC ARABIA</a> | <a href="<?php echo option('base_uri') ?>contact-us">CONTACT US</a>
		 	<div style="padding-top:5px" align="left" class="grayLight font11px"><a href="http://www.kurbantours.com" target="_blank">Kurban Tours</a> &copy; 2012. All rights reserved. Powered by <a href="http://www.multiframes.com" target="_blank">Multiframes</a> </div>
		 </div>
	 </div>
 </div>
<!-- END FOOTER -->
    
</body>
</html>
