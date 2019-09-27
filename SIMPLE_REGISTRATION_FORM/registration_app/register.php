<?php

include "connect_db.php";
include "get_current_file_name.php";
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['surname'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $password_again = $_POST['password_again'];
    $password_again = md5($password_again);
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    if(!empty($username) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($surname)){
        if($password != $password_again){
         echo "Password is not same as above, please enter same password";
        }else{
             $query = "select user from user_names";
            if($query_run = mysqli_query($connect, $query)){
            	while ( $row=mysqli_fetch_array($query_run)) {
            		$user_arr[] = $row['user'];	 
                }
				if(in_array($username,$user_arr)){
        			echo "$username username already exist. Please enter different username.<br>";
        		}else{
        			  $query = "insert into user_names(user, password, firstname, surname) values('".mysqli_real_escape_string($connect,$username)."', '".mysqli_real_escape_string($connect,$password)."', '".mysqli_real_escape_string($connect,$firstname)."', '".mysqli_real_escape_string($connect,$surname)."')";
            			if ($query_run = mysqli_query($connect, $query)) {
            				echo "<br>this user name is entered.<br>";
            				header('Location: index1.php');
            			}
        		}
            }

        }

    }else{
    	echo "Please fill all the field...";
    }


}

?>

<form action="<?php $curren__file ?>" method="POST">
	Username:<br><input type="text" name="username" maxlength="50" value="<?php if(isset($username)){ echo $username;} ?>"><br><br>
	Password:<br><input type="password" name="password"><br><br>
	Password again:<br><input type="password" name="password_again"><br><br>
	Firstname: <br><input type="text" name="firstname" maxlength="50" value="<?php if(isset($firstname)){ echo $firstname;} ?>"><br><br>
	Surname: <br><input type="text" name="surname" maxlength="40" value="<?php if(isset($surname)){echo $surname;} ?>"><br><br>
	<input type="submit" name="submit" value="Submit">
	
</form>
