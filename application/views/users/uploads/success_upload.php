<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo "Hello!";

$first_name = $this->session->userdata('first_name');
echo "<p>You are: ".$first_name."</p>";

$phone = $this->session->userdata('phone');
echo "<p>Your phone number is: ".$phone."</p>";

$username = $this->session->userdata('username');
echo "<p>Your username is: ".$username."</p>";

 echo $upload_data;

?>

<p><img src="<?php echo base_url().'uploads/'.$upload_data;?>"></p>

<?php echo "<p>".anchor('login/upload/', 'Upload photo')."</p>"; ?>

<!--<p><?php //echo anchor('login/upload', 'Upload Another File!'); ?></p>-->

<?php 

echo "<p>".anchor('login/index2/', 'Update profile').' '.anchor('login/del_photo/', 'Delete profile')."</p>";

echo "<p>".anchor('home/do_logout', 'Log out')."</p>";
?>

</body>
</html>