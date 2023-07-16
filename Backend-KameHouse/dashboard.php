<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
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

    <!-- Sección Panel de Control -->
    <section class="dashboard">
        <h1 class="heading">Panel de Control</h1>
        <div class="box-container">
            <div class="box">
                <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
                <h3>Bienvenido de Nuevo!!</h3>
                <p><?= $fetch_profile['name']; ?></p>
                <a href="update.php" class="btn">Actualizar Perfil</a>
            </div>

            <div class="box">
                <h3>Filtrar Búsqueda</h3>
                <p>Buscar una Propiedad</p>
                <a href="search.php" class="btn">Buscar Ahora</a>
            </div>

            <div class="box">
                <?php
            $count_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ?");
            $count_properties->execute([$user_id]);
            $total_properties = $count_properties->rowCount();
        ?>
                <h3><?= $total_properties; ?></h3>
                <p>Lista de Propiedades</p>
                <a href="my_listings.php" class="btn">Ver Todas las Propiedades</a>
            </div>

            <div class="box">
                <?php
            $count_requests_received = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
            $count_requests_received->execute([$user_id]);
            $total_requests_received = $count_requests_received->rowCount();
        ?>
                <h3><?= $total_requests_received; ?></h3>
                <p>Solicitudes Recibidas</p>
                <a href="requests.php" class="btn">Ver Todas las Solicitudes</a>
            </div>

            <div class="box">
                <?php
            $count_requests_sent = $conn->prepare("SELECT * FROM `requests` WHERE sender = ?");
            $count_requests_sent->execute([$user_id]);
            $total_requests_sent = $count_requests_sent->rowCount();
        ?>
                <h3><?= $total_requests_sent; ?></h3>
                <p>Solicitudes Enviadas</p>
                <a href="saved.php" class="btn">Ver Solicitudes Enviadas</a>
            </div>

            <div class="box">
                <?php
            $count_saved_properties = $conn->prepare("SELECT * FROM `saved` WHERE user_id = ?");
            $count_saved_properties->execute([$user_id]);
            $total_saved_properties = $count_saved_properties->rowCount();
        ?>
                <h3><?= $total_saved_properties; ?></h3>
                <p>Propiedades Guardadas</p>
                <a href="saved.php" class="btn">Ver Propiedades</a>
            </div>
        </div>
    </section>
    <!-- Fin Panel de Control -->


    <!-- Sección Footer  -->
    <?php include 'components/footer.php'; ?>
    <!-- Fin Footer -->

    <!-- Enlace de la Alerta -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Enlace al archivo JavaScript  -->
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>

</body>

</html>