<script type="text/javascript">

    $(document).ready(function() {
        $('#change1').click(function() {
            $('#desplegable1').slideToggle();
        });
        $('#cancel1').click(function() {
            $('#desplegable1').slideUp();
        });
        $('#change2').click(function() {
            $('#desplegable2').slideToggle();
        });
        $('#cancel2').click(function() {
            $('#desplegable2').slideUp();
        });
        $('#change3').click(function() {
            $('#desplegable3').slideToggle();
        });
        $('#cancel3').click(function() {
            $('#desplegable3').slideUp();
        });
        $('#change4').click(function() {
            $('#desplegable4').slideToggle();
        });
        $('#cancel4').click(function() {
            $('#desplegable4').slideUp();
        });
        $('#change5').click(function() {
            $('#desplegable5').slideToggle();
        });
        $('#cancel5').click(function() {
            $('#desplegable5').slideUp();
        });
    });
</script>

<div class="info-section preferencia text-preferencia">
    <div class="title-section">
        <h1>Preferencias</h1>
    </div>
</div>
<div class="panel-settings">
    <form action="/index.php?url=ajustesControler&form=completo" enctype="multipart/form-data" method="post">
        <div class="box-setting">
            <div class="title-setting">
                <h3>Foto</h3>
                <input type="button" id="change1" value="cambiar">
            </div>
            <div id="desplegable1">
                <div class="style-boxes-register"  >
                    <input type="file" name="img" >
                </div>
                <div class="submit inline">
                    <input type="button" id="cancel1" value="Cancelar"> <input type="submit" value="Modificar">
                </div>
            </div>
        </div>
        <div class="box-setting">
            <div class="title-setting">
                <h3>Datos personales</h3>
                <input type="button" id="change2" value="cambiar">
            </div>
            <div id="desplegable2">

                <div class="style-boxes-register"  >
                    <input type="text" name="nombre" value="<?= $_SESSION["usuario"][0]->getNombre() ?>" id="nombre" placeholder="Nombre de Usuario"  >
                    <input type="text" name="apellido1" value="<?= $_SESSION["usuario"][0]->getApellido1() ?>" id="apellido1" placeholder="Primer Apellido"  >
                    <input type="text" name="apellido2" value="<?= $_SESSION["usuario"][0]->getApellido2() ?>" id="apellido2" placeholder="Segundo Apellido"  >
                    <input type="text" name="platoFav" value="<?= $_SESSION["usuario"][0]->getPlatoFavorito() ?>" id="platoFav" placeholder="Tu plato favorito"  >
                    <input type="text" value="<?= $_SESSION["usuario"][0]->getFechaNacimiento() ?>" name="fecha" id="fecha">
                </div>
                <div class="submit inline">
                    <input type="button" id="cancel2" value="Cancelar"> <input type="submit" value="Modificar">
                </div>

            </div>
        </div>
        <div class="box-setting">
            <div class="title-setting">
                <h3>Cambiar email</h3>
                <input type="button" id="change3" value="cambiar">
            </div>
            <div id="desplegable3">

                <div class="style-boxes-register"  >
                    <input type="email" name="email" id="email" value="<?= $_SESSION["usuario"][0]->getEmail() ?>" placeholder="Correo Electronico"  >
                </div>
                <div class="submit inline">
                    <input type="button" id="cancel3" value="Cancelar"> <input type="submit" value="Modificar">
                </div>

            </div>
        </div>
        <div class="box-setting">
            <div class="title-setting">
                <h3>Cambiar contraseña</h3>
                <input type="button" id="change4" value="cambiar">
            </div>
            <div id="desplegable4">

                <div class="style-boxes-register"  >
                    <input type="password" name="password" id="password" placeholder="******"  required >
                </div>
                <div class="submit inline">
                    <input type="button" id="cancel4" value="Cancelar"> <input type="submit" value="Modificar">
                </div>

            </div>
        </div>
        
    </form>
    
    <div class="box-setting">
            <div class="title-setting">
                <h3>Dar de Baja</h3>
                <input type="button" id="change5" value="cambiar">
            </div>
            <div id="desplegable5">

                <div class="style-boxes-register"  >
                    <!--<input type="file" name="img" >-->
                </div>
                <div class="submit inline">
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"> <input type="submit" id="cancel5" value="Darse de Baja"> </a>
                </div>

            </div>
        </div>
</div>        


