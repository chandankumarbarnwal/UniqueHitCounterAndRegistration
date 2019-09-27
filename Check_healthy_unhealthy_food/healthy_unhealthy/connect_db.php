<?php
$host = 'localhost';
$user = 'root';
$pass = '';
@$connect= mysqli_connect ($host,$user,$pass) or die('could not connect.');
MySQLi_select_db($connect , 'a_database') or die('no such db');

?> 
