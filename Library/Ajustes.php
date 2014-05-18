<?php

class Ajustes {

    protected $vars;
    protected $usuarioBd;

    function __construct($vars = array()) {
        $this->vars = $vars;
        $this->usuarioBd = new UsuarioBd();
    }

    public function getVars() {
        return $this->vars;
    }

    public function getUsuarioBd() {
        return $this->usuarioBd;
    }

    public function execute() {
        $usuarioBd = $this->getUsuarioBd();
        $vars = $this->getVars();
        extract($vars);
        

        $usuario = new Usuario();
        $usuario = $_SESSION["usuario"][0];

        $usuario->updateUsuario($nombre, $apellido1, $apellido2, $password, $email, $fechaNacimiento, $platoFav);
        $usuario->introducirImg($img);
        if ($usuarioBd->updateUsuario($usuario)) {
            $_SESSION["usuario"][0] = $usuario;
            $request = new Request("homeControler");
            $request->execute();
        }
    }

}
