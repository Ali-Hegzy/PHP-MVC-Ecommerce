<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>



<body>
    <?php

    use Core\Functions;

    require Functions::basePath("view/partials/nav.php"); ?>

    <a href="/add-product"><button>Add Product</button></a>

    <table>
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Avaliable</th>
            <th>Sold Items</th>
            <th>Image</th>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($products as $product): ?>
                    <td><?= $product["name"] ?></td>
                    <td><?= $product["description"] ?></td>
                    <td><?= $product["price"] ?></td>
                    <td><?= $product["available"] ?></td>
                    <td><?= $product["soldItems"] ?></td>
                    <td>
                        <img style="width: 200px;" src="<?= $product["imageSrc"] ?>" loading="lazy" alt="img" />
                    </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</body>

</html>