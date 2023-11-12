<?php
session_start();

function searchProducts($searchq)
{
    require("./config.php");

    $sql = "SELECT Id, ProductName, SalePrice, ImageLink FROM product WHERE ProductName LIKE '%$searchq%';";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);
    $conn->close();
    $rows = $result->fetch_all();
    $jsonString = json_encode($rows);

    $_SESSION["searchResult"] = $jsonString;
    header('Location: http://localhost/raovat/server?search');
}

function createPost()
{
    $productName = $_POST['productName'];
    $salePrice = $_POST['salePrice'];
    $categoryName = $_POST['categoryName'];
    $imageLink = $_POST['imageLink'];
    $productLink = $_POST['productLink'];

    require("./config.php");

    $sql = "INSERT INTO `product` (`ProductName`, `SalePrice`, `CategoryName`, `ImageLink`, `ProductLink`) VALUES
    ('" . $productName . "','" .  $salePrice . "','" .  $categoryName . "','" .  $imageLink . "','" .  $productLink . "');";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);
    if ($result) {
        echo "<script>confirm('Create post successfully')</script>";
    } else {
        echo "<script>confirm('Failed to create post')</script>";
    }

    header('Location: http://localhost/raovat/server/createpost.php');
}

function deletePost()
{
}

function updatePost()
{
}


if ($_POST['action'] == 'search') {
    $searchq = $_POST['keyword'];
    $sql = "SELECT Id, ProductName, SalePrice, ImageLink FROM product WHERE ProductName LIKE '%$searchq%';";
    searchProducts($searchq);
} elseif ($_POST['action'] == 'create') {
    createPost();
}
