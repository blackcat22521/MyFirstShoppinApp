
<!DOCTYPE html>
<head>
  <title>PRODUCT PAGE</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="webimage/https://kit.fontawesome.com/13ae3a08e3.js" crossorigin="anonymous"></script>
  
</head>

<body>
  <header>
    <a class="logo" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="120" height="60">
        <path
          d="M22.602 22.954h-3.33L14.46 35.44h3.015l.786-2.115h4.546l-.823-2.34h-2.997l1.947-5.373L24.4 35.44h3.014zM73.22 35.44V22.954h2.677V33.1h5.278v2.34H73.22zm15.43 0V22.954h2.677V33.1h5.28v2.34H88.65zM58.395 25.2a4.02 4.02 0 0 1 4.015 4.015 4.02 4.02 0 0 1-4.015 4.015 4.02 4.02 0 0 1-4.015-4.015 4.02 4.02 0 0 1 4.015-4.015m0-2.443a6.46 6.46 0 0 0-6.458 6.458 6.46 6.46 0 0 0 6.458 6.459 6.46 6.46 0 0 0 6.459-6.459 6.46 6.46 0 0 0-6.459-6.458zm50.517 2.443a4.02 4.02 0 0 1 4.015 4.015 4.02 4.02 0 0 1-4.015 4.015 4.02 4.02 0 0 1-4.016-4.015 4.02 4.02 0 0 1 4.016-4.015m0-2.443a6.46 6.46 0 0 0-6.459 6.458 6.46 6.46 0 0 0 6.459 6.459 6.46 6.46 0 0 0 6.459-6.459 6.46 6.46 0 0 0-6.459-6.458zm-67.888.206H35.2V35.44h2.66v-4.297h3.164c2.22 0 4.018-1.876 4.018-4.095s-1.8-4.094-4.018-4.094zm0 5.745H37.86v-3.303h3.164c.868 0 1.574.78 1.574 1.65s-.706 1.65-1.574 1.65zm-8.118 10.53a.67.67 0 0 0-.56.3l-.923 1.008c-1.368 1.368-2.96 2.44-4.733 3.2a14.79 14.79 0 0 1-5.795 1.17c-2.012 0-3.96-.393-5.795-1.17a14.82 14.82 0 0 1-4.733-3.19 14.85 14.85 0 0 1-3.192-4.733A14.93 14.93 0 0 1 6.005 30a14.8 14.8 0 0 1 1.17-5.795 14.84 14.84 0 0 1 3.192-4.733c1.368-1.368 2.962-2.44 4.733-3.192a14.79 14.79 0 0 1 5.795-1.17c2.012 0 3.96.393 5.795 1.17a14.8 14.8 0 0 1 3.569 2.144c-.06.175-.1.358-.1.543a1.68 1.68 0 1 0 1.68-1.68 1.67 1.67 0 0 0-.65.131c-2.805-2.3-6.393-3.68-10.304-3.68C11.9 13.736 4.63 21.017 4.63 30s7.282 16.264 16.264 16.264c5.025 0 9.515-2.28 12.498-5.86.124-.124.2-.296.2-.486a.69.69 0 0 0-.688-.688z"
          fill="#333" />
      </svg></a>
    <nav class="navbar">
      <ul class="menu">
        <li><a class="button" href="index.php?page=home">Home</a></li>
        <li><a class="button" href="index.php?page=about">About</a></li>
        <li><a class="button" href="index.php?page=contact">Contact</a></li>
        <div class="dropdown">
          <span>
            <li><a class="button" href="index.php?page=products">Products</a></li>
          </span>
          <div class="dropdown-content">
            <p>Hello World!</p>
          </div>
        </div>
      </ul>
    </nav>
    <?php
    if(isset($username)) {
        echo "<div style='text-align: right;'>Logged in as Loc </div>";
    }
    ?>
    <li><a class="button" href="index.php?page=logout">Log Out</a></li>
  </header>

    <style>
        .product-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .product-container {
            display: inline-block;
            width: 300px;
            height: 380px;
            margin: 10px;
            padding: 10px;
            align-items: center;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 2px #ccc;
            text-align: center;
            justify-content: center;
        }


        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

       
        .product-price {
            font-size: 16px;
            margin-bottom: 10px;
        }

       
        .product-description {
            font-size: 14px;
            margin-bottom: 10px;
            height: 80px;
            overflow: hidden;
        }
    </style>
<body>
 
<div class="search-box">
  <input type="text" id="search-txt" class="form-control" placeholder="Type to search product you want" autocomplete="off">
  <a class="search-btn">
    <i class="fas fa-search"></i>
  </a>
  <div class="autocom-box">
  </div>
  <div id="searchresult"></div>
  <script> include("js/script.js"); </script>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function() {

$("#search-txt").on("input", function() {
  var input = $(this).val();
  if (input != "") {
    $.ajax({
      url: "search.php",
      method: "POST",
      data: { input: input },
      success: function(data) {
        $("#searchresult").html(data).show(); 
      }
    });
  } else {
    $("#searchresult").html("").hide(); 
  }
});

});

