<?
if (isset($_GET['page'])) { 
$p = $_GET['page'];
} 
else { 
$p = "1";
}

$npage = $p+1;
$npage = "/watch/$search/$npage/$n_token/";

$ppage = $p-1;
$ppage = "/watch/$search/$ppage/$prev_token/";
?>

<div class="pagenav">
<?
if ($p > 1) {
?>
<div class="pull-left"><a class="btn btn-info" href="<?=$ppage?>"><i class="icon-chevron-left" style="margin-right: 5px;"></i> <? echo $pagenav_left; ?></a></div>
<?
}

if ($p < 100) {
?>
<div class="pull-right"><a class="btn btn-info" href="<?=$npage?>"><? echo $pagenav_right; ?> <i class="icon-chevron-right" style="margin-left: 5px;"></i></a></div>
<?
}
?></div>