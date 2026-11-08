<?php 
require_once '../componentes/header.php';
require_once '../database/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim ($_POST['nombre_usuario'] ?? '');
            $apellido = trim ($_POST['apellido_usuario'] ?? '');
            $email = trim ($_POST['email'] ?? '');
            $password = trim ($_POST['password'] ?? '');

 if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
        echo  "Por favor complete todos los campos.";
    }
    if (!empty($nombre) && strlen($nombre) < 2) {
        echo "El nombre debe tener al menos 2 caracteres.";
    }
    if (!empty($apellido) && strlen($apellido) < 2) {
        echo  "El apellido debe tener al menos 2 caracteres.";
    }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo  "Ingrese un correo electrónico válido.";
    }
    if (!empty($password) && strlen($password) < 6) {
        echo  "La contraseña debe tener al menos 6 caracteres.";
    }
    if (empty($errores)) {
        $sqlCheck = "SELECT id FROM usuarios WHERE email = ?";
        $stmtCheck = mysqli_prepare($conexion, $sqlCheck);
        mysqli_stmt_bind_param($stmtCheck, "s", $email);
        mysqli_stmt_execute($stmtCheck);
        mysqli_stmt_store_result($stmtCheck);

        if (mysqli_stmt_num_rows($stmtCheck) > 0) {
            $errores[] = "El correo electrónico ya está registrado.";
        }
        mysqli_stmt_close($stmtCheck);
    }
if (empty($errores)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sqlInsert = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES (?, ?, ?, ?)";
        $stmtInsert = mysqli_prepare($conexion, $sqlInsert);
        mysqli_stmt_bind_param($stmtInsert, "ssss", $nombre, $apellido, $email, $passwordHash);

        if (mysqli_stmt_execute($stmtInsert)) {
            $_SESSION['flash_exito'] = "¡Registro exitoso! Ya podés iniciar sesión.";
            header("Location: login.php");
            exit;
        } else {
            $errores[] = "Error al registrar el usuario en la base de datos.";
        }
        mysqli_stmt_close($stmtInsert);
    }
}
?>
  
    <h1>Registro de Usuario</h1>
    
    <main>
    <form action="registro.php" method="POST">
        <fieldset class="transparencia">
            <legend class="contacto">Crea tu cuenta</legend>
            <div class="input">
                <label for="nombre">Nombre </label>
                <input minlength="2" maxlength="25"   type="text" id="Nombre" name="nombre_usuario" placeholder="Ej: Swan" required >
            </div>
            <div class="input">
                <label for="apellido">Apellido </label>
                <input minlength="2" maxlength="25"   type="text" id="Apellido" name="apellido_usuario" placeholder="Ej: Swan" required >
            </div>
            <div class="input">
                <label for="email">Correo Electronico</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su Correo" required>
            </div>
             <div class="input">
                <label for="contacto">Contraseña</label>
                <input minlength="6" maxlength="50" type="password" id="password" name="password" placeholder="Mínimo 6 caracteres" required>
             </div>
        
            <div class="botones"> 
             <input type="submit" value="Registrarse">   
            </div>
        </fieldset>
    </form>    
    </main>

<?php require_once '../componentes/footer.php'?>