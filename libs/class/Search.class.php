<?php
require_once("libs/mysqli_conn.php");				//加载外部数据库连接文件

class Search extends Conn{
    private $page;                   //当前页码
    private $page_size;				 //每页显示数目
    private $page_count;			 //总的页数
    private $showPage;				 //显示页码的个数
    private $total;					 //查询总数
    private $sql;					 //定义查询语句
    private $url;					 //路径
    private $pageStr;				 //翻页字符串
    private $keywords;               //搜索查询的关键字



    /**
     * 构造方法
     * @param [type] $page_size [description]
     * $keyword      查询关键字
     */
    function __construct($page_size,$keywords){
        parent::__construct();					//声明父类构造函数
        $this->page_size = intval($page_size);			//给page_size赋值
        $this->showPage = 5;				    //显示页码的个数
        $this->pageStr = '';
        $this->url = $_SERVER['PHP_SELF'];
        $this->keywords = $keywords;

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
        $this->sql = "select * from article where (title like '%$this->keywords%') ";
        $result = $this->conn->query($this->sql) or die(mysqli_connect_error());
        $this->total = $result->num_rows;									   //统计结果总数
        $this->page_count = ceil($this->total / $this->page_size);             //计算总页数
    }

    //定义sql语句，执行查询操作
    function doSelect(){
        $this->ifpage();                    //调用ifpage()函数
        $this->sql .= "limit ".(($this->page-1)*$this->page_size).",".$this->page_size;
        $result = $this->conn -> query($this->sql) or die(mysqli_connect_error());

        //定义关键字样式，替换字符串中的关键字
        $keyword = "<font color='red'>".$this->keywords."</font>";

        echo '<div class="search_retit">为您搜索到<label>'.$this->keywords.'</label>相关结果共'.$this->total.'个</div>';
        if($result && $result->num_rows > 0){
            while($res = $result -> fetch_assoc()){
                $id = $res['id'];
                $title = $res['title'];
                $content = $res['content'];
                ?>
                <div class="search_res">
                    <ul>
                        <li>
                            <label class="search_tit"><a href="<?php echo $id?>.html" target="_blank"><?php echo str_ireplace($this->keywords,$keyword,$title);?></a></label>
                            <p>
                                <?php //echo str_ireplace($this->keywords,$keyword,trim($content))."...";?>
                            </p>
                            <p>
                                <a href="http://txq.erzone.cn/<?php echo $id?>.html" target="_blank">http://txq.erzone.cn/<?php echo $id?>.html</a>
                                <label class="mm"><?php echo $res['time']?>&nbsp;&nbsp;【田西秦的个人博客】</label>
                            </p>
                        </li>
                    </ul>
                </div>
                <?php
            }
        }else{
            echo '<div class="search_res">暂无相关内容...</div>';
        }
    }

    //上一页和首页
    private function prevPage(){
        if($this->page > 1){
            $this->pageStr .= "<a href=".$this->url."?page=1&key=".$this->keywords.">首页</a>";
            $this->pageStr .= "<a href=".$this->url."?page=".($this->page-1)."&key=".$this->keywords."><上一页</a>";
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
                $this->pageStr .= "<a href=".$this->url."?page=".$i."&key=".$this->keywords.">{$i}</a>";
            }
        }

        if($this->page_count > $this->showPage && $this->page_count > $this->page+$pageoffset){
            $this->pageStr .= "...";
        }
    }
    //下一页和尾页
    private function nextPage(){
        if($this->page < $this->page_count){
            $this->pageStr .= "<a href=".$this->url."?page=".($this->page+1)."&key=".$this->keywords.">下一页></a>";
            $this->pageStr .= "<a href=".$this->url."?page=".($this->page_count)."&key=".$this->keywords.">尾页</a>";
        }
        else{
            $this->pageStr .= "<span class='hid'>下一页</span>";
            $this->pageStr .= "<span class='hid'>尾页</span>";
        }
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
