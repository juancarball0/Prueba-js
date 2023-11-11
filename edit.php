<?php

    include("db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM validacion WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $dni = $row['dni'];
            $correo = $row['correo'];
            $nickname = $row['nickname'];
        }       
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $correo = $_POST['correo'];
        $nickname = $_POST['nickname'];

        $query = "UPDATE validacion set nombre = '$nombre', dni = '$dni', correo = '$correo', nickname = '$nickname' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'User Updated Successfully';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");

    }

?>

<?php include("includes/header.php") ?>


<div class="container-fluid">
        <div class="row d-flex justify-content-center mt-4 m-1">
                       
            <div class="col-lg-5">

                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre</label>
                            <input type="text" class="formulario__input" name="nombre" value="<?php echo $nombre; ?>" id="nombre" placeholder="ingrese nom completo" autofocus>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y solo puede contener  letras.</p>
                        </div>

                        <!-- Grupo: DNI -->
                        <div class="formulario__grupo" id="grupo__dni">
                            <label for="dni" class="formulario__label">DNI</label>
                            <input type="text" class="formulario__input" name="dni" value="<?php echo $dni; ?>" id="dni" placeholder="ingrese nro dni">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">El DNI tiene que ser de 8 a 11 dígitos.</p>
                        </div>

                        <!-- Grupo: Correo Electronico -->
                        <div class="formulario__grupo" id="grupo__correo">
                            <label for="correo" class="formulario__label">Correo Electrónico</label>
                            <input type="email" class="formulario__input" name="correo" value="<?php echo $correo; ?>" id="correo" placeholder="correo@correo.com">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i> 
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                        </div>

                        <!-- Grupo: NickName -->
                        <div class="formulario__grupo" id="grupo__nickname">
                            <label for="nikname" class="formulario__label">NickName</label>
                            <input type="text" class="formulario__input" name="nickname" value="<?php echo $nickname; ?>"  id="nickname" placeholder="Apodo">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            
                            <p class="formulario__input-error">El Apodo tiene qe ser no maximo de 14 dígitos.</p>
                        </div>

                       
                        

                        <div class="formulario__grupo formulario__grupo-btn-enviar mt-2">
                            <button type="submit" class="formulario__btn" name="update" >Update</button>

                        </div>
                    </form>
                </div>
            </div>

<?php include("includes/footer.php") ?>