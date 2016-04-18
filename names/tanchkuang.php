<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>js 点击鼠标位置弹出div层</title>

<head>
<style>
.daohang {font-size:9pt;display: none;position: absolute;width:150px;padding: 3px 3px;line-height:18px;border: 2px solid #66CCFF;background-color: white;}
li{list-style-type:none;}
</style>
<script type='text/javascript'>
function addEvent(obj,eventType,func){
    if(obj.attachEvent){obj.attachEvent("on" + eventType,func);}
    else{obj.addEventListener(eventType,func,false)}
    }
function delEvent(obj,eventType,func){
    if(obj.detachEvent){obj.detachEvent("on" + eventType,func)}
    else{obj.removeEventListener(eventType,func,false)}
    }
function clickOther(el){
    thisObj = el.target?el.target:event.srcElement;
    //alert(thisObj.tagName== "BODY")
    do{
        if(thisObj.id == "lightmenu") return;
        if(thisObj.tagName == "BODY"){
            hidemenu();
            return;
            };
        thisObj = thisObj.parentNode;
    }while(thisObj.parentNode);
}
function showmenu(evt){
 var light=document.getElementById("lightmenu");
    var _event = evt ? evt : event;
    light.style.left=_event.clientX+document.body.scrollLeft+"px";
    light.style.top=_event.clientY+document.body.scrollTop+"px";
    light.style.display='block';
    addEvent(document.body,"mousedown",clickOther)

 }
function hidemenu(){
 var light=document.getElementById("lightmenu");
 delEvent(document.body,"mousedown",showmenu);
 light.style.display='none';

}

</script>
</head>
<body style="height:100%;">
<a href="javascript:void(0)" onclick="showmenu(event)">更多</a>
<div id="lightmenu" class="daohang" >
    <p><input type='checkbox' value='' />首页</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><a href="#" onclick="hidemenu($index)">关闭</a></p>
</div>
<a href="javascript:void(0)" onclick="showmenu(event)">更多</a>
<div id="lightmenu" class="daohang" >
    <p><input type='checkbox' value='' />首页</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><a href="#" onclick="hidemenu($index)">关闭</a></p>
</div>
<a href="javascript:void(0)" onclick="showmenu(event)">更多</a>
<div id="lightmenu" class="daohang" >
    <p><input type='checkbox' value='' />首页</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><a href="#" onclick="hidemenu($index)">关闭</a></p>
</div>
<a href="javascript:void(0)" onclick="showmenu(event)">更多</a>
<div id="lightmenu" class="daohang" >
    <p><input type='checkbox' value='' />首页</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><a href="#" onclick="hidemenu($index)">关闭</a></p>
</div>
<a href="javascript:void(0)" onclick="showmenu(event)">更多</a>
<div id="lightmenu" class="daohang" >
    <p><input type='checkbox' value='' />首页</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><input type='checkbox' value='' />点击鼠标位置弹出div层</p>
    <p><a href="#" onclick="hidemenu($index)">关闭</a></p>
</div>
</body>
</html>