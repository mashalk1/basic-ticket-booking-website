<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Reservation Form</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 20px;
}

h2 {
    margin-top: 10%;
    text-align: center;
    color: #333;
}

form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333;
}

input[type="text"],
input[type="number"],
select {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="number"]:focus,
select:focus {
    outline: none;
    border-color: #007bff;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.total-amount {
    margin-top: 10px;
    font-size: 18px;
    text-align: center;
}

/* Media Queries */
@media only screen and (max-width: 768px) {
    form {
        max-width: 80%;
    }
}

@media only screen and (max-width: 480px) {
    form {
        padding: 15px;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: calc(100% - 10px);
        padding: 8px;
        margin-bottom: 8px;
    }
}

    </style>
</head>
<body>
<h2>Bus Reservation Form</h2>
<form id="reservationForm" action="ticketProcess.php" method="POST" onsubmit="return validateForm()">
    <label for="cnic">CNIC:</label><br>
    <input type="text" id="cnic" name="cnic" required><br><br>

    <label for="firstName">First Name:</label><br>
    <input type="text" id="firstName" name="firstName" required><br><br>

    <label for="lastName">Last Name:</label><br>
    <input type="text" id="lastName" name="lastName" required><br><br>

    <label for="busID">Bus ID:</label><br>
    <input type="text" id="busID" name="busID" required><br><br>

    <label for="fromDestination">From Destination:</label><br>
    <select id="fromDestination" name="fromDestination" required>
        <option value="">Select From Destination</option>
        <option value="Peshawar">Peshawar</option>
        <option value="Islamabad">Islamabad</option>
        <option value="Quetta">Quetta</option>
        <option value="Lahore">Lahore</option>
        <option value="Karachi">Karachi</option>
        <option value="Faisalabad">Faisalabad</option>
    </select><br><br>

    <label for="toDestination">To Destination:</label><br>
    <select id="toDestination" name="toDestination" required>
        <option value="">Select To Destination</option>
        <option value="Islamabad">Islamabad</option>
        <option value="Quetta">Quetta</option>
        <option value="Lahore">Lahore</option>
        <option value="Karachi">Karachi</option>
        <option value="Faisalabad">Faisalabad</option>
        <option value="Peshawar">Peshawar</option>
    </select><br><br>

    <label for="bookedSeats">Number of Seats (1-3):</label><br>
    <input type="number" id="bookedSeats" name="bookedSeats" min="1" max="3" required><br><br>

    <label for="paymentType">Payment Type:</label><br>
    <select id="paymentType" name="paymentType" required>
        <option value="">Select Payment Type</option>
        <option value="Cash">Cash</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
    </select><br><br>

    <label for="agreeTnC">
        <input type="checkbox" id="agreeTnC" name="agreeTnC" required>
        I agree to the Terms and Conditions
    </label><br><br>

    <label for="departureTime">Departure Time:</label><br>
    <input type="radio" id="1pm" name="departureTime" value="1pm"> 1pm
    <input type="radio" id="2pm" name="departureTime" value="2pm"> 2pm
    <input type="radio" id="3pm" name="departureTime" value="3pm"> 3pm
    <input type="radio" id="4pm" name="departureTime" value="4pm"> 4pm
    <br><br>

    <label for="availableSeats">Available Seats:</label><br>
    <input type="text" id="availableSeats" name="availableSeats" value="30" readonly><br><br>

    <label for="amountPaid">Total Amount (PKR):</label><br>
    <input type="text" id="amountPaid" name="amountPaid" readonly><br><br>

    <input type="submit" value="Pay">
</form>

<script>

    function validateForm() {
        var agreeTnC = document.getElementById('agreeTnC');
        var fromDestination = document.getElementById('fromDestination').value;
        var toDestination = document.getElementById('toDestination').value;

        if (!agreeTnC.checked) {
            alert("Please agree to the Terms and Conditions to proceed.");
            return false;
        }

        if (fromDestination === toDestination) {
            alert("From and To destinations cannot be the same.");
            return false;
        }

        return validateSeats(); // Call the seats validation function
    }

    function validateSeats() {
        var bookedSeats = document.getElementById('bookedSeats').value;
        if (bookedSeats < 1 || bookedSeats > 3) {
            alert("Please enter a number of seats between 1 and 3.");
            return false;
        }
        return true;
    }

    function getCurrentDateTime() {
        var now = new Date();
        var date = now.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        var time = now.toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
        return date + ' ' + time;
    }

    // This event listener calculates the total amount based on the number of seats selected
    document.getElementById('bookedSeats').addEventListener('change', function() {
        var seats = parseInt(this.value);
        var fare = 5000;
        var totalAmount = seats * fare;
        document.getElementById('amountPaid').value = totalAmount;
    });

    window.onload = function() {
        var currentTime = getCurrentDateTime();
        alert("Current Date and Time: " + currentTime);
    };

    // Decrement available seats on reservation
    document.getElementById('bookedSeats').addEventListener('change', function() {
        var availableSeats = document.getElementById('availableSeats');
        var currentSeats = parseInt(availableSeats.value);
        var reservedSeats = parseInt(this.value);
        var remainingSeats = currentSeats - reservedSeats;
        availableSeats.value = remainingSeats;
    });
</script>
</body>
</html>
