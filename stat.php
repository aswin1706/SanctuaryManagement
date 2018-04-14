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
		<h2 class="he2">LEDGER BOOK </h2>
		<?php
			$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$query = new MongoDB\Driver\Query([]); 
            $rows1 = $mng->executeQuery("sample.staff", $query);
			$rows2 = $mng->executeQuery("sample.animals", $query);
			$rows3 = $mng->executeQuery("sample.tourists", $query);
			$data1 = $rows1->toArray();
			$data2 = $rows2->toArray();
			$data3 = $rows3->toArray();
			$totd = 0;
			$totv = 0;
			$totg = 0;
			$staffsal =0;
			$feedcost = 0;
			foreach( $data3 as $id=>$value){
				$totd = $totd + $value->donation;
				$totv = $totv + $value->visitfee;
				$totg = $totg + $value->guidefee;
			}
			foreach( $data1 as $id=>$value){
				$staffsal = $staffsal + $value->salary;
			}
			foreach( $data2 as $id=>$value){
				$feedcost = $feedcost + $value->feed_cost;
			}
			$tot = $totd + $totv + $totg;
			
				echo "<table class='tabcs'>";
					echo "<tr>";
							echo "<th>Details</th>";
							echo "<th>Income</th>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>Donation Amount </td>";
							echo "<td>+".$totd."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>Guide Fee </td>";
							echo "<td>+".$totg."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>Visit Fee</td>";
							echo "<td>+".$totv."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>Total</td>";
							echo "<td>".$tot."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>	</td>";
							echo "<td>	</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<th>Details</th>";
							echo "<th>Expenditure</th>";
					echo "</tr>";
					echo "<tr>";
							echo "<td> Animal Feed </td>";
							echo "<td>-".$feedcost."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>Staff salary</td>";
							echo "<td>-".$staffsal."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>Guide Fee</td>";
							echo "<td>-".$totg."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>Total</td>";
							echo "<td>".($totg+$feedcost+$staffsal)."</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<td>	</td>";
							echo "<td>	</td>";
					echo "</tr>";
					echo "<tr>";
							echo "<th>Total Profit</th>";
							echo "<th>".($tot-$totg-$feedcost-$staffsal)."</th>";
					echo "</tr>";
				echo "</table>";
			
		
		?>
		</body>
	</html>