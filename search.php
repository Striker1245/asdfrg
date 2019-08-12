<? include('siteconfig.php');
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
} 
if(isset($_GET['change'])){ header("Location: http://".$_SERVER['HTTP_HOST']."/watch/".$_GET['search']."/"); }
if (isset($_GET['page'])) { 
$pagenr = $_GET['page'];
}
$query = $_GET['search'];
$query = str_replace("-", " ", $query);
$search = str_replace(" ", "-", $query);
?>
<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width">
	  <title><? if (isset($_GET['page'])) { echo ucwords("$query - $searchpage_title - Page $pagenr - $site_title"); } else  { echo ucwords("$query - $searchpage_title - $site_title"); }?></title>
      <meta name="description" content="<? if (isset($_GET['search'])) { echo "Watch $query video online on $site_title."; } else  { echo "$site_title"; }?>" />
      <meta name="keywords" content="<? if (isset($_GET['search'])) { echo "$query, $site_keywords"; } else { echo $site_keywords; }?>" />
      <meta property="og:site_name" content="<? echo $site_title; ?>"/>
	  <meta property="og:locale" content="en_US"/>
      <meta property="og:type" content="website"/>
      <meta property="og:title" content="<? if (isset($_GET['page'])) { echo ucwords("$query - $searchpage_title - Page $pagenr - $site_title"); } else  { echo ucwords("$query - $searchpage_title - $site_title"); }?>"/>
      <meta property="og:description" content="<? if (isset($_GET['search'])) { echo "Watch $query video online on $site_title."; } else  { echo "$site_title"; }?>"/>
	  <link href="/style.css" rel="stylesheet" type="text/css">
      <link href="/fonts/font.css" rel="stylesheet" type="text/css" cache="false" />
      <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	  <?php include 'ads/head_code.php'; ?>
    </head>
<body>
<?
if (isset($_GET['page'])) { 

} 
else { 
$fpp = "includes/searchterms.txt";
$searchlog = "[searchterms]:".$query."\n";
file_put_contents($fpp, $searchlog, FILE_APPEND);
}

include("includes/main.php");


?>
</body>
</html>