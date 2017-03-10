<?php
/**
 * 数据查询信息的相关配置
 * @var unknown
 */
    require_once 'class/Show.class.php';

	$Show = new Show();

	$term = "*";

    //当前文件为首页时，执行下面语句
	if($basename == 'index'){
        $dbname = "article";
        $where = " where is_recommend = 1 order by read_num desc";
    	$result = $Show -> Select($term, $dbname,$where);
	}else{                                             //当前文件不为首页时，执行下面语句
		switch ($basename) {
    	case 'article':
    		$dbname = "article";
            $where = " order by id desc";
    		break;
    	case 'mood':
    		$dbname = "mood";
            $where = " order by id desc";
    		break;
    	case 'label':
    		$dbname = "label";
            $where = " order by id desc";
    		break;
		case 'download':
			$dbname = "share";
			if ($classname == 'webPage'){$where = " where c = '网页样式' order by id desc";}
			else if ($classname == 'code'){$where = " where c = '源码下载' order by id desc";}
			else if ($classname == 'software'){$where = " where c = '软件下载' order by id desc";}
			break;
    	}
    	$result = $Show -> Select($term, $dbname,$where);
	}
    


