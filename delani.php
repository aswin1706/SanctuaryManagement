<html>
		<head>
		<meta charset="UTF-8">
		<title>Wildlife Sanctuary</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="shortcut icon" href="images/panda.ico" />
		<style>
		::placeholder{
			color: white;
			font-size: 19px;
		}
		</style>
		<script>
		function fun(){
			alert("Welcome Admin!");
		}
		function fun1(x){
			x.style.color="#ffffbc";
		}
		function fun2(x){
			x.style.color="white";
		}
		</script>
		<?php
		if(isset($_POST["id"])){
			$mng = new MongoDB\Driver\Manager('mongodb://localhost:27017');
			$query = new MongoDB\Driver\Query(["id"=>(int)$_POST["id"]]); 
            $rows = $mng->executeQuery("sample.animals", $query);
			$data = $rows->toArray();
			if(empty($data)){
			echo "<script>alert('Animal ID you entered doesnt exists! ');</script>";
			}
			else{
				$bulk = new MongoDB\Driver\BulkWrite;
				$bulk->delete(['id' => (int)$_POST['id']],['limit' => 0]);
				$result = $mng->executeBulkWrite('sample.animals', $bulk);
				echo "<script>alert('Animal deleted successfully! ');</script>";
			}
			
		}
		?>
		</head>
		<body>
		<div class="head"> WILDLIFE SANCTUARY <br>
		<table class = "tab">
			<tr> 
				<td><a href="staff.php"> STAFF </a></td>
				<td bgcolor='#212121'><a href=""> ANIMALS </a></td>
				<td><a href="tourists.php"> TOURISTS </a></td>
				<td><a href="index.php">LOGOUT </a></td>
				
			</tr>
		</table>
		<br>
		</div>
		<div class="sidebar">
		<table class = "sidetable">
		<tr><td><a href="addani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">ADD ANIMAL</a></td></tr>
		<tr><td><a href="updani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">UPDATE ANIMAL</a></td></tr>
		<tr><td><a href="delani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">DELETE ANIMAL</a></td></tr>
		<tr><td><a href="serani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">ANIMAL DATA</a></td></tr>
		</table>
		</div>
		
		<div class="log-form">
		<h2>Animal Deletion </h2>
		<form action="delani.php" method="post" >
			<input type="number" name="id" placeholder="Animal ID" required />
			<button type="submit" class="btn" name="submit">Delete Animal</button>

		</form>
		</div>
		</body>
	</html>