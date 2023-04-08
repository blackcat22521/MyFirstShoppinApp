<?php 
require_once('layouts/header.php');

$productId = getGet('id');
$sql = "select _Product.*, _Category.name as category_name from _Product left join _Category on _Product.category_id = _Category.id where _Product.id = $productId";
$product = executeResult($sql, true);

$category_id = $product['category_id'];
$sql = "select _Product.*, _Category.name as category_name from _Product left join _Category on _Product.category_id = _Category.id where _Product.category_id = $category_id order by _Product.updated_at desc limit 0,4";

$lastestItems = executeResult($sql);
?>
<!-- product -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />
    <title>ATrietShop</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <!-- boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- app css -->
    <link rel="stylesheet" href="./assets/css/grid.css" />
    <link rel="stylesheet" href="./assets/css/app.css" />
</head>

<style>
.form-cotrol::-webkit-outer-spin-button,
.form-control::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.form-control{
	border-width:0px;
	border:none;
	font-size: 15px; 
	color: grey;
	text-align: center;
}
</style>
<body>

<div class="container">
    <div class="box">
     	<div class="breadcumb">
                    <a href="./index.php">home</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="category.php?id=<?=$product['category_id']?>"> <?=$product['category_name']?></a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="#"><li><?=$product['title']?></li></a>
        </div>
	 </div>

        <div class="row product-row">
            <div class="col-5 col-md-12">
                <div class="product-img" id="product-img">
                    <img src="<?=$product['thumbnail']?>" alt="">
            </div>
        </div>

        	<div class="col-7 col-md-12">
                <div class="product-info">
                    <h1>
                    <?=$product['title']?>
                    </h1>

                    <div class="product-info-detail">
                        <span class="product-info-detail-title">Brand:</span>
                        <a href="#"><?=$product['category_name']?></a>
                    </div>

                    <div class="product-info-detail">
                            <span class="product-info-detail-title">Rated:</span>
                            <span class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </span>
                    </div>

                    <p class="product-description">
                        <h4>Description</h4>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo libero alias officiis dolore doloremque eveniet culpa dignissimos, itaque, cum animi excepturi sed veritatis asperiores soluta, nisi atque quae illum. Ipsum.
                    </p>
                    <p style="font-size: 15px; color: grey; margin-top: 15px; margin-bottom: 15px;">
				    <del><?=number_format($product['price'])?> VND</del>
			        </p>
                    <p class="product-info-price"><?=number_format($product['discount'])?> VND</p>
					<div class="product-quantity-wrapper">
                            <button class="product-quantity-btn"  onclick="addMoreCart(-1)">
                                <i class='bx bx-minus'></i>
                            </button>
							<input type="number" name="num" class="form-control" step="1" value="1" style="height:30px;max-width: 50px;" onchange="fixCartNum()">
                            <button class="product-quantity-btn"  onclick="addMoreCart(1)">
                                <i class='bx bx-plus'></i>
                            </button>
                        </div>
        	        </div>
                    <div>
                            <button class="btn-flat btn-hover" style="margin-top: 25px;" onclick="addCart(<?=$product['id']?>, $('[name=num]').val())">
                            add to cart
                            </button>
                    </div>

            </div>
    </div>
</div>





<!-- end product -->

<!-- related product -->
<div class="section">
  <div class="container">
      <div class="section-header">
          <h2>Related Product</h2>
            </div>
            <div class="row" id="best-products">
                <?php
                        $count = 0;
                		foreach($lastestItems as $item) {
                            
                                echo '               
                      <div class="col-3 col-md-6 col-sm-12">
                      <div class="product-card">
                          <div class="product-card-img">
                          <a href="detail.php?id='.$item['id'].'">
                          <img src="'.$item['thumbnail'].'" alt="">
                          <img src="'.$item['thumbnail'].'" alt="">
                          </a>
                    
                          </div>
                          <div class="product-card-info">
                              <div class="product-btn">
                                  <a class="btn-flat btn-hover btn-shop-now " href="detail.php?id='.$item['id'].'">shop now</a>
                                  <button class="btn-flat btn-hover btn-cart-add" onclick="addCart('.$item['id'].', 1)">
                                      <i class="bx bxs-cart-add"></i>
                                  </button>
                              </div>
                              <div class="product-card-name">
                              <a href="detail.php?id='.$item['id'].'"><p style="font-weight: bold;">'.$item['title'].'</p></a>
                              </div>
                              <div class="product-card-price">
                              <p style="color: red; font-weight: bold;">'.number_format($item['discount']).' VND</p>
                              </div>
                          </div>
                      </div>
                  </div>';
    

                            
                			$count++;
                		}
                	?>

                  
            </div>
        <div class="section-footer">
                <a href="./products.html" class="btn-flat btn-hover">view all</a>
        </div>
  </div>
</div>
<!-- end latest product -->
    
</body>
</html>


<script type="text/javascript">
	function addMoreCart(delta) {
		num = parseInt($('[name=num]').val())
		num += delta
		if(num < 1) num = 1;
		$('[name=num]').val(num)
	}


	function fixCartNum() {
		$('[name=num]').val(Math.abs($('[name=num]').val()))
	}
</script>
<?php
require_once('layouts/footer.php');
?>