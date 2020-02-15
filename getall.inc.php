<?php
//error_reporting( E_ERROR );
$result = $gbook->getAll();
?>
<div class="pen">
	<div class="all" align="center">
		<p>Всего записей в гостевой книге:&nbsp <?php echo $gbook->selectCount()?>
	</div>	
	<?php
		$arr = array();
		while($res = mysqli_fetch_assoc($result)){
		$arr[] = $res;
	}
	//var_dump($arr);
	foreach($arr as $arr1){
		$id = $arr1["id"];
		$n = $arr1["name"];
		$e = $arr1["email"];
		$m = $arr1["msg"];
		$ip = $arr1["ip"];
		$dt = date("d-m-Y H:i:s",$arr1["datetime"]*1);
	?>	
		<hr>
		<div class="g_book">
			<div class="name">		
				<a href="mailto:<?php echo $e?>"><b><font color = #00008B><?php echo $n?></font></b></a> 
				from [<?php echo $ip?>]&nbsp # <font color = #00008B><?php echo $dt?></font>
			</div>
			<div class="massage">
				<p><font color = #00008B><?php echo $m?></font></p>
			</div>
			<div class="to_del" align="right">
				 <a href="gbook.php?del=<?php echo $id?>">Удалить</a>                                               
			</div>	
		</div>	
	
<?php
}	
?>
</div>					