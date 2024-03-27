<?php
// Assuming a GET request with a product ID
$productID = $_GET['id'];

// Database connection variables
$host = "localhost";
$dbname = "your_database";
$username = "your_username";
$password = "your_password";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT name, description, price, image_url FROM products WHERE id = ?");
    $stmt->execute([$productID]);

    $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($productDetails);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>