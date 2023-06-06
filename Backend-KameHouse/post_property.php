<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Propiedad</title>
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

    <!-- Sección Publicar Propiedad -->
    <section class="property-form">
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Publicar Propiedad</h3>
            <div class="box">
                <p>Nombre de la Propiedad <span>*</span></p>
                <input type="text" name="property_name" required maxlength="50"
                    placeholder="Ingrese Nombre de la Propiedad" class="input">
            </div>
            <div class="flex">
                <div class="box">
                    <p>Precio de la Propiedad <span>*</span></p>
                    <input type="number" name="price" required min="0" max="9999999999" maxlength="10"
                        placeholder="Ingrese el Precio de la Propiedad" class="input">
                </div>
                <div class="box">
                    <p>Importe Depositado <span>*</span></p>
                    <input type="number" name="deposite" required min="0" max="9999999999" maxlength="10"
                        placeholder="Ingrese Importe del Depósito" class="input">
                </div>
                <div class="box">
                    <p>Dirección de la Propiedad <span>*</span></p>
                    <input type="text" name="address" required maxlength="100"
                        placeholder="Ingrese la Dirección de la Propiedad" class="input">
                </div>
                <div class="box">
                    <p>Tipo de Oferta <span>*</span></p>
                    <select name="offer" required class="input">
                        <option value="sale">Venta</option>
                        <option value="resale">Reventa</option>
                        <option value="rent">Alquiler</option>
                    </select>
                </div>
                <div class="box">
                    <p>Tipo de Propiedad <span>*</span></p>
                    <select name="type" required class="input">
                        <option value="flat">Departamento</option>
                        <option value="house">Casa</option>
                        <option value="shop">Local</option>
                    </select>
                </div>
                <div class="box">
                    <p>Estado de Propiedad <span>*</span></p>
                    <select name="status" required class="input">
                        <option value="ready to move">Listo para Mudarse</option>
                        <option value="under construction">En Construcción</option>
                    </select>
                </div>
                <div class="box">
                    <p>Amoblamiento <span>*</span></p>
                    <select name="furnished" required class="input">
                        <option value="furnished">Amueblado</option>
                        <option value="semi-furnished">Semi Amueblado</option>
                        <option value="unfurnished">Sin Amueblar</option>
                    </select>
                </div>
                <div class="box">
                    <p>¿Cuántos BHK Desea?<span>*</span></p>
                    <select name="bhk" required class="input">
                        <option value="1">1 BHK</option>
                        <option value="2">2 BHK</option>
                        <option value="3">3 BHK</option>
                        <option value="4">4 BHK</option>
                        <option value="5">5 BHK</option>
                        <option value="6">6 BHK</option>
                        <option value="7">7 BHK</option>
                        <option value="8">8 BHK</option>
                        <option value="9">9 BHK</option>
                    </select>
                </div>
                <div class="box">
                    <p>¿Cuántos Dormitorios Desea? <span>*</span></p>
                    <select name="bedroom" required class="input">
                        <option value="0">0 Dormitorios</option>
                        <option value="1" selected>1 Dormitorio</option>
                        <option value="2">2 Dormitorios</option>
                        <option value="3">3 Dormitorios</option>
                        <option value="4">4 Dormitorios</option>
                        <option value="5">5 Dormitorios</option>
                        <option value="6">6 Dormitorios</option>
                        <option value="7">7 Dormitorios</option>
                        <option value="8">8 Dormitorios</option>
                        <option value="9">9 Dormitorios</option>
                    </select>
                </div>
                <div class="box">
                    <p>¿Cuántos Baños Desea? <span>*</span></p>
                    <select name="bathroom" required class="input">
                        <option value="1">1 Baño</option>
                        <option value="2">2 Baños</option>
                        <option value="3">3 Baños</option>
                        <option value="4">4 Baños</option>
                        <option value="5">5 Baños</option>
                        <option value="6">6 Baños</option>
                        <option value="7">7 Baños</option>
                        <option value="8">8 Baños</option>
                        <option value="9">9 Baños</option>
                    </select>
                </div>
                <div class="box">
                    <p>¿Cuántos Balcones Desea? <span>*</span></p>
                    <select name="balcony" required class="input">
                        <option value="0">0 Balcones</option>
                        <option value="1">1 Balcón</option>
                        <option value="2">2 Balcones</option>
                        <option value="3">3 Balcones</option>
                        <option value="4">4 Balcones</option>
                        <option value="5">5 Balcones</option>
                        <option value="6">6 Balcones</option>
                        <option value="7">7 Balcones</option>
                        <option value="8">8 Balcones</option>
                        <option value="9">9 Balcones</option>
                    </select>
                </div>
                <div class="box">
                    <p>Área de la Habitación <span>*</span></p>
                    <input type="number" name="carpet" required min="1" max="9999999999" maxlength="10"
                        placeholder="¿Cuántos metros cuadrados?" class="input">
                </div>
                <div class="box">
                    <p>Tiempo de la Propiedad <span>*</span></p>
                    <input type="number" name="age" required min="0" max="99" maxlength="2"
                        placeholder="¿Cuántos años tiene la propiedad?" class="input">
                </div>
                <div class="box">
                    <p>Pisos Totales <span>*</span></p>
                    <input type="number" name="total_floors" required min="0" max="99" maxlength="2"
                        placeholder="¿Cuántos pisos disponibles hay?" class="input">
                </div>
                <div class="box">
                    <p>Piso de la Propiedad <span>*</span></p>
                    <input type="number" name="room_floor" required min="0" max="99" maxlength="2"
                        placeholder="Número de piso del inmueble" class="input">
                </div>
                <div class="box">
                    <p>Crédito <span>*</span></p>
                    <select name="loan" required class="input">
                        <option value="available">Disponible</option>
                        <option value="not available">No Disponible</option>
                    </select>
                </div>
            </div>
            <div class="box">
                <p>Descripción de la Propiedad <span>*</span></p>
                <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10"
                    placeholder="Escribir sobre la Propiedad..."></textarea>
            </div>
        </form>
    </section>
    <!-- Fin Publicar Propiedad -->


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