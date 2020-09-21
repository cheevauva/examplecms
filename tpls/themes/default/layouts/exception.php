<html>
    <head>
        <base href="<?= $basePath; ?>"/>
        <meta charset="utf-8"/>
        <title>ExampleCMS</title>
    </head>
    <body>
        <div class="container">
            <div><br/></div>
            <?= $theme->make($views['body']); ?>
            <div><br/></div>
            <?= $theme->make($views['footer']); ?>
        </div>
        <?= $theme->make($views['asset']); ?>
    </body>
</html>