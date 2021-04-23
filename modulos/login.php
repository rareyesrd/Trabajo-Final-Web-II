<?php
    if (isset($_SESSION['id_cliente'])){
        redir("./");
    }

if(isset($enviar)){
    $username = clear($username);
    $password = clear($password);

    $q = $con->query("SELECT * FROM clientes WHERE username = '$username' AND passwd = '$password'");

    if(mysqli_num_rows($q)>0){
        $r = mysqli_fetch_array($q);
        $_SESSION['id_cliente'] = $r['id'];
        if(isset($return)){
            redir("?p=".$return);
        } else {
            redir("./");
        }
        
    } else {
        alert("Los datos no son validos");
        redir("?p=login");
    }
}
?>
<form method="post" action="">
    <div class="centrar_login">
        <label>
            <h2><i class="fa fa-key"></i> Iniciar sesion</h2>
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