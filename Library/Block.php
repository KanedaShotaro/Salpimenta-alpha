<?php

class Block {

    public static function test() {
        if (!isset($_SESSION["usuario"])) {
          header("Location: /Salpimenta-backend/index.php");
        }
    }

    public static function usuarioDup() {

        if (isset($_SESSION["usuario"])) {

            $usuarioBd = new UsuarioBd();
            $id = $usuarioBd->obtenerIdUsuario($_SESSION["usuario"][0]->getEmail());
            $_SESSION["usuario"][0]->setIdSession($id);

            if ($_SESSION["usuario"][0]->getIdSession() == session_id()) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

}
