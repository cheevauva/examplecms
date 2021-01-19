<html>
    <head>
        <base href="<?= $basePath; ?>"/>
        <meta charset="utf-8"/>
        <title>ExampleCMS</title>
    </head>
    <body>
        <div class="container">
            <div><br/></div>
            <?= $this($views['body']); ?>
            <div><br/></div>
            <?= $this($views['footer']); ?>
        </div>
        <?= $this($views['asset']); ?>
    </body>
</html>