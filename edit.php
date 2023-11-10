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
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'form Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");

    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">

                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    

                    <div class="form-group">
                        <input type="text" placeholder="Dispositivo" name="dispositivo" class="form-control" value="<?php echo $dispositivo; ?>">
                    </div>

                    <div class="form-group">
                        <select class="form-select" name="modelo" aria-label="Default select example"  autofocusvalue="<?php echo $modelo; ?>">
                            <option selected >g-1</option>
                            <option value="1">g-2</option>
                            <option value="2">g-3</option>
                            <option value="3">g-4</option>
                            <option value="4">g-5</option>
                            <option value="5">g-6</option>
                        
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="N° Serie" class="form-control" name="serie" value="<?php echo $serie; ?>">
                    </div>

                    <div class="form-group">
                        <input type="file" name="img" class="form-control" name="img" value="<?php echo $img; ?>" autofocus->
                    </div>

                    <button class="btn btn-success" name="update"> Update </button>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>