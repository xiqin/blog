<?php
	session_start();

	class Code{
		private $image;			//画布句柄
		private $width;			//画布宽度
		private $height;		//画布高度
		private $code;			//验证码字符
		private $Pixel_Num;		//干扰点数量

		/**
		 * 构造函数，输出验证码图片
		 */
		public function __construct(){
			//初始化宽度和高度
			$this->width = 100;
			$this->height = 30;
			//初始化干扰点数量
			$this->Pixel_Num = $this->width*$this->height/10;

			//调用函数,输出验证码
			$this->outputImg();
		}

		/**
		 * 输出图像
		 * @return [type] [description]
		 */
		private function outputImg(){

			//调用内部各函数
			$this->createImg();
			$this->createCode();
			$this->inputDistrub();

			if(imagetypes() & IMG_PNG){
				header("Content-type:image/png");
				imagegif($this->image);
			}elseif(imagetypes() & IMG_JPG){
				header("Content-type:image/jpeg");
				imagejpeg($this->image, "",0.5);;
			}elseif(imagetypes() & IMG_GIF){
				header("Content-type:image/gif");
				imagepng($this->image);
			}elseif(imagetypes() & IMG_WBMP){
				header("Content-type:image/vnd.wap.wbmp");
				imagewbmp($this->image);
			}else{
				die("PHP不支持图像创建！");
			}
		}

		/**
		 * 定义画布
		 * @return [type] [description]
		 */
		private function createImg(){
			$this->image = imagecreatetruecolor($this->width, $this->height);
			$backcolor = imagecolorallocate($this->image, 255, 255, 255);		//背景颜色
			$bordercolor = imagecolorallocate($this->image, 0, 0, 0);			//边框颜色

			imagefill($this->image, 0, 0, $backcolor);
			imagerectangle($this->image, 0, 0, $this->width-1, $this->height-1, $bordercolor);
		}
		
		/**
		 * 生成验证码字符
		 * @return [type] [description]
		 */
		private function createCode(){
			$this->code = '3456789abcdeghjkmnpqrstuvwxyABCDEFGHJKMNPQRSTUVWXY';
			$strcode='';

			for($i=0;$i<4;$i++){
				$color = imagecolorallocate($this->image, rand(0,120), rand(0,120), rand(0,120));
				$fontsize = 6;
				$fontcontent = $this->code{rand(0,strlen($this->code)-1)};		//随机获取一个字符
				$x = ($i*100/4)+rand(5,10);			
				$y = rand(0,10);
				$strcode.=$fontcontent;
			
				imagestring($this->image, $fontsize, $x, $y, $fontcontent, $color);
			}

			$_SESSION['code'] = strtolower($strcode);				//将验证码存储到服务器
		}

		/**
		 * 干扰元素
		 * @return [type] [description]
		 */
		private function inputDistrub(){
			//干扰点
			for($i=0;$i<$this->Pixel_Num;$i++){
				$color = imagecolorallocate($this->image, rand(130,200), rand(130,200), rand(130,200));  //随机颜色
				imagesetpixel($this->image, rand(1,$this->width-2), rand(1,$this->height-2), $color);
			}
			//干扰线条
			for($i=0;$i<3;$i++){
				$color = imagecolorallocate($this->image, rand(130,200), rand(130,200), rand(130,200));  //随机颜色
				imagearc($this->image, rand(-10,$this->width), rand(-10,$this->height), rand(30,150), rand(10,80), rand(40,80), rand(40,80), $color);
			}
		}
		

		/**
		 * 析构函数，销毁资源
		 */
		private function __destruct(){
			imagedestroy($this->image);
		}
	}

	echo new Code();


