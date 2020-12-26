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
            <h1>ExampleCMS Setup</h1>
            <div><br/></div>
            <?= $theme->make($views['body']); ?>
            <div><br/></div>
            <?= $theme->make($views['footer']); ?>
        </div>
        <?= $theme->make($views['asset']); ?>
    </body>
</html>