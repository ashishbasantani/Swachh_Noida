<html>
 <head>
	<link href="../bootstrap.min.css" rel="stylesheet">
	<link href="../style.css"  rel="stylesheet">
		</div>
	<div>
		<nav class="navbar navbar-inverse" style="margin-bottom:0px">
		<div class="container-fluid">
			<div class="navbar-header" style="padding:8px;">
				<a class="navbar-brand" href="../Home.php" style="font-size:30px">SWACHH NOIDA</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-left" style="font-size:20px; padding:8px">	
				<?php
					if($thispage=="Pending")
					{
						echo "<li class=\"active\"><a href=\"Pending.php\">Pending</a></li>";
					}
					else
					{
						echo "<li><a href=\"Pending.php\">Pending</a></li>";
					}
					if($thispage=="Resolved")
					{
						echo "<li class=\"active\"><a href=\"Resolved.php\">Resolved</a></li>";
					}
					else
					{
						echo "<li><a href=\"Resolved.php\">Resolved</a></li>";
					}
				?>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="font-size:20px;">	
				<?php
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