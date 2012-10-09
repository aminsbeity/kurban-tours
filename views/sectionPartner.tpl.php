<?php

?>

 				<table border="0" cellspacing="0" cellpadding="0">
	                <tr>
		                <?php foreach ($partnerArray as $partnerRow){ ?>
		                <?php if (is_file(option('BASE_PATH').option('upload_dir_image').$partnerRow->partnerLogo)){ ?>
			                <td style="padding-right:15px" valign="middle">
			                <div style="width: 140px;overflow: hidden;" align="center">
				                <a href="http://<?php echo $partnerRow->partnerLink ?>" target="_blank">
				               	 	<img src="<?php echo $appClass->getImage($partnerRow->partnerLogo,""); ?>" border="0"  />
				                </a>
				                </div>
			                </td>
		                <?php } ?>
		                <?php } ?>
	                </tr>
                </table>
                
                