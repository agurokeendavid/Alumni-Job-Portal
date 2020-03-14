<?php 
  include('../session.php');
  $con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
  $schoolyear = $_POST["schoolyear"];
  if(isset($schoolyear))
  {
  
      $query = "
     SELECT count(student_ID) as studentID FROM user_student_detail WHERE student_gender = 'M' AND student_year_grad LIKE '%$schoolyear%';";
   $result1 = mysqli_query($con, $query);
   $row1 = mysqli_fetch_array($result1);
  $sub_query = "
     SELECT count(student_ID) as studentID FROM user_student_detail WHERE student_gender = 'F' AND student_year_grad LIKE '%$schoolyear%';";
   $result = mysqli_query($con, $sub_query);
   $row = mysqli_fetch_array($result);
      $data[] = array(
          'label' => "Male",
          'value' => $row1[0]
      );
      $data1[] = array(
          'label' => "Female",
          'value' => $row[0]
      );
  
      $data = array_merge($data, $data1);
      $data = json_encode($data);
      echo $data;
  }
  ?>