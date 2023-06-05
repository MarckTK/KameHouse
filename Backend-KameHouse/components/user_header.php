<!-- Sección Cabecera  -->

<header class="header">

    <div class="navbar nav-1">
        <section class="flex">
            <a href="index.php" class="logo"><i class="fas fa-house"></i>Kame<span>House</span></a>

            <ul>
                <li><a href="post_property.php">Publicar Propiedad<i class="fas fa-paper-plane"></i></a></li>
            </ul>
        </section>
    </div>

    <div class="navbar nav-2">
        <section class="flex">
            <div id="menu-btn" class="fas fa-bars"></div>

            <div class="menu">
                <ul>
                    <li><a href="#">Mis Anuncios<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="dashboard.php">Panel de Control</a></li>
                            <li><a href="post_property.php">Publicar Propiedad</a></li>
                            <li><a href="my_listings.php">Mis Anuncios</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Opciones<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="search.php">Filtrar Búsqueda</a></li>
                            <li><a href="listings.php">Todos los Anuncios</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Ayuda<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="about.php">Sobre Nosotros</a></i></li>
                            <li><a href="contact.php">Contáctenos</a></i></li>
                            <li><a href="contact.php#faq">Preguntas Frecuentes</a></i></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <ul>
                <li><a href="saved.php">Propiedades Guardadas<i class="fas fa-heart"></i></a></li>
                <li><a href="#">Cuenta <i class="fas fa-angle-down"></i></a>
                    <ul>
                        <li><a href="login.php">Iniciar Sesión</a></li>
                        <li><a href="register.php">Registrarse</a></li>
                        <?php if($user_id != ''){ ?>
                        <li><a href="update.php">Actualizar Perfil</a></li>
                        <li><a href="components/user_logout.php"
                                onclick="return confirm('¿Desea Cerrar Sesión en KameHouse?');">Cerrar Sesión</a>
                            <?php } ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </div>

</header>

<!-- Fin Cabecera -->