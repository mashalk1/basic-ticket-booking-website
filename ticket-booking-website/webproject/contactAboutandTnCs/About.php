<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 1200px;
            margin: 100px auto;
            display: flex;
        }

        .image-container, .text-container {
            height: 400px;
            overflow: hidden;
        }

        .image-container {
            width: 40%;
            float: left;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text-container {
            width: 60%;
            background-color: #f0f0f0;
            padding: 20px;
            box-sizing: border-box;
            float: left;
        }

        .text container h2{
            padding-left:20px;
            margin-left:20p
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="cities/peshawar.png" alt="Image">
        </div>
        <div class="text-container">
            <h2>About Us</h2>
            <p>Discover Pakistan's wonders with Silk Road Tribe, your go-to travel partner. 
            Offering safe and budget-friendly bus services across six major cities, we ensure seamless journeys to top tourist destinations.
            Our commitment to quality and safety guarantees memorable experiences for all travelers. 
            Join us and explore Pakistan's beauty hassle-free. Your adventure awaits with Silk Road Tribe!</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = ['cities/peshawar.png', 'cities/lahore.png', 'cities/islamabad.png', 'cities/karachi.png', 'cities/faisalabad.png'];
            let index = 0;
            let intervalID;

            function changeImage() {
                document.querySelector('.image-container img').setAttribute('src', images[index]);
                index = (index + 1) % images.length;
            }

            intervalID = setInterval(changeImage, 3000);

            // Pause the image change when the user hovers over the image container
            const imageContainer = document.querySelector('.image-container');
            imageContainer.addEventListener('mouseenter', function() {
                clearInterval(intervalID);
            });

            // Resume the image change when the user moves the mouse out of the image container
            imageContainer.addEventListener('mouseleave', function() {
                intervalID = setInterval(changeImage, 3000);
            });
        });
    </script>
</body>
</html>
