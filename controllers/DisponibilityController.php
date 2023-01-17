<?php

class DisponibilityController {
    private $disponibilityModel;
    private $disponibilityView;

    public function __construct() {
        $this->disponibilityModel = new DisponibilityModel();
        $this->disponibilityView = new DisponibilityView();
    }

    public function checkAvailability($date, $roomType) {
        $disponibility = $this->disponibilityModel->checkAvailability($date, $roomType);
        $this->disponibilityView->showAvailability($disponibility, $date);
    }
}