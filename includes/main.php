<?php include 'includes/header.php'; ?> 
<div class="box-searchcontent">
<div class="wrap">

<div class="searchcontent">
<div class="searchtitle">
<? if (isset($_GET['page'])) { echo "$page_text $pagenr"; }?> <? echo $searchresults_title; ?>: <h1 style="display:inline"><?=ucwords($query)?></h1>
</div>
<div class="searchresults">
<?
include ("apis/youtube/search.php");
include ("apis/dailymotion/search.php");
if(isset($vimeo_token) and !empty($vimeo_token)):
include ("apis/vimeo/search.php");
endif;
include ("includes/pagination.php");
?>
</div>
</div>

<div class="sidebar">
<?php include("includes/sidebar.php"); ?>
</div>

</div>
</div>

<?php include 'includes/footer.php'; ?>