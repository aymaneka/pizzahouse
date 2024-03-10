<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Pizza</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('./img/serveur-pizzeria-local-transportant-pizzas-plateau-bois-aux-clients-vieille-pizzeria-rue-italienne.jpg');
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* No repeat */
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
        }
        .heading {
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: #e74c3c; /* Red color */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .pizza-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .pizza-details p {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            color: #e74c3c;
        }
        .form-group input[type="text"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn-confirm {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .btn-confirm:hover {
            background-color: #c0392b;
        }
        .required {
            color: red;
        }

        /* Modal Styling */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            border-radius: 8px;
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">Pizza Napolitana</div>
        <div class="pizza-details">

            <form id="order-form">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="address">Delivery Address:</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address">
                </div>
                <div class="form-group">
                    <label for="pizza">Select Pizza:</label>
                    <select id="pizza" name="pizza">
                        <option value="">Select Pizza</option>
                        <option value="Margherita ($10)">Margherita ($10)</option>
                        <option value="Pepperoni ($12)">Pepperoni ($12)</option>
                        <option value="Quattro Stagioni ($14)">Quattro Stagioni ($14)</option>
                        <option value="Capricciosa ($13)">Capricciosa ($13)</option>
                        <option value="carnivale ($14)">carnivale ($14)</option>
                        <option value="napolitana ($15)">napolitana ($15)</option>
                    </select>
                </div>
                <button type="button" class="btn-confirm" onclick="validateForm()">Confirm Order</button>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var pizza = document.getElementById('pizza').value;
            var modalMessage = document.getElementById('modal-message');

            if (!name) {
                document.getElementById('name').placeholder = 'Name is required';
                document.getElementById('name').classList.add('required');
            } else {
                document.getElementById('name').classList.remove('required');
            }

            if (!address) {
                document.getElementById('address').placeholder = 'Address is required';
                document.getElementById('address').classList.add('required');
            } else {
                document.getElementById('address').classList.remove('required');
            }

            if (!pizza) {
                document.getElementById('pizza').classList.add('required');
            } else {
                document.getElementById('pizza').classList.remove('required');
            }

            if (name && address && pizza) {
                var message = "Thank you for your order, " + name + "!\n\n";
                message += "Your pizza choice: " + pizza.split(" ($")[0] + "\n";
                message += "Total Price: " + pizza.split(" ($")[1].replace(")", "") + "\n";
                message += "Delivery address: " + address + "\n";

                modalMessage.textContent = message;
                showModal();
            }
        }

        // Show the modal
        function showModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = "block";

            // Close the modal when the close button is clicked
            var closeButton = document.getElementsByClassName("close")[0];
            closeButton.onclick = function() {
                modal.style.display = "none";
            }

            // Close the modal when anywhere outside the modal content is clicked
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
