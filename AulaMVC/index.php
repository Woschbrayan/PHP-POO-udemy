<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>MVC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php 
        require './vendor/autoload.php';

        $url = new Core\ConfigController();
        $url->loadPage();

    ?>
    </body>
</html>