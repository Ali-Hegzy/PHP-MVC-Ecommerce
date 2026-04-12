<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php

    use Core\Functions;

    require Functions::basePath("view/partials/nav.php");
    ?>

    <div class="product-card">
        <img src="image.php?img=<?= $product["imageSrc"] ?>" alt="اسم المنتج" class="product-image">

        <div class="product-info">
            <h2 class="product-name">Title: <?= $product["name"] ?></h2>

            <p class="product-description">Description: <?= $product["description"] ?>
            </p>

            <div class="product-price">Price: <?= $product["price"] ?>$</div>

            <div class="product-stats">
                <span class="stock-available">available: <b><?= $product["available"] ?> piece</b></span>
                <br>
                <span class="units-sold">sold: <b><?= $product["soldItems"] ?> piece</b></span>
            </div>

            <!-- <button class="buy-btn">Add to Cart</button> -->
        </div>
    </div>

</body>

</html>