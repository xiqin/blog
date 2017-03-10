window.onload = function () {
    //获取大盒子（box）元素
    var box = document.getElementById("box");
    //获取所有share_box元素
    var shareBox = document.getElementsByClassName("share_box");
    var num = shareBox.length;
    //获取share_box的高度
    var shareH = shareBox.offsetHeight;

    //加载页面是就将share_box折叠起来
    for(var i=0;i<num;i++){
        shareBox[i].style.marginTop = i*-5+4+"px";
    }

    //点击事件，切换share_box的展开和折叠状态。
    box.onclick = function(){
        if(box.getAttribute("class") == 1){                     //判断box的class状态
            box.setAttribute('class','2');                      //切换box的class状态
            for(var i=0;i<num;i++){
                shareBox[i].style.position = "relative";
                shareBox[i].style.transform = "rotateX(0deg) rotateZ(0deg)";
                shareBox[i].style.height = "auto";
                shareBox[i].style.transition = 1+"s";
                shareBox[i].style.marginTop = 0+"px";
            }
        }else{
            box.setAttribute('class','1');                      //切换box的class状态
            for(var i=0;i<num;i++){
                shareBox[i].style.position = "absolute";
                shareBox[i].style.transform = "rotateX(85deg) rotateZ(15deg)";
                shareBox[i].style.marginTop = i*-5+4+"px";
            }
        }
    }
}

$("#webPage").click(function(){
    $(".webPage").css("display","block");
    $(".code").css("display","none");
    $(".software").css("display","none");
})
$("#code").click(function(){
    $(".webPage").css("display","none");
    $(".code").css("display","block");
    $(".software").css("display","none");
})
$("#software").click(function(){
    $(".webPage").css("display","none");
    $(".code").css("display","none");
    $(".software").css("display","block");
})





