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
            <?php echo $d[2]; ?>
            <small class="pull-right"><?php echo date("F d, Y", strtotime($d[8])); ?></small>
            <small><?php echo $d[7]; ?></small>
            <small>Position: <?php echo $d[1]; ?></small>
            
            <hr>
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
      <hr>
      <span>
      <small><?php echo $d[3]; ?></small>
      <br>
            <small><?php echo $d[4]; ?></small>
            </span>
<?php } ?>