
<?php


	require_once('mysql.php');	
	require_once('globalVars.php');

	$removed = "";
	$docs = array();
	$totalDocs = array();

    $totalDocsRes = mysqli_query($GLOBALS['conn'], "SELECT * from " . $GLOBALS['db_docs'] . " WHERE 1 ");
	
	$i=0;
	while($docLine = mysqli_fetch_array($totalDocsRes)){

		$totalDocs[$i]['file_name'] = $docLine['file_name'];
		$totalDocs[$i]['id'] = $docLine['id'];
		$totalDocs[$i]['removed'] = $docLine['removed'];
		$i++;
	} 




?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<title>Admin</title>
</head>
<body>

<div class="wrapper">

<section id="init">
<a href="./initFile.php"><h1>Click To Index Files</h1></a>
</section>

	<section  class="right">

			<h4>Total Files</h4>	
			<?php

			    for($i=0; $i < sizeof($totalDocs); $i++) {

			    	if($totalDocs[$i]['removed'] == 1){ $removed = "- Removed"; }
			    	else { $removed = "";}
					echo '<br><a href="./theFileContent.php?search=' . $totalDocs[$i]['file_name'] . '" >' 
					. $totalDocs[$i]['id'].' - '.$totalDocs[$i]['file_name'] .$removed.'</a>';
				}

			?>
			<form id="totalForm" method="POST" action="removeByID.php">
				<input name="docID" type="text" placeholder="doc ID">
				<input type="submit" value="Update Status">
			</form>
			    
	</section>	
	<section class="right">
			
			<form id="upload" action="upload.php" method="post" enctype="multipart/form-data">
			    <input type="file" name="fileToUpload" id="fileToUpload" placeholder="a"><br><br>
			    <input type="submit" value="Upload" name="submit">
			</form>

	</section>	


	<div class="clear"></div>

</div>


</body>
</html>