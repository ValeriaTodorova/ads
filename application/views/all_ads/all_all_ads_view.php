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
foreach($all_all_ads as $key => $value){
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
	
	echo "<td>".anchor('all_ads/show-update-all_ads/?id='.$value['id_all_ads'], 'Update')."</td>";
	echo "<td>".anchor('all_ads/del-all_ads/?id='.$value['id_all_ads'], 'Delete')."</td>";
	echo "</tr>";
}
echo "</table>";

echo anchor('all_ads/insert-all_ads/', 'Add new add');