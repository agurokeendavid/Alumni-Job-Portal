<?php 
include('../session.php'); 
$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
if ($login_level == '1') {
	$user_type = "student";
}
if ($login_level == '2') {
	$user_type = "teacher";
}
if ($login_level == '3') {
	$user_type = "admin";
}
if (isset($_POST['update_tracer'])) {
	# code...update_name
	$update_idnumber = $_POST['idnumber'];
	$update_datehired = $_POST['datehired'];
    $update_statusemployment = $_POST['statusemployment'];
    $update_monthly_income = str_replace(".", "", $_POST['monthlyincome']);
	$update_percentage_increase = $_POST['percentageincrease'];
	$update_employer = $_POST['employer'];
	$sql = "UPDATE student_tracer_detail SET date_hired_current_job = '$update_datehired', status_employment = '$update_statusemployment', monthly_income = '$update_monthly_income', percentage_increase = '$update_percentage_increase', employer = '$update_employer' WHERE student_ID = '$update_idnumber';";
	if (mysqli_query($con,$sql)) {
        echo "<script>alert('successfully Update!');
				window.location='../pages/profile.php';
			</script>";
    }
    else
    {
        echo "<script>alert('Failed!');
				window.location='../pages/profile.php';
			</script>";
    }
	
}
else
{
  echo "<script>alert('Failed!');
      window.location='../index.php';
    </script>";
}
?>