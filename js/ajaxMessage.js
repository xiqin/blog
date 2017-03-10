function send(){
	//AJAX异步提交留言内容
	var send=document.getElementById('send');
	var msgcontent=document.getElementById('msgcontent');
	var checkCode=document.getElementById('checkCode');

	if(msgcontent.value!="" && checkCode.value!=""){
		
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  	request=new XMLHttpRequest();
		}else{// code for IE6, IE5
			request=new ActiveXObject("Microsoft.XMLHTTP");
		}

		// var request = new XMLHttpRequest();
		// var request = new ActiveXObject("Microsoft.XMLHTTP");
		request.open("POST","libs/ajaxGetMsg.php",true);
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send("msg="+msgcontent.value+"&checkCode="+checkCode.value);

		request.onreadystatechange=function(){
			if(request.readyState === 4){
				if(request.status===200){
				  if(request.responseText == 'errornull'){
				  	alert('留言内容不能为空');
					document.getElementById('codeimg').src = 'libs/class/Code.class.php?i='+Math.random();
				  }else if(request.responseText == 'error'){
				  	alert('验证码不正确');
					document.getElementById('codeimg').src = 'libs/class/Code.class.php?i='+Math.random();
				  }else{
					  var main=document.createElement('div');
					  main.id="main";
					  main.innerHTML=request.responseText;

					  //获取body(div)的第一个子节点，将返回的数据插入到第一个子节点之前
					  var first=document.getElementById("body").firstChild;
					  document.getElementById("body").insertBefore(main,first);
					  // document.getElementById("body").innerHTML=request.responseText;          //接收返回过来的值
					  msgcontent.value="";
					  checkCode.value="";
					  document.getElementById('codeimg').src = 'libs/class/Code.class.php?i='+Math.random();
				  }
				}else{
				  alert("发生错误:"+request.status);
				}
			}
		}
	}else if(msgcontent.value == ""){
		alert("留言内容不能为空");
	}else if(checkCode.value == ""){
		alert("验证码不能为空");
	}
}
