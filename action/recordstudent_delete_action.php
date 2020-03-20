<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
$studentID = $_REQUEST['studentID'];
$verfy_sql = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_ID = '$studentID'");
$verfy_qry = mysqli_fetch_array($verfy_sql);
$student_userID = $verfy_qry['student_userID'];
$id_number = mysqli_query($con, "SELECT `student_IDNumber` FROM `user_student_detail` `usd` INNER JOIN `student_tracer_detail` `std` ON `usd`.`student_IDNumber` = `std`.`student_ID` WHERE `usd`.`student_ID` = '$studentID'");
$verify_id_number = mysqli_fetch_array($id_number);
if ($student_userID == 0) {
	mysqli_query($con,"DELETE FROM `user_student_detail` WHERE `student_ID` = '$studentID'");
	mysqli_query($con,"DELETE FROM `student_tracer_detail` WHERE `student_ID` = '$verify_id_number[0]'");
}
else
{
	mysqli_query($con,"DELETE FROM `user_student_detail` WHERE `student_ID` = '$studentID'");
	$list_forum_topic = mysqli_query($con, "SELECT `topic_ID` FROM `forum_topic` WHERE `post_owner_id` = '$student_userID'");
	while ($row_value = mysqli_fetch_array($list_forum_topic)) {
		mysqli_query($con, "DELETE FROM `view_counter` WHERE `view_topicID` = '$row_value[0]'");
	}
	mysqli_query($con,"DELETE FROM `forum_topic` WHERE `post_owner_id` = '$student_userID'");
	mysqli_query($con,"DELETE FROM `student_tracer_detail` WHERE `student_ID` = '$verify_id_number[0]'");
	mysqli_query($con,"DELETE FROM `user_account` WHERE `user_ID` = '$student_userID'");
}


echo "<script>alert('Successfully Deleted');
						window.location='../pages/recordstudent.php';
					</script>";


?>