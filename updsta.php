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
		var x=document.f.sname.value;		
		var f =  /^[A-Za-z\s]+$/.test(x);
		if(f==1){
			return true;
		}
		alert("Invalid Staff name");
		document.f.sname.focus() ;
		return false;
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
		if(isset($_POST["sid"])){
			$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$query = new MongoDB\Driver\Query(["id"=>(int)$_POST["sid"]]); 
            $rows = $mng->executeQuery("sample.staff", $query);
			$data = $rows->toArray();
			if(empty($data)){
			echo "<script>alert('Staff ID you entered doesnt exists! ');</script>";
			}
			else{
			foreach ($data as $key => $value) {
			$bulk = new MongoDB\Driver\BulkWrite;
			if($_POST["desig"]=='Guide'){
				$bulk->update(
				['id' => (int)json_encode($value->id)],
				['$set' => ['name' => $_POST['sname'],'design'=>$_POST['desig'],'salary'=>(int)$_POST['ssalary'],'fee'=>((int)$_POST['ssalary']*0.2)]],
				['multi' => false, 'upsert' => false]
				);
			}
			else{
			$bulk->update(
				['id' => (int)json_encode($value->id)],
				['$set' => ['name' => $_POST['sname'],'design'=>$_POST['desig'],'salary'=>(int)$_POST['ssalary']]],
				['multi' => false, 'upsert' => false]
				);
			}
			$result = $mng->executeBulkWrite('sample.staff', $bulk);
			}
			echo "<script>alert('Staff updated successfully! ');</script>";
			}
		}
		?>
		
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
		<tr><td><a href="seasta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">STAFF DATA</a></td></tr>
		</table>
		</div>
			<div class="log-form">
		<h2>Staff Update </h2>
		<form action="updsta.php" name="f" onsubmit="return f1()" method="post" >
			<input type="number" name="sid" placeholder="Staff ID" required />
			<input type="text" name="sname" placeholder="Staff Name" required />
			<select name="desig" class = "sel" required>
			<option value="Veterinarian">Veterinarian</option>
			<option value="Guide">Guide</option>
			<option value="Aquarist">Aquarist</option>
			<option value="Curator">Curator</option>
			</select>
			<input type="number" name="ssalary" placeholder="Salary" required />
			<button type="submit" class="btn" name="submit">Update Staff</button>

		</form>
		</div>
		</body>
	</html>