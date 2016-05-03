<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body
        <form action="./" method="GET">
            <input name="search"  type="text">
            <input type="submit" value="Search">
        </form>
        <?php
        
        if(isset($_GET['search'])) {
            
            include_once './base/globals.php';
            $query = $_GET['search'];
            print_r($query);
            $result = searchQuery($query);
            /*if (is_null($result) || empty($result)){

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
            }*/
            //else{ 
                echo "<br> RESULT<br>";
                print_r ($result);
                echo "<br> <br>";
             //}

    }
        
        
        
        /*QUERY SEARCH*/  
        /*   $myexp = '( fast ) & ( she | ( eyes & her ) )' ;
        $result = searchQuery($myexp);
        if (is_null($result) || empty($result)){
            echo "<br>Your search - ";
            print_r($myexp);
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
            echo "<br> RESULT<br>";
            print_r ($result);
            echo "<br> <br>";
         }
      * 
      */
        ?>
    </body>
</html>
