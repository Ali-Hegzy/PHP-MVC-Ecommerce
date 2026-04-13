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
    use Core\Sessions;

    require Functions::basePath("view/partials/nav.php");
    ?>
    <h1>User Name : <?= $user["userName"] ?></h1>
    <h1>email : <?= $user["email"] ?></h1>

    <?php if (Sessions::getFlash("delSuccess")): ?>
        <p>The product deleted successfully</p>
    <?php endif; ?>

    <table>
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Avaliable</th>
            <th>Sold Items</th>
            <th>Image</th>
            <th>Choices</th>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product["name"] ?></td>
                    <td><?= $product["description"] ?></td>
                    <td><?= $product["price"] ?></td>
                    <td><?= $product["available"] ?></td>
                    <td><?= $product["soldItems"] ?></td>
                    <td>
                        <a href="/product?prod=<?= $product["id"] ?>">
                            <img src="image.php?img=<?= $product["imageSrc"] ?>" width="200" loading="lazy" alt="image">
                        </a>
                    </td>
                    <td>
                        <form action="/delProd" method="post">
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" name="id" value="<?= $product["id"] ?>">
                            <button type="submit">delete product</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>