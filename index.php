<?php 
include('action/login_action.php');
if(isset($_SESSION['login_user']))
{           
            $user=$_SESSION['login_user'];// passing the session user to new user variable
            include('db.php');
            $query = mysqli_query($con,"SELECT * FROM `user_account` WHERE `user_name`= '$user'", $connection); //SQL query to fetch information of registerd users and finds user match.
            $rows = mysqli_fetch_assoc($query);
                if ($rows['user_level'] == '1' || $rows['user_level'] == '2' || $rows['user_level'] == '3') //checking if acclevel is equal to 0
                {   
                    header("location: pages/dashboard.php");// retain to dashboard 
                }
                else
                {
                     header("location: index.php");
                }

    
            
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAPSU PONTEVEDRA ALUMNI PORTAL | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/admin/plugins/iCheck/square/blue.css">
  <style type="text/css">
  .navbar .navbar-nav {
    display: inline-block;
    float: none;
    vertical-align: top;
  }

  .navbar .navbar-collapse {
    text-align: center;
  }
  </style>
</head>

<body class="hold-transition login-page">
  <div id="dialogoverlay"></div>
  <div id="dialogbox">
    <div>
      <div id="dialogboxhead"></div>
      <div id="dialogboxbody"></div>
      <div id="dialogboxfoot"></div>
    </div>
  </div>
  <div class="login-box">

    <div class="text-center">
      <img src="assets/img/capsu-logo-nobg.png" alt="Capsu Logo" style="width: 100px;">
      <h5>Capiz State University Pontevedra</h5>
      <h3>Alumni Portal</h3>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <div class="tab-content">
        <div id="login-student" class="tab-pane active">
          <form method="POST" role="form">
            <p class="text-muted text-center">
            Student <br>
              Enter your student number and password
            </p>
            <!-- <div class="form-group has-feedback"><input name="username" type="text" placeholder="Student Number"
                class="form-control" required="" onkeyup="numberInputOnly(this);"></div> -->
                <div class="form-group has-feedback"><input name="username" type="text" placeholder="Student Number"
                class="form-control" required=""></div>

            <div class="form-group has-feedback"><input name="password" type="password" placeholder="Password"
                class="form-control"></div>

            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit-student" value="Sign in">

          </form>
        </div>

        <div id="login-teacher" class="tab-pane">
          <form method="POST" role="form">
            <p class="text-muted text-center">
            Teacher <br>
              Enter your username and password
            </p>
            <div class="form-group has-feedback"><input name="username" type="text" placeholder="Username"
                class="form-control"></div>
            <div class="form-group has-feedback"><input name="password" type="password" placeholder="Password"
                class="form-control"></div>


            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit-teacher" value="Sign in">
          </form>
        </div>

        <div id="login-admin" class="tab-pane">
          <form method="POST" role="form">
            <p class="text-muted text-center">
            Administrator <br>
              Enter your username and password
            </p>
            <div class="form-group has-feedback"><input name="username" type="text" placeholder="Username"
                class="form-control"></div>
            <div class="form-group has-feedback"><input name="password" type="password" placeholder="Password"
                class="form-control"></div>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit-teacher" value="Sign in">
          </form>
        </div>

        <div id="signup" class="tab-pane">
          <form method="POST" action="action/signup_action.php">
            <!-- <div class="form-group has-feedback"><input type="text" placeholder="Student Number"
                class="form-control top" required="" onkeyup="numberInputOnly(this);" name="student_number"></div> -->

                <div class="form-group has-feedback"><input type="text" placeholder="Student Number"
                class="form-control top" required="" name="student_number"></div>


            <div class="form-group has-feedback"><input type="password" placeholder="Password"
                class="form-control middle" required="" name="password"></div>

            <div class="form-group has-feedback"><input type="password" placeholder="Re-password"
                class="form-control middle" required="" name="re_password"></div>

            <div class="form-group has-feedback"><input type="text" placeholder="Secret Question"
                class="form-control middle" required="" name="secret_question"></div>

            <div class="form-group has-feedback"><input type="text" placeholder="Secret Answer"
                class="form-control bottom" required="" name="secret_answer"></div>
            <input class="btn btn-lg btn-success btn-block" type="submit" name="submit-signup_student" value="Register">
          </form>
        </div>

      </div>
      <hr>
      <div class="text-center">
        <a class="text-muted " href="#login-student" data-toggle="tab">Login as Student</a> |
        <a class="text-muted " href="#login-teacher" data-toggle="tab">Login as Teacher</a> | <br>
        <a class="text-muted " href="#login-admin" data-toggle="tab">Login as Administrator</a>
      </div>
      <hr>
      <a href="#signup" data-toggle="tab" class="text-center btn-block">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <nav class="navbar navbar-primary navbar-fixed-bottom" style="background-color: #3C8DBC;">
    <div class="container">
      <div class="navbar-header">
        <img src="assets/img/capsu-logo-nobg.png" alt="Capsu Alumni Job Portal"
          style="width: 40px; height:40px; margin-top: 6px; margin-right: 6px;">
        <a class="navbar-brand" href="#" style="color: #000;">Capsu Alumni Portal</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav list-inline">
          <li class="active"><a href="#" style="color: #000;">Login</a></li>
          <li><a href="#" data-toggle="modal" data-target="#objective" style="color: #000;">Department Objective</a></li>
          <li><a href="#" data-toggle="modal" data-target="#goal" style="color: #000;">Mission, Vision & Goals</a></li>
          <li><a href="#" data-toggle="modal" data-target="#Overview" style="color: #000;">Overview</a></li>
          <li><a href="#" data-toggle="modal" data-target="#SystemDeveloper" style="color: #000;">System Developer</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>
  <?php include('modals/modal.php'); ?>
  <!-- jQuery 2.2.3 -->
  <script src="assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="assets/admin/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="assets/admin/plugins/iCheck/icheck.min.js"></script>
  <script type="text/javascript">
  (function($) {
    $(document).ready(function() {
      $('.list-inline li > a').click(function() {
        var activeForm = $(this).attr('href') + ' > form';
        //console.log(activeForm);
        $(activeForm).addClass('animated fadeIn');
        //set timer to 1 seconds, after that, unload the animate animation
        setTimeout(function() {
          $(activeForm).removeClass('animated fadeIn');
        }, 1000);
      });
    });
  })(jQuery);

  //NUMBER ONLY
  function numberInputOnly(elem) {
    var validChars = /[0-9]/;
    var strIn = elem.value;
    var strOut = '';
    for (var i = 0; i < strIn.length; i++) {
      strOut += (validChars.test(strIn.charAt(i))) ? strIn.charAt(i) : '';
    }
    elem.value = strOut;
  }
  //LETTER ONLY
  function letterInputOnly(elem) {
    var validChars = /[a-zA-ZñÑ .]+/;
    var strIn = elem.value;
    var strOut = '';
    for (var i = 0; i < strIn.length; i++) {
      strOut += (validChars.test(strIn.charAt(i))) ? strIn.charAt(i) : '';
    }
    elem.value = strOut;
  }
  </script>
</body>

</html>