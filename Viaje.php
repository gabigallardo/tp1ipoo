<?php
class Viaje {
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros;

    public function __construct($codigo, $destino, $maxPasajeros) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->pasajeros = array();
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }

    public function setMaxPasajeros($maxPasajeros) {
        $this->maxPasajeros = $maxPasajeros;
    }

    public function getPasajeros() {
        return $this->pasajeros;
    }
    public function agregarPasajero($nombre, $apellido, $numDoc) {
        if (count($this->pasajeros) < $this->maxPasajeros) {
            $pasajero = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "numDoc" => $numDoc
            );
            array_push($this->pasajeros, $pasajero);
            return true;
        } else {
            return false;
        }
    }

    public function eliminarPasajero($numDoc) {
        foreach ($this->pasajeros as $key => $pasajero) {
            if ($pasajero["numDoc"] == $numDoc) {
                unset($this->pasajeros[$key]);
                return true;
            }
        }
        return false;
    }
}
