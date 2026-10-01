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
    
        else {
            $nombre = htmlspecialchars($nombre);
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
    
            }
    ?>
   <main class="section">
        <section>
            <img class="logo-verificacion" src="../Icons/verificado.png" alt="Confirmacion">

        </section>
    </main>