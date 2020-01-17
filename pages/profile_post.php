<?php 
include('../session.php');
include('../db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'Your Posts';
$_SESSION['page'] = 'Your Posts';
if($login_level == '1') {
   $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
   $data = mysqli_fetch_array($result);
   $data_img = $data['student_img'];
}
else if($login_level == '2') {
   $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
   $data = mysqli_fetch_array($result);
   $data_img = $data['teacher_img'];
}
else if($login_level == '3') {
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
      Forum
      <small>Profile Post</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Forum</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Pinned Topics</h3>
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
            <table id="forumData_User_Pin" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>
                    <h3>Pinned Topics</h3>
                  </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Topic</h3>
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
            <table id="forumData_User_Unpin" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>
                    <h3>Topic</h3>
                  </th>
                </tr>
                <tr onclick="self.location.href='forum_topic_create.php'">
                  <td class="forum-td">
                    <div class="forum-list-hover col-sm-1">
                      <i class="fa fa-plus"></i>
                    </div>
                    <div class="col-sm-6 forum-list-content">
                      <strong><a href="forum_topic_create.php">Post new topic</a>
                        <br>&nbsp;</strong>
                    </div>
                    <div class="col-sm-2 forum-list-content-stat">
                      &nbsp;
                      <br>
                      &nbsp;
                    </div>
                    <div class="col-sm-3" style="background-color: #444444;color: white;">
                      &nbsp;<br>&nbsp;
                    </div>

                  </td>
                </tr>
              </thead>
              <tfoot>
                <tr>
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