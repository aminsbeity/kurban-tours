<?php

?>
<div style="padding-top:15px" class="tahoma bold font15px black" align="left"><?php echo $productPage->staticPageTitle ?></div>
<div style="padding-top:5px" class="tahoma font13px grayDark" align="justify">
	<?php echo $productPage->staticPageSubtitle ?>
</div>
<div style="margin-top:10px;background:#f2f2f2">
	<div style="padding:10px 13px">
	<?php foreach ($productArray as $productRow){ ?>
		<div style="padding-bottom:10px">
			<table border="0" cellspacing="0" cellpadding="0" width="270">
				<tr>
					<td valign="top">
						<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$productRow->productIcon)){ ?>
							<a href="<?php echo option('base_uri') ?>product/<?php echo $productRow->productId ?>"><img src="<?php echo $appClass->getImage($productRow->productIcon) ?>" border="0" /></a>
						<?php } ?>
					</td>
					<td align="left" valign="top" style="padding-left:5px">
						<div class="amaranth font18px grayDark"><a href="<?php echo option('base_uri') ?>product/<?php echo $productRow->productId ?>"><?php echo $productRow->productName ?></a></div>
						<div style="padding-top:5px" class="tahoma font13px gray">
							<?php echo $productRow->productTitle; ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	<?php } ?> 
	</div>
</div>