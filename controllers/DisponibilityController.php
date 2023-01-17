<?php

class DisponibilityController {
    private $disponibilityModel;
    private $disponibilityView;

    public function __construct() {
        $this->disponibilityModel = new DisponibilityModel();
        $this->disponibilityView = new DisponibilityView();
    }

    public function checkAvailability($startdate, $enddate, $roomType) {
        $disponibility = $this->disponibilityModel->checkAvailability($startdate, $enddate, $roomType);
        $this->disponibilityView->showAvailability($disponibility, $startdate);
    }
}