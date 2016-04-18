
<html>
<head>
<SCRIPT LANGUAGE="JavaScript">
function openwin()
{OpenWindow=window.open("", "newwin", "height=250, width=250,toolbar=no,scrollbars="+scroll+",menubar=no");
//写成一行
OpenWindow.document.write("<TITLE>例子</TITLE>")
OpenWindow.document.write("<BODY BGCOLOR=#ffffff>")
OpenWindow.document.write("<h1>Hello!</h1>")
OpenWindow.document.write("New window opened!")
OpenWindow.document.write("</BODY>")
OpenWindow.document.write("</HTML>")
OpenWindow.document.close()}
</SCRIPT>
</head>
<body>
<a href="#" onclick="openwin()">打开一个窗口</a>
<input type="button" onclick="openwin()" value="打开窗口">
</body>
</html>