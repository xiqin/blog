<!Doctype html>
<html>
<head>
    <title>Search - 田西秦个人博客</title>
    <meta charset="utf-8">
    <meta name="keywords" content="田西秦，田西秦个人博客，phper " />
    <meta name="description" content="作为一个IT人员，给自己一个目标，一个舞台，去探索，去努力，去求知，去奋斗。【田西秦个人博客】" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/x.ico" media="screen" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link href="css/base.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!--导航部分-->
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html" title="我的个人主页">TXQ</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li role="presentation"><a href="index.html" title="主页">Home</a></li>
                <li role="presentation"><a href="article.html" title="学无止境">爱学习</a></li>
                <li role="presentation"><a href="mood.html" title="心情墙">爱生活</a></li>
                <li role="presentation"><a href="message.html" title="留言板">爱交流</a></li>
                <li role="presentation"><a href="download.html" title="资源共享与下载">爱分享</a></li>
                <li role="presentation"><a href="about.html" title="关于博主">About</a></li>
            </ul>
        </div>
    </div>
</nav></nav>

<!--    栅格布局，实现分布-->
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <ul class="search_ab">热门搜索：
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?key=php'; ?>">php</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?key=服务器'; ?>">服务器</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?key=apache'; ?>">apache</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?key=linux'; ?>">linux</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?key=mysql'; ?>">mysql</a></li>
            </ul>
            <form action="search.html" method="get">
                <div class="input-group">
                    <input type="text" name="key" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="搜索一下"/>
                    </span>
                </div>
            </form>
            <div class="search_con">
                <?php
                    require_once 'libs/class/Search.class.php';
                    $key = addslashes(trim($_GET['key']));
                    if(!isset($key) || empty($key)){
                        echo "哦豁，出错啦，因为当前访问方式，没查到数据...";
                    }else{
                        $search = new Search(10,$key);
                        $search -> doSelect();
                    }
                ?>
                <div id="page">
                    <?php $search -> outPage();?>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="search_no">
                <p>没有找到您需要的文章？</p>
                <a href="article.html">那就去这里看看吧&gt;&gt;</a>
            </div>
        </div>
    </div>
</div>


<!-- 返回顶部 -->
<button id="gotop" title="返回顶部"></button>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

