<?php
echo "homeView.php/";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>SalPimenta.net</h1>
        <fieldset>
            <legend>Entra</legend>
            <form action="/Salpimenta-backend/mvc/Controler/index.php?url=loginUsuario" method="POST">
                <table>
                    <tr>
                        <td><label for="email">Correo Electronico: </label></td>
                        <td><input type="email" name="email" id="email" ></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Entrar"></td>
                    </tr>
                </table>
            </form>          
        </fieldset>
    </body>
</html>
