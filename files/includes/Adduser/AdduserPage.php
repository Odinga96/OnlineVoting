<!DOCTYPE html>
<html>
<head>
	<title>Add new User</title>
</head>
<body>
     <form method="POST" action="Adduser.php" enctype="multipart/form-data"> 
     	<table>
     		<tr><td><label>Name</label></td><td><input type="text" name="name" required=""></td></tr>
     		<tr><td><label>Id number</label></td><td><input type="text" name="id" required=""></td></tr>
     		<tr><td><label>Picture</label></td><td><input type="file" name="image" required=""></td></tr>
     		<tr><td><label>Category</label></td><td><input type="text" name="categ" required=""></td></tr>
            <!--<tr><td><label></label></td><td><input type="text" name="name"></td></tr>!-->
     		<tr><td><label>Tittle</label></td><td><input type="text" name="tittle" required=""></td></tr>
     		<tr><td><label>Region type</label></td><td><input type="text" name="reg_type" required=""></td></tr>
     		<tr><td><label>Region</label></td><td><input type="text" name="region" required=""></td></tr>
     		<tr><td><label>Description</label></td><td><textarea name="describe"  required=""></textarea></td></tr>
     		<tr><td><label>Email</label></td><td><input type="email" name="email" required=""></td></tr>
     		<tr><td><label>Phone number</label></td><td><input type="number" name="phone" required=""></td></tr>
     		<tr><td><label>Date</label></td><td><input type="date" name="date" required=""></td></tr>
     	</table>
     	<input type="submit" name="add" value="Add new User">
     </form>
</body>
</html>