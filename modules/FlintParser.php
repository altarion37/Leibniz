<?php

// require 'Token.php';

$flintCode = $_POST['flintCode'];
// $testingMode = $_POST['test'];
$testingMode = true;



$lexer = new Lexer;
$lexer ->tokenize($flintCode, $testingMode);





class Lexer{

	public function tokenize($flintCode, $testingMode){
	    $codeLength = strlen($flintCode);
	    if($testingMode){
	    	echo "The parser has identified the following tokens:<br><br>";
	    }


        $i = 0;

        while($i < $codeLength) {
        	$currChar = $flintCode[$i];
        	switch($currChar) {

        		// Looking for "context"
        		case 'c':
        			if( $flintCode[$i+1] == 'o' && $flintCode[$i+2] == 'n' && $flintCode[$i+3] == 't' && $flintCode[$i+4] == 'e' && $flintCode[$i+5] == 'x' && $flintCode[$i+6] == 't' ){

        				$i += 8;
        				// echo "Current chars: ".$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5].$flintCode[$i+6].$flintCode[$i+7];
        				if($testingMode == true){
        					echo "Context name: ";
        				}

        				while (!ctype_space($flintCode[$i]) ) {
        					if($testingMode){
        						echo $flintCode[$i];
        					}
        					$i++;
        				}
        				echo "<br>";
        				// echo "<br>Chars after context: ".$flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5]."<br>";
        				break;
        			}
        			else break;



        		// Looking for "feit"
        		case 'f':
        			if( $flintCode[$i+1] == 'e' && $flintCode[$i+2] == 'i' && $flintCode[$i+3] == 't' ){

        				// Argument structure: "feit "<contextName>"("<argVarialble_1>": "<argnName_1>") {"<definitionTitle_1>" = "<definitionContent> " "<mainContent>"}"
        				// Argument structure: "feit "<contextName>"("<argVarialble_1>": "<argnName1_>, ... ,"<argVarialble_N>": "<argnName_N>) {"<definitionTitle_1>" = "<definitionContent>"}"

        				$i += 5;
        				// echo "Current chars: ".$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5].$flintCode[$i+6].$flintCode[$i+7];
        				if($testingMode){
        					echo "<br>Fact name: ";
        				}

        				while ($flintCode[$i] != '(' ) {
        					if($testingMode){
        						echo $flintCode[$i];
        					}
        					$i++;
        				}
        				echo "<br>";
        				// $i += 1;
        				// At this point, our char is the open bracket "("
        				// echo '<br>Current char, should be Open round bracket (: '.$flintCode[$i]."<br>";


        				// Check if there are no arguments inside the round brackets "(...)"
        				// Should in most cases be skipped
				        if($flintCode[$i+1] == ')' || $flintCode[$i+2] == ')' || $flintCode[$i+3] == ')'){
				        	if($testingMode){
        						echo "No arguments in the round brackets: ";

		        				// Get rid of possible white space after the brackets
		        				while (ctype_space($flintCode[$i]) || $flintCode[$i] == ')') {	
		        					echo $flintCode[$i];
			        				$i++;
			        			}

			        			if($flintCode[$i+1] == ')'){
			        				echo "Here we go!<br>";
			        				$i += 2;

			        				// Remove possible whitespace
			        				while (ctype_space($flintCode[$i])) {	
		        						echo $flintCode[$i];
			        					$i++;
			        				}
			        			}

			        			// echo "No arguments inside the round brackets, so far, so good. ";

        					}
				        }

        				//If brackets not empty, get arguments
        				// else if($flintCode[$i+1] != ')'){
        				else{

        					if($testingMode){
        						// This echo should print out a round opening bracket "("
        						// echo "<br>Char before we start processing arguments: ".$flintCode[$i]."<br>";
        						$i += 1;
        					}
        					
	        				// Process arguments inside the brackets ()
	        				while ($flintCode[$i] != ')' ) {

	        					// echo "<br>";

	        					// Argument structure: 
								if( $flintCode[$i+1] == ':' ){
									if($testingMode){
										echo "Argument variable: ".$flintCode[$i]."<br>";
									}
	        						$i += 2;

	        						// Loop to process the argument's name
	        						echo "Argument name: ";
	        						while ($flintCode[$i] != ',' && $flintCode[$i] != ')') {
	        							if($testingMode){
	        								echo $flintCode[$i];
	        							}
	        							$i++;
	        						}
	        						$i += 1;
        							if($testingMode){
        								echo "<br>";
        							}

	        						// echo "<br>Processed argument name: ".$flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5].$flintCode[$i+6]."<br>";



	        						$i++;
	        						// echo "Last flint code: ".$flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3]."<br>";


	        					}   
	        					else{
	        						// echo "<br>Something went wrong, we got here: ".$flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5].$flintCode[$i+6].$flintCode[$i+7].$flintCode[$i+8].$flintCode[$i+9].$flintCode[$i+10].$flintCode[$i+11].$flintCode[$i+12];
									// $i++;
									break;
								}

								// echo "<br>What happens after the big while?: ".$flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3]."<br>";


							// Closing bracket big while -> argument processing
	        				}

	        			// Closing bracket else -> case that there were arguments + they have been processed
	        			}

	        			// At this point we are done processing the round brackets ()
	        			// echo "We are done processing the round brackets ()! <br>";




        				// At this point we have got the arguments and are about to parse the stuff inside the curly brackets {...}
        				// echo "<br>Current char after brackets: ".$flintCode[$i]."<br>";

        				// Get rid of possible white space after the brackets
        				while (ctype_space($flintCode[$i])) {	
	        				$i++;
	        			}

	        			if($testingMode){
	        				// This should return a curly bracket
	        				// echo "Chars after getting rid of white space: ".$flintCode[$i]."<br>";
	        			}
	        			$i++;

	        			// Get rid of more white space after 
	        			while (ctype_space($flintCode[$i])) {	
	        				$i++;
	        			}

	        			// // No arguments within the curly brackets {}
	        			if($flintCode[$i] == '}'){
	        				if($testingMode){
	        					echo "No arguments within the curly brackets {}<br>";
	        				}
	        				break;
	        			}


	        			if($testingMode){
	        				echo "Main node content: ";
	        			}


        				// Processing the actual argument inside the brackeds {}
        				while ($flintCode[$i+1] != '}' ) {

        					// Checking for id
	        				if($flintCode[$i] == 'i' && $flintCode[$i+1] == 'd') {
	        					// Check if there actually are any sources after the code word
	        					if($flintCode[$i+3] == '=' && !ctype_space($flintCode[$i+5])){
	        						$i += 5;
	        						echo "<br>Id: ";

	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
		        					
		        					// All references processed
		        					// echo "<br>";
	        					}
	        					// Otherwise skip juriconnect-code
	        					else{
	        						$i += 3;
	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
	        					}
	        				}

	        				// Checking for references ('ref')
	        				if($flintCode[$i] == 'r' && $flintCode[$i+1] == 'e' && $flintCode[$i+2] == 'f') {
	        					// Check if there actually are any sources after the code word
	        					if($flintCode[$i+4] == '='){
	        						$i += 6;
	        						echo "<br>References: ";

	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
		        					
		        					// All references processed
		        					// echo "<br>";
	        					}
	        					// Otherwise skip references
	        					else{
	        						$i += 3;
	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
	        					}
	        				}

	        				// Checking for juriConnect
	        				if($flintCode[$i] == 'j' && $flintCode[$i+1] == 'u' && $flintCode[$i+2] == 'r' && $flintCode[$i+3] == 'i') {

	        					// Check if there actually are any sources after the code word
	        					if($flintCode[$i+5] == '='){
	        						$i += 7;
	        						echo "<br>Juriconnect-code: ";

	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
		        					
		        					// All references processed
		        					// echo "<br>";
	        					}
	        					// Otherwise skip juriconnect-code
	        					else{
	        						$i += 4;
	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
	        					}

	        				}

	        				// Checking for sources ('bron')
	        				if($flintCode[$i] == 'b' && $flintCode[$i+1] == 'r' && $flintCode[$i+2] == 'o' && $flintCode[$i+3] == 'n') {

	        					// Check if there actually are any sources after the code word
	        					if($flintCode[$i+5] == '=' && !ctype_space($flintCode[$i+7])){
	        						$i += 7;
	        						echo "<br>Source: ";

	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
		        					
		        					// All references processed
		        					echo "<br>";
	        					}
	        					// Otherwise skip source
	        					else{
	        						$i += 4;
	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
	        					}

	        				}

	        				// Checking for sources ('source')
	        				if($flintCode[$i] == 's' && $flintCode[$i+1] == 'o' && $flintCode[$i+2] == 'u' && $flintCode[$i+3] == 'r' && $flintCode[$i+4] == 'c' && $flintCode[$i+5] == 'e') {

	        					// Check if there actually are any sources after the code word
	        					if($flintCode[$i+7] == '=' && !ctype_space($flintCode[$i+9])){
	        						$i += 9;
	        						echo "<br>Source: ";

	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
		        					
		        					// All references processed
		        					echo "<br>";
	        					}
	        					// Otherwise skip source
	        					else{
	        						$i += 8;
	        						while (!ctype_space($flintCode[$i])) {
	        							echo $flintCode[$i];
		        						$i++;
		        					}
	        					}

	        				}


	        				// Check if there is a prefix
		        			if( ctype_space($flintCode[$i-1]) && !is_numeric($flintCode[$i]) && $flintCode[$i+1] == '.'){
		        				if($testingMode){
		        					echo "<br>Prefix: ".$flintCode[$i]."<br>";
		        				}
		        				$i += 2;
		        			}	        			

	        				// Print out the rest
        					if($testingMode){
        						echo $flintCode[$i];
        					}
        					$i++;

        					if($flintCode[$i] == ';') {
        						break;
        					}

        				}
        				echo "<br>";
        				break;
        			}
        			// Word starts with 'f', but is not 'feit'
        			else break;




        		// Looking for "relatie"
        		case 'r':
        			if( $flintCode[$i+1] == 'e' && $flintCode[$i+2] == 'l' && $flintCode[$i+3] == 'a' && $flintCode[$i+4] == 't' && $flintCode[$i+5] == 'i' && $flintCode[$i+6] == 'e' ){

        				$i += 7;
        				// echo "Current chars: ".$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5].$flintCode[$i+6].$flintCode[$i+7];
        				echo "<br>Relatie name: ";

        				while ($flintCode[$i] != '(' ) {
        					if($testingMode){
        						echo $flintCode[$i];
        					}
        					$i++;
        				}
        				echo "<br>";

        				// Check if there is an opening bracket '('
        				if( $flintCode[$i] == '(' ){
        					// echo "<br>Yesssss!".$flintCode[$i];
        					$i += 1;

        				}


      //   				// echo "<br>After opening bracket".$flintCode[$i].$flintCode[$i];

      //  					while (ctype_space($flintCode[$i])) {
	     //   					echo $flintCode[$i];
	     //    				$i++;
		    //     		}

		    //     		// White space removed, current character:
		    //     		// echo "White space removed, current character:".$flintCode[$i];

      //   				// Process arguments inside the brackets ()
      //   				while ($flintCode[$i] != ')' ) {

      //   					// echo "<br>";

      //   					// Argument structure: 
						// 	if( $flintCode[$i+1] == ':' ){
						// 		if($testingMode){
						// 			echo "Argument variable: ".$flintCode[$i]."<br>";
						// 		}
      //   						$i += 2;

      //   						// Loop to process the argument's name
      //   						echo "Argument name: ";
      //   						while ($flintCode[$i] != ',' && $flintCode[$i] != ')') {
      //   							if($testingMode){
      //   								echo $flintCode[$i];
      //   							}
      //   							$i++;
      //   						}
      //   						$i += 1;
    		// 					if($testingMode){
    		// 						echo "<br>";
    		// 					}


      //   						$i++;

      //   					}   
      //   					else{
						// 		break;
						// 	}

						// // Closing bracket big while -> argument processing
      //   				}


        				// Processed all arguments inside the brackets () at this point	
        				

        				// echo "Chars after the brackets: ".$flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5].$flintCode[$i+6].$flintCode[$i+7].$flintCode[$i+8].$flintCode[$i+9].$flintCode[$i+10].$flintCode[$i+11]."<br>";


      //  					while ( !( $flintCode[$i+1] == 'w' && $flintCode[$i+2] == 'a' && $flintCode[$i+3] == 'n' ) ) {
	     //   					echo $flintCode[$i];
	     //    				$i++;
		    //     		}

		    //     		// echo "<br>Last code before big check".$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4];
						// $i += 1;



      //   				// Checking for "wanneer"
      //   				if( $flintCode[$i] == 'w' && $flintCode[$i+1] == 'a' && $flintCode[$i+2] == 'n' && $flintCode[$i+3] == 'n' && $flintCode[$i+4] == 'e' && $flintCode[$i+5] == 'e' && $flintCode[$i+6] == 'r' ){

      //   					if($testingMode){
      //   						echo "<br>Found ".$flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3].$flintCode[$i+4].$flintCode[$i+5].$flintCode[$i+6];
      //   					}

      //   					$i += 7;
      //   					echo "<br>First argument: ".$flintCode[$i];

      //   					while ($flintCode[$i] != '(' ) {
    		// 					if($testingMode){
    		// 						echo $flintCode[$i];
    		// 					}
      //   						$i++;
      //   					}

      //   					$i++;
      //   					echo "<br>First variable: ".$flintCode[$i];
      //   					$i += 2;

      //   					// Remove white space
      //   					while (ctype_space($flintCode[$i])) {
	     //   						echo $flintCode[$i];
	     //    				$i++;
	     //    				}
		      
      //   					// echo "<br>First letters of next argument: ".$flintCode[$i].$flintCode[$i+1];

	     //    				// Look for "of"
      //   					if( $flintCode[$i] == 'o' && $flintCode[$i+1] == 'f' ){
      //   						echo "<br>Found an ". $flintCode[$i].$flintCode[$i+1];
      //   						$i += 2;
      //   					}

      //   					// Look for "en"
      //   	        		if( $flintCode[$i] == 'e' && $flintCode[$i+1] == 'n' ){
      //   						echo "<br>Found an ". $flintCode[$i].$flintCode[$i+1];
      //   						$i += 3;
      //   					}

      //   					// echo "<br>First letters after an: ".$flintCode[$i].$flintCode[$i+1];

      //   					// Look for open bracket "("
      //   					 if( $flintCode[$i] == '('){
      //   						echo "<br>Found a ". $flintCode[$i];
 
 					// 			// Whitespace after opening bracket "("
      //   						if( ctype_space($flintCode[$i+1]) ){
      //   							$i += 2;
      //   						} else {
      //   							// echo "<br>No whitespace after (";
      //   							$i += 1;
      //   						}

      //   					}

      //   					// echo "<br>First letters after (: ".$flintCode[$i].$flintCode[$i+1];

      //   					// Look for "niet"
      //   	        		if( $flintCode[$i] == 'n' && $flintCode[$i+1] == 'i' && $flintCode[$i+2] == 'e' && $flintCode[$i+3] == 't' ){
      //   						echo "<br>Found a ". $flintCode[$i].$flintCode[$i+1].$flintCode[$i+2].$flintCode[$i+3];
      //   						$i += 5;
      //   					}

      //   					// echo "<br>First letters after niet: ".$flintCode[$i].$flintCode[$i+1];
      //       				// Processed title of first argument and first operator(s) at this point

      //   					echo "<br>";


	        				// while ( !( ctype_space($flintCode[$i+1]) && ctype_space($flintCode[$i+2]) ) ) {

        					// while ( !($flintCode[$i+1] == 'a' && $flintCode[$i+2] == 'c' && $flintCode[$i+3] == 't' && $flintCode[$i+4] == 'i' && $flintCode[$i+5] == 'e') ) {
        					// 	echo $flintCode[$i];
        					// }

	        	

	        				// 	$i++;	
	        				// }






        				// }

        				// // No "wanneer" after the brackets
        				// else{
        				// 	break;
        				// }




        				break;
        			}
        			else break;





        		default:
        			// echo "Parser didn't find shit...";




        	// Switch
        	}

        	$i++;
        //While passing through all chars
        }



	}

}
