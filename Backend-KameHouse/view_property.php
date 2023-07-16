<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

if(isset($_GET['get_id'])){
    $get_id = $_GET['get_id'];
    }else{
    $get_id = '';
    header('location:index.php');
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Propiedades</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/Fondo/iconoKH.png" />

    <!-- Fuente Awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fuente Swiper Bundle  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- Enlace al archivo css  -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <!-- Sección Cabecera  -->
    <?php include 'components/user_header.php'; ?>
    <!-- Fin Cabecera -->

    <!-- Sección Ver Propiedades -->
    <section class="view-property">

        <h1 class="heading">Detalles de la Propiedad</h1>

        <?php
        $select_properties = $conn->prepare("SELECT * FROM `property` WHERE id = ? ORDER BY date DESC LIMIT 1");
        $select_properties->execute([$get_id]);
        if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

            $property_id = $fetch_property['id'];

            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);
        ?>
        <div class="details">
            <div class="swiper images-container">
                <div class="swiper-wrapper">
                    <img src="images/Images_Subidas/<?= $fetch_property['image_01']; ?>" alt="" class="swiper-slide">
                    <?php if(!empty($fetch_property['image_02'])){ ?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_02']; ?>" alt="" class="swiper-slide">
                    <?php } ?>
                    <?php if(!empty($fetch_property['image_03'])){ ?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_03']; ?>" alt="" class="swiper-slide">
                    <?php } ?>
                    <?php if(!empty($fetch_property['image_04'])){ ?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_04']; ?>" alt="" class="swiper-slide">
                    <?php } ?>
                    <?php if(!empty($fetch_property['image_05'])){ ?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_05']; ?>" alt="" class="swiper-slide">
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="info">
                <p><i class="fas fa-dollar-sign"></i><span><?= $fetch_property['price']; ?></span></p>
                <p><i class="fas fa-user"></i><span><?= $fetch_user['name']; ?></span></p>
                <p><i class="fas fa-phone"></i><a href="tel:999999999"><?= $fetch_user['number']; ?></a></p>
                <p><i class="fas fa-building"></i><span><?= $fetch_property['type']; ?></span></p>
                <p><i class="fas fa-house"></i><span><?= $fetch_property['offer']; ?></span></p>
                <p><i class="fas fa-calendar"></i><span><?= $fetch_property['date']; ?></span></p>
            </div>
            <h3 class="title">Detalles</h3>
            <div class="flex">
                <div class="box">
                    <p><i>Habitaciones :</i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
                    <p><i>Monto del Depósito : </i><span><span class="fas fa-dollar-sign"
                                style="margin-right: .5rem;"></span><?= $fetch_property['deposite']; ?></span></p>
                    <p><i>Estado :</i><span><?= $fetch_property['status']; ?></span></p>
                    <p><i>Dormitorios :</i><span><?= $fetch_property['bedroom']; ?></span></p>
                    <p><i>Baños :</i><span><?= $fetch_property['bathroom']; ?></span></p>
                    <p><i>Balcón :</i><span><?= $fetch_property['balcony']; ?></span></p>
                </div>
                <div class="box">
                    <p><i>Área de la Propiedad :</i><span><?= $fetch_property['carpet']; ?>m²</span></p>
                    <p><i>Tiempo :</i><span><?= $fetch_property['age']; ?> años</span></p>
                    <p><i>Piso de la Propiedad :</i><span><?= $fetch_property['total_floors']; ?></span></p>
                    <p><i>Pisos Totales :</i><span><?= $fetch_property['room_floor']; ?></span></p>
                    <p><i>Amueblado :</i><span><?= $fetch_property['furnished']; ?></span></p>
                    <p><i>Crédito :</i><span><?= $fetch_property['loan']; ?></span></p>
                </div>
            </div>
            <h3 class="title">Comodidad</h3>
            <div class="flex">
                <div class="box">
                    <p><i
                            class="fas fa-<?php if($fetch_property['lift'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Ascensores</span>
                    </p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['security_guard'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Guardias
                            de Seguridad</span></p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['play_ground'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Patio
                            de Juegos</span></p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['garden'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Jardines</span>
                    </p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['water_supply'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Suministro
                            de Agua</span></p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['power_backup'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Respaldo
                            de Energía</span></p>
                </div>
                <div class="box">
                    <p><i
                            class="fas fa-<?php if($fetch_property['parking_area'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Aparcamiento</span>
                    </p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['gym'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Gym</span>
                    </p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['shopping_mall'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Centro
                            Comercial</span></p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['hospital'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Hospital</span>
                    </p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['school'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Escuelas</span>
                    </p>
                    <p><i
                            class="fas fa-<?php if($fetch_property['market_area'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Área
                            Comercial</span></p>
                </div>
            </div>
            <h3 class="title">Descripción</h3>
            <p class="description"><?= $fetch_property['description']; ?></p>
            <form action="" method="post" class="flex-btn">
                <input type="hidden" name="property_id" value="<?= $property_id; ?>">
                <?php
                if($select_saved->rowCount() > 0){
            ?>
                <button type="submit" name="save" class="save"><i
                        class="fas fa-heart"></i><span>Guardado</span></button>
                <?php
                }else{ 
            ?>
                <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>Guardar</span></button>
                <?php
                }
            ?>
                <input type="submit" value="Enviar Solicitud" name="send" class="btn">
            </form>
        </div>
        <?php
        }
    }else{
        echo '<p class="empty">¡Propiedad no Encontrada Uu! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">Añadir uno Nuevo</a></p>';
    }
    ?>
    </section>
    <!-- Fin Ver Propiedades -->


    <!-- Sección Footer  -->
    <?php include 'components/footer.php'; ?>
    <!-- Fin Footer -->

    <!-- Enlace del Carrusel -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- Enlace de la Alerta -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Enlace al archivo JavaScript  -->
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>

    <script>
    var swiper = new Swiper(".images-container", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 200,
            modifier: 3,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
    </script>

</body>

</html>