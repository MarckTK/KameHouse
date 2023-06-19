<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:login.php');
}

if(isset($_GET['get_id'])){
    $get_id = $_GET['get_id'];
}else{
    $get_id = '';
    header('location:index.php');
}

if(isset($_POST['update'])){
    $update_id = $_POST['property_id'];
    $update_id = filter_var($update_id, FILTER_SANITIZE_STRING);
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

    $old_image_01 =  $_POST['old_image_01'];
    $old_image_01 = filter_var($old_image_01, FILTER_SANITIZE_STRING);
    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
    $rename_image_01 = create_unique_id().'.'.$image_01_ext;
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_folder = 'images/Images_Subidas/'.$rename_image_01;

    if(!empty($image_01)){
        if($image_01_size > 2000000){
            $warning_msg[] = '¡La Imagen 01 es demasiado grande!';
        }else{
            $update_image_01 = $conn->prepare("UPDATE `property` SET image_01 = ? WHERE id = ?");
            $update_image_01->execute([$rename_image_01, $update_id]);
            move_uploaded_file($image_01_tmp_name, $image_01_folder);
            if($old_image_01 != ''){
                unlink('images/Images_Subidas/'.$old_image_01);
            }
        }
    }

    $old_image_02 = $_POST['old_image_02'];
    $old_image_02 = filter_var($old_image_02, FILTER_SANITIZE_STRING);
    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_02_ext = pathinfo($image_02, PATHINFO_EXTENSION);
    $rename_image_02 = create_unique_id().'.'.$image_02_ext;
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_size = $_FILES['image_02']['size'];
    $image_02_folder = 'images/Images_Subidas/'.$rename_image_02;

    if(!empty($image_02)){
        if($image_02_size > 2000000){
            $warning_msg[] = '¡La Imagen 02 es demasiado grande!';
        }else{
            $update_image_02 = $conn->prepare("UPDATE `property` SET image_02 = ? WHERE id = ?");
            $update_image_02->execute([$rename_image_02, $update_id]);
            move_uploaded_file($image_02_tmp_name, $image_02_folder);
            if($old_image_02 != ''){
                unlink('images/Images_Subidas/'.$old_image_02);
            }
        }
    }

    $old_image_03 = $_POST['old_image_03'];
    $old_image_03 = filter_var($old_image_03, FILTER_SANITIZE_STRING);
    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_03_ext = pathinfo($image_03, PATHINFO_EXTENSION);
    $rename_image_03 = create_unique_id().'.'.$image_03_ext;
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_size = $_FILES['image_03']['size'];
    $image_03_folder = 'images/Images_Subidas/'.$rename_image_03;

    if(!empty($image_03)){
        if($image_03_size > 2000000){
            $warning_msg[] = '¡La Imagen 03 es demasiado grande!';
        }else{
            $update_image_03 = $conn->prepare("UPDATE `property` SET image_03 = ? WHERE id = ?");
            $update_image_03->execute([$rename_image_03, $update_id]);
            move_uploaded_file($image_03_tmp_name, $image_03_folder);
            if($old_image_03 != ''){
                unlink('images/Images_Subidas/'.$old_image_03);
            }
        }
    }

    $old_image_04 = $_POST['old_image_04'];
    $old_image_04 = filter_var($old_image_04, FILTER_SANITIZE_STRING);
    $image_04 = $_FILES['image_04']['name'];
    $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
    $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
    $rename_image_04 = create_unique_id().'.'.$image_04_ext;
    $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
    $image_04_size = $_FILES['image_04']['size'];
    $image_04_folder = 'images/Images_Subidas/'.$rename_image_04;

    if(!empty($image_04)){
        if($image_04_size > 2000000){
            $warning_msg[] = '¡La Imagen 04 es demasiado grande!';
        }else{
            $update_image_04 = $conn->prepare("UPDATE `property` SET image_04 = ? WHERE id = ?");
            $update_image_04->execute([$rename_image_04, $update_id]);
            move_uploaded_file($image_04_tmp_name, $image_04_folder);
            if($old_image_04 != ''){
                unlink('images/Images_Subidas/'.$old_image_04);
            }
        }
    }

    $old_image_05 = $_POST['old_image_05'];
    $old_image_05 = filter_var($old_image_05, FILTER_SANITIZE_STRING);
    $image_05 = $_FILES['image_05']['name'];
    $image_05 = filter_var($image_05, FILTER_SANITIZE_STRING);
    $image_05_ext = pathinfo($image_05, PATHINFO_EXTENSION);
    $rename_image_05 = create_unique_id().'.'.$image_05_ext;
    $image_05_tmp_name = $_FILES['image_05']['tmp_name'];
    $image_05_size = $_FILES['image_05']['size'];
    $image_05_folder = 'images/Images_Subidas/'.$rename_image_05;

    if(!empty($image_05)){
        if($image_05_size > 2000000){
            $warning_msg[] = '¡La Imagen 05 es demasiado grande!';
        }else{
            $update_image_05 = $conn->prepare("UPDATE `property` SET image_05 = ? WHERE id = ?");
            $update_image_05->execute([$rename_image_05, $update_id]);
            move_uploaded_file($image_05_tmp_name, $image_05_folder);
            if($old_image_05 != ''){
                unlink('images/Images_Subidas/'.$old_image_05);
            }
        }
    }

    $update_listing = $conn->prepare("UPDATE `property` SET property_name = ?, address = ?, price = ?, type = ?, offer = ?, status = ?, furnished = ?, bhk = ?, deposite = ?, bedroom = ?, bathroom = ?, carpet = ?, age = ?, total_floors = ?, room_floor = ?, loan = ?, lift = ?, security_guard = ?, play_ground = ?, garden = ?, water_supply = ?, power_backup = ?, parking_area = ?, gym = ?, shopping_mall = ?, hospital = ?, school = ?, market_area = ?, description = ? WHERE id = ?");   
    $update_listing->execute([$property_name, $address, $price, $type, $offer, $status, $furnished, $bhk, $deposite, $bedroom, $bathroom, $carpet, $age, $total_floors, $room_floor, $loan, $lift, $security_guard, $play_ground, $garden, $water_supply, $power_backup, $parking_area, $gym, $shopping_mall, $hospital, $school, $market_area, $description, $update_id]);

    $success_msg[] = '¡Anuncio actualizado con Éxito!';

    if(isset($_POST['delete_image_02'])){
        $old_image_02 = $_POST['old_image_02'];
        $old_image_02 = filter_var($old_image_02, FILTER_SANITIZE_STRING);
        $update_image_02 = $conn->prepare("UPDATE `property` SET image_02 = ? WHERE id = ?");
        $update_image_02->execute(['', $get_id]);
        if($old_image_02 != ''){
            unlink('images/Images_Subidas/'.$old_image_02);
            $success_msg[] = '¡La Imagen 02 ha sido eliminado!';
        }
    }

    if(isset($_POST['delete_image_03'])){
        $old_image_03 = $_POST['old_image_03'];
        $old_image_03 = filter_var($old_image_03, FILTER_SANITIZE_STRING);
        $update_image_03 = $conn->prepare("UPDATE `property` SET image_03 = ? WHERE id = ?");
        $update_image_03->execute(['', $get_id]);
        if($old_image_03 != ''){
            unlink('images/Images_Subidas/'.$old_image_03);
            $success_msg[] = '¡La Imagen 03 ha sido eliminado!';
        }
    }

    if(isset($_POST['delete_image_04'])){
        $old_image_04 = $_POST['old_image_04'];
        $old_image_04 = filter_var($old_image_04, FILTER_SANITIZE_STRING);
        $update_image_04 = $conn->prepare("UPDATE `property` SET image_04 = ? WHERE id = ?");
        $update_image_04->execute(['', $get_id]);
        if($old_image_04 != ''){
            unlink('images/Images_Subidas/'.$old_image_04);
            $success_msg[] = '¡La Imagen 04 ha sido eliminado!';
        }
    }

    if(isset($_POST['delete_image_05'])){
        $old_image_05 = $_POST['old_image_05'];
        $old_image_05 = filter_var($old_image_05, FILTER_SANITIZE_STRING);
        $update_image_05 = $conn->prepare("UPDATE `property` SET image_05 = ? WHERE id = ?");
        $update_image_05->execute(['', $get_id]);
        if($old_image_05 != ''){
            unlink('images/Images_Subidas/'.$old_image_05);
            $success_msg[] = '¡La Imagen 05 ha sido eliminado!';
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
    <title>Actualizar Propiedad</title>
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

    <!-- Sección Actualizar Propiedad -->
    <section class="property-form">
        <?php
            $select_properties = $conn->prepare("SELECT * FROM `property` WHERE id = ? ORDER BY date DESC LIMIT 1");
            $select_properties->execute([$get_id]);
            if($select_properties->rowCount() > 0){
                while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
                $property_id = $fetch_property['id'];
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
            <input type="hidden" name="old_image_01" value="<?= $fetch_property['image_01']; ?>">
            <input type="hidden" name="old_image_02" value="<?= $fetch_property['image_02']; ?>">
            <input type="hidden" name="old_image_03" value="<?= $fetch_property['image_03']; ?>">
            <input type="hidden" name="old_image_04" value="<?= $fetch_property['image_04']; ?>">
            <input type="hidden" name="old_image_05" value="<?= $fetch_property['image_05']; ?>">
            <h3>Detalles de la Propiedad</h3>
            <div class="box">
                <p>Nombre de la Propiedad <span>*</span></p>
                <input type="text" name="property_name" required maxlength="50"
                    placeholder="Ingrese Nombre de la Propiedad" class="input"
                    value="<?= $fetch_property['property_name']; ?>">
            </div>
            <div class="flex">
                <div class="box">
                    <p>Precio de la Propiedad <b>($)</b> <span>*</span></p>
                    <input type="number" name="price" required min="0" max="9999999999" maxlength="10"
                        placeholder="Ingrese el Precio de la Propiedad en Dólares" class="input"
                        value="<?= $fetch_property['price']; ?>">
                </div>
                <div class="box">
                    <p>Cantidad del Depósito <span>*</span></p>
                    <input type="number" name="deposite" required min="0" max="9999999999" maxlength="10"
                        placeholder="Ingrese la Cantidad del Depósito" class="input"
                        value="<?= $fetch_property['deposite']; ?>">
                </div>
                <div class="box">
                    <p>Dirección de la Propiedad <span>*</span></p>
                    <input type="text" name="address" required maxlength="100"
                        placeholder="Ingrese la Dirección de la Propiedad" class="input"
                        value="<?= $fetch_property['address']; ?>">
                </div>
                <div class="box">
                    <p>Tipo de Oferta <span>*</span></p>
                    <select name="offer" required class="input">
                        <option value="<?= $fetch_property['offer']; ?>" selected>
                            <?= $fetch_property['offer']; ?></option>
                        <option value="Venta">Venta</option>
                        <option value="Reventa">Reventa</option>
                        <option value="Alquiler">Alquiler</option>
                    </select>
                </div>
                <div class="box">
                    <p>Tipo de Propiedad <span>*</span></p>
                    <select name="type" required class="input">
                        <option value="<?= $fetch_property['type']; ?>" selected>
                            <?= $fetch_property['type']; ?>
                        </option>
                        <option value="Departamento">Departamento</option>
                        <option value="Casa">Casa</option>
                        <option value="Local">Local</option>
                    </select>
                </div>
                <div class="box">
                    <p>Estado de Propiedad <span>*</span></p>
                    <select name="status" required class="input">
                        <option value="<?= $fetch_property['status']; ?>" selected>
                            <?= $fetch_property['status']; ?>
                        </option>
                        <option value="Listo para Mudarse">Listo para Mudarse</option>
                        <option value="En Construcción">En Construcción</option>
                    </select>
                </div>
                <div class="box">
                    <p>Amoblamiento <span>*</span></p>
                    <select name="furnished" required class="input">
                        <option value="<?= $fetch_property['furnished']; ?>" selected>
                            <?= $fetch_property['furnished']; ?>
                        </option>
                        <option value="Amueblado">Amueblado</option>
                        <option value="Semi Amueblado">Semi Amueblado</option>
                        <option value="Sin Amueblar">Sin Amueblar</option>
                    </select>
                </div>
                <div class="box">
                    <p>¿Cuántos BHK Desea?<span>*</span></p>
                    <select name="bhk" required class="input">
                        <option value="<?= $fetch_property['bhk']; ?>" selected>
                            <?= $fetch_property['bhk']; ?> BHK
                        </option>
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
                        <option value="<?= $fetch_property['bedroom']; ?>" selected>
                            <?= $fetch_property['bedroom']; ?> Dormitorios
                        </option>
                        <option value="0">0 Dormitorios</option>
                        <option value="1">1 Dormitorio</option>
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
                        <option value="<?= $fetch_property['bathroom']; ?>" selected>
                            <?= $fetch_property['bathroom']; ?> Baños
                        </option>
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
                        <option value="<?= $fetch_property['balcony']; ?>" selected>
                            <?= $fetch_property['balcony']; ?> Balcones
                        </option>
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
                        placeholder="¿Cuántos metros cuadrados?" class="input"
                        value="<?= $fetch_property['carpet']; ?>">
                </div>
                <div class="box">
                    <p>Tiempo de la Propiedad <span>*</span></p>
                    <input type="number" name="age" required min="0" max="99" maxlength="2"
                        placeholder="¿Cuántos años tiene la propiedad?" class="input"
                        value="<?= $fetch_property['age']; ?>">
                </div>
                <div class="box">
                    <p>Pisos Totales <span>*</span></p>
                    <input type="number" name="total_floors" required min="0" max="99" maxlength="2"
                        placeholder="¿Cuántos pisos disponibles hay?" class="input"
                        value="<?= $fetch_property['total_floors']; ?>">
                </div>
                <div class="box">
                    <p>Piso de la Propiedad <span>*</span></p>
                    <input type="number" name="room_floor" required min="0" max="99" maxlength="2"
                        placeholder="Número de piso del inmueble" class="input"
                        value="<?= $fetch_property['room_floor']; ?>">
                </div>
                <div class="box">
                    <p>Crédito <span>*</span></p>
                    <select name="loan" required class="input">
                        <option value="<?= $fetch_property['loan']; ?>" selected>
                            <?= $fetch_property['loan']; ?>
                        </option>
                        <option value="Disponible">Disponible</option>
                        <option value="No Disponible">No Disponible</option>
                    </select>
                </div>
            </div>
            <div class="box">
                <p>Descripción de la Propiedad <span>*</span></p>
                <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10"
                    placeholder="Escribir sobre la Propiedad..."><?= $fetch_property['description']; ?>
                </textarea>
            </div>
            <div class="checkbox">
                <div class="box">
                    <p><input type="checkbox" name="lift" value="yes"
                            <?php if($fetch_property['lift'] == 'yes'){echo 'checked'; } ?>>Ascensores</p>
                    <p><input type="checkbox" name="security_guard" value="yes"
                            <?php if($fetch_property['security_guard'] == 'yes'){echo 'checked'; } ?>>Guardia de
                        Seguridad</p>
                    <p><input type="checkbox" name="play_ground" value="yes"
                            <?php if($fetch_property['play_ground'] == 'yes'){echo 'checked'; } ?>>Parque Infantil</p>
                    <p><input type="checkbox" name="garden" value="yes"
                            <?php if($fetch_property['garden'] == 'yes'){echo 'checked'; } ?>>Jardín</p>
                    <p><input type="checkbox" name="water_supply" value="yes"
                            <?php if($fetch_property['water_supply'] == 'yes'){echo 'checked'; } ?>>Abastecimiento de
                        Agua</p>
                    <p><input type="checkbox" name="power_backup" value="yes"
                            <?php if($fetch_property['power_backup'] == 'yes'){echo 'checked'; } ?>>Suministro de
                        Energía</p>
                </div>
                <div class="box">
                    <p><input type="checkbox" name="parking_area" value="yes"
                            <?php if($fetch_property['parking_area'] == 'yes'){echo 'checked'; } ?>>Aparcamiento</p>
                    <p><input type="checkbox" name="gym" value="yes"
                            <?php if($fetch_property['gym'] == 'yes'){echo 'checked'; } ?>>Gimnasio</p>
                    <p><input type="checkbox" name="swimming_pool" value="yes"
                            <?php if($fetch_property['shopping_mall'] == 'yes'){echo 'checked'; } ?>>Centro Comercial
                    </p>
                    <p><input type="checkbox" name="hospital" value="yes"
                            <?php if($fetch_property['hospital'] == 'yes'){echo 'checked'; } ?>>Hospital</p>
                    <p><input type="checkbox" name="school" value="yes"
                            <?php if($fetch_property['school'] == 'yes'){echo 'checked'; } ?>>Escuela</p>
                    <p><input type="checkbox" name="market_area" value="yes"
                            <?php if($fetch_property['market_area'] == 'yes'){echo 'checked'; } ?>>Mercado</p>
                </div>
            </div>
            <div class="box">
                <img src="images/Images_Subidas/<?= $fetch_property['image_01']; ?>" class="image" alt="">
                <p>Actualizar Imagen 01 <span>*</span></p>
                <input type="file" name="image_01" class="input" accept="image/*" required>
            </div>
            <div class="flex">
                <div class="box">
                    <?php if(!empty($fetch_property['image_02'])){?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_02']; ?>" class="image" alt="">
                    <input type="submit" value="Eliminar Imagen 02" name="delete_image_02" class="inline-btn"
                        onclick="return confirm('¿Eliminar Imagen 02?');">
                    <?php }?>
                    <p>Actualizar Imagen 02</p>
                    <input type="file" name="image_02" class="input" accept="image/*">
                </div>
                <div class="box">
                    <?php if(!empty($fetch_property['image_03'])){?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_03']; ?>" class="image" alt="">
                    <input type="submit" value="Eliminar Imagen 03" name="delete_image_03" class="inline-btn"
                        onclick="return confirm('¿Eliminar Imagen 03?');">
                    <?php }?>
                    <p>Actualizar Imagen 03</p>
                    <input type="file" name="image_03" class="input" accept="image/*">
                </div>
                <div class="box">
                    <?php if(!empty($fetch_property['image_04'])){?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_04']; ?>" class="image" alt="">
                    <input type="submit" value="Eliminar Imagen 04" name="delete_image_04" class="inline-btn"
                        onclick="return confirm('¿Eliminar Imagen 04?');">
                    <?php }?>
                    <p>Actualizar Imagen 04</p>
                    <input type="file" name="image_04" class="input" accept="image/*">
                </div>
                <div class="box">
                    <?php if(!empty($fetch_property['image_05'])){?>
                    <img src="images/Images_Subidas/<?= $fetch_property['image_05']; ?>" class="image" alt="">
                    <input type="submit" value="Eliminar Imagen 05" name="delete_image_05" class="inline-btn"
                        onclick="return confirm('¿Eliminar Imagen 05?');">
                    <?php }?>
                    <p>Actualizar Imagen 05</p>
                    <input type="file" name="image_05" class="input" accept="image/*">
                </div>
            </div>
            <input type="submit" value="Actualizar Propiedad" class="btn" name="update">
        </form>
        <?php
                }
            }else{
                echo '<p class="empty">¡Propiedad no Encontrada! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">Añadir Nuevo </a></p>';
            }
        ?>
    </section>
    <!-- Fin Actualizar Propiedad -->


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