<?php

?>
<link rel="stylesheet" href="css/script.css" type="text/css"/>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/homeScriptPhotos.js"></script>
<script type="text/javascript">
<!--
	function showTestimonial(id){
		<?php foreach ($latestTestimonial as $tesDetailsRoWJava){ ?>
			$('#test_<?php echo $tesDetailsRoWJava->testimonialId ?>').slideUp('slow');
			$("#round_<?php echo $tesDetailsRoWJava->testimonialId ?>").attr("src","images/inact-p.png");
		<?php } ?>
		
		setTimeout(function() {
      		$('#test_'+id).slideDown('slow');
      		$("#round_"+id).attr("src","images/act-p.png");
		}, 500);
	}
//-->
</script>

<div align="center">

	<div id="headerimgs" align="center">
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	</div>
	
    <!-- offer section -->
    <div align="right" style="width:1000px;padding-top:5px;">
	    <div class="bgOffer" align="left">
		    <div style="padding:12px 18px;">
			    <div style="margin-top:0px" class=" amaranth font20px blueDark">
			    	<a href="<?php  echo option('base_uri') ?>offers">OFFERS</a>
			    </div>
			    <?php echo CommonController::displayHomeoffer(); ?>
			    <div style="padding-top:0px" align="center"><a href="<?php  echo option('base_uri') ?>offers"><img src="images/all-offers.png" border="0" /></a></div>
		    </div>
	    </div>
    </div>
    <!-- offer section -->
    
    <div id="headernav-outer">
		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="control" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
	</div>
	
    <div align="center">
    
    
    	<!-- top destination -->
    	<div style="margin-top:65px" class="bluebigBg amaranth font20px white">TOP DESTINATIONS</div>
    	<div class="bgBlueLight">
        	<div style="padding-top:27px;padding-left:18px;padding-right:18px" align="left">
            	<?php echo CommonController::displayTopDestination(); ?>
            </div>
    	</div>
        <!-- end top destination -->
        
        
        <div>
        	<table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF" width="655">
                	<div>
                    	<table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top" width="343">
                            	<div style="border-right:1px solid #d0d0d0;margin:19px 16px;padding-right:14px">
                                    <div class="amaranth font20px black">
                                    	<a href="<?php echo option('base_uri') ?>products">OUR PRODUCTS</a>
                                    </div>
                                   	<?php echo CommonController::displayProduct(); ?>
                                </div>
                            </td>
                            <td align="left" valign="top">
                            	<div style="margin:19px 16px">
                                    <div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>dmc-arabia">DMC ARABIA</a></div>
                                    <div style="padding-top:15px" class="tahoma bold font15px black"><?php echo $dmcPage->staticPageTitle; ?></div>
                                    <div style="padding-top:5px" class="tahoma font13px grayDark">
                                    	<?php echo $dmcPage->staticPageSubtitle; ?>
                                    </div>
                                    
                                    
                                    <?php if (is_file(option('BASE_PATH').option('upload_dir_image').$dmcPage->staticPageImage)){ ?>
                                     <div style="padding-top:5px">	<img src="<?php echo $appClass->getImage($dmcPage->staticPageImage,"med") ?>" width="271"/></div>
                                    <?php } ?>
                                    
                                    <div style="padding-top:5px" class="tahoma font13px grayDark">
                                    	<?php echo $dmcPage->staticPageDetails;?>
                                    </div>
                                    <div style="padding-top:10px">
                                    	<div>
                                        <table border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td valign="top" style="padding-top:0px">
                                            <div style="margin-right:5px;margin-top:3px"><img src="images/red-arrow.png" /></div>
                                            </td>
                                            <td align="left" valign="top">
                                                <div class="tahoma gray font13px"><a href="<?php echo option('base_uri') ?>page/<?php echo StaticPageController::$PAGE_DMC_MISSION ?>">Mission & vision</a></div>
                                            </td>
                                          </tr>
                                        </table>
                                    </div>
                                        <div>
                                            <table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td valign="top" style="padding-top:0px">
                                                <div style="margin-right:5px;margin-top:3px"><img src="images/red-arrow.png" /></div>
                                                </td>
                                                <td align="left" valign="top">
                                                    <div class="tahoma gray font13px"><a href="<?php echo option('base_uri') ?>dmc-arabia">DMC Arabia Products</a></div>
                                                    
                                                </td>
                                              </tr>
                                            </table>
                                        </div>
                                        <div>
                                            <table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td valign="top" style="padding-top:0px">
                                                <div style="margin-right:5px;margin-top:3px"><img src="images/red-arrow.png" /></div>
                                                </td>
                                                <td align="left" valign="top">
                                                    <div class="tahoma gray font13px"><a href="<?php echo option('base_uri') ?>dmc-arabia">Contact DMC Arabia </a></div>
                                                </td>
                                              </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div style="padding-top:15px" align="center">
                                    	<a href="<?php echo option('base_uri') ?>dmc-arabia"><img src="images/learn-dmc.png" border="0" /></a>
                                    </div>
                                </div>
                            </td>
                          </tr>
                        </table>

                    </div>
                </td>
                <td bgcolor="#f2f2f2" width="345" valign="top" align="left">
                	<div style="margin:19px 16px">
                    	<div class="amaranth font20px black"><a href="<?php echo option('base_uri') ?>news">LATEST NEWS</a></div>
                    		<?php echo CommonController::displayLatestNews(); ?>  
                        <div align="center" style="padding-top:12px"><a href="<?php echo option('base_uri') ?>news"><img src="images/view-all.png" border="0" /></a></div>
                    </div>
                </td>
              </tr>
            </table>
        </div>
    </div>
    
    <div style="background:#63a2d2;width:1000px">
    	<div style="padding-top:23px;margin-left:20px">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="673" align="left" valign="top">
            	<div style="width:620px">
            		<div align="left" class="amaranth font20px white" style="border-bottom:1px solid white;padding-bottom:3px">
            			<a href="<?php echo option('base_uri') ?>who-we-are">WHO WE ARE</a>
            		</div>
	                <div style="padding-top:10px">
	                	 <?php if (is_file(option('BASE_PATH').option('upload_dir_image').$whoWeArePage->staticPageImage)){ ?>
	                    	 <img src="<?php echo $appClass->getImage($whoWeArePage->staticPageImage,"med") ?>" border="0" width="214" style="float:left;margin-right:7px"  />
	                     <?php } ?>
	                	<div class="blueDark font15px tahoma"><?php echo $whoWeArePage->staticPageTitle ?></div>
		                <div style="padding-top:10px" class="tahoma font13px white" align="justify">
		                	<?php echo $whoWeArePage->staticPageDetails ?>
		                </div>
	                	<div style="clear:both"></div>
	                </div>
	            	<div style="background:#eaeff1;margin-top:14px;" align="left">
		                <div style="padding:10px 10px" align="center">
			               <?php echo CommonController::displayPartner(); ?>
		                </div>
	                </div>
                </div>
            </td>
            <td width="327" align="left" valign="top">
            	<div class="bgTestimonial" align="left">
                	<div class="amaranth font20px blueDark" align="center">
                    	<table border="0" cellspacing="0" cellpadding="0" width="282" height="39">
                          <tr>
                            <td align="left"><a href="<?php echo option('base_uri') ?>testimonials">Testimonials</a></td>
                            <td align="right">
                            	<table border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                  	<?php $firstT=1; foreach ($latestTestimonial as $tesRow){ ?>
                                  	<td style="padding-right:5px">
                                  		<a href="javascript:;" onclick="showTestimonial('<?php echo $tesRow->testimonialId ?>')">
                                  			<?php if ($firstT == 1){ $src="act-p.png";}else{$src="inact-p.png";}?>
                                  			<img src="images/<?php echo  $src ?>" border="0" id="round_<?php echo $tesRow->testimonialId ?>"/>
                                  		</a>
                                  	</td>
                                    <?php $firstT++; } ?>
                                  </tr>
                                </table>
                            </td>
                          </tr>
                        </table>
                    </div>
                    <div style="height: 235px;">
                    	<?php $firstT=1; foreach ($latestTestimonial as $tesDetailsRow){ ?>
	                    <?php if ($firstT == 1){$displayDiv='block';}else{$displayDiv='none';} ?>
	                    <div align="center" style="padding-top:12px;display: <?php echo $displayDiv; ?>" id="test_<?php echo $tesDetailsRow->testimonialId ?>">
	                    	<table border="0" cellspacing="0" cellpadding="0" width="290" class="tahoma font13px black">
	                          <tr>
	                            <td valign="top" width="22"><img src="images/left-quote.png"  /></td>
	                            <td valign="top">
	                            	<div align="justify">
	                            		<?php echo $formatClass->strip($tesDetailsRow->testimonialDetails,70,false,true); ?>
	                                </div>
	                                <div align="left" style="padding-top:10px">
	                               	<?php echo $tesDetailsRow->testimonialWriter ?><br />
									<?php echo $tesDetailsRow->testimonialWriterPosition ?>
	                                </div>
	                            </td>
	                            <td valign="bottom" width="22"><img src="images/right-quote.png"  /></td>
	                          </tr>
	                        </table>
	                    </div>
	                    <?php $firstT++; } ?>
                    </div>
                    <div style="padding-top:10px;margin-right:22px" align="right" class="black amaranth font14px">
                    	<a href="<?php echo option('base_uri') ?>testimonials"><u>VIEW ALL TESTIMONIALS</u></a>
                    </div>
                </div>
            </td>
          </tr>
        </table>
        </div>
    </div>
</div>