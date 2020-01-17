<?php 
include('../session.php');
include('../db.php');

$page = 'Alumni';
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
      <li class="active">Alumni</li>
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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <?php
  $dep =mysqli_query($con,"SELECT * FROM `capsu_department`"); 
                              while ($data = mysqli_fetch_array($dep)) {
                                
                                if ($data['department_ID'] == 1) {
                                  
                                  ?><li class="active"><a data-toggle="tab"
                  href="#<?php echo  $data['department_ID'] ?>"><?php echo $data['department_name']; ?></a></li><?php
                                }
                                else{
                                  ?><li><a data-toggle="tab"
                  href="#<?php echo  $data['department_ID'] ?>"><?php echo  $data['department_name'] ?></a></li>
              <?php
                                }
                              }
                              ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <?php
    $dep =mysqli_query($con,"SELECT * FROM `capsu_department`"); 
    while ($data = mysqli_fetch_array($dep)) {
      
      if ($data['department_ID'] == 1) {
        
        ?>
              <div class="tab-pane active" id="<?php echo $data['department_ID']; ?>" role="tabpanel">


                <?php
     $dID =  $data['department_ID']; 
      $s =mysqli_query($con,"SELECT DISTINCT (year(student_year_grad)) as year_list FROM `user_student_detail` WHERE student_department = $dID");
      ?>
                <br>
                <table id="c" class="table table-bordered table-advance table-hover  dataTable">
                  <thead>
                    <tr>
                      <th>
                        <h3><?php echo $data['department_name'] ?> Alumni List</h3>
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                                        while ($d = mysqli_fetch_array($s)) {
                                          $year_list = $d['year_list'];
                                          ?>

                    <tr>
                      <td>
                        <div class='forum-list-hover col-sm-1' style='height: 20px;'>
                          <br>
                        </div>
                        <div class='col-sm-6 forum-list-content' data-id='"<?php echo $year_list;?>"'>
                          <a
                            href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?>&department=<?php echo $data['department_name']; ?> '><?php echo $year_list;?></a>

                          <br>
                        </div>
                        <div class='col-sm-2 forum-list-content-stat'>
                          <br>
                        </div>
                        <div class='col-sm-3' style='background-color: #444444;color: white;'>
                          <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?>&department=<?php echo $data['department_name']; ?> '
                            style='background-color: #444444;color: white;'> VIEW</a>
                        </div>
                      </td>
                    </tr>
                    <?php
                                        }
                                        ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                    </tr>
                  </tfoot>

                </table>
              </div>
              <?php 
    }
        if ($data['department_ID'] == 2) {
        
        ?>
              <div class="tab-pane " id="<?php echo $data['department_ID']; ?>" role="tabpanel">


                <?php
     $dID =  $data['department_ID']; 
      $s =mysqli_query($con,"SELECT DISTINCT (year(student_year_grad)) as year_list FROM `user_student_detail` WHERE student_department = $dID");
      ?>
                <br>
                <table id="i" class="table table-bordered table-advance table-hover  dataTable">
                  <thead>
                    <tr>
                      <th>
                        <h3><?php echo $data['department_name'] ?> Alumni List</h3>
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                                        while ($d = mysqli_fetch_array($s)) {
                                          $year_list = $d['year_list'];
                                          ?>
                    <tr>
                      <td>
                        <div class='forum-list-hover col-sm-1' style='height: 20px;'>
                          <br>
                        </div>
                        <div class='col-sm-6 forum-list-content' data-id='"<?php echo $year_list;?>"'>
                          <a
                            href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> '><?php echo $year_list;?></a>

                          <br>
                        </div>
                        <div class='col-sm-2 forum-list-content-stat'>
                          <br>
                        </div>
                        <div class='col-sm-3' style='background-color: #444444;color: white;'>
                          <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> '
                            style='background-color: #444444;color: white;'> VIEW</a>
                        </div>
                      </td>
                    </tr>
                    <?php
                                        }
                                        ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                    </tr>
                  </tfoot>

                </table>
              </div>
              <?php 
    }
      if ($data['department_ID'] == 3) {
        
        ?>
              <div class="tab-pane " id="<?php echo $data['department_ID']; ?>" role="tabpanel">


                <?php
     $dID =  $data['department_ID']; 
      $s =mysqli_query($con,"SELECT DISTINCT (year(student_year_grad)) as year_list FROM `user_student_detail` WHERE student_department = $dID");
      ?>
                <br>
                <table id="o" class="table table-bordered table-advance table-hover  dataTable">
                  <thead>
                    <tr>
                      <th>
                        <h3><?php echo $data['department_name'] ?> Alumni List</h3>
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                                        while ($d = mysqli_fetch_array($s)) {
                                          $year_list = $d['year_list'];
                                          ?>
                    <tr>
                      <td>
                        <div class='forum-list-hover col-sm-1' style='height: 20px;'>
                          <br>
                        </div>
                        <div class='col-sm-6 forum-list-content' data-id='"<?php echo $year_list;?>"'>
                          <a
                            href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> '><?php echo $year_list;?></a>

                          <br>
                        </div>
                        <div class='col-sm-2 forum-list-content-stat'>
                          <br>
                        </div>
                        <div class='col-sm-3' style='background-color: #444444;color: white;'>
                          <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> '
                            style='background-color: #444444;color: white;'> VIEW</a>
                        </div>
                      </td>
                    </tr>
                    <?php
                                        }
                                        ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                    </tr>
                  </tfoot>

                </table>
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