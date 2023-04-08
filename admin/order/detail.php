<?php
	$title = 'Product details';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	$orderId = getGet('id');

	$sql = "select _Order_Details.*, _Product.title, _Product.thumbnail from _Order_Details left join _Product on _Product.id = _Order_Details.product_id where _Order_Details.order_id = $orderId";
	$data = executeResult($sql);

	$sql = "select * from _Orders where id = $orderId";
	$orderItem = executeResult($sql, true);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">
		<h3>Order details</h3>
	</div>
	<div class="col-md-8 table-responsive">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Thumbnail</th>
					<th>Product name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total price</th>
				</tr>
			</thead>
			<tbody>
<?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td><img src="'.fixUrl($item['thumbnail']).'" style="height: 120px"/></td>
					<td>'.$item['title'].'</td>
					<td>'.$item['price'].'</td>
					<td>'.$item['num'].'</td>
					<td>'.$item['total_money'].'</td>
				</tr>';
	}
?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<th>Total price</th>
					<th><?=$orderItem['total_money']?></th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<tr>
				<th>Fullname: </th>
				<td><?=$orderItem['fullname']?></td>
			</tr>
			<tr>
				<th>Email: </th>
				<td><?=$orderItem['email']?></td>
			</tr>
			<tr>
				<th>Address: </th>
				<td><?=$orderItem['address']?></td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td><?=$orderItem['phone_number']?></td>
			</tr>
		</table>
	</div>
</div>
<?php
	require_once('../layouts/footer.php');
?>