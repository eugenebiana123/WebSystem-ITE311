<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <style>
        body {
            text-align: center; /* lahat ng text naka-center */
            font-family: Arial, sans-serif;
        }
        nav {
            margin: 20px 0;
        }
        nav a {
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Homepage</h1>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a> | 
        <a href="<?= base_url('about') ?>">About</a> | 
        <a href="<?= base_url('contact') ?>">Contact</a>
    </nav>
    <p>This is the homepage content.</p>
</body>
</html>
