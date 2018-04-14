<html>
		<head>
		<meta charset="UTF-8">
		<title>Wildlife Sanctuary</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="shortcut icon" href="images/panda.ico" />
		<script>
		
		//var obj = document.getElementById('sb').;
		//obj.height='100px';
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
		<body onload="fun()">
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
		<div class="sidebar" id="sb">
		<table class = "sidetable">
		<tr><td ><a href="addsta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">ADD STAFF</a></td></tr>
		<tr><td><a href="updsta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">UPDATE STAFF</a></td></tr>
		<tr><td><a href="delsta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">DELETE STAFF</a></td></tr>
		<tr><td><a href="seasta.php" onmouseover="fun1(this)" onmouseout="fun2(this)">STAFF DATA</a></td></tr>
		</table>
		</div>		
		</body>
	</html>