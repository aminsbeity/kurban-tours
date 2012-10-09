<?php

?>
<link rel="stylesheet" href="css/script.css" type="text/css"/>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/dmcScriptPhotos.js"></script>
<!-- this class overide the class exist in script.css -->
<style>
<!--
.headerimg { background-position: center top; background-repeat: no-repeat; width:100%; height:1350px; position:absolute; }
-->
</style>
<!-- BODY-->
<div align="center">
	<div id="headerimgs" align="center">
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	</div>
	
	<div style="width:1000px;padding-top: 225px;">
    	<div class="tabRed amaranth font20px white" align="center" >DMC  ARABIA</div>
        <!-- <div><img src="images/banner-dmc.jpg" width="1000" /></div> -->
        <div class="container" style="background-color: white;">
        	
            <div>
            	<table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="686" align="left" valign="top">
                    	<div style="padding:23px 16px ">
                        	<div style="padding-bottom:21px;border-bottom:1px solid #cbcbcb">
	                        		<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$aboutDmcPage->staticPageImage)){ ?>
	                            		<img src="<?php echo $appClass->getImage($aboutDmcPage->staticPageImage,"med") ?>" border="0" width="300" style="float:left;margin-right:7px"  />
	                                <?php } ?>
                                	<div class="black font20px amaranth"><?php echo $aboutDmcPage->staticPageTitle ?></div>
                                    <div style="padding-top:10px" class="tahoma font13px gray" align="justify">
										<?php echo $aboutDmcPage->staticPageDetails ?>
                                    </div>
                                	<div style="clear:both"></div>
                            </div>
                            <div style="padding-top:23px">
                            	<div class="amaranth font20px white" style="background-color: #c30000;height: 30px;padding-left: 5px;padding-top: 10px;">Products</div>
                                <div style="padding-top:10px" class="tahoma font13px bold black">
                                Kurban Tours different departments offer a wide variety of facilities to international tour operators and to MICE organizers such as:
                                </div>
                                <?php foreach ($dmcProductArray as $dmcProduct){ ?>
                                <div style="padding-top:15px">
                                	<table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td valign="top" style="padding-top:0px">
                                        <div style="margin-right:5px;margin-top:5px"><img src="images/redDmcArrow.png" /></div>
                                        </td>
                                        <td align="left" valign="top">
                                        	<div class="tahoma red font15px"><?php echo $dmcProduct->dmcProductTitle ?></div>
                                            <div style="padding-top:5px" class="tahoma font13px gray">
                                           	<?php echo $dmcProduct->dmcProductDetails ?>
                                            </div>
                                        </td>
                                      </tr>
                                    </table>
                                </div>
                                <?php } ?>
                          
                            <div style="padding-top:17px" class="tahoma bold font13px black">
                            Kurban Tours is divided in 2 departments, the MICE department, and the incoming tour operator department.
                            </div>
                            <div style="padding-top:15px">
                            <?php foreach ($dmcBrochureArray as $dmcBrochure){ ?>
                            <?php if (is_file(option('BASE_PATH').option('upload_dir_file').$dmcBrochure->dmcBrochureFile)){ ?>
                                	<div>
                                        <table border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td valign="top" style="padding-top:0px">
                                            <div style="margin-right:5px;margin-top:5px"><img src="images/redDmcArrow.png" /></div>
                                            </td>
                                            <td align="left" valign="top">
                                                <div class="tahoma red font15px">
	                                                <a href="<?php echo option('upload_dir_file').$dmcBrochure->dmcBrochureFile ?>">
	                                                	<?php echo $dmcBrochure->dmcBrochureTitle ?>
	                                                </a>
                                                </div>
                                            </td>
                                          </tr>
                                        </table>
                                    </div>
                              <?php } ?>      
                              <?php } ?>
                            </div>
                            <div style="background:#eaeff1;margin-top:14px;" align="left">
                            	<div style="padding:10px 10px">
                            		<?php echo CommonController::displayPartner(); ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <!-- right section -->
                    <td width="314" valign="top" align="left">
                    	<div style="background:#f2f2f2;padding:19px 21px">
                        	<div class="amaranth font20px"><?php echo $missionDmcPage->staticPageTitle ?></div>
                            <div style="padding-top:8px">
                            		<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$missionDmcPage->staticPageImage)){ ?>
	                            		<div><img src="<?php echo $appClass->getImage($missionDmcPage->staticPageImage,"med") ?>" border="0" width="271"  style="float:left;margin-right:7px"  /></div>
	                                <?php } ?>
                            	
                            	
                                <div style="padding-top:11px" class="tahoma font13px grayDark" align="justify">
                                	<?php echo $formatClass->strip($missionDmcPage->staticPageDetails,35,false,true);?> <a href="<?php echo option('base_uri') ?>page/<?php echo StaticPageController::$PAGE_DMC_MISSION ?>"><span class="red">Learn more</span></a>
                                </div>
                            </div>
                        </div>
                        
                        <div style="margin-top:9px;border-right:0px;background:#f4f4f4;" class="grayBorder" align="right">
                        	<div class="map" align="center">
                            	<div style="padding-top:140px;padding-left:15px" class="amaranth font20px black" align="left">Contact us</div>
                                <div style="padding-top:3px">
                                	<table border="0" cellspacing="0" cellpadding="0" height="81" class="font13px tahoma grayDark" >
                                    	
                                      <tr>
                                        <td bgcolor="#b8c5cf" width="36" align="center"><img src="images/icon-email.gif" width="18" /></td>
                                        <td bgcolor="#d6e0e6" width="239" align="left" >
                                        	<div style="margin-left:12px">
                                            <span class="blue">E-mail:</span> <a href="mailto:info@kurbantours.com">info@kurbantours.com</a>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#b8c5cf" width="36" align="center"><img src="images/icon-website.gif" width="18" /></td>
                                        <td bgcolor="#d6e0e6" width="239" align="left" >
                                        	<div style="margin-left:12px">
                                            <span class="blue">website:</span> <a href="http://www.kurbantours.com" target="_blank">www.kurbantours.com</a><br /><a href="http://www.dmcarabia.com" target="_blank">www.dmcarabia.com</a>
                                            
                                            </div>
                                        </td>
                                      </tr>
                                    </table>
                                </div>
                                <div style="width:276px;padding-bottom:40px">
                                	<?php $count=1; foreach ($dmcContactArray as $dmcContact){ ?>
                                	<div style="background:#ececec;margin-bottom:3px">
                                	<table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="61" class="times font86px italic lightColor bold" valign="top" align="center">&nbsp;<?php echo $count; ?></td>
                                        <td align="left" valign="top" style="padding-left:32px">
                                        	<table border="0" cellspacing="0" cellpadding="0" style="padding-top:15px">
                                              <tr>
                                                <td valign="top"><img src="images/blue-arrow.png" />&nbsp;</td>
                                                <td class="tahoma font13px black">
                                                    <div class="amaranth font16px blue"><?php echo $dmcContact->dmcContactTitle ?></div>
                                                   <div>
                                                   	<?php echo $dmcContact->dmcContactDetails;?>
                                                   </div>
                                                </td>
                                              </tr>
                                            </table>
                                        </td>
                                      </tr>
                                    </table>
                                    </div>
                                    <?php $count++; } ?>
                                </div>
                            </div>
                        </div>
                    </td>
                   	<!-- End right Section -->
                  </tr>
                </table>

            </div>	
            
            
        </div>
    </div>
</div>