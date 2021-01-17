<html>
    <head>
        <base href="<?= $basePath; ?>"/>
        <meta charset="utf-8"/>
        <title>ExampleCMS</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div class="container">
            <h1>ExampleCMS Setup</h1>
            <div><br/></div>
            <?= $this->render($views['body']); ?>
            <div><br/></div>
            <?= $this->render($views['footer']); ?>
        </div>
        <?= $this->render($views['asset']); ?>
    </body>
</html>