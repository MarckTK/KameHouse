<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
    $admin_id = $_COOKIE['admin_id'];
}else{
    $admin_id = '';
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
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

    <!-- Sección Panel de Control  -->
    <section class="dashboard">
        <h1 class="heading">Panel de Control</h1>

        <div class="box-container">
            <div class="box">
                <?php
                    $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
                    $select_profile->execute([$admin_id]);
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>¡Bienvenido!</h3>
                <p><?= $fetch_profile['name']; ?></p>
                <a href="update.php" class="btn">Actualizar Perfil</a>
            </div>

            <div class="box">
                <?php
                    $select_listings = $conn->prepare("SELECT * FROM `property`");
                    $select_listings->execute();
                    $count_listings = $select_listings->rowCount();
                ?>
                <h3><?= $count_listings; ?></h3>
                <p>Propiedades Publicadas</p>
                <a href="listings.php" class="btn">Ver los Anuncios</a>
            </div>

            <div class="box">
                <?php
                    $select_users = $conn->prepare("SELECT * FROM `users`");
                    $select_users->execute();
                    $count_users = $select_users->rowCount();
                ?>
                <h3><?= $count_users; ?></h3>
                <p>Usuarios Totales</p>
                <a href="users.php" class="btn">Ver los Usuarios</a>
            </div>

            <div class="box">
                <?php
                    $select_admins = $conn->prepare("SELECT * FROM `admins`");
                    $select_admins->execute();
                    $count_admins = $select_admins->rowCount();
                ?>
                <h3><?= $count_admins; ?></h3>
                <p>Administradores Totales</p>
                <a href="admins.php" class="btn">Ver los Administradores</a>
            </div>

            <div class="box">
                <?php
                    $select_messages = $conn->prepare("SELECT * FROM `messages`");
                    $select_messages->execute();
                    $count_messages = $select_messages->rowCount();
                ?>
                <h3><?= $count_messages; ?></h3>
                <p>Mensajes Nuevos</p>
                <a href="messages.php" class="btn">Ver los Mensajes</a>
            </div>
        </div>
    </section>
    <!-- Fin Panel de Control -->


    <!-- Enlace de la Alerta -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Enlace al archivo JavaScript  -->
    <script src="../js/admin_script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>