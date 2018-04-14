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
			$mng = new MongoDB\Driver\Manager('mongodb://localhost:27017');
			$query = new MongoDB\Driver\Query(["id"=>(int)$_POST["id"]]); 
            $rows = $mng->executeQuery("sample.tourists", $query);
			$data = $rows->toArray();
			if(empty($data)){
			echo "<script>alert('Tourist ID you entered doesnt exists! ');</script>";
			}
			else{
				foreach ($data as $id => $value){
					$vfee = $value->visitfee;
					$gfee = $value->guidefee;
					$don = $value->donation;
					$gui = $value->guide;
					$name = $value->name;
				}
				ob_start();
				require('fpdf181/fpdf.php'); 
				$pdf = new FPDF();
				$pdf->AddPage();
				$pdf->setFillColor(100,100,200);
				$pdf->SetFont('Arial','B',16);
				$pdf->Cell(68);
				$pdf->Cell(47,20,"Wildlife Sanctuary\n\n");
				$pdf->Ln();
				$pdf->Cell(45);
				$pdf->SetFont('helvetica','B',14);
				$pdf->Cell(50,10,"Tourist ID",1,0);
				$pdf->Cell(50,10,$_POST['id'],1,1);
				$pdf->Cell(45);
				$pdf->Cell(50,10,"Tourist Name",1,0);
				$pdf->SetFont('Arial','I',16);
				$pdf->Cell(50,10,$name,1,1);
				
				$pdf->SetFont('helvetica','B',14);
				$pdf->Cell(45);
				$pdf->Cell(50,10,"Guide",1,0);
				$pdf->SetFont('Arial','I',16);
				$pdf->Cell(50,10,$gui,1,1);
				
				$pdf->SetFont('helvetica','B',14);
				$pdf->Cell(45);
				$pdf->Cell(50,10,"Guide Fee",1,0);
				$pdf->SetFont('Arial','I',16);
				$pdf->Cell(50,10,$gfee,1,1);
				
				$pdf->SetFont('helvetica','B',14);
				$pdf->Cell(45);
				$pdf->Cell(50,10,"Visit Fee",1,0);
				$pdf->SetFont('Arial','I',16);
				$pdf->Cell(50,10,$vfee,1,1);
				
				$pdf->SetFont('helvetica','B',14);
				$pdf->Cell(45);
				$pdf->Cell(50,10,"Donation",1,0);
				$pdf->SetFont('Arial','I',16);
				$pdf->Cell(50,10,$don,1,1);
				$pdf->SetFont('helvetica','B',14);
				$pdf->Cell(45);
				$pdf->Cell(50,10,"Total",1,0);
				$pdf->SetFont('Arial','I',16);
				$pdf->Cell(50,10,($gfee+$vfee+$don),1,1);
				$pdf->output();
				ob_end_flush();



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
		<tr><td><a href="pritic.php"onmouseover="fun1(this)" onmouseout="fun2(this)">PRINT TICKET</td></tr>
		</table>	
		</div>
		<div class="log-form">
		<h2>Print Ticket </h2>
		<form action="pritic.php" method="post" >
			<input type="number" name="id" placeholder="Tourist ID" required />
			<button type="submit" class="btn" name="submit">Print</button>

		</form>
		</div>
		
		</body>
	</html>