/*轮播图*/
if(!window.slider) {
	var slider={};
}
		
slider.data= [
    {
"id":"slide-img-1", // 与slide-runner中的img标签id对应
"client":"坚持",
"desc":"自己选择的路就要坚持走下去，路上的艰辛，无需抱怨。" //这里修改描述
    },
    {
"id":"slide-img-2",
"client":"梦想",
"desc":"梦想很轻，却因此拥有飞向蓝天的力量。"
    },
    {
"id":"slide-img-3",
"client":"成长",
"desc":"随着年龄的增长，我们并不是失去了一些朋友，而是我们懂得了谁才是真正的朋友。"
    },
    {
"id":"slide-img-4",
"client":"生活",
"desc":"一台笔电，一杯咖啡，如此也是生活。"
    } 
];
/*轮播图*/

//返回顶部
$(window).scroll(function(){
    if ($(window).scrollTop()>500){
        $("#gotop").css('right', '5px');
        $("#gotop").css('transition','1s');
    }
    else
    {
        $("#gotop").css('right', '-155px');
    }
});

//当点击跳转链接后，回到页面顶部位置
$("#gotop").click(function(){
    $('body,html').animate({scrollTop:0},500);
    return false;
});

