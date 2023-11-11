<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-4 m-1">
                        
            <div class="col-lg-5">

                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); } ?>

                <div class="card card-body">
                    <form action="save.php" method="POST"  class="formulario" id="formulario" onsubmit="return validarFormulario()">

                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre</label>
                            
                            <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="ingrese nom completo" autofocus>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            
                            <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y solo puede contener  letras.</p>
                        </div>

                        <!-- Grupo: DNI -->
                        <div class="formulario__grupo" id="grupo__dni">
                            <label for="dni" class="formulario__label">DNI</label>
                            
                            <input type="text" class="formulario__input" name="dni" id="dni" placeholder="ingrese nro dni">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            
                            <p class="formulario__input-error">El DNI tiene que ser de 8 a 11 dígitos.</p>
                        </div>

                        <!-- Grupo: DNI 2 -->
                        <div class="formulario__grupo" id="grupo__dni2">
                            <label for="dni2" class="formulario__label">Repetir DNI</label>
                            
                            <input type="text" class="formulario__input" name="dni2" id="dni2" placeholder="ingrese nro dni">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            
                            <p class="formulario__input-error">Ambas DNI deben ser iguales.</p>
                        </div>

                        <!-- Grupo: Correo Electronico -->
                        <div class="formulario__grupo" id="grupo__correo">
                            <label for="correo" class="formulario__label">Correo Electrónico</label>
                            
                            <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                        </div>

                        <!-- Grupo: NickName -->
                        <div class="formulario__grupo" id="grupo__nickname">
                            <label for="nikname" class="formulario__label">NickName</label>
                            
                            <input type="text" class="formulario__input" name="nickname" id="nickname" placeholder="Apodo">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            
                            <p class="formulario__input-error">El Apodo tiene qe ser no maximo de 14 dígitos.</p>
                        </div>

                        <!-- Grupo: Terminos y Condiciones -->
                        <div class="formulario__grupo" id="grupo__terminos">
                            <label class="formulario__label">
                                <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                                Acepto los Terminos y Condiciones
                            </label>
                        </div>

                        

                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn" name="save" >Enviar</button>
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </div>
                    </form>
                </div>
            </div>

       
        
            <div class="col-lg-7">
                <table class="table table-bordered ">

                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dni</th>
                            <th>Correo</th>
                            <th>NickName</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM validacion";
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['dni'] ?></td>
                                <td><?php echo $row['correo'] ?></td>
                                <td><?php echo $row['nickname'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            
                        <?php } ?>
                    </tbody>

                </table>
            </div>
         </div>
    </div>
    
        <script src="js/formulario.js"></script>
	    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
             
   
</body>
</html>
<?php include("includes/footer.php") ?>


