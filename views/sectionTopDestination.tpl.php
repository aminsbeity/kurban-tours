<?php

?>
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
	<?php foreach ($topDestinationArray as $topDestinationRow){ ?>
		<td style="padding-right:15px">
			<div style="position:relative">
				<div class="bgCaption">
					<div style="margin:10px 12px" align="left">
						<div class="tahoma font20px blueLight"><a href="<?php echo option('base_uri') ?>destinations"><?php echo $topDestinationRow->destinationName ?></a></div>
						<div class="tahoma font13px white"><a href="<?php echo option('base_uri') ?>destinations"><?php echo $topDestinationRow->destinationTitle; ?></a></div>
					</div>
				</div>
				<div style="width: 230px;height: 144px;overflow: hidden;">
					<?php if (is_file(option('BASE_PATH').option('upload_dir_image').$topDestinationRow->destinationImage)){ ?>
					<a href="<?php echo option('base_uri') ?>destinations"><img src="<?php echo $appClass->getImage($topDestinationRow->destinationImage,"med"); ?>" width="230" border="0"/></a>
					<?php } ?>
				</div>
			</div>
		</td>
	<?php } ?>
	</tr>
</table>