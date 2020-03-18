<html lang="en">
<head>
  <title>Swachh Noida</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" style="margin-bottom:0px">
  <div class="container-fluid">
    <div class="navbar-header" style="padding:8px">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="Home.php" style="font-size:30px">SWACHH NOIDA</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="font-size:20px; padding:8px">
        
        <li class="dropdown">
				<?php
					if($thispage=="Home")
					{
						echo "<li class=\"active\"><a href=\"Home.php\">Home</a></li>";
					}
					else
					{
						echo "<li><a href=\"Home.php\">Home</a></li>";
					}
					if($thispage=="Register")
					{
						echo "<li class=\"active\"><a href=\"Register.php\">Register</a></li>";
					}
					else
					{
						echo "<li><a href=\"Register.php\">Register</a></li>";
					}
					if($thispage=="Login")
					{
						echo "<li class=\"active\"><a href=\"Signin.php\">Login</a></li>";
					}
					else
					{
						echo "<li><a href=\"Signin.php\">Login</a></li>";
					}
				?>	
				
				</ul>
			</div>
		</div>
		</nav>
	</div>	
 </head>	
</html> 