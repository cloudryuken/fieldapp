<?php
 $mysql_host = "localhost";
 $mysql_user = "id1366506_root";
 $mysql_pass = "12345";
 $mysql_db = "id1366506_fieldapp";
 $con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
 
 $username = $_POST["username"];
 $password = $_POST["password"];
 
 $statement = mysqli_prepare($con, "SELECT * FROM users WHERE user = ? AND password = ?");
 mysqli_stmt_bind_param($statement, "ss", $username, $password);
 mysqli_stmt_execute($statement);
 
 mysqli_stmt_store_result($statement);
 mysqli_stmt_bind_result($statement, $id, $username, $password, $name, $email);
 
 $response = array();
 $response["success"] = false;
 
 while(mysqli_stmt_fetch($statement)){
	 $response["success"] = true;
	 $response["username"] = $username;
	 $response["password"] = $password;
	 $response["name"] = $name;
	 $response["email"] = $email;
 }
 
 echo json_encode($response);
?>