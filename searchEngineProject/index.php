
<?php

	session_start();


    include_once './base/experssion.php';
    include_once './base/parseTree.php';
    include_once './base/searchQuery.php';
	include_once './base/display_results.php';

	require_once('mysql.php');	
	require_once('globalVars.php');

	$docs = array();
	


	if(isset($_GET['search'])){

		$query = $_GET['search'];
		// echo "<br> ".$query."<br>";
		$result = searchQuery($query);
   		$tokens = explode(" ",$query);
		$tokens = remove_ops($tokens);
		$_SESSION['q'] = $tokens;
        if (is_null($result) || empty($result)){

                echo "<br>Your search - ";
                print_r($query);
                echo "
                 - did not match any documents.<br>
                    <br>
                    Suggestions:
                    <br>
                    Make sure that all words are spelled correctly.<br>
                    Try different keywords.<br>
                    Try more general keywords.<br>";

        }
        else{ 
            	$myDocs = display_results($result, $query);
            	unset($myDocs[0]);
            	//print_r($myDocs);
            	$j=0;

				$mKeysArray = array_keys($myDocs);
            	for($i=0; $i < sizeof($mKeysArray); $i++){

            		// $amount = $myDocs[$docID];
            		$docID = intval($mKeysArray[$i]);
            		$res = mysqli_query($GLOBALS['conn'], "SELECT * from " . $GLOBALS['db_docs'] . " WHERE id = '$docID' ");
		            $num =  mysqli_num_rows($res);

		             if($num != 0){   

		                $docLine = mysqli_fetch_array($res); 
		                if($docLine['removed'] == 0){

	            			$docs[$j]['name'] = $docLine['file_name']; 	
	            			$docs[$j]['sum'] = file_get_contents($GLOBALS['files_dest'].$docLine['file_name']); 	
	            			$j++;
		                } 
	            	}
            	}
        }
		
	}


?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<title>Search Engine</title>
</head>
<body>

<div class="wrapper">

<a id="help" href="help.php" target="_blank"><img height="50" width="50" src="./img/info.png"></a>

<h1>I-SearchEngine</h1>

	<section  class="left">
		<form method="GET" action="./">
			
			<input type="text" name="search" pattern=".{2,60}">
			<input type="submit" value="Search">

		</form>
	</section>


	<div class="clear"></div>


	<section id="midSection">

<?php

	if(isset($_GET['search'])) {

	    for($i=0; $i < sizeof($docs); $i++) {

			echo '<section>';

			echo '	<a href="./theFileContent.php?search=' . $docs[$i]['name'] . '" ><h2>' . $docs[$i]['name'] .'</h2></a>';
			echo '<pre>' . $docs[$i]['sum'] . '</pre>';
				
			echo '</section>';
	      
	    }

	}

?>


	</section>

</div>


</body>
</html>