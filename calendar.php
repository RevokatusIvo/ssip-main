<!DOCTYPE html>
<html>

<head>
    <title>Booking Calendar</title>
    <style>
        .calendar {
            width: 400px;
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
    }

    // Handling form submission for adding/editing/deleting bookings
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "add") {
                $booking_date = $_POST['booking_date'];
                $booking_time = $_POST['booking_time'];
                $booking_name = $_POST['booking_name'];

                // Check if booking date is in the future
                $current_date = date("Y-m-d");
                if ($booking_date < $current_date) {
                    echo "<p>Maaf, Anda tidak dapat memesan pada tanggal yang sudah berlalu.</p>";
                } else {
                    $sql = "INSERT INTO bookings (booking_date, booking_time, booking_name) VALUES ('$booking_date', '$booking_time', '$booking_name')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Booking berhasil ditambahkan.</p>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            } elseif ($_POST['action'] == "edit") {
                header("Location: edit_booking.php?id=" . $_POST['booking_id']);
            } elseif ($_POST['action'] == "delete") {
                $booking_id = $_POST['booking_id'];

                $sql = "DELETE FROM bookings WHERE id='$booking_id'";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Booking berhasil dihapus.</p>";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }
        }
    }

    ?>

    <h2>Booking Calendar</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="action" value="add">
        <label for="booking_date">Tanggal:</label>
        <input type="date" id="booking_date" name="booking_date" min="<?php echo date("Y-m-d"); ?>" required><br><br>
        <label for="booking_time">Waktu:</label>
        <input type="time" id="booking_time" name="booking_time" required><br><br>
        <label for="booking_name">Nama:</label>
        <input type="text" id="booking_name" name="booking_name" required><br><br>
        <input type="submit" value="Tambah Booking">
    </form>

    <h3>Jadwal Booking</h3>
    <table class="calendar">
        <tr>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
        <?php
        // Retrieve bookings from database
        $sql = "SELECT id, booking_date, booking_time, booking_name FROM bookings";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["booking_date"] . "</td><td>" . $row["booking_time"] . "</td><td>" . $row["booking_name"] . "</td>";
                echo "<td>";
                echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                echo "<input type='hidden' name='action' value='edit'>";
                echo "<input type='hidden' name='booking_id' value='" . $row["id"] . "'>";
                echo "<input type='hidden' name='booking_date' value='" . $row["booking_date"] . "'>";
                echo "<input type='hidden' name='booking_time' value='" . $row["booking_time"] . "'>";
                echo "<input type='hidden' name='booking_name' value='" . $row["booking_name"] . "'>";
                echo "<input type='submit' value='Edit'>";
                echo "</form>";
                echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                echo "<input type='hidden' name='action' value='delete'>";
                echo "<input type='hidden' name='booking_id' value='" . $row["id"] . "'>";
                echo "<input type='submit' value='Delete'>";
                echo "</form>";
                echo "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada booking tersedia.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

</body>

</html>