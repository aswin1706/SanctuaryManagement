<?php
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$query = new MongoDB\Driver\Query(["user"=>$_POST["user"]]); 
     
    $rows = $mng->executeQuery("sample.login", $query);
    $val ="";
    foreach ($rows as $row) {
        $val =  json_encode($row->pass);
    }
	if($val == "\"".$_POST["pass"]."\""){
		header("Location:staff.php");
		die();
	}	
	
	else{
		echo $val;
		echo $_POST["pass"];
		
		header("Location: index.php?flag=0");
		die();
		
	}
?>