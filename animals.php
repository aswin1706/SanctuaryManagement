<html>
		<head>
		<meta charset="UTF-8">
		<title>Wildlife Sanctuary</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bar.css">
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
				<td bgcolor='#212121'><a href=""> ANIMALS </a></td>
				<td><a href="tourists.php"> TOURISTS </a></td>
				<td><a href="index.php">LOGOUT </a></td>
				
			</tr>
		</table>
		<br>
		</div>
		<div class="sidebar" id="sb">
		<table class = "sidetable">
		<tr><td><a href="addani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">ADD ANIMAL</a></td></tr>
		<tr><td><a href="updani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">UPDATE ANIMAL</a></td></tr>
		<tr><td><a href="delani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">DELETE ANIMAL</a></td></tr>
		<tr><td><a href="serani.php" onmouseover="fun1(this)" onmouseout="fun2(this)">ANIMAL DATA</a></td></tr>
		</table>
		</div>
		</body>
	</html>