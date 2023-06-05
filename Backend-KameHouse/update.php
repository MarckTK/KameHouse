<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:login.php');
}

$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    if(!empty($name)){
        $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
        $update_name->execute([$name, $user_id]);
        $success_msg[] = '¡Tu Nombre ha sido Actualizado!';
    }

    if(!empty($email)){
        $verify_email = $conn->prepare("SELECT email FROM `users` WHERE email =  ?");
        $verify_email->execute([$email]);
        if($verify_email->rowCount() > 0){
            $warning_msg[] = '¡El Correo Electrónico ya esta Registrado!';
        }else{
            $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
            $update_email->execute([$email, $user_id]);
            $success_msg[] = '¡Tu Correo ha sido Actualizado!';
        }
    }

    if(!empty($number)){
        $verify_number = $conn->prepare("SELECT number FROM `users` WHERE number = ?");
        $verify_number->execute([$number]);
        if($verify_number->rowCount() > 0){
            $warning_msg[] = '¡El Número ya esta Registrado!';
        }else{
            $update_number = $conn->prepare("UPDATE `users` SET number = ? WHERE id = ?");
            $update_number->execute([$number, $user_id]);
            $success_msg[] = '¡Tu Número ha sido Actualizado!';
        }
    }

    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $prev_pass = $fetch_user['password'];
    $old_pass = sha1($_POST['old_pass']);
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = sha1($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $c_pass = sha1($_POST['c_pass']);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

    if($old_pass == $empty_pass){
        if($old_pass != $prev_pass){
            $warning_msg[] = '¡La Contraseña Antigua es incorrecta!';
        }elseif($new_pass != $c_pass){
            $warning_msg[] = '¡La Confirmación de Contraseña no coincide!';
        }else{
            if($new_pass != $empty_pass){
                $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
                $update_pass->execute([$c_pass, $user_id]);
                $success_msg[] = '¡Tu Contraseña ha sido Actualizada!';
            }else{
                $warning_msg[] = '¡Por favor ingrese una Nueva Contraseña!';
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
    <title>Actualizar</title>
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

    <!-- Sección Actualizar  -->
    <section class="form-container">
        <form action="" method="POST">
            <h3>Actualizar Perfil</h3>
            <input type="tel" name="name" maxlength="50" placeholder="<?= $fetch_user['name']; ?>" class="box">
            <input type="email" name="email" maxlength="50" placeholder="<?= $fetch_user['email']; ?>" class="box">
            <input type="number" name="number" min="0" max="999999999" maxlength="9"
                placeholder="<?= $fetch_user['number']; ?>" class="box">
            <input type="password" name="old_pass" maxlength="20" placeholder="Introduce tu Antigua Contraseña"
                class="box">
            <input type="password" name="new_pass" maxlength="20" placeholder="Introduce tu Nueva Contraseña"
                class="box">
            <input type="password" name="confirm_pass" maxlength="20" placeholder="Confirma tu Nueva Contraseña"
                class="box">
            <input type="submit" name="update" value="Actualizar" class="btn">
        </form>
    </section>
    <!-- Fin Actualizar -->

    <!-- Sección Footer  -->
    <?php include 'components/footer.php'; ?>
    <!-- Fin Footer -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Enlace al archivo JavaScript  -->
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>

</body>

</html>