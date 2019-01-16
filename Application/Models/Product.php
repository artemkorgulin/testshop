<?php

namespace Shop\Application\Models;

use Shop\DateBase;

//Модель вывода каталога
class Product
{
	function getProduct($id)
	{
		$sql = "SELECT * FROM product WHERE id='$id'";
		$result = mysqli_query(DateBase::Connect(),$sql) or die(mysqli_error());

		if ($row = mysqli_fetch_object($result)) {

			$product = array(
				"id" => $row->id,
				"name" => $row->name,
				"desc" => $row->desc,
				"price" => $row->price
			);

		}
		return $product;
	}

	function getProductPrice($id)
	{
		$sql = "SELECT price FROM product WHERE id='$id'";
		$result = mysqli_query(DateBase::Connect(),$sql) or die(mysqli_error());

		if ($row = mysqli_fetch_object($result)) {

			return $row->price;
		}
		return false;
	}
}