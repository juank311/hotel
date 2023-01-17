<?php include '../init.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistema de Reservas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        
        <h1 class="text-center my-5">Sistema de Reservas</h1>
        <form action="index.php" method="post" class="form-inline justify-content-center">
            <div class="form-group mx-3">
                <label for="date">Fecha Inicio:</label>
                <input type="date" id="startdate" name="startdate" class="form-control">
            </div>
            <div class="form-group mx-3">
                <label for="date">Fecha Final:</label>
                <input type="date" id="enddate" name="enddate" class="form-control">
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
        <br>
    </div>
    <?php
    if (isset($_POST['startdate']) && isset($_POST['roomType']) && isset($_POST['enddate'])) {
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $roomType = $_POST['roomType'];
        $disponibilityController = new DisponibilityController();
        $disponibilityController->checkAvailability($startdate, $enddate, $roomType);
    }
    ?>
</body>

</html>