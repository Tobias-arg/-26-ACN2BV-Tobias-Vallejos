<?php
require_once '../componentes/header.php';
require_once '../database/conexion.php';

$mensajeExito = $_SESSION['flash_exito'] ?? '';
unset($_SESSION['flash_exito']);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        $errores[] = "Por favor complete todos los campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Ingrese un correo electrónico válido.";
    } else {
        $sql = "SELECT id, nombre, apellido, password FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($usuario = mysqli_fetch_assoc($resultado)) {
            if (password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id']       = $usuario['id'];
                $_SESSION['usuario_nombre']   = $usuario['nombre'];
                $_SESSION['usuario_apellido'] = $usuario['apellido'];
                $_SESSION['flash_exito']      = "Inicio de sesión exitoso. ¡Bienvenido, {$usuario['nombre']}!";
                
                header("Location: ../index.php");
                exit();
            } else {
                $errores[] = "Contraseña incorrecta.";
            }
        } else {
            $errores [] = "No se encontró un usuario con ese correo electrónico.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>
 <h1>Iniciar Sesión</h1>
    <main>
    <form action="login.php" method="POST">
        <fieldset class="transparencia">
            <legend class="contacto">Inicia sesión en tu cuenta</legend>
        
            <div class="input">
                <label for="email">Correo Electronico</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su Correo" required>
            </div>
             <div class="input">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" minlength="6" maxlength="50" placeholder="Mínimo 6 caracteres" required>
             </div>
        
            <div class="botones"> 
             <input type="submit" value="Iniciar Sesión">   
            </div>
        </fieldset>
    </form>    
    </main>