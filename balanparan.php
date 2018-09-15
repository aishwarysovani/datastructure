<?php
include "utility.php";
$stk=new Stack();
echo"enter your expression to check balanced paranthesis:";
$exp=readline();
$len=strlen($exp);
$flag=true;

for($i = 0; $i<$len; $i++)
{    
    $ch = $exp[$i];
    if ($ch == '(' || $ch == '[' || $ch=='{')
    {
        $stk->push($ch);
    }
    elseif($ch == ')' || $ch==']' || $ch=='}')
    {
            if($stk->isEmpty())
            {   
                $flag=false;
                break;
            }
            else
                $stk->pop();
        
    }
}
if($flag)
{
    if($stk->isEmpty())
        echo "\n balanced paranthesis";
    else 
        echo "\n not balanced paranthesis";
}
  

?>