<?php

require_once('Utils/utility.php');
require_once('processDB/dbhelper.php');

if(!empty($_POST)) {
	$id = getPost("id");
	$name = getPost("name");

	if($id > 0) {
		//update
		$sql = "update _Category set name = '$name' where id = $id";
		execute($sql);
	} else {
		//insert
		$sql = "insert into _Category(name) values ('$name')";
		execute($sql);
	}
}