<?php
if(!isset($_SESSION))
{
	session_start();
}
if($_SESSION['perfil']!=""){
$perfi="".	$_SESSION['perfil'];
		require ('../conexion.php');     
		//echo"SELECT * FROM perfiles where idp = ".$perfi.";";
  		$query= mysqli_query ($conexion, "SELECT * FROM perfiles where idp = ".$perfi." ORDER BY id ASC;");
		//$result= mysqli_num_rows($query))
		while($data = mysqli_fetch_array($query))
		{
			if($data['act']!= ''){
			$_SESSION['' . $data['nomper']]="".$data['act'];
			//echo"".$_SESSION['' . $data['nomper']]." de Mysql ". $data['act'] . "<br>";			
		}else{
			$_SESSION['' . $data['nomper']]="0";
		}
	}
		
}

?>