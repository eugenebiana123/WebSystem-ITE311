<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center; /* horizontal center */
            align-items: center;     /* vertical center */
            background-color: #f9f9f9;
        }
        .login-container {
            background-color: #fff;
            padding: 30px 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        input {
            width: 250px;
            padding: 8px;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        button {
            width: 100%;
            padding: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .link {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('login') ?>">
            <label>Email:</label>
            <input type="email" name="login" value="<?= old('login') ?>" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="link">
            <p>Don't have an account? <a href="<?= base_url('register') ?>">Register here</a></p>
        </div>
    </div>
</body>
</html>
