<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
    $admin_id = $_COOKIE['admin_id'];
}else{
    $admin_id = '';
    header('location:login.php');
}

$select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
$select_profile->execute([$admin_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING); 

    if(!empty($name)){
        $verify_name = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
        $verify_name->execute([$name]);
        if($verify_name->rowCount() > 0){
            $warning_msg[] = '¡El Nombre de Usuario ya está Ocupado!';
        }else{
            $update_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
            $update_name->execute([$name, $admin_id]);
            $success_msg[] = '¡Nombre de Usuario Actualizado!';
        }
    }

    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $prev_pass = $fetch_profile['password'];
    $old_pass = sha1($_POST['old_pass']);
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = sha1($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $c_pass = sha1($_POST['c_pass']);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

    if($old_pass != $empty_pass){
        if($old_pass != $prev_pass){
            $warning_msg[] = '¡La Contraseña Antigua no coincide!';
        }elseif($c_pass != $new_pass){
            $warning_msg[] = 'La Nueva Contraseña no coincide!';
        }else{
            if($new_pass != $empty_pass){
                $update_password = $conn->prepare("UPDATE `admins` SET password = ? WHERE id = ?");
                $update_password->execute([$c_pass, $admin_id]);
                $success_msg[] = '¡Contraseña actualizada!';
            }else{
                $warning_msg[] = '¡Por favor, introduzca una nueva contraseña!';
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
    <title>Actualizar Perfil</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/Fondo/iconoKH.png" />

    <!-- Fuente Awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Enlace al archivo css  -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>

    <!-- Sección Cabecera  -->
    <?php include '../components/admin_header.php'; ?>
    <!-- header section ends -->

    <!-- Sección Actualizar  -->
    <section class="form-container">
        <form action="" method="POST">
            <h3>Actualizar Perfil</h3>
            <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" maxlength="20" class="box"
                oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="old_pass" placeholder="Ingrese Antigua Contraseña" maxlength="20" class="box"
                oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="new_pass" placeholder="Ingrese Nueva Contraseña" maxlength="20" class="box"
                oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="c_pass" placeholder="Confirmar Nueva Contraseña" maxlength="20" class="box"
                oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="Actualizar Ahora" name="submit" class="btn">
        </form>
    </section>
    <!-- Fin Actualizar -->


    <!-- Enlace de la Alerta -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Enlace al archivo JavaScript  -->
    <script src="../js/admin_script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>