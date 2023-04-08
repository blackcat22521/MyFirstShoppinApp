<?php include('processDB/createDB.php'); ?>

<?php
  require_once('Utils/utility.php');
  require_once('processDB/dbhelper.php');

  require_once('home.php');


  $category_id = getGet('id');

  if($category_id == null || $category_id == '') {
      $sql = "select _Product.*, _Category.name as category_name from _Product left join _Category on _Product.category_id = _Category.id order by _Product.updated_at desc limit 0,12";
  } else {
      $sql = "select _Product.*, _Category.name as category_name from _Product left join _Category on _Product.category_id = _Category.id where _Product.category_id = $category_id order by _Product.updated_at desc limit 0,12";
  }
  
  $lastestItems = executeResult($sql);
?> 

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

<body>



 <!-- latest product -->
 <div class="section">
  <div class="container">
      <div class="section-header">
          <h2>Product</h2>
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
                                  <button class="btn-flat btn-hover btn-cart-add">
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

  </div>
</div>
<!-- end latest product -->

 

<!-- best selling -->

    <!-- app js -->
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/index.js"></script>
  </body>
</html>

<?php
require_once('layouts/footer.php');
?>