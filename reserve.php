<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Restoran</title>
</head>
<body>
    <h1>Form Reservasi Restoran</h1>
    <form action="process_reservation.php" method="POST">
        <label for="person">Jumlah Orang:</label>
        <input type="number" id="person" name="person" required><br><br>
        
        <label for="date">Tanggal Reservasi:</label>
        <input type="date" id="date" name="date" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
