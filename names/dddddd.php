<html>
<head>
<style type="text/css">
  #addtest{
    border:1px #33CC00 solid;
    margin:auto;
  }
  #test{
    width:160px;
    border:1px #ffffff solid;
    position:relative;
    left:40%;

  }
  td{
    text-align:center;
  }
</style>
<script type="text/javascript" src="jquery-1.8.3.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript">
  var index = 1;
  function add() {
    var addstep = index + 1;
    $("#addtest tr:last").after("<tr>" +
        "<td>"+ addstep +"</td>" +
        "<td>" +
          "<input type='text' name='param[" + index + "].nikeName' >" +
        "</td>" +
        "<td>"+
          "<input type='text' name='param[" + index + "].username' >"+
        "</td>"+
        "<td>"+
          "<input type='text' name='param[" + index + "].password' >"+
        "</td>"+
      "</tr>");
    index += 1;
  }
</script>
<title>Insert title here</title>
</head>
<body>
  <form action="allTestAction!testAddEnd" method="post">
    <table id="addtest" border='1' cellspacing='0'>
      <tr>
        <td>编号</td>
        <td>昵称</td>
        <td>用户名</td>
        <td>密码</td>
      </tr>
      <c:forEach items="${list}" var="user" varStatus="ind">
      <tr>
        <td>${ind.index + 1}</td>
        <td>
          <input type="text" name="param[${ind.index}].nikeName" value="${user.nikeName }">
        </td>
        <td>
          <input type="text" name="param[${ind.index}].username" value="${user.username}">
        </td>
        <td>
          <input type="text" name="param[${ind.index}].password" value="${user.password }">
        </td>
      </tr>
      </c:forEach>
    </table>
      <div id="test">
      <input type="button" value="增加栏位" onclick="add()">
      <input type="submit" value="提交">
      </div>
  </form>
</body>
</html>