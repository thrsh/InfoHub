<!DOCTYPE html>
<html lang="en">
<?php

session_start();


if (!isset($_SESSION['admin_user'])) {
header('Location: index.html');
}

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>iNFO HUB - View Document</title>
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
                //"destroy":true;
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
  }
  /* Adjust the styles as per your requirements */
  #nav2 {
    background-image: url('img\bsu-nav.png');
  background-size: cover;
  background-position: center;

  nav {
    width: 600px; /* Custom width */
  }
  
}
  
#welcome{
  background-Color:#eb1c24;
  text:white;
}
#logout{
  background-Color: #FFFFFF;
  text:#eb1c24;
}

  </style>

    <script src="jquery.min.js"></script>

</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar" id="nav2" style="background-image: url('img/bsu-nav.png'); background-size: cover;
  background-repeat: no-repeat; height: 100px;">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#">
          <strong class="blue-text"></strong>
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
                  <li style="margin-top: 10px" id="welcome"class="text-light font-weight-bold h4 bg-danger p-2 mr-5 rounded">Welcome!, <?php echo ucwords(htmlentities($id)); ?></li>
          

            <li class="nav-item">
              <a href="logout.php" id="logout"class="nav-link text-danger font-weight-bold h4 bg-light p-2 mr-5 mt-2 rounded waves-effect">
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
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
           
        </a>
         <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
          <i class="fas fa-user mr-3"></i> Add Staff</a>
            <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i> View Staff/s</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user mr-3"></i> Add User</a>
           <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i> View User/s</a>
        <a href="add_document.php" class="list-group-item list-group-item-action active waves-effect">
          <i class="fas fa-file-medical"></i> Documents</a>
        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder-open"></i> View User File</a>
          <a href="#" class="list-group-item list-group-item-action waves-effect">
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
          <input type="text" id="orangeForm-name" name="name" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">Enter Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="admin_user" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-email">Enter Email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="admin_password" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Enter Password</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="admin_status" value = "Staff" class="form-control validate" readonly="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">User Role</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reg">Add Staff</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modaladmin-->
  <!--Add user-->
   <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_user.php" method="POST">
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
          <input type="text" id="orangeForm-name" name="name" class="form-control validate">
          <label data-error="Not Available" data-success="Available" for="orangeForm-name">Enter Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email_address" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-email">Enter Email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Enter Password</label>
        </div>
         <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "User" class="form-control validate" readonly="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">User Role</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reguser">Add User</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modaluser-->

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
            <span>Documents</span>
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
      <!-- Heading -->
      <div class="">
    <!--   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegisterForm">Add File</button> -->
    <a href="add_file.php"><button type="button" class="btn btn-danger"><i class="fas fa-file-medical"></i>  Add File</button></a>
    </div>
  
<hr>
 
 <div class="col-md-12">

 <table id="dtable" class = "table table-striped">
     <thead>

    <th>Filename</th>
    <th>FileSize</th>
    <th>DocumentTitle</th>
    <th>RetentionPeriod</th>
    <th>IssuanceDate</th>
    <th>Uploader</th>
     <th>Role</th>   
    <th>Date/Time Upload</th>
    <th>Downloads</th>
    <th>Action</th>

</thead>
<tbody>

    
    <tr>
        <?php 
   
        require_once("include/connection.php");

      $query = mysqli_query($conn,"SELECT DISTINCT ID,NAME,SIZE,EMAIL,ADMIN_STATUS,TIMERS,DOWNLOAD,DocumentTitle,RetentionPeriod,IssuanceDate FROM upload_files group by NAME DESC") or die (mysqli_error($con));
      while($file=mysqli_fetch_array($query)){
         $id =  $file['ID'];
         $name =  $file['NAME'];
         $size =  $file['SIZE'];
         $DocumentTitle =  $file['DocumentTitle'];
         $RetentionPeriod =  $file['RetentionPeriod'];
         $IssuanceDate =  $file['IssuanceDate'];
         $uploads =  $file['EMAIL'];
          $status =  $file['ADMIN_STATUS'];
         $time =  $file['TIMERS'];
         $download =  $file['DOWNLOAD'];
    
      ?>
     
      <td width="20%"><?php echo  $name; ?></td>
      <td><?php echo floor($size / 1000) . ' KB'; ?></td>
      <td><?php echo $DocumentTitle; ?></td>
      <td><?php echo $RetentionPeriod; ?></td>
      <td><?php echo $IssuanceDate; ?></td>
       <td><?php echo $uploads; ?></td>
       <td><?php echo $status; ?></td>
       <td><?php echo $time; ?></td>
      <td><?php echo $download; ?></td>


           <td>
            <a href='downloads.php?file_id=<?php echo $id; ?>'  
           class="btn btn-sm btn-outline-primary">
           <i class="fa fa-download"></i></a> 
           <a href='delete.php?ID=<?php echo $id; ?>' 
            class="btn btn-sm btn-outline-danger">
            <i class="fa fa-trash"></i></a>
            <a href='viewdoc.php?ID=<?php echo $id; ?>' 
            class="btn btn-sm btn-outline-danger">
            <i class="fa fa-file"></i></a>
    </tr>
<?php } ?>
</tbody>
   </table>
    </div>  
    <!--Copyright-->
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

</html>
