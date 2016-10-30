<!DOCTYPE html>
<html lang="ru">
  <head>
	 <meta charset="UTF-8">
	 <title>Таблица</title>
	 <link href="/web/style/style.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  </head>
  <body>
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
		  <?php if (!empty($userPostsList)): ?>
			  <h3>Пользователи</h3>
			  <table border="1">
				 <thead>
					<tr>
					  <td>login</td>
					  <td>email</td>
					  <td>Запись</td>
					</tr>
				 </thead>
				 <tbody>
					 <?php foreach ($userPostsList as $key => $value): ?>
						<tr>
						  <td><?= $value['login'] ?></td>
						  <td><?= $value['email'] ?></td>
						  <td><?= $value['title'] ?></td>
						</tr>
					<?php endforeach; ?>
				 </tbody>
			  </table>
		  <?php else: ?>
			  <h3>Пусто</h3>
		  <?php endif; ?>
		</section>
		<br clear="all"/>
		<footer>
		  footer
		</footer>
	 </div>
  </body>
</html>