</script>

    <?php
    $servername = "localhost";
    $username = "mamp";
    $password = "Pewpew321.";
    $dbname ="OnlineStore";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
//         $sql = "INSERT INTO _Product (title, price, discount, thumbnail, description, deleted)
//     VALUES 
//     ('Nike Air Force 1', 100, 0, 'productsimage/nike-air-force-1.webp', 'Classic style with modern comfort', 0),
//     ('Adidas Superstar', 80, 0, 'productsimage/adidassuperstar.webp', 'Iconic low-top design', 0),
//     ('Vans Old Skool', 65, 0, 'productsimage/vansoldskool.webp', 'Legendary lace-up design', 0),
//     ('Converse Chuck Taylor', 50, 10, 'productsimage/conversechucktaylor.jpeg', 'All-time classic', 0),
//     ('Puma Suede Classic', 70, 0, 'productsimage/puma.webp', 'Retro silhouette with modern updates', 0),
//     ('Reebok Classic Leather', 90, 0, 'productsimage/rebookclassic.webp', 'Timeless design with sleek style', 0),
//     ('New Balance 990', 180, 0, 'productsimage/ newbalance.webp', 'Premium materials and exceptional comfort', 0),
//     ('Fila Disruptor II', 75, 0, 'productsimage/fila.jpeg', 'Chunky sole and retro design', 0),
//     ('ASICS Gel-Lyte III', 120, 0, 'productsimage/gellyte.webp', 'Gel cushioning system for maximum comfort', 0),
//     ('Under Armour Curry 7', 140, 0, 'productsimage/underarmour.jpeg', 'Basketball shoes with responsive cushioning', 0)";
//   if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM _Product WHERE deleted = 0 LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);

$product_list = "";
while($row = mysqli_fetch_assoc($result)) {
  $product_list .= "<div class='product-container'>";
  $product_list .= "<img src='".$row['thumbnail']."' alt='".$row['title']."' class='product-image'><br>";
  $product_list .= "<div class='product-title'>".$row['title']."</div>";
  if($row['discount'] > 0) {
    $sale_price = $row['price'] - ($row['price'] * $row['discount'] / 100);
    $product_list .= "<div class='product-price'><strike>$".$row['price']."</strike> $".$sale_price."</div>";
  } else {
    $product_list .= "<div class='product-price'>$".$row['price']."</div>";
  }
  $product_list .= "<div class='product-description'>".$row['description']."</div>";
  $product_list .= "<button>Add to cart</button>";
  $product_list .= "</div>";
}
$sql = "SELECT COUNT(*) AS total FROM _Product WHERE deleted = 0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row['total'] / $limit);
if(isset($page)==1){
  
}
$pagination = "<div class='pagination'>";
for($i = 1; $i <= $total_pages; $i++) {
  if($i == $page) {
    $pagination .= "<span class='current-page' style='background-color: #D3D3D3; color: black ;padding: 8px;'>".$i."</span>";
  } else {
    $pagination .= "<a href='products.php?page=".$i."' style='background-color: #888; color: black; padding: 8px;'>".$i."</a>";
  }
}
echo "$product_list";
$pagination .= "</div>";
echo "<div style='background-color: white; display: flex; justify-content: center; align-items: center; margin-top: 20px; padding: 5px;'>".$pagination."</div>";
mysqli_close($conn);
    ?>
 <div class="footer-content">
      <p>APOLLO was established in 2023 with the goal of providing customers with the best quality products. Hope that
        customers had a happy and satisfied shopping time at APOLLO. If you have any questions, please give suggestions
        to APOLLO so that APOLLO can improve and develop more and more! Thank you!</p>
      <div class="row">
        <div class="col-sm-4">
          <p><img height="40px" src="webimage/reshot-icon-social-media-YQH65GLWP4.svg">Like APOLLO on social networks</p>
          <ul class="socials">
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
          </ul>
        </div>
        <div class="col-sm-4">

          <p><img height="40px" src="webimage/reshot-icon-location-service-XH6Z2EK8RC.svg">Store address</p>
          <p>268 Ly Thuong Kiet Street, Ward 14, District 10, Ho Chi Minh City, Vietnam</p>
        </div>
        <div class="col-sm-4">
          <p> <img height="40px" src="webimage/reshot-icon-clock-W368X57GYT.svg">Opening time</p>
          <p>09:00 – 22:00: All days of the week</p>
        </div>
      </div>
    </div>

</body>
</html>