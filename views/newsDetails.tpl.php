<?php
$pagingClass=new PagingClass();
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
                    		<div style="padding:23px 16px">
	                        	<div class="amaranth font20px">Latest News</div>
	                            <div style="margin-top:10px">
					                <div style="padding:10px;background:#f2f2f2" class="tahoma font13px grayDark">
						                <table border="0" cellspacing="0" cellpadding="0">
							                <tr>
							                	<td style="padding-right:5px" valign="top" align="left">
							                	<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$newsInfo->latestNewsImage)){ ?>
							                		<img src="<?php echo $appClass->getImage($newsInfo->latestNewsImage,"med") ?>" border="0" width="235"/>
							                	<?php } ?>	
							                	</td>
								                
								                <td valign="top" align="left">
								                	<div style="padding-left: 10px;">
							                            <div class="tahoma black font15px"><a href=""><?php echo  $newsInfo->latestNewsTitle?></a></div>
							                            <div align="left" class="tahoma font12px grayLight"><?php echo $formatClass->formatDay($newsInfo->latestNewsDate); ?></div>
							                            <div style="padding-top:5px" class="tahoma font13px gray" align="justify">
							                            	<?php echo $newsInfo->latestNewsDetails; ?>
							                            </div>
						                           </div> 
					                            </td>
			                            	</tr>
			                            </table>
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
                    	<div style="background:#f2f2f2;padding:19px 16px">
                        	<div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>offers">LATEST OFFERS</a></div>
                            <?php echo CommonController::displayHomeoffer(); ?>
                            <div align="center" style="padding-top:20px"><a href="<?php echo option('base_uri') ?>offers"><img src="images/view-offers.png" border="0" /></a></div>
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