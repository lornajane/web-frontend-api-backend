<?php
// example taken from http://purecss.io/layouts/ (the blog example)
?>

<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Web Frontend</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
<link rel="stylesheet" href="css/layouts/blog.css">
</head>
<body>

<div id="layout" class="pure-g">
  <div class="sidebar pure-u-1 pure-u-md-1-4">
    <div class="header">
      <hgroup>
        <h1 class="brand-title">Web Frontend</h1>
        <h2 class="brand-tagline">Example frontend for an API backend</h2>
      </hgroup>

    </div>
  </div>

  <div class="content pure-u-1 pure-u-md-3-4">
    <div>

      <div class="posts">
        <h1 class="content-subhead">Upcoming Events</h1>

<?php // start looping ?>
<?php foreach($events['events'] as $event): ?>
  <section class="post">
    <header class="post-header">
    <h2 class="post-title"><?=$event['event_name']?></h2>
    <img class="post-avatar" alt="avatar" height="48" width="48" 
      src="http://www.gravatar.com/avatar/<?=md5($event['ID'])?>?d=identicon">
      <p class="post-meta">
        More details: <a class="post-author" 
          href="/showEvent/<?=$event['ID']?>">click here</a>
      </p>
    </header>
  </section>
<?php endforeach; //events ?>
<?php // end looping ?>
      </div>

      <div class="footer">
        <div class="pure-menu pure-menu-horizontal pure-menu-open">
          <ul>
            <li><a href="http://purecss.io/">From an example by Pure</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>






</body>
</html>

