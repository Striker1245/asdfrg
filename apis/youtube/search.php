<?php
function covtime($youtube_time){
    $start = new DateTime('@0'); // Unix epoch
    $start->add(new DateInterval($youtube_time));
    return $start->format('i:s');
}
if (isset($_GET['token'])) { 
$ptoken = $_GET['token'];
$pagetoken = str_replace('/', '', $ptoken);
} 
else { 
$pagetoken = "";
}


/* https://developers.google.com/youtube/v3/docs/search/list */
$data = file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=5&safeSearch=strict&type=video&q='.$search.'&key='.$youtube_key.'&pageToken='.$pagetoken.'');
$response = json_decode($data);

$n_token = $response->nextPageToken;
if (isset($response->prevPageToken)) { 
$prev_token = $response->prevPageToken;
} 
else { 
$prev_token = "";
}

/* https://developers.google.com/youtube/v3/docs/videos/list#try-it */
$stats_data = file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=contentDetails,statistics&id='.$response->items[0]->id->videoId.','.$response->items[1]->id->videoId.','.$response->items[2]->id->videoId.','.$response->items[3]->id->videoId.','.$response->items[4]->id->videoId.'&key='.$youtube_key.'');
$stats_response = json_decode($stats_data);

?>
<div class="searchitem">
<div class="videothumb">
<a href="/video/<?php echo $response->items[0]->id->videoId;?>/<?php echo cano($response->items[0]->snippet->title);?>/" title="<?php echo $response->items[0]->snippet->title;?>"><img src="<?php echo $response->items[0]->snippet->thumbnails->default->url;?>" class="thumbnail" height="90" border="0">
<span class="overlay"></span></a>
</div>
<div class="searchframe">
<h2 class="title"><a href="/video/<?php echo $response->items[0]->id->videoId;?>/<?php echo cano($response->items[0]->snippet->title);?>/" title="<?php echo $response->items[0]->snippet->title;?>"><?php echo $response->items[0]->snippet->title;?></a></h2>
<p class="desc"><?php echo substr($response->items[0]->snippet->description,0,190); ?></p>
<div class="details"><i class="icon-calendar"></i> <?php echo substr($response->items[0]->snippet->publishedAt,0,10);?><span class="videosep"></span><i class="icon-clock"></i> <?php echo covtime($stats_response->items[0]->contentDetails->duration);?><span class="videosep"></span><i class="icon-eye"></i> <?php echo number_format($stats_response->items[0]->statistics->viewCount);?><span class="videosep"></span><i class="icon-desktop"></i> YouTube</div>
</div>
</div>
<div class="line"></div>

<div class="searchitem">
<div class="videothumb">
<a href="/video/<?php echo $response->items[1]->id->videoId;?>/<?php echo cano($response->items[1]->snippet->title);?>/" title="<?php echo $response->items[1]->snippet->title;?>"><img src="<?php echo $response->items[1]->snippet->thumbnails->default->url;?>" class="thumbnail" height="90" border="0">
<span class="overlay"></span></a>
</div>
<div class="searchframe">
<h2 class="title"><a href="/video/<?php echo $response->items[1]->id->videoId;?>/<?php echo cano($response->items[1]->snippet->title);?>/" title="<?php echo $response->items[1]->snippet->title;?>"><?php echo $response->items[1]->snippet->title;?></a></h2>
<p class="desc"><?php echo substr($response->items[1]->snippet->description,0,190); ?></p>
<div class="details"><i class="icon-calendar"></i> <?php echo substr($response->items[1]->snippet->publishedAt,0,10);?><span class="videosep"></span><i class="icon-clock"></i> <?php echo covtime($stats_response->items[1]->contentDetails->duration);?><span class="videosep"></span><i class="icon-eye"></i> <?php echo number_format($stats_response->items[1]->statistics->viewCount);?><span class="videosep"></span><i class="icon-desktop"></i> YouTube</div>
</div>
</div>
<div class="line"></div>

