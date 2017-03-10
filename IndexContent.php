<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="田西秦，田西秦个人博客，phper " />
    <meta name="description" content="作为一个IT人员，给自己一个目标，一个舞台，去探索，去努力，去求知，去奋斗。【田西秦个人博客】" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="images/x.ico" media="screen" />
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
  <link href="./css/base.css" rel="stylesheet">
  <link href="./css/content.css" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="/skin/2014/js/modernizr.js"></script>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

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
</nav>

<!-- article -->
    <?php 
      require_once "libs/class/Show.class.php";
      $ShowContent = new Show();
      if(isset($_GET['ID'])){
        $res = $ShowContent->SelectContent($_GET['ID']);   //查询当前数据
        $ShowContent->AddReadNum($_GET['ID']);             //阅读量增加
      }else{echo "非法访问！";}
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1 class="t_nav">
                <a href="javascript:void(0)" class="n1">当前位置：</a>
                <a href="javascript:void(0)" class="n4"><?php echo $res['title'];?></a>
                <input type="hidden" id="hid" value="<?php echo $res['title'];?>">
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <div class="index_about">
                <h2 class="c_titile"><?php echo $res['title'];?></h2>
                <p class="box_c">
                    <span class="d_time">发布时间：<?php echo $res['time'];?></span>
                    <span>编辑：<?php echo $res['author'];?></span>
                    <span>阅读（<?php echo $res['read_num'];?>）</span>
                </p>
                <div class="box_content">
                    <?php echo $res['content'];?>

                    <div><?php require_once "share.php"; ?></div>

                    <!-- 上下篇 -->
                    <?php $ShowContent->Prev_Next($_GET['ID']); ?>
                    <!-- 上下篇 -->
                </div>

                <!--   文章评论-->
                <fieldset class="articleDis">
                    <legend>文章评论</legend>
                    <!-- 多说评论框 start -->
                    <div class="ds-thread" data-thread-key="<?php echo $_GET['ID'];?>" data-title="<?php echo $res['title'];?>" data-url="http://www.erzone.cn/txq/article<?php echo $_GET['ID'];?>"></div>
                    <!-- 多说评论框 end -->

                    <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
                    <script type="text/javascript">
                        var duoshuoQuery = {short_name:"txq"};
                        (function() {
                            var ds = document.createElement('script');
                            ds.type = 'text/javascript';ds.async = true;
                            ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                            ds.charset = 'UTF-8';
                            (document.getElementsByTagName('head')[0]
                            || document.getElementsByTagName('body')[0]).appendChild(ds);
                        })();
                    </script>
                    <!-- 多说公共JS代码 end -->
                </fieldset>

            </div>
        </div>


        <div class="col-md-3">
            <div class="ad">
                <form action="search.html" method="get">
                    <div class="input-group">
                        <input type="text" name="key" class="form-control" placeholder="文章查找...">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="GO"/>
                    </span>
                    </div>
                </form>

                <div class="keywords">关键字：
                    <?php
                    //对关键字进行按" "分割
                    $keyword = strtok($res['keywords']," ");
                    while($keyword !== false){
                        echo "<label>{$keyword}</label>";
                        $keyword = strtok(" ");
                    }
                    ?>
                </div>

                <fieldset>
                    <legend><label>点击</label><span>排行</span></legend>
                    <div class="ms-main" id="ms-main" style="margin-top: -20px;">
                        <div style="display: block;" class="bd bd-news" >
                            <ul>
                                <?php
                                $resultList = $ShowContent -> SelectList();
                                while($resList = $resultList -> fetch_assoc()){
                                    $idList = $resList['id'];
                                    ?>
                                    <li><a href="<?php echo $idList;?>.html"><?php echo $resList['title']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </fieldset>
                <div class="friend_main">
                    最近访客
                    <div class="friend"><ul class="ds-recent-visitors" data-num-items="20"></ul></div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- article -->


<!-- 返回顶部 -->
  <button id="gotop" title="返回顶部"></button>

<!-- footer -->
<?php require_once "footer.php";?>
<!-- footer -->
</body>
</html>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
  window.onload=function(){
    document.title="田西秦个人博客 - "+document.getElementById('hid').value;
  }
</script>
