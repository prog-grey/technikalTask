<?php
/**
* Db
* 
* Класс для подключение к БД
* 
*/
class Db {
   
	/**
   * Метод класса производит подключение к БД
   * 
   * @return объект PDO
   */
	public static function getConnection(){
		$paramsPath = ROOT.'/config/DbParams.php';
		$params = include($paramsPath);
		
		$dsn = "mysql:host={$params['host']};dbname={$params['dbName']}";
		$db = new PDO($dsn, $params['user'], $params['password']);
		
		return $db;
	}

	
}
