<?php
$r_data = file_get_contents('https://api.dailymotion.com/video/'.$link.'/related?fields=id,title,thumbnail_120_url&limit=10');
$r_response = json_decode($r_data);

if ($r_response->list==NULL){
echo '';	
}else{	
	
    foreach ($r_response->list as $r_result)
	
{
	echo '<a href="/video/'.$r_result->id.'/'.cano($r_result->title).'/" title="'.$r_result->title.'"><li><div class="relatedthumb"><img src="'.$r_result->thumbnail_120_url.'" width="120" height="90" border="0"><span class="overlay"></span></div><span class="title">'.$r_result->title.'</span></li></a><div class="line"></div>';
		
}
}
?>