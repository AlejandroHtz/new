<?php 

require '../Classes/PHPExcel/IOFactory.php';
require ('../../conexion.php'); 
 
$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];
$user =$_SESSION['email'];


$files = glob('archivos/*'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino el fichero
}



	if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
		$nombreArchivo = 'archivos/tag.xlsx';
	
	$objPHPExcel = PHPEXCEL_IOFactory::load($nombreArchivo);
	
	$objPHPExcel->setActiveSheetIndex(0);
	
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	
	
	for($i = 2; $i <= $numRows; $i++){
		
		 $servicio = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		 $tag = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		 $noeconomico = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		 $fecha = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		 $hora = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		 $caseta = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		 $carril = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		 $clase = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		 $importe = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
         if(empty($fecha)){  }else{
            $timestamp = PHPExcel_Shared_Date::ExcelToPHP($fecha);
             $fecha = gmdate("Y/m/d H:i:s", $timestamp) ;
             $fecha =str_replace('/','-',$fecha);
         } if(empty($fecha)){  }else{
            $time = PHPExcel_Shared_Date::ExcelToPHP($hora);
             $hora = gmdate("H:i:s", $time) ;
             //$fechoraha =str_replace('/','-',$hora)."| \n" ;
             //echo $hora."| \n";
         }
        
		 $importe=str_replace('-','',$importe);
		 $sql = mysqli_query ($conexion,"SELECT *  from tag 
         where servicio = '$servicio' and tag='$tag' and noeconomico='$noeconomico' 
         and fecha = '$fecha' and hora = '$hora' and caseta = '$caseta' and carril ='$carril' 
         and clase = '$clase' and importe='$importe'");
		
		 $result= mysqli_num_rows($sql);
		
		 if ($result > 0) { 
            echo "ya existe esta gestion:". $servicio.",".$tag.",".$fecha.",".$hora.",".$importe."| <br>";
         }else{
            //echo "Ingresado:". $servicio.",".$tag.",".$fecha.",".$hora.",".$importe."| <br>";
            $sqlinser = "INSERT INTO tag
			(
                servicio, tag, noeconomico, 
                fecha, hora, caseta, carril, clase, importe
                )
			VALUES(
                '$servicio','$tag','$noeconomico',
                '$fecha','$hora','$caseta','$carril','$clase','$importe');";
			$resultinser = mysqli_query($conexion, $sqlinser);
		
			if($resultinser){
				
                echo $servicio."-Insertado <br>";
            }
         }
         
			

	
	} 
 }
