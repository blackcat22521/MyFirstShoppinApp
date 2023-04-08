<?php 

include 'db_conn.php';

if (isset($_POST['s'])) {
	
	$key = "%{$_POST['s']}%";

	$sql = "SELECT * FROM _Product
	        WHERE title 
	        LIKE ? OR id Like ?
	        LIMIT 4";

	$stmt = $conn->prepare($sql);
	$stmt->execute([$key, $key]);

	if ($stmt->rowCount() > 0) {
		$results = $stmt->fetchAll();
        // $results = executeResult($sql);
		foreach ($results as $result) { ?>
		<li>
		  <a href="detail.php?id=<?=$result['id']?>"><?=$result['title']?></a>
		</li>
	   <?php
       }
	}else echo "not found";
}