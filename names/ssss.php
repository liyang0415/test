<html>
 <head>
  <title> jquery </title>
  <meta charset="utf-8">
  <style>
  img{width:500px;height:500px;}
  </style>
  <script src="jquery.js"></script>
  <script src="dialog-min.js"></script>
  <script>
function test(){
var d = dialog({
    title: '图片',
    content: '<img src="0180300244.jpg"/> '
});
d.showModal();
}
  </script>
 </head>
 <body>
  <input type="button" value="注册" onclick="test()">
  </div>
 </body>
</html>