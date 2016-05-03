<?php

	require_once('mysql.php');
	require_once('globalVars.php');

	if(isset($_POST['docID'])){

		$id = $_POST['docID'];


    	$totalDocsRes = mysqli_query($GLOBALS['conn'], "SELECT * from " . $GLOBALS['db_docs'] . " WHERE id = " . $id);

    	$docLine = mysqli_fetch_array($totalDocsRes);

    	if($docLine['removed'] == 1){

			$res = mysqli_query($GLOBALS['conn'], 'UPDATE ' 
			    . $GLOBALS['db_docs'] . " SET removed = 0  WHERE id = " . $id);
    	}
    	else{

			$res = mysqli_query($GLOBALS['conn'], 'UPDATE ' 
			    . $GLOBALS['db_docs'] . " SET removed = 1  WHERE id = " . $id);
    	}


    	if($res){

    		header('Location: ./admin.php');
    	}
    	else{
    		echo 'failed updating status';
    	}
	}


?>