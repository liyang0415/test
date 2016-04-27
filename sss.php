<?php
/////////////////////////阻止冒泡事件
/////cancelBubble      stopPropagation
///window.event? window.event.cancelBubble = true : e.stopPropagation();
function stopBubble(e) {
if (e && e.stopPropagation) {//非IE
    e.stopPropagation();
}
else {//IE
    window.event.cancelBubble = true;
}
javascript的return false只会阻止默认行为，而是用jQuery的话则既阻止默认行为又防止对象冒泡。

下面这个使用原生js，只会阻止默认行为，不会停止冒泡

<div id='div'  onclick='alert("div");'>
<ul  onclick='alert("ul");'>
<li id='ul-a' onclick='alert("li");'><a href="http://caibaojian.com/"id="testB">caibaojian.com</a></li>
</ul>
</div>
var a = document.getElementById("testB");
a.onclick = function(){
return false;
};
演示：阻止链接默认行为，没有停止冒泡

caibaojian.com

下面这个是使用jQuery，既阻止默认行为又停止冒泡

<div id='div'  onclick='alert("div");'>
<ul  onclick='alert("ul");'>
<li id='ul-a' onclick='alert("li");'><a href="http://caibaojian.com/"id="testC">caibaojian.com</a></li>
</ul>
</div>
$("#testC").on('click',function(){
return false;
});
演示：既停止冒泡又阻止默认行为
总结使用方法

当需要停止冒泡行为时，可以使用

function stopBubble(e) {
//如果提供了事件对象，则这是一个非IE浏览器
if ( e && e.stopPropagation )
    //因此它支持W3C的stopPropagation()方法
    e.stopPropagation();
else
    //否则，我们需要使用IE的方式来取消事件冒泡
    window.event.cancelBubble = true;
}
当需要阻止默认行为时，可以使用

//阻止浏览器的默认行为
function stopDefault( e ) {
    //阻止默认浏览器动作(W3C)
    if ( e && e.preventDefault )
        e.preventDefault();
    //IE中阻止函数器默认动作的方式
    else
        window.event.returnValue = false;
    return false;
}



提示框
<html>
<head>
<script type="text/javascript">
function disp_prompt()
  {
  var name=prompt("请输入您的名字","Bill Gates")
  if (name!=null && name!="")
    {
    document.write("你好！" + name + " 今天过得怎么样？")
    }
  }
</script>
</head>
<body>

<input type="button" onclick="disp_prompt()" value="显示提示框" />

</body>
</html>
确认框
<html>
<head>
<script type="text/javascript">
function show_confirm()
{
var r=confirm("Press a button!");
if (r==true)
  {
  alert("You pressed OK!");
  }
else
  {
  alert("You pressed Cancel!");
  }
}
</script>
</head>
<body>

<input type="button" onclick="show_confirm()" value="Show a confirm box" />

</body>
</html>
try{} catch {}
<html>
<head>
<script type="text/javascript">
var txt=""
function message()
{
try
   {
   adddlert("Welcome guest!")
   }
catch(err)
   {
     txt="本页中存在错误。\n\n"
     txt+="点击“确定”继续查看本页，\n"
     txt+="点击“取消”返回首页。\n\n"
     if(!confirm(txt))
         {
         document.location.href="../index.html"/*tpa=http://www.w3school.com.cn/index.html*/
         }
   }
}
</script>
</head>

<body>
<input type="button" value="查看消息" onclick="message()" />
</body>

</html>

////////////////////////



}
function addQnav(qidx)
{
    var title=$('input[name=scale\\[questions\\]\\['+qidx+'\\]\\[title\\]]').val();
    var li="<li onclick='showQ(this.id.replace(\"qnav\",\"\"))' class=\"answer\" id='qnav"+qidx+"' qidx="+qidx+">"+("第"+(parseInt(qidx)+1)+"题")+"</span>"+"<span class='arrows std' onclick='moveQuection(this,\"up\")'>↑</span><span class='arrows std' onclick='moveQuection(this,\"down\")' >↓</span>"+"</li>";
    $('#QList').append(li);
}
function moveQuection(obj,dir){
    var answerObj=$(obj).closest(".answer");
    var qidx=parseInt(answerObj.attr('qidx'));
    if(qidx==0&&dir=="up")
        {
            alert('第一个不能上移');    //////////////
            console.log('第一个不能上移');
            return false;
        }
    if(qidx==getQcount()-1&&dir=="down")
    {
        alert('最后一个不能下移');    //////////////
        console.log('第一个不能上移');
        return false;
    }
    if(dir=="up"){


        var targetObj=$($('#QList').children()[qidx-1]);
        answerObj.insertBefore(targetObj);
        targetObj.attr('qidx',qidx);
        answerObj.attr('qidx',qidx-1);

    }
    if(dir=="down"){
        var targetObj=$($('#QList').children()[qidx+1]);
        answerObj.insertAfter(targetObj);
        targetObj.attr('qidx',qidx);
        answerObj.attr('qidx',qidx+1);


    }


}











function addQnav(qidx)
{
    var title=$('input[name=scale\\[questions\\]\\['+qidx+'\\]\\[title\\]]').val();
    var li="<li onclick='showQ(this.id.replace(\"qnav\",\"\"))' class=\"answer\" id='qnav"+qidx+"' qidx="+qidx+">"+("第"+(parseInt(qidx)+1)+"题")+"</span>"+"<span class='arrows std' onclick='moveQuection(this,\"up\")'>↑</span><span class='arrows std' onclick='moveQuection(this,\"down\")' >↓</span>"+"</li>";
    $('#QList').append(li);
}
function moveQuection(obj,dir){
    var answerObj=$(obj).closest(".answer");
    var qidx=parseInt(answerObj.attr('qidx'));
    // var id=(answerObj.attr('id')).split('v');
    // var idnumble=id[1];
    // alert(idnumble);
    var q_qlist=$($('#qlist').children()[qidx]);
    if(qidx==0&&dir=="up")
        {
            alert('第一个不能上移');    //////////////
            console.log('第一个不能上移');
            return false;
        }
    if(qidx==getQcount()-1&&dir=="down")
    {
        alert('最后一个不能下移');    //////////////
        console.log('第一个不能上移');
        return false;
    }
    if(dir=="up"){


        var targetObj=$($('#QList').children()[qidx-1]);
        answerObj.insertBefore(targetObj);
        targetObj.attr('qidx',qidx);
        answerObj.attr('qidx',qidx-1);
        var h_qlist=$($('#qlist').children()[qidx-1]);
        q_qlist.insertBefore(h_qlist);
        h_qlist.attr('data-qidx',qidx);
        q_qlist.attr('data-qidx',qidx-1);
        //changQuestionIdx(idnumble,qidx,qidx-1);
        //changQuestionIdx(targetObj,qidx-1,qidx-1,qidx);


    }
    if(dir=="down"){
        var targetObj=$($('#QList').children()[qidx+1]);
        answerObj.insertAfter(targetObj);
        targetObj.attr('qidx',qidx);
        answerObj.attr('qidx',qidx+1);
        changQuestionIdx(answerObj,qidx,qidx,qidx+1);
        changQuestionIdx(targetObj,qidx+1,qidx+1,qidx);


    }


}
function changQuestionIdx(obj,from,to)
{  //$('[name^=scale\\[questions\\]\\[1\\]]').map(function(k,sitem){console.log($(sitem).attr('name'))})
    $('[name^=scale\\[questions\\]\\['+obj+'\\]]').map(function(k,sitem)
    {
        var name=$(sitem).attr('name');
        console.log("index:"+qidx+" before:"+name);
        name=name.replace("[questions]["+from+"]","[questions]["+to+"]");
        console.log("index:"+qidx+" after:"+name);
        $(sitem).attr('name',name);
    })

}

