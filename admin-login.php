<!DOCTYPE html>
<html>
<head>
  <title>EVS-login</title>
  <link rel="stylesheet" type="text/css" href="style/login.css">
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

  <div class="container">
	<fieldset class="borderfield">
		<!-- <legend class="legend">Enter Details</legend> -->
	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class = "form">
	      <h3>Enter Details</h3>
	      <label class="text">User Id:</label><br>
	      <input type="text" name="uid" required class="in"><br><br>
	      <label class="text">Pin:</label><br>
	      <input type="password" name="pin" class="in"><br><br>
	      <?php
	      	// error_reporting(E_PARSE | E_ERROR);  this line is used to hide warnings
	      	if($_SERVER["REQUEST_METHOD"] == "POST"){
	      		$uid = $_POST["uid"];
	      		$pass = $_POST["pin"];
	      		$pin="";
		      	

				$host="localhost";
				$user="root";
				$password="";
				$database="admin";

				$conn = new mysqli($host, $user,$password,$database);
				if($conn->connect_error){
					die("Connection failed!!! ".$conn->connect_error);
				}

				$sql = "SELECT password FROM admininfo WHERE uid=?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("i", $uid);
				$stmt->execute();
				$stmt->store_result();
				// echo $stmt->num_rows;

				$stmt->bind_result($pin);
				// while($stmt->fetch()){
				// 	echo "<br>".$pin."<br>";
				// }
				// echo $uid." ".$pass."<br>".$content ."<br>".$pin;
				// echo $pin."<hr>";
				if($stmt->num_rows == 0){
					echo "<p style='color:red;'>Either pin or user id is incorrect</p>";
				}
				else{
					$stmt->fetch();

					if($pin != $pass){
						echo "<p style='color:red;'>Either pin or user id is incorrect</p>";
					}
					else{
						// echo "<script>window.open(\'ballot.php\')</script>";
						// echo "<p>Successfully logged in</p>";
						header("Location: admin.php");
					}
				}

				$stmt->close();
				$conn->close();
			}
 		  ?>
	      <input type="submit" name="" class="button" value="Login">

	    </form>
	</fieldset>
  </div>
  <div class="clr"></div>

  <footer class="footer">Copyright &copy 2018 Government of India</footer>
</body>
</html>