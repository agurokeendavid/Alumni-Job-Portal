<?php 

$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
if (isset($_POST['submit-job'])) {
    $Title = $_POST['Title'];
    $Company = $_POST['Company'];
    $email = $_POST['emailaddress'];
    $contact = $_POST['contactnumber'];
    $website = $_POST['website'];
    $Description = nl2br($_POST['Description']);
    $Location = $_POST['Location'];
    $fieldwork = $_POST['fieldwork'];
    // $course = $_POST['course'];
    $status = $_POST['status'];
    try
    {
        $query = mysqli_query($con,"INSERT INTO `suggested_job` (job_Title, job_company, job_email, job_contact_number, website, job_description, job_location, job_field_work, job_status) VALUES ('$Title', '$Company', '$email', '$contact', '$website','$Description', '$Location', '$fieldwork', '$status')");
        if ($query)
        {
            echo "<script>alert('Successfully Added!');
            window.location='../pages/suggestedjob.php';
        </script>"; 
        }
        
        
    }
    catch (Exception $e)
    {
        echo "<script>alert('" + $ex + "')</script>";
    }
    
}

if (isset($_POST['edit-job'])) {

    $id = $_REQUEST['id']; 
    $Title = $_POST['Title'];
    $Company = $_POST['Company'];
    $email = $_POST['emailaddress'];
    $contact = $_POST['contactnumber'];
    $website = $_POST['website'];
    $Description = nl2br($_POST['Description']);
    $Location = $_POST['Location'];
    $fieldwork = $_POST['fieldwork'];
    // $course = $_POST['course'];
    $status = $_POST['status'];
    $query = mysqli_query($con,"UPDATE `suggested_job` SET `job_Title` = '$Title', job_company = '$Company', `job_email` = '$email', `job_contact_number` = '$contact', `website` = '$website', job_description = '$Description', job_location = '$Location', `job_field_work` = '$fieldwork', `job_status` = '$status' WHERE `suggested_job`.`job_ID` = '$id'");
    if ($query)
    {
        echo "<script>alert('Successfully Edit!');
        window.location='../pages/suggestedjob.php';
    </script>";
    }
    else
    {
        echo "<script>alert('Updating data failed!');
        window.location='../pages/suggestedjob.php';
    </script>";
    }
    
}
if (isset($_POST['delete-job'])) {
    $id = $_REQUEST['id']; 
    mysqli_query($con,"DELETE FROM `suggested_job` WHERE `suggested_job`.`job_ID` = $id");
    echo "<script>alert('Successfully Deleted!');
                                                window.location='../pages/suggestedjob.php';
                                            </script>";
}
?>