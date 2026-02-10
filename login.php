<?php
    session_start();
    include 'server/conexion.php';
    

    $error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
    unset($_SESSION['login_error']);
?>
               
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>La Cartelera - Iniciar Sesión</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <main>
        <div class="top">
            <h2>Iniciar Sesión</h2>
        </div>
        
        <?php if($error): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <div class="formularioContainer">
            <form action="server/peticion/login.php" method="POST">
                <input type="text" 
                       name="usuario" 
                       placeholder="Usuario" 
                       autocomplete="username"
                       required>
                
                <input type="password" 
                       name="contrasena" 
                       placeholder="Contraseña" 
                       autocomplete="current-password"
                       required>
                
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
        
        <div>
            <a href="registro.php">Registrarse</a>
            
        </div>

    </main>

</body>
</html>