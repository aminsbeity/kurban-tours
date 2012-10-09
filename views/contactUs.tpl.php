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
                        	<div class="amaranth font20px">Contact Us</div>
                            <div style="padding-top:15px" class="tahoma font13px grayDark">
                           	 	<?php echo $contactPage->staticPageDetails; ?>
                            </div>
                            <div style="padding-top:5px;padding-bottom:24px">
                            
                            	<iframe width="619" height="278" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=lebanon+beirut++hamra&amp;aq=&amp;sll=33.889049,35.494981&amp;sspn=0.017634,0.042272&amp;ie=UTF8&amp;hq=&amp;hnear=Hamra,+Beirut,+Lebanon&amp;ll=33.895159,35.48761&amp;spn=0.017633,0.042272&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small></small>
                            </div>
                            
                            <div style="line-height:34px;background:#12669a;padding-left:12px" align="left" class="tahoma font16px white">
                            	CONTACT ADDRESS
                            </div>
                            <div>
                                <table cellpadding="0" cellspacing="0" border="0">
                                	<tr>
                                		<?php $count=0; foreach ($officesContactArray as $officeContact){ ?>
                                		<td valign="top">
                                			<div style="line-height:31px;background:#e6e6e6;padding-left:12px" class="tahoma font18px blue"><?php echo $officeContact->officeLocation; ?></div>
                                			<div style="background:#f6f5f5;padding-left:12px">
	                                            <div style="padding-top:9px;padding-bottom:7px">
		                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
			                                            <tr>
				                                            <td align="left" valign="top" width="300">
				                                            	<div class="tahoma font15px blue"><?php echo $officeContact->officeTitle; ?></div>
				                                            	<div style="padding-top:7px" class="tahoma font13px grayDark">
						                                            <?php echo $officeContact->officeDetails; ?>
					                                            </div>
				                                            </td>
			                                            </tr>
		                                            </table>
	                                            </div>
                                            </div>
                                		</td>
                                		<?php 
											$count++;
											if (($count%2) == 0){
												echo '</tr><tr><td height="10"></td></tr><tr>';
											}else{
												echo '<td width="20">&nbsp;</td>';	
											}
											
                                		}
                                		?>
                                	</tr>
                                </table>
                            </div>
                            
                            <div style="line-height:34px;background:#5d9ecf;padding-left:12px;margin-top:14px" align="left" class="tahoma font16px white">
                            	OUR SALES OFFICES
                            </div>
                            <div>
                                <table cellpadding="0" cellspacing="0" border="0">
                                	<tr>
                                		<?php $count=0; foreach ($salesContactArray as $officeSales){ ?>
                                		<td valign="top">
                                			<div style="line-height:31px;background:#e6e6e6;padding-left:12px" class="tahoma font18px blue"><?php echo $officeSales->officeLocation; ?></div>
                                			<div style="background:#f6f5f5;padding-left:12px">
	                                            <div style="padding-top:9px;padding-bottom:7px">
		                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
			                                            <tr>
				                                            <td align="left" valign="top" width="300">
				                                            	<div class="tahoma font15px blue"><?php echo $officeSales->officeTitle; ?></div>
				                                            	<div style="padding-top:7px" class="tahoma font13px grayDark">
						                                            <?php echo $officeSales->officeDetails; ?>
					                                            </div>
				                                            </td>
			                                            </tr>
		                                            </table>
	                                            </div>
                                            </div>
                                		</td>
                                		<?php 
											$count++;
											if (($count%2) == 0){
												echo '</tr><tr><td height="10"></td></tr><tr>';
											}else{
												echo '<td width="20">&nbsp;</td>';	
											}
											
                                		}
                                		?>
                                	</tr>
                                </table>
                            </div>

                            
                            
                            <div style="background:#f6f5f5;padding-left:12px;margin-top:14px">
                                <div style="padding-top:20px" class="tahoma font13px blueDark">
                                <table>
                                	<tr>
                                		<td>If you wish to contact us vis e-mail please fill the form bellow:</td>
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