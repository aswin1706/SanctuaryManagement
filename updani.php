<html>
		<head>
		<meta charset="UTF-8">
		<title>Wildlife Sanctuary</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="shortcut icon" href="images/panda.ico" />
		<script type="text/javascript">

		function f1() 
		{  
		var x=document.f.species.value;
		var y=document.f.feed.value;
		var f =  /^[A-Za-z\s]+$/.test(x);
		var g =  /^[A-Za-z\s]+$/.test(y);
		if(f==0){
			alert("Invalid Species name");
			document.f.species.focus() ;
			return false;
			
		}
		if(g==0){
			alert("Invalid Feed name");
			document.f.feed.focus() ;
			return false;
		}
		return true;
		}

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
		select {
			color:white;
			font-size: 19px;
			background: #00000075;
		}
		option{
			background: #00000075;
		}
		</style>
		<?php
		if(isset($_POST["id"])){
			$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$query = new MongoDB\Driver\Query(["id"=>(int)$_POST["id"]]); 
            $rows = $mng->executeQuery("sample.animals", $query);
			$data = $rows->toArray();
			if(empty($data)){
			echo "<script>alert('Animals ID you entered doesnt exists! ');</script>";
			}
			else{
			foreach ($data as $key => $value) {
			$bulk = new MongoDB\Driver\BulkWrite;
			$bulk->update(
				['id' => (int)json_encode($value->id)],
				['$set' => ['species' => $_POST["species"],'type'=>$_POST["type"],'feed'=>$_POST["feed"],'feed_cost'=>(int)$_POST["feedcost"]]],
				['multi' => false, 'upsert' => false]
				);
			$result = $mng->executeBulkWrite('sample.animals', $bulk);
			}
			echo "<script>alert('1 Animal updated successfully! ');</script>";
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
		<h2>Animal Update </h2>
		<form action="updani.php" name="f" onsubmit="return f1()" method="post" >
			<input type="number" name="id" placeholder="Animal ID" required />
			<input type="text" name="species" placeholder="Animal Species" required />
			<select name="type" class = "sel" required>
			<option value="Herbivore">Herbivore</option>
			<option value="Carnivore">Carnivore</option>
			<option value="Omnivore">Omnivore</option>
			</select>
			<input type="text" name="feed" placeholder="Feed" required />
			<input type="number" name="feedcost" placeholder="Feed Cost" required />
			<button type="submit" class="btn" name="submit">Update Animal</button>

		</form>
		</div>
		
		</body>
	</html>