//编辑器
    var k=KindEditor.create('#qcnt'+idx,{
        allowFileManager : true,
        height:'300px',
        pasteType:1,
        allowImageUpload:false,
        allowMediaUpload:false,
        allowFlashUpload:false,
        allowFileUpload:false,
        htmlTags: KindEditor.options.htmlTags,
        items:['source', '|', 'undo', 'redo', '|', 'preview', 'template', 'cut', 'copy', 'paste','plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript','superscript', 'clearhtml', 'selectall', '|',  'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'lineheight', 'removeformat', '|', 'table', 'hr','/','image', 'media'],
        afterSelectFile: function (arg) {
            $('.ui-tooltip').remove();
        }
    });
    return k;



    setInterval(function(){
    $.ajax({
        url: '<?=site_url('my/heartbeat')?>',
        type: 'get',
        dataType: 'json',
        data: '',
    })
    .done(function() {
        console.log("请求页面，success");
    })
    .fail(function() {
        console.log("请求页面，error");
    })
    .always(function() {
        console.log("请求页面，complete。"+(new Date()).toLocaleString());
    });
},
    1000*60*5


////////////tmpl()函数
    <ul id="movieList"></ul>
 
<script id="movieTemplate" type="text/x-jquery-tmpl">
<li><b>${Name}</b> (${ReleaseYear})</li>
</script>
 
<script type="text/javascript">
var movies = [
{ Name: "The Red Violin", ReleaseYear: "1998" },
{ Name: "Eyes Wide Shut", ReleaseYear: "1999" },
{ Name: "The Inheritance", ReleaseYear: "1976" }
];
 
// Render the template with the movies data and insert
// the rendered HTML under the "movieList" element
$( "#movieTemplate" ).tmpl( movies )
.appendTo( "#movieList" );
</script>


<script>
function addQnav(qidx)
{
    var title=$('input[name=scale\\[questions\\]\\['+qidx+'\\]\\[title\\]]').val();
    var li="<li onclick='showQ(this.id.replace(\"qnav\",\"\"))' class=\"answer\" id='qnav"+qidx+"' qidx="+qidx+">"+("第"+(parseInt(qidx)+1)+"题")+"</span>"+"<span class='arrows std' onclick='moveQuection(this,\"up\")'>↑</span><span class='arrows std' onclick='moveQuection(this,\"down\")' >↓</span>"+"</li>";
    $('#QList').append(li);
}
function moveQuection(obj,dir){
    var answerObj=$(obj).closest(".answer");
    var qidx=parseInt(answerObj.attr('qidx'));
    // var id=(answerObj.attr('id')).split('v');
    // var idnumble=id[1];
    // alert(idnumble);
    var q_qlist=$($('#qlist').children()[qidx]);
    var q_qaid=$('#qa'+qidx);
    var q_xid=$('#'+qidx);
    var q_qcnt=$('#qcnt'+qidx);
    changQuestionIdx(q_qlist,qidx,100);
    //q_qcnt.attr('id','qcnt'+100);
    if(qidx==0&&dir=="up")
        {
            alert('第一个不能上移');    //////////////
            console.log('第一个不能上移');
            return false;
        }
    if(qidx==getQcount()-1&&dir=="down")
    {
        alert('最后一个不能下移');    //////////////
        console.log('第一个不能上移');
        return false;
    }
    if(dir=="up"){
        var targetObj=$($('#QList').children()[qidx-1]);
        answerObj.insertBefore(targetObj);
        targetObj.attr('qidx',qidx);
        answerObj.attr('qidx',qidx-1);
        targetObj.attr('id','qnav'+qidx);
        answerObj.attr('id','qnav'+(qidx-1));
        var h_qlist=$($('#qlist').children()[qidx-1]);
        var h_qaid=$('#qa'+(qidx-1));
        var h_xid=$('#'+(qidx-1));
        var h_qcnt=$('#qcnt'+(qidx-1));
        KindEditor.remove('#qcnt'+(qidx-1));
        KindEditor.remove('#qcnt'+qidx);
        q_qlist.insertBefore(h_qlist);
        h_qlist.attr('data-qidx',qidx);
        q_qlist.attr('data-qidx',qidx-1);
        h_qlist.attr('id','q'+qidx);
        q_qlist.attr('id','q'+(qidx-1));
        q_qaid.attr('id','qa'+(qidx-1));
        h_qaid.attr('id','qa'+(qidx));
        q_xid.attr('id',qidx-1);
        h_xid.attr('id',qidx);
        q_qcnt.attr('id','qcnt'+(qidx-1));
        h_qcnt.attr('id','qcnt'+qidx);
        var kindedit={
            allowFileManager : true,
            width:'100%',
            height:'300px',
            pasteType:1,
            allowImageUpload:false,
            allowMediaUpload:false,
            allowFlashUpload:false,
            allowFileUpload:false,
            htmlTags: KindEditor.options.htmlTags,
            items:['source', '|', 'undo', 'redo', '|', 'preview', 'template', 'cut', 'copy', 'paste','plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript','superscript', 'clearhtml', 'selectall', '|',  'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'lineheight', 'removeformat', '|', 'table', 'hr','/','image', 'media']
            };
        KindEditor.create('#qcnt'+qidx,kindedit);
        KindEditor.create('#qcnt'+(qidx-1),kindedit);
        changQuestionIdx(h_qlist,qidx-1,qidx);
        changQuestionIdx(q_qlist,100,qidx-1);

    }
    if(dir=="down"){
        var targetObj=$($('#QList').children()[qidx+1]);
        answerObj.insertAfter(targetObj);
        targetObj.attr('qidx',qidx);
        answerObj.attr('qidx',qidx+1);
        targetObj.attr('id','qnav'+qidx);
        answerObj.attr('id','qnav'+(qidx+1));
        var h_qlist=$($('#qlist').children()[qidx+1]);
        var h_qaid=$('#qa'+(qidx+1));
        var h_xid=$('#'+(qidx+1));
        var h_qcnt=$('#qcnt'+(qidx+1));
        KindEditor.remove('#qcnt'+(qidx+1));
        KindEditor.remove('#qcnt'+qidx);
        q_qlist.insertAfter(h_qlist);
        h_qlist.attr('data-qidx',qidx);
        q_qlist.attr('data-qidx',qidx+1);
        h_qlist.attr('id','q'+qidx);
        q_qlist.attr('id','q'+(qidx+1));
        q_qaid.attr('id','qa'+(qidx+1));
        h_qaid.attr('id','qa'+(qidx));
        q_xid.attr('id',qidx+1);
        h_xid.attr('id',qidx);
        q_qcnt.attr('id','qcnt'+(qidx+1));
        h_qcnt.attr('id','qcnt'+qidx);
        var kindedit={
            allowFileManager : true,
            width:'100%',
            height:'300px',
            pasteType:1,
            allowImageUpload:false,
            allowMediaUpload:false,
            allowFlashUpload:false,
            allowFileUpload:false,
            htmlTags: KindEditor.options.htmlTags,
            items:['source', '|', 'undo', 'redo', '|', 'preview', 'template', 'cut', 'copy', 'paste','plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript','superscript', 'clearhtml', 'selectall', '|',  'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'lineheight', 'removeformat', '|', 'table', 'hr','/','image', 'media']
            };
        KindEditor.create('#qcnt'+qidx,kindedit);
        KindEditor.create('#qcnt'+(qidx+1),kindedit);
        changQuestionIdx(h_qlist,qidx+1,qidx);
        changQuestionIdx(q_qlist,100,qidx+1);



    }


}
function changQuestionIdx(obj,from,to)
{  //$('[name^=scale\\[questions\\]\\[1\\]]').map(function(k,sitem){console.log($(sitem).attr('name'))})
    obj.find($('[name^=scale\\[questions\\]]')).map(function(k,sitem)
    {
        var name=$(sitem).attr('name');
        //console.log("index:"+qidx+" before:"+name);
        name=name.replace("[questions]["+from+"]","[questions]["+to+"]");
        //console.log("index:"+qidx+" after:"+name);
        $(sitem).attr('name',name);
    })

}
</script>





$('#qlist').children().splice(qidx).map(function(quesn){
        $(quesn).find($('[name^=scale\\[questions\\]]')).map(function(k,sitem)
        {
            var name=$(sitem).attr('name');
            name=name.replace("[questions]["+(qidx+1)+"]","[questions]["+qidx+"]");
            $(quesn).attr('name',name);
        });
        $(quesn).attr("data-qidx",qidx);
        $(quesn).attr("id",'q'+qidx);
        qidx++;
        });


////////////////////////////////弹出框 和传值到视图
        $msg=$result?'复制完成':'复制失败';
        $this->message(array('msg'=>$msg,'backurl'=>site_url('assess/scales'),'ref'=>3))

        $this->layout->setSlot('content',array('testfactorinfo'=>$testfactorinfo),'testfactor/edit.php');
        $this->layout->view();

    for(var i=0;i<=getQcount();i++)
        {
           $($('#QList').children()[i]).css('background','#fff');
           $($('#QList').children()[i]).css('color','#009699');
        }




    function shortnameExist(){
        if($this->isGet){
            $shortname=$this->input->get('shortname');
        }
        $name=AssessmanageServices::getInstance()->getAllScales(array('where'=>array('SHORTNAME'=>$shortname)));
        if ($name) {
            $info["status"] = 1;
            $info["msg"]='短名称已经存在！';
        }
        $this->outJson($info);
    }

        /**
     * 快捷编辑排序
     * [editOrderidx description]
     * @return [type] [description]
     */
    function editOrderidx(){
        $test='false';
        if($this->isPost){
            $sid=$this->input->post('id');
            $data['ORDERIDX']=$this->input->post('order');
            $data['MODIFYEMPID']=$this->assessmanager['id'];
            $data['MODIFYTIME']=TimeServices::getNow();
            $result=AssessmanageServices::getInstance()->editOrder($sid,$data);
            if($result){
                $test='true';
            }
        }
        $data=array('result'=>$test);
        $this->outJson($data);

    }
    /**
     *   批量删除
     * [deleteBatch description]
     * @return [type] [description]
     */
    function deleteBatch(){
        $test='false';
        if($this->isPost){
            $sidx=$this->input->post('ids');
            foreach($sidx as $sid){
                $tem=AssessmanageServices::getInstance()->scaledelete($sid);
            }

            if($tem){
                $test='true';
            }
        }
        $data=array('result'=>$test);
        $this->outJson($data);
    }






        //print_r($parainfo);
        // die;
        // $parasarr=array();["30","1","7","32"]
        // if($sickpara['sick_para']){
        //    $sickpara['sick_para']=explode(':',$sickpara['sick_para']);
        //    $parasarr=$sickpara['sick_para'];
        // }
        //print_r($parasarr);die;




/**
 * 系统 疾病管理
 */

    function sicksystem(){
        $langpara=ParadigmlangServices::getParasByCategory();
        $sick=SicksServices::getsicks66nao();
        $sick=$sick?$sick:array();
        $this->layout->setSlot('content',array('sick'=>$sick),'system/sicks/list.php');
        $this->layout->view();

    }
    /**
     * 系统 疾病添加
     * [sicksystem_add description]
     * @return [type] [description]
     */
    function sicksystem_add(){
    $msg='';
        if($this->isPost){
            $data['sick_name']=$this->input->post('sick_name');
            if($data['sick_name']==''){
                $this->message(array('msg'=>"疾病名称不能为空！",'backurl'=>'','ref'=>3));
            }
            $result=SicksServices::getsicks66nao();
            foreach($result as $val){
                if($val['sick_name']==$data['sick_name']){
                    $this->message(array('msg'=>"疾病名称已经存在！",'backurl'=>'','ref'=>3));
                }
            }
            $data['uuid']=uniqid();
            $data['sick_icd']=$this->input->post('sick_icd');
            $data['sick_typ']=$this->input->post('sick_typ');
            $data['sick_disable']=$this->input->post('sick_disable');
            $data['sick_disable']=$data['sick_disable']?$data['sick_disable']:0;
            $data['sick_input_type']=$this->input->post('sick_input_type');
            $data['sick_isdefault']=$this->input->post('sick_isdefault');
            $data['sick_isdefault']=$data['sick_isdefault']?$data['sick_isdefault']:0;
            $data['sick_desc']=$this->input->post('sick_desc');
            $data['add_time']=TimeServices::getNow();
            $dats['sick_para']=$this->input->post('sick_para');
            $dats['sick_para']=json_encode($dats['sick_para']);

            $data['sick_conflict']=$this->input->post('sick_conflict');
            //print_r($data['sick_conflict']);//die;
            if($data['sick_conflict']){
                $data['sick_conflict']=(count($data['sick_conflict'])<1)?array():$data['sick_conflict'];
            foreach($data['sick_conflict'] as $v){
                $getsickinfo[]=SicksServices::getonesicks66nao(array('where'=>array('id'=>$v)));
            }
            foreach($getsickinfo as $k){
                $arr[]=array(
                $k['id']=>array($k['id'],$k['uuid']));
            }
            $arr=json_encode($arr);
            $data['sick_conflict']=$arr;
            }
            $dats['sick_types']=$this->input->post('sick_types');
            $sick=SicksServices::getonesicks66nao(array('where'=>array('id'=>$dats['sick_types'])));
            if($sick['parent']){
                $this->message(array('msg'=>'不能添加三级分类！','backurl'=>'','ref'=>3));
            }
            $data['sick_parent_uuid']=isset($sick['uuid'])?$sick['uuid']:uniqid();
            $data['sick_parent']=isset($sick['id'])?$sick['id']:1;
            $result=SicksServices::addsickssystem($data,$this->system);
            $dparas['sick_para']=$dats['sick_para'];
            $dparas['sick_uuid']=$data['uuid'];
            $dparas['sick_id']=$result;
            $dparas['add_time']=TimeServices::getNow();
            $list=SicksServices::addsick_parasystem($dparas);
            $msg=($result&&$list)?'添加完成':'添加失败';
            $this->message(array('msg'=>$msg,'backurl'=>site_url('system/sicksystem'),'ref'=>3));
        }
        $sick=SicksServices::getsicks66nao();
        $paras=ParadigmServices::getInstance()->getAllParadigms();
        //print_r($paras);die;
        $this->layout->setSlot('content',array('paras'=>$paras,'sick'=>$sick),'system/sicks/add.php');
        $this->layout->view();
    }
    /**
     *
     * 系统 疾病编辑
     * [sicksystem_edit description]
     * @param  [type] $id [疾病信息ID]
     * @return [type]     [description]
     */
    function sicksystem_edit($id){
        $msg='';
        if(!$this->isPost){
            $id=(int)$id;
            if (!$id) {
            $this->message(array('msg'=>'id错误','backurl'=>site_url('system/sicksystem'),'ref'=>3));
            }

            $sick=SicksServices::getonesicks66nao(array('where'=>array('id'=>$id)));
            if(!$sick){
            $this->message(array('msg'=>'疾病信息未找到！','backurl'=>site_url('system/sicksystem'),'ref'=>3));
            }
        }
        //print_r($sick);//die;
        if($this->isPost){
            $data['id']=$this->input->post('id');
            $sid=$data['id'];
            $data['sick_name']=$this->input->post('sick_name');
            if($data['sick_name']==''){
                $this->message(array('msg'=>"疾病名称不能为空！",'backurl'=>'','ref'=>3));
            }
            $result=SicksServices::getsick_nameinfo($data['sick_name']);
            //$result=$result?$result:array();
            //print_r($result);//die;
            //echo count($result);die;
            if($result){

            //foreach($result as $val){
               // $arr[]=array(
               //  $val['id']=>array($val['id'],$val['sick_name']));
                if($result['id']!==$data['id']){
                    $this->message(array('msg'=>"疾病名称已经存在！",'backurl'=>'','ref'=>3));
              // }
            }}

           //  print_r($result);
           // die;
            $data['uuid']=uniqid();
            $data['sick_icd']=$this->input->post('sick_icd');
            $data['sick_typ']=$this->input->post('sick_typ');
            $data['sick_disable']=$this->input->post('sick_disable');
            $data['sick_disable']=$data['sick_disable']?$data['sick_disable']:0;
            $data['sick_input_type']=$this->input->post('sick_input_type');
            $data['sick_isdefault']=$this->input->post('sick_isdefault');
            $data['sick_isdefault']=$data['sick_isdefault']?$data['sick_isdefault']:0;
            $data['sick_desc']=$this->input->post('sick_desc');
            $data['add_time']=TimeServices::getNow();
            $dats['sick_para']=$this->input->post('sick_para');
            $dats['sick_para']=json_encode($dats['sick_para']);

            $data['sick_conflict']=$this->input->post('sick_conflict');
            //print_r($data['sick_conflict']);//die;
            if($data['sick_conflict']){
                $data['sick_conflict']=(count($data['sick_conflict'])<1)?array():$data['sick_conflict'];
            foreach($data['sick_conflict'] as $v){
                $getsickinfo[]=SicksServices::getonesicks66nao(array('where'=>array('id'=>$v)));
            }
            foreach($getsickinfo as $k){
                $arr[]=array(
                $k['id']=>array($k['id'],$k['uuid']));
            }
            $arr=json_encode($arr);
            $data['sick_conflict']=$arr;
            }
            $dats['sick_types']=$this->input->post('sick_types');
            //print_r($dats['sick_types']);die;
            $sick_parent=SicksServices::getonesicks66nao(array('where'=>array('id'=>$dats['sick_types'])));
            if($sick_parent['parent']){
                $this->message(array('msg'=>'不能添加三级分类！','backurl'=>'','ref'=>3));
            }
            $data['sick_parent_uuid']=isset($sick_parent['uuid'])?$sick_parent['uuid']:uniqid();
            $data['sick_parent']=isset($sick_parent['id'])?$sick_parent['id']:0;
            // $sick_parent=SicksServices::getonesicks66nao(array('where'=>array('id'=>$dats['sick_types'])));

            // if($sick_parent){
            //     foreach($sick_parent as $h){
            //         if($sick_parent['parent']&&($sick_parent['id']!==$data['id'])){
            //                 $this->message(array('msg'=>'不能添加三级分类！','backurl'=>'','ref'=>3));
            //             }
            //     }
            // }
            // //print_r($sick_parent);die;
            // $data['sick_parent_uuid']=isset($sick_parent['uuid'])?$sick_parent['uuid']:uniqid();
            // $data['sick_parent']=isset($sick_parent['id'])?$sick_parent['id']:0;
            //print_r($data);print_r($dats);die;
            $results=SicksServices::editsickssystem($sid,$data,$this->system);
           // print_r($results);die;
            $dparas['sick_para']=$dats['sick_para'];
            $dparas['sick_uuid']=$data['uuid'];
            $dparas['add_time']=TimeServices::getNow();
            $list=SicksServices::editsick_parasystem($sid,$dparas);
            $msg=($results&&$list)?'编辑完成':'编辑失败';
            $this->message(array('msg'=>$msg,'backurl'=>site_url('system/sicksystem'),'ref'=>3));
        }
        $sickpara=SicksServices::getonesickpara66nao($id);
        $pid=json_decode($sickpara['sick_para']);
        $pid=$pid?$pid:array();
        //print_r($pid);
        $parainfo=array();
        if($pid&&count($pid)>0){
            foreach($pid as $s){
               $parainfo[]=ParadigmServices::getInstance()->getOnePara($s);
               $parainfo=$parainfo?$parainfo:array();
            }
            //[{"2":["2","2"]},{"6":["6","56306987b4416"]},{"12":["12","563082cea938a"]}]
        }
        $sick_conflict=json_decode($sick['sick_conflict']);
         //print_r($sick_conflict);die;
        $sick_conflict=$sick_conflict?$sick_conflict:array();

        $sickinfo=array();
        if($sick_conflict&&count($sick_conflict)>0){
        foreach($sick_conflict as $key=>$val){
             foreach($val as $k=>$v){
            $sickinfo[]=SicksServices::getonesicks66nao(array('where'=>array('id'=>$k)));
            $sickinfo=$sickinfo?$sickinfo:array();
            }}
        }
        //print_r($parainfo);//die;

        $sicksall=SicksServices::getsicks66nao();
        $paras=ParadigmServices::getInstance()->getAllParadigms();
        //print_r($paras);die;
        $this->layout->setSlot('content',array('paras'=>$paras,'sick'=>$sick,'sicksall'=>$sicksall,'parainfo'=>$parainfo,'sickinfo'=>$sickinfo),'system/sicks/edit.php');
        $this->layout->view();


    }


?>
                <select name="sick_parent">
                    <option value="<?=$sick['id']?>" <?=$sick['sick_name']?'selected':''?>><?=$sick['sick_name']?></option>
                    <option value="0">无上级</option>

                        <?php foreach($sicksall as $val): if($val['parent']==''){ ?>
                            <option value="<?=$val['id']?>"><?=$val['sick_name']?></option>
                        <?php }foreach($sicksall as $v): if($val['id']==$v['sick_parent']){ ?>
                            <option value="<?=$v['id']?>">&nbsp;&nbsp;&nbsp;&nbsp;<?=$v['sick_name']?></option>
                        <?php }endforeach; endforeach; ?>
                    </select>

<?
        foreach($scale['questions'] as $value){

        foreach($value['answers'] as $v){

        $v['EXOPT']=json_decode($v['EXOPT']);
        //print_r($v['EXOPT']);die;
        }

        }
        print_r($scale);die;





    /**
     * 版本说明
     * [versexplan description]
     * @return [type] [description]
     */
    function versexplan(){
        $ver=VersionServices::getAssessver();
        $ver=$ver?$ver:array();
        $this->layout->setSlot('content',array('ver'=>$ver),'version/list.php');
        $this->layout->view();

    }
    function versionAdd(){
    $msg='';
    if($this->isPost){
        $data['ver']=$this->input->post('ver');
        $data['info']=$this->input->post('info');
        $data['add_time']=TimeServices::getNow();
        if($data['ver']==""){
            $this->message(array('msg'=>"版本不能为空！",'backurl'=>site_url('assess/versexplan'),'ref'=>3));
        }
    }
    $result=VersionServices::versionAssess_add($data,$this->assessmanager);
    $msg=$result?'添加完成':'添加失败';
    $this->message(array('msg'=>$msg,'backurl'=>site_url('assess/versexplan'),'ref'=>3));
}


    // 提交前将所有chosen的值全部添加到隐藏的input中
    function beforeSubmit (form) {
        var $form = $(form);
        $chosens.each(function () {
            var select = this;
            $.each(this.selectedOptions, function () {
                $form.append('<input type="hidden" value="'
                    + this.value + '" name="' + select.getAttribute('name') + '">');
            });
        }).remove();
        return true;
    }




    //////无线分类
    // $area = array(
// array('id'=>1,'area'=>'北京','pid'=>0),
// array('id'=>2,'area'=>'广西','pid'=>0),
// array('id'=>3,'area'=>'广东','pid'=>0),
// array('id'=>4,'area'=>'福建','pid'=>0),
// array('id'=>11,'area'=>'朝阳区','pid'=>1),
// array('id'=>12,'area'=>'海淀区','pid'=>1),
// array('id'=>21,'area'=>'南宁市','pid'=>2),
// array('id'=>45,'area'=>'福州市','pid'=>4),
// array('id'=>113,'area'=>'亚运村','pid'=>11),
// array('id'=>115,'area'=>'奥运村','pid'=>11),
// array('id'=>234,'area'=>'武鸣县','pid'=>21)
// );
// $list = t($area);
// echo "<hr >";
// print_r($list);die;
        foreach($manageSick as $v) $b[$v['id']] = $v;
        $manageSick = $b;
        //print_r($manageSick);die;
  $tree = t($manageSick);
//echo "<hr >";
//print_r($tree);die;
        //$items=array()
//         $tree=array(); //格式化好的树
//         foreach ($manageSick as $item)
//             if (isset($manageSick[$item['sick_parent']]))
//                 $manageSick[$item['sick_parent']]['son'][] = &$manageSick[$item['id']];
//             else
//                 $tree[] = &$manageSick[$item['id']];
//             unset($manageSick);
// test($tree);
        //print_r($tree);die;


        // $tree = array(); //格式化好的树
        // foreach ($manageSick as $item)
        //     if (isset($manageSick[$item['sick_parent']]))
        //         $manageSick[$item['sick_parent']]['son'][] = &$manageSick[$item['id']];
        //     else
        //         $tree[] = &$manageSick[$item['id']];
        //print_r($manageSick);die;
        // foreach ($manageSick as $item)
        //     $manageSick[$item['sick_parent']]['son'][$item['id']] = &$manageSick[$item['id']];
        // $ss=isset($manageSick[0]['son']) ? $manageSick[0]['son'] : array();
        //    //print_r($ss);die;


    function t($arr,$sick_parent=0,$lev=0){
        static $list = array();
        foreach($arr as $v){
        if($v['sick_parent']==$sick_parent){
            //echo str_repeat(" ------ ",$lev).$v['sick_name']."<br />";
            //这里输出，是为了看效果
            $list[] = array($lev=>$v);
            t($arr,$v['id'],$lev+1);
        }
        }
        //print_r($list);die;




<style>
    .full table tr td .edit {
        margin-right: 1em;
    }
</style>
<button class="blue" onclick="location.href='<?=site_url('system/sicks/')?>'">添加</button>
<section>
    <table class="std full">
        <thead>
            <tr>
                <th>系统疾病信息</th>
            </tr>
        </thead>
        <tbody>
       <?php foreach($sick as $val){  ?>
            <?php foreach($val as $key=>$v){  ?>
            <tr><td><label><?php echo str_repeat(" &nbsp;&nbsp;&nbsp;&nbsp; ",$key)?><input type="checkbox"><?=$v['sick_name']?></label><a class="f-r std edit" href="<?=site_url("system/sicks/".$v['id'])?>">编辑</a></td>
            </tr>
    <?php }} ?>
        </tbody>
    </table>
</section>




                 $defplan=SicksServices::getInstance()->usersickpara($id);
                    $defplan=$defplan?$defplan:array();
                    foreach($defplan as $val){
                        $defaultplan[]=$val[3];
                    }
                    print_r($defplan);die;




                                <?php if(isset($val['son'])){ ?>
                                    <?php if($val['sick_input_type']==1){ foreach($val['son'] as $v){ ?>
                                        <li class="f-l sub-li">
                                            <label><input type="radio" name="core[]" value="<?=$v['uuid'].'-'.$v['id']?>" <?=(isset($user_anam['sicks'][$v['uuid']])?'checked':'')?>><?=$v['sick_name']?></label>
                                        </li>
                                    <?php }} ?>
                                    <?php if($val['sick_input_type']==2){ foreach($val['son'] as $v){ ?>
                                        <li class="f-l sub-li">
                                            <label><input type="checkbox" name="core[]" value="<?=$v['uuid'].'-'.$v['id']?>" <?=(isset($user_anam['sicks'][$v['uuid']])?'checked':'')?>><?=$v['sick_name']?></label>
                                        </li>
                                    <?php }} ?>
                                <?php } ?>



<?
     每行输出两个       if(($key!=0)&&($key)%2==0)
            echo "</tr><tr>";





                                本周除了开发任务，还有2个学习任务
1、机构新增流程，从添加机构到医生登录完毕。
2、患者新增流程，从开始添加患者到患者第一次登陆结束，出现游戏选择界面。

详细了解每个流程需要进行哪些操作，每个人先自己了解，然后对一下，出一个结果给我就行。



            if($result)
            {
                $msg='修改完成';
                if ($diag_time) {
                    foreach ($diag_time as $key => $value) {
                        $diag_time[$key]=(int)$value;
                    }
                    UserServices::getInstance()->saveLangPara($item,$diag_time);
                }

                if ($next) {
                    $this->gotoNextFlow(array('msg'=>$msg,'user_id'=>$id));
                }
            }else{
                $msg=ErrorServices::getLastError();
            }
            $this->message(array('msg'=>$msg,'backurl'=>site_url('my/user_view/'.$item['id']),'ref'=>3));





                          foreach($sicksall as &$val){
                $arr=array();
                    if($val['sick_conflict']){
                        //$arr1=array();
                        $val['sick_conflict']=json_decode($val['sick_conflict']);
                        foreach($val['sick_conflict'] as $g){

                            foreach($g as $d){
                                $arr[]=array($d[1]=>array('id'=>$d[0],'uuid'=>$d[1]));
                            }

                        }$arr1[]=array($val['uuid']=>$arr);
                    }
                }//die;
                unset($val); print_r($arr1);die;
                foreach($arr1 as $key=>&$val){
                    foreach($arr1 as $g){
                        foreach($g as $h){
                            foreach($h as $l){
                            foreach($l as $j=>$k){
                                if($key==$j){
                                    $val[]=array($k[1]=>array('id'=>$k[0],'uuid'=>$k[1]));
                                }
                            }
                        }}
                    }
                }


 一维数组排序可以使用asort、ksort等一些方法进程排序，相对来说比较简单。二维数组的排序怎么实现呢？使用array_multisort和usort可以实现
例如像下面的数组：

 代码如下:
$users = array(
    array('name' => 'tom', 'age' => 20)
    , array('name' => 'anny', 'age' => 18)
    , array('name' => 'jack', 'age' => 22)
);


希望能按照age从小到大进行排序。笔者整理了两个方法出来，分享给大家。

1、使用array_multisort

使用这个方法，会比较麻烦些，要将age提取出来存储到一维数组里，然后按照age升序排列。具体代码如下：

代码如下:
$ages = array();
foreach ($users as $user) {
    $ages[] = $user['age'];
}

array_multisort($ages, SORT_ASC, $users);



执行后，$users就是排序好的数组了，可以打印出来看看。如果需要先按年龄升序排列，再按照名称升序排列，方法同上，就是多提取一个名称数组出来，最后的排序方法这样调用：

代码如下:
array_multisort($ages, SORT_ASC, $names, SORT_ASC, $users);


2、使用usort

使用这个方法最大的好处就是可以自定义一些比较复杂的排序方法。例如按照名称的长度降序排列：

代码如下:
usort($users, function($a, $b) {
            $al = strlen($a['name']);
            $bl = strlen($b['name']);
            if ($al == $bl)
                return 0;
            return ($al > $bl) ? -1 : 1;
        });


这里使用了匿名函数，如果有需要也可以单独提取出来。其中$a, $b可以理解为$users数组下的元素，可以直接索引name值，并计算长度，而后比较长度就可以了。






    //订单状态
    static $ORDER_NOT_PAY='0';  //未付款，允许付款、关闭
    static $ORDER_PAY_ONGOING='1';  //等待用户付款，允许付款、关闭
    static $ORDER_PAY_OK='2';  //用户付款成功
    static $ORDER_PAY_FAILED='3';  //用户付款失败，允许付款、关闭
    static $ORDER_PAY_CLOSE='4';  //用户付款关闭，允许付款、关闭
    static $ORDER_PAIED='10';   //已付款
    static $ORDER_REFUND='20';  //已退款
    static $ORDER_CLOSED='900';

    static $ORDER_TRY_TYPE=4;   //试用
    static $ENABLE_AMOUNT=array(2=>'住院',3=>'在家');


<script>

    function showconfirm(url)
{
    // 修改弹出框样式，改为使用共通的 modified by 郭志强 2015/08/25
    $.noty.warning({
        width: '720px',
        context: '注意：请核实该患者是否已经完成线下付款！如果该患者尚未付款，请点击“取消”；点击“确认”后，系统将为患者开启日常训练。',
        buttons: {
        ok: {
          text: '确定',
          handler: function(){
            var form = document.getElementById('confirmform');
            form.action=url;
            form.submit();
          }
        },
        cancel: {
          text: '取消'
        }
      }
    });
}
</script>


html中post和get区别，是不是用get的方法用post都能办到？
1. get是从服务器上获取数据，post是向服务器传送数据。
2. get是把参数数据队列加到提交表单的ACTION属性所指的URL中，值和表单内各个字段一一对应，在URL中可以看到。post是通过HTTP post机制，将表单内各个字段与其内容放置在HTML HEADER内一起传送到ACTION属性所指的URL地址。用户看不到这个过程。
3. 对于get方式，服务器端用Request.QueryString获取变量的值，对于post方式，服务器端用Request.Form获取提交的数据。
4. get传送的数据量较小，不能大于2KB。post传送的数据量较大，一般被默认为不受限制。但理论上，IIS4中最大量为80KB，IIS5中为100KB。
5. get安全性非常低，post安全性较高。但是执行效率却比Post方法好。

建议：
1、get方式的安全性较Post方式要差些，包含机密信息的话，建议用Post数据提交方式；
2、在做数据查询时，建议用Get方式；而在做数据添加、修改或删除时，建议用Post方式；





//从count个数据中取出第cycle个周期的num个数据的索引
function getCycle($count,$cycle=1,$num=1)
{
    $idxs=array();
    //计算开始索引位置
    $start=(($cycle-1)*$num)%$count;

    for ($i=0,$j=0; $i < $num; $i++) {
        $idx=$start+$i;
        $idx==-1?$idx=$count-1:'';
        $idx<0?$idx=-$idx-1:'';
        $idx>=$count?$idx=$idx%$count:'';

        $idxs[]=$idx;
    }
    return $idxs;
}


下表列出了您能够在 $_SERVER 中访问的最重要的元素：
元素/代码                   描述
$_SERVER['PHP_SELF']    返回当前执行脚本的文件名。
$_SERVER['GATEWAY_INTERFACE']   返回服务器使用的 CGI 规范的版本。
$_SERVER['SERVER_ADDR'] 返回当前运行脚本所在的服务器的 IP 地址。
$_SERVER['SERVER_NAME'] 返回当前运行脚本所在的服务器的主机名（比如 www.w3school.com.cn）。
$_SERVER['SERVER_SOFTWARE'] 返回服务器标识字符串（比如 Apache/2.2.24）。
$_SERVER['SERVER_PROTOCOL'] 返回请求页面时通信协议的名称和版本（例如，“HTTP/1.0”）。
$_SERVER['REQUEST_METHOD']  返回访问页面使用的请求方法（例如 POST）。
$_SERVER['REQUEST_TIME']    返回请求开始时的时间戳（例如 1577687494）。
$_SERVER['QUERY_STRING']    返回查询字符串，如果是通过查询字符串访问此页面。
$_SERVER['HTTP_ACCEPT'] 返回来自当前请求的请求头。
$_SERVER['HTTP_ACCEPT_CHARSET'] 返回来自当前请求的 Accept_Charset 头（ 例如 utf-8,ISO-8859-1）
$_SERVER['HTTP_HOST']   返回来自当前请求的 Host 头。
$_SERVER['HTTP_REFERER']    返回当前页面的完整 URL（不可靠，因为不是所有用户代理都支持）。
$_SERVER['HTTPS']   是否通过安全 HTTP 协议查询脚本。
$_SERVER['REMOTE_ADDR'] 返回浏览当前页面的用户的 IP 地址。
$_SERVER['REMOTE_HOST'] 返回浏览当前页面的用户的主机名。
$_SERVER['REMOTE_PORT'] 返回用户机器上连接到 Web 服务器所使用的端口号。
$_SERVER['SCRIPT_FILENAME'] 返回当前执行脚本的绝对路径。
$_SERVER['SERVER_ADMIN']    该值指明了 Apache 服务器配置文件中的 SERVER_ADMIN 参数。
$_SERVER['SERVER_PORT'] Web 服务器使用的端口。默认值为 “80”。
$_SERVER['SERVER_SIGNATURE']    返回服务器版本和虚拟主机名。
$_SERVER['PATH_TRANSLATED'] 当前脚本所在文件系统（非文档根目录）的基本路径。
$_SERVER['SCRIPT_NAME'] 返回当前脚本的路径。
$_SERVER['SCRIPT_URI']  返回当前页面的 URI。



 $result=TrainhistoryModel::getInstance()->getList(array(
            'where'=>array('user_id'=>$user['id'],'lesson_type'=>$lesson,'add_time >= '=>$start,'add_time <= '=>$end,'train_id'=>$nowtag),
            'order_by'=>'id desc'
        ));




////////////////////////////////
         $msg=$result?'修改成功':'修改失败';
            $this->message(array('msg'=>$msg,'backurl'=>site_url('assess/testfactor'),'ref'=>3));
        $this->layout->setSlot('content',array('testfactorinfo'=>$testfactorinfo),'testfactor/edit.php');
        $this->layout->view();
//////////////////

       function shortnameExist(){
        if($this->isGet){
            $shortname=$this->input->get('shortname');

            $name=AssessmanageServices::getInstance()->getAllScales(array('where'=>array('SHORTNAME'=>$shortname)));
            if ($name) {
                $info["status"] = 1;
                $info["msg"]='短名称已经存在！';
                }
        }
        $this->outJson($info);
    }
function remind(){
    $('#remind').html('');
    var shname=$('#shortname').attr('names');
    var shortname=$('#shortname').val();
    if(shname==shortname){return false}
    if(shortname.trim()==''){return false}
    $.ajax({
        url: '<?=site_url('assess/shortnameExist')?>',
        type: 'get',
        dataType: 'json',
        data: 'shortname='+shortname,
        success:function(data) {
            console.log(data);
            if(data.status == 1){
                    $('#remind').html(data.msg);

                }
        }
    })
};
///////////////////
    /**
     * 快捷编辑排序
     * [editOrderidx description]
     * @return [type] [description]
     */
    function editOrderidx(){
        $test='false';
        if($this->isPost){
            $sid=$this->input->post('id');
            $data['ORDERIDX']=$this->input->post('order');
            $data['MODIFYEMPID']=$this->assessmanager['id'];
            $data['MODIFYTIME']=TimeServices::getNow();
            $result=AssessmanageServices::getInstance()->editOrder($sid,$data);
            if($result){
                $test='true';
            }
        }
        $data=array('result'=>$test);
        $this->outJson($data);

    }
    /**
     *   批量删除
     * [deleteBatch description]
     * @return [type] [description]
     */
    function deleteBatch(){
        $test='false';
        if($this->isPost){
            $sidx=$this->input->post('ids');
            foreach($sidx as $sid){
                $tem=AssessmanageServices::getInstance()->scaledelete($sid);
            }

            if($tem){
                $test='true';
            }
        }
        $data=array('result'=>$test);
        $this->outJson($data);
    }





 判断编码问题
function toEncode($str,$tocode='UTF-8')
{
    $code=mb_detect_encoding($str, "UTF-8, gb2312, gbk,EUC-CN");
    return mb_convert_encoding($str,$tocode,$code);

}




$sicks=array();
                $userinfo['sicks']=$userinfo['sicks']?$userinfo['sicks']:array();
                $arr=array();
                foreach($userinfo['sicks'] as $k=>$val){
                    $arr[]=$k;
                }
                //print_r($arr);die;
                $sickinfo=SicksServices::getInstance()->getsickinfo($uid,$arr);
                $sickinfo=$sickinfo?$sickinfo:array();
                $t=array();
                foreach($sickinfo as $v) $t[$v['uuid']] = $v;
                $sickinfo = $t;
                foreach ($sickinfo as $key => &$value) {
                    $f='';
                    if($value['sick_input_type']==3){
                            if(isset($userinfo['sicks'])){
                                foreach($userinfo['sicks'] as $k=>$vv){
                                    if($k==$key){
                                        $f=$vv;
                                    }
                                }
                            }

                        }
                        $value['content']=$f;
                }
                unset($value);
                // print_r($sickinfo);die;
                $ages = array();
                foreach ($sickinfo as $user) {
                    $ages[] = $user['sick_type'];
                }

                array_multisort($ages, SORT_DESC, $sickinfo);
                $b=array();

                foreach($sickinfo as $v) $b[$v['id']] = $v;
                    $sickinfo = $b;
                $tree = array();
                foreach ($sickinfo as $it)
                if (isset($sickinfo[$it['sick_parent']]))
                    $sickinfo[$it['sick_parent']]['son'][] = &$sickinfo[$it['id']];
                else
                    $tree[] = &$sickinfo[$it['id']];
                $userinfo['sicks']=$tree;
                foreach ($userinfo['sicks'] as $kk => $vve) {
                        if(isset($vve['sick_input_type'])&&($vve['sick_input_type']==3)){
                            $sick[$vve['sick_icd']]=$vve['sick_name'].'('.$vve['content'].')';
                        }else{
                            if(isset($vve['son'])){
                            foreach($vve['son'] as $vue){
                                $sick[$vue['sick_icd']]=$vve['sick_name'].'-'.$vue['sick_name'];
                            }


                        }else{
                            $sick[$vve['sick_icd']]=$vve['sick_name'];
                        }
                    }
                echo $skinid;
                print_r($sick);
                }
                $num=array();
                foreach ($sick as $kky => $vvl) {
                    if($arrjson[$kky]){
                        $num[]=$arrjson[$kky][$skinid];
                    }

                }
                // print_r($sick);die;
                $num=min($num);
                return $num;


                <?=$course['startLevel']===null?'null':$course['startLevel']?>



请求 防止session过期
 1、   setInterval(function() {
        $.ajax({
            url: '<?=site_url('assess/heartbeat')?>',
            type: 'get',
            dataType: 'json',
            data: ''
        }).done(function() {
            console.log("请求页面，success");
        }).fail(function() {
            console.log("请求页面，error");
        }).always(function() {
            console.log("请求页面，complete。"+(new Date()).toLocaleString());
        });
    }, 1000*60*5);
2、
    function heartbeat()
    {
        $msg='false';
        $user=getlogin("assessmanager");
        if ($user) {
            $msg='ok';
        }
        $this->outJson($msg);
    }
3、function getlogin($name='user')
{
    return get_session($name);
}

4、
    if ( ! function_exists('get_session'))
{
    function get_session($name)
    {
        $ci=&get_instance();
        $ci->load->library('session');
        return $ci->session->userdata($name);
    }
}



在跳转到的页面使用jquery

        $(document).ready(function(){

        //刷新函数

        myrefresh();

        });

        function myrefresh()
        {
        window.location.reload();
        }

                $this->message
                弹出信息
                    function message($args=array(),$tpl='index')
                    {
                        $backurl=$this->input->get('backurl');
                        $backurl?$args['backurl']=$backurl:'';
                        $this->layout->setSlot('content',array('args'=>$args),'message/'.$tpl.'.php');
                        $this->layout->view();
                        $this->output->_display();
                        die;
                    }
        ///刷新页面函数
        function myrefresh(){
            window.location.reload();
        }

    任意数目的以上选项都可以用“或”来连接（用 OR 或 |），这样可以报告所有需要的各级别错误。例如，下面的代码关闭了用户自定义的错误和警告，执行了某些操作，然后恢复到原始的报错级别：
            <?php
            //禁用错误报告
            error_reporting(0);

            //报告运行时错误
            error_reporting(E_ERROR | E_WARNING | E_PARSE);

            //报告所有错误
            error_reporting(E_ALL);
            ?>


function downloadfile($file,$filename='')
{
    $filename = !$filename?basename($file):$filename;
    header('Content-Description: File Transfer');
    header("Content-type: application/octet-stream");

    /////////////////////////处理中文文件名
    $ua = $_SERVER["HTTP_USER_AGENT"];
    $encoded_filename = rawurlencode($filename);
    if (preg_match("/MSIE/", $ua)) {
        header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
    } else if (preg_match("/Firefox/", $ua)) {
        header("Content-Disposition: attachment; filename*=\"utf8''" . $filename . '"');
    } else {
        header('Content-Disposition: attachment; filename="' . $filename . '"');
    }

    header("Content-Length: ". filesize($file));
    readfile($file);
    die;
}
ss




@@ -8,7 +8,7 @@
 server {
    listen       80;
    server_name  localhost;
    root   {path};
    root   {path}/Web;
    index  index.html index.htm;
    #error_log  logs/error.log debug;
 @@ -39,7 +39,7 @@
 server {
     }
     location / {
        root {path}dist;
        root {path}/Frontend/dist;
         try_files $uri $uri/ /index.html;
     }




      try {
            $result=$services->checkRefresh($refresh);
        } catch (\Exception $e) {
            $message=$e->getCustomMessage();
            $this->response($message,'401');
        }

 function checkUserInfo($username,$password)
    {
        if(empty($username))
        {
            throw new WispiritException(array('error'=>'USERNAME_CAN_NOT_BE_NULL','error_description'=>'用户名不能为空'));
        }
        if (empty($password)) {
            throw new WispiritException(array('error'=>'PASSWORD_CAN_NOT_BE_NULL','error_description'=>'密码不能为空'));
        }
        return true;
    }


    function getOneRole($uuid)
    {
        $role=new RolesServices;
        if(!is_numeric($uuid)){
            $this->response(array('error'=>'ROLE_UUID_WAS_WRONG','error_description'=>'uuid错误'),'401');
        }else{
            $roles=array();
            try {
                $result= $role->getOneRole($uuid);
                $roles=array('uuid'=>$result['role_uuid'],'text'=>$result['role_name']);
                $this->response(array('data'=>$roles),'200');
            } catch (\Exception $e) {
                $message=$e->getCustomMessage();
                $this->response($message,'401');
            }

        }

    }



回滚
 $DB->trans_start();   **************
            foreach ($sqls as $sql) {
                $sql=trim($sql);
                if(!$sql || $sql[0]==='#' || $sql[0]==='-')continue;
                $this->execSqls[]=$sql;
                $DB->query($sql);
                $error = $DB->error();
                if ($error['code']) {
                    $lastError=$error['code'];
                    $data['msg'][]="Update database [failed].\r\n".$error['message']." \r\n".$sql.PHP_EOL;
                    continue;
                }else{
                    if (strpos('CREATE DATABASE', $sql)!==false) {
                        $this->dbExists=1;
                    }
                }
            }

            //执行成功写入记录
            $sql="INSERT INTO `sys_sql_ver` (`last_sql_file`, `add_time`) VALUES ('{$filePath}', '".\Wispirit\Lib\WispiritTimeFunc::time()."');";
            $DB->query($sql);

            $DB->trans_complete();

            if ($DB->trans_status() === FALSE)     **********************
            {
                foreach ($DB->query_times as $k => $val) {
                    if (!$val) {
                        echo $DB->queries[$k].PHP_EOL;
                    }
                }
                echo "Execute SQL file [ failed ] ".$value.PHP_EOL;
                return 500;
            }
            echo "Execute SQL file success ".$value.PHP_EOL;
        }
        return $lastError;




    Department:
        - getDepartmentList
        - getOneDepartment
    Roles:
        - getRoleList
        - getOneRole




        .htaccess  apatch和iis转换的



          if ($value) {
                        if (!$value['proto']) {
                            continue;
                        }
                        $list['name'] = $value['skin'];
                        $list['url'] = '/game/'.$value['proto'];
                        $proto = isset($value['proto'][0])?(explode('/', $value['proto'])[0]):'';
                        $list['skin'] = array();
                        if ($value['as'] && (isset($value['as']))) {
                            $list['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_'.$value['as'].'_small.jpg';
                            $list['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_'.$value['as'].'_large.jpg';
                            $list['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_'.$value['as'].'_intro.jpg';
                        } else {
                            $list['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_small.jpg';
                            $list['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_large.jpg';
                            $list['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_intro.jpg';
                        }
                        // $list['skin'] = $proto.'/'.$value['game_id'].'.jpg';
                        $gamelist[] = $list;






                        $list = $game[$gameId];
                    if (!$list['proto']) {
                        throw new WispiritException(array('error' => 'GAME_PROTO_NOT_EXISTS', 'error_description' => '游戏路径不存在！'));
                    }
                    if ($list['cogn'] && isset($list['cogn'])) {
                        foreach ($list['cogn'] as $key => $value) {
                            if ($cognlist[$value] && isset($cognlist[$value])) {
                                $onegame['cogn'][] = array('name' => $cognlist[$value]['name'],'description' => $cognlist[$value]['cogn_2_desc']);
                            }
                        }
                    } else {
                        $onegame['cogn'] = array();
                    }
                    $onegame['name'] = $list['skin'];
                    $onegame['duration'] = '120';
                    // $onegame['url'] = isset($list['proto'][0])?(explode('/', $list['proto'])[0].'/'.$list['game_id'].'.jpg'):'';
                    $onegame['url'] = '/game/'.$list['proto'];
                    $proto = isset($list['proto'][0])?(explode('/', $list['proto'])[0]):'';
                    $onegame['skin'] = array();
                    if ($list['as'] && (isset($list['as']))) {
                        $onegame['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_'.$list['as'].'_small.jpg';
                        $onegame['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_'.$list['as'].'_large.jpg';
                        $onegame['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_'.$list['as'].'_intro.jpg';
                    } else {
                        $onegame['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_small.jpg';
                        $onegame['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_large.jpg';
                        $onegame['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_intro.jpg';
                    }


doc:
    Auth:
        - login
        - refresh
        - logout
    Users:
        - getPatientList
        - getPatientDetail
        - addPatient
        - updatePatient
        - exportPatientList
        - me
        - getDoctorList
        - addDoctor
        - resetPassword
    UserTrainingProgram:
        - getProgramList
        - getProgramTplList
        - getUserCurrProgram
        - closeUserProgram
        - addUserProgram
        - updateUserProgram
        - getTrajectoryList
user:
    Auth:
        - login
        - refresh
        - logout
    Users:
        - getPatientDetail
        - updatePatient
        - me
    UserDailyTraining:
        - getGameScore
        - saveGame
        - getGameList
    UserTrainingProgram:
        - getProgramList
        - getProgramTplList
        - getUserCurrProgram
        - closeUserProgram
        - addUserProgram
        - updateUserProgram
        - getTrajectoryList
system:
    Auth:
        - login
        - refresh
        - logout
    Users:
        - getPatientDetail
        - updatePatient
        - me
        - addDoctor
        - getDoctorList
        - addPatient
        - resetPassword
        - getPatientList
        - exportPatientList
        - updateDoctor
        - getDoctor
        - test
        - fuzzyQueryIdentifier
    Orgs:
        - getOrgsList
    Department:
        - getDepartmentList
        - getOneDepartment
    Roles:
        - getRoleList
        - getOneRole
    Privileges:
        - getPrivilegesList
    Illness:
        - getIllnessList
        - addIllness
        - updateIllness
        - getIllnessDetail
        - getStandardList
    Game:
        - getGameList
        - getGameDetail
        - getCognList
        - getParaGameList
    UserDailyTraining:
        - getGameScore
        - saveGame
        - getGameList
    UserTrainingProgram:
        - getProgramList
        - getProgramTplList
        - getUserCurrProgram
        - closeUserProgram
        - addUserProgram
        - updateUserProgram
        - getTrajectoryList




{
    "b1b2_1_21": {
        "game_sno": {
            "b1_101010": "b1_101010",
            "b2_202010": "b2_202010"                              /////游戏标识
        },
        "skin": "动点点击",
        "game_id": "b1b2_1_21",
        "datatype": "2",
        "datadesc": "",
        "skin_no": "1",
        "maxlevel": "",
        "special": "0",
        "skip": "0",
        "priority": "",
        "priorityfor": "",
        "showintry": "",
        "istest": "",
        "nextstd": {
            "200": "200",
            "400": "400"
        },
        "nextgame": {
            "200": {
                "c1__9": ["c1_3010"],
                "b1g1__61": ["b1_1010", "g17030"]
            },
            "400": {
                "g1g1__61": ["g17030"]
            }
        },
        "upstd": "",
        "closestd": "",
        "proto": "shoot_disk\/game.html",
        "as": "disk",
        "para_code": "1",
        "cogn": {
            "b1": "b1",
            "b2": "b2"
        }
    },



游戏信息

<?php
namespace Wispirit\BaseModule\Game\Services;

use \Wispirit\Lib\WispiritException as WispiritException;

/**
* 基础模块
* 基础游戏services模块
*
* @uses
*
* @category Game
* @package  BaseModule
* @author    <>
* @license
* @link
*/
class GameServices extends \Wispirit\BaseModule\Basic\Services\BasicServices
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getAllgameInfo()
    {
        $file = SOURCE_PATH.'Data'.DIRECTORY_SEPARATOR.'json'.DIRECTORY_SEPARATOR.'game.json';
        if (is_file($file)) {
            $game = json_decode(file_get_contents($file), true);
        }
        return $game;
    }
    public function getAllcognInfo()
    {
        $file = SOURCE_PATH.'Data'.DIRECTORY_SEPARATOR.'json'.DIRECTORY_SEPARATOR.'cogn.json';
        if (is_file($file)) {
            $cogn = json_decode(file_get_contents($file), true);
        }
        return $cogn;
    }
    public function getAllparaInfo()
    {
        $file = SOURCE_PATH.'Data'.DIRECTORY_SEPARATOR.'json'.DIRECTORY_SEPARATOR.'para.json';
        if (is_file($file)) {
            $para = json_decode(file_get_contents($file), true);
        }
        return $para;
    }
    /**
     * [getGames 获得所有的GAME]
     * @return [type] [description]
     */
    public function getGames($oneId = '', $twoId = '', $page = array())
    {
        $gamelist = array();
        $game = $this->getAllgameInfo();
        $cogns = $this->getAllcognInfo();
        $para = $this->getAllparaInfo();
        $list = array();
        if ($game) {
            if ($oneId || $twoId) {
                $arr = array();
                if ($twoId) {
                    foreach ($game as $key => $value) {
                        $cogn = $value['cogn'];
                        if (isset($cogn[$twoId])) {
                            $arr[$key] = $value;
                        }
                    }
                } else {
                    if (isset($cogns[$oneId]['sub'])) {
                        foreach ($cogns[$oneId]['sub'] as $k => $v) {
                            $cognlist[] = $k;
                        }
                    }
                    if ($cognlist) {
                        foreach ($game as $key => $value) {
                            foreach ($cognlist as $k => $v) {
                                $cogn = $value['cogn'];
                                if (isset($cogn[$v])) {
                                    $arr[$key] = $value;
                                }
                            }
                        }
                    }
                }
            } else {
                $arr = $game;
            }
            if ($arr) {
                $list = array();
                foreach ($arr as $y => $val) {
                    // foreach ($val as $key => $value) {
                        $list = $this->getGameInfo($val['game_id']);
                    //     if ($value) {
                    //         if (!$value['proto']) {
                    //             continue;
                    //         }
                    //         $list['name'] = $value['skin'];
                    //         $list['url'] = '/game/'.$value['proto'];
                    //         $proto = isset($value['proto'][0])?(explode('/', $value['proto'])[0]):'';
                    //         $list['skin'] = array();
                    //         if ((isset($value['as'])) && $value['as']) {
                    //             $list['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_'.$value['as'].'_small.jpg';
                    //             $list['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_'.$value['as'].'_large.jpg';
                    //             $list['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_'.$value['as'].'_intro.jpg';
                    //         } else {
                    //             $list['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_small.jpg';
                    //             $list['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_large.jpg';
                    //             $list['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_intro.jpg';
                    //         }
                    //         if (isset($value['para_code']) && $value['para_code']) {
                    //             $list['para'] = $para[$value['para_code']]['para'];
                    //             $list['description'] = $para[$value['para_code']]['para_desc'];
                    //         }
                    //         $list['para'] = $list['para']?$list['para']:'';
                            $gamelist[] = $list;
                    //     }
                    // }
                }
            }
        } else {
            $gamelist = array();
        }
        return $gamelist;
    }
    public function getGameInfo($gameId)
    {
        $onegame = array();
        $game = $this->getAllgameInfo();
        $cogn = $this->getAllcognInfo();
        $para = $this->getAllparaInfo();
        if ($game) {
            if ($cogn) {
                foreach ($cogn as $k => $val) {
                    if (isset($val['sub']) && $val['sub']) {
                        foreach ($val['sub'] as $y => $v) {
                            $cognlist[$y] = $v;
                        }
                    }
                }
                if (isset($game[$gameId]) && $game[$gameId]) {
                    $list = $game[$gameId];
                    // if (isset($list['proto']) && !$list['proto']) {
                    //     continue;
                    // }
                    if (isset($list['cogn']) && $list['cogn']) {
                        foreach ($list['cogn'] as $key => $value) {
                            if ($cognlist[$value] && isset($cognlist[$value])) {
                                $onegame['cogn'][] = array('code' => $key,'name' => $cognlist[$value]['name'],'description' => $cognlist[$value]['cogn_2_desc']);
                            }
                        }
                    } else {
                        $onegame['cogn'] = array();
                    }
                    $onegame['name'] = $list['skin'];
                    $onegame['duration'] = '120';
                    //孙建中 20160123  为获取相对分数增加
                    $onegame['maxlevel'] = $list['maxlevel'];
                    // $onegame['url'] = isset($list['proto'][0])?(explode('/', $list['proto'])[0].'/'.$list['game_id'].'.jpg'):'';
                    $onegame['url'] = '/game/'.$list['proto'];
                    $proto = isset($list['proto'][0])?(explode('/', $list['proto'])[0]):'';
                    $onegame['skin'] = array();
                    if ((isset($list['as'])) && $list['as']) {
                        $onegame['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_'.$list['as'].'_small.jpg';
                        $onegame['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_'.$list['as'].'_large.jpg';
                        $onegame['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_'.$list['as'].'_intro.jpg';
                    } else {
                        $onegame['skin']['small'] = '/game/'.$proto.'/src/'.$proto.'_small.jpg';
                        $onegame['skin']['large'] = '/game/'.$proto.'/src/'.$proto.'_large.jpg';
                        $onegame['skin']['intro'] = '/game/'.$proto.'/src/'.$proto.'_intro.jpg';
                    }
                    if (isset($list['para_code']) && $list['para_code']) {
                        $onegame['para']['para_code'] = $para[$list['para_code']]['para_code'];
                        $onegame['para']['name'] = $para[$list['para_code']]['para'];
                        $onegame['para']['description'] = $para[$list['para_code']]['para_desc'];
                    }
                    $onegame['para'] = isset($onegame['para'])?$onegame['para']:'';
                    $onegame['game_sno'] = $list['game_sno'];
                    $onegame['game_id'] = $list['game_id'];
                    $onegame['nextstd'] = $list['nextstd'];
                    $onegame['upstd'] = $list['upstd'];
                    $onegame['closestd'] = $list['closestd'];
                    $onegame['as'] = $list['as'];
                }
            } else {
                throw new WispiritException(array('error' => '  COGNJSON_NOT_EXISTS', 'error_description' => '脑能力文件不存在！'));
            }
        } else {
            throw new WispiritException(array('error' => 'GAMEJSON_NOT_EXISTS', 'error_description' => '游戏文件不存在！'));
        }
        if ($onegame) {
            // $result = array('game_id' => $onegame['game_id'],'game_sno' => $onegame['game_sno'],'para' => $onegame['para'],'name' => $onegame['name'],'skin' => $onegame['skin'],'cogn' => $onegame['cogn'],'duration' => $onegame['duration'],'url' => $onegame['url']);
            //孙建中 20160123  为获取相对分数增加
            $result = array('game_id' => $onegame['game_id'],'game_sno' => $onegame['game_sno'],'para' => $onegame['para'],'name' => $onegame['name'],'skin' => $onegame['skin'],'maxlevel' => $onegame['maxlevel'],'cogn' => $onegame['cogn'],'duration' => $onegame['duration'],'url' => $onegame['url'],'nextstd' => $onegame['nextstd'],'as' => $onegame['as'],'upstd' => $onegame['upstd'],'closestd' => $onegame['closestd']);
            return $result;
        } else {
            return $onegame;
        }
    }


    /**获得脑能力列表
     * getCognList
     *
     * @access public
     *
     * @return mixed Value.
     */
    public function getCognList()
    {
        $arr = array();
        $arra = array();
        $list = array();
        $cogn = $this->getAllcognInfo();
        if ($cogn) {
            foreach ($cogn as $key => $value) {
                $arr['id'] = $value['code'];
                $arr['name'] = $value['name'];
                if (isset($value['sub']) && $value['sub']) {
                    $res = array();
                    foreach ($value['sub'] as $k => $val) {
                        $arra['id'] = $val['code'];
                        $arra['name'] = $val['name'];
                        $res[] = $arra;
                    }
                    $arr['child'] = $res;
                } else {
                    $arr['child'] = '';
                }
                $list[] = $arr;
            }
        }
        if ($list) {
            return $list;
        } else {
            throw new WispiritException(array('error' => 'COGNLIST_NOT_EXISTS', 'error_description' => '脑能力列表不存在！'));
        }
    }
    /**获取某脑能力下全部范式及相关游戏列表
     *[getCognAllList ]
     * @return array
     *
     */
    public function getParaGameList($oneId, $twoId)
    {
        $arr = array();
        $arra = array();
        $list = array();
        $para = $this->getAllparaInfo();
        $game = $this->getAllgameInfo();
        if ($para) {
            foreach ($para as $key => $value) {
                $temp = '';
                $arra['code'] = $value['para_code'];
                $arra['name'] = $value['para'];
                $arra['desc'] = $value['para_desc'];
                if ($value['cogn']) {
                    foreach ($value['cogn'] as $zhi => $zhen) {
                        if ($oneId && !$twoId) {
                            if (false !== strpos($zhi, $oneId)) {
                                $temp = 1;
                            }
                        }
                        if ($twoId && $oneId) {
                            if ($twoId == $zhi) {
                                $temp = 1;
                            }
                        }
                        if (!$oneId && !$twoId) {
                            $temp = 1;
                        }
                    }
                }
                if (!$temp) {
                    continue;
                }
                if ($game) {
                    foreach ($game as $k => $val) {
                        if ($val['para_code'] == $value['para_code']) {
                            $arr['name'] = $val['skin'];
                            $arr['code'] = $val['game_id'];
                            $fen = explode('/', $val['proto']);
                            if (isset($fen[0])) {
                                if ($val['as']) {
                                    $arr['pic'] = '/game/'.$fen[0].'/src/'.$fen[0].'_'.$val['as'].'_large.jpg';
                                } else {
                                    $arr['pic'] = '/game/'.$fen[0].'/src/'.$fen[0].'_large.jpg';
                                }
                            }
                            $arra['games'] = $arr;
                        }
                    }
                }
                $list[] = $arra;
            }
        }
        if ($list) {
            return $list;
        } else {
            throw new WispiritException(array('error' => 'COGNLIST_NOT_EXISTS', 'error_description' => '没能获取某脑能力下全部范式及相关游戏列表'));
        }
    }

    /**获取单个游戏信息
     * getGameDetail
     *
     * @param mixed $gameId Description.
     *
     * @access public
     *
     * @return mixed Value.
     */
    public function getGameDetail($gameId, $patientId)
    {
        $game = $this->getGameInfo($gameId);
        $mdel = new \Wispirit\DbModel\UserTrainingProgramStepGameModel();
        $medol = new \Wispirit\DbModel\UserTrainingProgramStepModel();
        if ($patientId) {
            $getone = $medol->getOne(array('where' => array('user_uuid' => $patientId)));
        }
        if ($gameId && isset($getone) && isset($getone['user_tps_uuid']) && $getone['user_tps_uuid']) {
            $one = $mdel->getOne(array('where' => array('user_tps_game_uuid' => $gameId, 'user_tps_uuid' => $getone['user_tps_uuid'] )));
        }
        if (isset($one['tps_game_dur']) && $one['tps_game_dur']) {
            $game['duration'] = $one['tps_game_dur'];
        }
        if (!$game) {
            throw new WispiritException(array('error' => 'CAN_NOT_GET_GAME_INFORMATION', 'error_description' => '没能获取单个游戏信息'));
        }
        return $game;
    }
}




E:\newproduct\WispiritCommonLib\PhpDevTool\vendor\bin;E:\newproduct\DevSoftWare\MySql64\bin;E:\newproduct\DevSoftWare\Nginx;E:\newproduct\DevSoftWare\Php56-64;E:\study\PhpDevTool\vendor\bin;E:\study\Nginx;E:\study\MySql64\bin;E:\study\Php56-64;E:\anzhuang\Git\cmd;E:\anzhuang;D:\mystudy\phpStudy\php56n;E:\names\WispiritCommonLib\PhpDevTool\vendor\bin;



        $updateill->trans_start(); }
            $updateill->trans_complete();
            if ($updateill->trans_status() === false) {
                throw new WispiritException(array('error' => 'UPDATE_FAILD', 'error_description' => '修改失败'));
            }




web开发中常用名词解释(缩写/翻译/英文全称)
　　HTTP:超文本传输协议（Hypertext Transfer Protocol）
WWW:万维网 (World Wide Web)
TCP/IP:传输控制协议/互联网络协议,是Internet最基本的协议 （Transmission Control Protocol/Internet Protocol)
URL:统一资源定位符（Uniform Resource Locator）
URI:资源标志符（Universal Resource Identifier）
JMS:是Java平台上有关面向消息中间件的技术规范，Java消息服务（Java Messaging Service）
HTML:超文本标记语言或超文本链接标示语言（HyperText Mark-up Language）
CSS :层叠样式表 Cascading Style Sheets
XML :即可扩展标记语言（eXtensible Markup Language）
JSON:是一种轻量级的数据交换格式 (JavaScript Object Notation)
DTD:文档类型定义(Document Type Definition)
AJAX:异步JavaScript和XML(Asynchronous JavaScript and XML)
SEO:搜索引擎最佳化（Search Engine Optimization）
DTO:数据传输对象（Data Transfer Object）
EJB:称为Java 企业 (Enterprise Java BeansEJB)
POJO:简单的Java对象（Plain Ordinary Java Objects）
JDBC:是一种用于执行SQL语句的Java API,java数据库连接（Java Data Base Connectivity）
WSDL:是一个用来描述Web服务和说明如何与Web服务通信的XML语言 (Web Services Description Language)
SOAP:简单对象访问协议 (Simple Object Access Protocol）
　　IoC:控制反转。它是一种设计模式 (Inversion of Control)
AOP:面向方面编程 (Aspect Oriented Programming)
OOP: 面向对象编程 (Object–Oriented Programming)
MVC:模型－视图－控制器 (Model View Controller)
ORM: 对象关系映射（Object Relational Mapping)
JDO:是Java对象持久化的新的规范 (Java Data Object )
JSP:是由Sun Microsystems公司倡导、许多公司参与一起建立的一种动态网页技术标准 (JavaServer Pages)
　　CGI: 全称是“公共网关接口” (Common Gateway Interface)
CMD: Windows系统基于command.com上的命令解释程序 （Windows Command Prompt）
shell: 命令行式



Array (
    [0] => Array ( [code] => a1_1_91 [gameTime] => 120 [name] => 打地鼠 [cogns] => Array ( [0] => Array ( [oneId] => a [twoId] => a1 [oneName] => 操作入门 [twoName] => 定点点击 ) ) [paraName] => 定点点击 )
    [1] => Array ( [code] => a2_2_91 [gameTime] => 120 [name] => 动点点击 [cogns] => Array ( [0] => Array ( [oneId] => a [twoId] => a2 [oneName] => 操作入门 [twoName] => 动点点击 ) ) [paraName] => 动点点击 )
    [2] => Array ( [code] => b1_3_11 [gameTime] => 120 [name] => 五彩纷呈 [cogns] => Array ( [0] => Array ( [oneId] => b [twoId] => b1 [oneName] => 感知觉 [twoName] => 颜色识别 ) ) [paraName] => 视觉搜索-入门 )
     [3] => Array ( [code] => b2e2_29_121 [gameTime] => 120 [name] => 百里挑一 [cogns] => Array ( [0] => Array ( [oneId] => b [twoId] => b2 [oneName] => 感知觉 [twoName] => 属性识别 ) [1] => Array ( [oneId] => e [twoId] => e2 [oneName] => 逻辑计算 [twoName] => 逻辑推理 ) ) [paraName] => 视觉搜索-标准 ) [4] => Array ( [code] => b2g1_4_61 [gameTime] => 120 [name] => 喜相逢 [cogns] => Array ( [0] => Array ( [oneId] => b [twoId] => b2 [oneName] => 感知觉 [twoName] => 属性识别 ) [1] => Array ( [oneId] => g [twoId] => g1 [oneName] => 情绪管理 [twoName] => 情绪识别 ) ) [paraName] => 视觉搜索-高阶 ) )





    public function checkIllnesName($name = '', $uuid = '')
    {
        $ill = new CommonIllnessModel();
        $result=array();
        if ($uuid) {
            $illlist = $ill->getList();
            if ($illlist) {
                foreach ($illlist as $key => $value) {
                    if ($value['illness_name'] == $args['illness_name']) {
                        $result=array('illnessName'=>$value['illness_name'],'uuid'=>$value[''])
                    }
                }
            }
        }
    }



    public function checkIllnesName()
    {
        $ill = new IllnessServices();
        $result = array();
        try {
            $name = $this->trimall($this->input->get('illnessName'));        //病症名称
            $uuid = $this->input->get('uuid');
            $uuid = $uuid?$uuid:'';
            $result = $ill->checkIllnesName($name, $uuid);
            $this->response(array('uuid' => $result));
        } catch (\Exception $e) {
            $message = $e->getCustomMessage();
            $this->response($message, '500');
        }
    }
    public function checkEncoding()
    {
    }













//获得疾病信息

       public function checkIllnes($args = '', $uuid = '')
    {
        $ill = new CommonIllnessModel();
        $result = array();
        if ($uuid) {
            $illnameinfo = array();
            if (isset($args['illness_name']) && $args['illness_name']) {
                $illnameinfo = $ill->getOne(array('where' => array('illness_name' => $args['illness_name'])));
            }
            if (isset($args['encoding']) && $args['encoding']) {
                $illnameinfo = $ill->getOne(array('where' => array('illness_code' => $args['encoding'])));
            }
            if ($illnameinfo) {
                if ($illnameinfo['illness_uuid'] !== $uuid) {
                    $result = array('illnessName' => $illnameinfo['illness_name'],'uuid' => $illnameinfo['illness_uuid']);
                }
            }
        } else {
            $illlist = $ill->getList();
            if ($illlist) {
                if (isset($args['illness_name']) && $args['illness_name']) {
                    foreach ($illlist as $key => $value) {
                        if ($value['illness_name'] == $args['illness_name']) {
                            $result = array('illnessName' => $value['illness_name'],'uuid' => $value['illness_uuid']);
                        }
                    }
                }
                if (isset($args['encoding']) && $args['encoding']) {
                    foreach ($illlist as $key => $value) {
                        if ($value['illness_code'] == $args['encoding']) {
                            $result = array('illnessName' => $value['illness_name'],'uuid' => $value['illness_uuid']);
                        }
                    }
                }
            }
        }
        return $result;
    }

//检测疾病名称和编码石佛存在
       public function checkIllnesName()
    {
        $ill = new IllnessServices();
        $result = array();
        try {
            $args['illness_name'] = $this->trimall($this->input->get('illnessName'));        //病症名称
            $uuid = $this->input->get('uuid');
            $uuid = $uuid?$uuid:'';
            $result = $ill->checkIllnes($args, $uuid);
            $this->response(array('data' => $result, 'message' => array()));
        } catch (\Exception $e) {
            $message = $e->getCustomMessage();
            $this->response($message, '500');
        }
    }
    public function checkEncoding()
    {
        $ill = new IllnessServices();
        $result = array();
        try {
            $args['encoding'] = $this->trimall($this->input->get('encoding'));        //病症名称
            $uuid = $this->input->get('uuid');
            $uuid = $uuid?$uuid:'';
            $result = $ill->checkIllnes($args, $uuid);
            $this->response(array('data' => $result, 'message' => array()));
        } catch (\Exception $e) {
            $message = $e->getCustomMessage();
            $this->response($message, '500');
        }
    }


        - checkIllnesName
        - checkEncoding




        UPDATE `wispiritdb`.`user_training_program_step_game` SET `tps_game_times` = 2, `modify_time` = '1454487505'
WHERE `user_utp_uuid` = '24398931920158940'
AND `user_tps_uuid` = '24398931920159554'
AND `tps_game_id` = 'c2_7_31'


////////////////////递归 获得无限分类的详细的显示
                                    public function trees($arr, $illness_parent_uuid = '0', $lev = 0, $init = 0)
                                    {
                                        $arr = $arr?$arr:array();
                                        $other = array();
                                        foreach ($arr as $v) {
                                            $other[$v['illness_uuid']] = $v;
                                        }
                                        $arr = $other;
                                        static $list = array();
                                        if ($init) {
                                            $list = array();
                                        }
                                        foreach ($arr as $v) {
                                            if ($v['illness_parent_uuid'] == $illness_parent_uuid) {
                                                //echo str_repeat(" -- ", $lev).$v['illness_name']."<br />";//这里输出，是为了看效果
                                                $v['level'] = $lev;
                                                $list[] =  $v;
                                                $this->trees($arr, $v['illness_uuid'], $lev + 1);
                                            }
                                        }
                                        return $list;
                                    }
                                       public function trimall($str)//删除空格
                                    {
                                        $primary = array(" ","　","\t","\n","\r");
                                        $now = array("","","","","");
                                        return str_replace($primary, $now, $str);
                                    }

【单例模式含义】
单例模式是一种常用的软件设计模式。在它的核心结构中只包含一个被称为单例类的特殊类。通过单例模式可以保证系统中一个类只有一个实例而且该实例易于外界访问，从而方便对实例个数的控制并节约系统资源。如果希望在系统中某个类的对象只能存在一个，单例模式是最好的解决方案。
【采用单例模式动机、原因】
对于系统中的某些类来说，只有一个实例很重要，例如，一个系统中可以存在多个打印任务，但是只能有一个正在工作的任务；一个系统只能有一个窗口管理器或文件系统；一个系统只能有一个计时工具或ID(序号)生成器。如在Windows中就只能打开一个任务管理器。如果不使用机制对窗口对象进行唯一化，将弹出多个窗口，如果这些窗口显示的内容完全一致，则是重复对象，浪费内存资源；如果这些窗口显示的内容不一致，则意味着在某一瞬间系统有多个状态，与实际不符，也会给用户带来误解，不知道哪一个才是真实的状态。因此有时确保系统中某个对象的唯一性即一个类只能有一个实例非常重要。
如何保证一个类只有一个实例并且这个实例易于被访问呢？定义一个全局变量可以确保对象随时都可以被访问，但不能防止我们实例化多个对象。一个更好的解决办法是让类自身负责保存它的唯一实例。这个类可以保证没有其他实例被创建，并且它可以提供一个访问该实例的方法。这就是单例模式的模式动机。
【单例模式优缺点】
【优点】
一、实例控制
单例模式会阻止其他对象实例化其自己的单例对象的副本，从而确保所有对象都访问唯一实例。
二、灵活性
因为类控制了实例化过程，所以类可以灵活更改实例化过程。
【缺点】
一、开销
虽然数量很少，但如果每次对象请求引用时都要检查是否存在类的实例，将仍然需要一些开销。可以通过使用静态初始化解决此问题。
二、可能的开发混淆
使用单例对象（尤其在类库中定义的对象）时，开发人员必须记住自己不能使用new关键字实例化对象。因为可能无法访问库源代码，因此应用程序开发人员可能会意外发现自己无法直接实例化此类。
三、对象生存期
不能解决删除单个对象的问题。在提供内存管理的语言中（例如基于.NET Framework的语言），只有单例类能够导致实例被取消分配，因为它包含对该实例的私有引用。在某些语言中（如 C++），其他类可以删除对象实例，但这样会导致单例类中出现悬浮引用。



单列模式应用

【【【【【
class BaseModel
{
    public  $errsno=0;
    public  $error='';
    public static $table='';
    protected  $db,$ci,$resultcount=0;
    protected static  $_instance = array();
    function __construct() {
        $this->ci=&get_instance();
        $this->db=$this->ci->db;
    }

    public static function getInstance() {
        $call=get_called_class();
        if (!isset(static::$_instance[$call])) {
            static::$_instance[$call] = new $call();
        }

        return static::$_instance[$call];
    }

    function setTable($table)
    {
        self::$table=$table;
        return static::$_instance[__CLASS__];
    }


    function getResultCount($args=array())
    {
        if(!isset($args['from']))$args['from']=static::$table;
        if(!$args)return 0;
        if (isset($args['limit'])) {
            unset($args['limit']);
        }
        foreach ($args as $key => $value) {
            if (in_array($key,array('join','where_in','like'))) {
                call_user_func_array(array($this->db,$key), $value);
            }else{
                $this->db->$key($value);
            }
            // $this->db->$key($value);
        }
        $count=$this->db->count_all_results();
        return $count;
    }


    function getList($args=array(),$map='')
    {
        if(!isset($args['from']))$args['from']=static::$table;

        $list=array();
        $limit=array();
        foreach ($args as $key => $value) {
            if($key!='limit')
            {
                if (in_array($key,array('join','where_in','like'))) {
                    call_user_func_array(array($this->db,$key), $value);
                }else{
                    $this->db->$key($value);
                }

            }else{
                $limit=explode(',', $value);
            }
        }

        if($limit)
        {
            if (count($limit)==2) {
                $this->db->limit($limit[1],$limit[0]);
            }else{
                $this->db->limit($limit[0]);
            }
        }


        $query=$this->db->get();
        // echo $this->db->last_query().'<br>';

        if ($query->num_rows()>0) {
            foreach ($query->result_array() as $row) {
                if($map)
                {
                    $list[$row[$map]]=$row;
                }else{
                    $list[]=$row;
                }

            }
        }
        return $list;
    }



    function getOne($args=array())
    {
        if(!isset($args['from']))$args['from']=static::$table;
        $args['limit']=1;

        $specMethod=array('select_max','select_sum');

        foreach ($args as $key => $value) {
            if(!in_array($key, $specMethod))
            {
                $this->db->$key($value);
            }else{
                if (is_array($value)) {
                    $this->db->$key($value[0],$value[1]);
                }else{
                    $this->db->$key($value);
                }
            }


            // switch ($key) {
            //     case 'select_sum':
            //         if (is_array($value)) {
            //             $this->db->select_sum($value[0],$value[1]);
            //         }else{
            //             $this->db->$key($value);
            //         }
            //         break;
            //     case 'select_max':
            //         if (is_array($value)) {
            //             $this->db->select_max($value[0],$value[1]);
            //         }else{
            //             $this->db->$key($value);
            //         }
            //         break;
            //     default:
            //         $this->db->$key($value);
            //         break;
            // }

        }

        $query=$this->db->get();
        // echo $this->db->last_query().'<br>';
        if ($query->num_rows()>0) {
            $row=$query->row_array();
            return $row;
        }
        return FALSE;
    }


    function add($data=array(),$table='')
    {
        if(!$table)$table=static::$table;

        if (!$data) {
            return FALSE;
        }

        $query=$this->db->insert($table,$data);
        if($query)
        {
            $result=$this->db->insert_id();
        }else{
            $result=FALSE;
        }
        // echo $this->db->last_query().'<br>';
        return $result;
    }


    function addOnlyOne($data=array(),$where=array(),$table='')
    {
        if(!$table)$table=static::$table;

        if($where)
        {
            $exists=$this->getOne(array('where'=>$where,'from'=>$table));
            if($exists)
            {
                ErrorServices::setError('编号已存在');
                return FALSE;
            }
        }else{
            ErrorServices::setError('条件不存在');
            return FALSE;
        }

        return $this->add($data,$table);
    }

    function delete($where,$table='')
    {
        if(!$where)return FALSE;

        if(!$table)$table=static::$table;

        if(!$table)return FALSE;

        return $this->db->delete($table,$where);

    }

    function insert($data,$table='')
    {
        if(!$data)return FALSE;

        if(!$table)$table=static::$table;

        if(!$table)return FALSE;

        return $this->db->insert($table,$data);

    }

    function update($data,$where=array(),$table='')
    {
        if(!$data)return FALSE;

        if(!$table)$table=static::$table;

        if(!$table)return FALSE;

        if($where)
        {
            $result=$this->db->where($where)->update($table,$data);
        }else{
            $result=$this->db->update($table,$data);
        }
        // echo $this->db->last_query().'<br>';
        return $result;
    }

    function set($key, $value = '', $escape = TRUE)
    {
        //return CI DB CLASS!!
        return $this->db->set($key,$value,$escape);
    }

    function getLastID()
    {
        return $this->db->insert_id();
    }

    function query($sql='')
    {
        if(!$sql)return FALSE;
        $query=$this->db->query($sql);
        $list=array();
        if ($query) {
            if($query instanceof CI_DB_mysqli_result)
            {
                foreach ($query->result_array() as $row) {
                    $list[]=$row;
                }
            }else{
                return $query;
            }
        }
        return $list;
    }

    function getQueryCount($sql='')
    {
        $sql=trim($sql);
        if(!$sql)return FALSE;
        preg_match('/^select (.*?) from /is', $sql,$match);
        if ($match && $match[1]) {
            $count=0;
            // $sql=str_ireplace($match[1], 'count(1) as numrows', $sql, $count);
            $sql=substr_replace($sql, "select count(1) as numrows from ", strpos($sql, $match[0]), strlen($match[0]));
            preg_match('/limit([\s\d\,]+)$/is', $sql,$lmatch,PREG_OFFSET_CAPTURE);

            if ($lmatch) {
                $sql=substr($sql, 0, $lmatch[0][1]);
            }

            $query=$this->db->query($sql);
            $row=$query->row_array();
            return $row?(int)$row['numrows']:0;
        }
        return 0;

    }

    function getDB()
    {
        return $this->db;
    }

    function last_query()
    {
        return $this->db->last_query();
    }



}
】】】】】】】】


///get_called_class()用法
PHP 5.3.0中增加了一个static关键字来引用当前类，即实现了延迟静态绑定，同时PHP 5.3.0也实现get_called_class()函数用于查找当前被调用的类，而且允许使用变量作为类名调用静态属性或方法。那么在PHP 5.3.0中要实现上述功能有两种方法（可能不止两种）：

<?php
class A {
    public static $foo = array('A1');
    public static function make() {
        /*方法一，使用get_called_class()
        $test = get_called_class(); //获取当前被调用的类
        return $test::$foo; //使用变量作为类名调用静态成员属性
        */
        return static::$foo; //方法二，使用static关键字实现静态延迟绑定
    }
}
class B extends A {
    public static $foo = array('B1');

}
print_r(A::make());
echo "\n";
print_r(B::make());
?>
结果如下：
---------- Debug PHP ----------
Array
(
    [0] => A1
)

Array
(
    [0] => A1
)
】】】】】

正则匹配中文汉字
正则匹配中文汉字根据页面编码不同而略有区别：
GBK/GB2312编码：[x80-xff]+ 或 [xa1-xff]+
UTF-8编码：[x{4e00}-x{9fa5}]+/u
例子：
<?php
$str = "学习php是一件快乐的事。";
preg_match_all("/[x80-xff]+/", $str, $match);
//UTF-8 使用：
//preg_match_all("/[x{4e00}-x{9fa5}]+/u", $str, $match);
print_r($match);

输出
Array
(
    [0] => Array
        (
            [0] => 学习
            [1] => 是一件快乐的事。
        )

)

?>

    数组排序   array_multisort($ages, SORT_DESC, $sickinfo);

    $ages = array();
                foreach ($sickinfo as $user) {
                    $ages[] = $user['sick_type'];
                }

                array_multisort($ages, SORT_DESC, $sickinfo);


            $times = 0;
            if (isset($arr[$value['code']]) && $arr[$value['code']]) {
                $times = $arr[$value['code']]['tps_game_times'];
            }


        $tpgmodel = new \Wispirit\DbModel\UserTrainingProgramStepGameModel();
        $programs = $tpgmodel->getList(array('where' => array('user_utp_uuid' => '24439887419671135', 'user_tps_uuid' => '24439887419671166', 'tps_game_enable' => 1)));
        $programs = $programs?$programs:array();
        $arr = array();
        foreach ($programs as $v) {
            $b[$v['tps_game_id']] = $v;
        }
        $arr = $b;





        // $tpgmodel = new \Wispirit\DbModel\UserTrainingProgramStepGameModel();
        // $programs = $tpgmodel->getList(array('where' => array('user_utp_uuid' => '24439887419671182', 'user_tps_uuid' => '24439887419671195', 'tps_game_enable' => 1)));
        // $programs = $programs?$programs:array();
        // $arr = array();
        // foreach ($programs as $v) {
        //     $b[$v['tps_game_id']] = $v;
        // }
        // $arr = $b;
        // $value['code'] = 'c1_5_91';
        // $times = 0;
        // foreach ($arr as $key => $v) {
        //     if ($arr[$value['code']]) {
        //         $times = $arr[$value['code']]['tps_game_times'];
        //     }
        // }

        // echo $times;
        // print_r($arr);
        // die;




        //调整方案时 游戏玩的次数是上一次方案阶段次数
        $tpgmodel = new \Wispirit\DbModel\UserTrainingProgramStepGameModel();
        // $programs = $tpgmodel->getList(array('where' => array('user_utp_uuid' => $tpuuid, 'user_tps_uuid' => $args['user_tps_uuid'])));
        // $programs = $programs?$programs:array();
        // $arr = array();
        // $b = array();
        // foreach ($programs as $v) {
        //     $b[$v['tps_game_id']] = $v;
        // }
        // $arr = $b;



        $data = array(
        'gameId' => 'd1_12_71',
        'postback' => array(
                'lesson' => 'b',
               ' tpuuid' => '24451383889494895',
                'tpsuuid' => '24451383889494938',
            ),

        'gamedata' => array(
                'startpos' => '1',
            ),

        'transcript' => '',
        );



        <?=PRODLANG::$prodType?>