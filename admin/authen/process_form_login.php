<?php
require_once('Utils/utility.php');
require_once('processDB/dbhelper.php');
$fullname = $email = $msg = '';

	if(!empty($_POST)){
		$email = getPost('email');
		$pwd = getPost('password');
		$pwd = getSecurityMD5($pwd);

		$sql = "select * from _User where email = '$email' and pass = '$pwd' and deleted = 0";
		$userExist = executeResult($sql, true);

		if($userExist==null)
		{
			$msg = 'Email or password is incorrect';
		}
		else{

			// login success
			$token = getSecurityMD5($userExist['email'].time());
			setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
			$created_at = date('Y-m-d H:i:s');
			$_SESSION['user'] = $userExist;
			$userId = $userExist['id'];

			$sql = "insert into _Tokens (user_id, token, created_at) values ('$userId', '$token', '$created_at')";
			execute($sql);
			if($email=="root@root.com")
			{
			header('Location: ../');

			}
			else{
				header('Location: ../home.php');
			}
			die();
		}
	}

	