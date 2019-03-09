#!/usr/bin/php-cgi

<!-- This php creates a form that is used to submit data to matches-submit.php using the get method-->
<?php include'top.html'; ?>

<fieldset><legend>Returning User:</legend>
	<form action="matches-submit.php" method= get>
		<p> 
			<label>
			<strong>Name:</strong>
			<input type="text" id="name" name ="aName" size="16" required=""/>
			</label>
		</p>
		<input type= submit value="View My Matches"/>
	</form>
</fieldset>	

<?php include("bottom.html"); ?>