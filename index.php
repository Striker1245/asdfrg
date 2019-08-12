<? include('siteconfig.php'); ?>
<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width">
      <title><? echo $homepage_title; ?></title>
      <meta name="description" content="<? echo $homepage_desc; ?>" />
      <meta name="keywords" content="<? echo $site_keywords; ?>" />
	  <meta property="og:site_name" content="<? echo $site_title; ?>"/>
	  <meta property="og:locale" content="en_US"/>
      <meta property="og:type" content="website"/>
      <meta property="og:title" content="<? echo $homepage_title; ?>"/>
      <meta property="og:description" content="<? echo $homepage_desc; ?>"/>
      <link href="/style.css" rel="stylesheet" type="text/css">
      <link href="/fonts/font.css" rel="stylesheet" type="text/css" cache="false" />
      <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	  <script type="text/javascript" src="/js/jquery.js"></script>
	  <script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>
	  <?php include 'ads/head_code.php'; ?>
    </head>
<body>

<div class="headhome">
<div class="logohome">
<a href="/"><img src="/images/logo-home.png" alt="<? echo $site_title; ?>" border="0"></a>
</div>
<h1 class="home-title"><? echo $homepage_text; ?></h1>
<div class="box-homesearch">
<div class="homesearch">
<div class="search">
<form name="search" onSubmit="if(document.search.search.value==''){return false;}" method="get" action="/search.php">
<div class="input-group"> <input type="text" name="search" class="input-sm form-control input-s-sm" placeholder="<? echo $search_text; ?>">
<input type="hidden" name="change" value="1"> <button class="searchbut"><i class="icon-search"></i></button>  </div>
</form>
</div>
<a class="but-surprise" href="/surprise/"><? echo $surprise_text; ?></a>
</div>
</div>
</div>

<script>
jQuery(document).ready(function($){
if(jQuery().jcarousel) {
	// Featured Carousel - Horizontal 
	$(window).bind('load resize', function(){
		
		$('.fcarousel-6').deCarousel();
		$('.fcarousel-5').deCarousel();
	});
	// games carousel
	$('.jcarousel').jcarousel({
        wrap: 'circular'
    });
	$('.jcarousel').jcarouselAutoscroll({
	target: '+=3',
	interval: 3000,
    autostart: true
	});
		
	// Featured Carousel - Vertical 
	$('.carousel-clip').jcarousel({
		vertical: true,
		wrap: 'circular'
	});
	$('.carousel-prev').jcarouselControl({target: '-=4'});
	$('.carousel-next').jcarouselControl({target: '+=4'});
}
});
</script>
<div class="scrollback">
<div class="wrap">
<div class="scrollcontent">
<div class="carousel fcarousel fcarousel-6">
<div class="home-sub">
<h2><? echo $carousel_title; ?></h2>
</div>
<div class="carousel-container">
<div class="jcarousel">
    <ul>
<?php
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
$data = file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&chart=mostPopular&maxResults=20&key='.$youtube_key.'');
$response = json_decode($data);

if ($response->items==NULL){
echo '';	
}else{	
	
    foreach ($response->items as $result)
	
{
	echo '<li><div class="homethumb"><a href="/video/'.$result->id.'/'.cano($result->snippet->title).'/"><img src="'.$result->snippet->thumbnails->medium->url.'" alt="" itemprop="image" width="190px" height="110px"><span class="overlay"><p>'.$result->snippet->title.'</p></span></a></div></li>';
		
}
}
?>        
    </ul>
</div><!-- end .jcarousel -->
<div class="carousel-prev"></div>
<div class="carousel-next"></div>
</div><!-- end .carousel-container -->
</div><!-- end .carousel -->
</div><!-- end .scrollcontent -->
</div><!-- end .wrap -->
</div><!-- end .scrollback -->
<div class="box-home-searches">
<?php 
$homead = file_get_contents("ads/homepage_ad_728x90.php",NULL);
if(isset($homead) and !empty($homead)): ?>
<div style="margin:5px auto 15px auto;width: 728px;">
<?php echo $homead; ?>
</div>
<?php endif; ?>
<div class="home-searches">
<div class="home-sub">
<h2><? echo $latestsearch_title; ?></h2>
</div>
<?php
$text = file_get_contents("includes/searchterms.txt",NULL);
$text = str_replace("-", " ", $text);
$text=explode('[searchterms]:',$text);
foreach ($text as &$value){$value=rtrim($value);}

$out=array_slice($text,-100);
$out=array_reverse($out);
$out=array_unique($out);

$latest="";
foreach ($out as $value) {
$latest .= '<a href="';
$value1 = str_replace(" ", "-", $value);
$latest .= "/watch/$value1/";
$latest .= "\">".htmlspecialchars($value)."</a>";
}
echo"$latest";
?>
</div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>