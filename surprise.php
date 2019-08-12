<?php
$rand = substr(md5(uniqid(mt_rand(), true)), 0, 3);
/* https://developers.google.com/youtube/v3/docs/search/list */
$data = file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&q='.$rand.'&key=AIzaSyDOkg-u9jnhP-WnzX5WPJyV1sc5QQrtuyc');
$response = json_decode($data);

$id = $response->items[0]->id->videoId;
$vtitle = $response->items[0]->snippet->title;
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}

header('Cache-Control: no-store, no-cache, must-revalidate');
header("Location: http://".$_SERVER['HTTP_HOST']."/video/".$id."/".cano($vtitle)."/");
?>






