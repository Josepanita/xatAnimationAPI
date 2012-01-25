<?php

ini_set("max_execution_time", 500);

class Image {

    private function check_external_image($url) {
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

    private function get_external_image($url) {
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

    function split_gif($file) {

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

    function base_name($str) {
        return pathinfo($str, PATHINFO_FILENAME);
    }

    function file_name($str) {
        return pathinfo($str, PATHINFO_BASENAME);
    }

    function file_ext($str) {
        return pathinfo($str, PATHINFO_EXTENSION);
    }

    function log($filename, $size, $newname) {
        $log = "./uploaded/images.txt";

        $stringData = "--------------------------------------\r\n" .
                "Archivo Original: {$filename} \r\n" .
                "Tamaño: " . floor($size / 1024) . "Kb \r\n" .
                "Animacion Terminada: " . $newname . " \r\n" .
                "-------------------------------------- \r\n\r\n";

        echo $stringData;
        fwrite($fh, $stringData);
        fclose($fh);
    }

    function save_image($image, $dest, $mode = "w+b") {
        if (!$f = @fopen($path, $mode)) {
            return FALSE;
        }


        flock($f, LOCK_EX);
        fwrite($f, $data);
        flock($f, LOCK_UN);
        fclose($f);
        return TRUE;
    }

}


