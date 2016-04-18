<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<style>
            .text{width:200px;height:100px;}
		</style>
	</head>
	<body>
	<!--<?php echo $this->session->userdata('user')?>-->
	<form action="news" method="post" enctype="multipart/form-data">
			发送消息内容<div style="border:solid black 1px;width:300px;float:left"><?php foreach($username as $value){
				$test3=$value->content;
				$time=$value->time;
				$name=$value->name;

				?>	
			
			<?php echo $name.'@'.$time.$test3."<hr/>";?>
			<?php } ?>
			</div>
			<br />
			<div style="border:solid black 1px;width:300px;float:right"><?php foreach($usernames as $value){
				$test3=$value->content;
				$time=$value->time;
				$name=$value->name;

				?>	
			
			<div>
			<?php echo $test3.$name.'@'.$time."<hr/>";?>
			</div>
			<?php } ?>
			</div>
			<br /><br /><br /><br />
			<select name="name">
				<?php foreach($names as $vo){ ?>
					<option><?php echo $vo->name?></option>
				<?php } ?>
			</select>
			<input type="text" name="test3" value="" class="text">
			<input type="submit" name="tijiao" value="submit">

		</form>
	</body>
</html>
