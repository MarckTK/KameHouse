<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
    $admin_id = $_COOKIE['admin_id'];
}else{
    $admin_id = '';
    header('location:login.php');
}

if(isset($_POST['submit'])){
    $id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING); 
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
    $c_pass = sha1($_POST['c_pass']);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);   

    $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
    $select_admins->execute([$name]);

    if($select_admins->rowCount() > 0){
        $warning_msg[] = '¡El Nombre de Usuario ya está Ocupado!';
    }else{
        if($pass != $c_pass){
            $warning_msg[] = '¡La Contraseña no coincide!';
        }else{
            $insert_admin = $conn->prepare("INSERT INTO `admins`(id, name, password) VALUES(?,?,?)");
            $insert_admin->execute([$id, $name, $c_pass]);
            $success_msg[] = '¡Se ha registrado correctamente!';
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
    <title>Iniciar Registro</title>
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

    <!-- Sección Registrar  -->
    <section class="form-container">
        <form action="" method="POST">
            <h3>Registrar Administrador</h3>
            <input type="text" name="name" placeholder="Ingresar su Nombre" maxlength="20" class="box" required
                oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="pass" placeholder="Ingrese su Contraseña" maxlength="20" class="box" required
                oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="c_pass" placeholder="Confirma tu Contraseña" maxlength="20" class="box"
                required oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="Registrar Ahora" name="submit" class="btn">
        </form>
    </section>
    <!-- Fin Registrar -->


    <!-- Enlace de la Alerta -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Enlace al archivo JavaScript  -->
    <script src="../js/admin_script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>