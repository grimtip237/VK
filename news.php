<?php 
	session_start();
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>VK</title>
 	<meta charset="utf-8">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	 <?
	     $connect = mysqli_connect("127.0.0.1", "root", "", "vk");
	     if ($connect==false) {
			echo("Не подключено");
		} else {
			echo("Подключено");
		}
	     $select = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id";
	     $query = mysqli_query($connect, $select);
	     if ($query==false) {
			echo("Запрос не работает");
		} else {
			echo('Запрос работает');
		}


	 ?>
 	<style type="text/css">
 		.search-input{
			border-radius: 15px;
			border:none;
			padding-top: 5px;
			padding-bottom: 5px;
			padding-left: 10px;		
			background: #224b7a;
			color: white;
			outline: none;
			width: 250px;
		}
 	</style>
 </head>
 <body style="background: #EDEEF0">
 <!--шапка-->
 <div class="col-12" style="background-color: #4680C2">
	<div class="col-8 mx-auto">
		<div class="row">
			<div class="col-2">
                <a href='main.php'><img src="img/vk.png" class="w-25"></a>
			</div>
			<div class="col-8">
				<input class="mt-1 search-input" placeholder="Поиск" >
			</div>
		</div>
	</div>
</div>

<!--большой див по центру-->
<div class="col-6 mx-auto">
	<div class="d-flex">
		<!--ссылки-->
		<div class="col-3">
			<div class="mt-3">
				<a href="account.php" class="text-dark">Моя страница</a>
			</div>
			<div class="mt-3">
				<a href="news.php" class="text-dark">Новости</a>
			</div>
			<div class="mt-3">
				<a href="" class="text-dark">Мессенджер</a>
			</div>
			<div class="mt-3">
				<a href="" class="text-dark">Друзья</a>
			</div>
			<div class="mt-3">
				<a href="" class="text-dark">Сообщества</a>
			</div>
			<div class="mt-3">
				<a href="" class="text-dark">Фотографии</a>
			</div>
			<div class="mt-3">
				<a href="" class="text-dark">Музыка</a>
			</div>
			<div class="mt-3">
				<a href="" class="text-dark">Видео</a>
			</div>
			<div class="mt-3">
				<a href="" class="text-dark">Клипы</a>
			</div>
		</div>

		<!--посты-->
		<div class="col-6">		
			<!--один пост-->
			<?
			    for($i=0; $i<7; $i++) {
			    $result = $query -> fetch_assoc();
			?>
			<div class="bg-white rounded py-3 mt-2 px-2">
				<div class="d-flex">
					<div class="col-1">
						<img src="<? echo $result["avatar"]?>" alt="" class="w-100">
					</div>
					<div class="col-8 ms-2">
						<p class="my-0 fw-bolder"><? echo $result["name"]?></p>
						<p class="mt-1 text-secondary"><? echo $result["text"]?></p>
					</div>
				</div>
				<div class="col-12">
					<p></p>
					<img src="<? echo $result["image"]?>" alt="" class="w-100">
				</div>
			</div>
			<?
		        }
			?>
		</div>
	</div>

			
</div>
</body>
</html>