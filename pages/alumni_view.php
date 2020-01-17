<?php 
include('../session.php');
include('../db.php');

$page = 'Alumni';
$_SESSION['page'] = '';
$req_course = $_REQUEST['course'];
$req_year = $_REQUEST['year'];
$req_dep = $_REQUEST['department'];
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
include('inc/sidebar-teacher.php');
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
      <li><a href="alumni.php">Alumni</a></li>
      <li class="active">Alumni View</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Alumni</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-sm-12">
              <h2 class="text-center">
                <?php 
                                echo $req_dep;
                                ?>
              </h2>
              <h1 class="text-center">Batch of <?php echo $req_year?></h1>
              <hr>
              <a class="btn btn-info pull-right"
                href="../assets/lib/FPDF/alumnibatchprint.php?course=<?php echo $req_course?>&year=<?php echo $req_year?>"
                target="_BLANK">PRINT</a>
              <br><br>
              <table class="table table-bordered table-advance table-hover ">
                <thead>
                  <th>Names</th>
                  <th>Student Number</th>
                </thead>
                <tbody>
                  <?php 

                                   $query = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_department = $req_course AND student_year_grad LIKE '%$req_year%' ORDER BY `student_fName`  ASC");

                                    $no = 1;
                                  while ($data = mysqli_fetch_array($query)) {
                                    $data['student_fName']
                                  
                                   ?>
                  <tr>
                    <td><?php echo $no ?>.
                      <?php echo   $data['student_fName']." ".$data['student_mName']." ".  $data['student_lName']?></td>
                    <td><?php echo $data['student_IDNumber']?></td>
                  </tr>
                  <?php 
                                       $no = $no + 1;
                                       }
                                       ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            </div>
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