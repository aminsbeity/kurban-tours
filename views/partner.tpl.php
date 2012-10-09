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
                        	<div class="amaranth font20px">Our Partners</div>
                            <div style="padding-top:10px" class="tahoma font13px grayDark" align="justify">
                            	<?php echo $partnersPage->staticPageDetails ?>
                            </div>
                            <?php foreach ($partnerArray as $partnerRow){ ?>
                            <!-- REPEAT -->
                            <div style="margin-top: 20px">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            	<tr>
                            		<td valign="bottom">
                            			<div>
                            				<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$partnerRow->partnerLogo)){ ?>
				                                <a href="http://<?php echo $partnerRow->partnerLink ?>" target="_blank" >
				                                	<img src="<?php echo $appClass->getImage($partnerRow->partnerLogo,"") ?>"   style="border: 2px solid #e3e8ec;float: left;margin-right: 8px;padding: 5px;" />
				                                </a>
                            			 	<?php } ?>
	                            			<div class="blueDark tahoma font15px">
		                            			 <a href="http://<?php echo $partnerRow->partnerLink ?>" target="_blank">
		                            				<?php echo $partnerRow->partnerName ?>
		                            			</a>	
	                            			</div>
											<div class="gray tahoma font13px" style="padding-top:10px" align="justify">
												<?php echo $partnerRow->partnerDetails ?>
											</div>
											<div style="padding-top:10px" class="blue font13px tahoma">
		                                    	<a href="http://<?php echo $partnerRow->partnerLink ?>" target="_blank"><?php echo $partnerRow->partnerLink ?></a>
		                                    </div>
	                                   </div> 
                            		</td>
                            	</tr>
                            </table>
                            </div>
                            <!-- END REPEAT -->
                            <?php } ?>
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