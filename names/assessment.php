多选
<script id='atpl'  type='text/x-jquery-tmpl'>
    <div class='answers'>
        选项：<input class='compact' name='scale[questions][${qidx}][answers][${aidx}][content]' type='text'>
        得分：<input class='compact' name='scale[questions][${qidx}][answers][${aidx}][score]' type='text' value='0'>
        
        <br>
    </div>
</script>

单选
<script id='atpl'  type='text/x-jquery-tmpl'>
    <div class='answers'>
        选项：<input class='compact' name='scale[questions][${qidx}][answers][${aidx}][content]' type='text'>
        得分：<input class='compact' name='scale[questions][${qidx}][answers][${aidx}][score]' type='text' value='0'>
        跳转第<input class='compact' name='scale[questions][${qidx}][answers][${aidx}][jump]' type='text' value='0'>题
        <input type='checkbox' name='scale[questions][${qidx}][answers][${aidx}][end]' value='1'>结束测评
        <button class='green' onclick='' type="button">上移</button>
        <button class='green' onclick='' type="button">下移</button>
        <button class='green' onclick='' type="button">删除</button>
        <br>
    </div>
</script>




文本

<script id='atpl'  type='text/x-jquery-tmpl'>
    <div class='answers'>
        说明：<input class='compact' name='scale[questions][${qidx}][answers][${aidx}][means]' type='text'>
        <input type='checkbox' name='scale[questions][${qidx}][answers][${aidx}][calcscore]' value='1'>计入得分
    	<button class='green' onclick='' type="button">删除</button>
        <br>
    </div>
</script>