<?php
if (isset($_GET['page'])) { 
$p = $_GET['page'];
} 
else { 
$p = "1";
}
$count = 5;
/* https://developer.dailymotion.com/documentation#video */
$json = @json_decode(file_get_contents('https://api.dailymotion.com/videos?search='.str_replace(' ', '%20', $_GET['search']).'&fields=id,title,description,thumbnail_120_url,duration,views_total,created_time&sort=relevance&limit='.$count.'&page='.$p), TRUE);

for($i=0;$i<$count;$i++){
$title = strip_tags($json['list'][$i]['title']);
$screen = $json['list'][$i]['thumbnail_120_url'];
$description = strip_tags($json['list'][$i]['description']);
$view = number_format($json['list'][$i]['views_total']);
$duration = gmdate('i:s', $json['list'][$i]['duration']);
$time = gmdate('Y-m-d', $json['list'][$i]['created_time']);
$link = $json['list'][$i]['id'];

$name = cano($title);

$source = "Dailymotion";

if ($title & $link) {include ("includes/list.php");}
}
?>
