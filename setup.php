<?php
$servername = "localhost";
$db_username = "root";   
$db_password = "";       
$dbname = "proje_db";   


$conn = new mysqli($servername, $db_username, $db_password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname' created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}


$conn->select_db($dbname);

$users_table = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($conn->query($users_table) === TRUE) {
    echo "Table 'users' exists or created.<br>";
} else {
    die("Error creating table: " . $conn->error);
}


$admin_username = "admin";
$admin_password = "123456"; 
$hash = password_hash($admin_password, PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT IGNORE INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $admin_username, $hash);
$stmt->execute();
$stmt->close();

echo "Setup finished. You can now login with:<br>";
echo "Username: admin<br>";
echo "Password: 123456<br>";

$conn->close();
?>
