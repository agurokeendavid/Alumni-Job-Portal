<?php 
require_once('../db.php');
if (isset($_REQUEST['id']) ) 
{
 $id = $_REQUEST['id'];
?>
              <table class="table table-bordered" id="studentlist">
                <thead>
                  <tr>
                    <th>ID No.</th>
                    <th>Name</th>
                    <th>Year Admitted</th>
                    <th>Year Graduated</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>ID No.</th>
                    <th>Name</th>
                    <th>Year Admitted</th>
                    <th>Year Graduated</th>
                  </tr>
                </tfoot>
                <tbody>

                  <?php 

$sql = mysqli_query($con,"SELECT usd.student_IDNumber, usd.student_fName, usd.student_mName, usd.student_lName, usd.student_admission, usd.student_year_grad FROM user_student_detail usd
INNER JOIN capsu_course cc ON usd.student_course = cc.course_ID WHERE usd.student_course = " . $id);
while ($d = mysqli_fetch_array($sql)) {
    ?>
                  <tr>
                    <td><?php  echo $d[0];?></td>
                    <td><?php  echo $d[2] . ', ' . $d[1] . ' ' . $d[3] . '.';?></td>
                    <td><?php  echo date("F d, Y", strtotime($d[4]));?></td>
                    <td><?php  echo date("F d, Y", strtotime($d[5]));?></td>
                  </tr>
                  <?php
}
?>
                </tbody>
              </table>
<?php 
}
?>
<script type="text/javascript">
$(document).ready(function() {
  var dataTable = $('#studentlist').DataTable({});
});
</script>