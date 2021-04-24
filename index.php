<?php
include "configs/config.php";
include "configs/funciones.php";

if(!isset($p)) {
    $p = "principal";
} else {
    $p = $p;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="fontawesome/css/all.css" />
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="fontawesome/js/all.js"></script>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <link rel="stylesheet" href="css/estilo.css" />
    <title>Tienda Online</title>
</head>

<body>
    <div class="header">
        Tienda Online
    </div>
    <div class="menu">
        <a href="?p=principal">Inicio</a>
        <a href="?p=mision">Mision y vision</a>
        <a href="?p=productos">Artículos</a>
        <a href="?p=historia">Breve historia</a>
        <a href="?p=haremos">Que haremos</a>
        <a href="?p=ofertas">Ofertas</a>
        <a href="?p=admin">Administrador</a>
        <a href="?p=contactos">Contactos</a>
        <?php
            if (isset($_SESSION['id_cliente'])){
        ?>
        <a class="float-right" href="?p=salir">Salir</a>
        <a class="float-right" href="#"><?=nombre_cliente($_SESSION['id_cliente'])?></a>
        <?php
        }
        ?>
    </div>
    <div class="cuerpo">
        <?php
            if (file_exists("modulos/".$p.".php")) {
                include "modulos/".$p.".php";
            } else {
                echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'>Regresar</a></i>";
            }
        ?>
    </div>

    <div class="footer">
        Copyright Rafael A. Reyes &copy; <?=date("Y")?>
    </div>

</body>

</html>