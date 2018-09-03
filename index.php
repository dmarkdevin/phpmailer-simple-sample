<?php
 
		 
//SMTP 
$smtp_status = 'enabled'; // enabled or disabled 
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_username = 'email here';    // change this
$smtp_password = 'password here'; // change this


$admin_email = $smtp_username;
$receiver ='email sa receiver';   // change this

 
 
$message="<style>
.s_email{
font-family: Georgia, \"Times New Roman\", Times, serif;
font-size: 16px; 
color: #990000;
}
</style>
<span class=\"s_email\">
Congrats.<br />
Content Sample here<br>
<br>
You can see the full details of this transaction at: <a href=\"https://www.dmarkdevin.com\">https://www.dmarkdevin.com</a>
<br>
<br />
System,<br />
Dmarkdevin<br />

</span>
";
 

require_once("PHPMailer/class.phpmailer.php");
$emailer = new PHPMailer();

if($smtp_status == 'enabled'){ 
 
$emailer->SMTPAuth  = true;
$emailer->Host      = $smtp_host;
$emailer->Port      = $smtp_port;
$emailer->Username  = $smtp_username;
$emailer->Password  = $smtp_password;
}

$emailer->From      = $admin_email;
$emailer->FromName  = 'DMARKDEVIN';
$emailer->Subject   = "Subject Here";
$emailer->Body      = $message;
$emailer->AltBody = "This is the body when user views in plain text format"; //Text Body 

$emailer->IsHTML(true);

$emailer->AddAddress(trim($receiver));
if($emailer->Send()){
    echo 'awesome';
}else{
    echo $emailer->ErrorInfo;
}

