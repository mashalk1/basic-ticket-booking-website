<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        /* CSS styles for the header/navbar */
        .navbar {
            display: flex;
            align-items: center; /* Center content vertically */
            padding: 20px;
            gap: 10px;
            font-family: 'Courier New', Courier, monospace;
            font-size: large;
            background-color: rgba(255, 255, 255, 0.8); /* Background color with opacity */
            backdrop-filter: blur(10px); /* Apply blur effect */
            position: relative; /* Position relative to allow absolute positioning for border */
        }

        .navbar::after {
            content: ''; /* Required for the ::after pseudo-element */
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%; /* Stretch from left to right */
            height: 2px; /* Border thickness */
            background-color: rgba(0, 0, 0, 0.1); /* Border color */
        }

        .navbar a:hover {
            color: blue; /* Change color on hover */
        }

        .navbar img {
            max-width: 120px; 
            height: auto; 
            margin-right: 20px; 
            margin-left: 5px;
            transform: scale(2.1); 
        }

        .navbar ul {
            display: flex;
            padding: 0;
            list-style-type: none;
            justify-content: center; 
            flex-grow: 1; 
        }

        .navbar li {
            margin-right: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <img src="logo.png" alt="Logo">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="busTickets/ticketBooking.php" id="busTicket">City to City</a></li>
        <li><a href="trips/customTrip.php">Trips</a></li>
        <li><a href="About.php">About</a></li>
        <li><a href="TermsAndConditions.php">Terms and Conditions</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>
