<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

                if (isset($_POST['recordar'])) {
                    setcookie('recordar_email', $email, time() + (86400 * 30), "/");
                } else {
                    setcookie('recordar_email', '', time() - 3600, "/");
                }
                
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
require_once '../componentes/header.php';
?>
 <h1>Iniciar Sesión</h1>
<?php if (!empty($errores)): ?>
        <div class="mensaje-error">
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <fieldset class="transparencia">
            <legend class="contacto">Inicia sesión en tu cuenta</legend>
        
            <div class="input">
                <label for="email">Correo Electronico</label>
               <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_COOKIE['recordar_email'] ?? ''); ?>" placeholder="Ingrese su Correo" required>
            </div>
             <div class="input">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" minlength="6" maxlength="50" placeholder="Mínimo 6 caracteres" required>
             </div>

             <div class="recordar">
                <input type="checkbox" id="recordar" name="recordar" value="1" <?php echo isset($_COOKIE['recordar_email']) ? 'checked' : ''; ?>>
                <label for="recordar">Recordar mi correo electrónico</label>
            </div>
        
            <div class="botones"> 
             <input type="submit" value="Iniciar Sesión">   
            </div>
        </fieldset>
    </form>    
    </main>