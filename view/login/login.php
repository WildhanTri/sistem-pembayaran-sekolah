<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="../../assets/css/style1.css">
	<link rel="stylesheet" href="../../assets/css/index1.css">
	<link rel="stylesheet" href="../../assets/plugin/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="formlogin">
		<form action="../../controller/msbank/submit.php" method="post" class="login">
			<img src="../../assets/images/banner.jpg">
			<input type="text" placeholder="Username" name="username" autofocus required/>
    		<i class="fa fa-user"></i>
    		<input type="password" placeholder="Password" name="password" required />
    		<i class="fa fa-key"></i>
			<button name="login" class="btnmasuk">Masuk</button>

		</form>
		<footer>©2017-Team Appes</footer>
	</div>
</body>
</html>