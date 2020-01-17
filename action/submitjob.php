<?php 

$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
if (isset($_POST['submit-job'])) {
    $Title = $_POST['Title'];
    $Company = $_POST['Company'];
    $Description = $_POST['Description'];
    $Location = $_POST['Location'];
    $course = $_POST['course'];
    mysqli_query($con,"INSERT INTO `suggested_job` (job_Title, job_company, job_description, job_location, job_Course) VALUES ('$Title', '$Company', '$Description', '$Location', '$course')");
    echo "<script>alert('Successfully Added!');
                                                window.location='../pages/suggestedjob.php';
                                            </script>";
}

if (isset($_POST['edit-job'])) {

    $id = $_REQUEST['id']; 
    $Title = $_POST['Title'];
    $Company = $_POST['Company'];
    $Description = $_POST['Description'];
    $Location = $_POST['Location'];
    $course = $_POST['course'];
    mysqli_query($con,"UPDATE `suggested_job` SET `job_Title` = '$Title', job_company = '$Company', job_description = '$Description', job_location = '$Location', `job_Course` = '$course' WHERE `suggested_job`.`job_ID` = '$id'");
    echo "<script>alert('Successfully Edit!');
                                                window.location='../pages/suggestedjob.php';
                                            </script>";
}
if (isset($_POST['delete-job'])) {
    $id = $_REQUEST['id']; 
    mysqli_query($con,"DELETE FROM `suggested_job` WHERE `suggested_job`.`job_ID` = $id");
    echo "<script>alert('Successfully Deleted!');
                                                window.location='../pages/suggestedjob.php';
                                            </script>";
}
?>