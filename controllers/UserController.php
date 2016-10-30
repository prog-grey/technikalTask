<?php

include_once ROOT.'/models/User.php';

class UserController {

	public function actionIndex(){
		$login = '';
		$email = '';
		$errors = false;
		$user = new User();
		
		if( isset($_POST['submitUser']) ){
			$login = trim( $_POST['login'] );
			$email = trim( $_POST['email'] );
			/*валидация формы добавления пользователя на стороне сервера*/
			if( !$user->checkLogin($login) )
				$errors[] = 'Login не должен быть короче 5 символов';
			if( !$user->checkEmail($email) )
				$errors[] = 'Неправильный email';
			if( $user->checkLoginExists($login) )
				$errors[] = 'Такой login уже используется';
			if( $user->checkEmailExists($email) )
				$errors[] = 'Такой email уже используется';
			
			/*если массив ошибок пуст, то вызываем ф-ю для записи в БД*/			
			if( !$errors )
				$result = $user->createUser($login, $email);
			
		}
		
		require_once (ROOT.'/views/user/index.php');
		return true;
	}
	

	
}
