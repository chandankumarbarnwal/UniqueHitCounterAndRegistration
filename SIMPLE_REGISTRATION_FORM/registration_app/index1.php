<?php
	session_start();
	include "get_current_file_name.php";
	include "connect_db.php";

	if(@isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		$firstname = get_user_data('firstname')['firstname'];
		$surname = get_user_data('surname')['surname'];
	   echo " You are logged in: <strong>$firstname $surname</strong>."." &nbsp;Do you want to <a href='log_out.php'>Log out</a>";
	}else{
		 echo "Do you want to login.";
	   include "loginform_model.php";
	   echo "Do you want to create another account.<a href='register.php'>New account</a>";
	}
?>