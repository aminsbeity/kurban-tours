<?php
session_save_path ( "sessions" );
session_start ();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Section</title>
<script language="javascript">
<!--
function validation(frm)
{
if(frm.username.value=="")
{
	alert("Please enter the Username");
	frm.username.focus();
	return false;
}
if(frm.password.value=="")
{
	alert("Please enter the Password");
	frm.password.focus();
	return false;
}

return true;
}
//-->
</script>
<style type="text/css">
.loginLabel{
	color:#ffffff;
	font-size:12px;
	text-align: right;
}
.loginField{
	color:#1ecb3b;
	font-size:12px;
	size: 30;
	border: 1px solid #000000;
}
.alert{
	color:#1ecb3b;
	font-size:12px;
	size: 30;
}
</style>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#3d4e59">
<form action="login.php" method="post" name="frm" id="frm"
				onSubmit="return validation(this)">
				
<div style="height: 100px;">&nbsp;</div>		
<table align="center" height="350" width="561" border="0" cellpadding="0"
	cellspacing="0" style="background: url('images/bglogin.gif');background-repeat: no-repeat;">

	<tr>
		<td valign="top" align="center" width="561" height="248" >
		<table width="225" height="200" border="0" align="center" cellpadding="0"
			cellspacing="0">
			<tr>
				<td height="30" colspan="2" >
				
				</td>
			</tr>
			<tr>
				<td colspan="2" class="alert" height="25"><?=$_SESSION ['Msg'];?></td>
			</tr>
			<tr>
				<td width="122" class="loginLabel">Username:</td>
				<td width="226"><input name="username" size="30" type="text" class="loginField"
					id="username"></td>
			</tr>
			<tr>
				<td class="loginLabel">Password:</td>
				<td><input name="password" type="password" size="30" class="loginField"
					id="passwod"></td>
			</tr>
			<tr>
				<td height="32">&nbsp;</td>
				<td align="right"> <input name="Submit2" type="submit"
					class="InputButtons"  value="  Login  "></td>
			</tr>
			
		</table>
		</td>
	</tr>
</table>
<table align="center" width="100%">
<tr>
		<td height="30" align="center" class="SiteLink"
			style="border-top: 4px solid #f3f3f3;">Powered by <a
			href="http://www.multiframes.com" target="_blank"
			class="defaultLinks" style="color: #ffffff">Multiframes.&copy;2009. All rights reserved.</a>
		</td>
	</tr>
</table>
</form>

</body>
</html>
