<?php

 require_once("include/connection.php");
   
   if(isset($_POST['reguser'])){
    
        
         $user_fname = mysqli_real_escape_string($conn,$_POST['fname']);
		 $user_lname = mysqli_real_escape_string($conn,$_POST['lname']);
         $email_address = mysqli_real_escape_string($conn,$_POST['email_address']);
         $user_password = password_hash($_POST['password1'], PASSWORD_DEFAULT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
		//  $user_password = md5($_POST['user_password']);
         $user_status = mysqli_real_escape_string($conn,$_POST['role1']);

	$q_checkadmin = $conn->query("SELECT * FROM `tbl_users` WHERE `admin_user` = '$email_address'") or die(mysqli_error());
		$v_checkadmin = $q_checkadmin->num_rows;
		if($v_checkadmin == 1){
			echo '
				<script type = "text/javascript">
					alert("Email Address already taken");
					window.location = "dashboard.php";
				</script>
			';
		}else{
			$conn->query("INSERT INTO `tbl_users` VALUES('','$user_fname','$user_lname', '$email_address', '$user_password', '$user_status')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Employee Info");window.location = "dashboard.php";
				</script>
			';
		}
	}	


 ?>