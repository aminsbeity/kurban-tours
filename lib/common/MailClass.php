<?
class MailClass {
	
	function MailClass() {
	
	}
	
	function getAdminEmail() {
		ConnectionFactory::getConnection ();
		$sqlgeneral = "select Email from cms_general";
		$res = mysql_query ( $sqlgeneral );
		$data = mysql_fetch_object ( $res );
		return $data->Email;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param text type $fullName
	 * @param this is an email $email
	 * @return header
	 */
	function getMailHeaders($fullName, $email) {
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From:' . $fullName . '<' . $email . '>';
		return $headers;
	
	}
	function getMessageAsHTML($msgArray) {
		$msg = '
      <html>
      <head> ' . $this->getMessageStyle () . ' </head>
      <body topmargin="0">
      <table align="center" width="650" border="0" style="border:#54b6e6 2px solid" cellspacing="0" cellpadding="0">
        <tr>
          <td ><table width="650" border="0" cellspacing="5" cellpadding="5">
            <tr>
              <td valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="81%" align="center"  class="list1" style="padding-left:5px">Form Content</td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td><hr color="#3f3f3f" style="border:2px solid" /></td>
            </tr> <tr>
              <td><hr color="#3f3f3f" style="border:2px solid" /></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="2%" valign="top" align="right">&nbsp;</td>' . $this->getMessageContent ( $msgArray ) . '</table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          <tr>
              <td><hr color="#3f3f3f" style="border:2px solid" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
      </body>
      </html>';
		return $msg;
	}
	
	private function getMessageStyle() {
		$style = '
		<style>
      .list{color:#3f3f3f; font-family:Verdana; font-weight:bold; font-size:11px; padding-left:6px; line-height:20px}
      .list1{color:#54b6e6; font-family:Verdana; font-weight:bold; font-size:12px; padding-left:6px; line-height:20px}
      .list2{color:#54b6e6; font-family:Verdana; font-weight:bold; font-size:10px; padding-left:6px; line-height:20px}
      
      .web{color:#54b6e6; font-family:Verdana; font-size:9px; text-decoration:none}
      A.web:hover{color:#3f3f3f; font-family:Verdana; font-size:10px; text-decoration:none}
      .pp{color:#868da9; font-family:Verdana; font-weight:bold; font-size:11px;}
      .desc{color:#3f3f3f; font-family:Verdana; font-size:11px; line-height:17px; padding-bottom:3px; padding-left:2px}
      </style>
		';
		return $style;
	}
	
	private function getMessageContent($msgArray) {
		$msgContent = "";
		foreach ( $msgArray as $key => $value ) {
			$msgContent .= '<tr>
                  <td valign="top">&nbsp;</td>
                  <td valign="top"><span class="list">' . $key . '</span></td>
                  <td align="left" valign="top" class="pp">:</td>
                  <td valign="top" class="desc">' . $value . '</td>
                </tr>';
		}
		return $msgContent;
	}
	
	function sendEmail($to, $subject, $msg, $headers) {
		return mail ( $to, $subject, $msg, $headers );
	}
	
	function sendEmailWithAttach($to, $from, $subject, $msg, $fullpath, $filename) {
		//create a boundary string. It must be unique 
		//so we use the MD5 algorithm to generate a random hash 
		$random_hash = md5 ( date ( 'r', time () ) );
		//define the headers we want passed. Note that they are separated with \r\n 
		$headers = "From: $from\r\nReply-To: $from";
		//add boundary string and mime type specification 
		$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-" . $random_hash . "\"";
		//read the atachment file contents into a string,
		//encode it with MIME base64,
		//and split it into smaller chunks
		$attachment = chunk_split ( base64_encode ( file_get_contents ( $fullpath ) ) );
		//define the body of the message. 
		ob_start (); //Turn on output buffering 
		?> 
--PHP-mixed-<?php
		echo $random_hash;
		?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php
		echo $random_hash;
		?>" 

--PHP-alt-<?php
		echo $random_hash;
		?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Hello World!!! 
This is simple text email message. 

--PHP-alt-<?php
		echo $random_hash;
		?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<?php
		echo $msg?>

--PHP-alt-<?php
		echo $random_hash;
		?>-- 

--PHP-mixed-<?php
		echo $random_hash;
		?>  
Content-Type: application/zip; name="<?php
		echo "Resume_" . $filename?>"  
Content-Transfer-Encoding: base64  
Content-Disposition: attachment  

<?php
		echo $attachment;
		?> 
--PHP-mixed-<?php
		echo $random_hash;
		?>-- 

<?php
		//copy current buffer contents into $message variable and delete current output buffer 
		$message = ob_get_clean ();
		//send the email 
		$mail_sent = @mail ( $to, $subject, $message, $headers );
		//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
		if ($mail_sent) {
			return true;
		} else {
			return false;
		}
	}

}

?>