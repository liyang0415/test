<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无刷新弹出登录窗口</title>
<style type="text/css">
    div.sample_popup { z-index: +1;
        left: 50%;
        top: 50%;
        width: 200px;
        margin-left: -100px;
        height: 176px;
        margin-top: -88px;}
    div.menu_form_header{
    cursor:move
    }
    div.sample_popup div.menu_form_header
    {
      border: 1px solid black;
      border-bottom: 0px;
      cursor: default;
      width: 200px;
      height:      20px;
      line-height: 19px;
      vertical-align: middle;
      background: url('1.jpg') no-repeat;
      text-decoration: none;
      font-family: "Times New Roman", Serif;
      font-weight: 900;
      font-size: 13px;
      color: #206040;
    }
    div.sample_popup div.menu_form_body
    {
      border: 1px solid black;
      width: 200px;

      background: url('/0180300244.jpg') no-repeat left bottom;
    }
    div.sample_popup img.menu_form_exit
    {
      float: right;
      margin: 4px 5px 0px 0px;
      cursor: pointer;
    }
    div.sample_popup table
    {
      border-collapse: collapse;
      width: 100%;
    }
    div.sample_popup th
    {
      width: 1%;
      padding: 0px 5px 1px 0px;
      text-align: left;
      font-family: "Times New Roman", Serif;
      font-weight: 900;
      font-size: 13px;
      color: #004060;
    }
    div.sample_popup td
    {
      width: 99%;
      padding: 0px 0px 1px 0px;
    }
    div.sample_popup form
    {
      margin: 0px;
      padding: 8px 10px 10px 10px;
    }
    div.sample_popup input.field
    {
      border: 1px solid #808080;
      width: 95%;
      font-family: Arial, Sans-Serif;
      font-size: 12px;
    }
    div.sample_popup input.btn
    {
      margin-top: 2px;
      border: 1px solid #808080;
      background-color: #DDFFDD;
      font-family: Verdana, Sans-Serif;
      font-size: 11px;
    }
    a {
     color: #FF0000;
     text-decoration: none;
    }
</style>
<script language="javascript">
  var popup_dragging = false;
  var popup_target;
  var popup_mouseX;
  var popup_mouseY;
  var popup_mouseposX;
  var popup_mouseposY;
  var popup_oldfunction;
  function popup_display(x)
  {
    var win = window.open();
    for (var i in x) win.document.write(i+' = '+x[i]+'<br>');
  }
  function popup_mousedown(e)
  {
    var ie = navigator.appName == "Microsoft Internet Explorer";
    if ( ie  &&  window.event.button != 1) return;
    if (!ie  &&  e.button            != 0) return;
    popup_dragging = true;
    popup_target   = this['target'];
    popup_mouseX   = ie ? window.event.clientX : e.clientX;
    popup_mouseY   = ie ? window.event.clientY : e.clientY;
    if (ie)
         popup_oldfunction = document.onselectstart;
    else popup_oldfunction  = document.onmousedown;
    if (ie)
         document.onselectstart = new Function("return false;");
    else document.onmousedown   = new Function("return false;");
  }
  function popup_mousemove(e)
  {
    if (!popup_dragging) return;
    var ie      = navigator.appName == "Microsoft Internet Explorer";
    var element = document.getElementByIdx_x(popup_target);
    var mouseX = ie ? window.event.clientX : e.clientX;
    var mouseY = ie ? window.event.clientY : e.clientY;
    element.style.left = (element.offsetLeft+mouseX-popup_mouseX)+'px';
    element.style.top  = (element.offsetTop +mouseY-popup_mouseY)+'px';
    popup_mouseX = ie ? window.event.clientX : e.clientX;
    popup_mouseY = ie ? window.event.clientY : e.clientY;
  }
  function popup_mouseup(e)
  {
    if (!popup_dragging) return;
    popup_dragging = false;
    var ie = navigator.appName == "Microsoft Internet Explorer";
    var element = document.getElementById(popup_target);
    if (ie)
         document.onselectstart = popup_oldfunction;
    else document.onmousedown   = popup_oldfunction;
  }
  function popup_exit(e)
  {
    var ie = navigator.appName == "Microsoft Internet Explorer";
    var element = document.getElementById(popup_target);
    popup_mouseup(e);
    element.style.visibility = 'hidden';
    element.style.display    = 'none';
  }
  function popup_show()
  {
    element      = document.getElementById('popup');
    drag_element = document.getElementById('popup_drag');
    exit_element = document.getElementById('popup_exit');
    element.style.position   = "absolute";
    element.style.visibility = "visible";
    element.style.display    = "block";
      // element.style.left = (document.documentElement.scrollLeft+popup_mouseposX-10)+'px';
      // element.style.top  = (document.documentElement.scrollTop +popup_mouseposY-10)+'px';
    drag_element['target']   = 'popup';
    drag_element.onmousedown = popup_mousedown;
    exit_element.onclick     = popup_exit;
  }
  function popup_mousepos(e)
  {
    var ie = navigator.appName == "Microsoft Internet Explorer";
    popup_mouseposX = ie ? window.event.clientX : e.clientX;
    popup_mouseposY = ie ? window.event.clientY : e.clientY;
  }
  if (navigator.appName == "Microsoft Internet Explorer")
       document.attachEvent('onmousedown', popup_mousepos);
  else document.addEventListener('mousedown', popup_mousepos, false);
  if (navigator.appName == "Microsoft Internet Explorer")
       document.attachEvent('onmousemove', popup_mousemove);
  else document.addEventListener('mousemove', popup_mousemove, false);
  if (navigator.appName == "Microsoft Internet Explorer")
       document.attachEvent('onmouseup', popup_mouseup);
  else document.addEventListener('mouseup', popup_mouseup, false);
</script>
</head>
<body>
  <input type="button" onclick="popup_show()"  value='登录'/>
  <div class="sample_popup"     id="popup" style="visibility: hidden; display: none;">
    <div class="menu_form_header" id="popup_drag">
    <img class="menu_form_exit"   id="popup_exit" src="/1.jpg" />
       您好，请登录：
    </div>
    <div class="menu_form_body">
    <form method="post" action="">
      <table>
        <tr>
          <th>Username:</th>
          <td><input class="field" type="text" onfocus="select();" /></td>
        </tr>
        <tr>
          <th>Password:</th>
          <td><input class="field" type="password" onfocus="select();" /></td>
        </tr>
        <tr>
          <th> </th>
          <td><input class="btn" type="submit" value="Submit" /></td>
        </tr>
      </table>
    </form>
    </div>
    </div>
  </div>
</body>
</html>