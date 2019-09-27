<?php
ob_start();
$current_file_name =  $_SERVER['SCRIPT_NAME'];

function get_user_data($field_name){
	$id =  $_SESSION['user_id']; 
	$connect = $GLOBALS['connect'];
	$query = "select $field_name from user_names where id = $id";
     if($query_run = mysqli_query($connect, $query)){
     	return mysqli_fetch_assoc($query_run);
     }
}
?>