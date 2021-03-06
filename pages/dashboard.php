<?php 
include('../session.php'); 
include('../db.php');
$page = 'dashboard';
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

class json
    {
    public $value = 0;
    public function EncodeParsing($parse){
        $j_encode = json_encode($parse);
        return $j_encode;
      }
    public function DataCount($count){
        $total_count = mysqli_num_rows($count);
        return $total_count;
      }
       
    public function stackValue($val)
      {
          $this->value += $val;
      }
     
    public function getSum()
      {
          return $this->value . "<br />";
      }
    public function addtoString($str, $item) {
    $parts = explode(',', $str);
    $parts[] = $item;
    return implode(',', $parts);
    }
 
   
    }
$json = new json;
$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'register'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'register'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'register'");
$totalresult_ofJob = mysqli_query($con,"SELECT * FROM `suggested_job` WHERE job_status = 'Active'");
$totalAcc_register_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_register_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_register_asAdmin = $json->DataCount($totalresult_ofAdmin);
$totalJob = $json->DataCount($totalresult_ofJob);

//  $jencode_title =  json_encode($datajcc);
  //  $jencode_jcount =  json_encode($dataCount);

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
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $totalAcc_register_asAdmin; ?></h3>

            <p>Registered Administrator</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $totalAcc_register_asTeacher; ?></h3>

            <p>Registered Coordinator</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php if($login_level == 3) { echo 'recordteacher.php'; } else { echo '#'; }?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $totalAcc_register_asStudent;?></h3>

            <p>Registered Alumni</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php 
          if($login_level == 3) 
          { 
            echo 'recordstudent.php'; 
            }
            else if ($login_level == 2)
            {
              echo 'recordstudent.php';
            } 
            else if ($login_level == 1) 
            { 
              echo 'batchmates.php'; 
            } else { 
              echo '#'; 
            }
            ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <?php if ($userType == "student") { ?>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $totalJob;?></h3>

            <p>Available Jobs</p>
          </div>
          <div class="icon">
            <i class="ion ion-document"></i>
          </div>
          <a class="small-box-footer" data-toggle="modal" data-target="#myModal" href="#myModal">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <?php } else { ?>
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $totalJob;?></h3>

            <p>Available Jobs</p>
          </div>
          <div class="icon">
            <i class="ion ion-document"></i>
          </div>
          <a href="suggestedjob.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <?php } ?>
      <!-- ./col -->
    </div>
    <!-- /.row -->
          <!-- Main row -->
          <div class="row">
          <?php if ($login_level == 1 || $login_level == 3) {?>
         <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <div class="col-lg-6">
        <!-- JOBS LIST -->
         
        <!-- JOBS LIST -->
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Job Agencies</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

       <li class="item">
       <div class="product-img">
       <img src="../assets/img/js-logo.jpg" alt="Product Image" class="img-size-50">
       </div>
                  <div class="product-info">
                    <a href="https://www.jobstreet.com.ph/" class="product-title" data-toggle="modal" target="_blank"> Jobstreet PH
                        <span class="product-description">
                        Please click the link to visit the page.
                        </span>
                        </a>
                  </div>
                </li>

                <li class="item">
       <div class="product-img">
       <img src="../assets/img/peso-logo.jpg" alt="Product Image" class="img-size-50">
       </div>
                  <div class="product-info">
                    <a href="http://www.ble.dole.gov.ph/index.php/porgrams-projects/2013-12-16-01-22-48" class="product-title" data-toggle="modal" target="_blank"> Public Employment Service Office
                        <span class="product-description">
                        Please click the link to visit the page.
                        </span>
                        </a>
                  </div>
                </li>

              </ul>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->


          </div>
          <!-- right col -->

          <div class="col-lg-6">
        <!-- JOBS LIST -->
         
        <!-- JOBS LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Jobs</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php 
                $jobs = mysqli_query($con,"SELECT sj.job_ID, sj.job_Title, sj.job_company, sj.job_description, sj.job_location, sj.job_posted_date FROM `suggested_job` sj WHERE sj.job_status = 'Active' ORDER by sj.job_posted_date DESC LIMIT 4"); 
 while ($job = mysqli_fetch_array($jobs)) {
?>
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title" data-toggle="modal" data-target="#view" data-id="<?php echo $job['job_ID'];?>" id="viewjob"><?php echo $job['job_Title']; ?>
                        <span class="product-description">
                        <?php echo $job['job_company']; ?>
                        </span>
                  </div>
                </li>
 <?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="<?php if ($login_level == 1) 
              { 
                echo 'suggestedjob_available.php'; 
              } 
              else if ($login_level == 3) 
              { echo 'suggestedjob.php'; }?>" class="uppercase">View All Jobs</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->


          </div>
          <!-- right col -->
                    
 <?php } ?>
          </div>
          <!-- /.row (main row) -->
          <?php 
          if ($login_level == 1)
          {
            $pullright = "pull-right";
          }
          else if ($login_level == 2)
          {
            $pullright = "";
          }
          else if ($login_level == 3)
          {
            $pullright = "pull-right";
          }
          ?>
          <div class="row">
          <div class="col-md-6 <?php echo $pullright; ?>">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Notes</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <b>Terms of use: </b><p style="font-size: 16px;">&nbsp; This site aims to provide a convenient, private and informative website experience for our alumni to view their information &amp; announcements, accessible 24/7. Our system offers an easy and convenient user experience website. Rest assured that the data you inputted to this website will be considered confidential and will only be used by Capsu Pontevedra as for your record.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          </div>
        </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('inc/footer.php'); ?>
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