<?php
// check_user("productos");

if (isset($agregar) && isset($cant)) {

    $idp = clear($agregar);
    $cant = clear($cant);
    $id_cliente = clear($_SESSION['id_cliente']);

    $q = $con->query("INSERT INTO carro (id_cliente,id_producto,cantidad) VALUES ($id_cliente,$idp,$cant)");
    alert("Se ha agregado al carro de compras!");
    redir("?p=productos");
}
?>
<a href="?p=agregar_contacto">
    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar Contacto</button>
</a>


<h3 class="mt-5">Listado de contactos</h3>
<?php

$q = $con->query("SELECT * FROM contactos ORDER BY id DESC");
while ($r = mysqli_fetch_array($q)) {
?>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDOS</th>
                <th scope="col">NUMERO DE CEDULA</th>
                <th scope="col">COMPAÑÍA</th>
                <th scope="col">POSICIÓN</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">NOTAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><?= $r['nombre'] ?></td>
                <td><?= $r['apellido'] ?></td>
                <td><?= $r['cedula'] ?></td>
                <td><?= $r['company'] ?></td>
                <td><?= $r['position'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['phone'] ?></td>
                <td><?= $r['NOTAS'] ?></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>