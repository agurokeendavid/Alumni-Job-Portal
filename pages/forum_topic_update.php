<?php 
include('../session.php');
include('../db.php');

$page = 'General Forum';
if ($login_level == '1')//for student access
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_userID` = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')//for teacher access
{
    $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_userID` = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')//for admin access
{
    $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_userID` = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['admin_img']; 
}
else
{
}

// requested post data id
$req_encypted_postID = $_REQUEST['req_encypted_postID'];
/*FOR VERIFYING topic requested HASHED ID*/
// selecting all data from database
$query_verify_id = mysqli_query($con,"SELECT * FROM `forum_topic`");
//while fetching all data
while ($res_ver_id = mysqli_fetch_array($query_verify_id)) 
{
  //each topic id mush be save in temp variable of check_id
  $check_id = $res_ver_id['topic_ID'];
    //the requested hash checked original value if match then stored the verified value in verified_id
    if (password_verify($check_id, $req_encypted_postID)) 
      {
       $verified_id = $check_id;//temporary value save to verified_id
      }  
      
}

//selected data topic to be fetch
$query = mysqli_query($con,"SELECT * FROM `forum_topic` WHERE `topic_id` = '$verified_id'");
$res = mysqli_fetch_array($query);
  $post_ID = $res['topic_ID'];
  $post_title = $res['post_title'];
  $post_owner = $res['post_owner_id'];
  $post_date  = $res['post_date'];
  $post_content = $res['post_content'];

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
      <li class="active">Update Posted Topic</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Pinned Topics</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form class="form-group" method="post"
              action="../action/updatepost_action.php?post_ID=<?php echo $post_ID ;?>">
              <br>
              <input type="text" class="form-control" placeholder="Click here to set title" name="updatepost_title"
                value="<?php echo $post_title ?>" autofocus required>
              <br>
              <textarea class="textarea" class="ckeditor" placeholder="Type your content here."
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                name="updatepost_content" required><?php echo $post_content; ?></textarea>
                <div class="box-footer">
              <a href="forum.php"><input class="btn btn-danger pull-right" type="button" value="Cancel"
                  style="margin-left: 5px;"></a>
              <input class="btn btn-primary pull-right" type="submit" name="submit_updatetopic" value="Update Post">
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