<?php
$pagingClass=new PagingClass();
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
                        	<div class="amaranth font20px">Testimonials</div>
                            <div style="padding-top:10px;padding-bottom:10px" class="tahoma font13px grayDark">
                            	<?php echo $testimonialPage->staticPageDetails ?>
                            </div>
                            <!-- REPEAT -->
                            <?php
								$count=1; 
                                	foreach ($testimonialArray as $testimonialRow){
                                	if (($count%2) == 0){
                                		$bgColor='#e7e7e7;'; 
                                	}else{
                                		$bgColor='#f2f2f2'; 
                                	}
                                $count++;
                            ?>
                            <div style="background:<?php echo  $bgColor ;?>;padding:10px;">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" class="tahoma font13px black">
                                  <tr>
                                    <td valign="top" width="22"><img src="images/left-quote.png"  /></td>
                                    <td valign="top">
                                        <div align="justify">
                                        	<?php echo  $testimonialRow->testimonialDetails?>
                                        </div>
                                        <div align="left" style="padding-top:10px">
                                        <?php echo  $testimonialRow->testimonialWriter?><br />
                                        <?php echo  $testimonialRow->testimonialWriterPosition?>
                                        </div>
                                    </td>
                                    <td valign="bottom" width="22"><img src="images/right-quote.png"  /></td>
                                  </tr>
                                </table>
                          	</div>
                           <?php } ?>
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