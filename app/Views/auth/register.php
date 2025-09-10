<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        form {
            display: inline-block;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }
        input, select {
            display: block;
            width: 250px;
            margin-bottom: 15px;
            padding: 8px;
        }
        button {
            width: 100%;
            padding: 8px;
            font-weight: bold;
        }
        .link {
            margin-top: 10px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Register</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('errors')): ?>
        <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <div class="error"><?= $error ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="post" action="<?= base_url('register') ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?= old('name') ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label>Confirm Password:</label>
        <input type="password" name="password_confirm" required>

        <label>Role:</label>
        <select name="role" required>
            <option value="">Select Role</option>
            <option value="student" <?= old('role')=='student' ? 'selected' : '' ?>>Student</option>
            <option value="instructor" <?= old('role')=='instructor' ? 'selected' : '' ?>>Instructor</option>
            <option value="admin" <?= old('role')=='admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <button type="submit">Register</button>

        <div class="link">
            <p>Already have an account? <a href="<?= base_url('login') ?>">Back to Login</a></p>
        </div>
    </form>
</body>
</html>
