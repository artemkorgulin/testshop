<?php
namespace Shop\Application\Controllers;

use Shop\BaseController;
use Shop\Application\Models as Models;

//контролер обрабатывает данные каталога
class Catalog extends BaseController
{
  function index()
  {
	  if ($_REQUEST['in-cart-product-id']) {
		  $cart = new Models\Cart;
		  $cart->addToCart($_REQUEST['in-cart-product-id']);
		  \Shop\SmalCart::getInstance()->setCartData();
		  header('Location: /catalog');
		  exit;
	  }

	  $model = new Models\Catalog;
	  $Items = $model->getList();
	  $this->Items = $Items;
  }
}