<?php
  
 include_once './base/globals.php';

    function joker_words($term) {
        $i = 0;
        $terms = array();
        $term = substr($term, 0, -1);
       
        $same_pre_words = array();
        $same_pre_words = mysqli_query($GLOBALS['conn'], "SELECT * FROM doc_words WHERE word LIKE '$term%' ");
       
        while($getInfo = mysqli_fetch_array($same_pre_words)){
                    $terms[$i] = $getInfo['word'];
                    $i++;       
        }
        
        $temp = array();
        $temp = implode (" | ",$terms);
        $temp = explode (" ",$temp);
        array_unshift($temp, "(");
        $temp[] = ')';
       
        return $temp;
        
    }

    
    
function searchQuery ($query){
      /*CREATE STOPLIST*/
        $stopList = array();
                $stopList['in'] = "in";
                $stopList['it'] = "it";
                $stopList['on'] = "on";
                $stopList['not'] = "not";
                $stopList['about'] = "about";
                $stopList['is'] = "is";
                $stopList['are'] = "are";
                $stopList['a'] = "a";

        $tokens_array = array();
        
        $tokens_array = explode(" ", $query);

        $jokers = array();
        
        $tokens_temp = array(); 
        $i=0;$j=0;
        foreach ($tokens_array as  $value) {
             
            $token = strtolower($value);
            if (substr($token, -1) == "*") {
                $jokers = joker_words($token);
                unset($tokens_array[$i]);
                foreach ($jokers as $value) {
                    $tokens_temp[] = $value;
                }





            }
        }

        //tokens_temp // all the a*
        // tokens_array // the rest of the arr


        $tokens_array = array_merge($tokens_array,$tokens_temp);
       // echo ("<br> my new array <br>");
       //print_r($tokens_array);
       //echo ("<br> <br>");
         foreach ($tokens_array as  $value) {
            $i = 0;
            $token = strtolower($value);
            
            if (mb_substr($query, 1, 1) != '"' && mb_substr($query, -1) != '"') {
                
                if (in_array($token, $stopList)) 
                {
                    unset($tokens_array[$i]);
                    continue;
                }
                else{
                        
                        if (substr($token, 0, 1) == '"')
                            $token = substr($token,1);
                        else if (substr($token, -1)== '"')
                            $token = substr($token,0,-1);
                        
                        $tokens_temp[] = $token;
                         continue;
                    }
                    
            } else {
                
                if (sizeof($tokens_array)==1)
                {
                    $token = substr($token,1);
                    $token = substr($token,0,-1);
                     
                }
                    

                else if (substr($token, 0, 1) == '"')
                {
                        $token = substr($token,1);
                }
                else if (substr($token, -1) == '"'){
                        
                        $token = substr($token,0,-1);
                        

                }
                
               
                 $tokens_temp[] = $token;
                
            }
            
         $i++;   
        }
        
        
        // echo " <br>THIS IS THE ARRAY OF THE QUERY WITHOUT THE STOPLIST WORDS <br>";
        // print_r ($tokens_temp);
        // echo " <br> <br>";
        
        
        $ReverseQueue = array();
        $ReverseQueue = TransformToPolishNotation($tokens_temp);
        $i = 0 ;
        foreach ($ReverseQueue as $value){
            if ($value->type == "OPEN_BREAK" || $value->type == "CLOSE_BREAK"){
                
                unset($ReverseQueue[$i]);
                continue;
                
            }
            $i++;
        }
        // echo "<br>***REVERSE QUEUE**<br>";
        // print_r($ReverseQueue);
        // echo "<br>*****<br>";    
        $root = Make(new ArrayIterator($ReverseQueue));
            
        if (is_null($root)) {
                
            return array();
        }
            
        $result = $root->Evaluate();
            
        return $result;
}
            
 ?>