<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>SalPimenta.net</h1>
        <fieldset>
            <legend>Entra</legend>
            <form action="/Salpimenta-backend/index.php?url=loginUsuario" method="POST">
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
</html>-->

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title></title>

        <link rel="stylesheet" href="/Salpimenta-backend/View/css/bootstrap.min.css">
         <link rel="stylesheet" href="/Salpimenta-backend/View/css/signin.css">



    </head>

    <body>

        <div class="container">

            <form action="/Salpimenta-backend/index.php?url=loginUsuario" method="POST" class="form-signin" role="form">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="email" class="form-control" placeholder="Email address" name="email" id="email" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

        </div> 
    </body>
</html>