<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<!----><?php echo $dl?>
		<form action="user/insert" method="post" enctype="multipart/form-data">
				
			用户名:<input type="text" name="name" value="">
			<br />
			密码:<input type="password" name="password" value="">
			<br />
			<input type="submit" name="login" value="登录">
			<input type="submit" name="regist" value="注册">

		</form>
	</body>
</html>
