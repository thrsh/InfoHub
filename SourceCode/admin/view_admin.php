<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();
error_reporting(0);
   require_once("include/connection.php");
  $id = mysqli_real_escape_string($conn,$_GET['id']);


// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['admin_user'])) {
header('Location: index.html');
}
else{
    $uname=$_SESSION['admin_user'];
  //  $desired_dir="user_data/$uname/";
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>iNFO HUB - View Staff/s</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">

  <link rel="icon" href="img\bsu-logo.png" type="image/png">
    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="medias/css/dataTable.css" />
    <script src="medias/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
            });
  })
    </script>

  <style>
          select[multiple], select[size] {
    height: auto;
    width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
}

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
.dataTables_filter input[type="search"] {
    /* Add your custom styles here */
    /* For example: */
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 5px;
    width: 400px;
    /* Adjust the styles as per your requirements */
  }
  .dataTables_filter input[type="search"]:hover {
    border-color: red;
  
    /* Adjust the styles as per your requirements */
  }
  .dataTables_filter.clicked input[type="search"] {
  border-color: red;

  /* Adjust the styles as per your requirements */
}
#nav2 {
    background-image: url('img\bsu-nav.png');
  background-size: cover;
  background-position: center;

  nav {
    width: 600px; /* Custom width */
  }
  
}
  </style>

    <script src="jquery.min.js"></script>

</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar" id="nav2" 
    style="background-image: url('img/bsu-nav.png');background-repeat: no-repeat;background-size: cover;
   height: 100px;">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#">
        
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
          <!--   <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">About
                MDB</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                tutorials</a>
            </li> -->
          </ul>
            <?php 

             require_once("include/connection.php");


               $id = mysqli_real_escape_string($conn,$_SESSION['admin_user']);


              $r = mysqli_query($conn,"SELECT * FROM admin_login where id = '$id'") or die (mysqli_error($con));

              $row = mysqli_fetch_array($r);

               $id=$row['admin_user'];
               // $fname=$row['fname'];
               // $lname=$row['lname'];

            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                  <li style="margin-top: 10px" class="text-light font-weight-bold h4 bg-danger p-2 mr-5 rounded">Welcome!, <?php echo ucwords(htmlentities($id)); ?></li>
          

            <li class="nav-item">
              <a href="logout.php" class="nav-link text-danger font-weight-bold h4 bg-light p-2 mr-5 mt-2 rounded waves-effect">
              Logout
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

     
      
      <img src="img\bsu-logo.png" width="150px" height="200px;" class="img-fluid text-center mt-5 ml-4" alt="">
  
          <div class="list-group list-group-flush mt-5">

       
          <a href="dashboard.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chart-pie mr-3"></i> Dashboard</a>

         <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
          <i class="fas fa-user mr-3"></i> Add Staff</a>

            <a href="view_admin.php" class="list-group-item list-group-item-action active waves-effect">
          <i class="fas fa-users"></i> View Staff/s</a>

        <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user mr-3"></i> Add User</a>

           <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i> View User/s</a>

        <a href="add_document.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i> Documents</a>
        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder-open"></i> View User File</a>
          <a href="document_req.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-envelope"></i> Document Requests</a>
            <!-- <a href="admin_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> Admin Logs</a>
              <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> User Logs</a> -->

    <!--     <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
      </div>

    </div>
  <!--Add admin-->
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_Admin.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add Staff</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
         
          <input type="text" id="orangeForm-name" name="fname" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">First Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="lname" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">Last Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
        
          <input type="email" id="orangeForm-email" name="admin_user" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-email">Email</label>
        </div>
        
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
   
          <input type="password" id="orangeForm-pass" name="admin_password" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Password</label>
        
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
  
          <input type="password" id="orangeForm-pass2" name="admin_password2" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Confirm Password</label>
          <span id="password-match-message"></span>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="admin_status" value = "Staff" class="form-control validate" readonly="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">User Role</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-danger" name="reg">Add Staff</button>
      </div>
    </div>
  </div>
</div>

</form>
<!--end modaladmin-->
  <!--Add user-->
   <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_user.php" method="POST"  >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">

        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
         
          <input type="text" id="orangeForm-name" name="fname" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">First Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="lname" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">Last Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
        
          <input type="email" id="orangeForm-email" name="email_address" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-email">Email</label>
        </div>
        
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
   
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Password</label>
        
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
  
          <input type="password" id="orangeForm-pass2" name="admin_password2" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Confirm Password</label>
          <span id="password-match-message"></span>
        </div>
         <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "User" class="form-control validate" readonly="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">User Role</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-danger" name="reguser">Add User</button>
      </div>
    </div>
  </div>
