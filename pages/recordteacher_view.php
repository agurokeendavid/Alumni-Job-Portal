<?php 
include('../session.php');
include('../db.php');
$page = 'Record Teacher';
$teacherID = $_REQUEST['teacherID'];
$_SESSION['page'] = '';
if ($login_level == '1')
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
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
include('inc/sidebar-admin.php');
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
      <li><a href="recordteacher.php">Record Teacher</a></li>
      <li class="active">Record Teacher View</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Record Details</h3>
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
                            $edit_qry = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_ID = '$teacherID'");
                            $edit_sql = mysqli_fetch_array($edit_qry);
                            $teacher_IDNumber = $edit_sql['teacher_facultyID'];
                            $teacher_img = $edit_sql['teacher_img'];
                            $teacher_fName = $edit_sql['teacher_fName'];
                            $teacher_mName = $edit_sql['teacher_mName'];
                            $teacher_lName = $edit_sql['teacher_lName'];
                            $teacher_gender = $edit_sql['teacher_gender'];
                            $teacher_department = $edit_sql['teacher_department'];
                            $teacher_civilStat = $edit_sql['teacher_civilStat'];
                            $teacher_contact = $edit_sql['teacher_contact'];
                            $teacher_dob = $edit_sql['teacher_dob'];
                            $teacher_address = $edit_sql['teacher_address'];
                            ?>
            <form id="myform" class="form-horizontal" method="POST"
              action="action/recordteacher_edit_action.php?teacherID=<?php echo $teacherID?>">


              <div class="form-group">
                <label for="text1" class="control-label col-lg-4"></label>

                <div class="col-lg-8">
                  <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture"
                      src="../assets/img/profile_img/<?php echo $teacher_img?>" style="width: 128px; height: 128px;">
                  </a>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">ID Number</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="ID Number" disabled="" class="form-control"
                    name="teacher_tfinumber" onkeyup="numberInputOnly(this);" required=""
                    value="<?php echo $teacher_IDNumber;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">First Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="First Name" disabled="" class="form-control"
                    name="teacher_firstname" onkeyup="letterInputOnly(this);" required=""
                    value="<?php echo $teacher_fName;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Middle Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="teacher_middlename"
                    onkeyup="letterInputOnly(this);" required="" value="<?php echo $teacher_mName;?>" maxlength="1"
                    disabled="">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Last Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Last Name" class="form-control" name="teacher_lastname"
                    onkeyup="letterInputOnly(this);" required="" value="<?php echo $teacher_lName;?>" disabled="">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Birthday</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" disabled="" class="form-control" name="teacher_bday"
                    value="<?php echo $teacher_dob; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Gender</label>
                <div class="col-lg-8">
                  <select class="form-control" name="teacher_gender" disabled="">

                    <option><?php echo $teacher_gender;?></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Address</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Address" class="form-control" name="teacher_adress"
                    required="" disabled="" value="<?php echo $teacher_address;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Contact</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" disabled="" class="form-control" name="teacher_bday"
                    value="<?php echo $teacher_contact; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Civil Stat</label>
                <div class="col-lg-8">

                  <?php 
                                      $mstat_q = mysqli_query($con,"SELECT marital_Name FROM `marital_status` WHERE ID = '$teacher_civilStat'");
                                      $mstat_q  = mysqli_fetch_array($mstat_q);
                                     
                                      ?>
                  <input type="text" id="text1" placeholder="Marital" class="form-control" name="Department" required=""
                    disabled="" value="<?php  echo $mstat_q['marital_Name'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">College</label>

                <div class="col-lg-8">
                  <?php 
                                   $query_dep = mysqli_query($con,"SELECT * FROM `capsu_department` WHERE `department_ID` = $teacher_department");
                                   ?>

                  <?php
                                       $res_dep = mysqli_fetch_array($query_dep);
                                   
                                       ?>


                  <input type="text" id="text1" placeholder="Department" class="form-control" name="Department"
                    required="" disabled="" value="<?php echo $res_dep['department_name'];?>">
                </div>
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