<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Samparka - Digital Press Media House</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            text-align: center;
            background-image: url('{{ asset('project_logo/logo2.jpeg') }}');
            background-size: 220px;
        }

        .logo img {
            width: 20%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 250px 20px 20px;
            /* Adjusted padding to make space for the banner */
            overflow-y: auto;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 20px;
            /* Add space between buttons */
        }

        .buttons a {
            padding: 15px 30px;
            /* Increase padding for larger buttons */
            font-size: 1.2rem;
            color: white;
            text-decoration: none;
            background-color: #007bff;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.4);
            /* Add shadow effect */
            transition: background-color 0.3s, transform 0.2s;
            /* Smooth transitions */
        }

        .buttons a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            /* Lift effect on hover */
        }

        footer {
            background-color: #4110f3;
            color: white;
            padding: 10px;
            margin-top: auto;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="{{ asset('project_logo/logo1.jpeg') }}" alt="Samparka Logo">
        </div>
    </header>

    <div class="container">

        <!-- Login and Register Buttons -->
        <div class="buttons">
            <a href="/login">Log In</a>
            <a href="/register">Register</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Samparka. All Rights Reserved.</p>
    </footer>

</body>

</html>
