<?php
 if ($login_level == '1')
 {
  $query_sidebar = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_userID` = $login_id");
  $res_sidebar = mysqli_fetch_assoc($query_sidebar);
  }
  else if ($login_level == '2')
  {
    $query_sidebar = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_userID` = $login_id");
$res_sidebar = mysqli_fetch_assoc($query_sidebar);
    }
    else if ($login_level == '3')
    {
      $query_sidebar = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_userID` = $login_id");
$res_sidebar = mysqli_fetch_assoc($query_sidebar);
    }
    


$query_count_post = mysqli_query($con,"SELECT `post_owner_id` FROM `forum_topic` WHERE `post_owner_id` = $login_id");
$res_count_post = mysqli_num_rows($query_count_post);
$userType = "admin";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo ucfirst($page);?> | CAPSU PONTEVEDRA ALUMNI JOB PORTAL <?php echo $login_id; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="../assets/admin/plugins/morris/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="../assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../assets/admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Metis core stylesheet -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- metisMenu stylesheet -->
  <!-- <link rel="stylesheet" href="../assets/lib/metismenu/metisMenu.css"> -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>AJ</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Alumni</b> Portal</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../assets/img/profile_img/<?php echo $data_img?>" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  <?php 
                
                if ($login_level == '1')
   {
    echo $res_sidebar['student_fName']; 
    }
    else if ($login_level == '2')
    {
      echo $res_sidebar['teacher_fName']; 
      }
      else if ($login_level == '3')
      {
        echo $res_sidebar['admin_fName']; 
      }
                ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../assets/img/profile_img/<?php echo $data_img?>" class="img-circle" alt="User Image">

                  <p>
                    <?php
                    if ($login_level == '1')
                    {
                      echo $res_sidebar['student_lName'] . ', ' . $res_sidebar['student_fName'] . ' ' . $res_sidebar['student_mName'];
                     }
                     else if ($login_level == '2')
                     {
                      echo $res_sidebar['teacher_lName'] . ', ' . $res_sidebar['teacher_fName'] . ' ' . $res_sidebar['teacher_mName'];
                       }
                       else if ($login_level == '3')
                       {
                        echo $res_sidebar['admin_lName'] . ', ' . $res_sidebar['admin_fName'] . ' ' . $res_sidebar['admin_mName'];
                       }
                     
                     
                     ?>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer" style="background-color: rgba(0, 0, 0, 0.7)">
                  <div class="pull-left">
                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>