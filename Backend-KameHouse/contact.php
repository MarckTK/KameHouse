<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

if(isset($_POST['send'])){

    $msg_id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $message = $_POST['message'];
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $verify_contact->execute([$name, $email, $number, $message]);

    if($verify_contact->rowCount() > 0){
        $warning_msg[] = '¡Mensaje ya enviado!';
    }else{
        $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
        $send_message->execute([$msg_id, $name, $email, $number, $message]);
        $success_msg[] = '¡Mensaje enviado con Éxito!';
    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctenos</title>
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

    <!-- Sección Contáctenos -->
    <section class="contact">
        <div class="row">
            <div class="image">
                <img src="images/Fondo/contact-img.png" alt="">
            </div>
            <form action="" method="post">
                <h3>Ponte en Contacto</h3>
                <input type="text" name="name" required maxlength="50" placeholder="Ingrese su Nombre" class="box">
                <input type="email" name="email" required maxlength="50" placeholder="Ingrese su Correo" class="box">
                <input type="number" name="number" required maxlength="9" max="999999999" min="0"
                    placeholder="Ingrese su Número" class="box">
                <textarea name="message" placeholder="Déjenos su mensaje" required maxlength="1000" cols="30" rows="10"
                    class="box"></textarea>
                <input type="submit" value="Enviar Mensaje" name="send" class="btn">
            </form>
        </div>
    </section>
    <!-- Fin Contáctenos -->

    <!-- Sección Preguntas Frecuentes  -->
    <section class="faq" id="faq">
        <h1 class="heading">Preguntas Frecuentes</h1>
        <div class="box-container">

            <div class="box active">
                <h3><span>¿Cómo contactar con los compradores?</span><i class="fas fa-angle-down"></i></h3>
                <p>Esto se deberán a dos factores, la primera está en que se podrá comunicar con el propietario
                    mediante el contacto que brinde en la página o por un chat que se tiene en la página.</p>
            </div>
            <div class="box active">
                <h3><span>¿Cuándo tendré la posesión?</span><i class="fas fa-angle-down"></i></h3>
                <p>Esa información la obtendrá por medio del propietario, nosotros como empresa nos encargamos de
                    satisfacer a nuestros clientes dejando publicar su vivienda en nuestra página.</p>
            </div>
            <div class="box">
                <h3><span>¿Dónde puedo pagar el alquiler?</span><i class="fas fa-angle-down"></i></h3>
                <p>Eso dependerá según el dueño de la vivienda. Por ello, se le recomienda consultar por interno y
                    acordar un monto y fecha de pago, ya sea una venta o un alquiler de alguna vivienda.</p>
            </div>
            <div class="box">
                <h3><span>¿Cómo contactar con la empresa?</span><i class="fas fa-angle-down"></i></h3>
                <p>Para eso es sencillo, en esta parte de la página solo necesita ingresar sus datos o dudas que tenga
                    al respecto. Así mismo puedes realizar una consulta mediante el uso del ChatBot.</p>
            </div>
            <div class="box">
                <h3><span>¿Por qué mi anuncio no aparece?</span><i class="fas fa-angle-down"></i></h3>
                <p>Posiblemente esto se deba alguna falla de su conexión o de nuestros servidores. Trate de tener una
                    buena cobertura de internet, de caso contrario comuníquese con nosotros.</p>
            </div>
            <div class="box">
                <h3><span>¿Cómo promocionar mi anuncio?</span><i class="fas fa-angle-down"></i></h3>
                <p>Primero se tendrá que registrar en nuestra página, después se le habilitará la opción de publicar
                    propiedad en nuestra barra de navegación de la página, en la parte de Mis Anuncios.</p>
            </div>
        </div>
    </section>
    <!-- Fin Preguntas Frecuentes -->


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