<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$dbname = "mydb";
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if($conn->query($sql) === TRUE){
    echo "Table users created successfully";
}else{
    echo "Error creating table: " . $conn->error;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "add_user"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

    if($conn->query($sql) === TRUE){
        echo "New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
</body>
</html>