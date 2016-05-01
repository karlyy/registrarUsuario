<?php 
  $con = mysqli_connect("mysql13.000webhost.com", "a4243694_karlyy", "12karlyyhdz", "a4243694_ejemplo"); 
  $nombre = $_POST["nombre"]; 
  $edad = $_POST["edad"]; 
  $usernombre = $_POST["usernombre"]; 
  $Password = $_POST["Password"]; 
  $statement = mysqli_prepare($con, "INSERT INTO usuario (nombre,edad, usernombre, Password) VALUES (?, ?, ?, ?)"); 
  mysqli_stmt_bind_param($statement, "siss", $nombre, $edad, $usernombre, $Password); 
  mysqli_stmt_execute($statement); 

  $response = array(); 
  $response["success"] = true;   
  echo json_encode($response); 
  ?> 
