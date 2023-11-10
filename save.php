<?php

include('db.php');

if (isset($_POST['save'])){

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $nickname = $_POST['nickname'];

    $query = "INSERT INTO validacion (nombre, dni, correo, nickname) VALUES ('$nombre', '$dni', '$correo', '$nickname')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'form Save Succefully';
    $_SESSION['message_type'] = 'success';
    
    header("location: index.php");

}