<?php
$pagingClass=new PagingClass();
$formatClass=new FormatClass();
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
                        	<div class="amaranth font20px">Latest Offers</div>
                             
                            <div style="margin-top:10px">
                           		<div style="position:relative;width:600px;" >
                                	<div class="bgCaption offerClass" style="padding:10px;" > 
                                		<div>
                                    		<div class="tahoma font20px yellow"><?php echo $offerInfo->destination_name ?></div>
                                        	<div class="tahoma font14px grayLight"><?php echo $formatClass->formatDay($offerInfo->offer_date); ?></div>
                                        </div>
                                        <div style="padding-top:10px;" class="tahoma font13px white" align="justify">
                                        	 <?php echo $offerInfo->offer_details?>
                                        </div>
                                    </div>
                                    <?php if (is_file(option('BASE_PATH').option('upload_dir_image').$offerInfo->offer_image)){ ?>
                                    <div style="width: 620px;height: 266px;overflow: hidden;">
                                		<img src="<?php echo $appClass->getImage($offerInfo->offer_image) ?>"  border="0" width="620" />
                                	</div>	
                                	<?php } ?>
                                </div>
                            </div>
                           
                             <div style="margin-top: 15px;">
                            	<?php echo $pagingClass->setPagingClassA ( $link, $page, $numberOfPages); ?>
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
                    </td>
                   	<!-- End right Section -->
                  </tr>
                </table>

            </div>
        </div>
    </div>
</div>