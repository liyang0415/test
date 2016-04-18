<html>
<head>
<script type="text/javascript" src="/jquery.js"></script>
<script >
$(document).ready(function(){
  $("input").select(function(){
    $("input").after("HELLO WORLD!");
  });
  var e = jQuery.Event("select");
  $("button").click(function(){
    $("input").trigger(e);
  });

});
document.write('返回浏览器名称'+navigator.appName);/////返回浏览器名称
document.write('<br>');
</script>
</head>
<body>
<input type="text" name="FirstName" value="Hello World" />
<br />
<button>激活 input 域的 select 事件</button>
</body>
</html>