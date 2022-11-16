<!DOCTYPE html>

<?php
require 'lengua.php';

$errores = [
    'ficheros' => null,
    'nombre' => null
];

$imprimirFormulario = true;
if ($_POST) {

    if (isset($_POST['namefile'])) {
        $nameSanitize = htmlspecialchars(trim($_POST['namefile']));
        if (mb_strlen($nameSanitize) == 0) {
            $errores['nombre'] = "<div class='alert alert-danger'><i class='fa-solid fa-circle-exclamation'></i>&nbsp;" . getCadena('errorvacio') . "</div>";
        }
    }

    if (
        $_FILES && isset($_FILES['fichero_usuario']) &&
        $_FILES['fichero_usuario']['error'] === UPLOAD_ERR_OK &&
        $_FILES['fichero_usuario']['size'] > 0
    ) {

        $fichero = $_FILES['fichero_usuario']['tmp_name'];
        $permitido = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'application/pdf');

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_fichero = finfo_file($finfo, $fichero);

        if (!in_array($mime_fichero, $permitido)) {
            $errores['ficheros'] = "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-circle-exclamation'></i>&nbsp;Error: los ficheros $mime_fichero no están permitidos</div>";
        } else {

            $permitido = array('gif', 'png', 'jpg', 'pdf', 'jpeg');
            $fichero = $_FILES['fichero_usuario']['name'];
            $extension = pathinfo($fichero, PATHINFO_EXTENSION);

            $rutaFicheroDestino = "./ficheros/" . $nameSanitize . "." . $extension;
            $seHaSubido = move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $rutaFicheroDestino);

            if ($seHaSubido) {
                $imprimirFormulario = false;
            } else {
                $errores['ficheros'] = "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-circle-exclamation'></i>&nbsp;No se subido correctamente</div>";
            }
        }
    } else {
        $errores['ficheros'] = "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-circle-exclamation'></i>&nbsp;El fichero no debe estar vacio.</div>";
    }
}

?>




<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MiniMyCloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/b93f27c71a.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img class="logo" src="img/logo.png" height="30px" width="33px">
            <a class="navbar-brand" href="#">MiniMyCloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="subir.php"><?= getCadena('subirhome'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cloud.php"><?= getCadena('ficheros'); ?></a>
                    </li>
                </ul>
                <form class="d-flex" action="#" method="get">
                    <select class="form-select me-2" name="idioma" aria-label="Default select example">
                        <option value="es" <?php if ($idioma == 'es') {
                                                echo 'selected';
                                            } ?>>Español</option>
                        <option value="en" <?php if ($idioma == 'en') {
                                                echo 'selected';
                                            } ?>>English</option>
                    </select>
                    <input type="submit" class="btn btn-outline-primary" value="OK">
                </form>
            </div>
            </ul>
        </div>
        </div>
    </nav>

    <!-- ---------------------------------------------------------- -->
    <div class="container-fluid cuerpo py-4">
        <h1><?= getCadena('presentacion2'); ?></h1>

        <?php

        ?>

        <?php if ($imprimirFormulario) { ?>
            <form class="p-5" action="subir.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><?= getCadena('nombrefichero') ?></span>
                        <input name="namefile" value="<?= array_key_exists('namefile', $_POST) != null ? $_POST['namefile'] : "" ?>" type="text" class="form-control" aria-describedby="basic-addon1">

                    </div>
                    <?php
                    if ($errores['nombre'] != null) {
                        echo $errores['nombre'];
                    }
                    ?>

                    <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" name="fichero_usuario" id="fichero_usuario">
                        <label class="input-group-text" for="inputGroupFile02"></label>
                    </div>

                    <?php
                    if ($errores['ficheros'] != null) {
                        echo $errores['ficheros'];
                    }
                    ?>

                    <button type="submit" class="btn btn-primary btn-lg"><?= getCadena('subir2') ?>&nbsp;&nbsp;<i class="fa-solid fa-circle-up"></i></button>
                </div>
            </form>
        <?php } else {
            echo "<div class='alert alert-primary' role='alert'><i class='fa-solid fa-check'></i>&nbsp;Fichero " . $nameSanitize . "." . $extension . " subido correctamente</div>";
            echo "<a href='subir.php'>Subir otro fichero</a>";
        } ?>
    </div>

    <hr>
    <footer>
        <p>&copy 2022 MiniMyCloud, Inc.</p>
        <p>Laura López</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>