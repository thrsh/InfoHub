<!DOCTYPE html>
<html lang="en">
<?php

// // session_start();
// // if(!isset($_SESSION["admin_user"])){
// //     header("location:index.html");

// // } else{
// //     $uname = $_SESSION['admin_user'];
// // }

// if ($user_online == "true") {
//   if ($role == "admin") {
//   }else{
//   header("location:../");		
//   }
//   }else{
//   header("location:../");	
//   }
//   ?>
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>iNFO HUB - Dashboard</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  
  <link rel="icon" href="img\bsu-logo.png" type="image/png">
  <style>

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
#welcome{
  background-Color:#eb1c24;
  text:white;
}
#logout{
  background-Color: #FFFFFF;
  text:#eb1c24;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script>
    $(document).ready(function() {
      // Function to check if passwords match
      function checkPasswordMatch() {
        var password = $("#orangeForm-pass").val();
        var confirmPassword = $("#orangeForm-pass2").val();

        if (password !== confirmPassword) {
          $("#password-match-message").html("Passwords do not match!");
        } else {
          $("#password-match-message").html("Passwords match.");
        }
      }

      // Event handler for password and confirm password fields
      $("#orangeForm-pass, #orangeForm-pass2").keyup(checkPasswordMatch);
    });
  </script> -->
  <script>
    function validatePassword() {
      var password = document.getElementById("orangeForm-pass").value;
      var confirmPassword = document.getElementById("orangeForm-pass2").value;

      if (orangeForm-pass !== orangeForm-pass2) {
        document.getElementById("password-match-message").innerHTML = "Passwords do not match!";
        return false; // Prevent form submission
      } else {
        document.getElementById("password-match-message").innerHTML = "";
        return true; // Allow form submission
      }
    }
  </script>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar" id="nav2" style="background-image: url('img/bsu-nav.png'); background-size: cover;
  background-repeat: no-repeat; height: 100px">
  <!-- Rest of the code -->

      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#"     >
        <!-- <img src="img\bsu-nav.png" width="100" height="100" alt="Logo"> -->
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
                  <li style="margin-top: 10px" id="welcome"class="text-light font-weight-bold h4 p-2 mr-5 rounded">Welcome!, <?php echo ucwords(htmlentities($id)); ?></li>
          

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
 <div id="loader"></div>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed ">

      
        <img src="img\bsu-logo.png" width="150px" height="200px;" class="img-fluid text-center mt-5 ml-4" alt="">
      </a>

      <div class="list-group list-group-flush mt-5">
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
         <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
          <i class="fas fa-user mr-3"></i>Add Staff</a>
            <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i> View Staff</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user mr-3"></i>Add User</a>
           <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>  View User</a>
        <a href="add_document.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i> Documents</a>
        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder-open"></i> View User File</a>
          <a href="document_req.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-envelope"></i> Document Requests</a>
            <!-- <a href="admin_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> Admin logged</a>
              <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> User logged</a> -->
          
    <!--     <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
      </div>

    </div>
    <!-- Sidebar -->

  </header>
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
   
          <input type="password" id="orangeForm-pass" name="password1" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Password</label>
        
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
  
          <input type="password" id="orangeForm-pass2" name="password2" class="form-control validate" required="">
          <label data-error="Not Available" data-success="Available" for="orangeForm-pass">Confirm Password</label>
          <span id="password-match-message"></span>
        </div>
         <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="role1" value = "" class="form-control validate" readonly="">
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
            <span>Dashboard</span>
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

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-10 mb-4">

            <div class="col-md-5 mb-2">
        
          <!--Card-->
              <div class="card">

            <!--Card content-->
                <div class="card-body">

                  <?php
                    // $con  = mysqli_connect("localhost","root","","barchart");
                    //  if (!$con) {
                    //      # code...
                    //     echo "Problem in database connection! Contact administrator!" . mysqli_error();
                    //  }else{

                       require_once("include/connection.php");

                             $sql ="SELECT *,count(EMAIL) as count FROM upload_files group by EMAIL;";
                             $result = mysqli_query($conn,$sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $name[]  = $row['EMAIL']  ;
                                $counts[] = $row['count'];
                            }
                     
                     
                     
             
                     
                    ?>
                    <CENTER><h3 class="page-header" >File Upload</h5></CENTER>  
      

                <canvas id="myChart"></canvas>

            </div>

          </div>
        </div>
       
        <div class="col-md-4 mb-2">

          <!--Card-->
          <div class="card mb-4">

            <!-- Card header -->
            
            <div class="card-header text-center">
              Pie chart
            </div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="pieChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        
    <!--Copyright-->
    <div class="footer-copyright py-3">
   
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
     data: {
            labels:<?php echo json_encode($name); ?>,
            datasets: [{
                      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#6ae27e", "#dc69e2", "#687be2", "#e28868", "#6c68e2", "#ab68e2", "#e268b7"],
                      // hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"],
                data:<?php echo json_encode($counts); ?>,
            }]
        },
      options: {
          legend: {
            display: false
          },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]

        }
      }
    });



    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });



  
  </script>
</body>
</html>
