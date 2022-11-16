<!DOCTYPE html>
<?php

require "lengua.php";

function mostrarpdf()
{


    $todosFicheros = scandir('./ficheros'); //hace que se muestren los ficheros pdf
    $ficherosTxt = [];
    if ($todosFicheros !== false) {
        foreach ($todosFicheros as $fic) {
            if (pathinfo($fic, PATHINFO_EXTENSION) == 'pdf') {
                $ficherosTxt[] = "./ficheros/$fic";
            }
        }
    }
    echo "<ul>";
    foreach ($ficherosTxt as $fic) {
        echo "<li>";
        echo "<a href=./ficheros/" . $fic . ">" . explode("/", $fic)[2] . "</a>";
        echo "</li>";
    }
    echo "</ul>";
}

function mostrarimagenes()
{

    $todosFicheros = scandir('./ficheros'); //hace que se muestren las imagenes con determinada extensión
    $ficherosTxt = [];
    if ($todosFicheros !== false) {
        foreach ($todosFicheros as $fic) {
            if (pathinfo($fic, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($fic, PATHINFO_EXTENSION) == 'jpg' || pathinfo($fic, PATHINFO_EXTENSION) == 'gif' || pathinfo($fic, PATHINFO_EXTENSION) == 'png') {
                $ficherosTxt[] = "./ficheros/$fic";
            }
        }
    }

    foreach ($ficherosTxt as $fic) {
        echo "<a target='_blank' href=" . $fic . "><img width='200px' height='auto' src='" . $fic . "'></a>";
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
    <!--------------------------------------------------------------------------------->


    <h1><u><?=getCadena('pdfsubidos')?></u> </h1>

    <?= mostrarpdf(); ?>

    <h1><u><?=getCadena('imgsubidas')?></u> </h1>

    <?= mostrarimagenes(); ?>

    <!--------------------------------------------------------------------------------->
    <hr>
    <footer>
        <p>&copy 2022 MiniMyCloud, Inc.</p>
        <p>Laura López</p>
    </footer>


</body>

</html>