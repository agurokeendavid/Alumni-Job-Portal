<?php 
require_once('../db.php');
if (isset($_REQUEST['id']) ){
 $id = $_REQUEST['id'];
$sql = mysqli_query($con,"SELECT * FROM suggested_job where job_ID = $id");
$d = mysqli_fetch_array($sql);
?>

<form class="form-horizontal" action="../action/submitjob.php?id=<?php echo $d[0]?>" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Job Title:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Title" placeholder="Title" name="Title" value="<?php echo $d[1]?>">
    </div>
  </div>
  <div class="form-group">
              <label class="control-label col-sm-2" for="Company">Company:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Company" placeholder="Company Name" name="Company" value="<?php echo $d[2]; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Description">Description:</label>
              <div class="col-sm-10">
              <textarea class="form-control" rows="3" placeholder="Description" id="Description" name="Description"><?php echo $d[3]; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Location">Location:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Location" placeholder="Location" name="Location" value="<?php echo $d[4]; ?>">
              </div>
            </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="course">Course:</label>
    <div class="col-sm-10">

      <?php 
 $sql = mysqli_query($con,"SELECT * FROM `capsu_course`");
      
      ?>
      <select class="form-control" name="course">
        <?php 
          while ($o = mysqli_fetch_array($sql)){
            ?>

        <option value="<?php echo $o[0]?>"><?php echo $o[2] ?></option>
        <?php
          }
          ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="edit-job">Submit</button>
    </div>
  </div>
</form>
<?php
}
?>