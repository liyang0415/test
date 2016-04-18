<?php
$arr = explode("\n", file_get_contents("1.txt"));
$arr = $arr?$arr:array();
$y = '';
foreach ($arr as $key => $value) {
    $a = $b = '';
    if ($key % 2 == 0) {
        $a = $value;
    } else {
        $b = '名字';
    }
    $y[] = $b.$a;
}
 echo implode('', $y);
 file_put_contents("2.txt", $y);
  echo  '<hr />';
 print_r($_SERVER['SCRIPT_FILENAME']);
 echo  '<hr />';
 echo date('D');


 echo  '<hr />';
 function getalphnum($char)
 {
     $sum = '';
     $array = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
     $len = strlen($char);
     for ($i = 0;$i < $len;$i++) {
         $index = array_search($char[$i], $array);
         $sum += ($index + 1) * pow(26, $len - $i - 1);
     }
     return $sum;
 }

 //sleep(2);
echo getalphnum('a');


echo "<hr />";

 $str = "this is a test";
 echo    substr_count($str, 'is') .'<br>';
 echo substr_count($str, 'is', 3) .'<br>';
 echo substr_count($str, 'is', 3, 3) .'<br>';

echo "<hr />";

echo getenv("REMOTE_ADDR");
echo "<hr />";
error_reporting(0);
echo "<hr />";
echo rand(1, 10000);echo "<hr />";
$arr = range(0, 56);
print_r(array_rand($arr, 11));
echo "<hr />";
//四舍五入
echo round(5 / 3);
echo "<hr />";
//先下取整
echo floor(5 / 3);
echo "<hr />";
// 先上取整
echo ceil(5 / 3);
echo "<hr />";







?>

<hr />
<table>
<name>African Coffee Table</name>
<width>80</width>
<length>120</length>
</table>
<ul>
	<li onclick='myrefresh()'><h3><font color='red'>杀无赦(点击刷新页面)</font></h3></li>
	<li onclick='ser()' target="_blank"><h3><font color='red'>百度</font></h3></li>
	<li onclick='window.print()' target="_blank"><h3><font color='red'>打印</font></h3></li>
</ul>
<hr />
<script type="text/javascript">
//<![CDATA[
    document.write("Hello World!");
    document.write(document.body.scrollTop);
    document.write('<br>');
    document.write(Math.random());

    document.write('<br>');
    // document.domain='66nao.com';
	document.write(location.host);
//]]>
///刷新页面函数
function myrefresh(){
	window.location.reload();
	alert(document.domain);
}
function ser(){
	// parent.location.href=('http://www.baidu.com');
	// top.location.href=('http://www.baidu.com');
	window.location.href=('http://www.baidu.com');
}
</script>
<div>
<iframe id="ifrAssess" style="width:100%;margin:0;padding:0;height: 600px;overflow: hidden;" src="http://<?=Domain('a.66nao.com')?>/static/assess/c/html/basic_set.html?first=1"></iframe>
	</div>

<!--
<style type="text/css">.onecentertext-align:center;width:200px;height:50px;}#sebackground-color:#006699 ;padding:20px;color:#FFF;}</style><table border='1'cellspacing="0" cellpadding="20" > <tr> <td class='onecenter'>1</td> <td class='onecenter' style='border-left:0px;border-right:0px;'  >2</td> <td class='onecenter'>3</td> </tr> <tr> <td class='onecenter'>a</td> <td class='onecenter' style='border:0px'> b</td> <td class='onecenter' > c</td> </tr > <tr id='se'> <td class='onecenter' >中国</td> <td class='onecenter' >我</td> <td class='onecenter' >爱你</td> </tr> </table>

</
// <?php
// 				if($vo=="副教授") {
//                     $query = $this->DB->run_sql("SELECT * FROM z_user where schoolid='$school_message[id]' AND `user_bh`=1 AND `zc`='副教授' order by com desc LIMIT $offset, $num ");
//                 }
//                 if($vo=="教授") {
//                     $query = $this->DB->run_sql("SELECT * FROM z_user where schoolid='$school_message[id]' AND `user_bh`=1 AND `zc`='教授' order by com desc LIMIT $offset, $num ");
//                 }
//                 if($key=="其他") {
//                     $query = $this->DB->run_sql("SELECT * FROM z_user where schoolid='$school_message[id]' AND `user_bh`=1 AND `zc`<>'副教授' AND `zc`<>'教授' order by com desc LIMIT $offset, $num ");
//                 }
//                 if($vo=='副教授' && $vo=="教授") {
//                     $query = $this->DB->run_sql("SELECT * FROM z_user where schoolid='$school_message[id]' AND `user_bh`=1 AND `zc`='副教授' AND `zc`='教授' order by com desc LIMIT $offset, $num ");
//                 }
//                 if($vo=='副教授' && $key=="其他") {
//                     $query = $this->DB->run_sql("SELECT * FROM z_user where schoolid='$school_message[id]' AND `user_bh`=1 AND `zc`='副教授' AND `zc`<>'教授' order by com desc LIMIT $offset, $num ");
//                 }if($vo=='教授' && $key=="其他") {
//                     $query = $this->DB->run_sql("SELECT * FROM z_user where schoolid='$school_message[id]' AND `user_bh`=1 AND `zc`<>'副教授' AND `zc`='教授' order by com desc LIMIT $offset, $num ");
//                 }if($vo=='教授' && $vo=="教授" && $key=='其他') {
//                     $query = $this->DB->run_sql("SELECT * FROM z_user where schoolid='$school_message[id]' AND `user_bh`=1 order by com desc LIMIT $offset, $num ");
//                 } -->

