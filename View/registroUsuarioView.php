
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <h1>SalPimenta.net</h1>
        <fieldset>
            <legend>Registro de Usuario</legend>
            <form action="/Salpimenta-backend/index.php?url=registroUsuarioControler" method="post">
                <input type="hidden" name="regus" value="regus">
                <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" placeholder="Nombre de Usuario"  ><br/>
                <label for="apellido1">Apellido1: </label><input type="text" name="apellido1" id="apellido1" placeholder="Primer Apellido"  ><br/>
                <label for="apellido2">Apellido2: </label><input type="text" name="apellido2" id="apellido2" placeholder="Segundo Apellido"  ><br/>
                <label for="password">Contraseña: </label><input type="password" name="password" id="password" placeholder="******"  ><br/>
                <label for="email">Email: </label><input type="email" name="email" id="email" placeholder="Correo Electronico"  ><br>
                <label for="platoFav">Plato favorito: </label><input type="text" name="platoFav" id="platoFav" placeholder="Tu plato favorito"  ><br/>
                <label for="fecha">Fecha de Nacimiento: </label><input type="date" name="fecha" id="fecha"><br/>
                <input type="submit" value="Registrate !">
            </form>
        </fieldset>
    </body>
</html>
