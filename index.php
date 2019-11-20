<?php
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = $nombre;
    $image = $_FILES['archivo']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    if ($nombre != "") {
        $titulo = $_POST['titulo'];
        $descri = $_POST['descripcion'];
        $db = new Conect_MySql();
        $sql = "INSERT INTO tbl_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo,pdf) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre','$imgContent')";
        $query = $db->execute($sql);
        if ($query) {
            echo "Se guardo correctamente";
        }
    } else {
        echo "Error";
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div style="width: 500px;margin: auto;border: 1px solid blue;padding: 30px;">
            <h4>Subir PDF</h4>
            <form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label>Titulo</label></td>
                        <td><input type="text" name="titulo"></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion</label></td>
                        <td><textarea name="descripcion"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="file" name="archivo"></td>
                    <tr>
                        <td><input type="submit" value="subir" name="subir"></td>
                        <td><a href="lista.php">lista</a></td>
                    </tr>
                </table>
        </div>
    </body>
</html>
