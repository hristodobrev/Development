<main>
    <h1>Browse our products</h1>
    <section>
        <?php foreach ($viewData as $product) : ?>
            <div class="product-container">
                <h3>
                    <span class="product-name"><?= $product['name']; ?></span>
                    <span class="product-price"><?= $product['price'] ?></span>
                </h3>
                <p class="product-description"><?= $product['description'] ?></p>
                <p class="product-footer"><?= $product['date_created'] ?></p>
            </div>
        <?php endforeach; ?>
    </section>
</main>