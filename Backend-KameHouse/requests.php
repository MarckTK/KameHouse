<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:login.php');
}

if(isset($_POST['delete'])){
    $delete_id = $_POST['request_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = $conn->prepare("SELECT * FROM `requests` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if($verify_delete->rowCount() > 0){
        $delete_request = $conn->prepare("DELETE FROM `requests` WHERE id = ?");
        $delete_request->execute([$delete_id]);
        $success_msg[] = '¡Solicitud Eliminada con Éxito!';
    }else{
        $warning_msg[] = '¡Solicitud ya Borrada!';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes Recibidas</title>
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

    <!-- Sección Solicitar -->
    <section class="requests">
        <h1 class="heading">Todas las Solicitudes</h1>

        <div class="box-container">

            <?php
            $select_requests = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
            $select_requests->execute([$user_id]);
            if($select_requests->rowCount() > 0){
                while($fetch_request = $select_requests->fetch(PDO::FETCH_ASSOC)){

                $select_sender = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_sender->execute([$fetch_request['sender']]);
                $fetch_sender = $select_sender->fetch(PDO::FETCH_ASSOC);

                $select_property = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
                $select_property->execute([$fetch_request['property_id']]);
                $fetch_property = $select_property->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="box">
                <p>Nombre: <span><?= $fetch_sender['name']; ?></span></p>
                <p>Número: <a href="tel:<?= $fetch_sender['number']; ?>"><?= $fetch_sender['number']; ?></a></p>
                <p>Correo Electrónico: <a
                        href="mailto:<?= $fetch_sender['email']; ?>"><?= $fetch_sender['email']; ?></a></p>
                <p>Solicitud de: <span><?= $fetch_property['property_name']; ?></span></p>
                <form action="" method="POST">
                    <input type="hidden" name="request_id" value="<?= $fetch_request['id']; ?>">
                    <input type="submit" value="Borrar Solicitud" class="btn"
                        onclick="return confirm('¿Eliminar esta Solicitud?');" name="delete">
                    <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">Ver Propiedad</a>
                </form>
            </div>
            <?php
                }
            }else{
                echo '<p class="empty">¡No Tienes Solicitudes!</p>';
            }
            ?>

        </div>

    </section>
    <!-- Fin Solicitar -->


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