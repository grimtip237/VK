<?php 
$con = mysqli_connect('127.0.0.1', 'root', '', 'vk');

$select = "SELECT * FROM users WHERE phone='{$_POST['phone']}' AND password='{$_POST['password']}'";

$query = mysqli_query($con, $select );

$result = $query->fetch_assoc();





if($query->num_rows>0){
	session_start();
	$_SESSION["id"]=result["id"];

	header("Location: account.php");
}
else{
    header("Location: index.php?error=нет такого пользователя или пароль не подходит");
}

 ?>
