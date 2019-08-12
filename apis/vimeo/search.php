<?php
/* https://developer.vimeo.com/api/playground/videos */
$vdata = file_get_contents('https://api.vimeo.com/videos?query='.$search.'&page='.$p.'&per_page=5&access_token='.$vimeo_token.'');
$vresponse = json_decode($vdata);

if ($vresponse->data==NULL){
echo '';	
}else{
foreach ($vresponse->data as $vresult)
	
{
	echo '<div class="searchitem">
<div class="videothumb">
<a href="/video/'.str_replace('/videos/', '', $vresult->uri).'/'.cano($vresult->name).'/" title="'.$vresult->name.'"><img src="'.$vresult->pictures->sizes[1]->link.'" class="thumbnail" height="90" border="0">
<span class="overlay"></span></a>
</div>
<div class="searchframe">
<h2 class="title"><a href="/video/'.str_replace('/videos/', '', $vresult->uri).'/'.cano($vresult->name).'/" title="'.$vresult->name.'">'.$vresult->name.'</a></h2>
<p class="desc">'.substr($vresult->description,0,160).'...</p>
<div class="details"><i class="icon-calendar"></i> '.substr($vresult->created_time,0,10).'<span class="videosep"></span><i class="icon-clock"></i> '.gmdate('i:s', $vresult->duration).'<span class="videosep"></span><i class="icon-eye"></i> '.number_format($vresult->stats->plays).'<span class="videosep"></span><i class="icon-desktop"></i> Vimeo</div>
</div>
</div>
<div class="line"></div>';
}
}	
?>