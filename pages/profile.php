<?php 
include('../session.php');
include('../db.php');

$page = 'dashboard';
$_SESSION['page'] = '';
if ($login_level == '1')
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['student_img']; 
    $userType = "student";
}
else if ($login_level == '2')
{
    $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
    $userType = "teacher";
}
else if ($login_level == '3')
{
    $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['admin_img']; 
    $userType = "admin";
}

include('inc/header.php');
if ($login_level == '1')
{
  include('inc/sidebar-student.php');
 }
 else if ($login_level == '2')
 {
   include('inc/sidebar-teacher.php');
   }
   else if ($login_level == '3')
   {
     include('inc/sidebar-admin.php');
   }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Forum
      <small>General Forum</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Manage Profile</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <style type="text/css">
            .bio-graph-heading {
              background: #263a4f;
              color: #fff;
              text-align: center;
              font-style: italic;
              padding: 40px 110px;
              font-size: 16px;
              font-weight: 300;
            }

            .bio-row {
              width: 50%;
              float: left;
              margin-bottom: 10px;
              padding: 0 15px;
            }

            .bio-row p span {
              width: 100px;
              display: inline-block;
            }

            @import "lesshat";

            @distance: 40px;
            /* distance between stacked modals*/

            @modal-translate-z: -340px;
            /* The first modal translateZ value*/

            .transform(@translateZ) {
              -webkit-transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
              -ms-transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
              -o-transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
              transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
            }

            .preserve-3d() {
              -webkit-transform-style: preserve-3d;
              -ms-transform-style: preserve-3d;
              -o-transform-style: preserve-3d;
              transform-style: preserve-3d;
            }

            .perspective(@perspective) {
              -webkit-perspective: @perspective;
              -moz-perspective: @perspective;
              -ms-perspective: @perspective;
              -o-perspective: @perspective;
              perspective: @perspective;
            }

            .container {
              margin: 5em auto;
            }

            .modal.in {
              .perspective(2000px);

              .modal-dialog {
                &.aside {
                  .transform(@modal-translate-z);
                  .preserve-3d();

                  &.aside-1 {
                    .transform(calc(@modal-translate-z + @distance));
                  }

                  &.aside-2 {
                    .transform(calc(@modal-translate-z + (@distance * 2)));
                  }

                  &.aside-3 {
                    .transform(calc(@modal-translate-z + (@distance * 3)));
                  }

                  &.aside-4 {
                    .transform(calc(@modal-translate-z + (@distance * 4)));
                  }

                  &.aside-5 {
                    .transform(calc(@modal-translate-z + (@distance * 5)));
                  }
                }
              }
            }
            </style>
            <div class="tab-content" style="
    border-width: 1px 1px 2px;
    border-style: solid;
    border-top: none;
    border-right-color: #ccc!important;
    border-bottom-color: #ccc!important;
    border-left-color: #ccc!important;">

              <div id="profile" class="tab-pane active">
                <section class="panel">
                  <div class="bio-graph-heading">

                  </div>
                  <div class="panel-body bio-graph-info">
                  <?php if ($login_level == 1)
                  {
                    ?>
                    <a href="" class="pull-left btn btn-primary" data-toggle="modal"
                        data-target="#update-modal">UPDATE DATA</a>
                        <br>
                    <h1>Bio Graph
                    <?php }?>
                  
                    
                      <a href="" class="pull-right btn btn-primary" data-toggle="modal"
                        data-target="#test-modal">EDIT ACCOUNT</a></h1>
                        
                    <div class="row">
                      <div class="bio-row">
                        <img class="media-object img-thumbnail user-img" alt="User Picture"
                          src="../assets/img/profile_img/<?php echo $res_sidebar[$userType.'_img'];?>"
                          style="width: 64px; height: 64px;">
                      </div>
                      <div class="bio-row"></div>
                      <div class="bio-row">
                        <p><span>Full Name </span>:
                          <?php echo $res_sidebar[$userType.'_fName']." ",$res_sidebar[$userType.'_mName']." ",$res_sidebar[$userType.'_lName'];?>
                        </p>
                      </div>
                      <div class="bio-row">
                        <p><span>Address </span>: <?php echo $res_sidebar[$userType.'_address'];?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Status</span>: <?php 
                                                  $civilStat = $res_sidebar[$userType.'_civilStat'];
                                                  $c_q = mysqli_query($con,"SELECT * FROM `marital_status` WHERE ID = '$civilStat'");
                                                  $c_n = mysqli_fetch_array($c_q);
                                                  print_r($c_n['marital_Name']);

                                                  ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Gender </span>: <?php 
                                                  if ($res_sidebar[$userType.'_gender'] == "M" || $res_sidebar[$userType.'_gender'] == "m" ) {
                                                   echo "Male";
                                                  }
                                                  else
                                                  {
                                                    echo "Female";
                                                  }
                                                  
                                                  ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Mobile </span>: <?php echo $res_sidebar[$userType.'_contact'];?></p>
                      </div>
                      <?php 
                                                if ($userType == "student") {
                                                  ?>
                      <div class="bio-row">
                        <p><span>ID Number </span>: <?php echo $res_sidebar[$userType.'_IDNumber'];?></p>
                      </div>
                      <?php
                                                  
                                                }
                                                ?>
                      <?php 
                                                if ($userType == "student") 
                                                {
                                                  ?>
                      <div class="bio-row">
                        <p><span>Admission Date </span>: <?php echo $res_sidebar[$userType.'_admission'];?></p>
                      </div>
                      <?php
                                                }
                                                ?>
                      <?php 
                                                if ($userType != "admin") 
                                                {
                                                   ?>
                      <div class="bio-row">
                        <?php 
                                                  if ($userType == "student") 
                                                  {
                                                    ?>
                        <p><span>Course </span>:
                          <?php
                                                    $z = mysqli_query($con,"SELECT cc.course_name FROM `user_student_detail` usd
INNER JOIN capsu_course cc ON usd.student_course = cc.course_ID WHERE student_userID = $login_id");
                                                    $z = mysqli_fetch_array($z);
                                                   echo $z['course_name'];
                                                  }
                                                  else if ($userType == "teacher")
                                                  {
                                                    ?>
                          <p><span>College </span>: <?php
                                                     $department_ID  = $res_sidebar[$userType.'_department']; 
                                                     $z = mysqli_query($con,"SELECT cd.department_name FROM `user_teacher_detail` utd
INNER JOIN capsu_department cd ON utd.teacher_department = cd.department_ID WHERE teacher_userID = $login_id");
$z = mysqli_fetch_array($z);
                                                     echo $z['department_name'];
                                                  }
                                                  else{

                                                  }

                                                  ?></p>
                      </div>
                      <?php
                                                }
                                                ?>
                    </div>
                  </div>
                </section>
              </div>




              <div class="container">

<!-- update data Modal -->
<div class="modal fade" id="update-modal" data-modal-index="1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Update Data</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_tracer" action="../action/updatetracer.php" name="update_tracer" method="post">
                        <?php 
                        $z = mysqli_query($con,"SELECT * FROM student_tracer_detail WHERE student_ID = " . $res_sidebar[$userType.'_IDNumber']);
                        $z = mysqli_fetch_array($z); ?>
                        <div class="form-group">
                        <label class="control-label col-lg-4" for="idnumber">ID Number</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="idnumber" id="idnumber"
                                value="<?php echo $z["student_ID"];?>" readonly>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-lg-4">Date Hired for Current Job</label>
                            <div class="col-lg-4">
                              <input type="date" class="validate[required] form-control" name="datehired" id="datehired"
                                value="<?php echo $z["date_hired_current_job"];?>">
                            </div>
                          </div>

                          <div class="form-group">
                        <label class="control-label col-lg-4" for="statusemployment">Status of Employment After Graduation</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="statusemployment" id="statusemployment"
                                value="<?php echo $z["status_employment"];?>">
                            </div>
                            </div>

                            <div class="form-group">
                        <label class="control-label col-lg-4" for="monthlyincome">Monthly Income</label>
                            <div class="col-lg-4">
                              <input type="number" class="validate[required] form-control" name="monthlyincome" id="monthlyincome"
                                value="<?php echo $z["monthly_income"];?>">
                            </div>
                            </div>

                            <div class="form-group">
                        <label class="control-label col-lg-4" for="percentageincrease">Percentage Increase in Income</label>
                            <div class="col-lg-4">
                              <input type="number" class="validate[required] form-control" name="percentageincrease" id="percentageincrease"
                                value="<?php echo $z["percentage_increase"];?>">
                            </div>
                            </div>

                            <div class="form-group">
                        <label class="control-label col-lg-4" for="employer">Employer</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="employer" id="employer"
                                value="<?php echo $z["employer"];?>">
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_tracer" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->




                <!-- Edit Modal -->
                <div class="modal fade" id="test-modal" data-modal-index="1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Edit Detail</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="editModal" action="action/update.php" name="editModal">
                          <div class="form-group">
                            <label class="control-label col-lg-4">Change Picture</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-changepic">Update
                                Picture</a>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-lg-4">Full Name</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-name">Update Name</a>
                            </div>

                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Gender</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-gender">Update
                                Gender</a>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Change Password</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-newpassword">Update
                                Password</a>
                            </div>

                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Address</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-address">Update
                                Address</a>
                            </div>

                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Civil Status</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-cstatus">Update
                                Status</a>
                            </div>

                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Birth Day</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-bday">Update
                                Birthday</a>
                            </div>

                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Contact</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-contact">Update
                                Contact</a>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Secret Question</label>
                            <div class="col-lg-4">
                              <a class="btn btn-default" data-toggle="modal" data-target="#modal-secretquestion">Update
                                Secret Question</a>
                            </div>

                          </div>
                        </form>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


                <div class="modal fade" id="modal-changepic" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Change Picture</h4>
                      </div>
                      <div class="modal-body center" style="height: 250px;">

                        <div class="col-sm-6">
                          <form class="form" action="../action/upload.php?login_id=<?php echo $login_id?>" method="POST"
                            enctype="multipart/form-data">
                            Select image to upload:
                            <div class="form-group">
                              <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <input type="submit" value="Upload Image" name="submit" class="btn btn-primary">
                          </form>
                        </div>
                        <div class="col-sm-6">

                          <a class="user-link" href="#">
                            <img class="media-object img-thumbnail user-img" alt="User Picture"
                              src="../assets/img/profile_img/<?php echo $data_img?>"
                              style="width: 128px; height: 128px;">
                          </a>
                        </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade" id="modal-newpassword" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">New Password</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_password" method="POST" action="../action/update.php">
                          <div class="form-group">
                            <label class="control-label col-lg-4">Password</label>
                            <div class="col-lg-4">
                              <input type="password" class="validate[required] form-control" name="new_password"
                                id="req" value="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Confirm Password</label>
                            <div class="col-lg-4">
                              <input type="password" class="validate[required] form-control" name="new_repassword"
                                id="req" value="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_pass" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade" id="modal-secretquestion" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">New Recovery Secret Question and Answer</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_squestion" method="POST"
                          action="../action/updateprofile.php">
                          <div class="form-group">
                            <label class="control-label col-lg-4">Secret Question</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="new_squestion" id="req"
                                value="<?php echo $res_sidebar[$userType.'_secretquestion'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Secret Answer</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="new_sanswer" id="req"
                                value="<?php echo $res_sidebar[$userType.'_secretanswer'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_squestion" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade" id="modal-contact" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">New Contact</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_contact" method="POST"
                          action="../action/updateprofile.php">
                          <div class="form-group">
                            <label class="control-label col-lg-4">Contact</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="new_contact" id="req"
                                value="<?php echo $res_sidebar[$userType.'_contact'];?>" maxlength="11"
                                onkeyup="numberInputOnly(this);">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_contact" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



                <div class="modal fade" id="modal-bday" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Edit Birthday</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_bday" method="POST"
                          action="../action/updateprofile.php">
                          <div class="form-group">
                            <label class="control-label col-lg-4">Birthday</label>
                            <div class="col-lg-4">
                              <input type="date" class="validate[required] form-control" name="new_bday" id="req"
                                value="<?php echo $res_sidebar[$userType.'_dob'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_bday" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


                <div class="modal fade" id="modal-address" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Edit Address</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_address" method="POST"
                          action="../action/updateprofile.php">
                          <div class="form-group">
                            <label class="control-label col-lg-4">Address</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="new_address" id="req"
                                value="<?php echo $res_sidebar[$userType.'_address'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_address" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


                <div class="modal fade" id="modal-cstatus" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Edit Civil Status</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_cstatus" method="POST"
                          action="../action/updateprofile.php">
                          <div class="form-group">
                            <label for="text1" class="control-label col-lg-4">Civil Status</label>
                            <div class="col-lg-8">
                              <select class="form-control" name="teacher_civil">
                                <?php 
                          $mstat_q = mysqli_query($con,"SELECT * FROM `marital_status`");
                          while ($mstat = mysqli_fetch_array($mstat_q)) {
                             ?>
                                <option value="<?php echo $mstat['id']; ?>"><?php echo $mstat['marital_Name']; ?>
                                </option>
                                <?php
                          }
                          ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_cstatus" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


                <div class="modal fade" id="modal-gender" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Edit Gender</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_gender" method="POST"
                          action="../action/updateprofile.php">
                          <div class="form-group">
                            <label class="control-label col-lg-4">Gender</label>
                            <div class="col-lg-4">
                              <select name="selected_gender" class="validate[required] form-control">
                                <option value="" disabled="">Choose a gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_gender" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade" id="modal-name" data-modal-index="2">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Edit Full Name</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="update_name" method="POST"
                          action="../action/updateprofile.php">

                          <div class="form-group">
                            <label class="control-label col-lg-4">First Name</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="update_fname" id="req"
                                value="<?php echo $res_sidebar[$userType.'_fName'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Middle Name</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="update_mname" id="req"
                                value="<?php echo $res_sidebar[$userType.'_mName'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4">Last Name</label>
                            <div class="col-lg-4">
                              <input type="text" class="validate[required] form-control" name="update_lname" id="req"
                                value="<?php echo $res_sidebar[$userType.'_lName'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                              <input type="Submit" class="btn btn-primary" name="update_name" value="Submit">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



              </div>

            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('inc/footer.php'); ?>
<script>
$("#monthlyincome").on("input", function(evt) {
    var self = $(this);
    self.val(self.val().replace(/[^\d].+/, ""));
    if ((evt.which < 48 || evt.which > 57)) 
     {
	   evt.preventDefault();
     }
 });
</script>