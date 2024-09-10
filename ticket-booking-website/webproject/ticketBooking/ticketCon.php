<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Ticket</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    padding: 20px;
    margin: 0;
}

#ticket {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

h2 {
    text-align: center;
    color: #333;
}

p {
    margin: 10px 0;
}

.ticket-info {
    border-top: 1px solid #ccc;
    padding-top: 10px;
    margin-top: 10px;
}

/* Responsive Styles */
@media screen and (max-width: 480px) {
    #ticket {
        max-width: 90%;
    }
}

    </style>
</head>
<body>
    <div id="ticket">
        <h2>Silk Road Tribe Bus Ticket</h2>
        <div class="ticket-info">
            <?php
            // MySQL database credentials
            $hostname = "sql213.infinityfree.com";
            $username = "if0_36526718";
            $password = "cvNrlAfszJw";
            $database = "if0_36526718_silkroadtribe";
            $port = 3306;

            try {
                // Create a new PDO instance
                $dsn = "mysql:host=$hostname;dbname=$database;port=$port";
                $pdo = new PDO($dsn, $username, $password);

                // Set PDO to throw exceptions on errors
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // SQL query to select the bottom-most row from the ticketBooking table
                $sql = "SELECT * FROM ticketBooking ORDER BY cnic DESC LIMIT 1";

                // Prepare and execute the query
                $stmt = $pdo->query($sql);

                // Fetch the row as an associative array
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Display the row data using HTML
                if ($row) {
                    echo "<p>First Name: " . $row['firstName'] . "</p>";
                    echo "<p>Last Name: " . $row['lastName'] . "</p>";
                    echo "<p>From: " . $row['fromDestination'] . "</p>";
                    echo "<p>To: " . $row['toDestination'] . "</p>";
                    echo "<p>Fare: " . $row['amountPaid'] . "</p>";
                    echo "Payment Type:". $row['paymentType']."</p>";
                } else {
                    echo "<p>No ticket found.</p>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </div>
    </div>
</body>
</html>
