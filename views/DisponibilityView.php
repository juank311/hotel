<?php
class DisponibilityView {
    public function showAvailability($disponibility) {
        echo '<table class="table">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th scope="col">ID Tipo Habitacion</th>';
        echo '<th scope="col">Fecha Inicial</th>';
        echo '<th scope="col">Fecha final</th>';
        echo '<th scope="col">Numero de habitaciones</th>';
        echo '<th scope="col">Numero de reservas</th>';
        echo '<th scope="col">Habitaciones disponibles</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($disponibility as $row) {
            echo '<tr>';
            echo "<td>" . $row['room_type_id'] . "</td>";
            echo "<td>" . $row['startdate'] . "</td>";
            echo "<td>" . $row['enddate'] . "</td>";
            echo "<td>" . $row['num_of_rooms'] . "</td>";
            echo "<td>" . $row['num_of_reservations'] . "</td>";
            echo "<td>" . $row['available_rooms'] . "</td>";
            echo '</tr>';
        }
        echo '</tbody>';
echo '</table>';
}
}