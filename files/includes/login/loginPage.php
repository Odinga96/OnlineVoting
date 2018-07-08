<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
   <form action="login.php" method="POST">
   	<label>Name or Email</label>
   	<input type="text" name="username" placeholder="Username or email" required="" autocomplete="no">
   	<br>
   	<label>Password</label>
   	<input type="password" name="User_password" placeholder="Password" required="">
   	<br>
    <input type="submit" name="login" value="Sign in">
   </form>
</body>
</html>