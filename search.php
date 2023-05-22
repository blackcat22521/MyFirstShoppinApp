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
        .product-thumbnail{
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ccc;
        }
    </style>
<?php
$servername = "localhost";
$username = "mamp";
$password = "Pewpew321.";
$dbname ="OnlineStore";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['input'])) {
    $input = $_POST['input'];
    $sql = "SELECT * FROM _Product WHERE deleted = 0 AND title LIKE '%$input%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-container'>";
            echo "<img src='".$row['thumbnail']."' alt='".$row['title']."' class='product-image'><br>";
            echo "<div class='product-title'>".$row['title']."</div>";
            if($row['discount'] > 0) {
              $sale_price = $row['price'] - ($row['price'] * $row['discount'] / 100);
              echo "<div class='product-price'><strike>$".$row['price']."</strike> $".$sale_price."</div>";
            } else {
              echo "<div class='product-price'>$".$row['price']."</div>";
            }
            echo "<div class='product-description'>".$row['description']."</div>";
            echo "<button>Add to cart</button>";
            echo "</div>";
          }
    } else {
        echo "<div class='autocom-item'>No results</div>";
    }
	
}
?>
