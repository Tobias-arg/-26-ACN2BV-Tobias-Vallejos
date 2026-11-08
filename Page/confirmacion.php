   <?php require_once '../componentes/header.php'; ?>

         <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre_usuario'] ?? '';
            $email = $_POST['email'] ?? '';
            $motivo = $_POST['contacto'] ?? '';
            $mensaje = $_POST['mensaje_usuario'] ?? '';
        

        if (empty($nombre) || empty($email) || empty($motivo) || empty($mensaje)) {
            echo ("Por favor complete todos los campos.");
        } 
        if  (empty($nombre) && strlen($nombre) < 2 ){ 
            echo ("El nombre debe tener al menos 2 caracteres.");  
               }
        if (empty($apellido) && strlen($apellido) < 2 ){ 
            echo ("El apellido debe tener al menos 2 caracteres.");  
               }
                      
        if  (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo ("Ingrese un correo electrónico válido.");
        }
        else {
            $nombre = htmlspecialchars($nombre);
            $apellido =htmlspecialchars($apellido)
            $email = htmlspecialchars($email);
            $motivo = htmlspecialchars($motivo);
            $mensaje = htmlspecialchars($mensaje);
            $textmotivo="";
        switch ($motivo) {
            case 'sugerencia':
                $textmotivo = "Agradecemos tu curiosidad aportada a la comunidad.";
                break;
            case 'error':
                $textmotivo = "Gracias por reportar el error, lo solucionaremos a la brevedad.";
                break;
            case 'unirse':
                $textmotivo = "Gracias por querer unirte a los Warriors, nos pondremos en contacto.";
                break;
            default:
                $textmotivo = "Gracias por tu sugerencia.";
        }
            echo '<div class="confirmacion">';
            echo "Muchas gracias $nombre por aportar a la comunidad!. ";
            echo "<p>$textmotivo</p>";
            echo "<p>Hemos recibido su reporte y nos pondremos en contacto con usted a través de su email.</p>";
            echo "</div>";
            } 
    
            } else {
                echo '<div class="confirmacion">';
                echo "<p>Debe enviar el formulario para acceder a esta página.</p>";
                echo "<p><a href="contacto.php">Volver al formulario de contacto</a></p>";
                echo "</div>";
            }
    ?>
   <main class="section">
        <section>
            <img class="logo-verificacion" src="../Icons/verificado.png" alt="Confirmacion">

        </section>
    </main>

<?php require_once '../componentes/footer.php'?>