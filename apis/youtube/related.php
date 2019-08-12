<?php
$r_data = file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=10&relatedToVideoId='.$link_id.'&type=video&key='.$youtube_key.'');
$r_response = json_decode($r_data);

if ($r_response->items==NULL){
echo '';	
}else{	
	
    foreach ($r_response->items as $r_result)
	
{
	echo '<a href="/video/'.$r_result->id->videoId.'/'.cano($r_result->snippet->title).'/" title="'.$r_result->snippet->title.'"><li><div class="relatedthumb"><img src="'.$r_result->snippet->thumbnails->default->url.'" width="120" height="90" border="0"><span class="overlay"></span></div><span class="title">'.$r_result->snippet->title.'</span></li></a><div class="line"></div>';
		
}
}
?>