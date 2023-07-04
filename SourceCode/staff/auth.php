<?php
date_default_timezone_set('Asia/Manila');
$last_login = date('d-m-Y h:m A [T P]');
require '../include/connection.php';
$username = mysqli_real_escape_string($conn, $_POST["admin_user"]);
$password = mysqli_real_escape_string($conn, $_POST["admin_password"]);

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE admin_user = :username AND admin_password = :password");
	$stmt->bindParam(':myemail', $username);
	$stmt->bindParam(':mypassword', $password);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	
	if ($rec == "0") {
        echo "<script type='text/javascript'>alert('Invalid Email Address or Password, Please try again!');
        document.location='index.html'</script>";
	}else{

    foreach($result as $row)
    {	
	$role = $row['role'];
	if ($role == "staff") {
	session_start();
    $_SESSION['logged'] = true;
    $_SESSION['myid'] = $row['id'];
    $_SESSION['myfname'] = $row['first_name'];
	$_SESSION['mylname'] = $row['last_name'];
    $_SESSION['myemail'] = $row['admin_user'];
	$_SESSION['mydate'] = $row['admin_password'];
	$_SESSION['mymonth'] = $row['admin_status'];
	
	}else if ($role == "instructor") {
	session_start();
    $_SESSION['logged'] = true;
    $_SESSION['myid'] = $row['id'];
    $_SESSION['myfname'] = $row['first_name'];
	$_SESSION['mylname'] = $row['last_name'];
    $_SESSION['myemail'] = $row['admin_user'];
	$_SESSION['mydate'] = $row['admin_password'];
	$_SESSION['mymonth'] = $row['admin_status'];
	
	}
    else {
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['myid'] = $row['id'];
        $_SESSION['myfname'] = $row['first_name'];
        $_SESSION['mylname'] = $row['last_name'];
        $_SESSION['myemail'] = $row['admin_user'];
        $_SESSION['mydate'] = $row['admin_password'];
        $_SESSION['mymonth'] = $row['admin_status'];
        
            
        }
	

    // try {
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    // $stmt = $conn->prepare("UPDATE tbl_users SET last_login = :lastlogin WHERE email= :email");
	// $stmt->bindParam(':lastlogin', $last_login);
    // $stmt->bindParam(':email', $username);
    // $stmt->execute();
	// header("location:../$role");
					  
	// }catch(PDOException $e)
    // {

    // }
	

	}
	
	}

					  
	}catch(PDOException $e)
    {

    }

?>