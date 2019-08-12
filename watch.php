<? 
include('siteconfig.php');
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
$link = $_GET['link'];
$link = explode("/", $link);
if (ctype_digit($link[0])) {include("apis/vimeo/video.php");}
elseif (strlen($link[0]) == 11) {include("apis/youtube/video.php");}
else {include("apis/dailymotion/video.php");}
?>