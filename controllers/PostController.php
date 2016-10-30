<?php

include_once ROOT . '/models/Post.php';
include_once ROOT . '/models/User.php';

class PostController {

	public function actionIndex() {
		$title = '';
		$description = '';
		$idUser = '';
		$errors = false;
		$post = new Post();
		$userList = User::getUsers();
		if (isset($_POST['submitPost'])) {
			$title = trim($_POST['title']);
			$description = trim($_POST['description']);
			$idUser = $_POST['idUser'];
		
			/*Валидация формы на стророне сервера*/
			if (!$post->checkItemForm($title))
				$errors[] = 'Заголовок не должен быть пустым';
			if (!$post->checkItemForm($description))
				$errors[] = 'Описание не должен быть пустым';
			
			/*если массив ошибок пуст, то вызываем ф-ю для записи в БД*/
			if (!$errors)
				$result = $post->createPost($title, $description, $idUser);
		}
		require_once (ROOT . '/views/post/index.php');
		return true;
	}

	/*получаем все записи пользователя*/
	public function actionView() {
		$userPostsList = User::getPosts();
		require_once (ROOT . '/views/post/view.php');
		return true;
	}

}
