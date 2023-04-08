<?php
session_start();
require_once('Utils/utility.php');
require_once('processDB/dbhelper.php');

$user = getUserToken();
if($user == null) {
	die();
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteCategory();
			break;
	}
}

function deleteCategory() {
	$id = getPost('id');
	$sql = "delete from _Category where id=$id";
	execute($sql);
}