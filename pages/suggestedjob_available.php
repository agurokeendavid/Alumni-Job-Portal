<?php 
include('../session.php');
include('../db.php');


$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'Suggested Job';
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
include('inc/sidebar-student.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Available Job</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Available Job</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Available Job</h3>
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
              <h1>Available Job</h1>
            </center>
            <hr>
              <table class="table table-bordered" id="11">
                <thead>
                  <tr>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Field</th>
                    <th>Posted Date</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Job Title</th>
                    <th>Company</th>
                    <th>Field</th>
                    <th>Posted Date</th>
                    <th class="text-center">Action</th>
                  </tr>
                </tfoot>
                <tbody>

                  <?php 

$sql = mysqli_query($con,"SELECT sj.job_ID, usd.student_course, sj.job_Title, sj.job_company, sj.job_description, sj.job_location, sj.job_posted_date, sj.job_field_work FROM `suggested_job` sj,user_student_detail usd
WHERE (usd.student_userID = '$login_id') AND (sj.job_status = 'Active') ORDER by sj.job_posted_date DESC LIMIT 4");
while ($d = mysqli_fetch_array($sql)) {
    ?>
                  <tr>
                    <td><?php  echo $d[2];?></td>
                    <td><?php  echo $d[3];?></td>
                    <td><?php  echo $d[7];?></td>
                    <td><?php echo date("F d, Y", strtotime($d[6])); ?></td>
                    <td class="text-center">
                      <div class="btn-group ">
                      <button data-id="<?php echo $d[0];?>" class="btn btn-primary" class="btn btn-info btn-lg"
                          data-toggle="modal" data-target="#view" id="viewjob">VIEW</button>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
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
  var dataTable = $('#11').DataTable({});
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

var uid = $(this).data('id'); // it will get id of clicked row

$('#view-content').html(''); // leave it blank before ajax call
$('#viewmodal-loader').show(); // load ajax loader

$.ajax({
    url: 'suggestedjob_view.php',
    type: 'POST',
    data: 'id=' + uid,
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