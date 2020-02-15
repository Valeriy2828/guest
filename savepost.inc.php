<?php
if(
	isset($_POST['name']) && !empty($_POST['name']) &&
	isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['msg']) && !empty($_POST['msg'])
){
	// Фильтруем полученные данные
	$name = stripslashes(trim(strip_tags($_POST['name'])));
	$email = stripslashes(trim(strip_tags($_POST['email'])));
	$msg = stripslashes(trim(strip_tags($_POST['msg'])));
	
	$result = $gbook->savePost($name, $email, $msg);
	//var_dump($result);
	//exit;
	if(!$result){
		$errMsg = "Произошла ошибка при добавлении сообщения";
	}else{	
		header('Location: ' . $_SERVER['PHP_SELF']);
		exit;
	}	
}else{
	$errMsg = "Заполните все поля формы!";
}
