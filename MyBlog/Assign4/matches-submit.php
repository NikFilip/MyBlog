#!/usr/bin/php-cgi

<!--This file processes the data passed in by matches.php 
	it checks the username against the singles.txt file to see if user is registered
	then it will find all compatible matches and display them-->
<?php include("top.html"); ?>	
<?php 	
	$name = $_GET['aName'];
	$count = 0;
	
	$i = file("singles.txt");
	        #goes through each line(user) in the file
			foreach ($i as $that){
				$ar      = explode(",", $that);
				
				#goes through each word in the line, if the name matches
				#one in the system, save the info of that line(user)
				for ($x=0; $x<sizeof($ar);$x++){
					if ($name == $ar[$x]){
						$Name   = $ar[$x];
						$Gender = $ar[$x + 1];
						$Age    = $ar[$x + 2];
						$Pers   = $ar[$x + 3];
						$OS     = $ar[$x + 4];
						$From   = $ar[$x + 5];
						$To     = $ar[$x + 6];
					}
				}
			}						
?>

<html>
	<strong> Matches for <?php echo $name ?> </strong>
	<div class="match">
		
		<?php 
			#goes through each user and stores their info into variables
			$i = file("singles.txt");
			foreach ($i as $that){
				$ar      = explode(",", $that);
				$pName   = $ar[0];
				$pGender = $ar[1];
				$pAge    = $ar[2];
				$pPers   = $ar[3];
				$pOS     = $ar[4];
				$pFrom   = $ar[5];
				$pTo     = $ar[6];
				
				#checks for similiarities in Personality Types letter by letter
				for ($x = 0; $x <4; $x++){
					if ($Pers[$x] == $pPers[$x]){
						$count = $count++;
					}
				}
				#only post the html cards if they match the requirements
				if (($pGender != $Gender)&&($pOS == $OS)&&($From <= $pAge)&&($pAge<= $To)&&(0 <= $count)){
					echo <<<EOT
					<p>
						$pName
						<img src = "user.jpg"/>
						<ul>
							<li>
								<strong>Gender:</strong>
								$pGender
							</li>
							
							<li>
								<strong>Age:</strong>
								$pAge
							</li>
							
							<li>
								<strong>Type:</strong>
								$pPers
							</li>
							
							<li>
								<strong>OS:</strong>
								$pOS
							</li>
								
					    </ul>
					</p>
EOT;

				}
			}
			
		?>
		
	</div>	
</html>
	
<?php include("bottom.html"); ?>
