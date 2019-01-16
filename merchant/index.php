<?php
require_once "../config.php";

use Shop\Merchants;

$dataMerchant =  json_decode(array_keys($_POST)[0]);
$method = $dataMerchant->method;

if($method) {
	$api = new Merchants\Tinkoffmerchantapi(
		'1547560662606DEMO',  //Ваш Terminal_Key
		'hp9lnb50434h1cti',   //Ваш Secret_Key
		'https://securepay.tinkoff.ru/v2/'
	);

	if($dataMerchant->user->email) {
		$email = str_replace("_",".",$dataMerchant->user->email);
	}
	if($dataMerchant->user->phone) {
		$phone = $dataMerchant->user->phone;
	}

	$orderId = rand(1,PHP_INT_MAX);

	$taxations = [
		'osn' => 'osn', // Общая СН
		'usn_income' => 'usn_income', // Упрощенная СН (доходы)
		'usn_income_outcome' => 'usn_income_outcome', // Упрощенная СН (доходы минус расходы)
		'envd' => 'envd', // Единый налог на вмененный доход
		'esn' => 'esn', // Единый сельскохозяйственный налог
		'patent' => 'patent' // Патентная СН
	];
	$vats = [
		'none' => 'none', // Без НДС
		'vat0' => 'vat0', // НДС 0%
		'vat10' => 'vat10', // НДС 10%
		'vat18' => 'vat18' // НДС 18%
	];
	$enabledTaxation = true;
	$amount = intval($dataMerchant->product->price)*100;

	$items = [];
	$item = [];

	if($dataMerchant->product->name) {
		$item["Name"] = $dataMerchant->product->name;
	}
	if($dataMerchant->product->price) {
		$item["Price"] = intval($dataMerchant->product->price);
	}
	if($dataMerchant->product->quantity) {
		$item["Quantity"] = intval($dataMerchant->product->quantity);
	}

	$item["Amount"] = intval($dataMerchant->product->price)*100;
	$item["Tax"] = $vats['none'];


	array_push($items,$item);

	$receipt = [
		'Email' => $email,
		'Taxation' => $taxations['osn'],
		'Items' => $items
	];

	switch($method) {
		case 'init':   //создание заказа

			$enabledTaxation = true;

			$params = array(
				'OrderId' => $orderId,
				'Amount' => $amount,
				'DATA' => array(
					'Email' => $email,
					'Connection_type' => 'example'
				),
			);

			if ($enabledTaxation) {
				$params['Receipt'] = $receipt;
			}

			$api->init($params);

			break;
		case 'PaymentId':   //получить статус платежа

			//PaymentId - Уникальный идентификатор транзакции в системе Банка
			//$api->status
			//$api->paymentId
			//$api->orderId

			$params = array(
				'PaymentId' => '2012735',
			);

			$api->getState($params);

			break;
		case 'Confirm':  //подтверждение платежа

			//PaymentId - Уникальный идентификатор транзакции в системе Банка
			//Amount - Сумма в копейках
			//$api->status
			//$api->paymentId

			$params = array(
				'PaymentId' => '2014742',
				'Amount' => 1000 * 100,
			);

			if ($enabledTaxation) {
				$params['Receipt'] = $receipt;
			}

			$api->confirm($params);

			break;
		case 'Resend':   //отправка недоставленных нотификаций

			//PaymentId - Уникальный идентификатор транзакции в системе Банка
			//Amount - Сумма в копейках
			//$api->Count - Кол-во сообщений, отправленных на повторную рассылку

			$params = array(
				'PaymentId' => '2018643',
				'NotificationType' => 'FINISH_AUTHORIZE'
			);

			$api->resend($params);

			break;
		case 'addCustomer': //регистрация и привязка покупателя

			//CustomerKey - Идентификатор покупателя в системе Продавца
			//Email - Email клиента
			//Phone - Телефон клиента (+71234567890)
			//$api->customerKey - Идентификатор покупателя в системе Продавца

			$params = array(
				'CustomerKey' => 'Test',
				'Email' => $email,
				'Phone' => $phone,
			);
			$api->addCustomer($params);

			break;
		case 'getCustomer':  //данные привязанного покупателя

			//CustomerKey - Идентификатор покупателя в системе Продавца
			//$api->customerKey - Идентификатор покупателя в системе Продавца

			$params = array(
				'CustomerKey' => 'TestCustomer',
			);
			$api->getCustomer($params);

			break;
		case 'removeCustomer':  //удаление данных покупателя

			//CustomerKey - Идентификатор покупателя в системе Продавца
			$params = array(
				'CustomerKey' => 'TestCustomer',
			);
			$api->removeCustomer($params);


			break;
		case 'GetCardList': //список привязанных карт

			//CustomerKey - Идентификатор покупателя в системе Продавца
			$params = array(
				'CustomerKey' => 'Test',
			);
			$api->getCardList($params);


			break;
		case 'removeCard': //удаление привязанных карт

			//CustomerKey - Идентификатор покупателя в системе Продавца
			$params = array(
				'CardId' => '869301',
				'CustomerKey' => 'Test',
			);
			$api->removeCard($params);

			break;
	}

	if ($api->error) {
		echo html_entity_decode($api->error);
	} else {
		echo html_entity_decode($api->response);
	}
}