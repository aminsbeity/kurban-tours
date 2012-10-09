<?php

?>
<script type="text/javascript">
<!--
	function showService(id){
		if ($('#service_'+id).is(':visible')){
			$("#arrow_"+id).attr("src","images/blue-arrow.png");
		}else{
			$("#arrow_"+id).attr("src","images/blue-arrow-down.png");
		}
		$('#service_'+id).toggle('fast');
	}
//-->
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
                        	<div class="amaranth font20px">Our Products</div>
                            <div style="margin-top:30px;">
                                
                                <div style="padding:10px;position:relative">
                                	
                                    <div style="position:absolute;top:-15px;background:#FFFFFF" align="left">
                                    <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:15px;">
                                      <tr>
                                        <td valign="top" style="padding-right:6px">
                                        	<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$productInfo->productIcon)){ ?>
												<img src="<?php echo $appClass->getImage($productInfo->productIcon) ?>" />
											<?php } ?>
                                        </td>
                                        <td align="left" valign="bottom">
                                            <div class="font20px amaranth grayDark" style="padding-top:7px;padding-right:5px"><?php echo $productInfo->productName ?></div>
                                        </td>
                                      </tr>
                                    </table>
                                    </div>
                                    <div style="border-bottom:1px dashed #666666"></div>
                                </div>
                                	
                                <div style="margin-top:15px;padding:13px;background:#f2f2f2">
                                	<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$productInfo->productImage)){ ?>
										<img src="<?php echo $appClass->getImage($productInfo->productImage,"med") ?>" width="223" style="float:left;margin-right:10px" border="0"  />
									<?php } ?>
                                	
                                    <div>
                                        <div class="blueLight tahoma font15px"><?php echo $productInfo->productTitle ?></div>
                                        <div class="gray tahoma font13px" style="padding-top:10px">
    											<?php echo $productInfo->productDetails ?>
                                        </div>
                                    </div>
                                	<div style="clear:both"></div>
                                </div>
                                <?php if (count($serviceArray) > 0){ ?>
                              	<div style="background:#126497;line-height:35px;margin-top:15px" >
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tr>
                                            <td valign="top" class="tahoma font16px white">
                                           	 <div style="margin-left:20px">OUR SERVICES FOR INDIVIDUALS</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <?php 
                                	$count=1; 
                                	foreach ($serviceArray as $serviceRow){
                                	if (($count%2) == 0){
                                		$bgColor='#e7e7e7;'; 
                                	}else{
                                		$bgColor='#f2f2f2'; 
                                	}
                                $count++;	
                                ?>
                                <div style="background:<?php echo $bgColor; ?>;padding:15px" class="tahoma font15px gray">
                                	<table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td valign="top" style="padding-top:0px">
                                        <div style="margin-right:5px;margin-top:5px"><img src="images/blue-arrow.png" id="arrow_<?php echo $serviceRow->productServiceId ?>"/></div>
                                        </td>
                                        <td align="left" valign="top">
                                        	<div class="tahoma grayDark font15px">
                                        		<a href="javascript:;" onclick="showService('<?php echo $serviceRow->productServiceId ?>')"><?php echo $serviceRow->productServiceTitle ?></a>
                                        	</div>
                                        	<div style="display: none;" id="service_<?php echo $serviceRow->productServiceId ?>" align="justify">
                                        		<?php echo $serviceRow->productServiceDetails; ?>
                                        	</div>
                                        </td>
                                      </tr>
                                    </table>
                                </div>
                               <?php } ?>
                                <?php }// end condition if services empty ?>
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
                        	<div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>products">LATEST OFFERS</a></div>
                           	<?php echo CommonController::displayHomeoffer(); ?>
                            <div align="center" style="padding-top:20px"><a href="<?php echo option('base_uri') ?>products"><img src="images/view-offers.png" border="0" /></a></div>
                        </div>
                    </td>
                   	<!-- End right Section -->
                  </tr>
                </table>

            </div>
        </div>
    </div>
</div>