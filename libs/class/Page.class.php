<?php
	require_once("libs/mysqli_conn.php");				//加载外部数据库连接文件
 
	class Page extends Conn{
		private $page;                   //当前页码
		private $page_size;				 //每页显示数目
		private $page_count;			 //总的页数
		private $showPage;				 //显示页码的个数
		private $total;					 //查询总数
		private $sql;					 //定义查询语句
		private $url;					 //路径
		private $pageStr;				 //翻页字符串


		
		/**
		 * 构造方法
		 * @param [type] $page_size [description]
		 */
		function __construct($page_size){
			parent::__construct();					//声明父类构造函数	
			$this->page_size = $page_size;			//给page_size赋值
			$this->showPage = 5;				    //显示页码的个数
			$this->pageStr = '';
			// $this->url = $_SERVER['PHP_SELF'];
			$this->url = 'article.php';

			$this->pageNums();
		}

		/**
		 * 判断当前页面页码
		 * @return [type] [description]
		 */
		private function ifpage(){
			if(!empty($_GET['page'])){
				$this->page = $_GET['page'];
			}else{
				$this->page = 1;
			}
			return $this->page;
		}
		/**
		 * 查询总的结果数，计算总的页数
		 * @return [type] [description]
		 */
		private function pageNums(){
			$this->sql = "select * from article ";
			$result = $this->conn->query($this->sql) or die(mysqli_connect_error());
			$this->total = $result->num_rows;									   //统计结果总数
			$this->page_count = ceil($this->total / $this->page_size);             //计算总页数
		}

		//定义sql语句，执行查询操作
		function doSelect(){
			$this->ifpage();                    //调用ifpage()函数

			$this->sql .= "order by id desc limit ".(($this->page-1)*$this->page_size).",".$this->page_size;
			$result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
			if($result && $result->num_rows > 0){
				$img = array('01','02','03','04','05','06','07','08','09','10',
							 '11','12','13','14','15','16','17','18','19','20');      //图片名称存入数组

				while($res = $result -> fetch_assoc()){         	
                    $id = $res['id'];
                    $title = $res['title'];
                    $content = $res['content'];
            ?>
            		<div class="blogs">
		    			<figure><img src="images/<?php echo $img[rand(0,19)];?>.jpg"></figure>
		    			<ul>
		    			    <h3><a href="<?php echo $id;?>.html" title="阅读全文" target="_blank"><?php echo $title; ?></a></h3>
		    			    <div class="conte"><?php echo $content;?></div>
		    			    <p class="autor">
		    					<span class="lm f_l">个人博客</span>
		    				    <span class="dtime f_l"><?php echo substr($res['time'],0,10); ?></span>
		    				    <span class="viewnum f_r">浏览（<?php echo $res['read_num']; ?>）</span>
<!--		    				    <span class="pingl f_r">评论（--><?php //echo $res['comment_num']; ?><!--）</span>-->
		    			    </p>
		    			</ul>
    		    	</div>
    		<?php
    		    }
			}
		}

		//上一页和首页
		private function prevPage(){
			if($this->page > 1){
				$this->pageStr .= "<a href=".$this->url."?page=1>首页</a>";
				$this->pageStr .= "<a href=".$this->url."?page=".($this->page-1)."><上一页</a>";
			}else{
				$this->pageStr .= "<span class='hid'>首页</span>";
				$this->pageStr .= "<span class='hid'>上一页</span>";
			}
		}
		//页码的显示
		private function showPage(){
			$pageoffset = ($this->showPage - 1)/2;                     //页码偏移量
			$start = 1;												//显示开始页码
			$end = $this->page_count;								//显示结束页码

			if($this->page_count > $this->showPage){
				if($this->page > $pageoffset+1){
					$this->pageStr .= "...";
				}

				if($this->page > $pageoffset){
					$start = $this->page - $pageoffset;
					$end = $this->page_count > ($this->page+$pageoffset) ? ($this->page+$pageoffset) : $this->page_count;
				}else{
					$start = 1;
					$end = $this->page_count > $this->showPage ? $this->showPage : $this->page_count;
				}

				if($this->page + $pageoffset > $this->page_count){
					$start = $start - ($this->page + $pageoffset - $end);
				}
			}

			for($i = $start;$i <= $end;$i++){
				if($this->page == $i){
					$this->pageStr .= "<span class='nowpage'>{$i}</span>";
				}else{
					$this->pageStr .= "<a href=".$this->url."?page=".$i.">{$i}</a>";
				}
			}

			if($this->page_count > $this->showPage && $this->page_count > $this->page+$pageoffset){
				$this->pageStr .= "...";
			}
		}
		//下一页和尾页
		private function nextPage(){
			if($this->page < $this->page_count){
				$this->pageStr .= "<a href=".$this->url."?page=".($this->page+1).">下一页></a>";
				$this->pageStr .= "<a href=".$this->url."?page=".($this->page_count).">尾页</a>";
			}
			else{
				$this->pageStr .= "<span class='hid'>下一页</span>";
				$this->pageStr .= "<span class='hid'>尾页</span>";				
			}
			$this->pageStr .= " 共{$this->page_count}页，";
			$this->pageStr .= "<form action='{$this->url}' method='get'>";
			$this->pageStr .= "跳转至 <input type='text' size='1' name='page' /> ";
			$this->pageStr .= "<input type='submit' value='跳转' />";
			$this->pageStr .= "</form>";
			echo $this->pageStr;
		}

		//输出页码
		function outPage(){
			$this->prevPage();						//上翻页
			$this->showPage();						//页码
			$this->nextPage();						//下翻页
		}

		//析构函数，关闭连接
		function __destruct(){
			$this->conn -> close();
		}
	}


	