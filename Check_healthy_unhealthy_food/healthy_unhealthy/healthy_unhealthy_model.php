<?php

require "connect_db.php";
?>

<?php
if (isset($_POST['name']) && !empty($_POST['name'])) {
	$uh=$_POST['name'];
	$query ="select food, calories from  food where healthy_unhealthy= '$uh' order by id desc";
		if($query_run=mysqli_query($connect,$query)){
		    if(mysqli_num_rows($query_run)){
			    while($row = mysqli_fetch_assoc($query_run)){
				     echo ucwords($row['food']).' has '.$row['calories']."<br>";
			    }
		    }else{
			echo 'result not found';
		    }
		}
}
?>