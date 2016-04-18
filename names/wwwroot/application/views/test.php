head.php
<?php 
  //echo $title;
  echo $list;
  echo "<table border='1' cellspacing='0'>";
  foreach($list as $key=>$value){
  echo "<tr>";
  echo "<td>{$value['id']}</td>";
  echo "<td>{$value['name']}</td>";
  echo "</tr>";
}
  echo "</table>";
  echo "<hr/>";

?>

<table border='1' cellspacing='0'>

	<tr>
		<td>ID</td>
		<td>名字</td>
	</tr>
	<?php
          // echo 1111;die;
	foreach($list as $item):
     print_r($item);//die;

?>
	<tr>
		<td><?php echo $item['id']?></td>
		<td><?php echo $item['name']?></td>
	</tr>
	<?php endforeach;?>
</table>

<?php $my_array = array("a" => "Dog", "b" => "Cat", "c" => "Horse");

asort($my_array);
print_r($my_array);?>