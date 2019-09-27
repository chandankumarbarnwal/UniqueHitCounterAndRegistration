 <?php
 include "connect_db.php";
if (isset($_POST['name']) && isset($_POST['pass'])) {
	$pass = $_POST['pass'];
	$pass = md5($pass);
	$user=$_POST['name'];
	if(!empty($_POST['name']) && !empty($_POST['pass'])){
 	$query ="select id from  user_names where user='".mysqli_real_escape_string($connect, $user)."' and password='".mysqli_real_escape_string($connect,$pass)."'";
 	
		if($query_run=mysqli_query($connect,$query)){
		    if(mysqli_num_rows($query_run)){
		    			$row = mysqli_fetch_assoc($query_run);
		    			print_r($row);

		    			exit;


			    while($row = mysqli_fetch_assoc($query_run)){
				      $user_id = $row['id'];
				      $_SESSION['user_id']=$user_id;
				      // header('Location: index1.php');
			    }
		    }else{  
			echo '<br>This result not found';
		    }
		}
}
}
?>

<body>
<form action="<?php echo $current_file_name?>" method="POST">
	
user<input type="text" class="selects" name="name">
password <input type="text" name="pass">
<input type="submit" name="submit" value="submit">
</form>

</body>