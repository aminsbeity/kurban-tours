<?php

?>
<!-- BODY-->
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
                        	<div class="amaranth font20px">Our Products</div>
                            <div style="padding-top:10px" class="tahoma font13px grayDark">
                            	<?php echo $productPage->staticPageDetails ?>
                            </div>
                            
                            <div style="margin-top:25px;background:#f2f2f2;">
                                <?php 
	                                $start=1; 
	                                $border=1; 
	                                foreach ($productArray as $productRow){ 
                                ?>
                                <div style="padding:10px;">
                                    <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:15px;border-bottom:<?php echo $border; ?>px solid #d6d6d6">
                                      <tr>
                                        <td valign="top" style="padding-right:6px">
                                        	<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$productRow->productIcon)){ ?>
                                        	<a href="<?php echo option('base_uri') ?>product/<?php echo $productRow->productId ?>">
												<img src="<?php echo $appClass->getImage($productRow->productIcon) ?>"  border="0"/>
											</a>	
											<?php } ?>
                                        </td>
                                        <td align="left" valign="top">
                                            <div class="font20px amaranth grayDark">
                                            <a href="<?php echo option('base_uri') ?>product/<?php echo $productRow->productId ?>">
                                            <?php echo $productRow->productName ?>
                                            </a>
                                            </div>
                                            <div style="padding-top:8px;padding-bottom: 5px;" class="tahoma font13px gray">
                                                <?php echo $formatClass->strip($productRow->productDetails,35,false,true); ; ?>
                                            </div>
                                            <div align="right" class="tahoma font13px blue">
                                            <a href="<?php echo option('base_uri') ?>product/<?php echo $productRow->productId ?>"><img src="images/flesh-link.png" border="0" />&nbsp;<u>Learn More About this Product</u></a>
                                            </div>
                                        </td>
                                      </tr>
                                    </table>
                                </div>
                               <?php 
	                               $start++;
	                               if ($start == count($productArray)){
	                               	$border=0;
	                               } 
		                                } 
	                          ?>
                          	</div>
                            
                            <div style="background:#eaeff1;margin-top:14px;" align="center">
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
	                    <div style="border-right:0px;" class="grayBorder">
	                     	<div style="margin-top:3px;background:#f2f2f2"></div>
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