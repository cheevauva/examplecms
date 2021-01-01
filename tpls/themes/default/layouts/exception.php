<html>
    <head>
        <base href="<?= $basePath; ?>"/>
        <meta charset="utf-8"/>
        <title>ExampleCMS</title>
    </head>
    <body>
        <div class="container">
            <div><br/></div>
            <?= $this->render($views['body']); ?>
            <div><br/></div>
            <?= $this->render($views['footer']); ?>
        </div>
        <?= $this->render($views['asset']); ?>
    </body>
</html>