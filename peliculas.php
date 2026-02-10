<?php
    session_start();
    include 'server/conexion.php';
?>
                
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>La Cartelera</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="js/jquery.js"></script>
    <script src="js/hamburguesa.js"></script>
</head>
<body>
    
    <?php include 'componentes/header.php'; ?>

    <main>
        <h2>Peliculas</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem eligendi ullam harum id. Officia aperiam illo labore, sed modi magni ut maiores! Corporis ipsum at omnis vero quidem nesciunt illum?</p>
    </main>

    <?php include 'componentes/footer.php'; ?>
</body>
</html>