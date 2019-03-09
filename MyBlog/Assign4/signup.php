#!/usr/bin/php-cgi

<!-- This php file creates a form that will send information by post to signup-submit.php-->
<?php include("top.html"); ?>
<html>
	<fieldset><legend>New User Signup:</legend>
		<body>
		<div>
		<form action="signup-submit.php" method="post">

				<label>
				<strong>Name:</strong>
				<input type="text" id="name" name ="aName" size="16" pattern="[A-Z a-z]{1,20}" 
				title="Only capital and lowercase letters" required>
				</label>
			    </br>
			    <label>
				<strong>Gender:</strong>
				<input type=radio id="gender" name="aGender" value="M" checked>Male
				<input type=radio id="gender" name="aGender" value="F"> Female
			    </label>
				</br>
				<label>
				<strong> Age:</strong>
				<input type="text" id="age" name="age" size="6" maxlength="2" pattern="[0-9]{1,2}" 
				title="Only numbers" required>
				</label>
				</br>
				<label> 
				<strong>Personality type:</strong>
				<input type="text" name="person" id"p" size="6" maxlength="4" pattern="[A-Z]{1,4}" 
				title= "Only Capital Letters" required>
				(<a href="http://www.humanmetrics.com/cgi-win/jtypes2.asp">Don't know your type?</a>)
				</label>
				</br>
				<label>
				<strong>Favourite OS:</strong>
				<select name="OS">
				<option value="Windows">Windows</option>
				<option value="Mac">Mac OS</option>
				<option value="Windows">Linux</option>
				</select>
				</label>
				</br>
				<strong>Seeking age:</strong>
				<input type="text" name="fromage" size="6" maxlength="2" placeholder="min" pattern="[0-9]{1,2}" required> to 
				<input type="text" name="toage" size="6" maxlength="2" placeholder="max" pattern="[0-9]{1,2}" required>
				</br>
				<input type="submit" value="Sign Up">
	
		</form>	
		</div>
		</body>
	</fieldset>
</html>

<?php include("bottom.html"); ?>
