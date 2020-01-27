<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit-student'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		echo "<script>alert('Student Number or Password is empty !');
										window.location='index.php';
									</script>";
		// Change this to bootstrap alert

	} else {
		login();
	}
}
if (isset($_POST['submit-teacher'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		echo "<script>alert('Username or Password is empty !');
					window.location='index.php';
				</script>";
		// Change this to bootstrap alert

	} else {
		login();
	}
}

function login()
{
	$con = mysqli_connect('localhost','root','','alumniportaldb') or die("ERROR");
	// Define $username and $password
	// To protect MySQL injection for Security purpose
	$username = str_replace(["-", "–"], '', $_POST['username']);
	$password = mysqli_real_escape_string($con, md5($_POST['password']));

	// SQL query to fetch information of registerd users and finds user match.
	$query = mysqli_query($con, "SELECT * FROM `user_account` WHERE `user_name` = '$username' AND `user_password` = '$password'");
	if ($rows = mysqli_fetch_assoc($query)) {
		if ($rows['user_level'] == '0') {
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: dashboard.php"); //go to dashboard
		} elseif ($rows['user_level'] == '1') {
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: dashboard.php"); //go to dashboard
		} elseif ($rows['user_level'] == '2') {
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: dashboard.php"); //go to dashboard
		} elseif ($rows['user_level'] == '3') {
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: dashboard.php"); //go to dashboard
		} else {
			echo "<script>alert('Invalid credentials');
										window.location='index.php';
									</script>";
			// Change this to bootstrap alert
		}
		if ($rows['user_status'] == 'unregister') {
			echo "<script>alert.render('');
										window.location='index.php';
									</script>";
		}
		mysqli_close($con); // Closing Connection
	}

	echo "<script>alert('Invalid Credentials');
										window.location='index.php';
									</script>";
}