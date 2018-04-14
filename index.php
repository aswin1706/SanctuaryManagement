<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title>Wildlife Sanctuary</title>
  <link rel="stylesheet" href="css/style.css">	
  <link rel="shortcut icon" href="images/panda.ico" />
  <style>
	.head{
	height: 113px;
    width: auto;
    background-color: #2a2a2a;
    margin: -12px;
    text-align: center;
    color: white;
    font-size: 35px;
    padding: 25px;
    font-family: 'open sans condensed';
	}
  </style>
  <script>
 <?php if($_GET["flag"]== 0 ){
 echo "alert('Invalid Username/Password');";}
 ?>  
 </script>
</head>


<body translate="no" >
  <div class="head"> WILDLIFE SANCTUARY </div>
  <div class="log-form">
  <h2>Administrator Login </h2>
  <form action="check.php" method="post" >
    <input type="text" name="user" placeholder="Username" required />
    <input type="password" name="pass" placeholder="Password" required />
    <button type="submit" class="btn" name="submit">Login</button>

  </form>
</div>
</body>
</html>
 