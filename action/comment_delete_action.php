<?php 

include('../session.php'); 
$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");


	$cid = $_REQUEST['cid'];
	$result = mysqli_query($con,"DELETE  FROM `forum_comment` WHERE `comment_ID` = '$cid'");
	echo "<script>alert('Successfully Deleted');
						window.location='../pages/forum.php';
					</script>";

?>