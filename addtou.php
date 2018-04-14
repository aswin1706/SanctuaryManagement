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
		select {
			color:white;
			font-size: 19px;
			background: #00000075;
		}
		option{
			background: #00000075;
		}
		</style>
		<script type="text/javascript">

		function f1() 
		{  
		var x=document.f.name.value;  
		
		var f =  /^[A-Za-z\s]+$/.test(x);
		if(f==1){
			return true;
		}
		alert("Invalid Tourist name");
		document.f.name.focus() ;
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
		<?php
			if(isset($_POST["name"])){
				$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
				$query = new MongoDB\Driver\Query([]); 
                $rows = $mng->executeQuery("sample.tourists", $query);
				$data = $rows->toArray();
				$gquery = new MongoDB\Driver\Query(["design"=>"Guide","name"=>$_POST["guide"]]);
				$grows = $mng->executeQuery("sample.staff", $gquery);
				$gdata = $grows->toArray();
				if(empty($gdata)){
					echo "<script>alert('Guide you entered doesnt exist!');</script>";
				}
				else{
				foreach ($gdata as $gid=>$gvalue){
					$gfee = json_encode($gvalue->fee);
				}
				foreach ($data as $id=>$value) { 
					$r = (int)json_encode($value->id);
				}
				$r++;
				$bulk = new MongoDB\Driver\BulkWrite();
				$bulk->insert(['id' => $r, 'name' => $_POST["name"],'guide'=>$_POST["guide"],'guidefee'=>(int)$gfee,'visitfee' => (int)$_POST["vfee"],'donation' => (int)$_POST["donation"]]);
				$mng->executeBulkWrite("sample.tourists", $bulk); 
				echo "<script>alert('1 Tourist Added Successfully');</script>";
				}
			}
		?>
		
		</head>

		<body>
		<div class="head"> WILDLIFE SANCTUARY <br>
		<table class = "tab">
			<tr> 
				<td><a href="staff.php"> STAFF </a></td>
				<td><a href="animals.php"> ANIMALS </a></td>
				<td bgcolor='#212121'><a href=""> TOURISTS </a></td>
				<td><a href="index.php">LOGOUT </a> </td>
				
			</tr>
		</table>
		<br>
		</div>
		<div class="sidebar">
		<table class = "sidetable">
		<tr><td><a href="addtou.php" onmouseover="fun1(this)" onmouseout="fun2(this)">ADD TOURIST</td></tr>
		<tr><td><a href="pritou.php" onmouseover="fun1(this)" onmouseout="fun2(this)">TOURIST DATA</td></tr>
		<tr><td><a href="stat.php" onmouseover="fun1(this)" onmouseout="fun2(this)">STATISTICS</td></tr>
		<tr><td><a href="pritic.php" onmouseover="fun1(this)" onmouseout="fun2(this)">PRINT TICKET</td></tr>
		</table>	
		</div>
		<div class="log-form">
		<h2>Tourist Insertion </h2>
		<form action="addtou.php" name = "f" onsubmit = "return f1()" method="post" >
			<input type="text" name="name" placeholder="Tourist Name" required />
			<input type="text" name="guide" placeholder="Guide Name" required />
			<input type="number" name="vfee" placeholder="Visit Fee" required />
			<input type="number" name="donation" placeholder="Donation Amount (optional)" />
			<button type="submit" class="btn" name="submit">Add Tourist</button>

		</form>
		</div>
		
		</body>
	</html>