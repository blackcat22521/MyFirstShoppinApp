<?php

require_once('../.././Utils/utility.php');
require_once('../.././processDB/dbhelper.php');

if(!empty($_POST)) {
	$id = getPost('id');
	$fullname = getPost('fullname');
	$email = getPost('email');
	$password = getPost('password');
	if($password != '') {
		$password = getSecurityMD5($password);
	}
	
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

	$role_id = getPost('role_id');

        if($id > 0)

        {
            //update

            $sql = "select * from _User where email = '$email' and id <> $id";
		    $userItem = executeResult($sql, true);
            if($userItem != null) {
                
                $msg = 'Email already existed!';
            }

            else{

                if($password != '') {
                    $sql = "update _User set username = '$fullname', email = '$email', pass = '$password', updated_at = '$updated_at', role_id = $role_id where id = $id";
                    } else {
                    $sql = "update _User set username = '$fullname', email = '$email', updated_at = '$updated_at', role_id = $role_id where id = $id";
                    }
                    execute($sql);
                    header('Location: index.php');
                    die();
            }
		   
			  
        }

        else{
            // insert
            $sql = "select * from _User where email = '$email'";
            $userItem = executeResult($sql, true);
    
            if($userItem==null)
            {	//insert
                $sql =  "insert into _User (username,email,pass,role_id,deleted,created_at,updated_at) values ('$fullname', '$email', '$pwd',2,0,'$created_at','$updated_at')";
                execute($sql);
                header('Location: index.php');
                die();
    
            }
        
            else {
                //Tai khoan da ton tai -> failed
                $msg = 'Email already existed!';
            }
        }
}