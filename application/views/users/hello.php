<?php

$username = $this->session->userdata('username');
echo "Hello, ".$username;

echo "<p>".anchor('login/Hello ', 'next')."</p>";

echo "<p>".anchor('home/do_logout', 'Log out')."</p>";