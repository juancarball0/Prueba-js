<?php

include('db.php');

if (isset($_POST['save'])){

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $nickname = $_POST['nickname'];

    $query = "INSERT INTO validacion (nombre, dni, correo, nickname) VALUES ('$nombre', '$dni', '$correo', '$nickname')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        $_SESSION['message'] = 'Error al guardar el usuario. Error: ' . mysqli_error($conn);
        $_SESSION['message_type'] = 'danger';
        header("location: index.php");
    } else {
        $_SESSION['message'] = 'Usuario guardado correctamente.';
        $_SESSION['message_type'] = 'success';
        header("location: index.php");
    }
}
?>