 <div class="cg_sywx" >
                  <div class="sywx_thickbox"  title="sywx">施引文献</div>
                  <{if $references}>
                  <{foreach $references as $key=>$value}>
                  <table class ="xz_list1" style="width:200px;height:200px;boeder:1px solid black;display:none">
                      <tr><td>
                          <{if $value['title'] !=""}>
                          <span class="tit"><a href="#">$value['title']</a></span>
                          <{else}>
                          <span class="tit"><a href="#">$value['title_en']</a></span>
                          <{/if}><span class='de'>取消</span>
                        </td>
                      </tr>

                    </table>
                  </div>
                  <script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.sywx_thickbox').click(function(){
        $('.xz_list1').css('display','block');
    })
    $('.de').click(function(){
       $('.xz_list1').css('display','none');
    });
})
  </script>


不是可以么
