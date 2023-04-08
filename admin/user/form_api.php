<?php
session_start();
require_once('../../Utils/utility.php');
require_once('../../processDB/dbhelper.php');

$user = getUserToken();
if($user == null) {
	die();
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteUser();
			break;
	}
}

function deleteUser() {
	$id = getPost('id');
	$updated_at = date("Y-m-d H:i:s");
	$sql = "update _User set deleted = 1, updated_at = '$updated_at' where id = $id";
	execute($sql);
}