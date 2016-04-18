<style>
    textarea{
        width: 878px;
        height: 310px;
        border: 3px solid #cccccc;
        padding: 5px;
        font-family: Tahoma, sans-serif;
    }
    #timer{
        width:400px;
        float:left;

    }
    #upd_div{
        float:left;
        color:red;
    }

</style>
<script src="jquery-1.8.3.js"></script>
 <script>
     $(document).ready(function() {
         timePicker(3);
     });
 </script>
 <script>
 // timer code starts here ---
 //var init2 = 50;
     var s;
     function timePicker(vr) {
         if (vr > 0)
         {
             if (vr > 1) {
                   $('#timer').html('数据将在 '+ vr+' 秒后自动保存！');


             } else {

                   $('#timer').html('数据将在 1 秒后自动保存！');
             }
             vr--;
             s = setTimeout('timePicker(' + vr + ')', 1000);
         } else {
             clearInterval(s);

             $.post('data.php',{txt_area:$('#dstr').val()},function(r){
                  $('#upd_div').html("Last Updated: "+r);
             $('#timer').html('保存...数据将在 10 秒后自动保存！');
             s = setTimeout('timePicker(' + 10 + ')', 5000);
             return false;

             });
         }
     }
 </script>
 <html>
 <meta charset='utf-8'>
 <div class="content">
    <div class="heading">
        php实现在特定时间间隔自动保存数据
    </div>
    <div id='dv1'>
        输入内容：
        <textarea id="dstr"></textarea>
        <div id="timer_upd_dev"><div id="timer">X 秒 </div><div id="upd_div"> </div></div>
    </div>
</div>
    </html>
<?php
$con = mysqli_connect("localhost", "root", "root");
mysqli_select_db('text', $con);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['txt_area']) && $_POST['txt_area'] != '') {
    $data = $_POST['txt_area'];
    $qry = "Select count(*) as cnt from tbl_cms";
    $res = mysqli_query($con, $qry);
    while ($row = mysqli_fetch_array($res)) {
        $date_last_modified = date('Y-m-d H:i:s');


        if ($row['cnt'] == 0) {
            $qry_ins = "insert into tbl_cms ( header, content, date_created, date_last_modified )
     VALUES
     ('About Us', '333333', '" . $date_last_modified . "', '" . $date_last_modified . "' );";
            mysqli_query($con, $qry_ins);
        } else {
            $qry_upd = "Update `tbl_cms` set  `content`='" . $data . "',  `date_last_modified` ='" . $date_last_modified . "' where id=1";
            mysqli_query($con, $qry_upd);
        }
        echo $date_last_modified;
    }
}
