<html>
<head>
<style>
#map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
	  </style>
</head>
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
  class register extends db
	{
	    function insert($a,$b,$c,$d,$e)
			{
				 $this->sel2="Select * from register";
				 $uid=" ";
				 $res2=mysqli_query($this->con,$this->sel2);	
				 while($row2=mysqli_fetch_array($res2))
				  {
					$uid=$row2["uid2"];
				  }	
			 $inf=" ";
			 $uid=$uid+1;
			 $id="U000".$uid;
			 $this->ins="insert into register(uid,uid2,fname,lname,password,email,mobile) 
			              values('$id','$uid','$a','$b','$c','$d','$e')"; 
			 if(mysqli_query($this->con,$this->ins))
			  {
			    $inf=1;
				$this->ids="select * from register where mobile='$e'" ;
				$rst=mysqli_query($this->con,$this->ids);
				$row=mysqli_fetch_array($rst);
			  }	
			 else
		      {	
			    $inf=-1;
				echo "<center><h3 style=\" color:red \">".mysqli_error($this->con)."</h3></center>";
			  }				 
			 return $inf;		
			}
			
		function insert2($a,$b,$c,$d,$e,$f,$g)
			{
			 $inf=" ";
			 $this->ins="insert into swregister(wid,fname,lname,password,email,mobile,upic) 
			              values('$a','$b','$c','$d','$e','$f','$g')"; 
			 if(mysqli_query($this->con,$this->ins))
			  {
			    $inf=1;
				$this->ids="select * from swregister where mobile='$f'" ;
				$rst=mysqli_query($this->con,$this->ids);
				$row=mysqli_fetch_array($rst);
			  }	
			 else
		      {	
			    $inf=-1;
				echo "<center><h3 style=\" color:red \">".mysqli_error($this->con)."</h3></center>";
			  }				 
			 return $inf;		
			}

		function insert3($a,$b,$c,$d,$e,$f)
			{
			 $inf=" ";
			 $this->ins="insert into inregister(iid,fname,lname,password,email,mobile) 
			              values('$a','$b','$c','$d','$e','$f')"; 
			 if(mysqli_query($this->con,$this->ins))
			  {
			    $inf=1;
				$this->ids="select * from inregister where mobile='$f'" ;
				$rst=mysqli_query($this->con,$this->ids);
				$row=mysqli_fetch_array($rst);
			  }	
			 else
		      {	
			    $inf=-1;
				echo "<center><h3 style=\" color:red \">".mysqli_error($this->con)."</h3></center>";
			  }				 
			 return $inf;		
			}
			
		function log($mail,$p)
			{
				 $spf=" ";
				 $pass=sha1($p);
				 $this->sel="Select * from register where email='$mail' and password='$pass'";
				 $res=mysqli_query($this->con,$this->sel);	
				 $row=mysqli_fetch_array($res);
				 if($row==0)
				  {
					$spf=-1;
				  }	
				 else
				  {	
					$spf=1;
				  }	
				return $spf;		
			}	
		
		function log2($mail,$p)
			{
				 $spf=" ";
				 $pass=sha1($p);
				 $this->sel="Select * from inregister where email='$mail' and password='$pass'";
				 $res=mysqli_query($this->con,$this->sel);	
				 $row=mysqli_fetch_array($res);
				 if($row==0)
				  {
					$spf=-1;
				  }	
				 else
				  {	
					$spf=1;
				  }	
				return $spf;		
			}	
	}		
	
	class Complaints extends db
	{
		function Pending()
		{
			$this->cmd="Select cid,uid,com_desc,com_loc_long,com_loc_lati,com_img,status from pending";
			$res=mysqli_query($this->con,$this->cmd);
			while(($row=mysqli_fetch_array($res)))
			{	
						echo "<tr style=\"height:250px\"><td><font color=\"red\">".$row["cid"]."</td>";
						echo "<td>".$row["uid"]."</td> ";
						echo "<td>".$row["com_desc"]."</td>";
						echo "<td>".$row["com_loc_long"]." ";
						echo " ".$row["com_loc_lati"]." </td>";
						echo "<td><img src='../Users/".$row["com_img"]."' width=100 height=80></td> ";
						echo "<td>".$row["status"]."</font></td></tr>";				
			}
				return $row["com_loc_long"].$row["com_loc_lati"];
		}
		function Resolved()
		{
			$this->cmd="Select cid,uid,com_desc,com_loc_long,com_loc_lati,com_res_loc_long,com_res_loc_lati,com_img,com_res_img,status from resolve";
			$res=mysqli_query($this->con,$this->cmd);
			while(($row=mysqli_fetch_array($res)))
			{	
						echo "<tr><td><font color=\"red\">".$row["cid"]."</td>";
						echo "<td>".$row["uid"]."</td> ";
						echo "<td>".$row["com_desc"]."</td>";
						echo "<td>".$row["com_loc_long"]."  ".$row["com_loc_lati"]." </td>";
						echo "<td>".$row["com_res_loc_long"]."  ".$row["com_res_loc_lati"]." </td>";
						echo "<td><img src='../Users/".$row["com_img"]."' width=80 height=50></td> ";
						echo "<td><img src='../Users/".$row["com_res_img"]."' width=80 height=50></td> ";
						echo "<td>".$row["status"]."</font></td></tr>";				
			}	
		}	
	}	