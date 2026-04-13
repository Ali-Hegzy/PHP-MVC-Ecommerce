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

    <?php if (Sessions::getFlash("success") === '1'): ?>
        <p>The file has been uploaded successfully</p>
    <?php endif; ?>

    <form action="/product/update" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars(Sessions::getOld("name") === '' ? $product["name"] : Sessions::getOld("name")) ?>" />
        <br>
        <p><?= Sessions::getError("name") ?></p>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= htmlspecialchars(Sessions::getOld("description") === '' ? $product["description"] : Sessions::getOld("description")) ?></textarea>
        <br>
        <p><?= Sessions::getError("desc") ?></p>

        <label for="price">Price:</label>
        <input type="number" min="1" step="0.01" id="price" name="price" value="<?= htmlspecialchars(Sessions::getOld("price") === '' ? $product["price"] : Sessions::getOld("price")) ?>" /> $
        <br>
        <p><?= Sessions::getError("price") ?></p>

        <label for="available">Available items:</label>
        <input type="number" min="1" step="0.01" id="available" name="available" value="<?= Sessions::getOld("available") === '' ? $product["available"] : Sessions::getOld("available")?>" />
        <br>
        <p><?= Sessions::getError("available") ?></p>

        <label for="image">Upload New product image</label>
        <input type="file" id="image" name="image" />
        <p><?= Sessions::getError("image") ?></p>
        <br>

        <button type="submit">Edit Product</button>
    </form>
</body>

</html>