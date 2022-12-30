
<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
 	<?php
	session_start();

	$con = mysqli_connect('127.0.0.1', 'root', '', 'vk');
	$select = "SELECT * FROM users WHERE id='{$_SESSION["id"]}'";

	$query = mysqli_query($con, $select);

	$result = $query->fetch_assoc();

	echo $_SESSION["id"];
 ?>
 
<div class="col-12" style="background-color: #4680C2">
	<div class="col-8 mx-auto">
		<div class="row">
			<div class="col-2">
				<a href='news.php'><img src="img/vk.png" class="w-25"></a>
			</div>
			<div class="col-8">
				<input class="mt-1 search-input" placeholder="Поиск" >
			</div>
		</div>
	</div>
</div>

<div class="col-7 mx-auto mt-3">
	<div class="row">
		<!--меню со ссылками-->
		<div class="col-2">
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

		<!--аватарка-->
		<div class="col-3 text-center ">
			<div class="bg-white py-3 rounded mt-3">
				<div>
					<img src="<?php echo $result['avatar'] ?>" class="w-75 img">
				</div>
				<button class="btn btn-primary mt-3">Редактировать</button>
			</div>		
		</div>

		<!--основной блок-->
		<div class="col-7 pt-3">
			<div class="col-12 bg-white rounded py-3 px-2">	
				<div class="border-bottom pb-2" >
					<h5><!--Вывести имя-->
						<? echo $result["name"];?>
						<? echo $result["surname"];?>
					</h5>
					<p class="text-secondary">Установить статус</p>
				</div>

				<div class="py-3" >
					<div class="d-flex">
						<div class="col-4">
							<p class="text-secondary">Город: </p>
							<p class="text-secondary">Образование: </p>
						</div>
						<div class="col-8">
							<p><!--Вывести город--></p>
							<p><!--Вывести образование--></p>
						</div>
					</div>
				</div>
			</div>
			<!--фотографии-->
			<div class="col-12 py-3 bg-white rounded mt-3 px-2">
				<p>Мои фотографии</p>
				<!--Вывести фото-->
			    <?
				    $selectImg = "SELECT * FROM users INNER JOIN photos ON photos.user_id WHERE users.id='{$_SESSION['id']}'";

				    $queryImg = mysqli_query($con, $selectImg);
				    for($i=0; $i=$queryImg->num_rows; $i++) {
				    	$resultImg = $queryImg->fetch_assoc();

				    }
				?>
			<img src="<? echo $resultImg["image"];?>" class="w-25 ">
			</div>

			<!--добавить пост-->
			<div class="py-3 bg-white rounded mt-3 px-2" >
				<form>
					<input type="text" name="" class="form-control" placeholder="Что у вас нового?">
					<input type="" name="" class="form-control mt-2">
					<button class="btn btn-primary mt-3">Опубликовать</button>
				</form>
			
			</div>
			
			<!--один пост-->
			<div class="bg-white rounded py-3 mt-2 px-2">
				<div class="d-flex">
					<div class="col-1">
						<img src="" alt="" class="w-100">
					</div>
					<div class="col-8 ms-2">
						<p class="my-0 fw-bolder"></p>
						<p class="mt-1 text-secondary"></p>
					</div>
				</div>
				<div class="col-12">
					<p></p>
					<img src="" alt="" class="w-100">
				</div>
			</div>
		</div>
	</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

 </body>
 </html>