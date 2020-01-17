<?php 
  include('../session.php');
  $con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
  if (isset($_POST['submitfeedback'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO feedback (subject, message, from_user) VALUES ('$subject', '$message', '$login_id')";
    $res = mysqli_query($con, $sql);
    if ($res)
    {
      echo "<script>alert('Message sent!');
					window.location='../pages/dashboard.php';
				</script>";
    }
    else
    {
      echo "<script>alert('Message not sent!');
					window.location='../pages/dashboard.php';
				</script>";
    }
  }
?>