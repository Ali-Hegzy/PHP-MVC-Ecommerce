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

    <form action="store-product" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= Sessions::getOld("name") ?>" />
        <br>
        <p><?= $_SESSION["_flash"]["name"] ?? "" ?></p>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= Sessions::getOld("description") ?></textarea>
        <br>
        <p><?= $_SESSION["_flash"]["desc"] ?? "" ?></p>

        <label for="price">Price:</label>
        <input type="number" min="0" id="price" name="price" value="<?= Sessions::getOld("price") ?>" /> $
        <br>
        <p><?= $_SESSION["_flash"]["price"] ?? "" ?></p>

        <label for="image">Upload product image</label>
        <input type="file" id="image" name="image" />
        <p><?= $_SESSION["_flash"]["image"] ?? "" ?></p>
        <br>

        <button type="submit">Add Product</button>
    </form>
</body>

</html>