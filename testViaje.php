<?php
include "Viaje.php";
$viaje = new Viaje("V001", "Bariloche", 50);

do {
    echo "===== Menú =====" . " \n";
    echo "1. Cargar información del viaje" . " \n";
    echo "2. Modificar información de los pasajeros" . " \n";
    echo "3. Ver información del viaje" . " \n";
    echo "4. Eliminar pasajeros \n";
    echo "5. Agregar Pasajeros \n";
    echo "6. Salir" . " \n";
    echo "================" . " \n";
    $opcion = readline("Ingrese una opción: ");

    switch ($opcion) {
        case '1':
            $codigo = readline("Ingrese el código del viaje: ");
            $destino = readline("Ingrese el destino del viaje: ");
            $cantidadMaxPasajeros = readline("Ingrese la cantidad máxima de pasajeros: ");
            $viaje->setCodigo($codigo);
            $viaje->setDestino($destino);
            $viaje->setCantidadMaxPasajeros($cantidadMaxPasajeros);
            echo "Información del viaje cargada exitosamente." . " \n";
            echo " \n";
            break;

        case '2':
            echo "Pasajeros actuales: " . " \n";
            $pasajeros = $viaje->getPasajeros();
            foreach ($pasajeros as $indice => $pasajero) {
                echo "Pasajero " . ($indice + 1) . ": " . $pasajero['nombre'] . " " . $pasajero['apellido'] . " \n";
            }
            echo " \n";
            $numeroDoc = readline("Ingrese el documento del pasajero a modificar: ");
            $viaje->modificarPasajero($numeroDoc);
            echo " \n";
            break;

        case '3':
            echo "Información del viaje: " . " \n";
            $viaje->mostrarInformacion();
            echo " \n";
            break;
        case '4':
            echo "Ingrese el numero de documento del pasajero a eliminar: \n";
            $numDoc = trim(fgets(STDIN));
            if($viaje->eliminarPasajero($numDoc)){
                echo "Pasajero Eliminado Correctamente \n";
            }else {
                echo "El Pasajero no ha sido eliminado \n";
            }
                break;               
        case '5':
            echo "Ingrese el nombre del nuevo Pasajero: \n";
            $nombre = trim(fgets(STDIN)) ;
            echo "Ingrese el apellido del nuevo Pasajero: \n";
            $apellido = trim(fgets(STDIN)); 
            echo "Ingrese el numero de documento del nuevo Pasajero: \n";
            $numeroDocumento = trim(fgets(STDIN));
            if ( $viaje->agregarPasajeros($nombre,$apellido,$numeroDocumento)) {
                echo "Pasajero agregado correctamente \n";
            }else {
                echo "Cantidad maxima de pasajeros superada \n" ;
            }
            break;
            
        case '6':
            echo "Saliendo..." . " \n";
            break;

        default:
            echo "Opción inválida. Por favor, ingrese una opción válida." . " \n";
            echo " \n";
            break;
    }
} while ($opcion != '6');
