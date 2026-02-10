<?php
session_start();
include '../conexion.php';

//Comprobar solicitud 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $usuario = trim($_POST['usuario']);
    $contrasena = $_POST['contrasena'];
    
    if (empty($usuario) || empty($contrasena)) {
        $_SESSION['login_error'] = "Por favor, completa todos los campos";
        header("Location: ../../login.php");
        exit();
    }
    
    $stmt = $conn->prepare("SELECT id, usuario, contrasena, rol, email, fotoPerfil FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        

        if ($contrasena === $user['contrasena']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['rol'] = $user['rol'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['fotoPerfil'] = $user['fotoPerfil'];
            
            header("Location: ../../index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Usuario o contraseña incorrectos";
            header("Location: ../../login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Usuario o contraseña incorrectos";
        header("Location: ../../login.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();
    
} else {
    header("Location: ../../login.php");
    exit();
}
?>