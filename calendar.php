<!DOCTYPE html>
<html>

<head>
    <title>Booking Calendar</title>
    <style>
        .calendar {
            width: 300px;
            border-collapse: collapse;
        }

        .calendar td {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    // Database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ssip_db';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };

    // Handling form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $booking_date = $_POST['booking_date'];
        $booking_time = $_POST['booking_time'];
        $booking_name = $_POST['booking_name'];

        $sql = "INSERT INTO bookings (booking_date, booking_time, booking_name) VALUES ('$booking_date', '$booking_time', '$booking_name')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Booking berhasil.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    ?>

    <h2>Booking Calendar</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="booking_date">Tanggal:</label>
        <input type="date" id="booking_date" name="booking_date" required><br><br>
        <label for="booking_time">Waktu:</label>
        <input type="time" id="booking_time" name="booking_time" required><br><br>
        <label for="booking_name">Nama:</label>
        <input type="text" id="booking_name" name="booking_name" required><br><br>
        <input type="submit" value="Book">
    </form>

    <h3>Jadwal Booking</h3>
    <table class="calendar">
        <tr>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Nama</th>
        </tr>
        <?php
        // Retrieve bookings from database
        $sql = "SELECT booking_date, booking_time, booking_name FROM bookings";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["booking_date"] . "</td><td>" . $row["booking_time"] . "</td><td>" . $row["booking_name"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada booking tersedia.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

</body>

</html>