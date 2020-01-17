<?php 

$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
if (isset($_POST['submit-course'])) {
    $Course = $_POST['Course'];
    $Acronym = $_POST['Acronym'];
    $Department = $_POST['Department'];

   mysqli_query($con,"INSERT INTO `capsu_course` (`course_ID`, `course_departmentID`, `course_name`, `course_acronym`) VALUES (NULL, '$Department', '$Course', '$Acronym');");
    echo "<script>alert('Successfully Added!');
                                                window.location='../pages/course.php';
                                            </script>";
}

if (isset($_POST['edit-course'])) {

    $id = $_REQUEST['id']; 
    $Course = $_POST['Course'];
    $Acronym = $_POST['Acronym'];
    $Department = $_POST['Department'];
    mysqli_query($con,"UPDATE `capsu_course` SET `course_departmentID` = '$Department',`course_name` = '$Course',`course_acronym` ='$Acronym'   WHERE `capsu_course`.`course_ID` = '$id'");
    echo "<script>alert('Successfully Edit!');
                                                window.location='../pages/course.php';
                                            </script>";
}
if (isset($_POST['delete-course'])) {
    $id = $_REQUEST['id']; 
    $res = mysqli_query($con,"DELETE FROM `capsu_course` WHERE `capsu_course`.`course_ID` = $id");
    if ($res)
    {
        echo "<script>alert('Successfully Deleted!');
        window.location='../pages/course.php';
    </script>";
    }
    else {
        echo "<script>alert('Please delete related data first.!');
                                                window.location='../pages/course.php';
                                            </script>";
    }
    
}
?>