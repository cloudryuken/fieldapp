<?php
 $mysql_host = "localhost";
 $mysql_user = "id1366506_root";
 $mysql_pass = "12345";
 $mysql_db = "id1366506_fieldapp";
 $con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
 
 $username = $_POST["username"];
 $password = $_POST["password"];
 $name = $_POST["name"];
 $email = $_POST["email"];
 
 $statement = mysqli_prepare($con, "INSERT INTO users (username, password, name, email) VALUES (?, ?, ?, ?)");
 mysqli_stmt_bind_param($statement, "siss", $username, $password, $name, $email);
 mysqli_stmt_execute($statement);
 
 $response = array();
 $response["success"] = false;
 
 echo json_encode($response);
?>