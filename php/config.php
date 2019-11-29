<?php



function passwordHash($password)
{
	$pass = hash("sha256", $password) ;
	return $pass ;
}

function numQuery($query)
{
	$num = mysqli_num_rows($query) ;
	return $num ;
}

function redirect($page)
{
	header("location:".$page) ;
}

function sendSMS($sendto, $message)
{
    if(strlen($sendto) == 11 || strlen($sendto) == 10)
    {
        if(strpos("#".$sendto,"#0") !== FALSE && strlen($sendto) <= 11) $sendto = "234" . substr($sendto,1);
        if(strpos("#".$sendto,"#0") === FALSE && strlen($sendto) == 11) $sendto = "234" . substr($sendto,1);        
    }
/*	
    $url = "http://zoracom.smsrouter.gtsmessenger.com/ws/instant.php?action=sendSMS&login=admin&password=7f1b1592"
	. "&to=" . UrlEncode($sendto)
	. "&from=" . UrlEncode("33811")
	. "&message=" . UrlEncode($message);
*/    
 //http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=xxx&subacct=xxx&subacctpwd=xxx&message=xxx&sender=xxx&sendto=xxx&msgtype=0
    $url = "http://www.smslive247.com/http/index.aspx?"
    . "cmd=sendquickmsg"
    . "&owneremail=" . UrlEncode("niofa141@gmail.com")
    . "&subacct=" . UrlEncode("OLORUNTOBA ALO")
    . "&subacctpwd=" . UrlEncode("CASES")
    . "&message=" . UrlEncode($message)
    . "&sender=" . UrlEncode("Student Disciplinary Council")
    . "&sendto=" . UrlEncode($sendto)
    . "&msgtype=0" ;
    
//echo $url;

//showAlert($url);

    $curl_handle=curl_init();
      curl_setopt($curl_handle,CURLOPT_URL,$url);
      curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
      curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
      $buffer = curl_exec($curl_handle);
      curl_close($curl_handle);
      if (empty($buffer)){
              print "Nothing returned from url.<p>";
          return false;
      }
      else{
              print $buffer;
          
          return true;
      }
}

function sendEmail($email,$subject,$message)
{
	$sender = "Student Disciplinary Council<noreply@sdcmail.com>";
	$sent = mail($email,$subject,$message,"From: $sender"."\r\n"."Content-type: text/html; charset=iso-8859-1","-fwebmaster@".$_SERVER["SERVER_NAME"]);
	if($sent) return true;
	return false;
}



?>