<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="style2.css">
	</head>
	<body>
		<div class="container">
			<div class="title">Registration</div>
			<?php if (isset($_GET['error'])): ?>
            <error><?php echo $_GET['error']; ?></error>
        <?php endif ?>
       
			<form method='POST' action='signup_check.php'>
				<div class="user-details">
					<div class="input-box">
						<span class="details">Full Name</span>
						<input type="text" placeholder="Enter your name" name="fname" required>
				</div>
				<div class="input-box">
						<span class="details">Username</span>
						<input type="text" placeholder="Enter your username" name="uname" required>
				</div>
				<div class="input-box">
						<span class="details">Email</span>
						<input type="text" placeholder="Enter your email" name="email" required>
				</div>
				<div class="input-box">
						<span class="details">Phone Number</span>
						<input type="text" placeholder="Enter your phone number" name="pno" required>
				</div>
				<div class="input-box">
						<span class="details">Password</span>
						<input type="password" placeholder="Enter your password" name="pwd" required>
				</div>
				<div class="input-box">
						<span class="details">Confirm Password</span>
						<input type="password" placeholder="Confirm your password" name="rpwd" required>
				</div>
			</div>
				<div class="gender-details">
					<input type="radio" name="gender" id="dot-1" value="male">
					<input type="radio" name="gender" id="dot-2" value="female">
					<input type="radio" name="gender" id="dot-3" value="other">
					<span class="gender-title">Gender</span>
					<div class="category">
						<label for="dot-1">
							<span class="dot one"></span>
							<span class="gender">Male</span>
						</label>
						<label for="dot-2">
							<span class="dot two"></span>
							<span class="gender">Female</span>
						</label>
						<label for="dot-3">
							<span class="dot three"></span>
							<span class="gender">Other</span>
						</label>
					</div>
				</div>
				<div class="button">
					<input type="submit" value="Sign Up" name="sub">
				</div>
			</form>
		</div>

	</body>
</html>