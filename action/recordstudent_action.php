<?php  
	$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
	if (isset($_POST['submit_recordstudent'])) {

		// Defining post variable names 
		$student_sinumber = str_replace(["-", "–"], '', $_POST['student_sinumber']);
		$student_firstname = $_POST['student_firstname'];
		$student_middlename = $_POST['student_middlename'];
		$student_lastname = $_POST['student_lastname'];
		$student_email = $_POST['student_email'];
		$student_dob = $_POST['student_dob'];
		$student_contact = $_POST['student_contact'];
		$student_gender = $_POST['student_gender'];
		$student_civilStat = $_POST['student_civil'];
		$student_adress = $_POST['student_adress'];
		$student_department = $_POST['student_department'];
		$student_course = $_POST['student_course'];
		$student_year_grad = $_POST['student_year_grad'];
		$student_year_admission = $_POST['student_year_admission'];
		
		if ($student_sinumber )

		if (empty($student_sinumber) || empty($student_firstname)|| empty($student_middlename)|| empty($student_lastname)|| empty($student_adress)|| empty($student_year_grad)|| empty($student_year_admission)|| empty($student_department) || empty($student_course) || empty($student_email)) {
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
				echo "<script>alert('Empty email !');
														window.location='../pages/recordstudent.php';
													</script>";
			}
			if (empty($student_adress)) {
				echo "<script>alert('Empty address !');
														window.location='../pages/recordstudent.php';
													</script>";
			}
			if (empty($student_year_grad)) {
				echo "<script>alert('Empty year graduated !');
														window.location='../pages/recordstudent.php';
													</script>";
			}
			if (empty($student_year_admission)) {
				echo "<script>alert('Empty year admission !');
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
			//insert query	
				$sql = "INSERT INTO `user_student_detail` (
				   `student_IDNumber`,
				    `student_fName`,
				     `student_mName`,
				      `student_lName`,
				       `student_address`,
				        `student_civilStat`,
				         `student_dob`,
				          `student_gender`,
				           `student_contact`,
				            `student_admission`,
				             `student_year_grad`,
				              `student_department`,
											`student_course`,
				               `student_status`,
				                `student_secretquestion`,
				                 `student_secretanswer`, `student_email`) 

								 VALUES (
				   '$student_sinumber',
				    '$student_firstname' ,
				     '$student_middlename' ,
				      '$student_lastname',
				       '$student_adress' ,
				        '$student_civilStat',
				         '$student_dob',
				          '$student_gender',
				          '$student_contact' ,
				            '$student_year_admission',
				             '$student_year_grad',
										 '$student_department',
				              '$student_course',
				               'unregister',
				                NULL,
								 NULL,
								 '$student_email');";
								 if ($res = mysqli_query($con,$sql)) {
									$last_id = mysqli_insert_id($con);
									$chk = "UPDATE `user_student_detail` 
											SET `student_IDNumber` = '$student_sinumber' WHERE `user_student_detail`.`student_ID` = $last_id";
									
									if($res)
									{
										$sql = "INSERT INTO student_tracer_detail (student_ID, campus) VALUES ($student_sinumber, 'Pontevedra');";
										if (mysqli_query($con, $sql))
										{
											echo "<script>alert('Successfully Added!');
											window.location='../pages/recordstudent.php';
										</script>";
										}
											
										
									}
									else
									{
										echo "<script>alert('Please try again!');
																						window.location='../pages/recordstudent.php';
																					</script>";
									}
								 }
								 else
								 {
									echo "<script>alert('Please try again!');
									window.location='../pages/recordstudent.php';
								</script>";
								 }
		}
}
?>