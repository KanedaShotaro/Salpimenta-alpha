<?php

class Registrousuario {

    protected $usuarioBd;
    protected $usuario;

    function __construct($vars = array()) {
        extract($vars);
        $this->usuarioBd = new UsuarioBd();
        $this->usuario = new Usuario();
        $this->usuario->newUsuario($nombre, $apellido1, $apellido2, $password, $email, $fechaNacimiento, $platoFavorito);
    }

    public function getUsuarioBd() {
        return $this->usuarioBd;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function execute() {
        $usuarioBd = $this->getUsuarioBd();
        $usuario = $this->usuario;

        if ($usuarioBd->insertarUsuario($usuario)) {
            $_SESSION['usuario'][0] = $usuario;
            $view = new View("homeView");
            $view->execute();
        } else {
            //alerts("danger", "Error", "Usuario no introducido");
            $view = new View("registroUsuarioView");
            $view->execute();
        }
    }

}
