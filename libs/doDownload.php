<html>
<head>
    <meta charset="utf-8">
    <title>资源下载</title>
</head>
<body>
<?php
if(isset($_GET['d'])){
    $filename = basename($_GET['d']);           //文件名包含后缀
    $fileHz = strtolower(substr(strrchr($filename,"."),1));                                 //文件类型

    //设置允许下载的文件类型
    switch( $fileHz ) {
        case "pdf": $ctype="application/pdf"; break;
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "doc": $ctype="application/msword"; break;
        case "xls": $ctype="application/vnd.ms-excel"; break;
        case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
        case "gif": $ctype="image/gif"; break;
        case "png": $ctype="image/png"; break;
        case "jpeg":
        case "jpg": $ctype="image/jpg"; break;
        case "mp3": $ctype="audio/mpeg"; break;
        case "wav": $ctype="audio/x-wav"; break;
        case "mpeg":
        case "mpg":
        case "mpe": $ctype="video/mpeg"; break;
        case "mov": $ctype="video/quicktime"; break;
        case "avi": $ctype="video/x-msvideo"; break;

        case "php": $ctype="application/php"; break;
        case "html":$ctype="application/html"; break;
        case "js":  $ctype="application/js"; break;
        case "css": $ctype="application/css"; break;
        case "txt": $ctype="application/txt"; break;
        default:    $ctype="application/force-download";
    }

    //执行下载操作
    header("Content-type:$ctype");
    header("Content-Disposition:attachment;filename=".$filename);
    readfile($_GET['d']);
    exit;
}

?>
</body>
</html>
