<html>
    <head>
        <base href="<?= $baseUrl; ?>"/>
        <meta charset="utf-8"/>
        <title>ExampleCMS</title>
        <link href="js/require.css" rel="stylesheet" type="text/css">
        <script src="js/require.js"></script>
    </head>
    <body>
        <div class="container">
            <?= $theme->make($views['header']); ?>
            <div><br/></div>
            <?= $theme->make($views['body']); ?>
            <div><br/></div>
            <?= $theme->make($views['footer']); ?>
        </div>
        <?= $theme->make($views['asset']); ?>
    </body>
</html>