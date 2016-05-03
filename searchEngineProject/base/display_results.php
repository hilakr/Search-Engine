<?php

        include_once './base/globals.php';

/*Display result get the result from the query and the query and display the docs by ranking and mark the words in the docs */


function remove_ops ($tokens) {
            $i = 0;
            foreach ($tokens as  $value){
                if ($value == '&' || $value == '|' || $value == '!' || $value == ')' || $value == '(')
                {
                    unset($tokens[$i]);
                }
                else if (substr($value, 0, 1) == '"')
                {
                        
                        $token = substr($value,1);
                        unset($tokens[$i]);
                        $tokens[] = $token;
                }
                if (substr($value, -1) == '"'){
                        
                        $token = substr($value,0,-1);
                        unset($tokens[$i]);
                        $tokens[] = $token;
           
                }
                if (substr($value, -1) == '*'){
                        
                        $token = substr($value,0,-1);
                        unset($tokens[$i]);
                        $tokens[] = $token;
           
                }

                $i++;
            }
            // echo "<br> Only words <br>";
            // print_r ($tokens);    
            // echo "<br><br>";
            return $tokens;
}
/*get_word_info is function that get word and get from db the word's offset , the function return array with doc id and hits*/ 
            
function get_word_info ($word){
           
            $arr_A = array();
            $word_info = array();
            $arr_A = mysqli_query($GLOBALS['conn'], "SELECT * FROM doc_words WHERE word = '$word' ");
            $num =  mysqli_num_rows($arr_A);

             if($num != 0){   

                $getInfo = mysqli_fetch_array($arr_A);
                $offset = $getInfo['offset'];
                
                // echo ("<br> offset of the word <br>");
                // print_r ($offset);
                // echo ("<br><br>");
                
                $offset_array = explode(",", $offset);
                // echo "<br> offset <br>";
                // print_r($offset_array);
                // echo "<br>";
                
                foreach ($offset_array as $value) {
                    $temp = explode(":", $value);
                    
                    $word_info[$temp[0]] = $temp[1];
                }
                // print_r ($word_info);
                // echo ("<br>");
            }
            return $word_info;
}
        
 /*Ranking is function that get the words from query_search and the id docs that should be display and check how many times they apperad in docs , the function return sorted array from max to min*/
        /*max is the doc with the higger hits of the word in the doc */
        
         function Ranking ($words ,$docs)
         {
             $ranking_docs[] = array ();
             $word_info = array();
             foreach ($docs as  $doc) {
                 $ranking_docs[$doc] = 0;
                 foreach ($words as  $word) {
                    $word_info =  get_word_info($word);
                    //print_r ($word_info);
                    if (isset($word_info[$doc]))
                    {
                        $ranking_docs[$doc] = $ranking_docs[$doc] + $word_info[$doc];
                    }
                }
            }
         
             // echo "<br>ranking docs<br>";
             // print_r ($ranking_docs);
             // echo "<br>";
             // echo "sort ranking array<br> ";
             // arsort ($ranking_docs);
             // print_r ($ranking_docs );
             // echo "<br>";
            return $ranking_docs;
         }
         
     
function MarkWords(&$text, $words) {
            preg_match_all('~\w+~', $words, $m, PREG_SET_ORDER);
            if (!$m)
                return $text;
            $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
            preg_replace($re, '<b>$0</b>', $text);
            return preg_replace($re, '<b>$0</b>', $text);
}
        
function display_results( $result_docs, $query )
{
    /*Ranking the results */
    $tokens = array();
    $tokens = explode(" ",$query);
    $tokens = remove_ops($tokens);
    // echo ("<br>token_without operators<br>");
    // print_r ($tokens);
    // echo "<br><br>";
    $output = Ranking($tokens, $result_docs);
    
    /*Mark the words in query*/
    $result_docs_content = array();   
    foreach ($result_docs as $docid ) {
           /*need to generate the path */
          
            $arr_A = array();
            $arr_A = mysqli_query($GLOBALS['conn'], "SELECT * FROM docs WHERE id = '$docid' ");
            $num =  mysqli_num_rows($arr_A);
             
             if($num != 0){   

                $getInfo = mysqli_fetch_array($arr_A);
                $filename = $getInfo['file_name'];
                $pre = "./Storage/";
                $result_docs_content[$docid] =  file_get_contents($pre.$filename);
                //print_r ($result_docs_content);
                foreach ($tokens as $token) {
                    $result_docs_content[$docid] = MarkWords($result_docs_content[$docid], $token);
                }
                 // echo("<br>should see the file with mark words <br>");
                 // print_r ($result_docs_content);
                 // echo "<br>";
            }
       }
       return $output;
}

?>