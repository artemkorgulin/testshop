<?php

namespace Shop;

class DateBase
{
	private static $HOST = "";
	private static $USER = "";
	private static $PASSWORD = "";
	private static $NAME_BD = "";
	private static $connect = "";

	static function configdb($host,$user,$password,$namedb,$connect)
	{
		self::$HOST = $host;
		self::$USER = $user;
		self::$PASSWORD = $password;
		self::$NAME_BD = $namedb;
		self::$connect = $connect;
	}

	static function connect()
	{
		return self::$connect;
	}

	function query($query)
	{

		if (($num_args = func_num_args()) > 1) {
			$arg = func_get_args();
			unset($arg[0]);
			//Выводит значения массива args, отформатированные в соответствии с аргументом format,


			foreach ($arg as $argument => $value) {
				$arg[$argument] = DateBase::Connect()->escape_string($value); // экранируем кавычки для всех входных параметров
			}

			$query = vsprintf($query, $arg);

		}

		$sql = mysqli_query(DateBase::Connect(),$query);

		if (preg_match('`^(INSERT|UPDATE|DELETE|REPLACE)`i', $query, $null)) {
			if ($this->affected_rows($sql)) {
				return $sql;
			}
		} else {
			if ($this->num_rows($sql)) {
				return $sql;
			}
		}

		return false;
	}

	function build_query($query, $array, $_devide = ',')
	{
		if (is_array($array)) {
			$part_query = '';
			foreach ($array as $index => $value) {
				$part_query .= sprintf(" %s = '%s'" . $_devide, $index, mysqli_real_escape_string($value));
			}
			$part_query = trim($part_query, $_devide);
			$query .= $part_query;
			return $this->query($query);
		}
		return false;
	}


//mysql_fetch_object- Обрабатывает ряд результата запроса и возвращает объект
	function fetch_object($object)
	{
		return @mysqli_fetch_object($object);
	}

//mysql_num_rows() возвращает количество рядов результата запроса.
	function num_rows($object)
	{
		return @mysqli_num_rows($object);
	}

//mysql_affected_rows() возвращает количество рядов, затронутых последним INSERT, UPDATE, DELETE запросом к серверу, на который ссылается указатель link_identifier.
	function affected_rows($object)
	{
		return mysqli_affected_rows();
	}

//mysql_insert_id -  Возвращает ID, сгенерированный при последнем INSERT-запросе.
	function insert_id()
	{
		return mysqli_insert_id();
	}
}