<?php

//echo "<pre>";
//var_dump($cities);
//echo "</pre>";

//echo "<pre>";
//var_dump($types);
//echo "</pre>";

echo validation_errors();

echo "<h1>Insert new add</h1>";

echo form_open('allads/insert-allads');

echo"<p>Enter a add description</p>";
echo form_input('description');

echo"<p>Enter price</p>";
echo form_input('price');


$options_cities = array();

foreach ($cities as $city) {
	$options_cities[$city['id_city']] = $city['city_name'];
}

echo "<p>".form_dropdown('cities', $options_cities)."</p>";


$options_types = array();

foreach ($types as $type) {
	$options_types[$type['id_type']] = $type['type_name'];
}

echo "<p>".form_dropdown('types', $options_types)."</p>";

echo form_submit('submit', 'Save');
echo form_close();





