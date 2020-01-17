<?php 
require_once('../db.php');
if (isset($_REQUEST['id']) ){
 $id = $_REQUEST['id'];
$sql = mysqli_query($con,"SELECT * FROM suggested_job where job_ID = $id");
$d = mysqli_fetch_array($sql);
?>

<!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <?php echo $d['job_company']; ?>
            <small class="pull-right"><?php echo date("F d, Y", strtotime($d['job_posted_date'])); ?></small>
            <small><?php echo $d['job_location'] . ', ' . $d['job_field_work']; ?></small>
            <small><?php echo $d['job_contact_number']; ?></small>
            <small><?php echo $d['job_email']; ?></small>
            <small>Position: <?php echo $d['job_Title']; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12">
        <?php echo $d[5]; ?>
        </div>
        <!-- /.col -->
      </div>
<?php } ?>