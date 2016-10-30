<?php

class User {

	/*Добавляем запись в БД. возвращаем результат операции добавления*/
	public function createUser($login, $email) {
		$db = Db::getConnection();
		$sql = 'INSERT INTO user (login, email) VALUES (:login, :email)';

		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);

		return $result->execute();
	}

	/*валидация логина на стороне сервера*/
	public function checkLogin($login) {
		if (strlen($login) >= 3) {
			return true;
		}
		return false;
	}

	/*валидация email на стороне сервера */
	public function checkEmail($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

	/*существует ли email в БД*/
	public function checkEmailExists($email) {
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();
		if ($result->fetchColumn())
			return true;
		return false;
	}

	/*существует ли логин в БД*/
	public function checkLoginExists($login) {
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(*) FROM user WHERE login = :login';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->execute();
		if ($result->fetchColumn())
			return true;
		return false;
	}
	/*получаем всех пользователей из БД*/
	public static function getUsers(){
		$db = Db::getConnection();
		$userList = array();
		$result = $db->query('SELECT id, login FROM user');
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$i = 0;
		while ($row = $result->fetch()){
			$userList[$i]['id'] = $row['id'];
			$userList[$i]['login'] = $row['login'];
			$i++;
		}
		return $userList;
	}
	
	/*получаем записи пользователей*/
	public static function getPosts(){
		$db = Db::getConnection();
		$userPostsList = array();
		$result = $db->query('SELECT user.login, user.email, post.title FROM post INNER JOIN user ON user.id = post.id_user');
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$i = 0;
		while ($row = $result->fetch()){
			$userPostsList[$i]['login'] = $row['login'];
			$userPostsList[$i]['email'] = $row['email'];
			$userPostsList[$i]['title'] = $row['title'];
			$i++;
			
		}
		return $userPostsList;		
	}

}
