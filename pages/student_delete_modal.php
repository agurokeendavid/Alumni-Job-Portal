<?php 
require_once('../db.php');
if (isset($_REQUEST['id']) ){
 $studentID = $_REQUEST['studentID'];
?>
<form class="form-horizontal text-center" action="../action/recordstudent_delete_action.php?studentID=<?php echo $studentID;?>" method="post">
  <div class="btn-group">
    <button class="btn btn-success" type="submit" name="delete-job">DELETE</button>
    <button class="btn btn-danger" data-dismiss="modal">CANCEL</button>
  </div>
</form>
<?php
}
?>