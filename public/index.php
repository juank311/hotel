<?php include '../init.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Reservas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">Sistema de Reservas</h1>
        <form action="index.php" method="post" class="form-inline justify-content-center">
            <div class="form-group mx-3">
                <label for="date">Fecha:</label>
                <input type="date" id="date" name="date" class="form-control">
            </div>
            <div class="form-group mx-3">
                <label for="roomType">Tipo de Habitación:</label>
                <select id="roomType" name="roomType" class="form-control">
                    <option value="1">Individual</option>
                    <option value="2">Doble</option>
                    <option value="3">Compartida</option>
                </select>
            </div>
            <input type="submit" value="Consultar disponibilidad" class="btn btn-primary">
        </form>
</div>
<?php
if (isset($_POST['date']) && isset($_POST['roomType'])) {
    $date = $_POST['date'];
    $roomType = $_POST['roomType'];
    $disponibilityController = new DisponibilityController();
    $disponibilityController->checkAvailability($date, $roomType);
} 
?>
</body>
</html>