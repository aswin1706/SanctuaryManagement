<html>
		<head>
		<meta charset="UTF-8">
		<title>Wildlife Sanctuary</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="shortcut icon" href="images/panda.ico" />
		<?php
		if(isset($_POST["sid"])){
			$mng = new MongoDB\Driver\Manager('mongodb://localhost:27017');
			$query = new MongoDB\Driver\Query(["id"=>(int)$_POST["sid"]]); 
            $rows = $mng->executeQuery("sample.staff", $query);
			$data = $rows->toArray();
			if(empty($data)){
			echo "<script>alert('Staff ID you entered doesnt exists! ');</script>";
			}
			else{
				$bulk = new MongoDB\Driver\BulkWrite;
				$bulk->delete(['id' => (int)$_POST['sid']],['limit' => 0]);
				$result = $mng->executeBulkWrite('sample.staff', $bulk);
				echo "<script>alert('Staff deleted successfully! ');</script>";
			}
			
		}
		?>
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
		<style>
		::placeholder{
			color: white;
			font-size: 19px;
		}
		</style>
		</head>
		<body>
		<div class="head"> WILDLIFE SANCTUARY <br>
		<table class = "tab">
			<tr> 
				<td bgcolor='#212121'><a href=""> STAFF </a></td>
				<td><a href="animals.php"> ANIMALS </a></td>
				<td><a href="tourists.php"> TOURISTS </a></td>
				<td><a href="index.php">LOGOUT </a></td>
				
			</tr>
		</table><br>
		</div>
		<div class="sidebar">
		<table class = "sidetable">
		<tr><td><a href="addsta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">ADD STAFF</a></td></tr>
		<tr><td><a href="updsta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">UPDATE STAFF</a></td></tr>
		<tr><td><a href="delsta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">DELETE STAFF</a></td></tr>
		<tr><td><a href="seasta.php"onmouseover="fun1(this)" onmouseout="fun2(this)">STAFF DATA</a></td></tr>
		</table>
		</div>	

		<div class="log-form">
		<h2>Staff Deletion </h2>
		<form action="delsta.php" method="post" >
			<input type="number" name="sid" placeholder="Staff ID" required />
			<button type="submit" class="btn" name="submit">Delete Staff</button>

		</form>
		</div>
		</body>
	</html>