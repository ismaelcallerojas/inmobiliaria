<?php @session_start();

if (isset($_SESSION['nick'])) {
    header('location:inicio');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Sistema Web: Inmobiliaria</title>
    
</head>
<body class="grey lighten-2">
    <main>
        <div class="row">
            <div class="input-field col s12 center">
                <img src="img/logo.jpg" width="200" class="circle">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card z-depth-5">
                        <div class="card-content">
                            <span class="card-title">Inicio de Sesion</span>
                            <form action="login/index.php" method="post" autocomplete="off">
                                <div class="input-field">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input type="text" name="usuario" id="usuario" autofocus pattern="[A-Z]{4,15}" id="nick" onblur="may(this.value, this.id)">
                                    <label for="usuario">Usuario</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input type="password" name="contra" id="contra">
                                    <label for="contra">Contraseña</label>
                                </div>
                                <div class="input-field center">
                                    <button type="submit" class="btn waves-effect waves-light">Acceder</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include 'extend/scripts.php'; ?>
<script src="js/validacion.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/materialize.min.js"></script>
</body>
</html>
