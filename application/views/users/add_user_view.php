<?php


echo validation_errors();

echo "<h1> Регистрация</h1>";
echo form_open('login/index');

echo"<p>Enter username</p>";
echo form_input('username');

echo"<p>Enter passowrd</p>";
echo form_password('password');

echo form_submit('submit', 'Регистрация');

echo form_close();

echo "<h1> Ако сте регистриран ппотребител </h1>";

echo "<p>".anchor('login/log_in', 'Login')."</p>";
