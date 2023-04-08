<?php
	$title = 'Category management';
	$baseUrl = '../';
	require_once('header.php');

	require_once('form_save.php');
	$id = $name = '';
	if(isset($_GET['id'])) {
		$id = getGet('id');
		$sql = "select * from _Category where id = $id";
		$data = executeResult($sql, true);

		if($data != null) {
			$name = $data['name'];
		}
	}

	$sql = "select * from _Category";
	$data = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<h3>Category management</h3>
	</div>
	<div class="col-md-6">
		<form method="post" action="index.php" onsubmit="return validateForm();">
			<div class="form-group">
			  <label for="usr" style="font-weight: bold;">Category name:</label>
			  <input required="true" type="text" class="form-control" id="usr" name="name" value="<?=$name?>">
			  <input type="text" name="id" value="<?=$id?>" hidden="true">
			</div>
			<button class="btn btn-success">Save</button>
		</form>
	</div>
	<div class="col-md-6 table-responsive">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Category name</th>
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
					<td>'.$item['name'].'</td>
					<td style="width: 50px">
						<a href="?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a>
					</td>
					<td style="width: 50px">
						<button onclick="deleteCategory('.$item['id'].')" class="btn btn-danger">Delete</button>
					</td>
				</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteCategory(id) {
		option = confirm('Do you want to delete this category?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			if(data != null && data != '') {
				alert(data);
				return;
			}
			location.reload()
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>