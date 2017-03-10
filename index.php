<!Doctype html>
<html>
<head>
    <meta name="baidu-site-verification" content="5Rc0zQ9fiM"/>
    <title>田西秦个人博客</title>
    <meta charset="utf-8">
    <meta name="keywords" content="田西秦，田西秦个人博客，phper " />
    <meta name="description" content="作为一个IT人员，给自己一个目标，一个舞台，去探索，去努力，去求知，去奋斗。【田西秦个人博客】" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="images/x.ico" media="screen" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/base.css" rel="stylesheet">
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
                <li role="presentation" class="active"><a href="index.html" title="主页">Home</a></li>
                <li role="presentation"><a href="article.html" title="学无止境">爱学习</a></li>
                <li role="presentation"><a href="mood.html" title="心情墙">爱生活</a></li>
                <li role="presentation"><a href="message.html" title="留言板">爱交流</a></li>
                <li role="presentation"><a href="download.html" title="资源共享与下载">爱分享</a></li>
                <li role="presentation"><a href="about.html" title="关于博主">About</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--    栅格布局，实现分布-->
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <!-- l_box f_l start -->
            <div class="l_box">
                <!-- banner代码 开始 -->
                <div class="banner">
                    <div id="slide-holder">
                        <div id="slide-runner">
                            <img id="slide-img-1" src="images/a1.jpg"  alt="" />
                            <img id="slide-img-2" src="images/a2.jpg"  alt="" />
                            <img id="slide-img-3" src="images/a3.jpg"  alt="" />
                            <img id="slide-img-4" src="images/a4.jpg"  alt="" />
                            <div id="slide-controls">
                                <p id="slide-client" class="text"><strong></strong><span></span></p>
                                <p id="slide-desc" class="text"></p>
                                <p id="slide-nav"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- banner代码 结束 -->

                <div class="topnews">
                    <h2><b>文章</b>推荐</h2>
                    <?php
                    $basename = basename(__FILE__,'.php');
                    require_once 'libs/show.php';     //加载外部文件
                    while($res = $result -> fetch_assoc()){
                        $i = rand(0,25);
                        $id = $res['id'];
                        $title = $res['title'];
                        $content = $res['content'];
                        ?>
                        <div class="blogs">
                            <ul style="width:100%;">
                                <h3><a href="<?php echo $id;?>.html" title="阅读全文" target="_blank"><?php echo $title; ?></a></h3>
                                <div class="conte"><?php echo $content;?></div>
                                <p class="autor">
                                    <span class="lm f_l">个人博客</span>
                                    <span class="dtime f_l"><?php echo substr($res['time'],0,10); ?></span>
                                    <span class="viewnum f_r">浏览（<?php echo $res['read_num']; ?>）</span>
                                </p>
                            </ul>
                        </div>

                    <?php }?>
                </div>
            </div>
            <!-- l_box f_l end -->
        </div>
        <div class="col-md-3">
            <!-- r_box f_l start -->
            <div class="r_box">
                <div class="tit01">
                    <h3><a href="#weixin">关注我</a></h3>
                    <div class="connect">
                        <a target="_blank" href="http://sighttp.qq.com/authd?IDKEY=c8ddfcc53d792b6c61920de990d265be252ada3a420c5258"><img border="0"  src="http://wpa.qq.com/imgd?IDKEY=c8ddfcc53d792b6c61920de990d265be252ada3a420c5258&pic=51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                        <a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=5NPR0NPU0dDT0qSVlcqHi4k" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_02.png"/ height="22px" style="margin-bottom: 2px;"></a>
                    </div>
                </div>

                <!--tit01 end-->
                <div><?php require_once "calendar.php";?></div>

                <div class="moreSelect" id="lp_right_select">
                    <div class="ms-top">
                        <ul class="hd" id="tab">
                            <li class="cur">点击排行</a></li>
                            <li>最新文章</a></li>
                            <li>站长推荐</a></li>
                        </ul>
                    </div>
                    <div class="ms-main" id="ms-main">
                        <div style="display: block;" class="bd bd-news" >
                            <ul>
                                <?php
                                $resultList = $Show -> SelectList();
                                while($resList = $resultList -> fetch_assoc()){
                                    $idList = $resList['id'];
                                    ?>
                                    <li><a href="<?php echo $idList;?>.html" target="_blank"><?php echo $resList['title']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="bd bd-news">
                            <ul>
                                <?php
                                $resultNew = $Show -> SelectNew();
                                while($resNew = $resultNew -> fetch_assoc()){
                                    $idNew = $resNew['id'];
                                    ?>
                                    <li><a href="<?php echo $idNew;?>.html" target="_blank"><?php echo $resNew['title']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="bd bd-news">
                            <ul>
                                <?php
                                $resultRe = $Show -> SelectRecom();
                                while($resRe = $resultRe -> fetch_assoc()){
                                    $idRe = $resRe['id'];
                                    ?>
                                    <li><a href="<?php echo $idRe;?>.html" target="_blank"><?php echo $resRe['title']; ?></a></li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <!--ms-main end -->
                </div>
                <!--切换卡 moreSelect end -->

                <div class="cloud">
                    <h3>标签云</h3>
                    <ul>
                        <li><a href="">个人博客</a></li>
                        <li><a href="javascript:void(0)">web开发</a></li>
                        <li><a href="javascript:void(0)">PHP</a></li>
                        <li><a href="javascript:void(0)">ThinkPHP</a></li>
                        <li><a href="javascript:void(0)">前端设计</a></li>
                        <li><a href="javascript:void(0)">Html</a></li>
                        <li><a href="javascript:void(0)">CSS</a></li>
                        <li><a href="javascript:void(0)">JavaScript</a></li>
                        <li><a href="javascript:void(0)">Html5+CSS3</a></li>
                        <li><a href="javascript:void(0)">Jquery</a></li>
                    </ul>
                </div>

                <div class="links">
                    <h3>友情链接</h3>
                    <ul>
                        <li><a href="http://www.csdn.net" target="_blank">csdn</a></li>
                        <li><a href="https://guides.github.com" target="_blank">GitHub</a></li>
                        <li><a href="http://www.php100.com" target="_blank">php100</a></li>
                        <li><a href="http://www.w3school.com.cn" target="_blank">w3school</a></li>
                        <li><a href="http://www.baidu.com" target="_blank">百度</a></li>
                        <li><a href="http://www.imooc.com" target="_blank">慕课网</a></li>
                        <li><a href="http://www.duoshuo.com" target="_blank">多说</a></li>
                        <li><a href="http://www.iconfont.cn" target="_blank">阿里巴巴矢量图</a></li><br/>
                        <li><a href="http://www.jiazebin.com" target="_blank">JiaZombie's blog</a></li>
                    </ul>
                </div>

                <div class="links">
                    <h3 id="weixin">关注微信公众平台</h3>
                    <img src="images/vx.jpg" width="250" height="250" style="margin:0 auto;">
                </div>
                <div style="height: 100px;"></div>
            </div>
            <!--r_box end -->
        </div>
    </div>
</div>


<!-- 返回顶部 -->
<button id="gotop" title="返回顶部"></button>


<!-- footer -->
<?php require_once "footer.php";?>
<!-- footer -->
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/sliders.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script>
    window.onload = function (){
        var oLi = document.getElementById("tab").getElementsByTagName("li");
        var oUl = document.getElementById("ms-main").getElementsByTagName("div");

        for(var i = 0; i < oLi.length; i++)
        {
            oLi[i].index = i;
            oLi[i].onmouseover = function ()
            {
                for(var n = 0; n < oLi.length; n++) oLi[n].className="";
                this.className = "cur";
                for(var n = 0; n < oUl.length; n++) oUl[n].style.display = "none";
                oUl[this.index].style.display = "block"
            }
        }
    }
</script>
