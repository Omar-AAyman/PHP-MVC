<!-- 
<head>
    <title><?= $title ?></title>
</head> -->

<!-- Navbar Part  -->
<section id="sec-1">
    <div class="container">
        <article>
            <h1>{{title}}</h1>
            <div class="buttons">
                <a href="add-product" id="add-btn">Add</a>
                <button id="delete-product-btn">MASS DELETE</button>
            </div>
        </article>
    </div>
</section>
<!-- Navbar Part  -->


<!-- Products List Part -->
<section id="sec2-productList">
    <form method="post" id="product_form" action="/mass-delete">
        <div class="container">
            <?php foreach ($products as $product) { ?>
                <!-- Item Part -->
                <div class="item-part" id="item-part<?= $product['id']; ?>" onclick="checkBox('<?= $product['id']; ?>')">
                    <div class="checkbox-form">
                        <input type="checkbox" name="ids[]" id="btn-check<?= $product['id']; ?>" value="<?= $product['id']; ?>" class="delete-checkbox" />
                    </div>
                    <article>
                        <div class="product" id="product<?= $product['id']; ?>">

                            <span class="sku font-weight-bold"><?= $product['sku']; ?></span>
                            <h5 class="name"><?= $product['name']; ?></h5>
                            <p class="price">$<?= $product['price']; ?></p>
                            <p class="type">
                                <?= $product['size'] ? "Size: " . $product['size'] . " MB" : null ?>
                                <?= $product['weight'] ? "Weight: " . $product['weight'] . " KG" : null ?>
                                <?= $product['size'] == null && $product['weight'] == null ? "Dimensions: " . $product['height'] . "x" . $product['width'] . "x" . $product['length'] : null ?>
                            </p>
                        </div>
                    </article>
                </div>
                <!-- End OF Item Part -->

            <?php } ?>

        </div>
    </form>
</section>
<!-- End of Products List Part -->


<footer>
    {{footer}}
</footer>