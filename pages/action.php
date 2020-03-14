<?php
//action.php
$connect = mysqli_connect("localhost", "root", "", "alumniportaldb");
$schoolyear = $_POST["schoolyear"];
if(isset($schoolyear))
{

    $query = "
   SELECT count(student_ID) as studentID FROM user_student_detail WHERE student_gender = 'M' AND student_year_grad LIKE '%$schoolyear%';";
 $result1 = mysqli_query($connect, $query);
 $row1 = mysqli_fetch_array($result1);
$sub_query = "
   SELECT count(student_ID) as studentID FROM user_student_detail WHERE student_gender = 'F';";
 $result = mysqli_query($connect, $sub_query);
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
