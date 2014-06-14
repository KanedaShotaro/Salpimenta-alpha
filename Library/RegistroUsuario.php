<?php

class Registrousuario {

    protected $usuarioBd;
    protected $usuario;

    function __construct($vars = array()) {
        extract($vars);
        $this->usuarioBd = new UsuarioBd();
        $this->usuario = new Usuario();
        $this->usuario->newUsuario($nombre, $apellido1, $apellido2, $password, $email, $fechaNacimiento, $platoFavorito, $img);
    }

    public function getUsuarioBd() {
        return $this->usuarioBd;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function execute() {
        $usuarioBd = $this->getUsuarioBd();
        $usuario = $this->getUsuario();
        
        if ($usuarioBd->insertarUsuario($usuario)) {
            $_SESSION['usuario'][0] = $usuario;
            new NewAlert("success", "Bienvenido!",' '.$usuario->getNombre().', gracias por haberte registrado en SalPimenta!');
            $request = new Request("home");
            $request->execute();
        } else {
            new NewAlert("danger", "error", "El usuario ya existe!");
            include "/View/registroUsuarioView.php";
        }
    }

}
