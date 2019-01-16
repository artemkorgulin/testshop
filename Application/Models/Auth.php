<?php

namespace Shop\Application\Models;

use Shop\DateBase;

//модель авторизации
class Auth extends DateBase
{
	//проверка данных авторизации
	function ValidData($login, $pass)
	{
		$sql = parent::query("SELECT * FROM `user` WHERE login='%s' and pass='%s'", $login, $pass);

		if (parent::num_rows($sql)) {
			$_SESSION["Auth"] = true;
			$_SESSION["User"] = $login;

			$rowSql = mysqli_fetch_assoc($sql);

			if($rowSql["email"]) {
				$_SESSION["Email"] = $rowSql["email"];
			}
			if($rowSql["phone"]) {
				$_SESSION["Phone"] = $rowSql["phone"];
			}
		} else $_SESSION["Auth"] = false;

		if (!$_SESSION["Auth"]) {
			$msg = "<em><span style='color:red'>Данные введены не верно!</span></em>";
		} else {
			$msg = "<em><span style='color:green'>Вы верно ввели данные!</span></em>";
			$unVisibleForm = true;
		}

		$result = array("unVisibleForm" => $unVisibleForm,
			"userName" => $login,
			"msg" => $msg,
			"login" => $login,
			"pass" => $pass,);
		return $result;
	}
}