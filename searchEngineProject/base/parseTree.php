<?php
            include_once './base/globals.php';

        class Token {
 
            public $type;
            public $value;        
            public function __construct($s)
            {
                $flag = 0;
                if ($s == "")
                {
                    $type = "END_EXPER";
                    $value = "";
                    $flag = 1;
                }
                if ($s == "&" )
                {
                //    echo (" <br> AND");
                    $this->type = "AND";
                    $this->value = '&';
                    $flag =1;    
                    
                }
                if ($s == "|" )
                {
                //    echo (" <br> OR");
                    $this->type = "OR";
                    $this->value = '|';
                    $flag =1;
                }
                if ($s == "!" )
                {
                //    echo (" <br> not");
                    $this->type = "NOT";
                    $this->value = '!';
                    $flag = 1;
                }
                if ($s == "(" )
                {
                //    echo (" <br> open break");
                    $this->type = "OPEN_BREAK";
                    $this->value = '(';
                    $flag =1;
                }
                if ($s == ")" )
                {
                //    echo (" <br> close break");
                    $this->type = "CLOSE_BREAK";
                    $this->value = ')';
                    $flag =1;
                }
                   
                if ($flag == 0)
                {
                    $this->type = "LITERAL";
                    $this->value = $s;
                }
            }
        }  
        
        function TransformToPolishNotation($infixTokenList)
        {
            $stack = new SplStack();
            $queue = new SplQueue();
            $index = 0;
            //echo "size of array -3 <br>";
            //echo sizeof($infixTokenList);
            // echo ("<br>The size should be 2<br>");
            // echo sizeof($infixTokenList);
            // echo ("<br>bbbbb<br>");
            
            
            while (sizeof($infixTokenList) > $index){
                $t = new Token($infixTokenList[$index]);
                //echo "Token: <br><br>";
                // print_r($t);
                //echo "<br><br>";
                switch ($t->type) {
                    case "LITERAL":
                        $queue->enqueue($t);
                        //echo "<br>LITERAL<br>";
                        break;
                    case "AND":
                    case "OR":
                    case "NOT":
                    case "OPEN_BREAK":
                    //    echo "<br>AND /OR/ NOT/ OPEN_BREAK<br>";
                        $stack->push($t);
                        break;
                    case "CLOSE_BREAK":
                      //  echo  "Stack count before :";
                        // print_r($stack->count());
                     
                        while($stack->top()->type != "OPEN_BREAK"){
                            
                                $queue->enqueue($stack->pop());
                                
                            }
                
                        $stack->pop();
                        
                   
                        if ($stack->count() > 0 && $stack->top()->type == "NOT")
                           {
                               $queue->enqueue($stack->pop());
                           }
                        //echo "<br>CLOSE_BREAK<br>";
                        break;
                  
                    default:
                        break;
                }
                
                // echo "<br>";
                // echo $index;
               ++$index;
               
            }
            while ($stack->count() > 0)
            {
                   
                   $queue->enqueue($stack->pop());
            }
            // echo ("<br>queueu<br>");
            // print_r ($queue);
            /*reverse the queue */    
            $temp_stack = new SplStack();
            $reverse_queue = array();
            foreach ($queue as $value){
                    $temp_stack->push($value);
            }
            foreach ($temp_stack as $value){
                    $reverse_queue[] = $value;
            }
            return $reverse_queue;
                
        }
        




function Make(&$iterator){
          //  echo "<br>MAKE FUNCTION <br>";
        if (is_null($iterator->current()))
            return null;
        
        if ($iterator->current()->type == "LITERAL" )
            {
            //    echo " <br> Make - ITERATOR <br>";
                $lit = $iterator->current()->value;
                $iterator->next();
                return new leaf($lit);
            }
            else
            {
                if ($iterator->current()->type == "NOT" )
                {
              //      echo " <br> Make - NOT <br>";
                    $iterator->next();
                    $lit = Make($iterator);
                    return new op_not($lit);
                }
            
                else if ($iterator->current()->type == "AND" )
                {
                //    echo " <br> Make - AND <br>";
                    $iterator->next();
                    $left = Make($iterator);
                    if (is_null($iterator))
                    {
                        $right = null;
                    }
                    else
                        $right =Make($iterator);
                    
                    return new op_and($left,$right);

                }
                
                else if ($iterator->current()->type == "OR" )
                {
                  //  echo " <br> Make - OR <br>";
                    $iterator->next();
                    $left  = Make($iterator);
                    $right = Make($iterator);
                    return new op_or($left,$right);

                }               
            }
            return null;
       }




?>


