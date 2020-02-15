<?php

include "IGbookDB.class.php";

class GbookDB implements IGbookDB{
	
	protected $connection;

	public $count = 0;
	
	public function __construct(){
		$this->connection = mysqli_connect("localhost", "root", "", "guest");
		if(!$this->connection){
			echo "Database Connection Error ".mysqli_connect_error($this->connection);
		}
	}
	
	public function __destruct(){
		unset($this->connection);
	} 	
		
	function savePost($name, $email, $msg){
		$dt = time();
		$ip = $_SERVER["REMOTE_ADDR"];
		$sql = "INSERT INTO msgs(
							name,
							email,
							msg,
							datetime,
							ip
						) VALUES(
							'$name',
							'$email',
							'$msg',
							$dt,
							'$ip')";
		return $this->connection->query($sql);							 
	}/**
		*	Вставка данных из формы в базу данных
	
	*/
	
	function getAll(){
		$sql = "SELECT id, name, email, msg, datetime, ip FROM msgs ORDER BY id DESC";
		return $this->connection->query($sql);
	}/**
		*	Выборка всех записей из Гостевой книги
	*/	
	function deletePost($id){
		$sql = "DELETE FROM msgs WHERE id=$id";
		$this->connection->query($sql);
	}
	
	function selectCount(){
		$sql = "SELECT count(*) FROM msgs";
			$res1 = $this->connection->query($sql);
				$res2 = mysqli_fetch_row($res1);
		return $this->count = $res2[0];
	}
}
