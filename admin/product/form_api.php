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
			deleteProduct();
			break;
	}
}

function deleteProduct() {
	$id = getPost('id');
	$updated_at = date("Y-m-d H:i:s");
	$sql = "delete from _Product where id = $id";
	execute($sql);
}