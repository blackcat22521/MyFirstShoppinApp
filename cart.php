<?php 
require_once('home.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Cart</title>
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/app.css">

</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body>
<div class="container" style="margin-top: 80px; margin-bottom: 300px;">
	<div class="row">
		<table class="table table-bordered">
			<tr>
				<th>ID</th>
				<th>Product</th>
				<th>Name</th>
				<th>Price</th>
				<th>Number of product</th>
				<th>Total Price</th>
				<th></th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
foreach($_SESSION['cart'] as $item) {
	echo '<tr>
			<td>'.(++$index).'</td>
			<td><img src="'.$item['thumbnail'].'" style="height: 80px"/></td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['discount']).' VND</td>
			<td style="display: flex"><button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', -1)">-</button>
				<input type="number" id="num_'.$item['id'].'" value="'.$item['num'].'" class="form-control" style="width: 90px; border-radius: 0px" onchange="fixCartNum('.$item['id'].')"/>
				<button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', 1)">+</button>
			</td>
			<td>'.number_format($item['discount'] * $item['num']).' VND</td>
			<td><button class="btn btn-danger" onclick="updateCart('.$item['id'].', 0)">Remove</button></td>
		</tr>';
}
?>
		</table>
		<a href="checkout.php"><button class="btn-flat btn-hover" style="border-radius: 5px; font-size: 16px; ">proceed to checkout</button></a>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	function addMoreCart(id, delta) {
		num = parseInt($('#num_' + id).val())
		num += delta
		$('#num_' + id).val(num)

		updateCart(id, num)
	}

	function fixCartNum(id) {
		$('#num_' + id).val(Math.abs($('#num_' + id).val()))

		updateCart(id, $('#num_' + id).val())
	}

	function updateCart(productId, num) {
		$.post('./ajax_request.php', {
			'action': 'update_cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload()
		})
	}
</script>
