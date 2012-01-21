<?php

ini_set("max_execution_time", 500);

function url_exists($url) {
    $handle = curl_init($url);
    if (false === $handle) {
        return false;
    }
    curl_setopt($handle, CURLOPT_HEADER, FALSE);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($handle, CURLOPT_FAILONERROR, TRUE);  // this works
    curl_setopt($handle, CURLOPT_HTTPHEADER, Array("Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6"));
    curl_setopt($handle, CURLOPT_NOBODY, TRUE);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, FALSE);
    $result = curl_exec($handle);
    curl_close($handle);
    return $result;
}

function get_file_from_url($url) {
    $handle = curl_init($url);
    if (false === $handle) {
        return false;
    }
    curl_setopt($handle, CURLOPT_HEADER, FALSE);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($handle, CURLOPT_FAILONERROR, TRUE);  // this works
    curl_setopt($handle, CURLOPT_HTTPHEADER, Array("Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6"));
    curl_setopt($handle, CURLOPT_NOBODY, FALSE);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($handle);
    curl_close($handle);
    return $result;
}

function Create_Animate_Tile($file) {

    $animation = new Imagick($file);
    $coalesced = $animation->coalesceImages();
    // total frames
    $frames = $coalesced->getNumberImages();
    $ancho = $frames * 80;
    # Crear un nuevo lienzo y una imagen blanca
    $lienzo = new Imagick();
    $lienzo->newImage($ancho, 80, "white");
    foreach ($coalesced as $frame) {
        $x = (int) ($frame->getImageIndex() * 80);
        $frame->scaleImage(80, 80, false);
        $lienzo->compositeImage($frame, Imagick::COMPOSITE_OVER, $x, 0);
    }
    # Establecer el formato a PNG
    $lienzo->setImageFormat('jpeg');
    $lienzo->setImageCompressionQuality(90);
    # Imprimir la imagen
    return $lienzo;
}

function file_name_url($str) {
    $str = explode("/", $str);
    return $str[count($str) - 1];
}

function fileExt($str) {
    return substr($str, strlen($str) - 4, 4);
}

function writeLog($filename, $size, $newname) {
    $log = "./uploaded/images.txt";
    $fh = fopen($log, 'a') or die("can't open file");

    $stringData = "--------------------------------------\r\n" .
            "Archivo Original: {$filename} \r\n" .
            "Tamaño: " . floor($size / 1024) . "Kb \r\n" .
            "Animacion Terminada: " . $newname . " \r\n" .
            "-------------------------------------- \r\n\r\n";
    fwrite($fh, $stringData);
    fclose($fh);
}

function writeImage($destino, $image) {
    $ourFileHandle = fopen($destino, 'w') or die("can't open file");
    fwrite($ourFileHandle, $image);
    fclose($ourFileHandle);
}