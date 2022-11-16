<?php

$idioma = 'es';

if ($_GET && isset($_GET['idioma'])) {
    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';
}

$cadenas = [
    'subirhome' => [
        'es' => 'Subir ficheros',
        'en' => 'Uploading files'
    ],

    'ficheros' => [
        'es' => 'Ficheros',
        'en' => 'Files'
    ],

    //--------------------------------------------------------

    'bienvenida' => [
        'es' => 'Bienvenid@ a MiniMyCloud',
        'en' => 'Welcome to MiniMyCloud'
    ],
    'presentacion1' => [
        'es' => 'Desde aquí puedes administrar tus ficheros',
        'en' => 'From here you can manage your files'
    ],
    'botonindex' => [
        'es' => '¡Empieza a subir ficheros!',
        'en' => 'Start uploading files!'
    ],

    //--------------------------------------------------------

    'presentacion2' => [
        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',
        'en' => 'Upload PDF files or GIF, PNG and JPEG images'
    ],

    'nombrefichero' => [
        'es' => 'Nombre del fichero',
        'en' => 'File name'
    ],

    'subir2' => [
        'es' => 'Subir el archivo',
        'en' => 'Upload the file'
    ],

    'errorvacio' => [
        'es' => 'Error: Nombre del fichero está vacío.',
        'en' => 'Error: The file name is empty.'
    ],
    //--------------------------------------------------------
    'pdfsubidos' => [
        'es' => 'Tus PDF subidos',
        'en' => 'Your uploaded PDFs'
    ],

    'imgsubidas' => [
        'es' => 'Tus imagenes subidas',
        'en' => 'Your uploaded images'
    ],

];

function getCadena(string $id): string
{
    global $idioma, $cadenas;

    if (isset($cadenas[$id])) {
        return $cadenas[$id][$idioma];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}
