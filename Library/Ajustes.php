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

        $usuario->updateUsuario($nombre, $apellido1, $apellido2, $password, $email, $fechaNacimiento, $platoFav, $img);

        if ($usuarioBd->updateUsuario($usuario)) {
            $_SESSION["usuario"][0] = $usuario;
            AlertAction::create("success", "OK", "Tus datos han sido actualizados");
            $request = new Request("homeControler");
            $request->execute();
        } else {
            AlertAction::create("danger", "ERROR", "Datos no actualizados");
            $request = new Request("homeControler");
            $request->execute();
        }
    }

}
