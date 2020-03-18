<html>
 <head>
	<link href="../bootstrap.min.css" rel="stylesheet">
	<link href="../style.css"  rel="stylesheet">
		</div>
	<div>
		<nav class="navbar navbar-inverse" style="margin-bottom:0px">
		<div style="height:5px; background-color:#252525">		</div>
		<div class="container-fluid">
			<div class="navbar-header" style="padding:8px">
				<a class="navbar-brand" href="Home.php" style="font-size:30px">SWACHH NOIDA</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right" style="font-size:20px; padding:8px">	
				<?php

					if($thispage=="Home")
					{
						echo "<li class=\"active\"><a href=\"Home.php\">Home</a></li>";
					}
					else
					{
						echo "<li><a href=\"Home.php\">Home</a></li>";
					}
					if($thispage=="Logout")
					{
						echo "<li class=\"active\"><a href=\"Logout.php\">LogOut</a></li>";
					}
					else
					{
						echo "<li><a href=\"Logout.php\" style=\"color:Red\">LogOut</a></li>";
					}
				?>	
				
				
				
				</ul>
			</div>
		</div>
		</nav>
	</div>	
 </head>	
</html> 