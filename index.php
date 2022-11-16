<!DOCTYPE html>

<?php
require 'lengua.php';
?>

<!-- if (in_array($_GET['idioma'],['es','en'])) -->

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
                        <a class="nav-link" href="subir.php"><?=getCadena('subirhome');?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cloud.php"><?=getCadena('ficheros');?></a>
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

  <div class="container-fluid pb-4 cuerpo">
    <h1 class="mt-0 "><?= getCadena('bienvenida'); ?><h1>
        <p> <?= getCadena(('presentacion1'));?></p>
        <a href="subir.php"><button type="button" class="btn btn-primary btn-lg"><?=getCadena('botonindex');?>&nbsp;&nbsp;<i class="fa-solid fa-cloud-arrow-up"></i></button><a>
  </div>

  <hr>
  <footer>
			<p>&copy 2022 MiniMyCloud, Inc.</p>
			<p>Laura López</p>
		</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>