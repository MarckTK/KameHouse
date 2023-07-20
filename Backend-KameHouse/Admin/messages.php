<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
    $admin_id = $_COOKIE['admin_id'];
}else{
    $admin_id = '';
    header('location:login.php');
}

if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = $conn->prepare("SELECT * FROM `messages` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if($verify_delete->rowCount() > 0){
        $delete_bookings = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
        $delete_bookings->execute([$delete_id]);
        $success_msg[] = 'Message deleted!';
    }else{
        $warning_msg[] = 'Message deleted already!';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/Fondo/iconoKH.png" />

    <!-- Fuente Awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Enlace al archivo css  -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>

    <!-- Sección Cabecera  -->
    <?php include '../components/admin_header.php'; ?>
    <!-- Fin Cabecera -->

    <!-- Sección Mensajes  -->
    <section class="grid">

        <h1 class="heading">Mensajes de Clientes</h1>

        <form action="" method="POST" class="search-form">
            <input type="text" name="search_box" placeholder="Buscar Mensajes..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>

        <div class="box-container">

            <?php
        if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
            $search_box = $_POST['search_box'];
            $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
            $select_messages = $conn->prepare("SELECT * FROM `messages` WHERE name LIKE '%{$search_box}%' OR number LIKE '%{$search_box}%' OR email LIKE '%{$search_box}%'");
            $select_messages->execute();
        }else{
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
        }
        if($select_messages->rowCount() > 0){
            while($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)){
    ?>
            <div class="box">
                <p>Nombre : <span><?= $fetch_messages['name']; ?></span></p>
                <p>Correo Electrónico : <a
                        href="mailto:<?= $fetch_messages['email']; ?>"><?= $fetch_messages['email']; ?></a></p>
                <p>Número : <a href="tel:<?= $fetch_messages['number']; ?>"><?= $fetch_messages['number']; ?></a></p>
                <p>Mensaje : <span><?= $fetch_messages['message']; ?></span></p>
                <form action="" method="POST">
                    <input type="hidden" name="delete_id" value="<?= $fetch_messages['id']; ?>">
                    <input type="submit" value="Eliminar Mensaje" onclick="return confirm('¿Borrar este Mensaje?');"
                        name="delete" class="delete-btn">
                </form>
            </div>
            <?php
        }
    }elseif(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
        echo '<p class="empty">¡Resultados no encontrados!</p>';
    }else{
        echo '<p class="empty">¡Aún no tienes mensajes!</p>';
    }
    ?>

        </div>
    </section>
    <!-- Fin Mensajes -->


    <!-- Enlace de la Alerta -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Enlace al archivo JavaScript  -->
    <script src="../js/admin_script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>