<!DOCTYPE html>
<html lang="ru">
  <head>
	 <meta charset="UTF-8">
	 <title>Добавить запись</title>
	 <link href="/web/style/style.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  </head>
  <body onload="validateAddPost()">
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
			  <h3>Запись довлена!</h3>
		  <?php endif; ?>
		  <form name="createPost" id="createPost" method="post">
			 <fieldset>
				<legend>Добавить запись</legend>
				<p><label for="title">Заголовок</label><input type="text" name="title" id="inputTitle"><span id="error"></span></p>
				<p><label for="description">Описание</label>
				  <textarea name='description' id="inputDescription"></textarea>
				  <span id="error"></span></p>
				</p>
				<p><label for="idUser">Выбериете пользователя</label>
				  <select name="idUser">
					  <?php foreach ($userList as $key => $value): ?>
						 <option value='<?= $value['id'] ?>'><?= $value['login'] ?></option>
					 <?php endforeach; ?>

				  </select>
				</p>
				<?php if (isset($errors) && is_array($errors)): ?>
					<ul>
						<?php foreach ($errors as $error): ?>
						  <li><?= $error ?></li>
					  <?php endforeach; ?>
					</ul>
				<?php endif; ?>
			 </fieldset>
			 <p><button type="submit" name="submitPost">Отправить</button></p>
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