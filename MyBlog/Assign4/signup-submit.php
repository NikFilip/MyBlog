#!/usr/bin/php-cgi

<?php include('top.html'); ?>

<!-- This code will proccess the information that was posted from signup.php
	 It creates variables for each of the inputs, then stores them in an array
	 That array then iterates through each value and appends it to singles.txt-->
<?php
	
	$userName    = $_POST['aName'];
	$sex         = $_POST['aGender'];
	$age         = $_POST['age'];
	$personality = $_POST['person'];
	$op          = $_POST['OS'];
	$fromAge     = $_POST['fromage'];
    $toAge       = $_POST['toage'];
    
    #used to check if user is existing already
    $varify      = 1;
    
    #looks through the singles file too see if user is already present
    $i = file("singles.txt");
	        #goes through each line(user) in the file
			foreach ($i as $that){
				$ar      = explode(",", $that);
				
				#goes through each word in the line, if the name matches
				#one in the system, save the info of that line(user)
				for ($x=0; $x<sizeof($ar);$x++){
					if ($userName == $ar[$x]){
						echo "<div>";
						echo "<p>";
						echo "Welcome back,". $userName . "!</br>";
						echo 'Now <a href="matches.php">login to see your matches! </a>';
						echo "</p>";
						echo "</div>";						
						$varify = 0;
					}
				}
			}
    
    #this part only adds the user to singles.txt if they arent already in the file (checks by username only!)
    #and prints a different statement if the user is new
    if ($varify != 0){
	    $newUser = array("Name"=>$userName, "sex"=>$sex, "age"=>$age, "personality"=>$personality, "OS"=>$op,
	    "fAge"=>$fromAge, "tAge"=>$toAge);
	    
	    foreach($newUser as $key => $value){
		    
		    $temp = $value . ",";
		    file_put_contents('singles.txt', $temp, FILE_APPEND);
		       
	    }
	    file_put_contents('singles.txt', "\n", FILE_APPEND);
	    echo "<div>";
	    echo "<p>";
	    echo "<strong> Thank you!</strong></br>";
	    echo "Welcome to NerdLuv,". $userName . "!</br>";
	    echo "Now <a href='matches.php'>login to see your matches! </a>";
	    echo "</p>";
	    echo "</div>";
    }    
?>	

<?php include("bottom.html"); ?>
