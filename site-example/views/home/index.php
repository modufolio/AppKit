<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <?= snippet('meta') ?>
</head>
<body>
    <h1>Welcome</h1>
    <p>Hello <?= ($name); ?>!</p>

    <ul>
        <?php foreach ($colours as $colour): ?>
            <li><?= ($colour); ?></li>
        <?php endforeach; ?>
    </ul>
<?= snippet('footer') ?>
</body>
</html>