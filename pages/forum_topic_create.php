<?php 
include('../session.php');
include('../db.php');
$page = 'General Forum';
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
      <?php 
    if($_SESSION['page'] == 'General Forum')
{
  echo '<small>General Forum</small>';
}
else if ($_SESSION['page'] == 'Your Posts')
{
  echo '<small>Profile Post</small>';
}
?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li>Forum</li>
      <li class="active">Create New Topic</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Create New Topic Post</h3>
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
            <form class="form-group" method="post"
              action="../action/postnewtopic_action.php?userID=<?php echo $login_id ?>">
              <br>
              <input type="text" class="form-control" placeholder="Click here to set title" name="post_title" autofocus
                required>
              <br>

              <textarea class="textarea" class="ckeditor" placeholder="Type your content here."
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                name="post_content" required></textarea>
              <br>
              <div class="box-footer">
              <a href="forum.php"><input class="btn btn-danger pull-right" type="button" value="Cancel"
                  style="margin-left: 5px;"></a>
              <input class="btn btn-primary pull-right" type="submit" name="submit_postnewtopic" value="POST">
              </div>
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