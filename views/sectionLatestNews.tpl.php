<?php

?>
<?php foreach ( $latestNewsArray as $newsRow){ ?>
<div style="padding-top:12px">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top" style="padding-top:0px">
				<div style="margin-right:5px;margin-top:5px"><img src="images/blue-arrow.png" /></div>
			</td>
			<td align="left" valign="top">
				<div class="tahoma black font15px"><a href="<?php echo option('base_uri') ?>news-details/<?php echo $newsRow->latestNewsId ?>"><?php echo $newsRow->latestNewsTitle ?></a></div>
				<div align="left" class="tahoma font12px grayLight"><?php echo $formatClass->formatDay($newsRow->latestNewsDate); ?></div>
				<div style="padding-top:5px" class="tahoma font13px gray">
					<a href="<?php echo option('base_uri') ?>news-details/<?php echo $newsRow->latestNewsId ?>">
					<u><?php echo $formatClass->strip($newsRow->latestNewsDetails,25,false,true); ?></u>
					</a>
				</div>
			</td>
		</tr>
	</table>
</div>
<?php } ?> 