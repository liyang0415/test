<html>
<head>
<meta charset='utf-8'>
<script type="text/javascript">
var c=0
var t
function timedCount()
{
document.getElementById('txt').value=c
c=c+1
t=setTimeout("timedCount()",100)
}

function stopCount()
{
clearTimeout(t)
}
</script>
</head>

<body>
<form>
<input type="button" value="开始计时！" onClick="timedCount()">
<input type="text" id="txt">
<input type="button" value="停止计时！" onClick="stopCount()">
</form>

<p>
请点击上面的“开始计时”按钮。输入框会从 0 开始一直进行计时。点击“停止计时”可停止计时。
</p>

</body>

</html>
