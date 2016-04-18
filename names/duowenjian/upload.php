<!DOCTYPE HTML >
<html>
 <head>
  <title>多文件上传 </title>
  <meta http-equiv="content-type"
  content="text/html;charset=utf-8">
  <style>


  </style>
 </head>

 <body>
  <form  action="do_upload.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="18000000">
	  <input type="file" name="img[]"><br/>
	  <input type="file" name="img[]"><br/>
	  <input type="file" name="img[]"><br/>
	  <input type="submit" name="sub" value="确认上传">
  </form>
  
 </body>
</html>
