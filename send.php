<?php include('siteconfig.php'); ?>
<!doctype html>
<html>
    <head>
      <meta charset="utf-8"/>
	  <meta name="viewport" content="width=device-width">
	  <title>Contact Send - <?php echo $site_title; ?></title>
      <meta name="description" content="Contact send.">	
      <meta name="keywords" content="contact, <?php echo $site_keywords; ?>">
      <link href="/style.css" rel="stylesheet" type="text/css">
      <link href="/fonts/font.css" rel="stylesheet" type="text/css" cache="false" />
      <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
    </head>
<body>
<?php include 'includes/header.php'; ?>
<?php
// ----------------------------------------- 
//  The Web Help .com
// ----------------------------------------- 
// remember to replace your@email.com with your own email address lower in this code.

// load the variables form address bar
$name = $_REQUEST["name"];
$subject = $_REQUEST["subject"];
$message = $_REQUEST["message"];
$from = $_REQUEST["from"];
$verif_box = $_REQUEST["verif_box"];

// remove the backslashes that normally appears when entering " or '
$name = stripslashes($name); 
$message = stripslashes($message); 
$subject = stripslashes($subject); 
$from = stripslashes($from); 

// check to see if verificaton code was correct
if(md5($verif_box).'a4xn' == $_COOKIE['tntcon']){
	// if verification code was correct send the message and show this page
	$message = "Name: ".$name."\n".$message;
	$message = "From: ".$from."\n".$message;
	$email = $contact_email;
	mail("$email", 'Contact subject: '.$subject, $_SERVER['REMOTE_ADDR']."\n\n".$message, "From: $from");
	// delete the cookie so it cannot sent again by refreshing this page
	setcookie('tntcon','');
} else {
	// if verification code was incorrect then return to contact page and show error
	header("Location:".$_SERVER['HTTP_REFERER']."?subject=$subject&from=$from&message=$message&wrong_code=true");
	exit;
}
?>

<div class="box-searchcontent">
<div class="wrap">
<div class="videotitle">
<h1>Contact Send</h1>
</div>

<div class="randombox">
<p>Thank you for your enquiry. Your message has been sent successfully.<p>
</div>

</div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>