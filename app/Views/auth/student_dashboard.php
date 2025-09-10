<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome Student, <?= $user['name'] ?>!</h1>
    <p>Email: <?= $user['email'] ?></p>
    <p>Role: <?= $user['role'] ?></p>

    <a href="<?= base_url('logout') ?>">Logout</a>
</body>
</html>
