<?php
	$title = 'User Management';
	$baseUrl = '../';
    
    $sql = "select _User.*, _Role.role_name as role_name from _User left 
    join _Role on _User.role_id = _Role.id where _User.deleted = 0";

    $data = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">

        <h3>User Management</h3>

        <a href="editor.php"><button class="btn btn-success">Add user</button></a>

            <table class="table table-bordered table-hover" style="margin-top: 20px;">
			    <thead>
				<tr>
					<th>ID</th>
					<th>Fullname</th>
					<th>Email</th>
					<th>Role</th>
					<th style="width: 50px"></th>
					<th style="width: 50px"></th>
				</tr>
			    </thead>
			<tbody>
         <?php
	    $index = 0;
	    foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td>'.$item['username'].'</td>
					<td>'.$item['email'].'</td>
					<td>'.$item['role_name'].'</td>
					<td style="width: 50px">
						<a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a>
					</td>
					<td style="width: 50px">';
		if($user['id'] != $item['id'] && $item['role_id'] != 1) {
			echo '<button onclick="deleteUser('.$item['id'].')" class="btn btn-danger">Delete</button>';
		}
		echo '
					</td>
				</tr>';
	    }
     ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteUser(id) {
		option = confirm('Are you sure to delete this account?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>