<?php include('processDB/createDB.php'); ?>

<?php
  require_once('Utils/utility.php');
  require_once('processDB/dbhelper.php');
  $sql = "select _Product.*, _Category.name as category_name from _Product left join _Category on _Product.category_id = _Category.id order by _Product.updated_at desc limit 0,8";
  $lastestItems = executeResult($sql);
?> 

<!DOCTYPE html>
<head>
  <title>APOLO STORE</title>
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
    <li><a id="login" class="button" href="index.php?page=login">Log In</a></li>
    <li><a class="button" href="index.php?page=logout">Log Out</a></li>
  </header>
  <div id="Name" class="container-fluid p-3">
    <h1 id="sneaker_store"> APOLLO STORE </h1>
    <p id="slogan">"Begin your new adventure"</p>
  </div>
  

  <div id="body" class="container-fluid p-3">
    <p class="Commit">OUR COMMITMENTS</p>
    <div class="row">
      <div class="col-sm-4">
        <img height="60px" src="webimage/free-shipping-svgrepo-com.svg">
        <h3>FREESHIP</h3>
        <p>In Ho Chi Minh City and out of town with 2 pairs or more.</p>
      </div>
      <div class="col-sm-4">
        <img height="60px" src="webimage/policy-11084.svg">
        <h3>SHIPPING POLICY</h3>
        <p>SUPPORT PAYMENT DELIVERY AND FOR CHECKING GOODS</p>
      </div>
      <div class="col-sm-4">
        <img height="60px" width="200px" src="webimage/100-Percent-Satisfaction-Guarantee-Badge.svg">
        <h3>QUALITY ASSURANCE</h3>
        <p>COMMITMENT TO IMAGINE AND QUALITY PRODUCTS IMAGINE</p>
      </div>
    </div>
    <hr color="purple" width="100%" size="3px"/>
    <p class="hello">NEW PRODUCT</p>
    <div class="row">
      
    </div>
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
    <footer id="slideTop" class="container-fluid">
      <a href="#">Slide to the top page</a>
    </footer>
</body>
</html>