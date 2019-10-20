<!DOCTYPE html>
<html>
<head>
	<title>Make selection</title>
	<link rel="stylesheet" type="text/css" href="style/ballot.css">
</head>
<body>
	<h1 class="header">Welcome to the online voting interface</h1>	
	<div class="container">
		<form action="submission.php" method="POST">
			<?php
				$host = "localhost";
				$user = "root";
				$password = "";
				$database = "ballot";

				$PartyName=$abbr=$name=$symbol=$age=$locality="";
				$conn = new mysqli($host, $user, $password, $database);
				if($conn->connect_error){
					die("Connection failed!!! ".$conn->connect_error);
				}

				$sql = "SELECT PartyName, abbr, symbol, name, age, locality FROM candidates";
				$stmt = $conn->prepare($sql);
				// $stmt->bind_param(,)
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($PartyName, $abbr, $symbol, $name, $age, $locality);

				if($stmt->num_rows <= 0){
					echo "No records are present in the database<br>";
				}
				else{
					$idx = 1;
					$text = "
						<table cellspacing='10' class='table' align='center'>
							<tr>
								<td>Sr No.</td>
								<td>Party Name</td>
								<td>Abbreviation</td>
								<td>Symbol</td>
								<td>Name</td>
								<td>Age</td>
								<td>Locality</td>
								<td>Selection</td>
							</tr>";

					while($stmt->fetch()){
						$text .= "<tr>
									<td>".$idx."</td>
									<td>".$PartyName."</td>
									<td>".$abbr."</td>
									<td><img src= ".$symbol." alt=".$abbr." class='img'></img></td>
									<td>".$name."</td>
									<td>".$age."</td>
									<td>".$locality."</td>
									<td><input type='radio' name='selection' value=".$name."></td>
								</tr>";

						$idx += 1;
					}
					$text .= "</table>";
					echo $text;

					echo "<br><br>
					<div style='text-align: center;''>
						<input type='submit' name='' value='Submit' class='button'>
					</div>";
				}

				$stmt->close();
				$conn->close();
			?>
		</form>
	</div>
	<footer class="footer">Copyright &copy 2018 Government of India</footer>
</body>
</html>