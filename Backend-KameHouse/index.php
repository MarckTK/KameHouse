<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kame House</title>
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

    <!-- Sección Inicio  -->
    <div class="home">
        <section class="center">

            <form action="search.php" method="post">
                <h3>Encuentra tu casa Perfecta</h3>
                <div class="box">
                    <p>Ingresa Localización <span>*</span></p>
                    <input type="text" name="h_location" required maxlength="100"
                        placeholder="Ingresa nombre de la Ciudad" class="input">
                </div>
                <div class="flex">
                    <div class="box">
                        <p>Tipo de Propiedad <span>*</span></p>
                        <select name="h_type" class="input" required>
                            <option value="Departamento">Departamento</option>
                            <option value="Casa">Casa</option>
                            <option value="Local">Local</option>
                        </select>
                    </div>
                    <div class="box">
                        <p>Tipo de Oferta <span>*</span></p>
                        <select name="h_offer" class="input" required>
                            <option value="Venta">Venta</option>
                            <option value="Reventa">Reventa</option>
                            <option value="Alquiler">Alquiler</option>
                        </select>
                    </div>
                    <div class="box">
                        <p>Presupuesto Mínimo <span>*</span></p>
                        <select name="h_min" class="input" required>
                            <option value="10000">$10K</option>
                            <option value="20000">$20K</option>
                            <option value="30000">$30k</option>
                            <option value="40000">$40k</option>
                            <option value="50000">$50k</option>
                            <option value="60000">$60k</option>
                            <option value="70000">$70k</option>
                            <option value="80000">$80k</option>
                            <option value="90000">$90k</option>
                            <option value="100000">$100k</option>
                            <option value="200000">$200k</option>
                            <option value="300000">$300k</option>
                            <option value="400000">$400k</option>
                            <option value="500000">$500k</option>
                            <option value="600000">$600k</option>
                            <option value="700000">$700k</option>
                            <option value="800000">$800k</option>
                            <option value="900000">$900k</option>
                            <option value="1000000">$1M</option>
                            <option value="1500000">$1.5M</option>
                            <option value="2000000">$2M</option>
                        </select>
                    </div>
                    <div class="box">
                        <p>Presupuesto Máximo <span>*</span></p>
                        <select name="maximum" class="input" required>
                            <option value="10000">$10K</option>
                            <option value="20000">$20K</option>
                            <option value="30000">$30k</option>
                            <option value="40000">$40k</option>
                            <option value="50000">$50k</option>
                            <option value="60000">$60k</option>
                            <option value="70000">$70k</option>
                            <option value="80000">$80k</option>
                            <option value="90000">$90k</option>
                            <option value="100000">$100k</option>
                            <option value="200000">$200k</option>
                            <option value="300000">$300k</option>
                            <option value="400000">$400k</option>
                            <option value="500000">$500k</option>
                            <option value="600000">$600k</option>
                            <option value="700000">$700k</option>
                            <option value="800000">$800k</option>
                            <option value="900000">$900k</option>
                            <option value="1000000">$1M</option>
                            <option value="1500000">$1.5M</option>
                            <option value="2000000">$2M</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Buscar Propiedad" name="h_search" class="btn">
            </form>

        </section>
    </div>
    <!-- Fin Inicio -->

    <!-- Sección de Servicios  -->
    <section class="services">

        <h1 class="heading">Nuestros Servicios</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/Iconos/icon-1.png" alt="">
                <h3>Comprar Casa</h3>
                <p>Encuentra tu hogar ideal gracias a nosotros. Contamos con una amplia selección de propiedades a la
                    venta.
                </p>
            </div>

            <div class="box">
                <img src="images/Iconos/icon-2.png" alt="">
                <h3>Alquilar Casa</h3>
                <p>Ofrecemos una variedad de opciones de alquiler de casas para satisfacer tus necesidades. ¡Encuentra
                    tu
                    hogar ideal hoy!</p>
            </div>

            <div class="box">
                <img src="images/Iconos/icon-3.png" alt="">
                <h3>Vender Casa</h3>
                <p>¿Buscas una página en donde vender tu casa? Te ayudamos a encontrar el comprador adecuado para ti.
                </p>
            </div>

            <div class="box">
                <img src="images/Iconos/icon-4.png" alt="">
                <h3>Pisos Y Edificios</h3>
                <p>Si buscas un apartamento o edificio, ¡Estás en el lugar correcto! Contamos con una amplia selección.
                </p>
            </div>

            <div class="box">
                <img src="images/Iconos/icon-5.png" alt="">
                <h3>Tiendas Y Locales</h3>
                <p>¿Necesitas un espacio para tu negocio? Contamos con una selección de tiendas y locales comerciales
                    para
                    ti.</p>
            </div>

            <div class="box">
                <img src="images/Iconos/icon-6.png" alt="">
                <h3>Servicio 24/7</h3>
                <p>En nuestra inmobiliaria, estamos disponibles las 24 horas del día para brindarte el mejor Servicio
                    posible.</p>
            </div>

        </div>
    </section>
    <!-- Fin Sección Servicios -->

    <!-- Sección de Anuncios  -->
    <section class="listings">

        <h1 class="heading">Últimos Anuncios</h1>

        <div class="box-container">
            <?php
                $total_images = 0;
                $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
                $select_properties->execute();
                if($select_properties->rowCount() > 0){
                    while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
                        $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                        $select_user->execute([$fetch_property['user_id']]);
                        $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

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

                        $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
                        $select_saved->execute([$fetch_property['id'], $user_id]);

                    ?>
            <form action="" method="POST">
                <div class="box">
                    <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
                    <?php
                        if($select_saved->rowCount() > 0){
                    ?>
                    <button type="submit" name="save" class="save"><i
                            class="fas fa-heart"></i><span>Guardado</span></button>
                    <?php
                        }else{
                    ?>
                    <button type="submit" name="save" class="save"><i
                            class="fas fa-heart"></i><span>Guardar</span></button>
                    <?php
                        }
                    ?>
                    <div class="thumb">
                        <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
                        <img src="images/Images_Subidas/<?= $fetch_property['image_01']; ?>" alt="">
                    </div>
                    <div class="admin">
                        <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
                        <div>
                            <p><?= $fetch_user['name']; ?></p>
                            <span><?= $fetch_property['date']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="price">
                        <i class="fas fa-dollar-sign"></i><span><?= $fetch_property['price']; ?></span>
                    </div>
                    <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
                    <p class="location"><i
                            class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span>
                    </p>
                    <div class="flex">
                        <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
                        <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
                        <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
                        <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
                        <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
                        <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>m²</span></p>
                    </div>
                    <div class="flex-btn">
                        <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">Ver Propiedad</a>
                        <input type="submit" value="Enviar Solicitud" name="send" class="btn">
                    </div>
                </div>
            </form>
            <?php
                    }
            }else{
                echo '<p class="empty">¡Aún no se han añadido Propiedades! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
                }
            ?>
        </div>

        <div style="margin-top: 2rem; text-align:center;">
            <a href="listings.php" class="inline-btn">Ver Todas las Propiedades</a>
        </div>

    </section>
    <!-- Fin Sección Anuncios -->

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