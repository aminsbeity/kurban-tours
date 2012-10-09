<?php

?>

<script type="text/javascript">
<!--
	function validateForm(){
		var name = $('#name').val();
		var email = $('#email').val();
		var message=$('#message').val();
		
		if(name == ""){
			$('#name').css('border-color','red');
		}else{
			$('#name').css('border-color','#b0b4bc');
		}
		
		
		if(email == ""){
			$('#email').css('border-color','red');
		}else{
			$('#email').css('border-color','#b0b4bc');
		}
		
		
		if(message == ""){
			$('#message').css('border-color','red');
		}else{
			$('#message').css('border-color','#b0b4bc');
		}
		
		if(name != "" && email != "" && message != ""){
			$('#websiteForm').submit();
		}else{
			$('#returnedMsg').slideDown('fast');
			$("#returnedMsg").html("* All fields are required.");
			setTimeout(function() {
	      	$('#returnedMsg').slideUp('fast');
			}, 50000);
			
		}
		
	}
	
	function checkColor(id){
		var borderColor=$('#'+id).css('border-left-color');
		var value=$('#'+id).val();
		if(borderColor == 'rgb(255, 0, 0)' && value != ""){
			$('#'+id).css('border-color','#b0b4bc');
		}
		
		if(value == ""){
			$('#'+id).css('border-color','red');
		}
	}
//-->
</script>

<div  id="returnedMsg" class="red tahoma font12px" align="center">
<?php if ($_SESSION['returnedMsg'] != ""){ ?>
<?php echo $_SESSION['returnedMsg']; $_SESSION['returnedMsg']=""; ?>
	<script type="text/javascript">
	window.scrollTo(100,1200);
	setTimeout(function() {
	      $('#returnedMsg').hide('fast');
	}, 5000);
	</script>
<?php } ?>	
</div>

<form name="websiteForm" id="websiteForm" action="<?php echo option('base_uri').$action ?>" method="post">
	<table border="0" cellspacing="0" cellpadding="0" class="tahoma font12px grayDark">
		<tr>
			<td align="right">*Name&nbsp;</td>
			<td><input type="text" name="name" id="name" class="inputContact" onblur="checkColor('name')" /></td>
		</tr>
		<tr>
			<td style="height: 10px"></td>
		</tr>
		<tr>
			<td align="right">Phone Number&nbsp;</td>
			<td><input type="text" name="phone" id="phone" class="inputContact" /></td>
		</tr>
		<tr>
			<td style="height: 10px"></td>
		</tr>
		<tr>
			<td align="right">*E-mail Address&nbsp;</td>
			<td><input type="text" name="email" id="email" class="inputContact"  onblur="checkColor('email')"/></td>
		</tr>
		<tr>
			<td style="height: 10px"></td>
		</tr>
		<tr>
			<td align="right" valign="top">*Message&nbsp;</td>
			<td><textarea  name="message" id="message" onblur="checkColor('message')" class="inputContact" style="height: 82px"></textarea></td>
		</tr>
		<tr>
			<td style="height: 10px"></td>
		</tr>
		<tr>
			<td colspan="2" align="right">
			<input type="hidden" name="destination" id="destination" value="<?php echo  $destination; ?>" />
			<input type="button" class="buttonSend"  onclick="validateForm()"/>
			</td>
		</tr>
	</table>
</form>