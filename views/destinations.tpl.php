<?php
$appClass=new ApplicationClass();
?>
<script type="text/javascript" src="js/animatedcollapse.js"></script>

<script type="text/javascript">

animatedcollapse.init()

</script>
<div align="center">
	<div style="width:1000px">
    	<div class="tabBlue amaranth font20px white" align="center" style="margin-top:16px">TOP DESTINATIONS</div>
        <div class="container">
        	<div class="bgGal" style="border-bottom:1px solid #e4e4e4;">
            	<div style="padding-top:25px" align="center">
                	<?php echo CommonController::displayTopDestination(); ?>
                </div>
            </div>
            
            <div>
            	<table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="654" align="left" valign="top">
                    	<div style="padding:23px 16px ">
                        	<div class="amaranth font20px">Our Destinations</div>
                            <div style="padding-top:10px" class="tahoma font13px grayDark">
                            	<?php echo $destinationPage->staticPageDetails ?>
                            </div>
                            <div style="margin-top:10px">
                                        <div style="padding-top:17px;" class="tahoma">
                                        	<!-- Repeat -->
                                        	<?php foreach ($AllDestination as $allDesRow){ ?>
                                            <a name="anch1"></a>
                                            <a href="#" rel="toggle[<?php echo 'destinationRow'.$allDesRow->destinationId ?>]" 
                                            data-openimage="images/arrowHide.png" 
                                            data-closedimage="images/arrowShow.png">
    										<script type="text/javascript">animatedcollapse.addDiv('destinationRow<?php echo $allDesRow->destinationId; ?>', 'fade=5,speed=200,hide=1')</script>
                                            
                                            	
                                                <div style="background:#126497;line-height:35px;margin-bottom:3px" >
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td valign="top" class="tahoma font16px white">
                                                            <div style="margin-left:20px"><?php echo $allDesRow->destinationName; ?></div>
                                                            </td>
                                                            <td align="right" style="padding-right:13px"><img src="images/arrowHide.png" border="0" /></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                </a>
                                                <div class="tahoma font13px gray" id="<?php echo'destinationRow'.$allDesRow->destinationId ?>" >
                                                  <table>
                                                  	<tr>
                                                  		<td style="background:#f6f5f5;">
                                                  			 <div style="padding:17px 14px" class="tahoma font13px grayDark">
			                                                   		<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$allDesRow->destinationImage)){ ?>
			                                                   			<img src="<?php echo $appClass->getImage($allDesRow->destinationImage,"med") ?>" style="float: left;margin-right: 5px;margin-bottom: 5px;" width="250"/>
			                                                   		<?php } ?>
			                                                   		 
			                                                   		<?php echo $allDesRow->destinationDetails; ?>
			                                                   </div>
                                                  		</td>
                                                  	</tr>
                                                  </table>
                                                </div>
                                                <div style="clear: both;"></div>
                                            <!-- End Repeat -->
                                            <?php } ?>
                                        </div>
                                                              
                            </div>
                            
                            
                            <div style="background:#eaeff1;margin-top:14px;" align="left">
                            	<div style="padding:10px 10px">
                            		<?php echo CommonController::displayPartner(); ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <!-- right section -->
                    <td width="346" valign="top" align="left">
                    	<div style="padding:19px 16px;background:#f2f2f2">
                    	<div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>news">LATEST NEWS</a></div>
                        	<?php echo CommonController::displayLatestNews(); ?>
                        	<div align="center" style="padding-top:12px"><a href="<?php echo option('base_uri') ?>news"><img src="images/view-all.png" border="0" /></a></div>
                    	</div>
                    	<div style="border-right:0px;padding:19px 16px" class="grayBorder">
                        	<div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>products">OUR PRODUCTS</a></div>
                           	<?php echo CommonController::displayProduct(); ?>
                        </div>
                    	<div style="background:#f2f2f2;padding:19px 16px">
                        	<div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>offers">LATEST OFFERS</a></div>
                            <?php echo CommonController::displayHomeoffer(); ?>
                            <div align="center" style="padding-top:20px"><a href="<?php echo option('base_uri') ?>offers"><img src="images/view-offers.png" border="0" /></a></div>
                        </div>
                    </td>
                   	<!-- End right Section -->
                  </tr>
                </table>

            </div>
        </div>
    </div>
</div>