<?php
        include_once './base/globals.php';

        abstract class experssion{
                
               abstract public function Evaluate();
            
         }

        class leaf extends experssion {
            public $word;
            public function __construct($word1) {
                     $this->word = $word1;
                    // echo "<br>*****constrcut leaf*******<br>";
                     
            }
            public function Evaluate(){
                           
               $wordDocsId = get_docs_of_word($this->word);
               
               return $wordDocsId;
                
            }
        }
        
        class op_and extends experssion {
                public $left;
                public $right;
                public function __construct( $left1,  $right1) {
                    if (is_null($left1))
                        $this->left = null;
                    else
                     $this->left = $left1;
                    
                    if (is_null($right1)){
                        $this->right = null;
                        // echo "should be null";
                    }
                    else
                       $this->right = $right1;
                     
                  
                //     echo "<br>*****constrcut op_and*******<br>";

                }
                public function Evaluate(){
                  //echo "<br>*****Evaluate op_and*******<br>";
                  //echo "<br>*****Test array - intersect *******<br>";
                   
                    if (is_null($this->left) ||  is_null($this->right))
                        return null;
                    
                    
                    $part1 = $this->left->Evaluate();
                    // echo ("***************check*********");
                    // print_r ($part1);
                    // echo ("***************check*********");
                    $part2 = $this->right->Evaluate();
                    $test = array_intersect($part1,$part2);
                  //  print_r ($test);
                  //  echo "<br>*****Evaluate op_and*******<br>";
                    return array_intersect($this->left->Evaluate(),$this->right->Evaluate());
                    
                    
            }
        }
        
        class op_or extends experssion {
                public $left;
                public $right;
                public function __construct( $left1, $right1) {
                     if (is_null($left1))
                        $this->left = null;
                    else
                     $this->left = $left1;
                    
                    if (is_null($right1)){
                        $this->right = null;
                        // echo "should be null";
                    }
                    else
                       $this->right = $right1;
                }
                public function Evaluate(){

                    if (is_null($this->left) &&  is_null($this->right))
                        return null;
                     
                    if ( is_null($this->right))
                        return $this->left->Evaluate();

                    if ( is_null($this->left))
                        return $this->right->Evaluate();

                    $partA = $this->left->Evaluate();
                    
                    $partB = $this->right->Evaluate();
                    
                    
                    //echo "<br>*****Evaluate op_or*******<br>";
                    return array_merge($partA, $partB);
                }   
        }
        
        class op_not extends experssion {
            public $lit;
            
            public function __construct( $lit1) {
                     $this->lit = $lit1;
                  
                    // echo "<br>*****constrcut op_not ******<br>";
            }
              public function Evaluate(){
                echo "<br>";
                print_r($GLOBALS['docs']);
                $lit_docs = $this->lit->Evaluate();
                $diff = array_diff($GLOBALS['docs'], $lit_docs);
                return $diff;
            }
        }


?>