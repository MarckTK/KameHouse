<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:login.php');
}

if(isset($_POST['delete'])){

    $delete_id = $_POST['property_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if($verify_delete->rowCount() > 0){
        $select_images = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
        $select_images->execute([$delete_id]);
        while($fetch_images = $select_images->fetch(PDO::FETCH_ASSOC)){
            $image_01 = $fetch_images['image_01'];
            $image_02 = $fetch_images['image_02'];
            $image_03 = $fetch_images['image_03'];
            $image_04 = $fetch_images['image_04'];
            $image_05 = $fetch_images['image_05'];
            unlink('images/Images_Subidas/'.$image_01);
            if(!empty($image_02)){
                unlink('images/Images_Subidas/'.$image_02);
            }
            if(!empty($image_03)){
                unlink('images/Images_Subidas/'.$image_03);
            }
            if(!empty($image_04)){
                unlink('images/Images_Subidas/'.$image_04);
            }
            if(!empty($image_05)){
                unlink('images/Images_Subidas/'.$image_05);
            }
        }
        $delete_saved = $conn->prepare("DELETE FROM `saved` WHERE property_id = ?");
        $delete_saved->execute([$delete_id]);
        $delete_requests = $conn->prepare("DELETE FROM `requests` WHERE property_id = ?");
        $delete_requests->execute([$delete_id]);
        $delete_listing = $conn->prepare("DELETE FROM `property` WHERE id = ?");
        $delete_listing->execute([$delete_id]);
        $success_msg[] = '¡Publicación eliminado correctamente!';
    }else{
        $warning_msg[] = '¡Listado Borrado!';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Anuncios</title>
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

    <!-- Sección Propiedades -->
    <section class="my-listings">
        <h1 class="heading">Mis Propiedades</h1>

        <div class="box-container">

            <?php
            $total_images = 0;
            $select_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ? ORDER BY date DESC");
            $select_properties->execute([$user_id]);
            if($select_properties->rowCount() > 0){
                while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

            $property_id = $fetch_property['id'];

            if(!empty($fetch_property['image_02'])){
                $image_coutn_02 = 1;
            }else{
                $image_coutn_02 = 0;
            }
            if(!empty($fetch_property['image_03'])){
                $image_coutn_03 = 1;
            }else{
                $image_coutn_03 = 0;
            }
            if(!empty($fetch_property['image_04'])){
                $image_coutn_04 = 1;
            }else{
                $image_coutn_04 = 0;
            }
            if(!empty($fetch_property['image_05'])){
                $image_coutn_05 = 1;
            }else{
                $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

        ?>
            <form accept="" method="POST" class="box">
                <input type="hidden" name="property_id" value="<?= $property_id; ?>">
                <div class="thumb">
                    <p><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_01']; ?>" alt="">
                </div>
                <div class="price"><i class="fas fa-dollar-sign"></i><span><?= $fetch_property['price']; ?></span>
                </div>
                <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
                <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span>
                </p>
                <div class="flex-btn">
                    <a href="update_property.php?get_id=<?= $property_id; ?>" class="btn">Actualizar</a>
                    <input type="submit" name="delete" value="Eliminar" class="btn"
                        onclick="return confirm('¿Desea borrar esta Publicación?');">
                </div>
                <a href="view_property.php?get_id=<?= $property_id; ?>" class="btn">Ver Propiedad</a>
            </form>
            <?php
            }
        }else{
            echo '<p class="empty">Aún no se ha añadido ninguna Propiedad <a href="post_property.php" style="margin-top:1.5rem;" class="btn">Agregar Nuevo</a></p>';
        }
        ?>
        </div>
    </section>
    <!-- Fin Propiedades -->


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