<?php
// MySQL database credentials
$hostname = "sql213.infinityfree.com";
$username = "if0_36526718";
$password = "cvNrlAfszJw";
$database = "if0_36526718_silkroadtribe";
$port = 3306;

try {
    $dsn = "mysql:host=$hostname;dbname=$database;port=$port";
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cnic = htmlspecialchars($_POST['cnic']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $busID = $_POST['busID'];
    $fromDestination = $_POST['fromDestination'];
    $toDestination = $_POST['toDestination'];
    $bookedSeats = $_POST['bookedSeats'];
    $paymentType = $_POST['paymentType'];
    $amountPaid = $_POST['amountPaid'];

    // Sanitize and validate CNIC 
    if (!is_numeric($cnic) || strlen($cnic) != 13) {
        echo "Invalid CNIC format!";
        exit; // Stop further execution
    }

    // Set cookies for first name, last name, and CNIC
    setcookie("firstName", $firstName, time() + (86400 * 30), "/ticketBooking.php"); // 86400 = 1 day
    setcookie("lastName", $lastName, time() + (86400 * 30), "/ticketBooking.php");
    setcookie("cnic", $cnic, time() + (86400 * 30), "/ticketBooking.php");

    $sql = "INSERT INTO ticketBooking (firstName, lastName, bookedSeats, paymentType, amountPaid, busID, toDestination, fromDestination, cnic) 
        VALUES ('$firstName', '$lastName', '$bookedSeats', '$paymentType', '$amountPaid', '$busID', '$toDestination', '$fromDestination','$cnic')";

    try {
        $pdo->exec($sql);
        
        // If insertion is successful, redirect to confirmation page
        header("Location: ticketCon.php");
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == '23000') {
            echo "Error: Duplicate entry. Please provide unique values for the primary key.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
