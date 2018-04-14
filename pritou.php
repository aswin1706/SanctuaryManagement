<html>
		<head>
		<meta charset="UTF-8">
		<title>Wildlife Sanctuary</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="stylesheet" href="css/display.css">
		<link rel="shortcut icon" href="images/panda.ico" />
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
		</head>

		<body>
		<div class="head"> WILDLIFE SANCTUARY <br>
		<table class = "tab">
			<tr> 
				<td><a href="staff.php"> STAFF </a></td>
				<td><a href="animals.php"> ANIMALS </a></td>
				<td bgcolor='#212121'><a href=""> TOURISTS </a></td>
				<td><a href="index.php">LOGOUT </a></td>
				
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
		<div class="dispdata">
		<h2 class="he2">TOURISTS DATA </h2>
		<?php
			$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$query = new MongoDB\Driver\Query([]); 
            $rows = $mng->executeQuery("sample.tourists", $query);
			$data = $rows->toArray();
			
				echo "<table class='tabcs'>";
					echo "<tr>";
							echo "<th>ID</th>";
							echo "<th>NAME</th>";
							echo "<th>GUIDE</th>";
							echo "<th>FEE</th>";
							echo "<th>TOT AMT</th>";
							
					echo "</tr>";
			foreach ($data as $key => $value) {
				
						echo "<tr>";
								echo "<td>".$value->id."</td>";
								echo "<td>".$value->name."</td>";
								echo "<td>".$value->guide."</td>";
								echo "<td>".($value->visitfee+$value->guidefee)."</td>";
								echo "<td>".($value->visitfee+$value->guidefee+$value->donation)."</td>";
						echo "</tr>";
			}
				echo "</table>";
			
		
		?>
		</div>
		</body>
	</html>