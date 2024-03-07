<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Updates</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Appointment Updates</h2>

    <table>
        <thead>
            <tr>
                <th>Appointment ID</th>
                <th>Patient ID</th>
                <th>Appointment Number</th>
                <th>Schedule ID</th>
                <th>Appointment Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
            include '../connection.php'; // Assuming you have a separate file for database connection

            // Establish database connection
            $conn = new mysqli("localhost:3308", "root", "", "edoc");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch updates from the audit_track table
            $sql = "SELECT * FROM audit_track";

            // Execute the query
            $result = $conn->query($sql);

            // Check if there are any updates
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["appoid"] . "</td>";
                    echo "<td>" . $row["pid"] . "</td>";
                    echo "<td>" . $row["apponum"] . "</td>";
                    echo "<td>" . $row["scheduleid"] . "</td>";
                    echo "<td>" . $row["appodate"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No updates found</td></tr>";
            }

            // Close database connection
            $conn->close();
            ?>
        </tbody>
    </table>

</body>

</html>