<?php
     header("content-type:text/html;charset=utf-8");
/*   print_r($_POST);//Array ( [MAX_FILE_SIZE] => 18000000 [sub] => 确认上传 )
     print_r($_FILES);/* Array ( [img] =>
                                 Array ( [name] =>
                                         Array ( [0] => 1.jpg [1] => 2.jpg [2] => 3.jpg ) [type] =>
                                          Array ( [0] => image/jpeg [1] => image/jpeg [2] => image/jpeg )
                                          [tmp_name] =>
                                          Array ( [0] => C:\Windows\Temp\phpCA91.tmp [1] => C:\Windows\Temp\phpCA92.tmp [2] => C:\Windows\Temp\phpCAA3.tmp )
                                          [error] => Array ( [0] => 0 [1] => 0 [2] => 0 ) [size] => Array ( [0] => 74973 [1] => 44252 [2] => 41608 ) ) )*/
    //1.判断是否通过提交按钮提交
    if (!isset($_POST['sub'])) {
        exit("<h1>请用提交按钮上传文件</h1>");
    }

    //2.判断是否有文件上传
    $file = $_FILES['img'];
    $name = $file['name'];
    $tmp_name = $file['tmp_name'];
    $error = $file['error'];
    $str = implode("", $name);
    if ($str == "") {
        exit("<h1>请选择上传文件</h1>");
    }
    //3.上传的文件夹是否存在
    $dir = "./uppppppp";
    if (!is_dir($dir)) {
        mkdir($dir);
    }
    //4.判断文件的类型是否符合
    $types = array("jpg","jpeg","gif","bmp","png");
       //用FOR循环进行遍历
    for ($i = 0;$i < count($name);$i++) {
        //判断文件是否符合
     if ($name[$i] != "") {
         $type = strtolower(end(explode(".", $name[$i])));
         if (!in_array($type, $types)) {
             echo "第".($i + 1)."个文件类型不符合.<br/>";
             continue;
         }
     }
    //6.判断错误类型
    switch ($error[$i]) {
        case 1:
            $err = "第".($i + 1)."个上传文件的大小超出服务器设置的最大限制";
        break;
         case 2:
            $err = "第".($i + 1)."个上传文件的大小超出隐藏域设置的最大限制";
        break;
         case 3:
            $err = "第".($i + 1)."个文件部分上传";
        break;
         case 4:
            $err = "第".($i + 1)."个没有文件上传";
        break;
         case 5:
            $err = "第".($i + 1)."个文件找不到临时文件夹";
        break;
         case 6:
            $err = "第".($i + 1)."个文件写入临时文件夹出错";
        break;
            }
        if ($error[$i] != 0) {
            echo $err."<br/>";
            continue;
        }
        //7.判断临时文件夹是否存在
         if (!is_uploaded_file($tmp_name[$i])) {
             echo "第".($i + 1)."个临时文件不存在.<br/>";
             continue;
         }
        $path = $dir."/".time()."_".rand(1, 10000).".".$type;
        //8.判断文件是否上传成功
        if (move_uploaded_file($tmp_name[$i], $path)) {
            //它将上传的文件上传到指定的位置
echo "第".($i + 1)."个文件上传成功.<br/>";
            continue;
        } else {
            echo "第".($i + 1)."个文件上传失败.<br/>";
            continue;
        }
    }
//  * PHP获取路径或目录实现
//  * @link http://www.phpddt.com
//  */
//  
// //魔术变量，获取当前文件的绝对路径
// echo "__FILE__:  ========>  ".__FILE__;
// echo '<br/>';
//  
// //魔术变量，获取当前脚本的目录
// echo "__DIR__:  ========>  ".__DIR__;
// echo '<br/>';
//  
// //dirname返回路径的目录部分,dirname(__FILE__)相当于__DIR__
// echo "dirname(__FILE__):  ========>  ".dirname(__FILE__);
// echo '<br/>';
//  
// //$_SERVER['PHP_SELF']和$_SERVER['SCRIPT_NAME']的结果一般相同，他们都是获取当前脚本的文件名
// //只有当php以cgi方式运行时有区别，但是现在几乎找不到以cgi方式运行php了
// echo '$_SERVER["PHP_SELF"]:  ========>  '.$_SERVER['PHP_SELF'];
// echo '<br/>';
//  
// echo '$_SERVER["SCRIPT_NAME"]:  ========>  '.$_SERVER['SCRIPT_NAME'];
// echo '<br/>';
//  
// //当前执行脚本的绝对路径。记住，在CLI方式运行php是获取不到的
// echo '$_SERVER["SCRIPT_FILENAME"]:  ========>  '.$_SERVER['SCRIPT_FILENAME'];
// echo '<br/>';
//  
// //当前运行脚本所在的文档根目录。在服务器配置文件中定义。
// echo '$_SERVER["DOCUMENT_ROOT"]:  ========>  '.$_SERVER['DOCUMENT_ROOT'];
// echo '<br>';
//  

