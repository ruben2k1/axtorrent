<form action="app/controllers/processContacto.php" method="post" class="contact-form" align="center">
    <label for="nombre"><i class="bi bi-person-vcard"></i></label><br>
    <input type="text" name="nombre" class="input-text" maxlength="25" required placeholder="Nombre"><br>
    <label for="correo"><i class="bi bi-envelope"></i></label><br>
    <input type="email" name="correo" class="input-text" maxlength="50" required placeholder="Correo electrónico"><br>
    <label for="mensaje"><i class="bi bi-chat-dots"></i></label><br>
    <textarea name="mensaje" class="input-text" cols="50" rows="10" maxlength="200" required></textarea><br>
    <button type="submit" class="btn-form"><i class="bi bi-send-check"></i></button>
</form>