<?php

require_once '../models/AppointmentModel.php';

class AppointmentController
{
    private $appointmentModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
    }

    public function obtenerCitas(){
        return $this->appointmentModel->obtenerDatosCitas();
    }

    public function obtenerCitasHoy() {
        return $this->appointmentModel->obtenerDatosCitasHoy();
    }

    public function obtenerCitasUsuario($DNI) {
        return $this->appointmentModel->obtenerDatosCitasUsuario($DNI);
    }

}

?>