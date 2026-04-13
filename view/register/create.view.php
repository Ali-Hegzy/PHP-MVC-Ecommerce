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

    require Functions::basePath("view/partials/nav.php"); 
    
    ?>

    <form action="/signin" method="POST">
        <label for="userName">User Name</label>
        <input type="userName" name="userName" id="userName" value="<?= htmlspecialchars(Sessions::getOld("userName")) ?>" />
        <p> <?= Sessions::getError("userName") ?> </p>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars(Sessions::getOld("email")) ?>" />
        <p> <?= Sessions::getError("email") ?> </p>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        <p> <?= Sessions::getError("password") ?> </p>
        <br>
        <button>Submit</button>
    </form>
</body>

</html>