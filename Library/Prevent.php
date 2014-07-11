<?php

/*
 * La clase Prevent crea un objeto que puede bloquear durante un tiempo dado la accion a ejecutarse.
 * El constructor pide como parametros el tiempo de espera, en caso de bloqueo, y opcionalmente los intentos permitidos de error.
 * 
 * El metodo tiempoRestante() devuelve la diferencia entre el tiempo de bloqueo y el tiempo transcurrido desde que se bloqueo.
 * 
 * El metodo sumarIntento() suma un intento cada vez que se vuelve a repetir la accion.Si los intentos posibles
 * han sido superados crea la session "tiempoTranscurrido" y devuelve false.
 * 
 * El metodoActivarTiempoTranscurrido activa el tiempo de espera para que el bloqueo se detenga.
 * 
 * hay algunos metodos mas que borran las variables session creadas por la clase prevent.
 * 
 * en caso de usar un objeto prevent, cuando el resultado es exitoso hay que borrar las variables session con los 
 * metodos correspondientes.
 * 
 */

class Prevent {

    protected $intentosPermitidos;
    protected $tiempoEspera;
    protected $intentosRealizados = 0;

    function __construct($tiempoEspera, $intentosPermitidos = null) {

        if (!isset($_SESSION["uri"])) {
            $_SESSION["uri"] = $_SERVER['REQUEST_URI'];
        } else {
            if ($_SESSION["uri"] != $_SERVER['REQUEST_URI']) {
                $this->borrarSesiones();
                unset($_SESSION["uri"]);
            }
        }

        if (!isset($_SESSION['intentos'])) {
            $intentos = 0;
            $_SESSION['intentos'] = $intentos;
        } else {
            $this->intentosRealizados = $_SESSION['intentos'];
        }

        $this->intentosPermitidos = $intentosPermitidos;
        $this->tiempoEspera = $tiempoEspera;
    }

    public function getIntentosPermitidos() {
        return $this->intentosPermitidos;
    }

    public function getTiempoEspera() {
        return $this->tiempoEspera;
    }

    public function getIntentosRealizados() {
        return $this->intentosRealizados;
    }

    public function tiempoRestante() {

        $tiempoEspera = $this->getTiempoEspera();

        if (isset($_SESSION['tiempoTranscurrido'])) {
            $tiempoTranscurrido = $_SESSION['tiempoTranscurrido'];
            $tiempoActual = time() - $tiempoTranscurrido;
            if ($tiempoActual < $tiempoEspera) {
                $tiempoRestante = $tiempoEspera - $tiempoActual;
                return $tiempoRestante;
            } else {
                $tiempoRestante = 0;
                unset($_SESSION['tiempoTranscurrido'], $_SESSION['intentos']);
                $this->intentosRealizados = 0;
                return $tiempoRestante;
            }
        } else {
            return 0;
        }
    }

    public function sumarIntento() {

        $this->intentosRealizados++;
        $_SESSION['intentos'] = $this->intentosRealizados;
        if ($this->intentosRealizados >= $this->intentosPermitidos) {
            $_SESSION['tiempoTranscurrido'] = time();
            return false;
        }
        return true;
    }

    public function activarTiempoTranscurrido() {
        $_SESSION['tiempoTranscurrido'] = time();
    }

    public function borrarSesiones() {
        unset($_SESSION['tiempoTranscurrido'], $_SESSION['intentos']);
        $this->intentosRealizados = 0;
    }

    public function borrarIntentosSession() {
        unset($_SESSION['intentos']);
        $this->intentosRealizados = 0;
    }

}
