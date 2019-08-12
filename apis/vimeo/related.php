<?php
/* https://developer.vimeo.com/api/playground/videos/45515295/videos */
$r_data = file_get_contents('https://api.vimeo.com/videos/'.$video_id.'/videos?access_token='.$vimeo_token.'&per_page=10&filter=related');
$r_response = json_decode($r_data);

if ($r_response->data==NULL){
echo '';	
}else{	
	
    foreach ($r_response->data as $r_result)
	
{
	echo '<a href="/video/'.str_replace('/videos/', '', $r_result->uri).'/'.cano($r_result->name).'/" title="'.$r_result->name.'"><li><div class="relatedthumb"><img src="'.$r_result->pictures->sizes[1]->link.'" width="120" height="90" border="0"><span class="overlay"></span></div><span class="title">'.$r_result->name.'</span></li></a><div class="line"></div>';
		
}
}
?>