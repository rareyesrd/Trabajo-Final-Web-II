<?php

if(isset($enviar)){
    $username = clear($username);
    $password = clear($password);

    $q = $con->query("SELECT * FROM admins WHERE username = '$username' AND passwd = '$password'");

    if(mysqli_num_rows($q)>0){
        $r = mysqli_fetch_array($q);
        $_SESSION['id'] = $r['id'];
        redir("?p=admin");
    } else {
        alert("Los datos no son validos");
        redir("?p=admin");
    }
}

if(isset($_SESSION['id'])){ // if Sesion iniciada
    ?>
        <a href="?p=agregar_productos">
            <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar Productos</button>
        </a>
    <?php
} else {
    ?>
<form method="post" action="">
    <div class="centrar_login">
        <label>
            <h2><i class="fa fa-key"></i> Iniciar sesion como admin</h2>
        </label>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Usuario" name="username" />
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Contraseña" name="password" />
        </div>
        <div class="form-group">
            <button class="btn btn-primary" name="enviar" type="submit"><i class="fa fa-sign-in"></i> Iniciar sesion</button>
        </div>
    </div>
</form>
<?php
}
?>