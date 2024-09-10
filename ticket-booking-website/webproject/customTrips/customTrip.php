<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        /* CSS styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .image {
            text-align: center;
            margin-top: 20px;
        }

        .sections-container {
            max-width: 80%;
            margin: 0 auto;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .grid-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
</head>
<body>

<?php
// Database credentials
$servername = "sql213.infinityfree.com";
$username = "if0_36526718";
$password = "cvNrlAfszJw";
$database = "if0_36526718_silkroadtribe"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<div class="image">
    <div class="sections-container">
        <h2>City to City</h2>
        <div class="grid-container" id="section1">
            <?php
            // Fetch data from the database and display grid items
            $sql = "SELECT * FROM touringDeals"; // Replace with your actual table name
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='grid-item'>";
                    echo "<img src='" . $row['image_url'] . "' alt='" . $row['image_alt'] . "'>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</div>

<?php
// Close connection
$conn->close();
?>

</body>
</html>
