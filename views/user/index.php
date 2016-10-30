<!DOCTYPE html>
<html lang="ru">
  <head>
	 <meta charset="UTF-8">
	 <title>Добавить пользователя</title>
	 <link href="/web/style/style.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

  </head>
  <body  onload="validateAddUser()">
	 <div class="container">
		<header>
		  <div id="logo">Техническое задание</div>
		</header>
		<aside>
		  <ul>
			 <li><a href="http://technikal-task/user">Добавить пользователя</a></li>
			 <li><a href="http://technikal-task/post">Добавить запись</a></li>
			 <li><a href="http://technikal-task/table">Таблица</a></li>
		  </ul>
		</aside>
		<section class="content">
			<?php if (isset($result) && $result): ?>
			  <h3>Пользователь довлен!</h3>
		  <?php endif; ?>
			  <form name="createUser" id="createUser" method="post">
			 <fieldset>
				<legend>Добавить пользователя</legend>
				<p><label for="login">Login</label><input type="text" name="login" id="inputLogin"><span id="error"></span></p>
				<p><label for="email">E-mail</label><input type="text" name="email" id='inputEmail'><span id="errorPassword"></span></p>
				  <?php if (isset($errors) && is_array($errors)): ?>
					<ul>
						<?php foreach ($errors as $error): ?>
						  <li><?= $error ?></li>
					  <?php endforeach; ?>
					</ul>
				<?php endif; ?>
			 </fieldset>
			 <p><button type="submit" name="submitUser">Отправить</button></p>
		  </form>
		</section>
		<br clear="all"/>
		<footer>
		  footer
		</footer>
	 </div>	 
	 <script src="/web/script/script.js"></script>
  </body>
</html>