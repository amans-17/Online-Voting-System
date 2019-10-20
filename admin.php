<!DOCTYPE html>
<html>
<head>
	<title>administrator</title>
	<link rel="stylesheet" type="text/css" href="style/admin.css">
</head>
<body>
	<header class="header">
    	<h1>Electronic Voting System</h1>
  	</header>

  	<nav class="nav">
    	<ul class="list">
      	<li class="items" style="padding-right: 20px; padding-left: 1110px;"><a href="about.html" class="link">About</a></li>
      	<li class="items"><a href="candidates.php" class="link">Candidate list</a></li>
    	</ul>
  	</nav>
  	<div class="big-container">
		<div class="container">
			<legend style="text-align: center;"><h3>Fill new candidate details</h3></legend>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="form">
				<table align="center">
					<tr>
						<td>Party Name</td>
						<td><input type="text" name="PartyName"></td>
					</tr>
					<tr>
						<td>Abbrevation</td>
						<td><input type="text" name="abbr"></td>
					</tr>
					<tr>
						<td>Symbol</td>
						<td><input type="text" name="symbol"></td>
					</tr>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name"></td>
					</tr>					
					<tr>
						<td>Age</td>
						<td><input type="number" name="age"></td>
					</tr>
					<tr>
						<td>Locality</td>
						<td><input type="text" name="locality"></td>
					</tr>
				</table>
				<br>
				<div class = "wrapper">
					<?php
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$host = "localhost";
							$user = "root";
							$password = "";
							$database = "ballot";

							$conn = new mysqli($host, $user, $password, $database);
							if($conn->connect_error){
								echo "Connection failed!!! ".$conn->connect_error;
							}
							$PartyName = $_POST["PartyName"];
							$abbr = $_POST["abbr"];
							$name = $_POST["name"];
							$age = $_POST["age"];
							$symbol = $_POST["symbol"];
							$locality = $_POST["locality"];
							// $district = $_POST["district"];

							$sql = "INSERT INTO candidates(PartyName, abbr, symbol, name, age, locality) VALUES(?,?,?,?,?,?)";
							$stmt = $conn->prepare($sql);
							$stmt->bind_param("ssssis", $PartyName, $abbr, $symbol, $name, $age, $locality);
							$stmt->execute();			//will return 1 if executes successfully otherwise 0

							if($stmt){
								echo "Successfully added to database.";
							}
							else{
								echo "Error!!";
							}

							$stmt->close();
							$conn->close();
						}
					?>
				
					<br><input type="submit" name="" value="ADD" class="button">
				</div>
			</form>
		</div>
	</div>
	<div class="clr"></div>
	<footer class="footer">Copyright &copy 2018 Government of India</footer>
</body>
</html>
