<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/styles/images/iconUsersGreen.png">
    <link rel="stylesheet" href="./src/styles/css/style.css">
    <script src="./src/js/loginJs.js"></script>
    <title>Inicio de sesión</title>
</head>

<body>
    <main>
        <header>

            <img class="imgLogo" src="./src/styles/images/logo_ide_footer.png" alt="">
        </header>
        <section id="login">
            <h1>Bienvenido</h1>
            <h3>Para ingresar a nuestro administrador de usuarios por favor inicie sesión</h3>
            <img class="loginLogo" src="./src/styles/images/iconUsersGreen.png" alt="">
            <form action="verifyUser" method="POST" class="was-validated" valid-feedback>
                <div class="inputConteiner">
                    <label>Usuario:</label>
                    <input type="text" class="form-control" placeholder="Ingrese su nombre" id="nombre_usuario" name="verify_name">
                </div>
                <div class="inputConteiner">
                    <label>Contraseña:</label>
                    <input type="password" class="form-control" placeholder="Ingrese contraseña" id="pwd" name="verify_password">
                </div>
                <button type="submit" class="btnSuccess">Ingresar</button>
            </form>
            <p class="text-danger"><?php echo $this->msj ?></p>
        </section>
        <section id="createUser" class="createUser">
            <h3>Crear una cuenta</h3>
            <img class="loginLogo" src="./src/styles/images/iconUsersGreen.png" alt="">
            <form action="createUser" method="POST" valid-feedback>
                <div class="inputConteiner">
                    <label>Nombre de Usuario:</label>
                    <input type="text" class="form-control" placeholder="Nombre" id="name" name="create_name">
                </div>
                <div class="inputConteiner">
                    <label>Contraseña:</label>
                    <input type="password" placeholder="Ingrese contraseña" id="pwd" name="create_password">
                </div>
                <div class="inputConteiner">
                    <label>geoserver:</label>
                    <input type="text" placeholder="Ingrese su email" id="email" name="geoserver">
                </div>
                <div class="inputConteiner">
                    <label>Administrador:</label>
                    <input type="number" placeholder="Ingrese un nivel de permiso" id="admin" name="admin">
                </div>
                <button type="submit" class="btnSuccess">Crear Cuenta</button>

            </form>
        </section>
</body>

</html>