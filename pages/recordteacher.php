<?php 
include('../session.php');
include('../db.php');
$page = 'Record Teacher';
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
include('inc/sidebar-admin.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Record Alumni Coordinator</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Record Alumni Coordinator</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-5">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Add Alumni Coordinator Record</h3>
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
            <form class="form-horizontal" method="POST" action="../action/recordteacher_action.php">


              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Username</label>

                <div class="col-lg-8">
                  <input type="text" id="Username" placeholder="Username" class="form-control" name="teacher_username">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Password</label>

                <div class="col-lg-8">
                  <input type="Password" id="text1" placeholder="Password" class="form-control" name="teacher_Password">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Confirm Password</label>

                <div class="col-lg-8">
                  <input type="Password" id="text1" placeholder="Confirm Password" class="form-control"
                    name="teacher_rePassword">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Faculty ID</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="ID Number" class="form-control" name="teacher_finumber"
                    onkeyup="numberInputOnly(this);">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">First Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="First Name" class="form-control" name="teacher_firstname"
                    onkeyup="letterInputOnly(this);">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Middle Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="teacher_middlename"
                    onkeyup="letterInputOnly(this);">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Last Name</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Last Name" class="form-control" name="teacher_lastname"
                    onkeyup="letterInputOnly(this);">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Contact</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Contact" class="form-control" name="teacher_contact"
                    onkeyup="numberInputOnly(this);" required="" min="9" max="9">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Address</label>

                <div class="col-lg-8">
                  <input type="text" id="text1" placeholder="Address" class="form-control" name="teacher_adress">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Birthday</label>

                <div class="col-lg-8">
                  <input type="date" id="text1" placeholder="Birthday" class="form-control" name="teacher_bday">
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Gender</label>
                <div class="col-lg-8">
                  <select class="form-control" name="teacher_gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Civil Status</label>
                <div class="col-lg-8">
                  <select class="form-control" name="teacher_civilStat">
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
                  <select class="form-control" name="teacher_department">
                    <?php
                                        while ($res_dep = mysqli_fetch_array($query_dep)) {
                                        
                                        ?>
                    <option value="<?php echo $res_dep['department_ID'] ?>"><?php echo $res_dep['department_name'];?>
                    </option>
                    <?php 
                                        }
                                        ?>
                  </select>
                </div>
              </div>

              <!-- /.form-group -->

              <div class="form-group text-center">
                <input class="btn btn-success" type="submit" name="submit_recordteacher" value="Submit">

                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Import Excel</button> -->
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col -->

      <div class="col-sm-7">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Alumni Coordinator List</h3>
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
            <table id="rteacherDataRecord" class="table table-bordered table-advance table-hover  ">
              <thead>
                <tr>
                  <th class="col-sm-2">Name</th>
                  <th class="col-sm-3">Department</th>
                  <th class="col-sm-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                      <button type="button" class="btn btn-metis-5"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-close"></i></button>
                    </div>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
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

<?php include('inc/footer.php'); ?>
<script type="text/javascript">
function editFunction(teacher_ID) {
  var txt;
  var r = confirm("Are you sure do you want to edit ?");
  if (r == true) {

    // window.location.href = "recordstudent.php?modal=" + student_ID;
  } else {

  }
}

function deleteFunction(teacher_ID) {
  var txt;
  var r = confirm("Are you sure do you want to delete?");
  if (r == true) {
    $('#myModal').modal('show');
    // window.location.href = "recordstudent.php?modal=" + student_ID;
  } else {

  }

}
$(document).ready(function() {
  var dataTable = $('#rteacherDataRecord').DataTable({

    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    // "bSort": false,
    "bLengthChange": false,
    "columnDefs": [{
        className: "text-center",
        "targets": 0,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 1,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 2,
        "searchable": false
      }
    ],
    "ajax": {
      url: "serverside_data_registerteacher.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".registerstud_serverside-error").html("");
        $("#eregisterstud_serverside").append(
          '<tbody class="registerstud_serverside-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
        );
        $("#registerstud_serverside_processing").css("display", "none");


      }

    }
  });



});
</script>