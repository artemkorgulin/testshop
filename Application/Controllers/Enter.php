<?php
namespace Shop\Application\Controllers;

use Shop\BaseController;
use Shop\Application\Models as Models;

//контролер обрабатывает данные авторизации
class Enter extends BaseController
{
	function index()
	{
		//если пришли данные логин и пароль, создаем модель проверки авторизации и передаем в нее данные.
		if ($_REQUEST['login'] || $_REQUEST['pass']) {
			$model = new Models\Auth;
			$resultValid = $model->ValidData($_REQUEST['login'], $_REQUEST['pass']);
			//полученный результат проверки записываем в переменные для вывода в публичной части сайта
			$this->unVisibleForm = $resultValid['unVisibleForm'];
			$this->userName = $resultValid['login'];
			$this->msg = $resultValid['msg'];
			$this->login = $resultValid['login'];
			$this->pass = $resultValid['pass'];

		} else
			if ($_SESSION["Auth"]) $this->unVisibleForm = true;    //Если пользователь уже авторизован, не будем выводить ему форму авторизации

		//если пользователь послал запрос о выходе из кабинета, сбрасываем флаги авторизации
		if ($_REQUEST['out'] == "1") {
			$_SESSION["Auth"] = false;
			$_SESSION["User"] = "";
			$this->unVisibleForm = false;
		}

		if($_SESSION["Auth"]) {
			header("HTTP/1.0 200 OK");
			header('Location: /');
		}
	}
}