<div class="searchitem">
<div class="videothumb">
<a href="/video/<?php echo $response->items[2]->id->videoId;?>/<?php echo cano($response->items[2]->snippet->title);?>/" title="<?php echo $response->items[2]->snippet->title;?>"><img src="<?php echo $response->items[2]->snippet->thumbnails->default->url;?>" class="thumbnail" height="90" border="0">
<span class="overlay"></span></a>
</div>
<div class="searchframe">
<h2 class="title"><a href="/video/<?php echo $response->items[2]->id->videoId;?>/<?php echo cano($response->items[2]->snippet->title);?>/" title="<?php echo $response->items[2]->snippet->title;?>"><?php echo $response->items[2]->snippet->title;?></a></h2>
<p class="desc"><?php echo substr($response->items[2]->snippet->description,0,190); ?></p>
<div class="details"><i class="icon-calendar"></i> <?php echo substr($response->items[2]->snippet->publishedAt,0,10);?><span class="videosep"></span><i class="icon-clock"></i> <?php echo covtime($stats_response->items[2]->contentDetails->duration);?><span class="videosep"></span><i class="icon-eye"></i> <?php echo number_format($stats_response->items[2]->statistics->viewCount);?><span class="videosep"></span><i class="icon-desktop"></i> YouTube</div>
</div>
</div>
<div class="line"></div>

<div class="searchitem">
<div class="videothumb">
<a href="/video/<?php echo $response->items[3]->id->videoId;?>/<?php echo cano($response->items[3]->snippet->title);?>/" title="<?php echo $response->items[3]->snippet->title;?>"><img src="<?php echo $response->items[3]->snippet->thumbnails->default->url;?>" class="thumbnail" height="90" border="0">
<span class="overlay"></span></a>
</div>
<div class="searchframe">
<h2 class="title"><a href="/video/<?php echo $response->items[3]->id->videoId;?>/<?php echo cano($response->items[3]->snippet->title);?>/" title="<?php echo $response->items[3]->snippet->title;?>"><?php echo $response->items[3]->snippet->title;?></a></h2>
<p class="desc"><?php echo substr($response->items[3]->snippet->description,0,190); ?></p>
<div class="details"><i class="icon-calendar"></i> <?php echo substr($response->items[3]->snippet->publishedAt,0,10);?><span class="videosep"></span><i class="icon-clock"></i> <?php echo covtime($stats_response->items[3]->contentDetails->duration);?><span class="videosep"></span><i class="icon-eye"></i> <?php echo number_format($stats_response->items[3]->statistics->viewCount);?><span class="videosep"></span><i class="icon-desktop"></i> YouTube</div>
</div>
</div>
<div class="line"></div>

<div class="searchitem">
<div class="videothumb">
<a href="/video/<?php echo $response->items[4]->id->videoId;?>/<?php echo cano($response->items[4]->snippet->title);?>/" title="<?php echo $response->items[4]->snippet->title;?>"><img src="<?php echo $response->items[4]->snippet->thumbnails->default->url;?>" class="thumbnail" height="90" border="0">
<span class="overlay"></span></a>
</div>
<div class="searchframe">
<h2 class="title"><a href="/video/<?php echo $response->items[4]->id->videoId;?>/<?php echo cano($response->items[4]->snippet->title);?>/" title="<?php echo $response->items[4]->snippet->title;?>"><?php echo $response->items[4]->snippet->title;?></a></h2>
<p class="desc"><?php echo substr($response->items[4]->snippet->description,0,190); ?></p>
<div class="details"><i class="icon-calendar"></i> <?php echo substr($response->items[4]->snippet->publishedAt,0,10);?><span class="videosep"></span><i class="icon-clock"></i> <?php echo covtime($stats_response->items[4]->contentDetails->duration);?><span class="videosep"></span><i class="icon-eye"></i> <?php echo number_format($stats_response->items[4]->statistics->viewCount);?><span class="videosep"></span><i class="icon-desktop"></i> YouTube</div>
</div>
</div>
<div class="line"></div>