    <?php require_once '../componentes/header.php'; ?>

    <h1>Contacto</h1>
    <form action="Confirmacion.php">
    
    <main>
        <fieldset class="transparencia">
            <legend class="contacto">Deja tus opiniones</legend>
            <div class="input">
                <label for="nombre">Nombre Completo</label>
                <input minlength="2" maxlength="25"   type="text" id="Nombre" name="nombre_usuario" placeholder="Ej: Swan" required >
            </div>
            <div class="input">
                <label for="nombre">Correo Electronico</label>
                <input type="text" id="email" name="email" placeholder="Ingrese su Correo">
            </div>
             <div class="input">
                <label for="contacto">Motivo de contacto</label>

                <select name="contacto" id="Motivo_de_contacto">
                <option value=""disabled selected>Elija una opcion de contacto</option>
                <option value="Sugerencia">Aportar una curiosidad</option>
                <option value="error">Reportar error en la web</option>
                <option value="unirse">Unirse a los Warriors</option>
                </select>
                    
            </div>
            <div class="input"> 
                <label for="mensaje">Mensaje </label>
                <textarea name="mensaje_usuario" id="mensaje" rows="6" placeholder="Ingrese su consulta"></textarea>
            </div>
            <div class="botones"> 
             <input type="submit" value="Enviar">   
            </div>
        </fieldset>
    </form>    
    </main>
