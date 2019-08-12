<div style="margin-bottom:10px;">
<?php include 'ads/sidebar_ad_300x250.php'; ?>
</div>
<div class="searchkeys">
<h3><? echo $searchwidget_title; ?></h3>
<div class="keys">
<?php
$text = file_get_contents("includes/searchterms.txt",NULL);
$text = str_replace("-", " ", $text);
$text=explode('[searchterms]:',$text);
foreach ($text as &$value){$value=rtrim($value);}

$out=array_slice($text,-60);
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
<div style="margin-top:15px;">
<?php include 'ads/sidebar_ad_300x600.php'; ?>
</div>