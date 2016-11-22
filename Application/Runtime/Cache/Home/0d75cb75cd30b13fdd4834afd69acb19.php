<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/css/lib/pure.css">
    <link rel="stylesheet" href="/Public/css/lib/grids-responsive.css">

    <link rel="stylesheet" href="/Public/css/lib/global.css">
    <link rel="stylesheet" href="/Public/css/index.css">
    <title>Fixedbug</title>
</head>
<body>
<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
    <div class="">

    </div>
    <div class="header">
        <h1 class="brand-title">Fixed bug</h1>
        <h2 class="brand-tagline"></h2>

        <nav class="nav">
            <ul class="nav-list">
            <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><li class="nav-item">
                    <a class="pure-button" href="/index.php/Home/c/<?php echo ($category["id"]); ?>"><?php echo ($category["name"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            <!--<h3>前端</h3>-->
            <!--<ul class="nav-list">-->
                <!--<li class="nav-item">-->
                    <!--<a class="pure-button" href="http://purecss.io">javascript</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                    <!--<a class="pure-button" href="http://yuilibrary.com">html</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                    <!--<a class="pure-button" href="http://yuilibrary.com">css</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                    <!--<a class="pure-button" href="http://yuilibrary.com">html</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                    <!--<a class="pure-button" href="http://yuilibrary.com">html</a>-->
                <!--</li>-->
            <!--</ul>-->
        </nav>
    </div>
</div>
    <div class="content pure-u-1 pure-u-md-3-4">
        <!--post content-->
        <div class="posts">
            <h1 class="content-subhead">Pinned Post</h1>

            <!-- A single blog post -->
            <article class="post">
                <header class="post-header">
                    <img class="post-avatar" alt="Tilo Mitra&#x27;s avatar" height="48" width="48"
                         src="/Uploads/<?php echo ($article["face"]); ?>">

                    <h2 class="post-title"><?php echo ($article["title"]); ?></h2>

                    <p class="post-meta">
                        By <span class="post-author"><?php echo ($article["nickname"]); ?></span> under <a
                            class="post-category post-category-design" href="/index.php/Home/c/<?php echo ($article["category_id"]); ?>"><?php echo ($article["category_name"]); ?></a>
                    </p>
                </header>

                <div class="post-description">
                <?php echo ($article["content"]); ?>
                </div>
            </article>
        </div>
        <div class="footer">
    <div class="pure-menu pure-menu-horizontal">
        <ul>
            <li class="pure-menu-item"><a href="http://purecss.io/" class="pure-menu-link">About</a></li>
            <li class="pure-menu-item"><a href="http://twitter.com/yuilibrary/" class="pure-menu-link">Twitter</a></li>
            <li class="pure-menu-item"><a href="http://github.com/yahoo/pure/" class="pure-menu-link">GitHub</a></li>
        </ul>
    </div>
</div>
    </div>
</div>
</body>
</html>