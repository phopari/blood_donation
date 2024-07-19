<!DOCTYPE html>
<html lang="en">
<style>
body {
	background-image: linear-gradient(to bottom, #FF3737, #FFC5C5);
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

.ios-background {
	height: 100vh;
	margin: 0;
	display: flex;
	justify-content: center;
	align-items: center;
}

.ios-login-box {
	background-color: #fff;
	padding: 20px;
	border: 1px solid #ddd;
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	width: 400px;
}

h1 {
	margin-top: 0;
	color: #333;
	font-weight: bold;
	text-align: center; /* Add this to center the h1 */
}

.ios-textbox {
	margin-bottom: 20px;
}

.ios-textbox i {
	color: #666;
	margin-right: 10px;
}

.ios-textbox input[type="text"], .ios-textbox input[type="password"] {
	width: 90%;
	padding: 15px; /* Increase the padding to make the input box larger */
	border: 1px solid #ccc;
	border-radius: 5px;
}

.ios-button {
	background-color: #FF3737;
	color: #fff;
	padding: 15px 30px; /* Increase the padding to make the button larger */
	border: none;
	border-radius: 5px;
	cursor: pointer;
	display: block; /* Add this to center the button */
	margin: 0 auto; /* Add this to center the button */
}

.ios-button:hover {
	background-color: #FFC5C5;
}

/* Add animation styles */
.drop-of-blood {
	position: absolute;
	top: 0;
	left: 50%;
	transform: translate(-50%, 0);
	animation: drop 3s ease-in-out infinite;
}

@keyframes drop {
	0% {
		transform: translate(-50%, 0);
	}
	50% {
		transform: translate(-50%, 50vh);
	}
	100% {
		transform: translate(-50%, 100vh);
	}
}

.blood-drop {
	width: 20px;
	height: 20px;
	background-color: #FF3737;
	border-radius: 50%;
	animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
	0% {
		transform: scale(1);
	}
	50% {
		transform: scale(1.2);
	}
	100% {
		transform: scale(1);
	}
}

/* Add styles for the Red Cross logo */
.red-cross-logo {
	position: absolute;
	top: 10px;
	left: 10px;
	width: 40px;
	height: 40px;
	background-image: url('red-cross-logo.png');
	background-size: contain;
	background-repeat: no-repeat;
}
</style>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="login.css">
	<title>Login Page</title>
</head>

<body>
	<div class="ios-background">
		<!-- Add the Red Cross logo -->
		<div class="red-cross-logo"></div>
		<div class="ios-login-box">
			<h1><i class="fa fa-tint" aria-hidden="true"></i> Login</h1>
			<form action="validate.php" method="post">
				<div class="ios-textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="Username" name="username" value="">
				</div>

				<div class="ios-textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="Password" name="password" value="">
				</div>

				<input class="ios-button" type="submit" name="login" value="Sign In">
			</form>
		</div>
		<!-- Add animation elements -->
		
	</div>
</body>

</html>