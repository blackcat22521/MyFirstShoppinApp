<?php 
require_once('home.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    

</head>
<body>

<div class="container" style="margin-top: 20px; margin-bottom: 200px;">
	<form method="post" onsubmit="return completeCheckout();">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			  <input required="true" type="text" class="form-control" id="usr" name="fullname" placeholder="Fullname">
			</div>
			<div class="form-group">
			  <input required="true" type="email" class="form-control" id="email" name="email" placeholder="Email">
			</div>
			<div class="form-group">
			  <input required="true" type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number">
			</div>
			<div class="form-group">
			  <input required="true" type="text" class="form-control" id="address" name="address" placeholder="Address">
			</div>
			<div class="form-group">
			  <label for="pwd">Note:</label>
			  <textarea class="form-control" rows="3"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<table class="table table-bordered">
			<tr>
                <th>ID</th>
				<th>Product</th>
				<th>Price</th>
				<th>Number of product</th>
				<th>Total Price</th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
foreach($_SESSION['cart'] as $item) {
	echo '<tr>
			<td>'.(++$index).'</td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['discount']).' VND</td>
			<td>
				'.$item['num'].'
			</td>
			<td>'.number_format($item['discount'] * $item['num']).' VND</td>
		</tr>';
}
?>
		</table>
        <a href="checkout.php"><button class="btn-flat btn-hover" style="border-radius: 5px; font-size: 16px; ">CHECK OUT</button></a>
		</div>
	</div>
</form>
</div>
    
</body>
</html>


<script type="text/javascript">
	function completeCheckout() {
		$.post('ajax_request.php', {
			'action': 'checkout',
			'fullname': $('[name=fullname]').val(),
			'email': $('[name=email]').val(),
			'phone_number': $('[name=phone]').val(),
			'address': $('[name=address]').val(),
			'note': $('[name=note]').val()
		}, function() {
			window.open('complete.php', '_self');
		})

		return false;
	}
</script>
<?php
require_once('layouts/footer.php');
?>