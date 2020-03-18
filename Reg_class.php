<?php
 include "Validate.js";
 //To do Password and confirm password 
	class reg
	{
		function register()
		{
?>				
				<input type="text" name="fname" placeholder="First Name" required class="form-control">
				<br>
				<input type="text" name="lname" placeholder="Last Name" required class="form-control" >
				<br>
				<input type="password" name="pass" id="pass" placeholder="Enter Password" required class="form-control"  onkeyup="checkpass(this.value);confirpass()">
				<br>
				<span id="chck0" ></span>
				<input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required class="form-control"  onkeyup="confirpass();checkpass2(this.value)" >
				<br>
				<span id="chck3" ></span>
				<span id="chck4"></span>
				<input type="email" name="mail" placeholder="Email" required class="form-control" onblur="checkmail(this.value)">
				<br>
				<span id="chck1" ></span>
				<input type="number" name="mobile" placeholder="Mobile no." required class="form-control" onkeyup="checknum(this.value)">
				<br>
				<span id="chck2" ></span>
				<br>
				
<?php
		}
	}	
?>				