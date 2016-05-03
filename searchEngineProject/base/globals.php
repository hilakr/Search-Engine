<?php

                require_once('./mysql.php');
                require_once('./globalVars.php');

                
                /*ALL DOCS IN DB*/    
                $temp = array();
                $temp = mysqli_query($GLOBALS['conn'], "SELECT * FROM docs WHERE id");      
                $docs = array();
                $i = 0;
                while($getInfo = mysqli_fetch_array($temp)){

                    $docs[$i] = $getInfo['id'];
                    $i++;		
		        }
                // echo "<br>ALL DOCS IN DB <br>";
                // print_r ($docs);
                $GLOBALS['docs'] = $docs;
                
              
                //
                
                function get_docs_of_word ($word){
                    $i = 0;
                    $arr_A = array();
                    $arr_A = mysqli_query($GLOBALS['conn'], "SELECT * FROM doc_words WHERE word = '$word' ");      
                    $getInfo = mysqli_fetch_array($arr_A);
                    $offset = $getInfo['offset'];
                    $word_offset_array = array ();
                    $word_offset_array = explode(",", $offset);
                    $word_docs_id = array ();
                    foreach ($word_offset_array as $val){
                        $temp = explode (":", $val);
                        $word_docs_id[$i] = $temp[0];
                        $i++;
                    }
                    // echo "<br> print the array of docs of word<br>";
                    // print_r( $word_docs_id );
                    // echo "<br><br>";
                    return $word_docs_id;
                
                }
                
?>