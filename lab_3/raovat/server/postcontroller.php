<?php
session_start();

function execQuery($query)
{
	require("./config.php");

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$result = $conn->query($query);
	$conn->close();

	return $result;
}

function searchProducts()
{
	$keyword = $_POST['keyword'];
	$sql = "SELECT Id, ProductName, SalePrice, ImageLink FROM product WHERE ProductName LIKE '%" . $keyword . "%';";
	$result = execQuery($sql);
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

	$sql = "INSERT INTO `product` (`ProductName`, `SalePrice`, `CategoryName`, `ImageLink`, `ProductLink`) VALUES
    ('" . $productName . "','" .  $salePrice . "','" .  $categoryName . "','" .  $imageLink . "','" .  $productLink . "');";

	$result = execQuery($sql);

	echo '<script type="text/javascript">';
	if ($result) {
		echo 'alert("Tạo thành công!");';
	} else {
		echo 'alert("Tạo thất bại!");';
	}

	echo 'window.location.href="http://localhost/raovat/server/createpost.php";';
	echo '</script>';
}

function deletePost()
{
	$id = $_GET['id'];
	$sql = "DELETE FROM `product` WHERE Id=" . $id;
	$result = execQuery($sql);

	echo '<script type="text/javascript">';
	if ($result) {
		echo 'alert("Xóa thành công!");';
	} else {
		echo 'alert("Xóa thất bại!");';
	}

	echo 'window.location.href="http://localhost/raovat/server/managepost.php";';
	echo '</script>';
}

function updatePost()
{
	$id = $_COOKIE['productId'];
	$productName = $_POST['productName'];
	$salePrice = $_POST['salePrice'];
	$categoryName = $_POST['categoryName'];
	$imageLink = $_POST['imageLink'];
	$productLink = $_POST['productLink'];


	$sql = "update `product` set ProductName='" . $productName . "', 
            SalePrice='" . $salePrice . "', 
            CategoryName='" . $categoryName . "', 
            ImageLink='" . $imageLink . "', 
            ProductLink='" . $productLink . "' 
            where Id=" . $id;

	$result = execQuery($sql);
	echo "Result:" . $result;

	echo '<script type="text/javascript">';
	if ($result) {
		echo 'alert("Cập nhật thành công!");';
	} else {
		echo 'alert("Cập nhật thất bại!");';
	}

	echo 'window.location.href="http://localhost/raovat/server/managepost.php";';
	echo '</script>';
}


if (isset($_POST['action']) && $_POST['action'] == 'search') {
	searchProducts();
} elseif (isset($_POST['action']) && $_POST['action'] == 'create') {
	createPost();
} elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
	updatePost();
} else if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	deletePost();
}
