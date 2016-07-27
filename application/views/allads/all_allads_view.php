<?php
//echo "<pre>";
//var_dump($all_all_ads);
//echo "</pre>";

$i = 1;
echo "<table border=1>";
echo "<tr>";
	echo "<td>Number</td>";
	echo "<td>Description</td>";
	echo "<td>Price</td>";
	echo "<td>City</td>";
	echo "<td>Type</td>";
	echo "</tr>";
foreach($all_allads as $key => $value){
	echo "<tr>";
	echo '<td>'.$i++.'</td>';
	echo "<td>";
	echo $value['description'];
	echo "</td>";
	echo "<td>";
	echo $value['price'];
	echo "</td>";
	echo "<td>";
	echo $value['city_name'];
	echo "</td>";
	echo "<td>";
	echo $value['type_name'];
	echo "</td>";
	
	echo "<td>".anchor('allads/show-update-allads/?id='.$value['id_allads'], 'Update')."</td>";
	echo "<td>".anchor('allads/del-allads/?id='.$value['id_allads'], 'Delete')."</td>";
	echo "</tr>";
}
echo "</table>";

echo anchor('allads/insert-allads/', 'Add new add');