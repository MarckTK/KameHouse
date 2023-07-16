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
    <title>Sobre Nosotros</title>
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

    <!-- Sección Nosotros -->
    <section class="about">
        <div class="row">
            <div class="image">
                <img src="images/Fondo/about-img.png" alt="">
            </div>
            <div class="content">
                <h3>¿Porque Elegirnos?</h3>
                <p>En nuestra inmobiliaria, nuestro objetivo es ayudarte a encontrar la propiedad que mejor se adapte a
                    tus necesidades y deseos. Tenemos una amplia selección de propiedades para la venta o alquiler y nos
                    enfocamos en brindar una excelente atención al cliente. Además, podrá encontrar la propiedad
                    perfecta sin tener que pasar horas buscando en diferentes sitios web. ¡Permítenos ayudarte a
                    encontrar el hogar de tus sueños!</p>
                <a href="contact.php" class="inline-btn">Contáctenos</a>
            </div>
        </div>
    </section>
    <!-- Fin Nosotros -->

    <!-- Sección Razones  -->
    <section class="steps">

        <h1 class="heading">Por 3 simples Razones</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/Iconos/step-1.png" alt="">
                <h3>La propiedad que Desea</h3>
                <p>Ofrecemos una amplia selección de propiedades, aumentando las posibilidades de
                    encontrar su hogar deseado.</p>
            </div>

            <div class="box">
                <img src="images/Iconos/step-2.png" alt="">
                <h3>Atención al Cliente</h3>
                <p>Nos esforzamos por responder rápidamente a cualquier consulta o pregunta que tengas sobre una
                    propiedad.
                </p>
            </div>

            <div class="box">
                <img src="images/Iconos/step-3.png" alt="">
                <h3>Comodidad del Hogar</h3>
                <p>Ofrecemos una selección de propiedades que se ajustan a diferentes estilos de vida y a tus
                    necesidades.
                </p>
            </div>

        </div>
    </section>
    <!-- Fin Razones -->

    <!-- Sección Opiniones  -->
    <section class="reviews">

        <h1 class="heading">Opiniones de Clientes</h1>

        <div class="box-container">

            <div class="box">
                <div class="user">
                    <img src="images/Foto/pic-1.png" alt="">
                    <div>
                        <h3>Carlos Fernández</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>¡Fue increíblemente fácil encontrar la casa de mis sueños gracias a su página web! El proceso de
                    compra fue rápido y sin complicaciones!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/Foto/pic-2.png" alt="">
                    <div>
                        <h3>María González</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Estoy muy agradecido por el gran trabajo que hicieron. Encontraron un excelente inquilino para mi
                    propiedad en muy poco tiempo.</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/Foto/pic-3.png" alt="">
                    <div>
                        <h3>Pablo Jiménez</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>No puedo agradecer lo suficiente al equipo de su inmobiliaria. Su atención al cliente es excepcional
                    y
                    siempre estuvieron allí para todo.</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/Foto/pic-4.png" alt="">
                    <div>
                        <h3>Ana García</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Su selección de propiedades es excelente y encontramos el apartamento perfecto para nosotros en
                    cuestión
                    de días.</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/Foto/pic-5.png" alt="">
                    <div>
                        <h3>José Ramírez</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>¡El proceso de alquiler fue tan rápido y sencillo que no puedo creer lo fácil que fue! ¡Y la atención
                    al
                    cliente fue de mucha ayuda!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/Foto/pic-6.png" alt="">
                    <div>
                        <h3>Alejandra Medina</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>La comodidad que nos ofrecieron al mostrar propiedades y resolver todas nuestras dudas desde la
                    página
                    web fue invaluable para mi familia.</p>
            </div>

        </div>
    </section>
    <!-- Fin Opiniones -->


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