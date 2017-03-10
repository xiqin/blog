<!DOCTYPE html>
<html>
<head>
  <title>Mood - 田西秦个人博客</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="田西秦，田西秦个人博客，phper " />
    <meta name="description" content="作为一个IT人员，给自己一个目标，一个舞台，去探索，去努力，去求知，去奋斗。【田西秦个人博客】" />
  <link rel="shortcut icon" type="image/x-icon" href="images/x.ico" media="screen" />
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
  <link href="css/base.css" rel="stylesheet">
  <link href="css/mood.css" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="js/modernizr.js"></script>
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
                    <li role="presentation" class="active"><a href="mood.html" title="心情墙">爱生活</a></li>
                    <li role="presentation"><a href="message.html" title="留言板">爱交流</a></li>
                    <li role="presentation"><a href="download.html" title="资源共享与下载">爱分享</a></li>
                    <li role="presentation"><a href="about.html" title="关于博主">About</a></li>
                </ul>
            </div>
        </div>
    </nav>



<!-- moodlist -->
    <div class="container" >
        <div class="row">
            <!--标签部分	-->
            <h1 class="t_nav">
                <span>微笑面对</span>
                <a href="index.html" class="n1">Home</a>
                <a href="mood.html" class="n2">Mood</a>
            </h1>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="moodlist" >
                    <div class="bloglist">
                        <?php
                        $img = array('01','02','03','04','05','06','07','08','09','10',
                            '11','12','13','14','15','16','17','18','19','20');      //图片名称存入数组
                        $basename = basename(__FILE__,'.php');
                        require_once 'libs/show.php';     //加载外部文件
                        if(!empty($result)){
                            while($res = $result -> fetch_assoc()){
                                $i = rand(0,25);
                                $id = $res['id'];
                                $content = $res['content'];
                                ?>
                                <ul class="arrow_box">
                                    <?php
                                    if($i >= 0 && $i <= 19){
                                        echo '<figure><img src="images/'.$img[$i].'.jpg"></figure>';
                                        ?>
                                        <div class="sy">
                                            <p><?php echo $content;?></p>
                                        </div>
                                    <?php }else{?>
                                        <div class="sy">
                                            <p><?php echo $content;?></p>
                                        </div>
                                    <?php } ?>
                                    <span  id="dateview" onmousemove="mouin(<?php echo $id;?>)" onmouseout="mouout(<?php echo $id;?>)">
                                            <div id="tim<?php echo $id;?>"><?php echo $res['time'];?></div>
                                    </span>
                                </ul>
                            <?php }}else{echo "<div id='sorry'>抱歉，暂时没有数据</div>";} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- moodlist -->

<!-- 返回顶部 -->
  <button id="gotop" title="返回顶部"></button>

    <!-- footer -->
    <?php require_once "footer.php";?>
    <!-- footer -->
</body>
</html>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    window.onload=function(){
        document.getElementById('sorry').style.height = document.body.scrollHeight-180+"px";
    }
    function mouin(i){
        document.getElementById('tim'+i).style.display = "block";
        document.getElementById('tim'+i).style.opacity = 1;
    }
    function mouout(i){
        document.getElementById('tim'+i).style.display = "none";
    }
</script>

