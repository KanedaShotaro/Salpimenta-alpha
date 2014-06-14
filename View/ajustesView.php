
<fieldset>
    <legend>Registro de Usuario</legend>
    <form action="/index.php?url=ajustesControler&form=completo" enctype="multipart/form-data" method="post">
        <input type="hidden" name="regus" value="regus">
        <label for="img">Sube tu Imagen: </label><input type="file" name="img" id="img"><br/>
        <label for="nombre"> Cambiar Nombre: </label><input type="text" name="nombre" value="<?= $_SESSION["usuario"][0]->getNombre()?>" id="nombre" placeholder="Nombre de Usuario"  ><br/>
        <label for="apellido1">Cambiar Apellido1: </label><input type="text" name="apellido1" value="<?= $_SESSION["usuario"][0]->getApellido1()?>" id="apellido1" placeholder="Primer Apellido"  ><br/>
        <label for="apellido2">Cambiar Apellido2: </label><input type="text" name="apellido2" value="<?= $_SESSION["usuario"][0]->getApellido2()?>" id="apellido2" placeholder="Segundo Apellido"  ><br/>
        <label for="password"> Cambiar Contraseña: </label><input type="password" name="password" id="password" placeholder="******"  required ><br/>
        <label for="email"> Cambiar Email: </label><input type="email" name="email" id="email" value="<?= $_SESSION["usuario"][0]->getEmail()?>" placeholder="Correo Electronico"  ><br>
        <label for="platoFav"> cambiar Plato favorito: </label><input type="text" name="platoFav" value="<?= $_SESSION["usuario"][0]->getPlatoFavorito()?>" id="platoFav" placeholder="Tu plato favorito"  ><br/>
        <label for="fecha">Cambiar Fecha de Nacimiento: </label><input type="text" value="<?= $_SESSION["usuario"][0]->getFechaNacimiento()?>" name="fecha" id="fecha"><br/>
        <a href="/index.php"><input type="button" class="bg-warning" value="Cancelar"></a> <input type="submit" value="Registrar Cambios">
    </form>
</fieldset>

