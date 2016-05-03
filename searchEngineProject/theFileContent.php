<?php

	session_start();
	include_once './base/display_results.php';
	require_once('globalVars.php');

	if( isset($_SESSION['q']) && isset($_GET['search']) ){


		$fileContent = file_get_contents($GLOBALS['files_storage'] . $_GET['search']);
		$fileContent = explode(' ', $fileContent);
		$tokens = $_SESSION['q'];

		foreach ($tokens as $token) {

			$fileContent = str_replace($token, "<span class='mark'>".$token."</span>", $fileContent);
		}


	}




?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<title>
		<?php
			if(isset($_GET['search']) ){ echo $_GET['search']; }
		?>
	</title>
</head>
<body>

<section class="wrapper content" >
	<pre><br><br><?php

			if( isset($_SESSION['q']) && isset($_GET['search']) ){


				//echo $fileContent;
				foreach ($fileContent as $token) {

					echo $token.' ';
				}


			}

		?>

	</pre>
</section>

</body>
</html>