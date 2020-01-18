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
include('inc/sidebar-admin.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Suggested Job</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Suggested Job</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Suggested Job</h3>
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
              <h1>Suggested Job</h1>
            </center>
            <hr>
              <button class="btn btn-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add">Add Job</button>
              <br> <br><br>
              <table class="table table-bordered" id="11">
                <thead>
                  <tr>
                    <th>Job Title</th>
                    <th>Field</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Job Title</th>
                    <th>Field</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </tfoot>
                <tbody>

                  <?php 

$sql = mysqli_query($con,"SELECT sj.job_ID,sj.job_Title,sj.job_field_work, sj.job_status, sj.job_posted_date FROM `suggested_job` sj ORDER BY `job_ID` ASC");
while ($d = mysqli_fetch_array($sql)) {
    ?>
                  <tr>
                    <td><?php  echo $d[1];?></td>
                    <td><?php  echo $d[2];?></td>
                    <td><?php echo date("F d, Y", strtotime($d[4])); ?></td>
                    <td><?php  echo $d[3];?></td>
                    
                    <td class="text-center">
                      <div class="btn-group ">
                      <button data-id="<?php echo $d[0];?>" class="btn btn-primary" class="btn btn-info btn-lg"
                          data-toggle="modal" data-target="#view" id="viewjob">VIEW</button>
                        <button data-id="<?php echo $d[0];?>" class="btn btn-primary" class="btn btn-info btn-lg"
                          data-toggle="modal" data-target="#edit" id="editjob">EDIT</button>
                        <button data-id="<?php echo $d[0];?>" class="btn btn-primary" class="btn btn-info btn-lg"
                          data-toggle="modal" data-target="#delete" id="deletejob">DELETE</button>
                      </div>
                    </td>
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


<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Job</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="../action/submitjob.php" method="post">
          
            <div class="form-group">
              <label class="control-label col-sm-2" for="Title">Title:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Title" placeholder="Title" name="Title" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Company">Company:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Company" placeholder="Company Name" name="Company" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="emailaddress">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="emailaddress" placeholder="mail@mail.com" name="emailaddress">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="contactnumber">Contact:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="contactnumber" placeholder="Contact Number" name="contactnumber">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Description">Description:</label>
              <div class="col-sm-10">
              <textarea class="form-control" rows="3" placeholder="Description" id="Description" name="Description" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Location">Location:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Location" placeholder="Location" name="Location" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="fieldwork">Field:</label>
              <div class="col-sm-10">
                <select class="form-control" name="fieldwork">
                  <option value="Local">Local</option>
                  <option value="International">International</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="status">Status:</label>
              <div class="col-sm-10">
                <select class="form-control" name="status">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit-job">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <div id="editmodal-loader" style="display: none; text-align: center;">
          <img src="../assets/img/ajax-loader.gif">
        </div>

        <!-- content will be load here -->
        <div id="edit-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


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

<script type="text/javascript">
$(document).ready(function() {

  

  $(document).on('click', '#editjob', function(e) {

    e.preventDefault();

    var uid = $(this).data('id'); // it will get id of clicked row

    $('#edit-content').html(''); // leave it blank before ajax call
    $('#editmodal-loader').show(); // load ajax loader

    $.ajax({
        url: 'suggestedjob_edit.php',
        type: 'POST',
        data: 'id=' + uid,
        dataType: 'html'
      })
      .done(function(data) {
        console.log(data);
        $('#edit-content').html('');
        $('#edit-content').html(data); // load response 
        $('#editmodal-loader').hide(); // hide ajax loader 
      })
      .fail(function() {
        $('#edit-content').html(
          '<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#editmodal-loader').hide();
      });

  });


  $(document).on('click', '#deletejob', function(e) {

    e.preventDefault();

    var uid = $(this).data('id'); // it will get id of clicked row

    $('#delete-content').html(''); // leave it blank before ajax call
    $('#deletemodal-loader').show(); // load ajax loader

    $.ajax({
        url: 'suggestedjob_delete.php',
        type: 'POST',
        data: 'id=' + uid,
        dataType: 'html'
      })
      .done(function(data) {
        console.log(data);
        $('#delete-content').html('');
        $('#delete-content').html(data); // load response 
        $('#deletemodal-loader').hide(); // hide ajax loader 
      })
      .fail(function() {
        $('#delete-content').html(
          '<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#deletemodal-loader').hide();
      });

  });

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