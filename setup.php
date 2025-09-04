<?php
$servername = "localhost";
$db_username = "root";   
$db_password = "";       

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dbname = trim($_POST['dbname']);

    try {
      
        $pdo = new PDO("mysql:host=$servername", $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
        echo "Database '$dbname' created or already exists.<br>";

       
        $pdo->exec("USE `$dbname`");

      
        $users_table = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        $pdo->exec($users_table);
        echo "Table 'users' exists or created.<br>";

  
        $admin_username = "admin";
        $admin_password = "123456";
        $hash = password_hash($admin_password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT IGNORE INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $admin_username, 'password' => $hash]);

        echo "Setup finished. You can now login with:<br>";
        echo "Username: admin<br>";
        echo "Password: 123456<br>";

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

} else {
    
    ?>
    <h2>Setup: Enter Database Name</h2>
    <form method="post">
        Database name: <input type="text" name="dbname" value="proje_db" required>
        <button type="submit">Create Database & Tables</button>
    </form>
    <?php
}
?>
