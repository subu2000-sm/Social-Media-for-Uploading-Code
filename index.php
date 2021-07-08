<!DOCTYPE html>
<html>
	<head>
		<meta ame="viewport" content="width=device-width, initial-scale=1">
		<title>Sign In</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="style3.css">
	</head>
	<body>
		<section>
			<div class="imgBx">
				<img src="adss.jpg">
			</div>
			<div class="contentBx">
				<div class="formBx">
					<h2>WELCOME</h2>
							  <?php if (isset($_GET['error'])): ?>
		<error><?php echo $_GET['error']; ?></error>
	<?php endif ?>
	<?php if (isset($_GET['success'])): ?>
            <success><?php echo $_GET['success']; ?></success>
        <?php endif ?>
					<form method='POST' action='login.php'>
						<div class="inputBx">
							<span>Username</span>
							<input type="text" placeholder="Enter your username" name="uname">
						</div>
						<div class="inputBx">
							<span>Password</span>
							<input type="password" placeholder="Enter your password" name="pwd">
						</div>
						<div class="remember">
							<label><input type="checkbox" name="remember"> Remember Me</label>
						</div>
						<div class="inputBx">
							<input type="submit" value="Log in" name="sub">
						</div>
						<div class="inputBx">
							<p>Don't have an account? <a href="signup.php">Sign Up</a></p>
						</div>
					</form>
				</div>
			</div>

		</section>
	</body>
</html>