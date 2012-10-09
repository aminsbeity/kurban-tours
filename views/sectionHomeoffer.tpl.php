
<?php foreach ($homeOfferArray as $offerRow){ ?>
			    <div style="padding-top:10px;padding-bottom:10px;border-bottom:1px solid #e6e6e6">
				    <table border="0" cellspacing="0" cellpadding="0">
					    <tr>
					    	<td style="padding-right:11px" valign="top">
						    	<div style="width: 100px;height: 75px;overflow: hidden;">
						    		<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$offerRow->offer_image)){ ?>
						    			<a href="<?php  echo option('base_uri') ?>offer/<?php echo  $offerRow->offer_id?>">
						    				<img src="<?php echo $appClass->getImage($offerRow->offer_image,"med"); ?>" width="100" border="0"/>
						    			</a>
						    		<?php } ?>
						    	</div>
					    	</td>
					    	<td valign="top" align="left">
					    		<div class="tahoma font15px blue"><a href="<?php  echo option('base_uri') ?>offer/<?php echo  $offerRow->offer_id?>"><?php echo $offerRow->destination_name ?></a></div>
					    		<div class="tahoma font12px gray"><?php echo $formatClass->formatDay($offerRow->offer_date) ?></div>
							    <div style="padding-top:10px" class="tahoma font13px grayDark" align="left">
							    	<?php echo $formatClass->strip($offerRow->offer_title,10,false,true);  ?>
							    </div>
					    	</td>
					    </tr>
				    </table>
			    </div>
			    <?php } ?>