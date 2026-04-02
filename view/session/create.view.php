<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    use Core\Functions;
    use Core\Sessions;

    require Functions::basePath("view/partials/nav.php"); ?>

    <form action="/store" method="POST">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?= Sessions::getOld("email") ?>" />
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" />
        <br>

        <p><?= Sessions::getError("error") ?></p>
        <button>Send</button>
    </form>
</body>

</html>