<?php
namespace Shop\Application\Controllers;

use Shop\BaseController;
use Shop\Application\Models as Models;

//контролер обрабатывает данные каталога
class Product extends BaseController
{
	function index()
	{
		$model = new Models\Product;
		$product = $model->getProduct($_REQUEST['id']);
		$this->product = $product;

	}
}
