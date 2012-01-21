<?php

require_once 'lib/functions.inc';

if (!empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
    $prefijo = substr(crc32(rand()), 2, 2);
    $filename = $prefijo . "_" . $_FILES['Filedata']['name'];
    $targetFile = str_replace('//', '/', $targetPath) . $filename;

    if (move_uploaded_file($tempFile, $targetFile)) {

        chmod($targetFile, "777");
        $image = Create_Animate_Tile($targetFile);
        $jpgFile = str_replace('//', '/', $targetPath) . substr($filename, 0, -4) . ".jpg";

        writeImage($jpgFile, $image);
        writeLog($filename, $_FILES['Filedata']['size'], $jpgFile);

        $data = array(
            'filename' => $filename,
            'uploaded' => true,
            'urlgif' => 'http://localhost/api/uploaded/' . $filename,
            'urlanimate' => 'http://localhost/api/uploaded/' . (substr($filename, 0, -4) . ".jpg"),
            'fileanimate' => $jpgFile,
            'filegif' => $targetFile
        );
        echo print_r($_FILES);
        echo json_encode($data);
    }else{
        $data = array(
            'uploaded' => false
            );
        echo json_encode($data);
    }
        
} else {
    if (!empty($_POST["url"]) || !empty($_GET["url"])) {

        $url = (!empty($_POST["url"]) ? $_POST["url"] : $_GET["url"] );

        $ErrorResp = array(
            "status" => "error"
        );
        $SucessResp = array(
            "status" => "sucess",
        );

        if (fileExt($url) == '.gif') {
            $file = url_exists($url);
            if ($file === FALSE) {
                $ErrorResp["message"] = "La Imagen No Existe";
                echo json_encode($ErrorResp);
            } else {

                $filecontent = get_file_from_url($url);
                $filename = file_name_url($url);

                $targetPath = 'uploaded/';
                $prefijo = substr(crc32(rand()), 2, 2);
                $filename = $prefijo . "_" . $filename;
                $targetFile = str_replace('//', '/', $targetPath) . $filename;

                $fh = fopen($targetFile, 'w') or die("can't open file");
                fwrite($fh, $filecontent);
                fclose($fh);
                chmod($targetFile, "777");

                $image = Create_Animate_Tile($targetFile);
                $jpgFile = str_replace('//', '/', $targetPath) . substr($filename, 0, -4) . ".jpg";

                writeImage($jpgFile, $image);
                chmod($jpgFile, "777");
                writeLog($filename, filesize($jpgFile), $jpgFile);

                $SucessResp += array(
                    'filename' => $filename,
                    'urlgif' => 'http://localhost/xatTools/uploaded/' . $filename,
                    'urlanimate' => 'http://localhost/xatTools/uploaded/' . (substr($filename, 0, -4) . ".jpg"),
                    'fileanimate' => str_replace("/", '\\', $_SERVER['DOCUMENT_ROOT'] . "/xatTools/" . $jpgFile),
                    'filegif' => str_replace("/", '\\', $_SERVER['DOCUMENT_ROOT'] . "/xatTools/" . $targetFile)
                );
                clearstatcache();
                echo json_encode($SucessResp);
            }
        } else {
            $ErrorResp["message"] = "Imagen Invalida";
            echo json_encode($ErrorResp);
        }
    } else {
        //header("Location: ./index.html");
    }
}