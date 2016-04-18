<form action="upload.php" method="post" enctype="multipart/form-data" >
    name: <input type="text" name="username" value="" /><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <div class='s'>
    up pic: <input type="file" name="pic[]" value="" class='ds'><br>
   </div>
    <input type="button" value="添加" onclick="jdjdj()" class='wode'/><br>

    <input type="submit" value="upload" /><br>

</form>
   <script src="../jquery.js" type="text/javascript"></script>
    <script>
    function jdjdj(){
            var l="up pic: <input type=\"file\" name=\"pic[]\" value=\"\" ><br>";
            $('.s').append(l);
    }

    </script>
    <script type="text/javascript">

var str="Hello world!"
document.write(str.sup())
document.write(str.sub())

</script>