<!DOCTYPE html>
<html>
<head>
	<title>MsgBoard - 田西秦个人博客</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="田西秦，田西秦个人博客，phper " />
	<meta name="description" content="作为一个IT人员，给自己一个目标，一个舞台，去探索，去努力，去求知，去奋斗。【田西秦个人博客】" />
	<link rel="shortcut icon" type="image/x-icon" href="images/x.ico" media="screen" />
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
	<link href="css/base.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/message.css">
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
				<li role="presentation" ><a href="index.html" title="主页">Home</a></li>
				<li role="presentation"><a href="article.html" title="学无止境">爱学习</a></li>
				<li role="presentation"><a href="mood.html" title="心情墙">爱生活</a></li>
				<li role="presentation" class="active"><a href="message.html" title="留言板">爱交流</a></li>
				<li role="presentation"><a href="download.html" title="资源共享与下载">爱分享</a></li>
				<li role="presentation"><a href="about.html" title="关于博主">About</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<fieldset>
				<legend class="addmsg">添加留言</legend>
				<div id="msg_main">
					<!-- 多说评论框 start -->
					<div class="ds-thread" data-thread-key="message" data-title="留言板" data-url="http://www.erzone.cn/txq/message.html"></div>
					<!-- 多说评论框 end -->
					<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
					<script type="text/javascript">
						var duoshuoQuery = {short_name:"txqmsg"};
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
				</div>
			</fieldset>
		</div>
	</div>
</div>


<!-- 返回顶部 -->
	<button id="gotop" title="返回顶部"></button>

<!-- footer -->
<?php require_once "footer.php";?>
<!-- footer -->

</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
</html>
