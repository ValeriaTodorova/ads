<?php

echo "Hello!";

// $first_name = $this->session->userdata('first_name');
// echo "<p>You are: ".$first_name."</p>";

// $phone = $this->session->userdata('phone');
// echo "<p>Your phone number is: ".$phone."</p>";

$username = $this->session->userdata('username');
echo "<p>Your username is: ".$username."</p>";


echo "<p>".anchor('login/upload/', 'Upload photo')."</p>";

//echo anchor('login/index2/', 'Update');

//echo "<p>".anchor('login/del_photo/', 'Delete')."</p>";



echo "<p>".anchor('home/do_logout', 'Log out')."</p>";