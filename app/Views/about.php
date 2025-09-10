<!DOCTYPE html>
<html>
<head>
    <title>About Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            display: flex;
            justify-content: space-between; /* left at right alignment */
            align-items: center;
            padding: 10px 50px;
            background-color: #f2f2f2;
        }
        .nav-left a,
        .nav-right a {
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
            color: #333;
        }
        .nav-left a:hover,
        .nav-right a:hover {
            color: #007BFF;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">About Page</h1>
    <nav>
        <div class="nav-left">
            <a href="<?= base_url('/') ?>">Home</a>
            <a href="<?= base_url('about') ?>">About</a>
            <a href="<?= base_url('contact') ?>">Contact</a>
        </div>
        <div class="nav-right">
            <a href="<?= base_url('login') ?>">Login</a>
            <a href="<?= base_url('register') ?>">Register</a>
        </div>
    </nav>
    <p style="text-align: center;">This page provides information about the site.</p>
</body>
</html>
