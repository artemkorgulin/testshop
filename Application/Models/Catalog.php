<?php

namespace Shop\Application\Models;

use Shop\DateBase;

//Модель вывода каталога
class Catalog
{
	function getList()
	{
		$sql = "SELECT * FROM product";
		$result = mysqli_query(DateBase::Connect(),$sql) or die(mysqli_error());
		$сatalogItems = [];

		while ($row = mysqli_fetch_assoc($result)) {
			$сatalogItems[] = array(
				"id" => $row['id'],
				"name" => $row['name'],
				"price" => $row['price'],
				"url" => $row['url']
			);
		}

		return $сatalogItems;
	}
}
  