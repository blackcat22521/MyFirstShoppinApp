<?php
$servername = "localhost";
$username = "mamp";
$password = "Pewpew321.";
$dbname ="OnlineStore";

$conn =  mysqli_connect($servername, $username, $password, $dbname);


// // create table for user

$sqlUserTable = "CREATE TABLE IF NOT EXISTS  _User(
    id INT AUTO_INCREMENT, 
    username VARCHAR(64),
    email VARCHAR(64),
    pass VARCHAR(64),
    PRIMARY KEY(id)
    )";

$resultUserTable = mysqli_query($conn,$sqlUserTable) or die("Bad Create: $sqlUserTable");


// create table for products
$sqlProductTable = "CREATE TABLE IF NOT EXISTS  _Product(
    id INT AUTO_INCREMENT, 
    title VARCHAR(350),
    price INT,
    discount INT,
    thumbnail VARCHAR(500),
    description longtext,
    deleted int,
    PRIMARY KEY(id)
    )";

$resultProductTable = mysqli_query($conn,$sqlProductTable ) or die("Bad Create: $sqlProductTable");



?>