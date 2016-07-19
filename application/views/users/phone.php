<?php

$username = $this->session->userdata('username');
echo "Hello, ".$username;

$phone = $this->session->userdata('phone');
echo "<p>Your phone number is: ".$phone."</p>";

echo "<p>".anchor('login/All_information', 'next')."</p>";

echo "<p>".anchor('home/do_logout', 'Log out')."</p>";