<?php
$link_id = $link[0];
/* https://developer.vimeo.com/api/playground/videos/8178495 */
$data = file_get_contents('https://api.vimeo.com/videos/'.$link_id.'?access_token='.$vimeo_token.'');
$response = json_decode($data);

$video_id = $link_id;
$video_title = $response->name;
$video_desc = $response->description;
$video_date = $response->created_time;
$video_views = $response->stats->plays;
$video_likes = $response->metadata->connections->likes->total;
$video_image = $response->pictures->sizes[1]->link;


$v_date = substr($video_date,0,10);
$v_views = number_format($video_views);
$v_likes = number_format($video_likes);
?>

<!doctype html>
<html>
    <head>
      <meta charset="utf-8"/>
	  <meta name="viewport" content="width=device-width">
	  <title><?=$video_title?> - <?=$videopage_title?> - <?=$site_title?></title>
      <meta name="description" content="<?=$video_title?> <?=$videopage_title?> <?php echo substr($video_desc,0,100); ?>" />
      <meta name="keywords" content="<?=$video_title?>, <?=$site_keywords?>" />
      <meta property="og:site_name" content="<? echo $site_title; ?>"/>
	  <meta property="og:locale" content="en_US"/>
      <meta property="og:type" content="website"/>
      <meta property="og:title" content="<?=$video_title?> - <?=$videopage_title?> - <?=$site_title?>"/>
      <meta property="og:description" content="<?=$video_title?> <?=$videopage_title?> <?php echo substr($video_desc,0,100); ?>"/>
	  <meta property="og:image" content="<?=$video_image?>">
	  <link href="/style.css" rel="stylesheet" type="text/css">
      <link href="/fonts/font.css" rel="stylesheet" type="text/css" cache="false" />
      <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	  <?php include 'ads/head_code.php'; ?>
    </head>
<body>

<?php include 'includes/header.php'; ?>
<div class="box-searchcontent">
<div class="wrap">

<div class="videocontent">
<div class="videotitle">
<h1><?=$video_title?></h1>
</div>
<div class="videoscreen">
<iframe src="https://player.vimeo.com/video/<?=$video_id?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>

<div class="videoinfo">
<div class="videodetails">
<i class="icon-calendar"></i> <?=$v_date?> <span class="videosep"></span> <i class="icon-thumbs-up-alt"></i> <?=$v_likes?> <span class="videosep"></span> <i class="icon-eye"></i> <?=$v_views?> <span class="videosep"></span> <i class="icon-desktop"></i> Vimeo
</div>
<div class="videodesc">
<p><?=$video_desc?></p>
</div>
<div class="videoshare">
<?php if(isset($addthis_id) and !empty($addthis_id)): ?>
<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_preferred_5"></a>
<a class="addthis_button_preferred_6"></a>
<a class="addthis_button_compact"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?=$addthis_id?>"></script>
<?php endif; ?>
</div>
</div>
<div style="margin: 15px 0px 10px 0px;">
<?php include 'ads/videopage_ad_728x90.php'; ?>
</div>
<?php if(isset($disqus_shortname) and !empty($disqus_shortname)): ?>
<div class="videocomments">
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = '<?=$disqus_shortname?>';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
</div>
<?php endif; ?>

</div>

<div class="sidebar">
<div style="margin-bottom:10px;">
<?php include 'ads/sidebar_ad_300x250.php'; ?>
</div>
<div class="relatedvideos">
<h3><? echo $relatedwidget_title; ?></h3>
<ul>
<?php include('apis/vimeo/related.php'); ?>
</ul>
</div>
</div>

</div>
</div>

<?php include "includes/footer.php"; ?>
</body>
</html>