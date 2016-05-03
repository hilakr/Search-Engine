<?php


	require_once('./mysql.php');
	require_once('./globalVars.php');



	$files = scandir($GLOBALS['files_src']);
	$superArrIndex = 0;
	// the min amount of dirs is 2 since we have the "." and the ".." directorys
	$dirsAmount = 2;
	$words = array();
	$word_counter = array();

	if(isset($files[$dirsAmount])){
		// loop and look for a file named this way. // && if it was not already parsed 
		while( is_file($GLOBALS['files_src'] . $files[$dirsAmount]) && !(is_file($GLOBALS['files_storage'] . $files[$dirsAmount])) ){
			// passing it into my storage
			if( rename( $GLOBALS['files_src'] . $files[$dirsAmount], $GLOBALS['files_storage'] . $files[$dirsAmount] ) ){

				$index = 0;
				// adding the file name into the DB and generating an id for it
				$res = mysqli_query($GLOBALS['conn'], "INSERT INTO " . $GLOBALS['db_docs'] . 
									" (file_name) VALUES ('" . $files[$dirsAmount] . "')" );
				if($res){echo 'The File: ' . $files[$dirsAmount] . ' Successfully Added To The DB<br><br>';	}
				else{ die('Failed For Unknown Error' . mysqli_error()); }
	            $result = mysqli_query($GLOBALS['conn'], 'SELECT id from ' . $GLOBALS['db_docs'] . ' ORDER BY id DESC LIMIT 1');
                $docId = mysqli_fetch_array($result); 
                $docId = $docId['id']; 
                $docId = intval($docId);

                //#################################################
				// creating a file summery on the dest directory
                //#################################################
				$myParsedFile = fopen( $GLOBALS['files_dest'] . $files[$dirsAmount], "w");
				$myFullFile = fopen( $GLOBALS['files_storage'] . $files[$dirsAmount], "r");

				if ($myFullFile) {

					while (($buffer = fgets($myFullFile, 4096)) !== false && $index < $GLOBALS['sammary_lines']) {

						fwrite($myParsedFile, $buffer);	
						$index ++;
					 }

					fclose($myFullFile);
					fclose($myParsedFile);
				 }
				 else{ die( "could not open file"); }


				$myFullFile = fopen( $GLOBALS['files_storage'] . $files[$dirsAmount], "r");
				if ($myFullFile) {
				    $file_content =  stream_get_contents($myFullFile);
				    fclose($myFullFile);
				 }
				$words =str_word_count( strtolower($file_content),1);

				
			/*	//Removing words from the stop list or word that are smaller then 3 letters 
				for ($i = 0 ; $i < sizeof($words); $i++){
				    if( isset($stop_list[$words[$i]]) || strlen($words[$i]) < 2 ) {
				    	unset($words[$i]); 
				 	}
				}
				$words = array_values($words);
			*/


				for ( $i=0 ; $i < sizeof($words); $i++ ){

				    if( isset($word_counter[$superArrIndex][$words[$i]]) ){

				        $word_counter[$superArrIndex][$words[$i]] ++;
				    }
				    else{
				        $word_counter[$superArrIndex][$words[$i]] = 1;
				    }
				}

				$word_counter[$superArrIndex]['#'] = $docId; // we are cleaning the array from words which contain less then 2 letters so this one is okay
				$superArrIndex++;

			}
			$dirsAmount++;
			if(!isset($files[$dirsAmount])){ break; }
		}


		$words = array();


		for ( $i=0 ; $i < sizeof($word_counter); $i++ ) { // total docs

				$myWordsArray = array_keys($word_counter[$i]);

			for ( $j=0 ; $j < sizeof($myWordsArray); $j++ ) { // the words of each file

				if( isset( $words[$myWordsArray[$j]] ) ) { // if the word exists

					$words[ $myWordsArray[$j] ]['offset'] .= ','.$word_counter[$i]['#'].":".$word_counter[$i][$myWordsArray[$j]];
					$words[ $myWordsArray[$j] ]['#']++;
				}
				else{
					$words[ $myWordsArray[$j] ]['offset'] = $word_counter[$i]['#'].":".$word_counter[$i][$myWordsArray[$j]];
					$words[ $myWordsArray[$j] ]['#'] = 1;
				}

			}
		}


		$myWordsArray = array_keys($words);
		asort($myWordsArray);
		for ( $i=0 ; $i < sizeof($myWordsArray); $i++ ) { 

	        if( $result = mysqli_query($GLOBALS['conn'], "SELECT * from " . $GLOBALS['db_words'] 
	        	. " WHERE word = '" . mysqli_real_escape_string($GLOBALS['conn'], $myWordsArray[$i]) . "' ") ){
				$num =  mysqli_num_rows($result);

		        if($num != 0){

	                $wordLine = mysqli_fetch_array($result); 
	                $word_id = $wordLine['word_id']; 
	                $word = $wordLine['word']; 
	                $offset = $wordLine['offset']; 
	                $totaldocs = $wordLine['totaldocs']; 

	                $totaldocs++;
	                $offset .= ',' . $words[ $myWordsArray[$i] ]['offset'];

		       		$res = mysqli_query($GLOBALS['conn'], 'UPDATE ' 
		       			. $GLOBALS['db_words'] . " SET offset = '" . $offset . "', totaldocs = " . $totaldocs . "  WHERE word_id = " . $word_id);

		        }
		        else{

					$res = mysqli_query($GLOBALS['conn'], "INSERT INTO " . $GLOBALS['db_words'] . 
										" (word, offset, totaldocs) VALUES ('" . $myWordsArray[$i] . "', '" 
										. $words[$myWordsArray[$i]]['offset'] . "', '" . $words[$myWordsArray[$i]]['#'] . "')" );
		        }
			}
			else{
				echo '<br><br>FK<br><br>';
			}
		}
	}



    		header('Location: ./admin.php');
?>