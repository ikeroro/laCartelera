<?php
    session_start();
    include 'server/conexion.php';
    
    $error = isset($_SESSION['registro_error']) ? $_SESSION['registro_error'] : '';
    unset($_SESSION['registro_error']);
    
    $usuario = isset($_SESSION['form_usuario']) ? $_SESSION['form_usuario'] : '';
    $email = isset($_SESSION['form_email']) ? $_SESSION['form_email'] : '';
    unset($_SESSION['form_usuario']);
    unset($_SESSION['form_email']);
?>
               
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>La Cartelera - Registro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    
    <main>
        <div class="top">
            <h2>Crear Cuenta</h2>
        </div>
        
        <?php if($error): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <div class="formularioContainer">
            <form action="server/peticion/registro.php" method="POST">
                <input type="text" 
                       name="usuario" 
                       placeholder="Usuario" 
                       autocomplete="username"
                       value="<?php echo htmlspecialchars($usuario); ?>"
                       required>
                
                <input type="email" 
                       name="email" 
                       placeholder="Email" 
                       autocomplete="email"
                       value="<?php echo htmlspecialchars($email); ?>"
                       required>
                
                <input type="password" 
                       name="contrasena" 
                       placeholder="Contraseña" 
                       autocomplete="new-password"
                       required>
                
                <input type="password" 
                       name="confirmar_contrasena" 
                       placeholder="Confirmar Contraseña" 
                       autocomplete="new-password"
                       required>
                
                <button type="submit">Registrarse</button>
            </form>
            
            <div class="login-link">
                <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
            </div>
        </div>

    </main>

</body>
</html>