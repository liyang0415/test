<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> New Document </title>
  <meta name="Generator" content="EditPlus">
  <meta http-equiv="Content-Type" content="textml; charset=UTF-8">
  <script type="text/javascript" src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
  <script type="text/javascript" >
   $(function(){
	       $("#all").click(function(){
		    $(":checkbox").attr("checked",true);
		   });
		   $("#allnot").click(function(){
		    $(":checkbox").attr("checked",false);
		   });

         });
  </script>

 </head>

 <body>
 <form action="index.php?ctl=system/ghscheck&act=index" method="post">
 <table border=1px cellpadding=1px cellspacing=0px>
		<tr >
			<th colspan="10">
				供货商审核列表
			</th>
		</tr>

		<tr>
			<td>选择<input type="checkbox" id="allnot"  value="取消"></td>
			<td>供货商id</td>
			<td>管理员id</td>
			<td>操作</td>

		</tr>
		<foreach name="list" item="vo">
		<tr>
		    <td><input type="checkbox" value="{$vo['id']}" name="ids[]"></td>
			<td>{$vo.id}</td>
			<td>{$vo.op-id}</td>
			<td>
				<if condition="$vo.status == 0">
					<a href="{'index.php?ctl=system/ghscheck&act=xiugai',array('id'=>$vo['id']))}">未审核</a>
				<else />
					<a href="{'index.php?ctl=system/ghscheck&act=xiugai',array('id'=>$vo['id']))}">审核通过</a>
				</if>
			</td>

        </tr>
		</foreach>
		<tr>
			<td colspan="10">
				<input type="button" id="all" value="全选">
				<input type="button" id="allnot"  value="取消">
				<input type="submit" id="shanchu" value="删除">
            </td>
		</tr>
	</table>
	</form>
 </body>
</html>
