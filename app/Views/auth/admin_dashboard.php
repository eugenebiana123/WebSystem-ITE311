<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome Admin, <?= $user['name'] ?>!</h1>
    <p>Email: <?= $user['email'] ?></p>
    <p>Role: <?= $user['role'] ?></p>

    <a href="<?= base_url('logout') ?>">Logout</a>
</body>
</html>
