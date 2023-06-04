<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

if (isset($_POST['submit'])){

    $id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $c_pass =  sha1($_POST['c_pass']);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_users->execute([$email]);

    if ($select_users->rowCount() > 0){
        $warning_msg[] = '¡El Correo Electrónico ya existe!';
    }else{
        if($pass != $c_pass){
            $warning_msg[] = '¡Las contraseñas no coinciden!';
        }else{
            $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
            $insert_user->execute([$id, $name, $number, $email, $c_pass]);

            if($insert_user){
                $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
                $verify_users->execute([$email, $pass]);
                $row = $verify_users->fetch(PDO::FETCH_ASSOC);

                if($verify_users->rowCount() > 0){
                    setcookie('user_id', $row['id'], time() + (60*60*24*30), '/');
                    header('location: index.php');
                }else{
                    $error_msg[] = '¡Parece que algo salió mal!';
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/Fondo/iconoKH.png" />

    <!-- Fuente Awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Enlace al archivo css  -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <!-- Sección Cabecera  -->
    <?php include 'components/user_header.php'; ?>
    <!-- Fin Cabecera -->

    <!-- Sección Registro  -->
    <section class="form-container">
        <form action="" method="POST">
            <h3>¡Regístrate Ahora!</h3>
            <input type="tel" name="name" required maxlength="50" placeholder="Ingresa tu Nombre" class="box">
            <input type="email" name="email" required maxlength="50" placeholder="Ingrese su Correo" class="box">
            <input type="number" name="number" required min="0" max="999999999" maxlength="9"
                placeholder="Ingrese su Número" class="box">
            <input type="password" name="pass" required maxlength="20" placeholder="Ingrese su Contraseña" class="box">
            <input type="password" name="c_pass" required maxlength="20" placeholder="Confirmar su Contraseña"
                class="box">
            <p>¿Ya tienes una cuenta creada? <a href="login.php">Inicia Sesión</a></p>
            <input type="submit" value="Registrarse" name="submit" class="btn">
        </form>
    </section>
    <!-- Fin Registro  -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Sección Footer  -->
    <?php include 'components/footer.php'; ?>
    <!-- Fin Footer -->

    <!-- Enlace al archivo JavaScript  -->
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>

</body>

</html>