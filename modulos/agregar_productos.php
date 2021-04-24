<?php
check_admin();

if (isset($enviar)) {
    $name = clear($name);
    $price = clear($price);

    $imagen = "";

    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $imagen = "IMG_" . rand(0, 90000) . ".png"; // Nombre mas generico y sin espacios
        // $imagen = $name.rand(0,90000).".png";
        move_uploaded_file($_FILES['imagen']['tmp_name'], "productos/" . $imagen);
    }

    $con->query("INSERT INTO productos (name,price,imagen) VALUES ('$name','$price','$imagen')");
    alert("Producto agregado");
    redir("?p=agregar_productos");
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <div class="mt-2">
        <input type="text" class="form-control" name="name" placeholder="Nombre del producto" />
    </div>

    <div class="mt-2">
        <input type="text" class="form-control" name="price" placeholder="Precio del producto" />
    </div>

    <label>Imagen del producto</label>
    <div class="mt-2">
        <input type="file" class="" name="imagen" title="Imagen del producto" />
    </div>

    <div class="mt-2">
        <button type="submit" class="btn btn-success" name="enviar"><i class="fa fa-check"></i> Agregar producto</button>
    </div>
</form>