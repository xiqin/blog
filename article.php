<!Doctype html>
<html>
<head>
	<title>Article - 田西秦个人博客</title>
	<meta charset="utf-8">
	<meta name="keywords" content="田西秦，田西秦个人博客，phper " />
	<meta name="description" content="作为一个IT人员，给自己一个目标，一个舞台，去探索，去努力，去求知，去奋斗。【田西秦个人博客】" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/x.ico" media="screen" />
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
	<link href="css/base.css" rel="stylesheet">
	<link href="css/article.css" rel="stylesheet">
	
	<!--[if lt IE 9]>
	<script src="js/modernizr.js"></script>
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
					<li role="presentation" class="active"><a href="article.html" title="学无止境">爱学习</a></li>
					<li role="presentation"><a href="mood.html" title="心情墙">爱生活</a></li>
					<li role="presentation"><a href="message.html" title="留言板">爱交流</a></li>
					<li role="presentation"><a href="download.html" title="资源共享与下载">爱分享</a></li>
					<li role="presentation"><a href="about.html" title="关于博主">About</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<form action="search.html" method="get" class="sear">
		<div class="input-group">
			<input type="text" name="key" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="搜索一下"/>
                    </span>
		</div>
	</form>
	<!--标签部分	-->
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h1 class="t_nav">
					<span>学无止境</span>
					<a href="index.html" class="n1">Home</a>
					<a href="article.html" class="n2">Article</a>
				</h1>
			</div>
		</div>
	</div>

	<!--    栅格布局，实现分布-->
	<div class="container">
		<div class="row">


			<div class="col-md-1"></div>
			<div class="col-md-7">
				<!-- l_box f_l start -->
				<div class="l_box">
					<div class="topnews">
						<h2><b>文章</b><font color="#f69af2">article</font></h2>
						<!--显示数据 -->
						<?php
						require_once "libs/class/Page.class.php";
						$page = new Page(10);
						$page->doSelect();
						?>
						<div id="page">
							<?php $page->outPage(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<!-- r_box f_l start -->
				<div class="r_box">
					<h2><b>便签</b><font color="#f69af2">note</font><label><a href="javascript:void(0);" id="getLabel">换一批</a></label></h2>
					<div class="ajaxLabel"></div>
				</div>
				<!--r_box end -->
			</div>

		</div>
	</div>


	<!-- footer -->
	<?php require_once "footer.php";?>
	<!-- footer -->
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
//	window.onload=function(){
//	  document.getElementById('sorry').style.height = document.body.scrollHeight-180+"px";
//	}
var data ={"pa":"1"};
var url  = "ajaxGetMsg.php";
	$(document).ready(function(){
		postAjax();
		$("#getLabel").click(function(){
			if(data.pa>$("#total").val()){
				data.pa = 1;
			}
			postAjax();
		});
	});

	function postAjax(){
		$.post(url,data,function(res){
			$(".ajaxLabel").html(res);
		});
		data.pa++;
	}
	
</script>
