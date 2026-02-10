<header>
        <nav>
            <div id="logo">
                <h1>La Cartelera</h1>
            </div>
            
            <!--hamburguesa-->
            <button class="menu-toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="peliculas.php">Películas</a></li>
                <li><a href="series.php">Series</a></li>

                <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '
                        <li><a href="perfil.php">Perfil </a></li>
                        <li><a href="logout.php">Cerrar sesión</a></li>';
                    } else {
                        echo '<li><a href="login.php">Iniciar sesión</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
