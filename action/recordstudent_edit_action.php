<?php 
	$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
	if (isset($_POST['Submit'])) {
		$studentID = $_REQUEST['studentID'];
		// Defining post variable names 
		$student_sinumber = $_POST['student_sinumber'];
		$student_firstname = $_POST['student_firstname'];
		$student_middlename = $_POST['student_middlename'];
		$student_lastname = $_POST['student_lastname'];
		$student_email = $_POST['student_email'];
    $student_adress = $_POST['student_adress'];
    $student_dob = $_POST['student_bday'];
		$student_year_grad = $_POST['student_year_grad'];
		$student_year_admission = $_POST['student_year_admission'];
		$student_department = $_POST['student_department'];
		$student_course = $_POST['student_course'];
		$student_civil = $_POST['student_civil'];
		$student_contact = $_POST['student_contact'];
		// To protect MySQL injection for Security purpose
		$student_sinumber = stripslashes($student_sinumber);
		$student_firstname = stripslashes($student_firstname);
		$student_middlename = stripslashes($student_middlename);
		$student_lastname = stripslashes($student_lastname);
		$student_email = stripslashes($student_email);
		$student_adress = stripslashes($student_adress);
		$student_dob = stripslashes($student_dob);
		$student_year_grad = stripslashes($student_year_grad);
		$student_year_admission = stripslashes($student_year_admission);
		$student_department = stripslashes($student_department);
		$student_course = stripslashes($student_course);
		$student_contact = stripslashes($student_contact);
		$student_civil = stripslashes($student_civil);

		$student_sinumber = mysqli_real_escape_string($con,$student_sinumber);
		$student_firstname = mysqli_real_escape_string($con,$student_firstname);
		$student_middlename = mysqli_real_escape_string($con,$student_middlename);
		$student_lastname = mysqli_real_escape_string($con,$student_lastname);
		$student_email = mysqli_real_escape_string($con,$student_email);
    $student_adress = mysqli_real_escape_string($con,$student_adress);
    $student_dob = mysqli_real_escape_string($con, $student_dob);
		$student_year_grad = mysqli_real_escape_string($con,$student_year_grad);
		$student_year_admission = mysqli_real_escape_string($con,$student_year_admission);
		$student_department = mysqli_real_escape_string($con,$student_department);
		$student_course = mysqli_real_escape_string($con,$student_course);
		$student_contact = mysqli_real_escape_string($con,$student_contact);
		$student_civil = mysqli_real_escape_string($con,$student_civil);

if (empty($student_sinumber) || empty($student_firstname)|| empty($student_middlename)|| empty($student_lastname)|| empty($student_adress)|| empty($student_dob) || empty($student_year_grad)|| empty($student_year_admission)|| empty($student_department) || empty($student_course) || empty($student_email)) {
	if (empty($student_sinumber) ) {
		echo "<script>alert('Empty id number !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_firstname)) {
		echo "<script>alert('Empty firstname !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_middlename)) {
		echo "<script>alert('Empty middlename !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_lastname)) {
		echo "<script>alert('Empty lastname !');
												window.location='../pages/recordstudent.php';
											</script>";
	}

	if (empty($student_email)) {
		echo "<script>alert('Empty email address!');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_adress)) {
		echo "<script>alert('Empty address !');
												window.location='../pages/recordstudent.php';
											</script>";
  }
  if (empty($student_dob)) {
		echo "<script>alert('Empty date of birth !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_year_grad)) {
		echo "<script>alert('Empty year graduated !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_year_admission)) {
		echo "<script>alert('Empty student_year_admission !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_department)) {
		echo "<script>alert('Empty department !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
	if (empty($student_course)) {
		echo "<script>alert('Empty course !');
												window.location='../pages/recordstudent.php';
											</script>";
	}
}
else{
		


		$chk = "UPDATE `user_student_detail` 
				SET `student_IDNumber` = '$student_sinumber' WHERE `user_student_detail`.`student_ID` = $studentID";
		
		if ($chk = mysqli_query($con,$chk)){

			

			//insert query
			$sql = "UPDATE `user_student_detail` SET  student_IDNumber = '$student_sinumber', student_fName = '$student_firstname', student_mName = '$student_middlename', student_lName = '$student_lastname', student_address = '$student_adress', student_dob = '$student_dob', student_admission = '$student_year_admission', student_year_grad = '$student_year_grad', student_department = '$student_department', student_course = '$student_course',student_contact = '$student_contact', student_civilStat = '$student_civil', student_email = '$student_email'";

			$sql.= "  WHERE `user_student_detail`.`student_ID` = $studentID;";
			$res = mysqli_query($con,$sql);
			
			echo "<script>alert('Successfully Update!');
													window.location='../pages/recordstudent.php';
												</script>";
			
			
		}
		else{
			echo "<script>alert('Faculty Id Must be unique!');
															window.location='../pages/recordstudent.php';
														</script>";
		}
}
	
	}
?>