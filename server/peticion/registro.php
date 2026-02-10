<?php
session_start();
include '../conexion.php';

// Verificar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];
    
    $_SESSION['form_usuario'] = $usuario;
    $_SESSION['form_email'] = $email;
    
    
    // Verificar campos vacios
    if (empty($usuario) || empty($email) || empty($contrasena) || empty($confirmar_contrasena)) {
        $_SESSION['registro_error'] = "Por favor, completa todos los campos";
        header("Location: ../../registro.php");
        exit();
    }
    
    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registro_error'] = "El formato del email no es válido";
        header("Location: ../../registro.php");
        exit();
    }
    
    // Validar longitud usuario
    if (strlen($usuario) < 3) {
        $_SESSION['registro_error'] = "El usuario debe tener al menos 3 caracteres";
        header("Location: ../../registro.php");
        exit();
    }
    
    // Validar longitud contraseña
    if (strlen($contrasena) < 6) {
        $_SESSION['registro_error'] = "La contraseña debe tener al menos 6 caracteres";
        header("Location: ../../registro.php");
        exit();
    }
    
    // Verificar contrasinal 
    if ($contrasena !== $confirmar_contrasena) {
        $_SESSION['registro_error'] = "Las contraseñas no coinciden";
        header("Location: ../../registro.php");
        exit();
    }
    
    // Verificar usuario
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['registro_error'] = "El nombre de usuario ya está en uso";
        header("Location: ../../registro.php");
        exit();
    }
    $stmt->close();
    
    //Verificar email
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['registro_error'] = "El email ya está registrado";
        header("Location: ../../registro.php");
        exit();
    }
    $stmt->close();
    
    $rol = 'usuario';
    $fotoPerfil = NULL; 
    
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, email, contrasena, rol, fotoPerfil) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $usuario, $email, $contrasena, $rol, $fotoPerfil);
    
    if ($stmt->execute()) {

        unset($_SESSION['form_usuario']);
        unset($_SESSION['form_email']);
        

        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $rol;
        $_SESSION['email'] = $email;
        $_SESSION['fotoPerfil'] = $fotoPerfil;
        

        $_SESSION['success_message'] = "¡Bienvenido/a " . $usuario . "! Tu cuenta ha sido creada exitosamente.";
        header("Location: ../../index.php");
        exit();
    } else {
        $_SESSION['registro_error'] = "Error al crear la cuenta. Por favor, intenta de nuevo.";
        header("Location: ../../registro.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();
    
} else {
    header("Location: ../../registro.php");
    exit();
}
?>