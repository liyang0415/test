<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<form action="add" method="post" enctype="multipart/form-data">
			
			用户名:<input type="text" name="user" value="">
			<br />
			密码:<input type="password" name="pwd" value=""><font color="red"><?php echo $pwd?></font>
			<br />
			确认密码:<input type="password" name="rel_pwd" value=""><font color="red"><?php echo $rel_pwd?></font>
			<br />
			<font color="red"><?php echo $value?></font><br />
			<input type="submit" name="zhuce" value="注册">

		</form>
	</body>
</html>
