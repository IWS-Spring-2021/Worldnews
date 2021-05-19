<?php
session_start();
include_once '../config/Database.php';
include_once '../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);
if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$news_id = validate($_POST['news_id']);

	// if (empty($uname)) {
	// 	header("Location: index.php?error=User Name is required");
	//     exit();
	// }else if(empty($pass)){
	//     header("Location: index.php?error=Password is required");
	//     exit();
	// }else{

	// hashing the password
	// $pass = md5($pass);

	$_SESSION['temp_uname'] = $row['username'];


	$result = $user->get_user_by_username_password($uname, $pass);
	$num = $result->rowCount();
	// echo $num;

	if ($num == 1) {
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// // echo $row['username'] . $row['password'];
		if ($row['username'] === $uname && $row['password'] === $pass) {
			$_SESSION['username'] = $row['username'];
			$_SESSION['user_id'] = $row['user_id'];
			if ($uname === 'admin') {
				header("Location: /worldnews/client/admin/dashboard.php?login_user=$uname");
				exit();
			} else {
				if ($news_id !== '') {
					header("Location: /worldnews/client/news_single.php?id=$news_id&login_user=$uname");
					exit();
				} else {
					header("Location: /worldnews/client?login_user=$uname");
					exit();
				}

				// } else {
				// 	// 	echo "<script>
				// 	// alert('Wrong username or password');
				// 	// window.location.href = '/worldnews/client/news_single.php?id=$news_id';
				// 	// </script>";
				// 	header("Location: /worldnews/client/news_single.php?id=$news_id_login");
				// 	exit();
				// }
			} 
		} else {
			header("Location: /worldnews/client/login.php?news_id=$news_id&uname=$uname&error=Wrong username or password");
			exit();
		}
	}else {
		// header("Location: /worldnews/client/news_single.php?id=7");
		header("Location: /worldnews/client/login.php?news_id=$news_id&uname=$uname&error=Wrong username or password");
		exit();
	}
}
