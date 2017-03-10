<!Doctype html>
<html>
<head>
    <title>Download - 田西秦个人博客</title>
    <meta charset="utf-8">
    <meta name="keywords" content="田西秦 | 田西秦个人博客 | phper " />
    <meta name="description" content="作为一个IT人员，给自己一个目标，一个舞台，去探索，去努力，去求知，去奋斗。【田西秦个人博客】" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/x.ico" media="screen" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/download.css">
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
                <li role="presentation"><a href="index.html" title="主页" class="current">Home</a></li>
                <li role="presentation"><a href="article.html" title="学无止境">爱学习</a></li>
                <li role="presentation"><a href="mood.html" title="心情墙">爱生活</a></li>
                <li role="presentation"><a href="message.html" title="留言板">爱交流</a></li>
                <li role="presentation" class="active"><a href="download.html" title="资源共享与下载">爱分享</a></li>
                <li role="presentation"><a href="about.html" title="关于博主">About</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul>
                <li><button type="button" id="webPage" class="btn btn-default btn-lg btn-block">网页样式</button></li>
                <li><button type="button" id="code" class="btn btn-default btn-lg btn-block">源码下载</button></li>
                <li><button type="button" id="software" class="btn btn-default btn-lg btn-block">软件下载</button></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div id="box" class="1" title="点击可展开折叠">
                <?php
                    $basename = basename(__FILE__,'.php');
                ?>
                <div class="webPage">
                <?php
                    $classname = "webPage";
                    require 'libs/show.php';     //加载外部文件
                    if(!empty($result)) {
                        while ($res = $result->fetch_assoc()) {
                ?>
                            <div class="share_box">
                                <div class="share_content">
                                    <p><?php echo $res['content']?></p>
                                </div>
                                <div class="share_bottom">
                                    <img src="images/05.jpg"><span><?php echo $res['author']?></span>
                                    <label><?php echo $res['time']?></label>
                                    <?php
                                    $href = "";
                                    if(strpos($res['ahref'],'www.erzone.cn/')){
                                        $href = "http://www.erzone.cn/txq/libs/doDownload.php?d=".$res['ahref'];
                                    }else{
                                        $href = $res['ahref'];
                                    }
                                    ?>
                                    <div class="share_bottom_down"><a href="<?php echo $href;?>" target="_blank">下载链接</a></div>
                                </div>
                            </div>
                <?php
                        }
                    }else{echo "<div>抱歉，暂时没有相关资源</div>";}
                ?>
                </div>


                <div class="code">
                    <?php
                    $classname = "code";
                    require 'libs/show.php';     //加载外部文件
                    if(!empty($result)) {
                        while ($res = $result->fetch_assoc()) {
                            ?>
                            <div class="share_box">
                                <div class="share_content">
                                    <p><?php echo $res['content']?></p>
                                </div>
                                <div class="share_bottom">
                                    <img src="images/05.jpg"><span><?php echo $res['author']?></span>
                                    <label><?php echo $res['time']?></label>
                                    <?php
                                    $href = "";
                                    if(strpos($res['ahref'],'www.erzone.cn/')){
                                        $href = "http://www.erzone.cn/txq/libs/doDownload.php?d=".$res['ahref'];
                                    }else{
                                        $href = $res['ahref'];
                                    }
                                    ?>
                                    <div class="share_bottom_down"><a href="<?php echo $href;?>" target="_blank">下载链接</a></div>
                                </div>
                            </div>
                            <?php
                        }
                    }else{echo "<div>抱歉，暂时没有相关资源</div>";}
                    ?>
                </div>

                <div class="software">
                    <?php
                    $classname = "software";
                    require 'libs/show.php';     //加载外部文件
                    if(!empty($result)) {
                        while ($res = $result->fetch_assoc()) {
                            ?>
                            <div class="share_box">
                                <div class="share_content">
                                    <p><?php echo $res['content']?></p>
                                </div>
                                <div class="share_bottom">
                                    <img src="images/05.jpg"><span><?php echo $res['author']?></span>
                                    <label><?php echo $res['time']?></label>
                                    <?php
                                        $href = "";
                                        if(strpos($res['ahref'],'www.erzone.cn/')){
                                            $href = "http://www.erzone.cn/txq/libs/doDownload.php?d=".$res['ahref'];
                                        }else{
                                            $href = $res['ahref'];
                                        }
                                    ?>
                                    <div class="share_bottom_down"><a href="<?php echo $href;?>" target="_blank">下载链接</a></div>
                                </div>
                            </div>
                            <?php
                        }
                    }else{echo "<div>抱歉，暂时没有相关资源</div>";}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- 返回顶部 -->
<button id="gotop" title="返回顶部"></button>

</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/download.js"></script>
           
