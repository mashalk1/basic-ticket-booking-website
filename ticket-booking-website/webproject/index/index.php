            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Homepage</title>

                <style>
                body {
                    margin: 0;
                    padding: 0;
                }

                .sections-container {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    max-width: 80%;
                    margin-top: 30%;
                    
                }


                .sections-container h2 {
                    margin-left: -20%;
                    font-size: 28px;
                    align-items: flex-end;
                    font-family: 'Roboto', sans-serif; 
                    border:2px;
                }

                .grid-container {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    gap: 30px;
                    padding-top: 1%;
                    overflow: hidden;
                    margin-bottom: 5%;
                    margin-left: 30%;
                    transition: transform 0.5s ease; 
                }

                .grid-item {
                    position: relative;
                    border-radius: 8px;
                    overflow: hidden;
                    height: 250px;
                }

                .tagline {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    background: linear-gradient(to top, rgba(23, 12, 26, 0.935) 0%, rgba(15, 22, 59, 0) 100%);
                    color: rgb(241, 211, 211);
                    padding: 5px;
                    box-sizing: border-box;
                    text-align: center;
                    font-size: 20px;
                    font-weight: bold;
                    font-family: 'Roboto', sans-serif;
                }

                .grid-item img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .middle-pic {
                    display: flex;
                    justify-content: flex-start;
                    margin-left: 18%;
                    margin-bottom: 5%;
                    border-radius: 8px;
                    overflow: hidden;
                    height: 500px;
                    width: 90%;
                }

                .middle-pic img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .navbar {
            display: flex;
            align-items: center;
            padding: 20px;
            gap:10px;
            font-family: 'Courier New', Courier, monospace;
            font-size: large;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px); 
            position: relative; 
        }

        .navbar::after {
            content: ''; 
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%; 
            height: 2px;
            background-color: rgba(0, 0, 0, 0.1); 
        }

        .navbar a:hover {
            color: blue;
        }

        .navbar img {
        max-width: 120px; 
        height: auto; 
        margin-right: 20px;
        margin-left:5px;
        transform: scale(2.1); 
    }

        .navbar ul {
            display: flex;
            padding: 0;
            list-style-type: none;
            justify-content: center; 
            margin: 0; 
            flex-grow: 1; 
        }

        .navbar li {
            margin-right: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: black;
        }


    /* Media queries */
    @media only screen and (max-width: 1024px) {
        .grid-item {
            height: 250px;
        }
    }

    @media only screen and (max-width: 768px) {
        .grid-item {
            min-height: 200px;
            max-height: 200px;
            min-width: 150px;
            max-width: 150px;
        }

        .middle-pic {
            margin-left: 5%; 
            height: 300px; 
        }
    }

    @media only screen and (max-width: 480px) {
        .sections-container {
            max-width: 90%;
            margin-top: 20%;
            margin-bottom: 20%;
        }

        .sections-container h2 {
            font-size: 24px; 
            margin-left: 0; 
        }

        .grid-container {
            grid-template-columns: repeat(2, 1fr); 
            margin-left: 5%;
        }

        .grid-item {
            min-height: 150px; 
            max-height: 150px; 
            min-width: 100px;
            max-width: 100px; 
        }
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

                <div class="image">


                <div class="sections-container">
                    
                    <h2>City to City</h2>
                    <div class="grid-container" id="section1">
                        <!-- Grid items for section 1 -->
                        <div class="grid-item" id="peshawar">
                            <img src="/cities/peshawar.png" alt="Image 1">
                            <div class="tagline">Peshawar</div>
                        </div>
                        <div class="grid-item" id="islamabad">
                            <img src="/cities/islamabad.png" alt="Image 2">
                            <div class="tagline">Islamabad</div>
                        </div>  
                        <div class="grid-item" id="lahore">
                            <img src="/cities/lahore.png" alt="Image 3">
                            <div class="tagline">Lahore</div>
                        </div>
                        <div class="grid-item" id="karachi">
                            <img src="/cities/karachi.png" alt="Image 4">
                            <div class="tagline">Karachi</div>
                        </div>
                        <div class="grid-item" id="quetta">
                            <img src="/cities/quetta.png" alt="Image 5">
                            <div class="tagline">Quetta</div>
                        </div>
                        <div class="grid-item" id="faisalabad">
                            <img src="/cities/faisalabad.png" alt="Image 6">
                            <div class="tagline">Faisalabad</div>
                        </div> 
                    
                    </div>

                    <!--Section1 Ends-->
    
                <h2>Pick of the day!</h2>
                    <div class="middle-pic" id="section2" >
                        <!-- Grid items for section 1 -->
                        <div class="middle-pic" id="midPic1">
                            <img src="skardu.png" alt="Skardu">
                        </div>
                    </div>             


                
                    <!--Section2 Ends-->

                </div>

            <?php include_once 'About.php' ?>

            <?php include_once 'footer.php'?>
                
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.grid-item').forEach(item => {
                    item.addEventListener('click', event => {
                        window.location.href = '/busTickets/ticketBooking.php';
                    });
                });
            });
            </script>
            </body>
            </html>
