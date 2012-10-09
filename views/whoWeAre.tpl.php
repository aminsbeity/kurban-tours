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
                        	<div class="amaranth font20px">Who we are</div>
                            <div style="padding-top:10px" class="tahoma font13px gray">
                            		<?php  echo $whoWeArePage->staticPageDetails ?>
                            </div>
                            <div style="padding-top:25px">
                            	<div class="tahoma font15px blueDark">Kurban Tours is licensed and has 4 companies and incoming offices in:</div>
                                <div style="padding-top:10px">
                                	<table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                      	<?php 
											$count=0;
											foreach ($officesArray as $officeRow){
                                      	?>
                                        <td valign="top"  width="298" class="tahoma font20px blueLight" align="center" style="padding-right:9px">
                                        	<div style="background:#f6f5f5;padding-left:12px">
                                                <div style="padding-top:9px;padding-bottom:7px">
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                      <tr>
                                                        <td align="left" valign="top">
                                                            <div class="tahoma font15px blue"><?php echo $officeRow->officeTitle ?></div>
                                                            <div style="padding-top:7px" class="tahoma font13px grayDark">
                                                            	<?php echo $officeRow->officeDetails ?>
                                                            </div>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div style="background:#48494a;line-height:35px"><?php echo $officeRow->officeLocation ?></div>
                                        </td>
                                        <?php 
                                        $count++;
                                        if (($count%2) == 0){echo '</tr><tr><td style="height:10px"></td></tr><tr>';}
											} 
										?>
										</tr>
                                    </table>

                                </div>
                            </div>
                            
                            <div style="padding-top:30px" align="left">
                            	<div class="font15px tahoma blueDark"><?php echo $ourTeamPage->staticPageTitle ?></div>
                                <div style="padding-top:5px">
                                	<table border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f2f2">
                                      <tr>
                                     	<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$ourTeamPage->staticPageImage)){ ?>
                                     		<td valign="top" style="padding-right:17px"><img src="<?php echo $appClass->getImage($ourTeamPage->staticPageImage,"med") ?>" width="300" /></td>
                                    	<?php } ?>
                                        
                                        <td align="left">
                                        	<div class="font13px tahoma bold blueDark"><?php echo $ourTeamPage->staticPageSubtitle ?></div>
                                            <div class="font13px tahoma grayDark">
                                            	<?php echo $ourTeamPage->staticPageDetails; ?>
											</div>
                                        </td>
                                      </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <div style="padding-top:30px" align="left">
                            	<div class="font15px tahoma blueDark"><?php echo $ourClientsPage->staticPageTitle ?></div>
                                <div style="padding-top:10px">
                                    <div class="font13px tahoma grayDark">
                                    	<?php echo $ourClientsPage->staticPageDetails; ?>
                                    </div>
                                 </div>       
                            </div>
                            
                            <div style="padding-top:30px" align="left">
                            	<div class="font15px tahoma blueDark"><?php echo $ourCommitmentPage->staticPageTitle ?></div>
                                <div style="padding-top:10px">
                                    <div class="font13px tahoma grayDark">
    									<?php echo $ourCommitmentPage->staticPageDetails; ?>
                                    </div>
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