<?php
    $con = mysqli_connect("mysql13.000webhost.com", "a4243694_karlyy", "12karlyyhdz", "a4243694_ejemplo");
    
    $usernombre = $_POST["usernombre"];
    $Password = $_POST["Password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM usuario WHERE usernombre = ? AND Password = ?");
    mysqli_stmt_bind_param($statement, "ss", $usernombre, $Password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $usuarioid, $nombre, $edad, $usernombre, $Password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["nombre"] = $nombre;
        $response["edad"] = $edad;
        $response["usernombre"] = $usernombre;
        $response["password"] = $Password;
    }
    
    echo json_encode($response);
?>
