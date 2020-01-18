<?php 
include('../session.php');
include('../db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'Record Student';
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
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Record Student</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Student List</h3>
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
            <div class="btn-group">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
            </div>
            <table id="registerstud_serverside" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center col-sm-1">Student #</th>
                  <th class="text-center col-sm-3">Name</th>
                  <th class="text-center col-sm-1">Course</th>
                  <th class="text-center col-sm-2">Year Admitted</th>
                  <th class="text-center">Year graduated</th>
                  <th class="text-center ">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th class="text-center col-sm-1">Student #</th>
                  <th class="text-center col-sm-3">Name</th>
                  <th class="text-center col-sm-1">Course</th>
                  <th class="text-center col-sm-2">Year Admitted</th>
                  <th class="text-center">Year graduated</th>
                  <th class="text-center ">Action</th>
                </tr>
              </tfoot>
            </table>
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

<!-- Modal for add form -->
<!-- Add Modal -->
<div class="container">
  <div class="modal fade" id="myModal" data-modal-index="1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
              class="sr-only">Close</span></button>
          <h4 class="modal-title">Add Student Record</h4>
        </div>
        <div class="modal-body">


          <div class="body">
            <form id="myform" class="form-horizontal" method="POST" action="../action/recordstudent_action.php">
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">ID Number</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="ID Number" class="form-control" name="student_sinumber"
                    onkeyup="numberInputOnly(this);" required="">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">First Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="First Name" class="form-control" name="student_firstname"
                    onkeyup="letterInputOnly(this);" required="">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Middle Initial</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="student_middlename"
                    onkeyup="letterInputOnly(this);" required="" maxlength="1">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Last Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Last Name" class="form-control" name="student_lastname"
                    onkeyup="letterInputOnly(this);" required="">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Birthday</label>

                <div class="col-lg-8">
                  <input type="date" id="text1" placeholder="Birthday" class="form-control" name="student_dob">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Contact</label>

                <div class="col-lg-8">
                  <input type="number" id="text1" placeholder="Contact" class="form-control" name="student_contact"
                    onkeyup="numberInputOnly(this);" required="">
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
                <label for="text1" class="control-label col-lg-4">Address</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Address" class="form-control" name="student_adress"
                    required="">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Department</label>

                <div class="col-lg-8">
                  <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `capsu_department`");
                                    ?>
                  <select class="form-control" name="student_department" required>
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
                                    $query_course = mysqli_query($con,"SELECT * FROM `capsu_course`");
                                    ?>
                  <select class="form-control" name="student_course" required>
                    <?php
                                        while ($res_course = mysqli_fetch_array($query_course)) {
                                        
                                        ?>
                    <option value="<?php echo $res_course['course_ID'] ?>"><?php echo $res_course['course_name'];?></option>
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
                    <input type="date" class="form-control" name="student_year_admission" required="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Year Graduate</label>

                <div class="col-lg-8">
                  <div class="input-group date" id="">
                    <input type="date" class="form-control" name="student_year_grad" required="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4"></label>
                <div class="col-lg-8">
                  <div class="input-group date" id="">
                    <input class="btn btn-success" type="submit" name="submit_recordstudent" value="Submit">
                    </span>
                  </div>
                </div>
              </div>
              <!-- /.form-group -->

              <!-- Trigger the modal with a button -->
              <div></div>
            </form>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


</div>

<?php include('inc/footer.php'); ?>
<!-- Modal -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <div id="deletemodal-loader" style="display: none; text-align: center;">
          <img src="../assets/img/ajax-loader.gif">
        </div>

        <!-- content will be load here -->
        <div id="delete-content"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>