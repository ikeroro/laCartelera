<?php
session_start();
include 'server/conexion.php'; 

$sql_generos = "SELECT nombre FROM generos ORDER BY nombre";
$stmt = $conexion->prepare($sql_generos);
$stmt->execute();
$generos = $stmt->fetchAll(PDO::FETCH_COLUMN);

$sql_plataforma = "SELECT nombre FROM plataformas ORDER BY nombre";
$stmt = $conexion->prepare($sql_plataforma);
$stmt->execute();
$plataformas = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>La Cartelera</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/peliculas.css">

    <script src="js/jquery.js"></script>
    <script src="js/hamburguesa.js"></script>
    <script src="js/paginas/peliculas.js"></script>

</head>

<body>

    <?php include 'componentes/header.php'; ?>

    <main>

        <div class="buscadorPelis">

            <select name="anho" id="anho">
                <option value="todos">Todos los años</option>
                <option value="futuro">Por Salir</option>
                <?php
                $ano_incio = 2020;
                for ($ano = $ano_incio; $ano >= 1900; $ano -= 10) {
                    echo '<option value="' . $ano . '">' . $ano . 's' . '</option>';
                }
                ?>
            </select>


            <select name="generos" id="generos">
                <option value="">Todos los géneros</option>
                <?php
                foreach ($generos as $genero) {
                    echo '<option value="' . htmlspecialchars($genero) . '">' . htmlspecialchars($genero) . '</option>';
                }
                ?>
            </select>

            <select name="plataforma" id="plataforma"> 
                <option value="">Todas las plataformas</option> 
                <?php
                foreach ($plataformas as $plataforma) {
                    echo '<option value="' . htmlspecialchars($plataforma) . '">' . htmlspecialchars($plataforma) . '</option>';
                }
                ?>
             </select>
            

            <!-- criterios para ordenar -->
            <select name="puntuacion" id="puntuacion">
                <option value="">Ordenar por puntuación</option>
                <option value="asc">Menor a mayor</option>
                <option value="desc">Mayor a menor</option>
            </select>

            <select name="duracion" id="duracion">
                <option value="">Ordenar por duración</option>
                <option value="asc">Más corta á más larga</option>
                <option value="desc">Más larga á más corta</option>
            </select>

            <input type="text" name="nombrePelis" id="nombrePelis" placeholder="Buscar película...">

            <div id="botonBuscarPelis" class="botonBuscarPelis">
                <button type="button">Buscar</button>
            </div>
        </div>

        <h2>Películas</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem eligendi ullam harum id. Officia aperiam illo labore, sed modi magni ut maiores! Corporis ipsum at omnis vero quidem nesciunt illum?</p>

        <div id="resultadosPeliculas">
            <!-- Aquí se cargarán las películas vía AJAX -->
        </div>
    </main>

    <?php include 'componentes/footer.php'; ?>
</body>

</html>