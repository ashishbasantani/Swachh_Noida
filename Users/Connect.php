<?php
  class db
	{
		var $con;
		function __construct()
		{
		  if(mysqli_connect("localhost","root","","eco"))	
		     $this->con=mysqli_connect("localhost","root","","eco");
		  else
		    die("Could Not Connect:".mysqli_error($this->con));	
		}	
	}
  class Operations extends db
	{
		function get($mail)
		{
				$this->sel="Select * from register where email='$mail'";
				 $res=mysqli_query($this->con,$this->sel);	
				 $row=mysqli_fetch_array($res);
				 if($row==0)
				  {
					$spf=-1;
				  }	
				 else
				  {	
					$spf=$row["uid"];
				  }	
				return $spf;		
		}
		
		function get2()
		{
				 $this->sel="Select * from pending";
				 $cid=" ";
				 $res=mysqli_query($this->con,$this->sel);	
				 while($row=mysqli_fetch_array($res))
				  {
					$cid=$row["cid2"];
				  }	
				return $cid;		
		}
		
	/*	function inpic($a)
		{
			$this->inserttt="insert into pending(com_img) values ('$a')";
			if(mysqli_query($this->con,$this->inserttt))
			  {
					echo "<font size=20px; color=\"blue\">Done</font>";
			  }
			  else
			  {
				echo mysqli_error($this->con);
			  }
		}*/
		function insert($a,$b,$c,$d,$e,$f,$g,$h)
		{
			
			//$this->ins="insert into pending(cid,uid,com_desc,com_loc_long,com_loc_lati,com_img,status)  values('c','$uid','$desc','$lati','$long','$gpic','space')"; 
			$this->ins="insert into pending values('$a','$b','$c','$d','$e','$f','$g','$h')"; 
			 if(mysqli_query($this->con,$this->ins))
			  {
					echo "<font size=20px; color=\"blue\">Done</font>";
			  }	
			  else
			  {
					echo "<font size=20px; color=\"red\">";
					echo mysqli_error($this->con);
					echo "Not Done</font>";
			  }
		}
		
		function fetch($uid)
		{
				$this->fet="Select cid,com_desc,status from pending where uid='$uid'";
				$res=mysqli_query($this->con,$this->fet);	
				echo "<table border=3 width=100%>";
				echo "<tr><th>Complaint ID</th>";
				echo "<th>Complaint Description</th>";
				echo "<th>Status</th></tr>";	
				while($row=mysqli_fetch_array($res))
				{
						echo "<tr><td>". $row["cid"]."</td> ";
						echo "<td>".$row["com_desc"]."</td>";
						echo "<td>".$row["status"] ."</td></tr>" ;
				}	
				$this->fet2="Select cid,com_desc,status from resolve where uid='$uid'";
				$res2=mysqli_query($this->con,$this->fet2);	
				while($row2=mysqli_fetch_array($res2))
				{
						echo "<tr><td>". $row2["cid"]."</td> ";
						echo "<td>".$row2["com_desc"]."</td>";
						echo "<td>".$row2["status"] ."</td></tr>" ;
				}
				echo "</table>";
		}
	}	