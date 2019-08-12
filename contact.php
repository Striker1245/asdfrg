<?php include('siteconfig.php'); ?>
<!doctype html>
<html>
    <head>
      <meta charset="utf-8"/>
	  <meta name="viewport" content="width=device-width">
	  <title>Contact - <?php echo $site_title; ?></title>
      <meta name="description" content="Contact us.">	
      <meta name="keywords" content="contact, <?php echo $site_keywords; ?>">
      <link href="/style.css" rel="stylesheet" type="text/css">
      <link href="/fonts/font.css" rel="stylesheet" type="text/css" cache="false" />
      <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	  <?php include 'ads/head_code.php'; ?>
    </head>
<body>
<?php include 'includes/header.php'; ?>

<div class="box-searchcontent">
<div class="wrap">
<div class="videotitle">
<h1>Contact Us</h1>
</div>

<div class="randombox">
<form action="/send/" method="post" name="form1" id="form1" style="margin:0px; width:300px;" onsubmit="MM_validateForm('from','','RisEmail','subject','','R','verif_box','','R','message','','R');return document.MM_returnValue">

Your Name:<br />
<input name="name" type="text" id="name" style="padding:2px; border:1px solid #CCCCCC; border-radius:3px; width:180px; height:14px; font-size:11px;" value="<?php echo $_GET['name'];?>"/>
<br />
<br />

Your e-mail:<br />
<input name="from" type="text" id="from" style="padding:2px; border:1px solid #CCCCCC; border-radius:3px; width:180px; height:14px; font-size:11px;" value="<?php echo $_GET['from'];?>"/>
<br />
<br />

Subject:<br />
<input name="subject" type="text" id="subject" style="padding:2px; border:1px solid #CCCCCC; border-radius:3px; width:180px; height:14px; font-size:11px;" value="<?php echo $_GET['subject'];?>"/>
<br />
<br />

Type Verification Code:<br />
<input name="verif_box" type="text" id="verif_box" style="padding:2px; border:1px solid #CCCCCC; border-radius:3px; width:180px; height:14px; font-size:11px;"/>
<img src="/verificationimage.php?<?php echo rand(0,9999);?>" alt="verification image, type it in the box" width="50" height="24" align="absbottom" /><br />
<br />

<!-- if the variable "wrong_code" is sent from previous page then display the error field -->
<?php if(isset($_GET['wrong_code'])){?>
<div style="border:1px solid #990000; background-color:#D70000; color:#FFFFFF; padding:4px; padding-left:6px;width:295px;">Wrong verification code</div><br /> 
<?php ;}?>

Your Message:<br />
<textarea name="message" cols="6" rows="5" id="message" style="padding:2px; border:1px solid #CCCCCC; border-radius:3px; width:300px; height:100px;  font-size:11px;"><?php echo $_GET['message'];?></textarea>

<input name="Submit" type="submit" style="margin-top:10px; display:block; border:1px solid #2A9FD6; color:#FFFFFF; border-radius:3px;  font-size:11px; padding:5px 10px; line-height:14px; background-color:#2A9FD6;" value="Send Message"/>
</form>
</div>

</div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>