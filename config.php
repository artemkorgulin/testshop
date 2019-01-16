<?php

//Error_Reporting(E_ALL & ~E_NOTICE);//не выводить предупреждения
error_reporting(0);
require_once($_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php");
//константы для подключения к базе данных

define('PATH_SITE', $_SERVER['DOCUMENT_ROOT']); 		//сервер
define('HOST', ''); 		//сервер
define('USER', ''); 			//пользователь
define('PASSWORD', ''); 			//пароль
define('NAME_BD', '');		//база
$connect = mysqli_connect(HOST, USER, PASSWORD)or die("Невозможно установить соединение c базой данных".mysqli_error());
Shop\DateBase::configdb(HOST,USER,PASSWORD,NAME_BD,$connect);

mysqli_select_db($connect,NAME_BD) or die ("Ошибка обращения к базе ".mysqli_error());
mysqli_query($connect,'SET names "utf8"');   //база устанавливаем кодировку данных в базе