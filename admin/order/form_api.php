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
		case 'update_status':
			updateStatus();
			break;
	}
}

function updateStatus() {
	$id = getPost('id');
	$status = getPost('status');

	$sql = "update _Orders set status = $status where id = $id";
	execute($sql);
}