<?php 
include('../session.php');
include('../db.php');
$page = 'Record Student';
$studentID = $_REQUEST['studentID'];
$_SESSION['page'] = '';
if ($login_level == '1')
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')
{
    $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')
{
    $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['admin_img']; 
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
      Dashboard
      <small>Record Student</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="recordstudent.php">Record Student</a></li>
      <li class="active">Record Student Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Student Information</h3>
            <!-- tools box -->
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php 
                            $edit_qry = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_ID = '$studentID'");
                            $edit_sql = mysqli_fetch_array($edit_qry);
                            $student_IDNumber = $edit_sql['student_IDNumber'];
                            $student_img = $edit_sql['student_img'];
                            $student_fName = $edit_sql['student_fName'];
                            $student_mName = $edit_sql['student_mName'];
                            $student_lName = $edit_sql['student_lName'];
                            $student_address = $edit_sql['student_address'];
                            $student_dob = $edit_sql['student_dob'];
                            $student_department = $edit_sql['student_department'];
                            $student_course = $edit_sql['student_course'];
                            $student_admission = $edit_sql['student_admission'];
                            $student_year_grad = $edit_sql['student_year_grad'];
                            $student_contact = $edit_sql['student_contact'];
                            ?>

            <form id="myform" class="form-horizontal" method="POST" role="form"
              action="../action/recordstudent_edit_action.php?studentID=<?php echo $studentID?>">
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4"></label>

                <div class="col-lg-8">
                  <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture"
                      src="../assets/img/profile_img/<?php echo $student_img?>" style="width: 128px; height: 128px;">
                  </a>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">ID Number</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="ID Number" class="form-control" name="student_sinumber"
                    onkeyup="numberInputOnly(this);" required="" value="<?php echo $student_IDNumber;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">First Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="First Name" class="form-control" name="student_firstname"
                    onkeyup="letterInputOnly(this);" required="" value="<?php echo $student_fName;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Middle Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="student_middlename"
                    onkeyup="letterInputOnly(this);" required="" value="<?php echo $student_mName;?>" maxlength="1">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Last Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Last Name" class="form-control" name="student_lastname"
                    onkeyup="letterInputOnly(this);" required="" value="<?php echo $student_lName;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Contact</label>

                <div class="col-lg-8">
                  <input type="number" id="text1" placeholder="Contact" class="form-control" name="student_contact"
                    onkeyup="numberInputOnly(this);" required="" value="<?php echo $student_contact;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Birthday</label>

                <div class="col-lg-8">
                  <input type="date" id="text1" placeholder="Birthday" class="form-control" name="student_bday"
                    value="<?php echo $student_dob; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Gender</label>
                <div class="col-lg-8">
                  <select class="form-control" name="student_gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Address</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Address" class="form-control" name="student_adress"
                    required="" value="<?php echo $student_address;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Civil Status</label>
                <div class="col-lg-8">
                  <select class="form-control" name="student_civil">
                    <?php 
                                            $mstat_q = mysqli_query($con,"SELECT * FROM `marital_status`");
                                            while ($mstat = mysqli_fetch_array($mstat_q)) {
                                               ?>
                    <option value="<?php echo $mstat['ID']; ?>"><?php echo $mstat['marital_Name']; ?></option>
                    <?php
                                            }
                                            ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Department</label>

                <div class="col-lg-8">
                  <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `capsu_department`");
                                    ?>
                  <select class="form-control" name="student_department" required=""
                    value="<?php echo $student_department;?>">
                    <?php
                                        while ($res_dep = mysqli_fetch_array($query_dep)) {
                                        
                                        ?>
                    <option value="<?php echo $res_dep['department_ID'] ?>"><?php echo $res_dep['department_name'];?></option>
                    <?php 
                                        }
                                        ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Course</label>

                <div class="col-lg-8">
                  <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `capsu_course`");
                                    ?>
                  <select class="form-control" name="student_course"
                    value="<?php echo $student_course;?>">
                    <?php
                                        while ($res_course = mysqli_fetch_array($query_dep)) {
                                        
                                        ?>
                    <option value="<?php echo $res_course['course_ID'] ?>" <?php if ($student_course == $res_course['course_ID']) { echo 'selected = "selected"'; }?>><?php echo $res_course['course_name'];?></option>
                    <?php 
                                        }
                                        ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Year Admission</label>

                <div class="col-lg-8">
                  <div class="input-group date" id="">
                    <input type="date" class="form-control" name="student_year_admission" required=""
                      value="<?php echo $student_admission;?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Year Graduate</label>

                <div class="col-lg-8">
                  <div class="input-group date" id="">
                    <input type="date" class="form-control" name="student_year_grad" required=""
                      value="<?php echo $student_year_grad;?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <label for="text1" class="control-label col-lg-4"></label>
                <button type="Submit" class="btn btn-primary" name="Submit">Submit</button>
                <a class="btn btn-danger" href="recordstudent.php">Cancel</a>       
              </div>
              <!-- /.form-group -->

              <!-- Trigger the modal with a button -->
              <div></div>



            </form>
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