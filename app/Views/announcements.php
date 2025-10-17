<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4 text-center"><?= esc($title) ?></h1>

    <?php if (!empty($announcements)): ?>
        <?php foreach ($announcements as $announce): ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title"><?= esc($announce['title']) ?></h4>
                    <p class="card-text"><?= esc($announce['content']) ?></p>
                    <small class="text-muted">
                        Posted on <?= date('F d, Y h:i A', strtotime($announce['created_at'])) ?>
                    </small>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center text-muted">No announcements yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
