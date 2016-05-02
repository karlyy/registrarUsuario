<?php
    $con = mysqli_connect("mysql13.000webhost.com", "a1758633_karla", "12karlyyhdz", "a1758633_registr");
    
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
