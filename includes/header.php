<header>
<div class="head">
<div class="logo">
<a href="/"><img src="/images/logo.png" alt="<? echo $site_title; ?>" border="0"></a>
</div>
<div class="search">
<form name="search" onSubmit="if(document.search.search.value==''){return false;}" method="get" action="/search.php">
<div class="input-group"> <input type="text" name="search" class="input-sm form-control input-s-sm" placeholder="<? echo $search_text; ?>">
<input type="hidden" name="change" value="1"> <button class="searchbut"><i class="icon-search"></i></button>  </div>
</form>
</div>
<a class="but-surprise" href="/surprise/"><? echo $surprise_text; ?></a>
</div>
</header>
