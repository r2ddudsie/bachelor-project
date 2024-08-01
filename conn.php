<?php
//Hardcoded username and password for demonstration purposes
session_start();

$servername = "localhost"; $username = "root";
$password = ""; $database = "Access_DB"; $access_table = "access_table";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database"; // Create database
if ($conn->query($sql) === TRUE)
   {$conn->select_db($database);} //Select DataBase
else
   {die("Error creating database:" . $conn->connect_error);}
   
//Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS $access_table(
ID_ INT AUTO_INCREMENT PRIMARY KEY, login_ VARCHAR(25) NOT NULL UNIQUE,
passwd_ VARCHAR(255) NOT NULL)";

if ($conn->query($sql) === TRUE) {
   //Insert the initial user
   $initial_login = "test"; $initial_passwd = "test";
   $hash_initial_passwd = password_hash($initial_passwd,PASSWORD_BCRYPT);//Or Argon2 (>=PHP 7.2)
   $sql = "INSERT IGNORE INTO $access_table (login_, passwd_) VALUES (?,?)";
   $temp = $conn->prepare($sql);
   if($temp === FALSE)
      {die("Declaration prepare error: " . $conn->error);}
   else
      {
       $temp->bind_param("ss",$initial_login, $hash_initial_passwd);//ss - string
       if ($temp->execute()) 
         {echo "Inicial user created successfully!";} 
       else 
         {die("Inicial user creation error: " . $temp->error);}  
      }  
   } 
   else {die("Error creating table: " . $conn->error);}
   
// Check login
if (isset($_POST['login'])) {
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $sql = "SELECT passwd_ FROM $access_table WHERE login_ = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === FALSE) {
        die("Declaration prepare error: " . $conn->error);
    } else {
        $stmt->bind_param("s", $login_username);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        
        if ($hashed_password && password_verify($login_password, $hashed_password)) {
            // Login successful
            header('Location: principal.php');
            exit();
        } else {
            // Login failed
            $_SESSION['error'] = "Username ou password inválidos.";
            header('Location: login.php');
            exit();
        }
    }
}

//$conn->close();


