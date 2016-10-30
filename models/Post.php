<?php

class Post {

	/*Добавляем запись в БД*/
	public function createPost($title, $description, $idUser) {
		
		$db = Db::getConnection();
		$sql = 'INSERT INTO post (title, description, id_user) VALUES (:title, :description, :idUser)';

		$result = $db->prepare($sql);
		$result->bindParam(':title', $title, PDO::PARAM_STR);
		$result->bindParam(':description', $description, PDO::PARAM_STR);
		$result->bindParam(':idUser', $idUser, PDO::PARAM_INT);

		return $result->execute();
	}

	/*Валидация формы на стророне сервера*/
	public function checkItemForm($value) {
			if (strlen($value) > 0) {
				return true;
			}
		return false;
	}

}
