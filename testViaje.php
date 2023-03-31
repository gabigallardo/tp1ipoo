<?php
require_once 'Viaje.php';

$viaje = new Viaje("VF1", "San Martin", 100);

while (true) {
    echo "Ingrese una opción:\n";
    echo "1) Ver datos del viaje\n";
    echo "2) Modificar código del viaje\n";
    echo "3) Modificar destino de viaje\n";
    echo "4) Modificar cantidad máxima de pasajeros\n";
    echo "5) Agregar pasajero\n";
    echo "6) Eliminar pasajero\n";
    echo "0) Salir\n";
    
    $opcion = readline();

    switch ($opcion) {
        case "1":
            echo "Código del viaje: " . $viaje->getCodigo() . "\n";
            echo "Destino: " . $viaje->getDestino() . "\n";
            echo "Cantidad máxima de pasajeros: " . $viaje->getMaxPasajeros() . "\n";
            echo "Pasajeros:\n";
            $pasajeros = $viaje->getPasajeros();
            foreach ($pasajeros as $pasajero) {
                echo $pasajero["nombre"] . " " . $pasajero["apellido"] . " (" . $pasajero["numDoc"] . ")\n";
            }
            break;
        case "2":
            echo "Ingrese el nuevo código del viaje:\n";
            $codigo = readline();
            $viaje->setCodigo($codigo);
            echo "Código modificado con éxito\n";
            break;
        case "3":
            echo "Ingrese el nuevo destino del viaje:\n";
            $destino = readline();
            $viaje->setDestino($destino);
            echo "Destino modificado con éxito\n";
            break;
        case "4":
            echo "Ingrese la nueva cantidad máxima de pasajeros:\n";
            $maxPasajeros = readline();
            $viaje->setMaxPasajeros($maxPasajeros);
            echo "Cantidad máxima de pasajeros modificada con éxito\n";
            break;
        case "5":
            echo "Ingrese el nombre del pasajero:\n";
            $nombre = readline();
            echo "Ingrese el apellido del pasajero:\n";
            $apellido = readline();
            echo "Ingrese el número de documento del pasajero:\n";
            $numDoc = readline();
            if ($viaje->agregarPasajero($nombre, $apellido, $numDoc)) {
                echo "Pasajero agregado con éxito\n";
            } else {
                echo "No se pudo agregar al pasajero. El límite de pasajeros ha sido alcanzado.\n";
            }
            break;
        case "6":
            echo "Ingrese el número de documento del pasajero a eliminar:\n";
            $numDoc = readline();
            if ($viaje->eliminarPasajero($numDoc)) {
                echo "Pasajero eliminado con éxito\n";
            } else {
                echo "No se pudo eliminar al pasajero. El pasajero no se encontró en la lista.\n";
            }
            break;
        case "0":
            echo "Adiós!\n";
            exit();
        default:
            echo "Opción inválida. Intente nuevamente\n";
            break;
    }
}

