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

    <form action="store-product" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars(Sessions::getOld("name")) ?>" />
        <br>
        <p><?= Sessions::getError("name") ?></p>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= htmlspecialchars(Sessions::getOld("description")) ?></textarea>
        <br>
        <p><?= Sessions::getError("desc") ?></p>

        <label for="price">Price:</label>
        <input type="number" min="1" step="0.01" id="price" name="price" value="<?= htmlspecialchars(Sessions::getOld("price")) ?>" /> $
        <br>
        <p><?= Sessions::getError("price") ?></p>

        <label for="available">Available items:</label>
        <input type="number" min="1" step="0.01" id="available" name="available" value="<?= htmlspecialchars(Sessions::getOld("available")) ?>" />
        <br>
        <p><?= Sessions::getError("available") ?></p>

        <label for="image">Upload product image</label>
        <input type="file" id="image" name="image" />
        <p><?= Sessions::getError("image") ?></p>
        <br>

        <button type="submit">Add Product</button>
    </form>
</body>

</html>