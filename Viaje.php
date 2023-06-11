<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $pasajeros;
    public function __construct($codigo, $destino, $cantidadMaxPasajeros) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaxPasajeros = $cantidadMaxPasajeros;
        $this->pasajeros = array();
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setCantidadMaxPasajeros($cantidadMaxPasajeros){
        $this->cantidadMaxPasajeros = $cantidadMaxPasajeros;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantidadMaxPasajeros(){
        return $this->cantidadMaxPasajeros;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    } 
    /**
     * funcion para agregar pasajeros al array de pasajeros 
     * @param string $nombre
     * @param string $apellido
     * @param int $numeroDocumento
     */
    public function agregarPasajeros($nombre,$apellido,$numeroDocumento){
        if (count($this->pasajeros) < $this->cantidadMaxPasajeros) {
            $pasajero = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "numeroDocumento" => $numeroDocumento
            );
            array_push($this->pasajeros, $pasajero);
            return true;
        } else {
            return false;
        }
    }
    public function eliminarPasajero($numeroDocumento) {
        foreach ($this->pasajeros as $key => $pasajero) {
            if ($pasajero["numeroDocumento"] == $numeroDocumento) {
                unset($this->pasajeros[$key]);
                return true;
            }
        }
        return false;
    }
    /**
     * funcion que modifica los datos de un psaajero
     * @param int $numeroDocumento
     */
    public function modificarPasajero($numeroDocumento){
    $pasajeroEncontrado = false;

    foreach ($this->pasajeros as $indice => $pasajero) {
        if ($pasajero['numeroDocumento'] == $numeroDocumento) {
            $pasajeroEncontrado = true;

            echo "Pasajero encontrado:" . " \n";
            echo "Nombre: " . $pasajero['nombre'] . " \n";
            echo "Apellido: " . $pasajero['apellido'] . " \n";
            echo "Número de documento: " . $pasajero['numeroDocumento'] . " \n";
            echo " \n";

            $nombre = readline("Ingrese el nuevo nombre del pasajero: ");
            $apellido = readline("Ingrese el nuevo apellido del pasajero: ");
            $nuevoNumeroDocumento = readline("Ingrese el nuevo número de documento del pasajero: ");

            $this->pasajeros[$indice]['nombre'] = $nombre;
            $this->pasajeros[$indice]['apellido'] = $apellido;
            $this->pasajeros[$indice]['numeroDocumento'] = $nuevoNumeroDocumento;

            echo "Pasajero modificado exitosamente." . " \n";
            echo " \n";
            break;
        }
    }

    if (!$pasajeroEncontrado){
        echo "No se encontró ningún pasajero con el número de documento proporcionado." . " \n";
        echo " \n";
    }
}
    public function mostrarInformacion()
{
    echo "Código: " . $this->codigo . "\n";
    echo "Destino: " . $this->destino . "\n";
    echo "Cantidad máxima de pasajeros: " . $this->cantidadMaxPasajeros . "\n";
    echo "Pasajeros: \n";
    foreach ($this->pasajeros as $indice => $pasajero) {
        echo "Pasajero " . ($indice + 1) . ": \n";
        echo "Nombre: " . $pasajero['nombre'] . "\n";
        echo "Apellido: " . $pasajero['apellido'] . "\n";
        echo "Número de documento: " . $pasajero['numeroDocumento'] . "\n";
        echo "\n";
    }
}
}
