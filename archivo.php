<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.inc.php';
        $db = new Conect_MySql();
        $sql = "select*from tbl_documentos where id_documento=" . $_GET['id'];
        $query = $db->execute($sql);
        if ($datos = $db->fetch_row($query)) {
            if ($datos['nombre_archivo'] == "") {
                ?>
                <p>NO tiene archivos</p>
                <?php
            } else {
                header("Content-type: application/pdf; charset=utf-8 ");
                header("Content-Disposition: ");
                ?>
                <?php echo $datos['pdf']; ?>"></iframe>
        <?php
        }
    }
    ?>
</body>
</html>
