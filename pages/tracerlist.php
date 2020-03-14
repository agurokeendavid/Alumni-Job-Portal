<?php 
include('../session.php');
include('../db.php');
$page = 'Tracer List';
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
      <small>Tracer List</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Tracer List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Tracer List</h3>
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
            <center>
              <h1>Tracer List</h1>
            </center>
            <hr>
              <table class="table table-bordered" id="tracerlist">
                <thead>
                  <tr>
                    <th>Campus</th>
                    <th>Program Name</th>
                    <th>Name of Graduates</th>
                    <th>Date of Graduation</th>
                    <th>Date Hired for Current Job</th>
                    <th>Status of Employment after Graduation</th>
                    <th>Average Monthly Income</th>
                    <th>Percentage Increase in Income</th>
                    <th>Employer</th>
                    <!-- <th class="text-center">Action</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Campus</th>
                    <th>Program Name</th>
                    <th>Name of Graduates</th>
                    <th>Date of Graduation</th>
                    <th>Date Hired for Current Job</th>
                    <th>Status of Employment after Graduation</th>
                    <th>Average Monthly Income</th>
                    <th>Percentage Increase in Income</th>
                    <th>Employer</th>
                    <!-- <th class="text-center">Action</th> -->
                  </tr>
                </tfoot>
                <tbody>

                  <?php 


$sql = mysqli_query($con,"SELECT usd.student_IDNumber, tracer.campus, cc.course_acronym, CONCAT(usd.student_lName, ', ', usd.student_fName, ' ', UPPER(SUBSTRING(usd.student_mName, 1, 1)), '.') AS fullname, DATE_FORMAT(usd.student_year_grad, '%M %d %Y') AS student_year_grad, DATE_FORMAT(tracer.date_hired_current_job, '%M %d %Y') AS date_hired_current_job, tracer.status_employment, CONCAT('Php ', tracer.monthly_income,' .00') AS monthly_income, CONCAT(tracer.percentage_increase, '%') AS percentage_increase, tracer.employer FROM user_student_detail usd INNER JOIN capsu_course cc ON usd.student_course = cc.course_ID INNER JOIN student_tracer_detail tracer ON usd.student_IDNumber = tracer.student_ID;");
while ($d = mysqli_fetch_array($sql)) {
    ?>
                  <tr>
                  
                    <td><?php echo $d["campus"]; ?></td>
                    <td><?php echo $d["course_acronym"]; ?></td>
                    <td><?php echo $d["fullname"]; ?></td>
                    <td><?php echo $d["student_year_grad"]; ?></td>
                    <td><?php echo $d["date_hired_current_job"]; ?></td>
                    <td><?php echo $d["status_employment"]; ?></td>
                    <td><?php echo $d["monthly_income"]; ?></td>
                    <td><?php echo $d["percentage_increase"]; ?></td>
                    <td><?php echo $d["employer"]; ?></td>
                    <!-- <td class="text-center">
                      <div class="btn-group ">
                      <button data-id="<?php echo $d["student_IDNumber"];?>" class="btn btn-success" class="btn btn-info btn-lg"
                          data-toggle="modal" data-target="#view" id="viewjob">VIEW</button>
                      </div>
                    </td> -->
                  </tr>
                  <?php
}
?>
                </tbody>
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
$(document).ready(function() {
  var dataTable = $('#tracerlist').DataTable({});
});
</script>

<!-- Modal -->
<div id="view" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Job Description</h4>
      </div>
      <div class="modal-body">
      <div id="viewmodal-loader" style="display: none; text-align: center;">
          <img src="../assets/img/ajax-loader.gif">
        </div>

        <!-- content will be load here -->
        <div id="view-content"></div>
      <!-- title row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
$(document).ready(function() {

  $(document).on('click', '#viewjob', function(e) {

e.preventDefault();

var uid = $(this).data('student_ID'); // it will get id of clicked row

$('#view-content').html(''); // leave it blank before ajax call
$('#viewmodal-loader').show(); // load ajax loader

$.ajax({
    url: 'suggestedjob_view.php',
    type: 'POST',
    data: 'student_ID=' + uid,
    dataType: 'html'
  })
  .done(function(data) {
    console.log(data);
    $('#view-content').html('');
    $('#view-content').html(data); // load response 
    $('#viewmodal-loader').hide(); // hide ajax loader 
  })
  .fail(function() {
    $('#view-content').html(
      '<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
    $('#viewmodal-loader').hide();
  });

});
});
</script>