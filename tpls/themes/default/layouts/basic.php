<html>
    <head>
        <base href="<?= $basePath; ?>"/>
        <meta charset="utf-8"/>
        <title>ExampleCMS</title>
        <link href="js/require.css" rel="stylesheet" type="text/css">
        <script src="js/require.js"></script>
    </head>
    <body>
        <div class="container">
            <?= $this->render($views['header']); ?>
            <div><br/></div>
            <?= $this->render($views['body']); ?>
            <div><br/></div>
            <?= $this->render($views['footer']); ?>
        </div>
        <?= $this->render($views['asset']); ?>
    </body>
</html>