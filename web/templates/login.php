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
<link rel="stylesheet" href="/css/layouts/blog.css">
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

                <section class="post">
                    <header class="post-header">
                        <h2 class="post-title">Log in </h2>
                    </header>
<form class="pure-form pure-form-stacked" method="post" action="/login">
    <fieldset>
        <label for="username">username</label>
        <input name="username" id="username" type="text" placeholder="username">

        <label for="password">password</label>
        <input name="password" id="password" type="password" placeholder="password">

        <button type="submit" class="pure-button pure-button-primary">Sign in</button>
    </fieldset>
</form>

                </section>
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



