<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="/template/style.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/template/main.js"></script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div class="logo">
            <h1 class="font_0"
                style="margin-left: -60px; line-height:1em; text-align:center; font: normal normal normal 60px/1.4em 'arial black',arial-w01-black,arial-w02-black,'arial-w10 black',sans-serif;">
                <a style="text-decoration: none; color:black;" href="/"><span>T-MАРКЕТ</span></a></h1>
        </div>
        <div class="smalcart">
            <strong>Товаров в корзине:</strong> <?= intval($smal_cart['cart_count']) ?> шт.
            <br/>
            <strong>На сумму:</strong> <?= floatval($smal_cart['cart_price']) ?> руб.
            <br/>
            <a href='/cart'>Оформить заказ</a>
        </div>
        <div class="menu">
			<?= (new Shop\Functions())->TopMenu() ?>
        </div>

    </div>
    <div id="content">
        <hr/>
			
	