</div>

</form>
<!--end modaluser-->
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->
 <div id="loader"></div>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5 mt-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard.php" class="text-danger">Homepage</a>
            <span>/</span>
            <span>View Staff</span>
          </h4>
<!-- 
          <form class="d-flex justify-content-center">
       
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>

          </form> -->

        </div>

      </div>
<div class="">
  
 <table id="dtable" class = "table table-striped">


          <thead>
              <th style='text-align: center;'>Name</th>
              <th style='text-align: center;'>Admin Email</th>
              <!-- <th>Admin Password</th> -->
              <th style='text-align: center;'>Role</th>
               <th style='text-align: center;'>Action</th>
          </thead><br /><br />
          <tbody>
     <?php
         require_once("include/connection.php");

            $query="SELECT * FROM tbl_users WHERE role ='Staff'";
            $result=mysqli_query($conn,$query);
            while($rs=mysqli_fetch_array($result)){
              $id =  $rs['id'];
               $fname = $rs['first_name'];
               $lname = $rs['last_name'];
               $admin = $rs['admin_user'];
              //  $pass=$rs['admin_password'];
               $status = $rs['role'];
           
          ?>       
    
           <tr>
               <td width='10%'><?php echo $fname.$lname; ?></td>
               <td style='text-align: center;'><?php echo $admin; ?></td>
               <!-- <td align='center' width="20%"><?php echo $pass; ?></td> -->
               <td style='text-align: center;'><?php echo $status; ?></td>
               <td style='text-align: center;'><a href="#modalRegisterFormsss?id=<?php echo $id;?>">
                <i class="fas fa-user-edit" data-toggle="modal" data-target="#modalRegisterFormsss"></i> </a> | <a href="delete_admin.php?id=<?php echo htmlentities($rs['id']); ?>"><i class='far fa-trash-alt'></i></a></td>
            
           </tr>
       
    <?php  } ?>
       </tbody>
   </table>

    <hr></div>
    <div class="footer-copyright py-3">
 
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

<!-- Card -->
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="js/popper.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/mdb.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>   
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>

</body>
  <!--modal--->






<div class="modal fade" id="modalRegisterFormsss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <?php 

require_once("include/connection.php");
  
$q = mysqli_query($conn,"select * from tbl_users where id = '$id'") or die (mysqli_error($conn));
 $rs1 = mysqli_fetch_array($q);
 
               $id1=$rs1['id'];
               $fname1=$rs1['first_name'];
               $lname1=$rs1['last_name'];
               $admin1=$rs1['admin_user'];
               $pass1=$rs1['admin_password'];
               $status=$rs1['admin_status'];
?>
  <div class="modal-dialog" role="document">
    <form method="POST">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-edit"></i> Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mx-3">
           <div class="md-form mb-5">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id1;?>"><br>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="first_name" value="<?php echo $fname1;?>" class="form-control validate">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">First Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="last_name" value="<?php echo $lname1;?>" class="form-control validate">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">Last Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="admin_user" value="<?php echo $admin1;?>" class="form-control validate">
          <label data-error="Not Available" data-success="Available" for="orangeForm-email">Email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="admin_password" value="<?php echo $pass1;?>" class="form-control validate">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Password</label>
        </div>
          <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="status" value = "Staff" class="form-control validate" readonly="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Role</label>
        </div>
      
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="edit2">UPDATE</button>
      </div>
    </div>
  </div>
</div>
</form>

  <!--modal--->
 <?php 

 require_once("include/connection.php");

  
 if(isset($_POST['edit2'])){
         $fname = mysqli_real_escape_string($conn,$_POST['first_name']);
         $lname = mysqli_real_escape_string($conn,$_POST['last_name']);
         $admin_user = mysqli_real_escape_string($conn,$_POST['admin_user']);
         $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT, array('cost' => 12));  
       //  $user_status = mysqli_real_escape_string($conn,$_POST['status']);

     mysqli_query($conn,"UPDATE `tbl_users` SET `first_name` = '$fname',`last_name` = '$lname', `admin_user` = '$admin_user', `admin_password` = '$admin_password' where id='$id'") or die (mysqli_error($conn));
  
  echo "<script type = 'text/javascript'>alert('Success Edit User/Employee!!!');document.location='view_admin.php'</script>";

}

?>

</html>
