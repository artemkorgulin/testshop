<?php

namespace Shop\Application\Controllers;

use Shop\BaseController;
use Shop\Application\Models as Models;

class Order extends BaseController
{
	function index()
	{
		$this->dislpay_form = true; // показывать форму ввода данных
		if (isset($_REQUEST["to_order"])) {  // если пришли данные с формы
			$model = new Models\Order;    //создаем модель заказа
			$error = $model->isValidData($_REQUEST);  //проверяем на корректность вода
			if ($error) $this->error = $error; // если есть ошиби заносим их в переменную
			else {
				//если ошибок нет, то добавляем заказ в БД
				$order_id = $model->addOrder();
				SmalCart::getInstance()->setCartData();// пересчитываем маленькую корзину
				header('Location: /order?thanks=' . $order_id);
				exit;
			}
		}

		if (isset($_REQUEST["thanks"])) {
			//формируем сообщение
			$this->message = "Ваша заявка <strong>№ " . $_REQUEST["thanks"] . "</strong> принята";
			$this->dislpay_form = false;//  форму ввода данных больше не покзываем
		}
	}
}