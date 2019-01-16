<a href="/catalog"><<< Назад</a>
<h1 id="productName"><?= $product['name'] ?></h1>
<div class="card_product">
    <div class="product_image">
        <image src="/images/<?= $product['id'] ?>.jpg"/>
    </div>
    <div class="product_desc">
		<?= $product['desc'] ?>
    </div>
    <?php $count = count($_SESSION['cart'][$item["id"]]); ?>
    <div align="left"><span class="minus">-</span> <input disabled id="productCount<?=$product["id"]?>" type="text" value="<?php echo (($count)?$count:1) ?>"> <span
                class="plus">+</span></div>
    <div class="price">
		<?= $product['price'] ?> руб.
    </div>
    <div class="product_buy">
        <a href="/catalog?in-cart-product-id=<?= $product['id'] ?>">Купить</a>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        id = "#productCount<?= $product['id'] ?>";
        var user = {};
	    <?php if($_SESSION["Email"]) { ?>
        user["email"] = "<?=$_SESSION["Email"]?>";
	    <?php } ?>
	    <?php if($_SESSION["Phone"]) { ?>
        user["phone"] = "<?=$_SESSION["Phone"]?>";
	    <?php } ?>
	    <?php if($_SESSION["User"]) { ?>
        user["username"] = "<?=$_SESSION["User"]?>";
	    <?php } ?>

        $.fn.ProductCard(id,user);
    });
</script>