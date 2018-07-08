<?php
   session_start();

   
         echo $_SESSION['username']."<br>";
		 echo $_SESSION['image']."<br>";
		 echo $_SESSION['title']."<br>";
 ?>
 <div>
 	<img src=<?php echo $_SESSION['image']; ?> >
 </div>