<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:login.php');
}

if (isset($_POST['post'])){
    $id = create_unique_id();
    $property_name = $_POST['property_name'];
    $property_name = filter_var($property_name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
    $deposite = $_POST['deposite'];
    $deposite = filter_var($deposite, FILTER_SANITIZE_STRING);
    $address = $_POST['address'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $offer = $_POST['offer'];
    $offer = filter_var($offer, FILTER_SANITIZE_STRING);
    $type = $_POST['type'];
    $type = filter_var($type, FILTER_SANITIZE_STRING);
    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);
    $furnished = $_POST['furnished'];
    $furnished = filter_var($furnished, FILTER_SANITIZE_STRING);
    $bhk = $_POST['bhk'];
    $bhk = filter_var($bhk, FILTER_SANITIZE_STRING);
    $bedroom = $_POST['bedroom'];
    $bedroom = filter_var($bedroom, FILTER_SANITIZE_STRING);
    $bathroom = $_POST['bathroom'];
    $bathroom = filter_var($bathroom, FILTER_SANITIZE_STRING);
    $balcony = $_POST['balcony'];
    $balcony = filter_var($balcony, FILTER_SANITIZE_STRING);
    $carpet = $_POST['carpet'];
    $carpet = filter_var($carpet, FILTER_SANITIZE_STRING);
    $age = $_POST['age'];
    $age = filter_var($age, FILTER_SANITIZE_STRING);
    $total_floors = $_POST['total_floors'];
    $total_floors = filter_var($total_floors, FILTER_SANITIZE_STRING);
    $room_floor = $_POST['room_floor'];
    $room_floor = filter_var($room_floor, FILTER_SANITIZE_STRING);
    $loan = $_POST['loan'];
    $loan = filter_var($loan, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    if(isset($_POST['lift'])){
        $lift = $_POST['lift'];
        $lift = filter_var($lift, FILTER_SANITIZE_STRING);
    }else{
        $lift = 'no';
    }
    if(isset($_POST['security_guard'])){
        $security_guard = $_POST['security_guard'];
        $security_guard = filter_var($security_guard, FILTER_SANITIZE_STRING);
    }else{
        $security_guard = 'no';
    }
    if(isset($_POST['play_ground'])){
        $play_ground = $_POST['play_ground'];
        $play_ground = filter_var($play_ground, FILTER_SANITIZE_STRING);
    }else{
        $play_ground = 'no';
    }
    if(isset($_POST['garden'])){
        $garden = $_POST['garden'];
        $garden = filter_var($garden, FILTER_SANITIZE_STRING);        
    }else{
        $garden = 'no';
    }
    if(isset($_POST['water_supply'])){
        $water_supply = $_POST['water_supply'];
        $water_supply = filter_var($water_supply, FILTER_SANITIZE_STRING);
    }else{
        $water_supply = 'no';
    }
    if(isset($_POST['power_backup'])){
        $power_backup = $_POST['power_backup'];
        $power_backup = filter_var($power_backup, FILTER_SANITIZE_STRING);
    }else{
        $power_backup = 'no';
    }
    if(isset($_POST['parking_area'])){
        $parking_area = $_POST['parking_area'];
        $parking_area = filter_var($parking_area, FILTER_SANITIZE_STRING);
    }else{
        $parking_area = 'no';
    }
    if(isset($_POST['gym'])){
        $gym = $_POST['gym'];
        $gym = filter_var($gym, FILTER_SANITIZE_STRING);
    }else{
        $gym = 'no';
    }
    if(isset($_POST['shopping_mall'])){
        $shopping_mall = $_POST['shopping_mall'];
        $shopping_mall = filter_var($shopping_mall, FILTER_SANITIZE_STRING);
    }else{
        $shopping_mall = 'no';
    }
    if(isset($_POST['hospital'])){
        $hospital = $_POST['hospital'];
        $hospital = filter_var($hospital, FILTER_SANITIZE_STRING);
    }else{
        $hospital = 'no';
    }
    if(isset($_POST['school'])){
        $school = $_POST['school'];
        $school = filter_var($school, FILTER_SANITIZE_STRING);
    }else{
        $school = 'no';
    }
    if(isset($_POST['market_area'])){
        $market_area = $_POST['market_area'];
        $market_area = filter_var($market_area, FILTER_SANITIZE_STRING);
    }else{
        $market_area = 'no';
    }

    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_02_ext = pathinfo($image_02, PATHINFO_EXTENSION);
    $rename_image_02 = create_unique_id().'.'.$image_02_ext;
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_size = $_FILES['image_02']['size'];
    $image_02_folder = 'images/Images_Subidas/'.$rename_image_02;
    if(!empty($image_02)){
        if($image_02_size > 2000000){
            $waning_msg[] = '¡El tamaño de la imagen 02 es demasiado grande!';
        }else{
            move_uploaded_file($image_02_tmp_name, $image_02_folder);
        }
    }else{
        $rename_image_02 = '';
    }

    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_03_ext = pathinfo($image_03, PATHINFO_EXTENSION);
    $rename_image_03 = create_unique_id().'.'.$image_03_ext;
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_size = $_FILES['image_03']['size'];
    $image_03_folder = 'images/Images_Subidas/'.$rename_image_03;
    if(!empty($image_03)){
        if($image_03_size > 2000000){
            $waning_msg[] = '¡El tamaño de la imagen 03 es demasiado grande!';
        }else{
            move_uploaded_file($image_03_tmp_name, $image_03_folder);
        }
    }else{
        $rename_image_03 = '';
    }

    $image_04 = $_FILES['image_04']['name'];
    $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
    $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
    $rename_image_04 = create_unique_id().'.'.$image_04_ext;
    $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
    $image_04_size = $_FILES['image_04']['size'];
    $image_04_folder = 'images/Images_Subidas/'.$rename_image_04;
    if(!empty($image_04)){
        if($image_04_size > 2000000){
            $waning_msg[] = '¡El tamaño de la imagen 04 es demasiado grande!';
        }else{
            move_uploaded_file($image_04_tmp_name, $image_04_folder);
        }
    }else{
        $rename_image_04 = '';
    }

    $image_05 = $_FILES['image_05']['name'];
    $image_05 = filter_var($image_05, FILTER_SANITIZE_STRING);
    $image_05_ext = pathinfo($image_05, PATHINFO_EXTENSION);
    $rename_image_05 = create_unique_id().'.'.$image_05_ext;
    $image_05_tmp_name = $_FILES['image_05']['tmp_name'];
    $image_05_size = $_FILES['image_05']['size'];
    $image_05_folder = 'images/Images_Subidas/'.$rename_image_05;
    if(!empty($image_05)){
        if($image_05_size > 2000000){
            $waning_msg[] = '¡El tamaño de la imagen 05 es demasiado grande!';
        }else{
            move_uploaded_file($image_05_tmp_name, $image_05_folder);
        }
    }else{
        $rename_image_05 = '';
    }

    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
    $rename_image_01 = create_unique_id().'.'.$image_01_ext;
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_folder = 'images/Images_Subidas/'.$rename_image_01;
    if($image_01_size > 2000000){
        $warning_msg[] = '¡El tamaño de la imagen 01 es demasiado grande!';
    }else{
        $insert_property = $conn->prepare("INSERT INTO `property`(id, user_id, property_name, address, price, type, offer, status, furnished, bhk, deposite, bedroom, bathroom, balcony, carpet, age, total_floors, room_floor, loan, lift, security_guard, play_ground, garden, water_supply, power_backup, parking_area, gym, shopping_mall, hospital, school, market_area, image_01, image_02, image_03, image_04, image_05, description) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $insert_property->execute([$id, $user_id, $property_name, $address, $price, $type, $offer, $status, $furnished, $bhk, $deposite, $bedroom, $bathroom, $balcony, $carpet, $age, $total_floors, $room_floor, $loan, $lift, $security_guard, $play_ground, $garden, $water_supply, $power_backup, $parking_area, $gym, $shopping_mall, $hospital, $school, $market_area, $rename_image_01, $rename_image_02, $rename_image_03, $rename_image_04, $rename_image_05, $description]);
        move_uploaded_file($image_01_tmp_name, $image_01_folder);
        $success_msg[] = '¡Propiedad publicada con éxito!';
    }
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
                    <p>Precio de la Propiedad <b>($)</b> <span>*</span></p>
                    <input type="number" name="price" required min="0" max="9999999999" maxlength="10"
                        placeholder="Ingrese el Precio de la Propiedad en Dólares" class="input">
                </div>
                <div class="box">
                    <p>Cantidad del Depósito <span>*</span></p>
                    <input type="number" name="deposite" required min="0" max="9999999999" maxlength="10"
                        placeholder="Ingrese la Cantidad del Depósito" class="input">
                </div>
                <div class="box">
                    <p>Dirección de la Propiedad <span>*</span></p>
                    <input type="text" name="address" required maxlength="100"
                        placeholder="Ingrese la Dirección de la Propiedad" class="input">
                </div>
                <div class="box">
                    <p>Tipo de Oferta <span>*</span></p>
                    <select name="offer" required class="input">
                        <option value="Venta">Venta</option>
                        <option value="Reventa">Reventa</option>
                        <option value="Alquiler">Alquiler</option>
                    </select>
                </div>
                <div class="box">
                    <p>Tipo de Propiedad <span>*</span></p>
                    <select name="type" required class="input">
                        <option value="Departamento">Departamento</option>
                        <option value="Casa">Casa</option>
                        <option value="Local">Local</option>
                    </select>
                </div>
                <div class="box">
                    <p>Estado de Propiedad <span>*</span></p>
                    <select name="status" required class="input">
                        <option value="Listo para Mudarse">Listo para Mudarse</option>
                        <option value="En Construcción">En Construcción</option>
                    </select>
                </div>
                <div class="box">
                    <p>Amoblamiento <span>*</span></p>
                    <select name="furnished" required class="input">
                        <option value="Amueblado">Amueblado</option>
                        <option value="Semi Amueblado">Semi Amueblado</option>
                        <option value="Sin Amueblar">Sin Amueblar</option>
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
                    <p>Área de la Habitación <b>(m²)</b> <span>*</span></p>
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
                        <option value="Disponible">Disponible</option>
                        <option value="No Disponible">No Disponible</option>
                    </select>
                </div>
            </div>
            <div class="box">
                <p>Descripción de la Propiedad <span>*</span></p>
                <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10"
                    placeholder="Escribir sobre la Propiedad..."></textarea>
            </div>
            <div class="checkbox">
                <div class="box">
                    <p><input type="checkbox" name="lift" value="yes">Ascensores</p>
                    <p><input type="checkbox" name="security_guard" value="yes">Guardia de Seguridad</p>
                    <p><input type="checkbox" name="play_ground" value="yes">Parque Infantil</p>
                    <p><input type="checkbox" name="garden" value="yes">Jardín</p>
                    <p><input type="checkbox" name="water_supply" value="yes">Abastecimiento de Agua</p>
                    <p><input type="checkbox" name="power_backup" value="yes">Suministro de Energía</p>
                </div>
                <div class="box">
                    <p><input type="checkbox" name="parking_area" value="yes">Aparcamiento</p>
                    <p><input type="checkbox" name="gym" value="yes">Gimnasio</p>
                    <p><input type="checkbox" name="swimming_pool" value="yes">Centro Comercial</p>
                    <p><input type="checkbox" name="hospital" value="yes">Hospital</p>
                    <p><input type="checkbox" name="school" value="yes">Escuela</p>
                    <p><input type="checkbox" name="market_area" value="yes">Mercado</p>
                </div>
            </div>
            <div class="box">
                <p>Imagen 01 <span>*</span></p>
                <input type="file" name="image_01" class="input" accept="image/*" required>
            </div>
            <div class="flex">
                <div class="box">
                    <p>Imagen 02</p>
                    <input type="file" name="image_02" class="input" accept="image/*">
                </div>
                <div class="box">
                    <p>Imagen 03</p>
                    <input type="file" name="image_03" class="input" accept="image/*">
                </div>
                <div class="box">
                    <p>Imagen 04</p>
                    <input type="file" name="image_04" class="input" accept="image/*">
                </div>
                <div class="box">
                    <p>Imagen 05</p>
                    <input type="file" name="image_05" class="input" accept="image/*">
                </div>
            </div>
            <input type="submit" value="Publicar Propiedad" class="btn" name="post">
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