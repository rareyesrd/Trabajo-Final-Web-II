<?php
// check_admin();

if (isset($enviar)) {
    $nombre = clear($nombre);
    $apellido = clear($apellido);
    $company = clear($company);
    $position = clear($position);
    $cedula = clear($cedula);
    $phone = clear($phone);
    $email = clear($email);
    $NOTAS = clear($NOTAS);

    // $imagen = "";

    // if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
    //     $imagen = "IMG_".rand(0,90000).".png"; // Nombre mas generico y sin espacios
    //     // $imagen = $name.rand(0,90000).".png";
    //     move_uploaded_file($_FILES['imagen']['tmp_name'], "productos/".$imagen);
    // }

    $con->query("INSERT INTO contactos (nombre,apellido,cedula,company,position,email,phone,NOTAS) VALUES ('$nombre','$apellido','$cedula', '$company', '$position', '$email', '$phone', '$NOTAS')");
    alert("Cliente agregado");
    redir("?p=agregar_contacto");
}
?>
<h3>Agregar contacto</h3>
<form method="post" action="" class="contactos-form mb-5" enctype="multipart/form-data">
    <div class="mt-2">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre del cliente" />
    </div>
    <div class="mt-2">
        <input type="text" class="form-control" name="apellido" placeholder="Apellido del cliente" />
    </div>
    <div class="mt-2">
        <input type="text" class="form-control" name="cedula" placeholder="Cédula del cliente" />
    </div>
    <div class="mt-2">
        <input type="text" class="form-control" name="company" placeholder="Compañia en que trabaja" />
    </div>
    <div class="mt-2">
        <input type="text" class="form-control" name="position" placeholder="Posicion que desempeña" />
    </div>
    <div class="mt-2">
        <input type="text" class="form-control" name="email" placeholder="Email" />
    </div>
    <div class="mt-2">
        <input type="text" class="form-control" name="phone" placeholder="Telefono" />
    </div>
    <div class="mt-2">
        <textarea class="form-control" name="NOTAS" id="" cols="30" rows="3" placeholder="Notas"></textarea>
    </div>
    <div class="d-flex justify-content-around mt-5">
        <div>
            <button type="submit" class="btn btn-success" name="enviar"><i class="fa fa-check"></i> Agregar Contacto</button>
        </div>
        <div>
            <button type="reset" class="btn btn-danger" name="enviar"><i class="fa fa-times"></i> Cancelar</button>
        </div>
        <div>
            <button type="button" class="btn btn-secondary" name="enviar"> <a href="?p=contactos" style="color: white"><i class="fa fa-undo-alt"></i> Regresar</a></button>
        </div>
    </div>
</form>