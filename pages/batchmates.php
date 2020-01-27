<?php 
include('../session.php');
include('../db.php');
$page = 'My Batchmates';
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
      <small>My Batchmates</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">My Batchmates</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">My Batchmates</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="nav nav-tabs">
              <?php 
                              $student_sql = mysqli_query($con,"SELECT YEAR(usd.student_year_grad) as student_year_grad,cd.department_ID ,cd.department_name, cc.course_ID, cc.course_name FROM user_student_detail usd INNER JOIN capsu_department cd ON usd.student_department = cd.department_ID INNER JOIN capsu_course cc ON usd.student_course = cc.course_ID WHERE usd.student_userID = $login_id");
                              $student_d = mysqli_fetch_array($student_sql);
                              $s_department_ID = $student_d['department_ID'];
                              $s_course_ID = $student_d['course_ID'];
                              $s_student_year_grad = $student_d['student_year_grad']; 
                              $dep =mysqli_query($con,"SELECT * FROM `capsu_department`"); 
                              $course =mysqli_query($con,"SELECT * FROM `capsu_course`"); 
                              while ($data = mysqli_fetch_array($course)) {
                                
                                if ($data['course_ID'] == $s_course_ID) {
                                  
                                  ?>
              <li class="active"><a data-toggle="tab"
                  href="#<?php echo  $data['course_ID'] ?>"><?php echo $data['course_name']; ?></a></li><?php 
                                }
                                else{
                                  ?><li><a data-toggle="tab"
                  href="#<?php echo  $data['course_ID'] ?>"><?php echo  $data['course_name'] ?></a></li>
              <?php
                                }
                              }
                              ?>
            </ul>

            <div class="tab-content">

              <?php 
                              $course =mysqli_query($con,"SELECT * FROM `capsu_course`"); 
                              while ($data = mysqli_fetch_array($course)) {
                                
                                if ($data['course_ID'] == $s_course_ID) {
                                  
                                  ?>
              <div id="<?php echo $data['course_ID']; ?>" class="tab-pane fade in active">
                <center>
                  <h3><?php echo $data['course_name']." Batch of ".$s_student_year_grad; ?></h3>
                </center>
                <p>
                  <table class="table table-bordered table-advance table-hover">
                    <thead>
                      <tr>
                      <th>Student Number</th>
                      <th>Full Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                                    $s = mysqli_query($con,"SELECT student_fName,student_mName,student_lName,student_IDNumber FROM `user_student_detail` usd INNER JOIN capsu_department cd ON usd.student_department = cd.department_ID INNER JOIN capsu_course cc ON usd.student_course = cc.course_ID WHERE course_ID = ".$data['course_ID']." AND student_year_grad LIKE '%$s_student_year_grad%'");
                                    $no = 0;
                                    while ($f_all = mysqli_fetch_array($s)) {
                                      $no+=$no+1;
                                     ?>
                      <tr>
                      <td><?php echo $f_all['student_IDNumber']?></td>
                        <td><?php echo $no ?> .
                          <?php echo   $f_all['student_fName']." ".$f_all['student_mName']." ".  $f_all['student_lName']?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Student Number</th>
                        <th>Full Name</th>
                      </tr>
                    </tfoot>
                  </table>
                </p>
              </div>
              <?php
                                }
                                else{
                                  ?> <div id="<?php echo $data['course_ID']; ?>" class="tab-pane fade">
                <center>
                  <h3><?php echo $data['course_name']."  ".$s_student_year_grad;  ?> </h3>
                </center>
                <p>
                  <table class="table table-bordered table-advance table-hover">
                    <thead>
                      <tr>
                      <th>Student Number</th>
                      <th>Full Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                                    $s = mysqli_query($con,"SELECT student_fName,student_mName,student_lName,student_IDNumber FROM `user_student_detail` usd INNER JOIN capsu_department cd ON usd.student_department = cd.department_ID INNER JOIN capsu_course cc ON usd.student_course = cc.course_ID WHERE course_ID = ".$data['course_ID']." AND student_year_grad LIKE '%$s_student_year_grad%'");
                                    $no = 0;
                                    while ($f_all = mysqli_fetch_array($s)) {
                                      $no+=$no+1;
                                     ?>
                      <tr>
                      <td><?php echo $f_all['student_IDNumber']?></td>
                      <td><?php echo $no ?>.
                          <?php echo   $f_all['student_fName']." ".$f_all['student_mName']." ".  $f_all['student_lName']?>
                      </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Student Number</th>
                        <th>Full Name</th>
                      </tr>
                    </tfoot>
                  </table>
                </p>
              </div>
              <?php
                                }
                              }
                              ?>
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