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
      <input type="text" class="form-control" id="Title" placeholder="Title" name="Title" value="<?php echo $d['job_Title']?>">
    </div>
  </div>
  <div class="form-group">
              <label class="control-label col-sm-2" for="Company">Company:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Company" placeholder="Company Name" name="Company" value="<?php echo $d['job_company']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="emailaddress">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="emailaddress" placeholder="mail@mail.com" name="emailaddress" value="<?php echo $d['job_email']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="contactnumber">Contact:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="contactnumber" placeholder="Contact Number" name="contactnumber" value="<?php echo $d['job_contact_number']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="website">Website:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="website" placeholder="www.website.com" name="website" value="<?php echo $d['website']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Description">Description:</label>
              <div class="col-sm-10">
              <textarea class="form-control" rows="3" placeholder="Description" id="Description" name="Description"><?php echo $d['job_description']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Location">Location:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Location" placeholder="Location" name="Location" value="<?php echo $d['job_location']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="fieldwork">Field:</label>
              <div class="col-sm-10">
                <select class="form-control" name="fieldwork">
                <?php if ($d['job_field_work'] == "Local") {?>
                  <option value="Local" selected>Local</option>
                  <option value="Regional">Regional</option>
                  <option value="National">National</option>
                  <option value="International">International</option>
                  <?php } else if ($d['job_field_work'] == "Regional") { ?>
                  <option value="Local">Local</option>
                  <option value="Regional" selected>Regional</option>
                  <option value="National">National</option>
                  <option value="International" selected>International</option>
                  <?php } else if ($d['job_field_work'] == "National") { ?>
                  <option value="Local">Local</option>
                  <option value="Regional">Regional</option>
                  <option value="National" selected>National</option>
                  <option value="International">International</option>
                <?php } else if ($d['job_field_work'] == "International") { ?>
                  <option value="Local">Local</option>
                  <option value="Regional">Regional</option>
                  <option value="National">National</option>
                  <option value="International" selected>International</option>
                <?php } else { ?>
                  <option value="Local">Local</option>
                  <option value="Regional">Regional</option>
                  <option value="National">National</option>
                  <option value="International">International</option>
                <?php } ?>
                </select>
              </div>
            </div>
  <div class="form-group">
              <label class="control-label col-sm-2" for="status">Status:</label>
              <div class="col-sm-10">
                <select class="form-control" name="status">
                <?php if ($d['job_status'] == "Active") {?>
                  <option value="Active" selected>Active</option>
                  <option value="Inactive">Inactive</option>
                <?php } else if ($d['job_status'] == "Inactive") { ?>
                  <option value="Active">Active</option>
                  <option value="Inactive" selected>Inactive</option>
                <?php } ?>
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