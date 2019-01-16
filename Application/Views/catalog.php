<h1>Каталог</h1>
<?php
$i = 0;
//представление каталога (страница каталога)
foreach ($Items as $item) {
	if ($i % 3 == 0) { ?>
        <div style="clear:both;"></div>
	<?php } ?>
    <div class="product">
        <div class="product_image">
            <a href="/product/<?= $item["url"] ?>">
                <image src="/images/<?= $item["id"] ?>.jpg"/>
            </a>
        </div>
        <h2>
            <a href="/product/<?= $item["url"] ?>"><?= $item["name"] ?></a>
        </h2>
        <div class="product_price">
			<?= $item["price"] ?> руб.
        </div>
        <div class="product_buy">
            <a href="/catalog?in-cart-product-id=<?= $item["id"] ?>">В корзину</a>

        </div>

    </div>
	<?php
	$i++;
}
