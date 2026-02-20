<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require basePath("view/partials/nav.php"); ?>

    <form action="/signin" method="POST">
        <label for="userName">User Name</label>
        <input type="userName" name="userName" id="userName" value=""/> <!-- Make the old data appears -->
        <p> <?= $_SESSION["_flash"]["userName"] ?? "" ?> </p>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value=""/> <!-- Make the old data appears -->
        <p> <?= $_SESSION["_flash"]["email"] ?? "" ?> </p>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/>
        <p> <?= $_SESSION["_flash"]["password"] ?? "" ?> </p>
        <br>
        <button>Submit</button>
    </form>
</body>

</html>