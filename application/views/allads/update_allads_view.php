<?php 
/*echo "<pre>";
var_dump($allads_info);
echo "</pre>";*/

//echo "<pre>";
//var_dump($cities);
//echo "</pre>";

//echo "<pre>";
//var_dump($price);
//echo "</pre>";

echo validation_errors();
echo form_open('allads/update-allads/'.$allads_info->id_allads);

//id
$data_id = array(
        'name'          => 'id_allads',
        'value'         => $allads_info->id_allads       
);

echo form_hidden($data_id);

//update description
echo "<p>Update add description</p>";
$data_description = array(
        'name'          => 'description',
        'value'         => $allads_info->description       
);
echo form_input($data_description);
//update price
echo "<p>Update price</p>";
$data_price = array(
        'name'          => 'price',
        'value'         => $allads_info->price       
);
echo form_input($data_price);
//update city_id
echo "<p>Update city</p>";
$options_cities = array();

foreach ($cities as $city) {
	$options_cities[$city['id_city']] = $city['city_name'];
}

echo "<p>".form_dropdown('cities', $options_cities)."</p>";

$data_city = array(
        'name'          => 'cities',
        'value'         => $allads_info->id_city     
);
//update type_id
echo "<p>Update type</p>";
$options_types = array();

foreach ($types as $type) {
	$options_types[$type['id_type']] = $type['type_name'];
}

echo "<p>".form_dropdown('types', $options_types)."</p>";

$data_type = array(
        'name'          => 'types',
        'value'         => $allads_info->id_type        
);
//echo form_textarea($data_sent_mess);

echo form_submit('submit', 'update');
echo form_close();