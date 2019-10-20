<!DOCTYPE html>
<html>
<head>
	<title>Electronic Voting System</title>
	<link rel="stylesheet" type="text/css" href="style/user.css">
</head>
<body>
	<header class="header">
		<h1>Electronic Voting System</h1>
	</header>
	<nav class="nav">
		<ul class="list">
			<li class="items"><a href="about.html" class="links" style="padding-right: 20px; padding-left: 1110px;">About</a></li>
			<li class="items"><a href="candidates.php" class="links">Candidate list</a></li>
		</ul>
	</nav>
	<div class="container_big">
		<div class="container">
			<div class="container1">
				<h3 class="sub-heading">INSTRUCTIONS</h3>
				<p class="instructions">
					Instructions for the voters
				</p>
			</div>
			<div class=container2>
				<form action="login.php">
					<input type="checkbox" name="check" id="demo" required>
					<span>I hereby understand all the instructions</span>
					<input type="Submit" name="Submit" class="button" value="Submit">
			</div>
			<!-- <script type="text/javascript">
				function myfunction(){
				var x = document.getElementById("demo").required;
				document.getElementById("demo1").innerHTML = x;
			}
			</script> -->
			</form>
		</div>
	</div>
	<div class="clr"></div>
	<footer class="footer">Copyright &copy 2018 Government of India</footer>
</body>
</html>