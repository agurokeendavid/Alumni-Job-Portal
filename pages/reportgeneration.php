<?php 
include('../session.php'); 
include('../db.php');
$page = 'Report Generation';
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

      $sql = "SELECT COUNT(student_id) FROM user_student_detail WHERE student_gender = 'M';";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);

              $sql = "SELECT COUNT(student_id) FROM user_student_detail WHERE student_gender = 'F';";
              $result = mysqli_query($con, $sql);
              $row1 = mysqli_fetch_array($result);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Report
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> Report</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="col-md-12">

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Report Generation</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body chart-responsive">
            
            <form class="form-horizontal"  method="post" id="genderForm">
          <div class="form-group">
            <label class="control-label col-sm-1" for="schoolyear">School Year:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="schoolyear" placeholder="School Year" name="schoolyear" maxlength="4" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
            </div>
          </div>
          <div class="form-group">
              <div class="col-sm-offset-1 col-sm-1">
                <button type="submit" class="btn btn-success" name="submityear">Submit</button>
              </div>
            </div>
        </form>
        <h1 id="output" style="text-align: center;"></h1>
              <div class="chart" id="chart" style="height: 300px; position: relative;">
              
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
    </div>
    <!-- /.row -->

        </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('inc/footer.php'); ?>

<script>
//     $(document).ready(function(){
//   $("input").change(function(){
//     $('#output').html("<b>id: </b>"+ $(this).val() +"<b> name: </b>"+1); //Set output element html
//   });
// });
  $(function () {
    "use strict";
    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954"],
      data: [
        {label: "Male", value: <?php echo $row[0]; ?>},
        {label: "Female", value: <?php echo $row1[0]; ?>}
      ],
      hideHover: 'auto'
    });

    $('#genderForm').on('submit', function(event){
  event.preventDefault();
   var form_data = $(this).serialize();
   $.ajax({
    url:"../action/submitschoolyear.php",
    method:"POST",
    data:form_data,
    dataType:"json",
    success:function(data)
    {
     $('#genderForm')[0].reset();
     donut.setData(data);
    }
   });
   var str = $("#schoolyear").val();
   $('#output').html("School Year: "+ ((+str) - 1) + " - " +str); //Set output element html
 });
  });
</script>
