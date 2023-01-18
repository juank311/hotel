<?php

class DisponibilityController {
    //creacion de variables tipo private para almacenar las
    private $class_DisponibilityModel;
    private $class_DisponibilityView;

    public function __construct() {
        //Se intancias las clases (Modelo y vista)
        $this->class_DisponibilityModel = new DisponibilityModel();
        //Clase de modelo
        $this->class_DisponibilityView = new class_DisponibilityView();
        //Clase de vista
    }
    //funcion que recogerá los 3 parametros que necesita el modelo para realizar la consulta
    public function checkAvailability($startdate, $enddate, $roomType) {
        //Objeto que será enviado como un array de objeto a la vista
        $obj_Disponibility = $this->class_DisponibilityModel->Disponibilidad_models($startdate, $enddate, $roomType);
        
        $this->class_DisponibilityView->showAvailability($obj_Disponibility, $startdate);

    }
}