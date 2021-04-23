<?php
check_user("productos");

if (isset($agregar) && isset($cant)){

    $idp = clear($agregar);
    $cant = clear($cant);
    $id_cliente = clear($_SESSION['id_cliente']);

    $q = $con->query("INSERT INTO carro (id_cliente,id_producto,cantidad) VALUES ($id_cliente,$idp,$cant)");
    alert("Se ha agregado al carro de compras!");
    redir("?p=productos");
}

$q = $con->query("SELECT * FROM productos ORDER BY id DESC");
while($r = mysqli_fetch_array($q)) {
    ?>
        <div class="producto">
            <div class="name_producto"><?=$r['name']?></div>
            <div><img class="img_producto" src="productos/<?=$r['imagen']?>"/></div>
            <span class="precio"><br><?=$moneda.' '?><?=$r['price']?></span>
            <button class="btn btn-warning float-right" onclick="agregar_carro('<?=$r['id']?>');"><i class="fa fa-shopping-cart"></i></button>
        </div>
    <?php
}
?>

<script type="text/javascript">
    function agregar_carro(idp) {
        var cant = prompt("¿Que cantidad desea agregar?",1);
        if (cant.length>0){
            window.location="?p=productos&agregar="+idp+"&cant="+cant;
        }
    }
</script>