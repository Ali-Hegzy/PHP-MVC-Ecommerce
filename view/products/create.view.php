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

    require Functions::basePath("view/partials/nav.php"); ?>

    <form action="store-product" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" />
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" />
        <br>

    </form>
</body>

</html>