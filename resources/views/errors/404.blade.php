<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>404 Not Found | Parfait</title>

    <!-- Essential CDNs -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        /* Base Styles */
        * {
            scroll-behavior: smooth;
            font-family: "Poppins", sans-serif;
        }
        body {
            background-color: #0f172a;
            color: white;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .error-code {
            font-size: 6rem;
            font-weight: bold;
            margin: 20px 0;
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .back-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-home:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! The page you are looking for does not exist.</p>
        <a href="{{ route('projects.welcome') }}" class="back-home">Go Back Home</a>
    </div>

    <script>
        // Optional: Initialize AOS for animations
        AOS.init();
    </script>
</body>
</html>