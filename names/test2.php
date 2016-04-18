<div id="header">
    <ul>
        <li>1</li>        
        <li>2</li>        
        <li>3</li>        
        <li>4</li>        
    </ul>
</div>
<div id="main">
    <ul>
        <li>5</li>        
        <li>6</li>        
        <li>7</li>        
        <li>8</li>        
    </ul>
</div>
 <script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    var header = $("#header");
    $("ul>li",header).css("background-color","#B2E0FF");
});
</script>