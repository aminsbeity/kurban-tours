<?php

?>
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
                        	<div class="amaranth font20px">Request an Access</div>
                            <div style="padding-top:15px" class="tahoma font13px grayDark">
                           	 	<?php echo $requestAccessPage->staticPageDetails; ?>
                            </div>
                            
                            <div style="background:#f6f5f5;padding-left:12px;margin-top:14px">
                                <div style="padding-top:20px" class="tahoma font13px blueDark">
                                <table>
                                	<tr>
                                		<td>If you wish to request an access vis e-mail please fill the form bellow:</td>
                                	</tr>
                                </table>
                                
                                </div>
                                <div style="padding-top:15px;padding-bottom:20px">
                                	<?php echo CommonController::displayForm() ?>
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
                    <td width="345" valign="top" align="left">
                    	<div style="padding:19px 16px;background:#f2f2f2">
                    		<div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>news">LATEST NEWS</a></div>
                        		<?php echo CommonController::displayLatestNews(); ?>
                        	<div align="center" style="padding-top:12px">
                        	<a href="<?php echo option('base_uri') ?>news"><img src="images/view-all.png" border="0" /></a>
                        	</div>
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